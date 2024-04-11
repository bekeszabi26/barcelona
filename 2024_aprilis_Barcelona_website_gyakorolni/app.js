//https://www.w3schools.com/angular/angular_http.asp
//az app név feladatra szabása
// controller név feladatra szabása
let app = angular.module('barcelonaApp', []);
app.controller('barcelonaController', function($scope, $http) {
  $http.get("database_content.json")
  .then(function(response) {
    //a változó neve javítása
    $scope.barcelona = response.data;
    //fontos, hogy ki tudd íratni a konzolba 
    console.log($scope.barcelona)
  });
});