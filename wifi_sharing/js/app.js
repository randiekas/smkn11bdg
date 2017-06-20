'use strict';


// Declare app level module which depends on filters, and services
angular.module('myApp', [
  'ngRoute',
  'myApp.filters',
  'myApp.services',
  'myApp.directives',
  'myApp.controllers'
]).
config(['$routeProvider', function ($routeProvider) {
    $routeProvider.when('/:navigation?/:page?/:num?', {
        templateUrl: function (urlattr) {
            if (urlattr.num) {
                return 'views/detail.html';

            } else {
                if (urlattr.navigation == "kritik_saran") {
                    return 'views/kritik_saran.html';
                    
                } else {
                    return 'views/' + ((urlattr.navigation) ? ((urlattr.navigation == "home") ? "home" : "multiplepages") : "home") + '.html';
                }
            }
        },
        controller: 'home'
    });
}]);