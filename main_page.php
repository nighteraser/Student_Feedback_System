<?php session_start();?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student_Feedback_System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@40,500,0,0" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@40,400,0,0" />
    <!-- style.css -->
    <link rel="stylesheet" href="css/main_style.css">
</head>

<body>
    <?php include('parts/navbar.php')?>
    
    <section class="header">
        <div class="text-box">
            <h1>Student Feedback System</h1>
            <h5 class="fw-light mb-4">It's feedback system</h5>
            <!-- search  -->
            <form action="comment_page.php" method="POST">
            <div class="d-flex justify-content-center px-5">
                <div class="search">
                    <input type="search" class="search-input" placeholder="Search..." name="professor_name">
                    <button class="btn btn-outline-dark my-2 my-sm-0 search-icon fs-6" type="submit" name="search">Search
                    </button>
                </div>
            </div>
            </form>
            <!-- return msg  -->
            <div class="form-label-group">
                <?php
                    if(isset($_GET['search_err_msg'])){
                        echo '<p style="color:red">'.$_GET['search_err_msg'].'</p>';
                    }
                    if(isset($_GET['add_err_msg'])){
                        echo '<p style="color:red">'.$_GET['add_err_msg'].'</p>';
                    }
                    if(isset($_GET['add_msg'])){
                        echo '<p style="color:green">'.$_GET['add_msg'].'</p>';
                    }
                ?>
            </div>
        </div>
    </section>

    <section class="home">
        <h1>Home Page</h1>
        <p>Hi its home page</p>

        <div class="row">
            <div class="home-col">
                <h3>Homee</h3>
                <p>Its row text</p>
            </div>
            <div class="home-col">
                <h3>Homee</h3>
                <p>Its row text</p>
            </div>
            <div class="home-col">
                <h3>Homee</h3>
                <p>Its row text</p>
            </div>
        </div>
    </section>

    <section class="test">
        <h1>What the Students Says</h1>
        <p>Very good application</p>

        <div class="row">
            <div class="test-col">
                <img src="./user1.jpg">
                <div>
                    <p>Very good application</p>
                    <h3>Sarah Berley</h3>
                </div>
            </div>

            <div class="test-col">
                <img src="./user2.jpg">
                <div>
                    <p>Very good application</p>
                    <h3>Sarah Berley</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div id="footer-end">
            <p>&copy; Copy right 2024 Student Feedback Sysetm All Rights Reserved</p>
            <div id="footer-text">
                <p class="footer-item">Contact Us</p>
                <p style="margin: 0px 10px;"> | </p>
                <p class="footer-item">Privacy</p>
                <p style="margin: 0px 10px;"> | </p>
                <p class="footer-item">Policy</p>
            </div>
        </div>
    </footer>

<?php include('parts/footer.php');?>