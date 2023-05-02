<?php

require_once("./conf.php");

$sql = "select * from product";
$stmt = $conn->prepare($sql);
$stmt->execute();

$res = $stmt->get_result();
$output = "";

if ($res->num_rows > 0) {
    foreach ($res->fetch_all(MYSQLI_ASSOC) as $index => $data) {
        $output .= "<tr><td>" . $data['id'] . "</td>
        <td><img src='data:image/jpeg;base64," . base64_encode($data['image']) . "' width='100' id='img" . $data['id'] . "' alt='Product image'/></td>
        <td id='name" . $data['id'] . "'>" . $data['name'] . "</td>
        <td id='price" . $data['id'] . "'>" . $data['price'] . "</td>
        <td><button class='btn btn-danger' onclick='deleteData(" . $data['id'] . ")'>Delete</button></td>
        <td><button class='btn btn-success' onclick='updateData(" . $data['id'] . ")' data-bs-toggle='modal' data-bs-target='#updateModal'>Update</button></td></tr>";
    }
} else {
    $output = "<tr><td colspan='5' class='text-center'>No data found!!</td></tr>";
}

echo $output;
