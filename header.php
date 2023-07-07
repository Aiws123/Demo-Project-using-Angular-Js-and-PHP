<?php
// require_once 'config.php';
include('ajax_session.php');
//   session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to <?php echo $_SESSION["name"]; ?></title>
    <link rel="stylesheet" href="assets/style.css">
 <!-- <script src ="app-js/angular_modules/angular.js"></script> -->
    <script src="app-js/angular_modules/angular.min.js"></script>
    <script src="app-js/angular_modules/angular-route.min.js"></script>   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
   
    <script src="ckeditor/ckeditor.js"></script>
    <script src="app-js/angular_modules/angular-ckeditor/angular-ckeditor.js"></script>
 
</head>

<body ng-app="myApp">
    <header class="container-fluid" style="width:100%;">
        <h1>Header Menu</h1>
        <ul class="navigation">
            <li><a class="text-info" href="#!/welcome" ng-class="{'active': $root.activePath == 'welcome' }">Home</a></li>
            <li><a class="text-info" href="#!/about" ng-class="{'active': $root.activePath == 'about' }">About Us</a></li>
            <li><a class="text-info" href="#!/contact" ng-class="{'active': $root.activePath == 'contact' }">Contact Us</a></li>
        </ul>
        
        
        <div align="right">
            <a href="logout.php">Logout</a>
        </div>

        <div align="center">
            <h3 class="text-success">Welcome to <?php echo $_SESSION['name'] ?></h3>
        </div>
      
        

    </header>
