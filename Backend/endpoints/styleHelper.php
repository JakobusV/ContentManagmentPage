<?php
include_once '../../utility.php';

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

if (array_key_exists("styleFilePath", $data)) {
    $styleFilePath = $data["styleFilePath"];

    GetUserPreferences($styleFilePath);

}
?>