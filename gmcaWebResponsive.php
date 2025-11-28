<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GMCA-page</title>

    <style>
      /* ========== BASE STYLING ========== */
      body {
        background-color: #f2f8ff;
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        margin: 0;
        padding: 0;
      }

      table {
        border-collapse: collapse;
        width: 100%;
      }

      /* ========== HEADER ========== */
      .header {
        background-color: orange;
        color: black;
        width: 100%;
        text-align: center;
      }

      .header td {
        padding: 10px;
      }

      .header img {
        border-radius: 10px;
        margin: 5px;
        border: 2px solid white;
        height: 100px;
      }

      .header h1 {
        margin: 10px 0 5px 0;
        font-size: 28px;
      }

      .header div {
        font-size: 16px;
        color: #333;
      }

      /* ========== NAVBAR ========== */
      .navbar {
        background-color: gray;
        text-align: center;
        padding: 10px 0;
      }

      .navbar a {
        text-decoration: none;
        color: white;
        font-weight: bold;
        margin: 0 10px;
        display: inline-block;
        transition: color 0.3s ease;
      }

      .navbar a:hover {
        color: yellow;
      }

      /* ========== MAIN CONTENT ========== */
      .main-content {
        width: 100%;
        padding: 10px 0;
      }

      .main-content td {
        vertical-align: top;
        padding: 15px;
      }

      .left {
        width: 30%;
        background-color: #fff7e6;
        border-right: 2px solid orange;
      }

      .left h3 {
        color: #ff6600;
      }

      .left ul {
        list-style-type: square;
        color: #333;
        padding-left: 20px;
      }

      .center {
        width: 50%;
        background-color: #ffffff;
      }

      .center h1,
      .center h2 {
        color: green;
      }

      .center p {
        text-align: justify;
        color: #444;
      }

      .center table {
        width: 100%;
        margin-top: 10px;
      }

      input,
      textarea {
        width: 100%;
        padding: 5px;
        border: 1px solid #aaa;
        border-radius: 4px;
        margin-top: 5px;
      }

      button {
        background-color: orange;
        color: white;
        padding: 8px 16px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
        transition: 0.3s;
      }

      button:hover {
        background-color: green;
      }

      .right {
        width: 35%;
        background-color: #f8fff2;
        border-left: 2px solid green;
      }

      .right h3 {
        color: green;
      }

      .right ul {
        list-style-type: circle;
        padding-left: 20px;
      }

      .right a {
        color: #ff6600;
        text-decoration: none;
      }

      .right a:hover {
        text-decoration: underline;
      }

      /* ========== FOOTER ========== */
      .footer {
        background-color: green;
        color: white;
        text-align: center;
        padding: 10px 0;
        font-family: "Verdana", sans-serif;
      }

      /* ========== RESPONSIVE DESIGN ========== */
      @media (max-width: 1024px) {
        .header img {
          height: 80px;
        }

        .header h1 {
          font-size: 22px;
        }

        .navbar a {
          margin: 5px;
        }

        .left,
        .center,
        .right {
          padding: 10px;
        }
      }

      @media (max-width: 768px) {
        .header td {
          display: block;
          width: 100%;
          text-align: center;
        }

        .navbar {
          font-size: 14px;
        }

        .main-content tr {
          display: flex;
          flex-direction: column;
        }

        .left,
        .center,
        .right {
          width: 100%;
          border: none;
          border-bottom: 2px solid #ddd;
        }

        .center h1 {
          font-size: 22px;
        }

        .center h2 {
          font-size: 18px;
        }

        .center table td {
          display: block;
          width: 100%;
        }

        .center input,
        .center textarea {
          font-size: 14px;
        }
      }

      @media (max-width: 480px) {
        .header img {
          height: 60px;
        }

        .header h1 {
          font-size: 18px;
        }

        .navbar {
          padding: 8px 0;
        }

        .navbar a {
          display: block;
          padding: 5px 0;
        }

        .center h1,
        .center h2 {
          text-align: center;
        }

        .footer {
          font-size: 13px;
        }
      }
    </style>
  </head>

  <body>
    <table class="header" height="100px">
      <tr>
        <td>
          <img src="tulsiPic.jpg" alt="tulsiPic" />
          <img src="kiranPic.jpg" alt="" />
          <img src="shrutiPic.jpg" alt="" />
          <h4>Group No:9</h4>
        </td>

        <td>
          <h1>Welcome to GMCA Webpage</h1>
          <div>GMCA Number:25GMCA31,25GMCA52,25GMCA75</div>
        </td>

        <td>
          <img src="gmca_logo.jpg" alt="" height="200px" />
        </td>
      </tr>
    </table>
    <!-- Navbar -->
    <div class="navbar">
      <a href="#home">Home</a> | <a href="#about">About Us</a> |
      <a href="#admissions">Admissions</a> |
      <a href="#departments">Departments</a> | <a href="#events">Events</a> |
      <a href="#contact">Contact</a> |
      <!-- <a href="underGraduateDataRes.html">UndergraduateData</a> | -->
       <a href="showData.php">UndergraduateData</a> |
      <a href="Calc.php">Calculator</a> |
      <!-- <a href="login.php">login</a> |
      <a href="logout.php">logout</a> -->
       <?php if(!isset($_SESSION['user_id'])): ?>
      <a href="login.php">Login</a> |
  <?php else: ?>
      <a href="logout.php">Logout</a> |
  <?php endif; ?>
    </div>

    <!-- Main Content -->
    <table class="main-content">
      <tr>
        <td class="left">
          <h3 id="events">Latest News &amp; Events</h3>
          <ul>
            <li>New Admissions 2025</li>
            <li>Annual Cultural Events: 30 Sept – 5 Oct 2025</li>
            <li>Seminar on AI: 15 Oct 2025</li>
          </ul>
        </td>

        <td class="center">
          <h1>About our Institute</h1>
          <p>
            Established with a vision to develop future leaders, GMCA focuses on
            blending practical skills with strong theoretical foundations. Our
            faculty comprises experienced academicians and industry
            professionals.
          </p>
          <h2>Our Mission</h2>
          <p>
            We aim to produce skilled professionals who excel in their
            respective fields.
          </p>

          <h2>Contact Us</h2>
          <form id="contactForm" novalidate>
            <table>
              <tr>
                <td>Name:</td>
                <td>
                  <input
                    type="text"
                    name="name"
                    id="name"
                    required
                    minlength="3"
                    placeholder="Enter your name"
                  />
                  <div class="error" id="nameError"></div>
                </td>
              </tr>
              <tr>
                <td>Email:</td>
                <td>
                  <input
                    type="email"
                    name="email"
                    id="email"
                    required
                    placeholder="Enter your email"
                  />
                  <div class="error" id="emailError"></div>
                </td>
              </tr>
              <tr>
                <td>Message:</td>
                <td>
                  <textarea
                    name="message"
                    id="message"
                    required
                    minlength="10"
                    maxlength="50"
                    placeholder="Type your message (max 50 characters)"
                  ></textarea>
                  <div class="error" id="messageError"></div>
                </td>
              </tr>
              <tr>
                <td colspan="2" align="center">
                  <button type="submit">Submit</button>
                </td>
              </tr>
            </table>
          </form>
        </td>

        <td class="right">
          <h3>Important Links</h3>
          <ul>
            <li><a href="#">NPTEL</a></li>
            <li><a href="#">UGC</a></li>
            <li><a href="#">AICTE</a></li>
          </ul>
        </td>
      </tr>
    </table>

    <div class="footer">&copy; 2025 GMCA College. All rights reserved.</div>
    <script>
      const form = document.getElementById("contactForm");

      form.addEventListener("submit", (event) => {
        event.preventDefault(); // prevent default submit

        // clear all errors first
        document
          .querySelectorAll(".error")
          .forEach((el) => (el.textContent = ""));

        let valid = true;

        // Name validation
        const name = form.name.value.trim();
        const namePattern = /^[A-Za-z ]+$/; // only letters and spaces
        if (name === "") {
          document.getElementById("nameError").textContent =
            "Name is required.";
          document.getElementById("nameError").style.color = "red";
          valid = false;
        } else if (name.length < 3) {
          document.getElementById("nameError").textContent =
            "Name must be at least 3 characters.";
          document.getElementById("nameError").style.color = "red";
          valid = false;
        } else if (!namePattern.test(name)) {
          document.getElementById("nameError").textContent =
            "Name must contain only letters (no numbers or symbols).";
          document.getElementById("nameError").style.color = "red";
          valid = false;
        }

        // Email validation
        const email = form.email.value.trim();
        const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
        if (email === "") {
          document.getElementById("emailError").textContent =
            "Email is required.";
          document.getElementById("emailError").style.color = "red";
          valid = false;
        } else if (!emailPattern.test(email)) {
          document.getElementById("emailError").textContent =
            "Enter a valid email address.";
          document.getElementById("emailError").style.color = "red";
          valid = false;
        }

        // Message validation
        const message = form.message.value.trim();
        if (message === "") {
          document.getElementById("messageError").textContent =
            "Message is required.";
          document.getElementById("messageError").style.color = "red";
          valid = false;
        } else if (message.length < 10) {
          document.getElementById("messageError").textContent =
            "Message must be at least 10 characters.";
          document.getElementById("messageError").style.color = "red";
          valid = false;
        } else if (message.length > 50) {
          document.getElementById("messageError").textContent =
            "Message cannot exceed 50 characters.";
          document.getElementById("messageError").style.color = "red";
          valid = false;
        }

        // If valid → success
        if (valid) {
          alert("Form submitted successfully!");
          form.reset();
        }
      });
    </script>
  </body>
</html>
