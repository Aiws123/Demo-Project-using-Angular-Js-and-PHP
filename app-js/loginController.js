var myApp = angular.module('login_register_app', []);
myApp.controller('loginController', function ($scope, $http,) {

    $scope.closeMsg = function () {
        $scope.alertMsg = false;
    };

    var baseurl = 'http://server/adminpanel/library/login.class.php';
    $scope.loginUsers = function () {
        $scope.newcontact.stype = 'loginData';
        $http({
            method: "POST",
            url: baseurl,
            data: $scope.newcontact
        }).then(function (response) {
            if (response.data.status == 200) {
                console.log(response.data.message);
                window.location.href = "index.php";
            }
            else if(response.data.status == 401) {
                $scope.alertMsg = response.data.message
            }
            else {
                $scope.response = "Wrong Emial";
                console.log(response);
            }
        })
    }


    // function session_checking() {
    //     $.post("../library/login.class.php", function (data) {
    //         if (data == "-1") {
    //             alert("Your session has been expired!");
    //             location.reload();
    //         }

    //     });
    // }

    // var validateSession = setInterval(session_checking, 1000);



});