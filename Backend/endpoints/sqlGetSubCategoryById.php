<?php
include_once '../models.php';
include_once '../../utility.php';

header('Content-Type: application/json');

$json = '';

if (array_key_exists("id", $_GET)) {
    $dbConnection = DBConnection();
    $id = $_GET["id"];
    $veh = new vehicle();

    $query = $veh->SelectQuery($columns = array("mpg", "year", "model", "price", "imageUrl", "body_style"), $filters= array($veh->CreateFilterExact("manufacturer_id", $id)));
    $dataSet = @mysqli_query($dbConnection, $query);

    if ($dataSet) {
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