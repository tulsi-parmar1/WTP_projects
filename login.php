<?php
session_start();
include("db.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass  = mysqli_real_escape_string($conn, $_POST['password']);
    // Check if email exists
    $query = mysqli_query($conn, "SELECT * FROM students WHERE email='$email' ");
    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);
        $hashed_password = $row['password'];
        // Verify password
        if (password_verify($pass, $hashed_password)) {
            // store session for login  
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['name'];
            echo "<script>alert('Login Successful!'); window.location='gmcaWebResponsive.php';</script>";
            exit();
        } else {
            echo "<script>alert('Incorrect Password');</script>";
        }
    } else {
        echo "<script>alert('Email not found');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>GMCA - Login</title>

<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    }

    body{
        height: 100vh;
        background: #f5f5f5;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .login-container{
        width: 420px;
        background: #fff;
        padding: 35px 40px;
        border-radius: 12px;
        box-shadow: 0 4px 16px rgba(0,0,0,0.12);
        border-top: 6px solid #ff8c00;
    }

    .title{
        text-align: center;
        margin-bottom: 25px;
        font-size: 26px;
        font-weight: 700;
        color: #333;
    }

    .title span{
        color: #32a852;   /* Green */
    }

    .input-group{
        margin-bottom: 18px;
    }

    .input-group label{
        font-size: 15px;
        font-weight: 600;
        color: #444;
        display: block;
        margin-bottom: 6px;
    }

    .input-group input{
        width: 100%;
        padding: 12px 15px;
        font-size: 15px;
        border: 1.8px solid #ccc;
        border-radius: 8px;
        outline: none;
        transition: 0.2s;
    }

    .input-group input:focus{
        border-color: #ff8c00;
        box-shadow: 0 0 5px rgba(255,140,0,0.3);
    }

    .btn{
        width: 100%;
        padding: 12px;
        font-size: 16px;
        font-weight: 700;
        border: none;
        background: #ff8c00;
        color: #fff;
        border-radius: 8px;
        cursor: pointer;
        transition: 0.3s;
    }

    .btn:hover{
        background: #e77a00;
    }

    .register-text{
        text-align: center;
        margin-top: 15px;
        font-size: 14px;
        color: #555;
    }

    .register-text a{
        color: #32a852;
        text-decoration: none;
        font-weight: 600;
    }
</style>

</head>
<body>

<div class="login-container">
    <h2 class="title"> <span>Login</span></h2>

    <form action="#" method="POST">

        <div class="input-group">
            <label>Email</label>
            <input type="text" name="email" required>
        </div>

        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password" required>
        </div>

        <button class="btn">Login</button>

        <p class="register-text">Don't have an account? <a href="register.php">Register</a></p>

    </form>
</div>

</body>
</html>
