<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include("db.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// ------------------------------
// UPDATE FORM SUBMISSION
// ------------------------------
if ($_SERVER["REQUEST_METHOD"] == "POST" ) {

    $id = $_POST['id'];
    $student_id = $_SESSION['user_id'];

    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $college_name = $_POST['college_name'];
    $degree = $_POST['degree'];
    $start_year = $_POST['start_year'];
    $end_year = $_POST['end_year'];

    $sql = "UPDATE students_education SET
                fullname='$fullname',
                email='$email',
                phone='$phone',
                college_name='$college_name',
                degree='$degree',
                start_year='$start_year',
                end_year='$end_year'
            WHERE id=$id AND student_id=$student_id";

    if ($conn->query($sql)) {
        echo "<script>alert('Record Updated Successfully!'); window.location='showData.php';</script>";
        exit();
    } else {
        echo "Update error: " . $conn->error;
    }
}
?>
