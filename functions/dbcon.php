<?php
date_default_timezone_set('Asia/Dhaka');

$servername = "localhost";
$username = "myapp";
$password = '1234';
$database = 'mydb';

$conn = new mysqli($servername, $username, $password, $database);

if(!$conn){
    die("Connection failed: " . $conn->connect_error);
}
// echo "connected successfully";
?>