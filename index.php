<?php include('header.php')?>

<a href="register_page.php" class="btn btn-success" >Register</a>
<br>
<a href="login_page.php" class="btn btn-success" >Login</a>

<form action="result.php" class="form-inline my-2 my-lg-0" method="POST">
    <input class="form-control mr-sm-2" type="text" placeholder="search" aria-label="search" name=teacher_name>
    <button class="btn btn-outline-success my-2 my-sm-0" name="search" type="submit">Search</button>
</form>

<?php
      if(isset($_GET['message'])){
        echo "<h6>" . $_GET['message'] . "</h6>";
      }
      if(isset($_GET['register_msg'])){
        echo $_GET['register_msg'];
      }
      if(isset($_GET['login_msg'])){
        echo $_GET['login_msg'];
      }
?>

<?php include('footer.php')?>