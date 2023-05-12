<?php
include_once '../models.php';
include_once '../../utility.php';

header('Content-Type: application/json');

$json = '';

if (array_key_exists("manufacturer", $_GET)) {
    $dbConnection = DBConnection();
    $manu = new manufacturer();
    $manu->id = $_GET["manufacturer"];

    $query = $manu->DeleteQuery();
    $json = @mysqli_query($dbConnection, $query) . " row affected";

    @mysqli_close($dbConnection);
}
echo $json;
?>