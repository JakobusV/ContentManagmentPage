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
    $dbname = "contentmanagement";

    include_once 'personalConnectionDetails.php';

    $con = new mysqli($host, $user, $password, $dbname, $port, $socket)
        or die ("Could not connect to the database server, make sure you've updated personalConnectionDetails.php " . mysqli_connect_error());

    return $con
}
?>