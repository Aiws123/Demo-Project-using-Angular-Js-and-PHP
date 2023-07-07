<?php
include 'config.php';
//  include 'ajax_session.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <link rel="stylesheet" href="assets/style.css">
    <script src="app-js/angular_modules/angular.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <script src="app-js/loginController.js"></script>
</head>

<body>

    <div ng-app="login_register_app" class="container" style="width:600px">
        <div style="text-align:center;color:#000">
            <h3><b>User Registraion Form</b></h3>
        </div>
        <div ng-controller="loginController">

            <div class="alert {{alertClass}} alert-dismissible text-danger" ng-show="alertMsg">
                <a href="#" class="close" ng-click="closeMsg()" aria-label="close">&times;</a>
                {{alertMsg}}
            </div>


            <div align="right">
                <a href="signup.php">Sign Up</a>
            </div>

            <h3>Login Form</h3>
            <?php if (!isset($_SESSION["name"])) { ?>
                <form role="form" class="well" name="frmContent" id="frmContent" novalidate ng-submit="frmContent.$valid && submit()" ng-hide="ifSearchUser">

                    <div class="form-group">
                        <label for="email"> Email: </label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Enter Email " ng-model="newcontact.email" required>
                        <span ng-show="frmContent.email.$error.required" class="text-danger">Required!</span>
                    </div>
                    <div class="form-group">
                        <label for="password"> Password: </label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Enter Password " ng-model="newcontact.password" required>
                        <span ng-show="frmContent.password.$error.required" class="text-danger">Required!</span>
                    </div>

                    <br>

                    <input type="submit" class="btn btn-primary" ng-click="loginUsers()" class="btn btn-primary" value="Login" name="submit">

                </form>
            <?php } else {
                header('Location:index.php');
            } ?>
        </div>
    </div>

</body>

</html>