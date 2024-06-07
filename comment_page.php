<?php
session_start();
include('parts/header.php');
include('functions/dbcon.php');

    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] === FALSE){
        header("Location: main_page.php?search_err_msg=You need to log in!!!");
        exit();
    }

    if (!isset($_POST['search']) || empty($_POST['professor_name'])) {
        header("location: main_page.php?search_err_msg=".$_POST['professor_name']." does not exist");
    }else{
        $professor_name = $_POST['professor_name'];
    }

    $sql = "SELECT id, department FROM Professor WHERE professorName = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $professor_name); 
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        $professor_id = $row['id'];
        $department = $row['department'];
    }else{
        header("location: main_page.php?search_err_msg=".$_POST['professor_name']." does not exist");
        exit();
    }

    $sql = "SELECT AVG(rate) as avg_rate, AVG(difficulty) as avg_difficulty, COUNT(rate) as tot_courses
            FROM review 
            WHERE review.professorid = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $professor_id); 
    $stmt->execute();
    $avg_result = $stmt->get_result();  

    $avg_rate = 0;
    $avg_difficulty = 0;
    if ($avg_row = $avg_result->fetch_assoc()) {
        $avg_rate = $avg_row['avg_rate'];
        $avg_difficulty = $avg_row['avg_difficulty'];
        $tot_courses = $avg_row['tot_courses'];
    }

    $sql = "SELECT COUNT(takeAgain) as tot_takeAgain
            FROM review 
            WHERE review.professorid = ?
            AND takeAgain = TRUE";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $professor_id); 
    $stmt->execute();
    $result = $stmt->get_result();  

    if ($row = $result->fetch_assoc()) {
        $tot_takeAgain = $row['tot_takeAgain'];
    }

    $sql = "SELECT rate, COUNT(*) AS count
            FROM Review
            WHERE review.professorid = ?
            GROUP BY rate
            ORDER BY rate;";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $professor_id); 
    $stmt->execute();
    $result = $stmt->get_result();  
    $ratings_count = array_fill(1, 5, 0);
    $max_rating = 0;

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $ratings_count[$row["rate"]] = $row["count"];
            if($row["count"] > $max_rating) $max_rating = $row["count"];
        }
    }

    $sql = "
        SELECT r.rate, r.difficulty, Course.courseName, r.attendence, r.takeAgain, r.textbook, r.comment 
        FROM Review r
        JOIN Course ON r.courseid = Course.id
        JOIN Professor p ON r.professorid = p.id 
        WHERE p.professorName = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $professor_name); 
        $stmt->execute();
        $result = $stmt->get_result();
        // $result = $conn->query($sql);
?>

