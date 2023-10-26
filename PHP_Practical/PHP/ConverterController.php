<?php

// error handling for e.g. invalid index 
function errorHandler($error_no, $error_msg)
{
    echo json_encode(["success" => false, "message" => $error_msg]);
    exit;
}
set_error_handler("errorHandler", E_ALL);

require_once('./ConverterModel.php');
require_once('./ConverterView.php');

$model = new Converter();
$view = new ConverterView();


try {
    switch (true) {
        case $_SERVER['REQUEST_METHOD'] === "GET":
            $res = $model->getMainIndex();
            echo json_encode(["success" => true, "result" => $view->getHeader($res)]);
            break;

        case isset($_POST['get_result']):
            $data = $model->getResult($_POST['value'], $_POST['main'], $_POST['from'], $_POST['to']);
            echo json_encode(["success" => true, "result" => $data]);
            break;

        case isset($_POST['get_content']):
            $arr = $model->getAllIndexes($_POST['menu']);
            $data = $view->getView($_POST['menu'], $arr);
            echo json_encode(["success" => true, "result" => $data]);
            break;

        default:
            $message = "Error: Invalid request";
            echo json_encode(["success" => false, "message" => $message]);
    }
} catch (Exception $e) {
    $data = "Error:" . $e->getMessage() . " at Line " . $e->getLine() . ".";
    echo json_encode(["success" => false, "message" => $message]);
}
