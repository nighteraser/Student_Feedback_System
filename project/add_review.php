<?php
session_start();
include('dbcon.php');

$sql = "SELECT COUNT(id) as tot_review
        From Review
        WHERE studentid = ?
        AND professorid = ?
        AND courseid = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("iii", $_SESSION['student_id'], $_POST['professor_id'], $_POST['course_id']);
$stmt->execute();

if ($stmt->get_result()->fetch_assoc()['tot_review'] > 0){
    echo "nOOOOOO";
    exit();
}


$sql = "INSERT INTO Review (studentid, professorid, courseid, comment, rate, difficulty, takeAgain, textbook, attendence, grade) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("iiisiiiiis", $_SESSION['student_id'], $_POST['professor_id'], $_POST['course_id'], $_POST['comment'], 
                                $_POST['rate'], $_POST['difficulty'], $_POST['takeAgain'], $_POST['textbook'], $_POST['attendence'], $_POST['grade']);

$stmt->execute();

echo "New records created successfully";

$conn = null;
?>
