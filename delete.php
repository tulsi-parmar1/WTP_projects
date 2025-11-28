<?php
include("db.php");

// Check if id is passed
if (!isset($_GET['id'])) {
    die("Invalid Request! No ID provided.");
}

$id = $_GET['id'];

// Delete query
$sql = "DELETE FROM students_education WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "<script>
            window.location = 'showData.php';
          </script>";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
