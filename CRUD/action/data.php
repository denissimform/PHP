<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_log(E_ALL);
$conn = new mysqli("localhost", "denis", "Root@123", "PHP") or die("Somthing went wrong during connection with database!!");

$sql = "select * from product";
$stmt = $conn->prepare($sql);
$stmt->execute();

$res = $stmt->get_result();

print_r($res->fetch_array());