'use strict';

angular.module('myApp.book', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/book', {
    templateUrl: 'booking/book.html',
    controller: 'BookCtrl'
  });
}])

.controller('BookCtrl', function($scope, $http) {

    $scope.rooms = [];
    $scope.comments = [];

    /**
     * get the list of all rooms
     */
    $http.get("http://localhost:8000/room").then(function (response) {
      $scope.rooms = response.data;
        // console.log(response.data);
    });

    /**
     * get the list of all comments
     */
    $http.get("http://localhost:8000/reservation").then(function (response) {
        $scope.comments = response.data;
        // console.log(response.data)
    });


    /**
     * get data from user form
     */
    $scope.reserv_from = null;
    $scope.reserv_to = null;
    $scope.comment = null;
    $scope.makeReserv = function (reserv_from, reserv_to, comment, room) {
        var data = {
            user_id: 5,
            room_id: room,
            reserv_from: reserv_from,
            reserv_to: reserv_to,
            comment: comment
        };

        /**
         * submit reservation
         */
        $http.post('http://localhost:8000/reservation', JSON.stringify(data)).then(function (response) {
            // console.log(response);
            location.reload();
        });

    }

  }

);