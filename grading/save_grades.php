<?php
$servername = "localhost"; 
$username = "csc350"; 
$password = "xampp"; 
$dbname = "scores_db"; 


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_name = $_POST['student_name']; 
    $final_grade = $_POST['final_grade']; 

    
    $stmt = $conn->prepare("INSERT INTO scores (student_name, final_grade) VALUES (?, ?)");
    $stmt->bind_param("si", $student_name, $final_grade);

    if ($stmt->execute()) {
        echo "Grade saved successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>
