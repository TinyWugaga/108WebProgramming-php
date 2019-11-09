<?php
require 'customer.php';
$customerList = array(
  new Customer("Ben","Tainan",3),
  new Customer("Tom","Taipei",2),
  new Customer("Mary","Tainan",1)
);
array_push($customerList, new Customer("Rich","Yilan",2));

foreach( $customerList as $customer ) {
  echo "Name is ".$customer->name." <br />";
  echo "City is ".$customer->city." <br />";
  echo "Rank is ".$customer->rank." <br />";}
?>