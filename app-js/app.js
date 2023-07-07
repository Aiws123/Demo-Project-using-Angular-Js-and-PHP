(function(){
    var app = angular.module("myApp", ['ngRoute','ngSanitize','angularUtils.directives.dirPagination', 'ckeditor', 'ngFileUpload', '720kb.datepicker', 'uiSwitch',  'ngWYSIWYG', 'checklist-model','dndLists','ngDialog','ngTagsInput']);

 
    app.run(function($rootScope, $http, myConfig, $interval) {
        $rootScope.$on('$routeChangeStart', function(e, curr, prev) {
            console.log("START");
        }); 
    });
  

    
    
 
})();
