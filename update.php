<?php
session_start();

// If not logged in → redirect
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include("db.php");

$data = [];  // store edit data
$id = "";

// ------------------------------------------
// 1️⃣ IF FORM SUBMITTED → UPDATE DATA
// ------------------------------------------
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id'] ?? null;

    if ($id == null) {
        die("Invalid Request! Missing ID.");
    }

    // Fetch form values
    $fullname     = $_POST['fullname'];
    $email        = $_POST['email'];
    $phone        = $_POST['phone'];
    $college_name = $_POST['college_name'];
    $degree       = $_POST['degree'];
    $start_year   = $_POST['start_year'];
    $end_year     = $_POST['end_year'];

    // Update query
    $sql = "UPDATE students_education SET 
                fullname = '$fullname',
                email = '$email',
                phone = '$phone',
                college_name = '$college_name',
                degree = '$degree',
                start_year = '$start_year',
                end_year = '$end_year'
            WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Record Updated Successfully!');
                window.location='showData.php';
              </script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    exit();
}


// ------------------------------------------
// 2️⃣ IF PAGE OPENED WITH GET → FETCH EXISTING DATA
// ------------------------------------------
$id = $_GET['id'] ?? null;

if ($id) {
    $query = "SELECT * FROM students_education WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
} else {
    die("No ID provided!");
}

?>
