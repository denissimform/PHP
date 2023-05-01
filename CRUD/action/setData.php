<?php
$conn = new mysqli("localhost", "denis", "Root@123", "PHP") or die("Somthing went wrong during connection with database!!");
$success = ["success" => true, "message" => "Success!!"];
$error = ["success" => false, "message" => "Something went wrong!!"];

if (isset($_POST['submit'])) {
    $sql = "insert into product (name, price, image) values(?,?,'" . addslashes(file_get_contents($_FILES['img']['tmp_name'])) . "')";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sd", $_POST['product_name'], $_POST['price']);
    if ($stmt->execute()) {
        echo json_encode($success);
    } else {
        echo json_encode($error);
    }
}

if (isset($_POST['update'])) {
    $sql = "update product set name = ?, price = ?, image= '" . addslashes(file_get_contents($_FILES['img']['tmp_name'])) . "' where id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sdi", $_POST['product_name'], $_POST['price'], $_POST['product_id']);
    if ($stmt->execute()) {
        echo json_encode($success);
    } else {
        echo json_encode($error);
    }
}

if (isset($_POST['delete'])) {
    $sql = "delete from product where id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $_POST['id']);
    if ($stmt->execute()) {
        echo json_encode($success);
    } else {
        echo json_encode($error);
    }
}
