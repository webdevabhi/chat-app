var app =  angular.module('main-App',['ngRoute']);

app.config(['$routeProvider',
    function($routeProvider) {
        $routeProvider.
        when('/', {
            templateUrl: 'templates/home.html',
            controller: 'AppController'
        }).
        when('/chat-rooms', {
            templateUrl: 'templates/chat-rooms.html',
            controller: 'ChatController'
        })
    }]);