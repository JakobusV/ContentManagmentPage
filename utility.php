<?php
function IsNullOrEmptyString($str){
    return ($str === null || trim($str) === '');
}

function DBConnection() {
    include 'personalConnectionDetails.php';

    $con = new mysqli($host, $user, $password, $dbname, $port, $socket)
        or die ("Could not connect to the database server, make sure you've updated personalConnectionDetails.php " . mysqli_connect_error());

    return $con;
}

function CategoriesForHeader() {
    $con = DBConnection();

    return @mysqli_query($con, "SELECT id, name FROM manufacturer");
}

function GetCatName($id) {
    $categories = CategoriesForHeader();

    while ($row = $categories->fetch_assoc())
        if ($row['id'] == $id)
            return $row['name'];

    return '';
}
?>