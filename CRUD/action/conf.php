<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_log(E_ALL);
$conn = new mysqli("localhost", "denis", "Root@123", "PHP") or die("Somthing went wrong during connection with database!!");
$success = ["success" => true, "message" => "Success!!"];
$error = ["success" => false, "message" => "Something went wrong!!"];
