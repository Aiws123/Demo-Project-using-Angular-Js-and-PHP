var app = angular.module('myApp', ['ngRoute','ckeditor']);
app.config(['$routeProvider', '$locationProvider', function($routeProvider, $locationProvider) {

    $routeProvider
    .when("/welcome", {
        templateUrl : 'app-js/welcome.html',
        controller : 'welcomeController'
    })
    .when("/about", {
        templateUrl : 'app-js/about/about.html',
        controller : 'aboutController'
    })

    .when("/contact", {
        templateUrl : 'app-js/contact/contact.html',
        controller : 'contactController'
    })

    .otherwise({
        redirectTo: 'welcome'
    });

   
    
}]);