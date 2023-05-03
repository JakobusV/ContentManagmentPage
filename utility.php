<?php
function IsNullOrEmptyString($str){
    return ($str === null || trim($str) === '');
}

function DBConnection() {
    $host = "";
    $port = 0;
    $socket = "";
    $user = "";
    $password = "";
    $dbname = "";

    $con = new mysqli($host, $user, $password, $dbname, $port, $socket)
        or die ('Could not connect to the database server' . mysqli_connect_error());

    return $con
}
?>