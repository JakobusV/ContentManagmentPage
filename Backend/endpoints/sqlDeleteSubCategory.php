<?php
include_once '../models.php';
include_once '../../utility.php';

header('Content-Type: application/json');

$json = '';

if (array_key_exists("vehicle", $_GET)) {
    $dbConnection = DBConnection();
    $vehi = new vehicle();
    $vehi->id = $_GET["vehicle"];

    $query = $vehi->DeleteQuery();
    $json = @mysqli_query($dbConnection, $query) . " row affected";

    @mysqli_close($dbConnection);
}
echo $json;
?>