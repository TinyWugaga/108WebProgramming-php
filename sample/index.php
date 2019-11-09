<?php

require __DIR__ . '/etc/bootstrap.php';

$sql = <<<HEREDOC
SELECT *
FROM `users`
HEREDOC;

$query = DB::prepare($sql);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);

// echo '<pre>', var_export($result, true);


$result = DB::fetchAll('users');

echo '<pre>', var_export($result, true);
