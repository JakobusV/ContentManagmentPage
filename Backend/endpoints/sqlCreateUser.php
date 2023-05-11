<?php
include_once '../models.php';
include_once '../../utility.php';

header('Content-Type: application/json');

$json = '';
$data = json_decode(file_get_contents('php://input'), true);

if (array_key_exists("userName", $data) && array_key_exists("userAdminStatus", $data)) {
    $dbConnection = DBConnection();
    $user = new user();
    $user->name = $data["userName"];
    $user->isAdmin = $data["userAdminStatus"];

    $query = $user->InsertQuery();
    $json = @mysqli_query($dbConnection, $query) . " row affected";

    @mysqli_close($dbConnection);
}
echo $json;
?>