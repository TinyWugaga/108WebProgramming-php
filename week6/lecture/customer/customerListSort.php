<?php
function printAll($customerList){
 foreach( $customerList as $customer ) {
   echo "Name is ".$customer->name." <br />";
   echo "City is ".$customer->city." <br />";
   echo "Rank is ".$customer->rank." <br />";
 }
}

//usort
function byCity($object1, $object2){
    if ($object1->city == $object2->city)
    {
     return $object1->name > $object2->name; 
    }
    else
    {
     return $object1->city > $object2->city; 
    }    
}

require 'customer.php';
$customerList = array(
  new Customer("Ben","Tainan",3),
  new Customer("Tom","Taipei",2),
  new Customer("Mary","Tainan",1)
);
array_push($customerList, new Customer("Rich","Yilan",2));

echo "====No Sort==== <br>";
printAll($customerList);
echo "-------------- <br>";

sort($customerList);
echo "====All Sort==== <br>";
printAll($customerList);
echo "--------------- <br>";

usort($customerList, "byCity");
echo "===SortBy Sort=== <br>";
printAll($customerList);
echo "--------------- <br>";
