<?php
session_start();
function IsNullOrEmptyString($str){
    return ($str === null || trim($str) === '');
}

function DBConnection() {
    include 'personalConnectionDetails.php';

    $con = new mysqli($host, $user, $password, $dbname, $port, $socket)
        or die ("Could not connect to the database server, make sure you've updated personalConnectionDetails.php " . mysqli_connect_error());

    return $con;
}
/*
Creates a new cookie
use for html style preferences
*/
function CreateCookie($name, $value, $lifetime){
    if(!isset($_COOKIE[$name])){
        setcookie($name, $value, time()+$lifetime, '/');
        return true;
    } else if ($_COOKIE[$name] != $value) {
        setcookie($name, $value, time()+$lifetime, '/');
    } else {
        return false;
    }
}
/*
Kills the given cookie
*/
function KillCookie($name){
    if(isset($_COOKIE[$name])){
        setcookie($name, "", time()-36000*10000000000, '/');
        return true;
    } else {
        return false;
    }
}
/**
 * Creates a new session
*/
//Use for account details
function CreateSession($name, $value){
    if(!isset($_SESSION[$name])){
        $_SESSION[$name] = $value;
        return true;
    } else {
        return false;
    }
}
/**
 * Destroys the given session */
function DestroySession($name){
    if(isset($_SESSION[$name])){
        unset($_SESSION[$name]);
        return true;
    } else {
        return false;
    }
}

function LoggedInConfirmed($email, $password, $auth) {
    if(!isset($_SESSION[$email])){
        CreateSession("current_user", array('email'=>$email, 'password'=>$password, 'auth'=>$auth));
    } else {
        //TODO: Handle re-login
    }
}

function GetUserPreferences($styleFilePath) {
    //TODO: Get user preference style from endpoint
    if(IsNullOrEmptyString($styleFilePath)){
        $styleFilePath = "defaultStyle.php";
    } else {
        CreateCookie("user_style_pref", $styleFilePath, 3600);
    }
}

function LoggedOut(){
    if(isset($_SESSION["current_user"])){
        DestroySession("current_user");
    }

    if(isset($_COOKIE["user_style_pref"])){
        KillCookie("user_style_pref");
    }
}

function CategoriesForHeader() {
    $con = DBConnection();

    return @mysqli_query($con, "SELECT id, name FROM manufacturer");
}

function SubCategories() {
    $con = DBConnection();

    return @mysqli_query($con, "SELECT * FROM vehicle");
}

function GetCatName($id) {
    $categories = CategoriesForHeader();

    while ($row = $categories->fetch_assoc())
        if ($row['id'] == $id)
            return $row['name'];

    return '';
}

function curlURL($url) {
    $curl = curl_init();
    curl_setopt_array($curl, array(CURLOPT_URL=>$url,CURLOPT_RETURNTRANSFER=>true));
    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
}
?>