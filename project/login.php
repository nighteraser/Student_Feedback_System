<?php 
session_start();
include("dbcon.php");

if(isset($_POST['login'])){
    $student_name = $_POST['student_name'];
    $password = $_POST['password'];
    
    $stmt = $connection->prepare("SELECT * FROM Student WHERE studentName = ?");
    $stmt->bind_param("s", $student_name);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['passwd'];
        
        // Verify the password
        if (password_verify($password, $hashedPassword)) {
            // Password is correct
            $_SESSION['loggedin'] = true;
            $_SESSION['student_id'] = $row['student_id'];
            $_SESSION['student_name'] = $student_name;
            header("location:../protected_page.php");
        } else {
            // Password is incorrect
            header("location:../login_page.php?login_msg=Incorrect password");
        }
    } else {
        // No user found with the given username
        header("location:../login_page.php?login_msg=User not found");
    }
    $stmt->close();
}else{
    echo "something wrong in login.php";
}
?>
