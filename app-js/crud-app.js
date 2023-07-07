myApp = angular.module("myApp", []);
myApp.service("ContactService", function () {
    var uid = 1;
    var contacts = [{
        'id': 0,
        'name': '',
        'email': '',
        'password': '',
        'phone': ''
    }];


    //Show all contacts
    this.list = function () {
        return contacts;
    };
});

////Controller area .....
let baseurl = 'http://server/adminpanel/library/signup.class.php';
myApp.controller("ContactController", function ($http, $scope, ContactService,$window) {
    // console.clear();
    $scope.closeMsg = function () {
        $scope.alertMsg = false;
    };

    $scope.ifSearchUser = false;
    $scope.title = "List of Users";


    $scope.contacts = ContactService.list();

    $scope.saveContact = function () {
        $scope.newcontact.stype = 'saveData';
        // $scope.newcontact = {};
        $http({ 
            method: 'POST',
            url: baseurl,
            data: $scope.newcontact
        }).then(function (response) {
            // $scope.alertMsg = true;
            if (response.data.status == 200) {
                $scope.alertMsg = response.data.message;
                $scope.newcontact = {};
                // console.log($scope.alertMsg)
                // $window.location.reload();
                $scope.getContact();
            }
            else {
              
                $scope.alertMsg = response.data.error
            }

        });
        // console.log($scope.newcontact);
        // if ($scope.newcontact == null || $scope.newcontact == angular.undefined)
        //     return;
        // ContactService.save($scope.newcontact);
        // $scope.newcontact = {};

    };

    $scope.getContact = function () {
        $http({
            method: "POST",
            url: baseurl,
            data: {
                'stype': 'getData',
                btnName: $scope.btnName
            }

        }).then(function (response) {
            // console.log(response.data);
            $scope.users = response.data;
            $scope.btnName = "Save";
        })
    }
    $scope.getContact();


    $scope.fetchData = function (id) {
        // console.log(id)
        $http({
            method: "POST",
            url: baseurl,
            data: {
                id: id,
                stype: 'fetchData'
            }
        }).then(function (response) {
            $scope.newcontact = response.data;
            $scope.btnName = "Update";
            $scope.id = id;
            $scope.ifSearchUser = false;
            // $scope.url = baseurl+$scope.id;
            // console.log($scope.url);
        })
    };

    $scope.edit = function () {
        let user_id = $scope.id;
        $http({
            method: "POST",
            url: baseurl,
            data: {
                id: user_id,
                stype: 'editData',
                form_value: $scope.newcontact
            }
        }).then(function (response) {
            $scope.newcontact = response.data;
            if (response.data.status == 200) {
                $scope.newcontact = response.data;
                $scope.alertMsg = response.data.message;
                $scope.newcontact = {};
                // $window.location.reload();
                // console.log($scope.alertMsg)
                $scope.getContact();
            }

            // $scope.btnName = "Update";
            // $scope.id = id;
            // console.log($scope.newcontact, $scope.btnName)
        })

    }

    $scope.delete = function (id) {
        if (confirm("Are you sure you want to remove it?")) {
            $http({
                method: "POST",
                url: baseurl,
                data: {
                    id: id,
                    stype: 'deleteData',
                    form_value: $scope.newcontact
                }
            }).then(function (response) {
                if (response.data.status == 200) {
                    $scope.alertMsg = response.data.message
                    $scope.getContact();
                } else {
                    alert("Something went wrong");
                }

            })
        }

    }

    $scope.searchUser = function () {
        if ($scope.title == "List of Users") {
            $scope.ifSearchUser = true;
            $scope.title = "Back";
        }

        else {
            $scope.ifSearchUser = false;
            $scope.title = "List of Users";
        }
    };



});