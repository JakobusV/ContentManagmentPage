<?php
include_once '../../utility.php';

header('Content-Type: application/json');

$json = '';
$data = json_decode(file_get_contents('php://input'), true);

if (array_key_exists("userEmail", $data) && array_key_exists("userPassword", $data) && array_key_exists("isAdmin", $data)) {
    $email = $data["userEmail"];
    $password = $data["userPassword"];
    $isAdmin = $data["isAdmin"];

    LoggedInConfirmed($email, $password, $isAdmin);

} else{
    echo "Login Failed";
}
?>