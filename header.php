<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
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
</style>
<body ng-app="myApp" ng-controller="HeaderCtrl">
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
      <a href="#!/">Home</a> |
      <a href="#!/aboutus">About Us</a> | 
      <a href="#!/department">Department</a> |
      <a href="#!/events">Events</a> |
      <a href="#!/contactus">Contact</a> |
      <a href="showData.php">Undergraduate</a> |
       <!-- <a href="showData.php">UndergraduateData</a> | -->
      <a href="calc.php">Calculator</a> |
      <!-- <a href="login.php">login</a> |
      <a href="logout.php">logout</a> -->
      <?php if(!isset($_SESSION['user_id'])): ?>
      <a href="login.php">Login</a> |
      <?php else: ?>
      <a href="logout.php">Logout</a> |
  <?php endif; ?>
    </div>
</body>
</html>  
  
 