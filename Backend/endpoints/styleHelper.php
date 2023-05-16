<?php
include_once '../../utility.php';

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

if (array_key_exists("styleFilePath", $data)) {

    if($_COOKIE['user_style_pref'] != $data["styleFilePath"]){
        KillCookie('user_sytle_pref');
    }
    $styleFilePath = $data["styleFilePath"];
    GetUserPreferences($styleFilePath);
}

?>