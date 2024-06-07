<?php 
session_start();
include("functions/dbcon.php");

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $stmt = $conn->prepare("SELECT id, passwd FROM Student WHERE studentName = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['passwd'];
        
        // Verify the password
        if (password_verify($password, $hashedPassword)) {
            // Password is correct
            $_SESSION['loggedin'] = true;
            $_SESSION['student_id'] = $row['id'];
            $_SESSION['student_name'] = $username;
            header("location: main_page.php");
        } else {
            // Password is incorrect
            header("location: login_page.php?login_msg=Incorrect password");
        }
    } else {
        // No user found with the given username
        header("location: login_page.php?login_msg=User not found");
    }
    $stmt->close();
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="./css/floating-labels.css" rel="stylesheet">
  </head>

  <body>

  <form class="form-signin" action="login_page.php" method="POST">
      <div class="text-center mb-4">
        <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Login</h1>
        <p>Student Feedback System</p>
      </div>

      <div class="form-label-group">
            <input type="text" id="inputUsername" class="form-control" placeholder="Username" required autofocus name="username">
            <label for="inputUsername">Username</label>
      </div>

      <div class="form-label-group">
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="password">
        <label for="inputPassword">Password</label>
      </div>

      <button class="btn btn-lg btn-primary btn-block" name="login" type="submit">Login</button>

      <div class="form-label-group">
      <p style="color:red">
          <?php
            if(isset($_GET['login_msg'])){
              echo $_GET['login_msg'];
            }
          ?>
      </p>
      </div>

    </form>
  </body>
</html>
