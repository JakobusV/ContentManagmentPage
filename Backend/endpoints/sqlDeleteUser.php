<?php
include_once '../models.php';
include_once '../../utility.php';

header('Content-Type: application/json');

$json = '';

if (array_key_exists("user", $_GET)) {
    $dbConnection = DBConnection();
    $user = new user();
    $user->id = $_GET["user"];

    $query = $user->DeleteQuery();
    $json = @mysqli_query($dbConnection, $query) . " row affected";

    @mysqli_close($dbConnection);
}
echo $json;
?>