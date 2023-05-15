<?php
include_once '../models.php';
include_once '../../utility.php';

header('Content-Type: application/json');

$json = '';
$data = json_decode(file_get_contents('php://input'), true);

if (array_key_exists("userEmail", $data) && array_key_exists("userPassword", $data) &&
    array_key_exists("userAdminStatus", $data) && array_key_exists("userStylePreference", $data)) {
    $dbConnection = DBConnection();
    $user = new user();
    $user->email = $data["userEmail"];
    $user->password = $data["userPassword"];
    $user->isAdmin = $data["userAdminStatus"];
    $user->stylePreference = $data["userStylePreference"];

    $query = $user->InsertQuery();
    $json = @mysqli_query($dbConnection, $query) . " row affected";

    @mysqli_close($dbConnection);
}
echo $json;
?>