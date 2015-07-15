'use strict';

var App = angular.module('MarmitonApp', ['ngRoute']);

App.config(['$routeProvider',
    function($routeProvider) {
        $routeProvider.
            when('/home', {
                templateUrl: 'client/app/views/home.html',
                controller: 'HomeCtrl'
            }).
            when('/recipe/:recipeId', {
                templateUrl: 'client/app/views/profile.html',
                controller: 'ProfileCtrl'
            }).
            otherwise({
                redirectTo: '/home'
            });
    }]);

App.factory('GlobalFunctions', function() {
   return {
       getRecipes: function(type) {
           // type = popular | recent

       }
   }
});