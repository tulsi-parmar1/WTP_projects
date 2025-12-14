<?php
include("db.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['register'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_pass = mysqli_real_escape_string($conn, $_POST['confirm_password']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);

    // -------------------------
    // PASSWORD VALIDATION
    // -------------------------
    $passErrors = [];

    if (strlen($pass) < 6) {
        $passErrors[] = "Password must be at least 6 characters long";
    }
    if (!preg_match('/[A-Z]/', $pass)) {
        $passErrors[] = "Password must contain at least one uppercase letter";
    }
    if (!preg_match('/[0-9]/', $pass)) {
        $passErrors[] = "Password must contain at least one digit";
    }
    if ($pass !== $confirm_pass) {
        $passErrors[] = "Password and Confirm Password must be same";
    }

    // If errors exist
    if (!empty($passErrors)) {
        $errorText = implode("\\n", $passErrors);
        echo "<script>alert('$errorText');</script>";
        exit();
    }

    // Hash password
    $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

    // Email duplicate check
    $check = mysqli_query($conn, "SELECT * FROM students WHERE email='$email'");
    if (mysqli_num_rows($check) > 0) {
        echo "<script>alert('Email already exists!');</script>";
    } else {
        // Insert data
        $sql = "INSERT INTO students (name, email, password, phone_number)
                VALUES ('$name', '$email', '$hashed_pass', '$phone')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Registration Successful!'); window.location='login.php';</script>";
            exit();
        } else {
            echo mysqli_error($conn);
            echo "<script>alert('Error: Could not register');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GMCA - Registration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            margin: 0;
            padding: 0;
            background: #f2f8f3;
            font-family: "Segoe UI", sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 420px;
            background: white;
            padding: 35px 40px;
            border-radius: 12px;
            box-shadow: 0 4px 18px rgba(0, 0, 0, 0.15);
            border-top: 6px solid #ff8c00;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 26px;
            color: #333;
        }

        h2 span {
            color: #32a852;
        }

        label {
            font-weight: 600;
            font-size: 14px;
            color: #444;
            display: block;
            margin-bottom: 6px;
        }

        input {
            width: 100%;
            padding: 12px;
            font-size: 15px;
            border: 1.8px solid #ccc;
            border-radius: 8px;
            outline: none;
            transition: 0.3s;
            margin-bottom: 18px;
        }

        input:focus {
            border-color: #32a852;
            box-shadow: 0 0 6px rgba(50, 168, 82, 0.3);
        }

        .btn {
            width: 100%;
            padding: 12px;
            background: #ff8c00;
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn:hover {
            background: #32a852;
        }

        .bottom-text {
            text-align: center;
            margin-top: 12px;
            font-size: 14px;
        }

        .bottom-text a {
            color: #ff8c00;
            text-decoration: none;
            font-weight: 600;
        }

        .bottom-text a:hover {
            text-decoration: underline;
        }

        .password-wrapper {
            position: relative;
        }

        .password-wrapper i {
            position: absolute;
            right: .5px;
            top: 35%;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 18px;
            color: #666;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2><span>Register</span></h2>

        <form method="POST" action="">

            <label>Name</label>
            <input type="text" placeholder="Enter your full name" required name="name">

            <label>Email</label>
            <input type="email" placeholder="Enter your email" required name="email">

            <label>Password</label>
            <div class="password-wrapper">
                <input type="password" placeholder="Create your password" required name="password" id="password">
                <i class="fa-solid fa-eye togglePass" data-target="password"></i>
            </div>

            <label>Confirm Password</label>
            <div class="password-wrapper">
                <input type="password" placeholder="Re-enter your password" required name="confirm_password"
                    id="confirm_password">
                <i class="fa-solid fa-eye togglePass" data-target="confirm_password"></i>
            </div>


            <label>Phone Number</label>
            <input type="text" placeholder="Enter your mobile number" required name="phone">

            <button class="btn" type="submit" name="register">Register</button>
        </form>

        <div class="bottom-text">
            Already have an account? <a href="login.php">Login here</a>
        </div>
    </div>


    <!-- FRONTEND PASSWORD VALIDATION -->
    <script>
        document.querySelector("form").addEventListener("submit", function (e) {
            let pass = document.getElementById("password").value;
            let confirmPass = document.getElementById("confirm_password").value;

            let errors = [];

            if (pass.length < 6) {
                errors.push("Password must be at least 6 characters long");
            }
            if (!/[A-Z]/.test(pass)) {
                errors.push("Password must contain at least one uppercase letter");
            }
            if (!/[0-9]/.test(pass)) {
                errors.push("Password must contain at least one digit");
            }
            if (pass !== confirmPass) {
                errors.push("Password and Confirm Password should match");
            }

            if (errors.length > 0) {
                alert(errors.join("\n"));
                e.preventDefault();
            }
        });

        //------------PASSWORD HIDE-SHOW----------------
        document.querySelectorAll(".togglePass").forEach(icon => {
            icon.addEventListener("click", function () {
                let input = document.getElementById(this.dataset.target);

                if (input.type === "password") {
                    input.type = "text";
                    this.classList.remove("fa-eye");
                    this.classList.add("fa-eye-slash");
                } else {
                    input.type = "password";
                    this.classList.remove("fa-eye-slash");
                    this.classList.add("fa-eye");
                }
            });
        });
    </script>

</body>

</html>