<?php
include_once '../models.php';
include_once '../../utility.php';

header('Content-Type: application/json');

$json = '';
$data = json_decode(file_get_contents('php://input'), true);

if (array_key_exists("manufacturerName", $data)) {
    $dbConnection = DBConnection();
    $manu = new manufacturer();
    $manu->name = $data["manufacturerName"];

    $query = $manu->InsertQuery();
    $json = @mysqli_query($dbConnection, $query) . " row affected";

    @mysqli_close($dbConnection);
}

echo $json;
?>