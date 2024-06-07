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
                        <li class="nav-item"><a class="fs-6 nav-links" href="main_page.php">HOME</a></li>
                        <li class="nav-item"><a class="fs-6 nav-links" href="main_page.php">ABOUT</a></li>
                        <li class="nav-item"><a class="fs-6 nav-links" href="main_page.php">CONTACT</a></li>
                    <?php
                        if (isset($_SESSION['student_name'])){
                            echo '<div class="dropdown">';
                            echo '<a class="btn btn-light fs-6" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">';
                            echo $_SESSION['student_name'] . '</a>';
                            echo '<ul class="dropdown-menu">';
                            echo '<li><a class="dropdown-item" href="functions/logout.php">Logout</a></li>';
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
