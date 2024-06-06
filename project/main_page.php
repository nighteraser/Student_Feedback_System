<?php
session_start();
include('header.php');
?>

<body>
    <nav class="navbar navbar-expand-lg" style="background-color: #242424;">
        <div class="container-fluid">
            <a class="navbar-brand mx-3" href="#">
                <span class="material-symbols-outlined" style="color: white;">
                    school
                </span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse align-items-center justify-content-end" id="navbarNav">
                <ul class="navbar-nav nav">
                    <li class="nav-item"><a class="fs-6 nav-links" href="">HOME</a></li>
                    <li class="nav-item"><a class="fs-6 nav-links" href="">ABOUT</a></li>
                    <li class="nav-item"><a class="fs-6 nav-links" href="">CONTACT</a></li>
                <?php
                    if (isset($_SESSION['student_name'])){
                        echo '<div class="dropdown">';
                        echo '<a class="btn btn-light fs-6" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">';
                        echo $_SESSION['student_name'] . '</a>';
                        echo '<ul class="dropdown-menu">';
                        echo '<li><a class="dropdown-item" href="logout.php">Logout</a></li>';
                        echo '</ul>';
                    }else{
                        echo '<li class="nav-item"><a class="btn btn-light fs-6" href="login_page.php" role="button" data-bs-target="#Modal1" aria-expanded="false">Log In</a></li>';
                        echo '<li class="nav-item mx-3"><a class="btn btn-light fs-6" href="register_page.php" role="button" data-bs-target="#Modal2" >Sign Up</a></li>';
                    }
                ?>
                </ul>
            </div>
        </div>
    </nav>
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

<?php include('footer.php');?>