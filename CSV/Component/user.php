<?php
include('../Classes/Denis.php');
include('../Classes/User.php');
include('../Classes/UserView.php');
$view = new UserView();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $view->userDetails();
}

if (isset($_POST['insert_data'])) {
    $view->insertData($_POST['name'], $_POST['age']);
}

if (isset($_POST['import_csv'])) {
    $view->importCSVData($_FILES);
}
