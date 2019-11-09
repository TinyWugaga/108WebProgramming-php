<?php
/**
 * 這是一個被包裝的 Database Accessor 範例
 *
 * @author Shisha 2019-10-27
 * @license MIT
 */

namespace Database;

use PDO;

class Accessor
{
    /**
     * @var \PDO
     */
    private $connection;
    
    /**
     * @var array
     */
    protected $config = [];

    /**
     * @param  array  $config
     */
    public function config(array $config)
    {
        $this->config = array_merge($this->config, $config);
    }

    /**
     * 連接資料庫
     * 
     * @param  array  $config
     * @return $this
     * @throws Exception
     */
    public function connect($config = [])
    {
        $config = array_merge($this->config, $config);
        
        $host = $config['host'] ?? 'localhost';
        $port = $config['port'] ?? '3306';
        $charset = $config['charset'] ?? 'utf8';
        $database = $config['database'] ?? 'php';
        $username = $config['username'] ?? 'user';
        $password = $config['password'] ?? 'user';
        
        try {
            $this->connection = new PDO(
                "mysql:host={$host};port{$port};charset={$charset};dbname={$database}",
                $username,
                $password
            );
        } catch (\Exception $exce) {
            throw new \Exception("資料庫連線失敗: {$exce->getMessage()}");
        }
        
        return $this;
    }
    
    /**
     * 中斷連接資料庫
     * 
     * @return void
     */
    public function disconnect()
    {
        if ($this->connection instanceof PDO) {
            $this->connection->close();
        }
        
        $this->connection = null;
    }
    
    /**
     * 取得 PDO 實體
     * 
     * @return \PDO
     */
    public function getConnection()
    {
        // 若還未初始，則進行連線
        if (! ($this->connection instanceof PDO)) {
            $this->connect();
        }
        
        return $this->connection;
    }
    
    /**
     * 動態呼叫 PDO 的方法。
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        return $this->getConnection()->{$method}(...$parameters);
    }
    
    /* =========================================================================
     * = Helpers
     * =========================================================================
    **/
    
    /**
     * 取得資料表全部結果
     * 
     * @param  string  $tableName
     * @return array
     */
    public function fetchAll($tableName)
    {
        $query = $this->getConnection()
            ->prepare("SELECT * FROM `{$tableName}`");

        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
