'use strict';

/* Controllers */
angular.module('myApp.controllers', ['ngSanitize'])
    .controller('navigation_lists', ['$scope', '$http', '$location', function ($scope, $http, $location) {
        $http({
            method: 'GET',
            url: base_url() + 'index.php/commons/navigations'
        }).success(function (response) {
            $scope.list_navigations = response;
        });
  }])
    .controller('home', ['$scope', '$http', '$route','$sce', function ($scope, $http, $route,$sce) {
        var navigation = $route.current.params.navigation;
        var page = $route.current.params.page;
        var num = $route.current.params.num;
        if (navigation != undefined) {
            if (navigation == "home") {
                $http({
                    method: 'GET',
                    url: base_url() + 'index.php/admin_cmz/statistics'
                }).success(function (response) {
                    $scope.visitors_month = response.visitors_month;
                    $scope.visitors_year = response.visitors_year;
                    $scope.visitors_register = response.visitors_register;
                    $scope.get_visitors_menu = response.get_visitors_menu;
                    
                    /*
                    * Trending line chart
                    */
                    var trendingLineChart;
                    var data = {
                        labels: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31"],
                        datasets: [
                            {
                                label: "First dataset",
                                fillColor: "rgba(128, 222, 234, 0.6)",
                                strokeColor: "#ffffff",
                                pointColor: "#00bcd4",
                                pointStrokeColor: "#ffffff",
                                pointHighlightFill: "#ffffff",
                                pointHighlightStroke: "#ffffff",
                                data: $scope.visitors_month
                              }
                           ]
                        };
                    var trendingLineChart = document.getElementById("trending-line-chart").getContext("2d");
                    window.trendingLineChart = new Chart(trendingLineChart).Line(data, {
                        scaleShowGridLines: true, ///Boolean - Whether grid lines are shown across the chart		
                        scaleGridLineColor: "rgba(255,255,255,0.4)", //String - Colour of the grid lines		
                        scaleGridLineWidth: 1, //Number - Width of the grid lines		
                        scaleShowHorizontalLines: true, //Boolean - Whether to show horizontal lines (except X axis)		
                        scaleShowVerticalLines: false, //Boolean - Whether to show vertical lines (except Y axis)		
                        bezierCurve: true, //Boolean - Whether the line is curved between points		
                        bezierCurveTension: 0.4, //Number - Tension of the bezier curve between points		
                        pointDot: true, //Boolean - Whether to show a dot for each point		
                        pointDotRadius: 5, //Number - Radius of each point dot in pixels		
                        pointDotStrokeWidth: 2, //Number - Pixel width of point dot stroke		
                        pointHitDetectionRadius: 20, //Number - amount extra to add to the radius to cater for hit detection outside the drawn point		
                        datasetStroke: true, //Boolean - Whether to show a stroke for datasets		
                        datasetStrokeWidth: 3, //Number - Pixel width of dataset stroke		
                        datasetFill: true, //Boolean - Whether to fill the dataset with a colour				
                        animationSteps: 15, // Number - Number of animation steps		
                        animationEasing: "easeOutQuart", // String - Animation easing effect			
                        tooltipTitleFontFamily: "'Roboto','Helvetica Neue', 'Helvetica', 'Arial', sans-serif", // String - Tooltip title font declaration for the scale label		
                        scaleFontSize: 12, // Number - Scale label font size in pixels		
                        scaleFontStyle: "normal", // String - Scale label font weight style		
                        scaleFontColor: "#fff", // String - Scale label font colour
                        tooltipEvents: ["mousemove", "touchstart", "touchmove"], // Array - Array of string names to attach tooltip events		
                        tooltipFillColor: "rgba(255,255,255,0.8)", // String - Tooltip background colour		
                        tooltipTitleFontFamily: "'Roboto','Helvetica Neue', 'Helvetica', 'Arial', sans-serif", // String - Tooltip title font declaration for the scale label		
                        tooltipFontSize: 12, // Number - Tooltip label font size in pixels
                        tooltipFontColor: "#000", // String - Tooltip label font colour		
                        tooltipTitleFontFamily: "'Roboto','Helvetica Neue', 'Helvetica', 'Arial', sans-serif", // String - Tooltip title font declaration for the scale label		
                        tooltipTitleFontSize: 14, // Number - Tooltip title font size in pixels		
                        tooltipTitleFontStyle: "bold", // String - Tooltip title font weight style		
                        tooltipTitleFontColor: "#000", // String - Tooltip title font colour		
                        tooltipYPadding: 8, // Number - pixel width of padding around tooltip text		
                        tooltipXPadding: 16, // Number - pixel width of padding around tooltip text		
                        tooltipCaretSize: 10, // Number - Size of the caret on the tooltip		
                        tooltipCornerRadius: 6, // Number - Pixel radius of the tooltip border		
                        tooltipXOffset: 10, // Number - Pixel offset from point x to tooltip edge
                        responsive: true
                    });
                    
                    //line chart end
                    /*
                    Trending Bar Chart
                    */
                    var dataBarChart = {
                    labels: ["JAN", "FEB", "MAR", "APR", "MAY", "JUNE", "JULY", "AUG", "SEPT", "NOV", "OCT", "DEC"],
                            datasets: [
                                {
                                    label: "Bar dataset",
                                    fillColor: "#46BFBD",
                                    strokeColor: "#46BFBD",
                                    highlightFill: "rgba(70, 191, 189, 0.4)",
                                    highlightStroke: "rgba(70, 191, 189, 0.9)",
                                    data: $scope.visitors_year
                                }
                            ]
                        };
                    var trendingBarChart = document.getElementById("trending-bar-chart").getContext("2d");
                    window.trendingBarChart = new Chart(trendingBarChart).Bar(dataBarChart, {
                        scaleShowGridLines: false, ///Boolean - Whether grid lines are shown across the chart
                        showScale: true,
                        animationSteps: 15,
                        tooltipTitleFontFamily: "'Roboto','Helvetica Neue', 'Helvetica', 'Arial', sans-serif", // String - Tooltip title font declaration for the scale label		
                        responsive: true
                    });
                    //bar chart end
                    
                    /*
                    Line Chart
                    */
                    var lineChartData = {
                        labels: ["JAN", "FEB", "MAR", "APR", "MAY", "JUNE", "JULY", "AUG", "SEPT", "NOV", "OCT", "DEC"],
                        datasets: [
                            {
                                label: "My dataset",
                                fillColor: "rgba(255,255,255,0)",
                                strokeColor: "#fff",
                                pointColor: "#00796b ",
                                pointStrokeColor: "#fff",
                                pointHighlightFill: "#fff",
                                pointHighlightStroke: "rgba(220,220,220,1)",
                                data: $scope.visitors_register
                              }
                           ]
                    }
                    var lineChart = document.getElementById("line-chart").getContext("2d");
                    window.lineChart = new Chart(lineChart).Line(lineChartData, {
                        scaleShowGridLines: false,
                        bezierCurve: false,
                        scaleFontSize: 12,
                        scaleFontStyle: "normal",
                        scaleFontColor: "#fff",
                        responsive: true,
                    });
                    /*
                    Trending Bar Chart
                    */

                    var trendingBarChart;
                    var radarChartData = {
                        labels: $scope.get_visitors_menu.link,
                        datasets: [
                            {
                                label: "First dataset",
                                fillColor: "rgba(255,255,255,0.2)",
                                strokeColor: "#fff",
                                pointColor: "#00796b",
                                pointStrokeColor: "#fff",
                                pointHighlightFill: "#fff",
                                pointHighlightStroke: "#fff",
                                data: $scope.get_visitors_menu.jumlah
                            }
                       ],
                    };    

                    var trendingRadarChart;

                    window.trendingRadarChart = new Chart(document.getElementById("trending-radar-chart").getContext("2d")).Radar(radarChartData, {

                        angleLineColor: "rgba(255,255,255,0.5)", //String - Colour of the angle line		    
                        pointLabelFontFamily: "'Roboto','Helvetica Neue', 'Helvetica', 'Arial', sans-serif", // String - Tooltip title font declaration for the scale label	
                        pointLabelFontColor: "#fff", //String - Point label font colour
                        pointDotRadius: 4,
                        animationSteps: 15,
                        pointDotStrokeWidth: 2,
                        pointLabelFontSize: 12,
                        responsive: true
                    });

                });
                
                

                $http({
                    method: 'GET',
                    url: base_url() + 'index.php/admin_cmz/top_news'
                }).success(function (response) {
                    $scope.top_news = response.top_news;
                });
            }else if(navigation == "kritik_saran")
                {
                    var page = $route.current.params.page;
                    $http({
                    method: 'GET',
                    url: base_url() + 'index.php/admin_cmz/list_kritik/'+page
                    }).success(function (response) {
                        $scope.list_kritik = response.list;
                        $scope.link = response.link;
                    });
                }
            else {
                if (page == "detail") {
                   
                    $http({
                        method: 'GET',
                        url: base_url() + 'index.php/news/detail_admin/' + num
                    }).success(function (response) {
                        $scope.current_page = response.current_page;
                        $scope.news = response.news;
                        $scope.news.content_indonesia= $sce.trustAsHtml($scope.news.content_indonesia);
                        $scope.news.content_english= $sce.trustAsHtml($scope.news.content_english);
                        //$scope.youtube = $sce.trustAsHtml('<iframe width="560" height="315" src="//www.youtube.com/embed/FZSjvWtUxYk" frameborder="0" allowfullscreen></iframe>');
                         tinymce.init({
                        selector: "div.editable",
                        inline: true,
                        height: 400,
                        theme: 'modern',
                        setContent:'sdf',
                        plugins: [
                        'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                        'searchreplace wordcount visualblocks visualchars code fullscreen',
                        'insertdatetime media nonbreaking save table contextmenu directionality',
                        'emoticons template paste textcolor colorpicker textpattern imagetools responsivefilemanager'
                      ],
                        toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                        toolbar2: 'print preview media | forecolor backcolor emoticons | responsivefilemanager',
                        external_filemanager_path: base_url() + "/assets/responsivefilemanager/filemanager/",
                        filemanager_title: "Responsive Filemanager",
                        external_plugins: {
                            "filemanager": base_url() + "/assets/responsivefilemanager/tinymce/plugins/responsivefilemanager/plugin.min.js"
                        },
                        image_advtab: true
                    });
                    });

                    $('.dropify').dropify();

                    // Translated
                    $('.dropify-fr').dropify({
                        messages: {
                            default: 'Glissez-déposez un fichier ici ou cliquez',
                            replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                            remove: 'Supprimer',
                            error: 'Désolé, le fichier trop volumineux'
                        }
                    });

                    // Used events
                    var drEvent = $('.dropify-event').dropify();

                    drEvent.on('dropify.beforeClear', function (event, element) {
                        return confirm("Do you really want to delete \"" + element.filename + "\" ?");
                    });

                    drEvent.on('dropify.afterClear', function (event, element) {
                        alert('File deleted');
                    });

                    $(".formChangeImage").submit(function () {
                        var formData = new FormData(this);
                        $.ajax({
                            type: 'POST',
                            url: base_url() + "/index.php/admin_cmz/save_edit_image/",
                            data: formData,
                            dataType: 'json',
                            cache: false,
                            contentType: false,
                            processData: false,
                            success: function (result) {
                                if (result.status == "success") {
                                    Materialize.toast('<span>Congrats !, "' + result.message + '".</span>', 3000);
                                    //$(".imgChangeImage").attr("src","<?=base_url()?>assets/identitas_pt/logo.png");
                                } else {
                                    Materialize.toast('<span>Ouch !, "' + result.message + '".</span>', 3000);
                                }

                            },
                            error: function () {
                                alert("Koneksi Terputus,coba beberapa saat lagi");
                            }
                        });
                        return false;
                    })

                    //batasan detail

                } else {
                    $http({
                        method: 'GET',
                        url: base_url() + 'index.php/news/berita/' + navigation + "/" + page+'?from=admin',
						
                    }).success(function (response) {
                        $scope.current_page = response.current_page;
                        $scope.berita = response.list;
                        $scope.link = response.link;
                        
                        setTimeout(function(){
                        tinymce.init({
                        selector: "div.editable",
                        inline: true,
                        height: 400,
                        theme: 'modern',
                        plugins: [
                        'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                        'searchreplace wordcount visualblocks visualchars code fullscreen',
                        'insertdatetime media nonbreaking save table contextmenu directionality',
                        'emoticons template paste textcolor colorpicker textpattern imagetools responsivefilemanager'
                      ],
                        toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                        toolbar2: 'print preview media | forecolor backcolor emoticons | responsivefilemanager',
                        external_filemanager_path: base_url() + "/assets/responsivefilemanager/filemanager/",
                        filemanager_title: "Responsive Filemanager",
                        external_plugins: {
                            "filemanager": base_url() + "/assets/responsivefilemanager/tinymce/plugins/responsivefilemanager/plugin.min.js"
                        },
                        image_advtab: true
                    });
                     },2000);   
                    });
                }
            }
        } else {
            location.href = "#/home";
        }
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