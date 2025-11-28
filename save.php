<?php
include("db.php");

$fullname     = $_POST['fullname'];
$email        = $_POST['email'];
$phone        = $_POST['phone'];
$college_name = $_POST['college_name'];
$degree       = $_POST['degree'];
$start_year   = $_POST['start_year'];
$end_year     = $_POST['end_year'];

$sql = "INSERT INTO students_education 
(fullname, email, phone, college_name, degree, start_year, end_year)
VALUES 
('$fullname', '$email', '$phone', '$college_name', '$degree', '$start_year', '$end_year')";

if ($conn->query($sql) === TRUE) {
    echo "echo <script>
window.location.href = 'showData.php';
</script>";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>