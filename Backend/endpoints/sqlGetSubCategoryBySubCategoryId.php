<?php
include_once '../models.php';
include_once '../../utility.php';

header('Content-Type: application/json');

$json = '';

if (array_key_exists("vehicle", $_GET)) {
    $dbConnection = DBConnection();
    $vehicleId = $_GET["vehicle"];
    $vehi = new vehicle();

    $query = $vehi->SelectQuery($columns = array(), $filters= array($vehi->CreateFilterExact("id", $vehicleId)));
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
        $json = "Unknown Vehicle";
    }
}

echo $json;
?>