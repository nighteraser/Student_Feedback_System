<?php 
include("dbcon.php")

if(isset($_POST['register'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO Users (UserName, UserPassword) VALUES ('$username', '$hashed_password')"; 
    $result = mysqli_query($connection, $query);
    if(!$result){
        header('location:index.php?register_msg=You register failure');
        die("Query Failed". mysqli_error($connection));
    }else{
        header('location:index.php?register_msg=You register successfully');
    }
}
?>
