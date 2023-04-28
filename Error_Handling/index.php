<?php
// ini_set("display_errors", 1);
// ini_set("display_startup_errors", 1);
// error_reporting(E_ALL);

// // it will handle warning error only
// function my_error_handler($error_no, $error_msg)

// {
//     echo "Opps, something went wrong:<br>";
//     echo "Error number: [$error_no]<br>";
//     echo "Error Description: [$error_msg]<br>";
// }
// set_error_handler("my_error_handler", E_ALL);

// echo $sd;

echo "<pre>";

try {
    throw new Exception('This is only test');
} catch (Exception $e) {
    echo "Error message: " .  $e->getMessage() . "<br>";
    echo "Error file: " .  $e->getFile() . "<br>";
    echo "Error line: " .  $e->getLine() . "<br>";
    echo "Error code: " .  $e->getCode() . "<br>";
    echo "Error getTrace: ";
    print_r($e->getTrace());
}
