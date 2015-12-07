angular.module('lax').controller('PlayerController', function($scope, $http, $upload) {

$scope.onFileSelect = function($files) {
    $scope.message = "";
    for (var i = 0; i < $files.length; i++) {
        var file = $files[i];
        console.log(file);
        $scope.upload = $upload.upload({
            url: 'a.php',
            method: 'POST',               
            file: file
        }).success(function(data, status, headers, config) {
            $scope.message = data;                
        }).error(function(data, status) {
            $scope.message = data;
        });
    }
};
});