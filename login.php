<?php 
include("dbcon.php")

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $stmt = $connection->prepare("SELECT UserID, UserPassword FROM Users WHERE UserName = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();
    $msg;
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['UserPassword'];
        
        // Verify the password
        if (password_verify($password, $hashedPassword)) {
            // Password is correct
            header("location:index.php?login_msg=Login successful.");
        } else {
            // Password is incorrect
            header("location:login_page.php?login_msg=Incorrect password");
        }
    } else {
        // No user found with the given username
        header("location:login_page.php?login_msg=User not found");
    }
    $stmt->close();
}
?>
