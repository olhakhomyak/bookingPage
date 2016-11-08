'use strict';

angular.module('myApp.book', ['ngRoute',
                              'ngAnimate',
                              'ngSanitize',
                              'ui.bootstrap',
                              'ui-notification'])

.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/book', {
    templateUrl: 'booking/book.html',
    controller: 'BookCtrl'
  });
}])

.controller('BookCtrl', function($scope, $http, Notification) {

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
    $scope.room = null;
    $scope.makeReserv = function (reserv_from, reserv_to, comment, room) {
        var data = {
            user_id: 5,
            room_id: room,
            reserv_from: new Date(reserv_from).getHours(),
            reserv_to: new Date(reserv_to).getHours(),
            comment: comment
        };

        /**
         * submit reservation
         */
        $http.post('http://localhost:8000/reservation', JSON.stringify(data)).then(function (response) {
            if(response.data.error) {
                Notification.error({message: "<p>Room is not available at this time</p>", delay: 5000});
                setTimeout("location.reload()", 5000);
                // console.log(response);
            } else {
                Notification.success({message: "<p>Reservation has been successfully completed</p>", delay: 5000});
                setTimeout("location.reload()", 5000);
                // console.log(response);
            }

        });

    };

  });