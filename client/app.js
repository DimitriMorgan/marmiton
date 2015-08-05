'use strict';

var App = angular.module('MarmitonApp', [
    "ngRoute",
    "com.2fdevs.videogular",
    "youtube-embed",
    "ngAnimate",
    "ngTouch"
]);

App.config(['$routeProvider',
    function($routeProvider) {
        $routeProvider
          .when('/home', {
            templateUrl: 'client/app/views/home.html',
            controller: 'HomeCtrl'
          })
          .when('/recipe/:recipeId', {
            templateUrl: 'client/app/views/profile.html',
            controller: 'ProfileCtrl'
          })
          .when('/sliderPage', {
            templateUrl: 'client/app/views/slider.html',
            controller: 'SliderCtrl'
          })
          .otherwise({
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