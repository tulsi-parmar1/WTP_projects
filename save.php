<?php
session_start();
include("db.php");

// Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
    die("Unauthorized Access! Please login first.");
}

$student_id   = $_SESSION['user_id'];  // Logged in user ID
$fullname     = $_POST['fullname'];
$email        = $_POST['email'];
$phone        = $_POST['phone'];
$college_name = $_POST['college_name'];
$degree       = $_POST['degree'];
$start_year   = $_POST['start_year'];
$end_year     = $_POST['end_year'];

$sql = "INSERT INTO students_education 
(student_id, fullname, email, phone, college_name, degree, start_year, end_year)
VALUES 
('$student_id', '$fullname', '$email', '$phone', '$college_name', '$degree', '$start_year', '$end_year')";

if ($conn->query($sql) === TRUE) {
    echo "<script>
            window.location.href = 'showData.php';
          </script>";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
