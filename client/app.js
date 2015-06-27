'use strict';

var App = angular.module('MarmitonApp', []);

App.controller('root', function($scope, GlobalFunctions) {
    $scope.firstName= "John";
    $scope.lastName= "Doe";
});

App.factory('GlobalFunctions', function() {
   return {
       getRecipes: function(type) {
           // type = popular | recent

       }
   }
});