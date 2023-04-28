<?php

include('./namespace1.php');
include('./namespace2.php');

use my_namespace1 as my1;
use my_namespace2 as my2;

$obj1 = new my1\dummy();
$obj1->getName();
$obj = new my1\derive();
echo "<br>";

$obj2 = new my2\dummy();
$obj2->getname();
$id =1;
echo $obj instanceof my1\dummy;