<?php

$program_price = array( "am"=>150, "pm"=>100, "lunch"=>60, "N/A"=>0);


//new syntax in php 7
$programlist = $_POST["program"] ?? ["N/A"];
$price = 0;
foreach( $programlist as $program ) {
  $price += $program_price[$program];

}

  echo $_POST["name"]."，您要繳交".$price." 元 <br/>";
?>