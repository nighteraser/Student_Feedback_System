<?php
session_start();
include('parts/header.php');
include('functions/dbcon.php');

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || !isset($_POST['rate'])) {
    header("Location: comment_page.php");
    exit();
}
$professor_name = $_POST['professor_name'];
$professor_id = $_POST['professor_id'];

$sql = "SELECT courseName, id FROM Course WHERE professorid=$professor_id";
$course_result = $conn->query($sql);

?>

<body>
    <!-- navbar -->
    <?php include('parts/navbar.php') ?>

    <!-- Rate Page -->
    <section class="my-2">
        <div class="container">
            <h1 class="fw-light">Rate: <span class="fw-bold"><?php echo $professor_name?></span></h1>
        </div>
        
        <!-- Questions -->
        <form action="functions/add_review.php" method="POST" class="was-validated">
        <input type="hidden" name="professor_id" value="<?=$professor_id?>"/>
        <div class="container needs-validation">
            <!-- Select course -->
            <div class="row p-4 my-3" style="background-color: white; box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.15)">
                <div class="col">
                    <h6 class="fw-bold mb-4">Select course name
                        <span style="color: tomato;">*</span>
                    </h6>
                    <select class="form-select mx-auto" style="width: 450px;" aria-label="Default select example" name="course_id" required>
                        <option value="">Select course name</option>
                        <?php
                        while($row = $course_result->fetch_assoc()){
                            echo "<option value=". $row['id'] .">" . $row['courseName'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <!-- Rate your Professor -->
            <div class="row p-4 my-3" style="background-color: white; box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.15)">
                <div class="col">
                    <h6 class="fw-bold mb-4">Rate your Professor
                        <span style="color: tomato;">*</span>
                    </h6>
                    <div class="text-center">
                        <div class="btn-group mx-auto" role="group">
                            <input type="radio" class="btn-check" name="rate" id="btnradio1" autocomplete="off" value=1
                                checked>
                            <label class="btn btn-outline-dark border-secondary" style="width: 80px; height: 40px;"
                                for="btnradio1">1</label>

                            <input type="radio" class="btn-check" name="rate" id="btnradio2" autocomplete="off" value=2>
                            <label class="btn btn-outline-dark border-secondary" style="width: 80px; height: 40px;"
                                for="btnradio2">2</label>

                            <input type="radio" class="btn-check" name="rate" id="btnradio3" autocomplete="off" value=3>
                            <label class="btn btn-outline-dark border-secondary" style="width: 80px; height: 40px;"
                                for="btnradio3">3</label>

                            <input type="radio" class="btn-check" name="rate" id="btnradio4" autocomplete="off" value=4>
                            <label class="btn btn-outline-dark border-secondary" style="width: 80px; height: 40px;"
                                for="btnradio4">4</label>

                            <input type="radio" class="btn-check" name="rate" id="btnradio5" autocomplete="off" value=5>
                            <label class="btn btn-outline-dark border-secondary" style="width: 80px; height: 40px;"
                                for="btnradio5">5</label>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Difficulty -->
            <div class="row p-4 my-3" style="background-color: white; box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.15)">
                <div class="col">
                    <h6 class="fw-bold mb-4">How difficult was this professor?
                        <span style="color: tomato;">*</span>
                    </h6>
                    <div class="text-center">
                        <div class="btn-group mx-auto" role="group">
                            <input type="radio" class="btn-check" name="difficulty" id="btnradio6" autocomplete="off" value=1
                                checked>
                            <label class="btn btn-outline-dark border-secondary" style="width: 80px; height: 40px;"
                                for="btnradio6">1</label>

                            <input type="radio" class="btn-check" name="difficulty" id="btnradio7" autocomplete="off" value=2>
                            <label class="btn btn-outline-dark border-secondary" style="width: 80px; height: 40px;"
                                for="btnradio7">2</label>

                            <input type="radio" class="btn-check" name="difficulty" id="btnradio8" autocomplete="off" value=3>
                            <label class="btn btn-outline-dark border-secondary" style="width: 80px; height: 40px;"
                                for="btnradio8">3</label>

                            <input type="radio" class="btn-check" name="difficulty" id="btnradio9" autocomplete="off" value=4>
                            <label class="btn btn-outline-dark border-secondary" style="width: 80px; height: 40px;"
                                for="btnradio9">4</label>

                            <input type="radio" class="btn-check" name="difficulty" id="btnradio10" autocomplete="off" value=5>
                            <label class="btn btn-outline-dark border-secondary" style="width: 80px; height: 40px;"
                                for="btnradio10">5</label>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Take again -->
            <div class="row p-4 my-3" style="background-color: white; box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.15)">
                <div class="col">
                    <h6 class="fw-bold mb-4">Would you take this Professsor again?
                        <span style="color: tomato;">*</span>
                    </h6>
                    <div class="row btn-group-horizontal justify-content-center text-center" role="group"
                        aria-label="Vertical radio toggle button group">
                        <div class="col-1">
                            <input type="radio" class="btn-check" name="takeAgain" id="vbtn-radio1" autocomplete="off" value=1
                                checked>
                            <label class="btn btn-outline-primary"
                                style="width: 60px; height: 60px; border-radius: 50%;" for="vbtn-radio1"></label>
                            <p>Yes</p>
                        </div>
                        <div class="col-1">
                            <input type="radio" class="btn-check" name="takeAgain" id="vbtn-radio2" autocomplete="off" value=0>
                            <label class="btn btn-outline-primary"
                                style="width: 60px; height: 60px; border-radius: 50%;" for="vbtn-radio2"></label>
                            <p>No</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Textbook -->
            <div class="row p-4 my-3" style="background-color: white; box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.15)">
                <div class="col">
                    <h6 class="fw-bold mb-4">Did this Professor use textbook?
                        <span style="color: tomato;">*</span>
                    </h6>
                    <div class="row btn-group-horizontal justify-content-center text-center" role="group"
                        aria-label="Vertical radio toggle button group">
                        <div class="col-1">
                            <input type="radio" class="btn-check" name="textbook" id="vbtn-radio3" autocomplete="off" value=1
                                checked>
                            <label class="btn btn-outline-primary"
                                style="width: 60px; height: 60px; border-radius: 50%;" for="vbtn-radio3"></label>
                            <p>Yes</p>
                        </div>
                        <div class="col-1">
                            <input type="radio" class="btn-check" name="textbook" id="vbtn-radio4" value=0
                                autocomplete="off">
                            <label class="btn btn-outline-primary"
                                style="width: 60px; height: 60px; border-radius: 50%;" for="vbtn-radio4"></label>
                            <p>No</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Attendence -->
            <div class="row p-4 my-3" style="background-color: white; box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.15)">
                <div class="col">
                    <h6 class="fw-bold mb-4">Was attendence mandatory?
                        <span style="color: tomato;">*</span>
                    </h6>
                    <div class="row btn-group-horizontal justify-content-center text-center" role="group"
                        aria-label="Vertical radio toggle button group">
                        <div class="col-1">
                            <input type="radio" class="btn-check" name="attendence" id="vbtn-radio5" autocomplete="off" value=1
                                checked>
                            <label class="btn btn-outline-primary"
                                style="width: 60px; height: 60px; border-radius: 50%;" for="vbtn-radio5"></label>
                            <p>Yes</p>
                        </div>
                        <div class="col-1">
                            <input type="radio" class="btn-check" name="attendence" id="vbtn-radio6" value=0
                                autocomplete="off">
                            <label class="btn btn-outline-primary"
                                style="width: 60px; height: 60px; border-radius: 50%;" for="vbtn-radio6"></label>
                            <p>No</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Grade -->
            <div class="row p-4 my-3" style="background-color: white; box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.15)">
                <div class="col">
                    <h6 class="fw-bold mb-4">Select grade received
                        <span style="color: tomato;">*</span>
                    </h6>
                    <select class="form-select mx-auto" style="width: 450px;" aria-label="Default select example" name="grade" required>
                        <option value="">Select course name</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="F">F</option>
                    </select>
                </div>
            </div>
            <!-- Review -->
            <div class="row p-4 my-3" style="background-color: white; box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.15)">
                <div class="col">
                    <h6 class="fw-bold mb-4">Write a review
                        <span style="color: tomato;">*</span>
                    </h6>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" name="comment"
                            style="height: 100px" required></textarea>
                        <label for="floatingTextarea2">Feedback</label>
                    </div>
                </div>
            </div>
            <!-- Submit -->
            <div class="row text-center">
                <div class="col">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </div>
        </div>
        </form>
    </section>

<?php include('parts/footer.php')?>