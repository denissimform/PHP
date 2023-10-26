<?php
include('../Classes/Denis.php');
include('../Classes/User.php');
include('../Classes/UserView.php');
$view = new UserView();


header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="' . time() . '.csv";');

$view->exportCSVFile();
