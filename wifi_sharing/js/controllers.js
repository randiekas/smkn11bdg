'use strict';

/* Controllers */
angular.module('myApp.controllers', ['ngSanitize'])
.controller('navigation_lists', ['$scope', '$http', function ($scope, $http) {
        $http({
            method: 'GET',
            url: 'index.php/commons/navigations'
        }).success(function (response) {
            $scope.list_navigations = response; 
        });
  }])
.controller('searchable', ['$scope', '$http', function ($scope, $http) {
        $scope.search = function(keywords,page){
            $("#content").load("index.php/news/search/"+keywords+"/"+page,function(){
                $(".pagination a").click(function(){
                    $scope.search(keywords,$(this).attr("data-ci-pagination-page"));
                    return false;
                })
            });
        }
  }])
.controller('home', ['$scope', '$http', '$route','$sce', function ($scope, $http, $route,$sce) {
        var navigation = $route.current.params.navigation;
        var page = $route.current.params.page;
        var num = $route.current.params.num;
        
        
        if(navigation!=undefined)
        {
        if(navigation=="home")
        {
            $http({
                method: 'GET',
                url: 'index.php/news/beranda'
            }).success(function (response) {
                $scope.top_news = response.top_news;
                $scope.top_news_wilayah = response.top_news_wilayah;
            });
        }else{
            if(page=="detail")
                {
                    $http({
                        method: 'GET',
                        url: 'index.php/news/detail/'+num
                    }).success(function (response) {
                        $(".blog-post-content").html(response.news.content);
                        $("img").each(function(){
                            $(this).attr("href",$(this).attr("src"));
                        });
                        $('img').magnificPopup({type:'image'});
                        $scope.current_page = response.current_page;
                        $scope.news = response.news;
                        $scope.news.content= $sce.trustAsHtml($scope.news.content);
                        
                    });
                }else{
                    $http({
                        method: 'GET',
                        url: 'index.php/news/berita/' + navigation+"/"+page
                    }).success(function (response) {
                        $scope.current_page = response.current_page;
                        $scope.berita = response.list;
                        $scope.link = response.link;
                    });
                }
        }
        }else{
            location.href="#/home";
        }
    
    
    
      //popup-gallery
    
    
    
  }])
    .controller('jurusan_list', ['$scope', '$http', '$route', function ($scope, $http, $route) {
        if ($route.current) {
            $scope.id = $route.current.params.id;
        }
        $http({
            method: 'GET',
            url: 'index.php/news/jurusan_list'
        }).success(function (response) {
            $scope.jurusan = response;

        });

  }]);