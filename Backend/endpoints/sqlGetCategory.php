<?php
include_once '../models.php';
include_once '../../utility.php';

header('Content-Type: application/json');

$json = '';
$dbConnection = DBConnection();
$manu = new manufacturer();

$query = $manu->SelectQuery($columns= array("name"));
$dataSet = @mysqli_query($dbConnection, $query);

if ($dataSet) {
    $rowArray;
    while ($row = @mysqli_fetch_array($dataSet)) {
        $rowArray[] = json_decode($row[0]);
    }
    $json = json_encode($rowArray);
}
@mysqli_close($dbConnection);

echo $json;
?>