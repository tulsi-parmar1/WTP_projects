var app = angular.module("myApp", ["ngRoute"]);

var app = angular.module("myApp", ["ngRoute"]);

app.config(function ($routeProvider) {
  $routeProvider
    .when("/", {
      templateUrl: "gmcaWebResponsive.php",
      controller: "mainCtrl",
    })
    .when("/undergraduate", {
      templateUrl: "underGraduateDataRes.php",
      controller: "underGraduateDataRes",
    })
    .when("/events", {
      templateUrl: "events.php",
      controller: "eventCtrl",
    })
    .when("/calc", {
      templateUrl: "calc.php",
      controller: "calcCtrl",
    })
    .when("/contactus", {
      templateUrl: "contactus.php",
      controller: "contactusCtrl",
    })
    .when("/department", {
      templateUrl: "department.php",
      controller: "departmentCtrl",
    })
    .when("/aboutus", {
      templateUrl: "aboutus.php",
      controller: "aboutusCtrl",
    })
    .when("/register", {
      templateUrl: "register.html",
      controller: "registerCtrl",
    })
    .otherwise({
      redirectTo: "/",
    });
});
