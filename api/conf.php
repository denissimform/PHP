<?php

try {
    // send data in json form
    function sendJson($success, $status, $message, $data = "")
    {
        http_response_code($status);
        return json_encode(["success" => $success, "status" => $status, "message" => $message, "data" => $data]);
    }

    $dsn = "mysql:host=localhost;dbname=PHP";
    $conn = new PDO($dsn, "denis", "Denis@123");
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (PDOException $err) {
    $message = "Error: " . $err->getMessage() . " at line number " . $err->getLine();
    echo sendJson(false, 500, $message);
}
