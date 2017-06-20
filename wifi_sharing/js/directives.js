'use strict';

/* Directives */


angular.module('myApp.directives', [])
  .directive('appVersion', ['version', function(version) {
    return function(scope, elm, attrs) {
      elm.text(version);
    };
  }])
  .directive('masonry', function($http) {
    return function(scope,element,attrs){
		if(scope.$last){
			var $containerBlog = $(".blog-posts");
			$containerBlog.imagesLoaded(function() {
				  $containerBlog.masonry({
					itemSelector: ".blog",
					columnWidth: ".blog-sizer",
				  });
				});
		}
	};
})
.directive('checkImage', function($http) {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
            attrs.$observe('ngSrc', function(ngSrc) {
                $http.get(ngSrc).success(function(){
                    
                }).error(function(){
                    element.attr('src', 'images/img2.jpg'); // set default image
                });
            });
        }
    };
})
angular.module("ui.materialize.tabs", [])
        .directive("tabs", [function(){
            return {
                link: function (scope, element, attrs) {
                    element.tabs();
                }
            };
        }]);