<?php
session_start();
include("db.php");

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id']; // logged-in student ID

// Check if id is passed
if (!isset($_GET['id'])) {
    die("Invalid Request! No ID provided.");
}

$id = $_GET['id'];

// Delete query - only delete if it belongs to the logged user
$sql = "DELETE FROM students_education 
        WHERE id = $id AND student_id = $user_id";

if ($conn->query($sql) === TRUE) {
    // Redirect after deletion
    $_SESSION['msg'] = "Record deleted successfully!";
    header("Location: showData.php");
    exit();
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
