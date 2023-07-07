var app = angular.module('myApp');
app.controller('welcomeController', ['$http','$scope', function($http,$scope){
    
    $scope.msg = "Admin";

}]);