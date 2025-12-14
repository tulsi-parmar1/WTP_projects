

<!DOCTYPE html>
<html lang="en" ng-app="ugApp">
<head>
  <meta charset="UTF-8">
  <title>UG Degree Information Form - GMCA</title>

  <!-- AngularJS -->
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>

  <!-- SAME CSS -->
   <style>
      /* ===== Base Styling ===== */
      body {
        margin: 0;
        padding: 0;
        font-family: "Poppins", "Segoe UI", sans-serif;
        background: linear-gradient(135deg, #fef8ee, #ffe1b3);
        color: #333;
      }

      main {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 40px 20px;
      }

      /* ===== Header ===== */
      .header {
        text-align: center;
        margin-bottom: 30px;
      }

      .header h1 {
        color: #388e3c;
        font-size: 1.9rem;
        text-shadow: 1px 1px 2px rgba(0, 128, 0, 0.1);
        margin-bottom: 5px;
      }

      .header p {
        color: #555;
        font-size: 0.95rem;
      }

      /* ===== Form Styling ===== */
      form {
        background-color: #fff;
        width: 55%;
        max-width: 600px;
        padding: 25px 30px;
        border-radius: 16px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        border-top: 5px solid #ff9800;
        transition: 0.3s ease;
      }

      form:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 24px rgba(0, 0, 0, 0.12);
      }

      fieldset {
        border: none;
        margin-bottom: 20px;
      }

      legend {
        font-weight: 600;
        color: #2e7d32;
        font-size: 1rem;
        margin-bottom: 8px;
      }

      /* ===== Label + Input ===== */
      label {
        font-weight: 500;
        display: block;
        margin-top: 10px;
        color: #333;
      }

      input,
      select {
        width: 100%;
        height: 36px;
        padding: 6px 12px;
        border-radius: 8px;
        border: 1px solid #ccc;
        outline: none;
        font-size: 14px;
        background-color: #fafafa;
        transition: all 0.25s ease;
      }

      input:focus,
      select:focus {
        border-color: #ff9800;
        box-shadow: 0 0 5px rgba(255, 152, 0, 0.3);
        background-color: #fff;
      }

      small {
        color: red;
        font-size: 12px;
      }

      /* ===== Buttons ===== */
      .btn {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-top: 10px;
      }

      .btn button {
        padding: 8px 20px;
        border: none;
        border-radius: 25px;
        font-weight: 600;
        letter-spacing: 0.5px;
        color: white;
        font-size: 15px;
        background: linear-gradient(90deg, #43a047, #ff9800);
        transition: 0.3s ease;
        box-shadow: 0 3px 8px rgba(0, 128, 0, 0.2);
        cursor: pointer;
      }

      .btn button:hover {
        transform: scale(1.05);
        box-shadow: 0 5px 14px rgba(255, 152, 0, 0.4);
      }

      /* ===== Back Button ===== */
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

      /* ===== Responsive ===== */
      @media (max-width: 768px) {
        form {
          width: 90%;
          padding: 20px;
        }
      }
    </style>
</head>

<body ng-controller="UGCtrl">
  <div class="back-btn">
        <button onclick="window.location.
        href='./showData.php'">← back</button>
    </div>
 
<main>
<form method="POST" action="save.php">

<input type="hidden" name="student_id"
       value="<?php echo $_SESSION['user_id']; ?>">

<!-- FULL NAME -->
<label>Full Name *</label>
<input type="text" name="fullname"
       ng-model="ug.fullname"
       ng-blur="validateName()"
       value="<?php echo $data['fullname'] ?? ''; ?>">
<small ng-show="errors.name">{{errors.name}}</small>
<small ng-hide="!errors.name">{{errors.name}}</small>

<!-- EMAIL -->
<label>Email *</label>
<input type="email" name="email"
       ng-model="ug.email"
       ng-blur="validateEmail()"
       value="<?php echo $data['email'] ?? ''; ?>">
<small ng-show="errors.email">{{errors.email}}</small>
<small ng-hide="!errors.email">{{errors.email}}</small>

<!-- PHONE -->
<label>Phone *</label>
<input type="tel" name="phone"
       ng-model="ug.phone"
       ng-blur="validatePhone()"
       value="<?php echo $data['phone'] ?? ''; ?>">
<small ng-show="errors.phone">{{errors.phone}}</small>
<small ng-hide="!errors.phone">{{errors.phone}}</small>

<!-- COLLEGE -->
<label>College *</label>
<input type="text" name="college_name"
       ng-model="ug.college"
       ng-blur="validateCollege()"
       value="<?php echo $data['college_name'] ?? ''; ?>">
<small ng-show="errors.college">{{errors.college}}</small>
<small ng-hide="!errors.college">{{errors.college}}</small>

<!-- DEGREE -->
<label>Degree *</label>
<select name="degree"
        ng-model="ug.degree"
        ng-change="validateDegree()">
  <option value="">-- Select Degree --</option>
  <option>MCA</option>
  <option>MBA</option>
  <option>BA</option>
  <option>BSc</option>
  <option>Other</option>
</select>
<small ng-show="errors.degree">{{errors.degree}}</small>
<small ng-hide="!errors.degree">{{errors.degree}}</small>

<!-- START YEAR -->
<label>Start Year</label>
<input type="number" name="start_year"
       ng-model="ug.startYear"
       ng-blur="validateYears()"
       value="<?php echo $data['start_year'] ?? ''; ?>">
<small ng-show="errors.startYear">{{errors.startYear}}</small>

<!-- PASS YEAR -->
<label>Passing Year *</label>
<input type="number" name="end_year"
       ng-model="ug.endYear"
       ng-blur="validateYears()"
       value="<?php echo $data['end_year'] ?? ''; ?>">
<small ng-show="errors.endYear">{{errors.endYear}}</small>
<small ng-hide="!errors.endYear">{{errors.endYear}}</small>

<!-- STATUS MESSAGE (ng-hide EXTRA) -->
<p style="color:green" ng-hide="hasErrors">
✔ All fields are valid
</p>

<!-- BUTTONS -->
<div class="btn">
  <button type="submit" ng-disabled="hasErrors">Submit</button>
  <button type="reset">Reset</button>
</div>

</form>
</main>

<!-- ANGULAR CONTROLLER -->
<script>
var app = angular.module("ugApp", []);

app.controller("UGCtrl", function($scope){

  $scope.ug = {};
  $scope.errors = {};
  $scope.hasErrors = false;

  function checkErrors(){
    $scope.hasErrors = Object.keys($scope.errors).length > 0;
  }

  $scope.validateName = function(){
    if(!$scope.ug.fullname)
      $scope.errors.name="Name required";
    else if(/\d/.test($scope.ug.fullname))
      $scope.errors.name="No numbers allowed";
    else delete $scope.errors.name;
    checkErrors();
  };

  $scope.validateEmail = function(){
    let r=/^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
    if(!$scope.ug.email)
      $scope.errors.email="Email required";
    else if(!r.test($scope.ug.email))
      $scope.errors.email="Invalid email";
    else delete $scope.errors.email;
    checkErrors();
  };

  $scope.validatePhone = function(){
    if(!/^[0-9]{10}$/.test($scope.ug.phone||""))
      $scope.errors.phone="10 digit phone required";
    else delete $scope.errors.phone;
    checkErrors();
  };

  $scope.validateCollege = function(){
    if(!$scope.ug.college)
      $scope.errors.college="College required";
    else delete $scope.errors.college;
    checkErrors();
  };

  $scope.validateDegree = function(){
    if(!$scope.ug.degree)
      $scope.errors.degree="Select degree";
    else delete $scope.errors.degree;
    checkErrors();
  };

  $scope.validateYears = function(){
    if($scope.ug.startYear && $scope.ug.endYear &&
       $scope.ug.startYear > $scope.ug.endYear)
      $scope.errors.endYear="Passing year must be greater";
    else delete $scope.errors.endYear;
    checkErrors();
  };

});
</script>

</body>
</html>