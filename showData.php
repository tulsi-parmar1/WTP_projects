<?php
session_start();
if(!isset($_SESSION['user_id'])){
    // user is NOT logged in
    header("Location: login.php");
    exit();
}
?>

<?php
// Include database connection
include("db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Show Student Data</title>

<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>

<style>
    body{
        font-family: "Segoe UI", sans-serif;
        background: #f2f8ff;
        padding: 20px;
    }
    table{
        border-collapse: collapse;
        width: 100%;
        background: #fff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }
    th, td{
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    th{
        background: #ff8c00;
        color: #fff;
    }
    tr:hover{
        background: #f0f8ff;
    }
    i{
        margin: 0 5px;
        cursor: pointer;
        font-size: 16px;
        color: #ff8c00;
        transition: 0.3s;
    }
    i:hover{
        color: #32a852;
    }
    .add-btn{
        margin-bottom: 10px;
        display: inline-block;
        padding: 8px 15px;
        background: #ff8c00;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        font-weight: bold;
        transition: 0.3s;
    }
    .add-btn:hover{
        background: #32a852;
    }
     .back-btn {
        margin-top: 15px;
        text-align: center;
      }

      .back-btn button {
        background-color: #ffa726;
        color: white;
        border: none;
        padding: 6px 15px;
        border-radius: 8px;
        cursor: pointer;
        font-weight: 600;
        transition: 0.3s;
      }

      .back-btn button:hover {
        background-color: #fb8c00;
      }
</style>
</head>
<body>
 <div class="back-btn">
          <button onclick="history.back()">← Back</button>
        </div>
<h2>Student Education Data</h2>
<a class="add-btn" href="underGraduateDataRes.php"><i class="fas fa-plus"></i> Add New</a>

<table>
    <tr>
        <th>Full Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>College Name</th>
        <th>Degree</th>
        <th>Start Year</th>
        <th>End Year</th>
        <th>Actions</th>
    </tr>

    <?php
    // Fetch data from table
    $query = "SELECT * FROM students_education ORDER BY id DESC";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>{$row['fullname']}</td>";
            echo "<td>{$row['email']}</td>";
            echo "<td>{$row['phone']}</td>";
            echo "<td>{$row['college_name']}</td>";
            echo "<td>{$row['degree']}</td>";
            echo "<td>{$row['start_year']}</td>";
            echo "<td>{$row['end_year']}</td>";
            echo "<td>
                    <a href='edit.php?id={$row['id']}'><i class='fas fa-edit'></i></a>
                    <a href='delete.php?id={$row['id']}' onclick='return confirm(\"Are you sure?\")'><i class='fas fa-trash'></i></a>
                  </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='9' style='text-align:center;'>No records found</td></tr>";
    }
    ?>
</table>

</body>
</html>
