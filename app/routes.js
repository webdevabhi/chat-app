var app =  angular.module('main-App',['ngRoute']);

app.config(['$routeProvider',
    function($routeProvider) {
        $routeProvider.
        when('/', {
            templateUrl: 'templates/index.html',
            controller: 'AppController'
        }).
        when('/items', {
            templateUrl: 'templates/items.html',
            controller: 'ItemController'
        });
    }]);