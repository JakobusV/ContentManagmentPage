<?php
function IsNullOrEmptyString($str){
    return ($str === null || trim($str) === '');
}

function DBConnection() {
    include_once 'personalConnectionDetails.php';

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
        setcookie($name, $value, time()+$lifetime);
        return true;
    } else {
        return false;
    }
}
/*
Kills the given cookie
*/
function KillCookie($name){
    if(isset($_COOKIE[$name])){
        setcookie($name, "", time()-10000);
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
?>