<?php
date_default_timezone_set('Asia/Dhaka');

$servername = "localhost";
$username = "root";
$password = '';
$database = "projectdb";

$connection = new mysqli($servername, $username, $password, $database);

if(!$connection){
    die("Connection is failed");
}

?>