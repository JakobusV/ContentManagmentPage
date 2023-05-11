<?php
include_once '../models.php';
include_once '../../utility.php';

header('Content-Type: application/json');

$json = '';
$data = json_decode(file_get_contents('php://input'), true);

if (array_key_exists("userEmail", $data) && array_key_exists("userPassword", $data)) {
    $dbConnection = DBConnection();
    $userEmail = $data["userEmail"];
    $userPassword = $data["userPassword"];
    $user = new user();


}
echo $json;
?>