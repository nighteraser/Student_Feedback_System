<?php
    include("functions/dbcon.php");
    
    try {
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("INSERT INTO Student (studentName, passwd) VALUES (:studentName, :passwd)");
        $stmt->bindParam(':studentName', $studentName);
        $stmt->bindParam(':passwd', $passwd);
        
        $studentName = "test";
        $passwd = "test";
        $stmt->execute();        

    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn->close();
?>
