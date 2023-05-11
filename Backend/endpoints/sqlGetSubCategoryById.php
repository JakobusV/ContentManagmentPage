<?php
include_once '../models.php';
include_once '../../utility.php';

header('Content-Type: application/json');

$json = '';

if (array_key_exists("manufacturer", $_GET)) {
    $dbConnection = DBConnection();
    $manufacturerId = $_GET["manufacturer"];
    $vehi = new vehicle();

    $query = $vehi->SelectQuery($columns = array(), $filters= array($vehi->CreateFilterExact("manufacturer_id", $manufacturerId)));
    $dataSet = @mysqli_query($dbConnection, $query);

    if ($dataSet) {
        $rowArray;
        while ($row = @mysqli_fetch_array($dataSet)) {
            $rowArray[] = json_decode($row[0]);
        }
        $json = json_encode($rowArray);
    }
    @mysqli_close($dbConnection);

    if ($json == "null") {
        $json = "Unknown Manufacturer";
    }
}

echo $json;
?>