<body>
    <!-- navbar -->
    <?php include('parts/navbar.php') ?>

    <!-- Professor -->
    <section id="Professor" class="my-3">
        <div class="container">
            <div class="row">
                <!-- Professor Introduction -->
                <div class="col">
                    <div class="card border-0">
                        <div class="card-body">
                            <h1 class="card-title mb-4" style="font-size: 72px;"><?php echo round($avg_rate)?> <span class="fs-4">/5</span></h1>
                            <h3 class="card-subtitle mb-2" style="font-size: 40px;"><?php echo $professor_name;?></h3>
                            <p class="card-text">Professor in the <?php echo $department?> department at Tamkang University
                            </p>

                            <!-- Figure -->
                            <div class="card-group text-center mb-5" style="width: 400px;">
                                <div class="card border-0">
                                    <div class="card-body">
                                        <h3 class="card-subtitle fw-bold" style="border-right-color: black;">
                                            <?php  
                                            if($tot_courses == 0)
                                                echo "N/A";
                                            else
                                                echo round($tot_takeAgain/$tot_courses*100) . "%";
                                            ?>
                                        </h3>
                                        <p class="card-text">Would be taken</p>
                                    </div>
                                </div>
                                <div class="vr"></div>
                                <div class="card border-0">
                                    <div class="card-body">
                                        <h3 class="card-subtitle fw-bold"><?php echo round($avg_difficulty, 1)?></h3>
                                        <p class="card-text">Level of Difficulty</p>
                                    </div>
                                </div>
                            </div>
                            <form action="rate_page.php"  method="POST">
                                <input type="hidden" name="professor_name" value="<?=$professor_name?>"/>
                                <input type="hidden" name="professor_id" value="<?=$professor_id?>"/>

                                <button class="btn btn-primary py-1 pe-1" name="rate" type="submit">Rate
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                    class="bi bi-arrow-right" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                                </svg>
                                </button>
                            </form>
                            <?php
                            if(isset($_GET['error_msg'])){
                                echo "<p style=\"color:Tomato;\"> ERROR: ".$_GET['error_msg']."</p>";
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <!-- Rating Distribution -->
                <div class="col container" style="width: 500px; height: 320px; background-color: #F8F9FA;">
                    <div class="text-start">
                        <div class="my-3">Rating Distribution</div>
                        <div>
                            <ul class="row align-items-center">
                                <li class="col">
                                    <div>Awesome 5</div>
                                </li>
                                <li class="col">
                                    <div class="box">
                                    <div class="progress" style="height: 30px;">  
                                        <div class="progress-bar" role="progressbar" style="width: <?php echo $ratings_count[5]/$max_rating*100?>%" ></div>
                                    </div>
                                    </div>
                                </li>
                                <li class="col">
                                    <div><?php echo $ratings_count[5]?></div>  
                                </li>
                            </ul>
                            <ul class="row align-items-center">
                                <li class="col">
                                    <div>Great 4</div>
                                </li>
                                <li class="col">
                                    <div class="box">
                                    <div class="progress" style="height: 30px;">
                                    <div class="progress-bar" role="progressbar" style="width: <?php echo $ratings_count[4]/$max_rating*100?>%" ></div>
                                    </div>
                                    </div>
                                </li>
                                <li class="col">
                                    <div><?php echo $ratings_count[4]?></div>
                                </li>
                            </ul>
                            <ul class="row align-items-center">
                                <li class="col">
                                    <div>Good 3</div>
                                </li>
                                <li class="col">
                                    <div class="box">
                                    <div class="progress" style="height: 30px;">
                                    <div class="progress-bar" role="progressbar" style="width: <?php echo $ratings_count[3]/$max_rating*100?>%" ></div>
                                    </div>
                                    </div>
                                </li>
                                <li class="col">
                                    <div><?php echo $ratings_count[3]?></div>
                                </li>
                            </ul>
                            <ul class="row align-items-center">
                                <li class="col">
                                    <div>OK 2</div>
                                    
                                </li>
                                <li class="col">
                                    <div class="box">
                                    <div class="progress" style="height: 30px;">
                                    <div class="progress-bar" role="progressbar" style="width: <?php echo $ratings_count[2]/$max_rating*100?>%" ></div>
                                    </div>
                                    </div>
                                </li>
                                <li class="col">
                                    <div><?php echo $ratings_count[2]?></div>
                                </li>
                            </ul>
                            <ul class="row align-items-center">
                                <li class="col">
                                    <div>Aweful 1</div>
                                </li>
                                <li class="col">
                                    <div class="box">
                                    <div class="progress" style="height: 30px;">
                                    <div class="progress-bar" role="progressbar" style="width: <?php echo $ratings_count[1]/$max_rating*100?>%" ></div>
                                    </div>
                                    </div>
                                </li>
                                <li class="col">
                                    <div><?php echo $ratings_count[1]?></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <hr class="m-5">
    <!-- Comments -->
    <section id="Comment">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Course List -->
                <div class="dropdown mb-3">
                    <a class="btn btn-transparent border-dark text-dark dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        All courses
                    </a>
                    <ul class="dropdown-menu">
                        <!-- <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li> -->
                    </ul>
                </div>
                <!-- Student Feedbacks  -->
                <?php
                    if ($result->num_rows > 0) {
                        // Output data for each row
                        $difficulty_sum = 0;
                        while($row = $result->fetch_assoc()) {
                            $quality = $row['rate'];
                            $difficulty = $row['difficulty'];
                            $course_name = $row['courseName'];
                            $attendance = $row['attendence'] ? 'Yes' : 'No';
                            $taken_again = $row['takeAgain'] ? 'Yes' : 'No';
                            $textbook = $row['textbook'] ? 'Yes' : 'No';
                            $comment = $row['comment'];
                ?>
                    <div>
                        <div class="row shadow-sm p-4 my-3" style="background-color: #F8F9FA;">
                            <div class="col-2 ps-5">
                                <div class="mb-4">
                                    <div>
                                        <h6>Qualitys</h6>
                                    </div>
                                    <div class="data" style="background-color: cornflowerblue;"><?php echo $quality?>.0</div>
                                </div>
                                <div>
                                    <h6>Difficulty</h6>
                                    <div class="data" style="background-color:cadetblue;"><?php echo $difficulty?>.0</div>
                                </div>
                            </div>
                            <div class="col-8">
                                <h3><?php echo $course_name?></h3>
                                <ul class="row p-0 mb-2">
                                    <li class="col">Attendence: <?php echo $attendance?></li>
                                    <li class="col">Would taken again: <?php echo $taken_again?></li>
                                    <li class="col">Textbook: <?php echo $textbook?></li>
                                </ul>
                                <p><?php echo $comment?></p>
                            </div>
                        </div>
                    </div>            

                <?php
                        }
                    }else {
                        echo "0 results";
                    }
                    $conn->close();
                ?>

    </section>

<?php include('parts/footer.php')?>