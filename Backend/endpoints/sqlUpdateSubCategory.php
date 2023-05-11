<?php
include_once '../models.php';
include_once '../../utility.php';

header('Content-Type: application/json');

$json = '';
$data = json_decode(file_get_contents('php://input'), true);

if (array_key_exists("vehicleId", $data) && array_key_exists("manufacturerId", $data) && array_key_exists("vehicleModel", $data) && array_key_exists("vehicleYear", $data) &&
    array_key_exists("vehicleImageUrl", $data) && array_key_exists("vehicleMpg", $data) && array_key_exists("vehicleBodyStyle", $data) && array_key_exists("vehiclePrice", $data)) {
    $dbConnection = DBConnection();
    $vehi = new vehicle();
    $vehi->id = $data["vehicleId"];
    $vehi->manufacturer_id = $data["manufacturerId"];
    $vehi->model = $data["vehicleModel"];
    $vehi->year = $data["vehicleYear"];
    $vehi->imageUrl = $data["vehicleImageUrl"];
    $vehi->mpg = $data["vehicleMpg"];
    $vehi->body_style = $data["vehicleBodyStyle"];
    $vehi->price = $data["vehiclePrice"];

    $query = $vehi->UpdateQuery();
    $json = @mysqli_query($dbConnection, $query) . " row affected";

    @mysqli_close($dbConnection);
}
echo $json;
?>