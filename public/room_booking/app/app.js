'use strict';

angular.module('myApp', [
  'ngRoute',
  'myApp.book'
]).
config(['$locationProvider', '$routeProvider', function($locationProvider, $routeProvider) {
  $locationProvider.hashPrefix('!');

  $routeProvider.otherwise({redirectTo: '/book'});
}]);
