var app = angular.module('myapp', []);
app.config(['$locationProvider', function($locationProvider){
    $locationProvider.html5Mode({
        enabled:true,
        requireBase:false
    });
}]);
app.controller('mycontroller', function($scope, $http, $location) {
    var id=$location.url().split('=')[1];
    $http({
        Method: "GET",
        url: "http://127.0.0.1:8000/api/chitietnews/"+id,
    }).success(function(response) {
        $scope.news = response;
    });
    $http({
        Method: "GET",
        url: "http://127.0.0.1:8000/api/newshome/"
    }).success(function(response) {
        $scope.listnews = response;
    });
    $http({
        Method: "GET",
        url: "http://127.0.0.1:8000/api/comments/"
    }).success(function(response) {
        $scope.phanhoi = response;
    });
    
});