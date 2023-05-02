<?php
require('../src/permission.php');
require('./conf/conf.php');

echo "<pre>";

$sql = "truncate table student";
$conn->query($sql);

$name = "Denis";
$age = 21;
$sql = "insert into student (name, age) value( :name, :age)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":name", $name);
$stmt->bindParam(":age", $age);
$stmt->execute();

$name = "Yash";
$age = 19;
$stmt->execute();
$stmt->execute([":name" => "Swet", ":age" => 21]);

$name = 'Denis';
$sql = "select * from student";
$stmt = $conn->prepare($sql);
$stmt1 = $conn->prepare($sql);
$stmt->execute();

// print_r($stmt->fetchAll(PDO::FETCH_ASSOC));
print_r($stmt->fetch(PDO::FETCH_ASSOC));

// $stmt->closeCursor();

$stmt1->execute();
