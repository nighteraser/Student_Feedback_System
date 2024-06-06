<!doctype html>
<html lang="en">
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Student Feedback System </title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@40,500,0,0" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@40,400,0,0" />
    <!-- style.css -->
    <link rel="stylesheet" href="style.css">

    <!-- <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.google.com/share?selection.family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles.css"> -->
</head>

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
                    <li class="nav-item"><a class="btn btn-light fs-6" href="#" role="button" data-bs-toggle="modal"
                            data-bs-target="#Modal1" aria-expanded="false">Log In</a></li>
                    <!-- Modal LogIn -->
                    <div class="modal fade" id="Modal1" tabindex="-1" aria-labelledby="exampleModalLabel1"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header text-center">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel1">STUDENT Log In</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="mb-3">
                                            <label for="username_login" class="col-form-label">User Name</label>
                                            <input type="text" class="form-control" id="username_login">
                                        </div>
                                        <div class="mb-3">
                                            <label for="password_login" class="col-form-label">Password</label>
                                            <input type="text" class="form-control" id="password_login">
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">OK</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <li class="nav-item mx-3"><a class="btn btn-light fs-6" href="#" role="button"
                            data-bs-toggle="modal" data-bs-target="#Modal2" aria-expanded="false">Sign Up</a></li>
                    <!-- Modal Sign Up -->
                    <div class="modal fade" id="Modal2" tabindex="-1" aria-labelledby="exampleModalLabel2"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header text-center">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel2">STUDENT SIGN UP</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="mb-3">
                                            <label for="username_signup" class="col-form-label">User Name</label>
                                            <input type="text" class="form-control" id="username_signup">
                                        </div>
                                        <div class="mb-3">
                                            <label for="password_signup" class="col-form-label">Password</label>
                                            <input type="text" class="form-control" id="password_signup">
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">OK</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </ul>
            </div>
        </div>
    </nav>
    <section class="header">
        <div class="text-box">
            <h1>Student Feedback System</h1>
            <h5 class="fw-light mb-2">It's feedback system</h5>
            <!-- <a class="btn btn-secondary mb-4" href="mainpage.html">Visit</a> -->
            <div class="d-flex justify-content-center px-5">
                <div class="search">
                    <input type="text" class="search-input" placeholder="Search..." name="">
                    <a href="#" class="search-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-search" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                        </svg>
                    </a>
                </div>
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
                <div class="test-col-img"></div>
                <div>
                    <p>Very good application</p>
                    <h3>Sarah Berley</h3>
                </div>
            </div>

            <div class="test-col">
                <div class="test-col-img"></div>
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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
</body>

</html>     