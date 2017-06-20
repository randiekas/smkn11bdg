'use strict';


// Declare app level module which depends on filters, and services
angular.module('myApp', [
  'ngRoute',
  'myApp.filters',
  'myApp.services',
  'myApp.directives',
  'myApp.controllers',
    'oc.lazyLoad'
])
.constant('base_url', base_url())
.config(['$routeProvider', function ($routeProvider) {
    $routeProvider.when('/:navigation?/:page?/:num?', {
        templateUrl: function (urlattr) {
            if(urlattr.num)
            {
                return base_url()+'views/admin/detail.html';
                
            }else{
                if(urlattr.navigation=="kritik_saran")
                {
                    return base_url()+'views/admin/list_kritik_saran.html';
                }else{
                    return base_url()+'views/admin/' +((urlattr.navigation)?((urlattr.navigation=="home")?"home":"multiplepages"):"home")+ '.html';
                }  
            }
        },
        controller: 'home'
        /*
        ,resolve: {
            deps: ['$ocLazyLoad', function($ocLazyLoad) {
                return $ocLazyLoad.load([{
                    files: [
                        base_url()+'/js/materialize.min.js', 
                        
                    ] 
                }]);
            }]
        }*/
    })
    
}]);