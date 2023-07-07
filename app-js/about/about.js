angular.module('myApp').controller('aboutController', ['$http', '$scope', function($http, $scope){
    $scope.dataFrm = {};
    $scope.pgname = "ckeditor"

    $scope.dataFrm.contentRows = [];

    $scope.submit = function () {
        console.log($scope.dataFrm)
    }
    // $scope.submit();

     //CK-Editor options.
     $scope.options = {
        
        toolbar:[
            ['Source', '-', 'Bold', 'Italic','Underline','DocProps','Preview','Print','Cut','Copy','Paste','PasteFromWord','Undo','Redo'], 
            ['NumberedList', 'BulletedList', 'CreateDiv', 'Outdent', 'Indent'], 
            ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', 'Link', 'Unlink','Blockquote', 'CreateDiv'],
            ['Image', 'Table', 'HorizontalRule'],
            ['ComboText', 'TextColor', 'BGColor','ShowBlocks','Find', 'Replace' ,'Maximize','spellchecker'],
            ['FontSize', 'Styles', 'Format', 'Font']
        ],
        
        language: 'en',
        allowedContent: true,
        entities: false,
        extraPlugins: 'divarea',
        removePlugins: "exportpdf",
        filebrowserBrowseUrl : 'ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',
        filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',
        filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
        filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
        contentsCss  : 'ckfinder/css-front-end.css'

    };

    
    $scope.options_small = {
        
        toolbar:[
            ['Source', '-', 'Bold', 'Italic','Underline'], 
            ['NumberedList', 'BulletedList', 'CreateDiv'], 
            ['JustifyLeft', 'JustifyCenter', 'JustifyRight','Link', 'Unlink'],
            ['Image', 'Table'],
            ['ComboText', 'TextColor', 'BGColor'],
            ['FontSize', 'Styles', 'Format', 'Font']
        ],
        
        language: 'en',
        allowedContent: true,
        entities: false,
        extraPlugins: 'divarea',
        removePlugins: "exportpdf",
        filebrowserBrowseUrl : 'ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',
        filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',
        filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
        filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'

    };
    
    
    // Called when the editor is completely ready. for ckeditor
    $scope.onReady = function () {
        // ...
        // console.log("ckeditor is ready......");
    };

}]);