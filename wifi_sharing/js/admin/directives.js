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
                $http.get(base_url()+ngSrc).success(function(){
                    element.attr('src', base_url()+"/"+element.attr('src')); // set default image  
                }).error(function(){
                    element.attr('src', base_url()+'images/img2.jpg'); // set default image
                    
                });
            });
        }
    };
}).directive("tabs", [function(){
            return {
                link: function (scope, element, attrs) {
                    element.tabs();
                }
            };
        }]);
        