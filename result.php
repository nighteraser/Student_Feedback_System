<?php
include("dbcon.php");

if (isset($_POST['search']) && !empty($_POST['teacher_name'])) {
    $teacher_name = $_POST['teacher_name'];

    $stmt = $connection->prepare("
        SELECT Reviews.Rating, Reviews.StudentComment 
        FROM Reviews 
        JOIN Teachers 
        ON Reviews.TeacherID = Teachers.TeacherID
        WHERE Teachers.TeacherName = ?
    ");

    $stmt->bind_param("s", $teacher_name);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<h1>Comments and Ratings for " . htmlspecialchars($teacher_name) . "</h1>";
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
            echo "<li>Rating: " . htmlspecialchars($row['Rating']) . "/5 - Comment: " . htmlspecialchars($row['StudentComment']) . "</li>";
        }
        echo "</ul>";
    } else {
        echo "No comments found for " . htmlspecialchars($teacher_name);
    }

    $stmt->close();
} else {
    echo "Please provide a teacher's name to search for comments.";
}

$connection->close();
?>

