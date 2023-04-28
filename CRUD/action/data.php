<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_log(E_ALL);
$conn = new mysqli("localhost", "denis", "Root@123", "PHP") or die("Somthing went wrong during connection with database!!");

$sql = "select * from product";
$stmt = $conn->prepare($sql);
$stmt->execute();

$res = $stmt->get_result();
$output = "";
foreach ($res as $index => $data) {
    $output = "<tr><td>" . $data['id'] . "</td>
    <td><img src='" . $data['image'] . "' alt='Product image'/></td>
    <td>" . $data['product_name'] . "</td>
    <td>" . $data['product_price'] . "</td>
    <td><button class='btn btn-danger' onclick='deleteData(" . $data['id'] . ")'></button></td></tr>";
}

echo $output;
