<!DOCTYPE html>
<html lang="en" ng-app="myApp">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="WIFI EDUKASI SMKN 11 Bandung,SMK Bisa">
    <meta name="keywords" content="WIFI EDUKASI SMKN 11 Bandung,SMKN 11 BDG">
    <title>WIFI EDUKASI SMKN 11 Bandung</title>
    <script type="text/javascript">function base_url(){ return "<?=base_url()?>"; }</script>
    <!-- Favicons-
    <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
	
    
    <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
	<meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
    <!-- For iPhone -->




    <!-- CORE CSS-->
    <link href="<?=base_url()?>/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?=base_url()?>/css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->
    <link href="<?=base_url()?>/css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">


    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="<?=base_url()?>/js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?=base_url()?>/js/plugins/jvectormap/jquery-jvectormap.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?=base_url()?>/js/plugins/chartist-js/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?=base_url()?>/js/plugins/magnific-popup/magnific-popup.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?=base_url()?>/js/plugins/dropify/css/dropify.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <style>
        a {
            cursor: pointer !important
        }
        
        ;
    </style>

</head>

<body>
    <!-- Start Page Loading -->
    <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    <!-- End Page Loading -->

    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!-- START HEADER -->
    <header id="header" class="page-topbar">
        <!-- start header nav-->
        <div class="navbar-fixed">
            <nav class="navbar-color">
                <div class="nav-wrapper">
                    <ul class="left">
                        <li>
                            <h1 class="logo-wrapper"><a href="#/home" class="brand-logo darken-1">SMKN 11 BDG</a> <span class="logo-text">SMKN 11 BDG</span></h1></li>
                    </ul>
                    <div class="header-search-wrapper hide-on-med-and-down">
                        <i class="mdi-action-search"></i>
                        <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Cari Berita,Tips & Trick,Prestasi Sekolah" />
                    </div>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen"><i class="mdi-action-settings-overscan"></i></a>
                        </li>
                    </ul>
                    <!-- translation-button -->


                </div>
            </nav>
        </div>
        <!-- end header nav-->
    </header>
    <!-- END HEADER -->

    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!-- START MAIN -->
    <div id="main">
        <!-- START WRAPPER -->
        <div class="wrapper">
            <!-- START LEFT SIDEBAR NAV-->
            <aside id="left-sidebar-nav">
                <ul id="slide-out" class="side-nav fixed leftside-navigation" ng-controller="navigation_lists">
                    <li class="user-details cyan darken-2">
                        <div class="row">

                            <div class="col col s8 m8 l8">
                                <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#">WIFI EDUKASI SMKN 11 Bandung</a>
                                <p class="user-roal">SMKN 11 Bandung</p>
                            </div>
                        </div>
                    </li>
                    <li class="bold active"><a href="#/home" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i>Beranda</a></li>
                    <li class="bold" ng-repeat="navigation in list_navigations | filter:{ type: '!external' }"><a href="#/{{navigation.link}}" class="waves-effect waves-cyan"><i class="{{navigation.icon}}"></i>{{navigation.name}}</a></li>
                    <li class="bold"><a href="<?=site_url()?>/admin_cmz/signout/" class="waves-effect waves-cyan"><i class="mdi-action-lock"></i>Logout</a></li>
                    <li class="bold"><a href="#/kritik_saran" class="tooltipped waves-effect waves-cyan" data-position="right" data-delay="50" data-tooltip="Kirim kritik dan saran dimenu ini" data-tooltip-id="02d6552a-d3e9-1d28-ca69-9bfee24652df"><i class="mdi-communication-email primary-text"></i>Kritik dan Saran</a></li>
                    <li class="li-hover">
                        <p class="ultra-small margin more-text">External Link</p>
                    </li>
                    <li class="bold" ng-repeat="navigation in list_navigations | filter:{ type: 'external' }"><a href="#/{{navigation.link}}" class="waves-effect waves-cyan"><i class="{{navigation.icon}}"></i>{{navigation.name}}</a></li>
                </ul>
                <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
            </aside>
            <!-- END LEFT SIDEBAR NAV-->

            
            <!-- START CONTENT -->

            <section id="content" ng-view></section>
            <!-- END CONTENT -->
            
        </div>
        <!-- END WRAPPER -->

    </div>
    <!-- END MAIN -->



    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!-- START FOOTER -->
    <footer class="page-footer">
        <div class="footer-copyright">
            <div class="container">
                Copyright © 2016 <a class="grey-text text-lighten-4" href="http://themeforest.net/user/geekslabs/portfolio?ref=geekslabs" target="_blank">TOGA</a> All rights reserved.
                <span class="right"> SMKN 11 Bandung</span>
            </div>
        </div>
    </footer>
    <!-- END FOOTER -->


    <!-- ================================================
    Scripts
    ================================================ -->

    <!-- jQuery Library -->
    <script type="text/javascript" src="<?=base_url()?>/js/plugins/jquery-1.11.2.min.js"></script>

    <script src="<?=base_url()?>/lib/angular/angular.js"></script>
    <script src="<?=base_url()?>/lib/angular/angular-route.js"></script>
    <script src="<?=base_url()?>/lib/angular/angular-sanitize.min.js"></script>
    <script src="<?=base_url()?>/js/admin/app.js"></script>
    <script src="<?=base_url()?>/js/admin/services.js"></script>
    <script src="<?=base_url()?>/js/admin/controllers.js"></script>
    <script src="<?=base_url()?>/js/admin/filters.js"></script>
    <script src="<?=base_url()?>/js/admin/directives.js"></script>


    <!--materialize js-->
    <script type="text/javascript" src="<?=base_url()?>/js/materialize.min.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="<?=base_url()?>/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <!-- <script type="text/javascript" src="<?=base_url()?>/js/plugins/google-map/google-map-script.js"></script>!-->


    <!-- chartist -->
    <script type="text/javascript" src="<?=base_url()?>/js/plugins/chartjs/chart.min.js"></script>
    <!--<script type="text/javascript" src="<?=base_url()?>/js/plugins/chartjs/chart-script.js"></script>!-->
    
    <!-- sparkline -->
    <script type="text/javascript" src="<?=base_url()?>/js/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--<script type="text/javascript" src="<?=base_url()?>/js/plugins/sparkline/sparkline-script.js"></script> !-->
    
    
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="<?=base_url()?>/js/plugins.min.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    
    
    <!-- Toast Notification -->
    <script src="<?=base_url()?>/js/plugins/masonry.pkgd.min.js"></script>
    <script src="<?=base_url()?>/js/plugins/imagesloaded.pkgd.min.js"></script>
    <script src="<?=base_url()?>/js/plugins/oclazyload/dist/ocLazyLoad.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>/js/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
    
    
    <script type="text/javascript" src="<?=base_url()?>/js/plugins.min.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
	<script type="text/javascript" src="<?=base_url()?>/js/plugins/dropify/js/dropify.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>/js/custom-script.js"></script>
	<script src="<?=base_url("assets/tinymce")?>/js/tinymce/tinymce.min.js"></script>

    <!-- Toast Notification -->
    <script type="text/javascript">
        $(document).ready(function(){
            // Basic
            $('.dropify').dropify();

            // Translated
            $('.dropify-fr').dropify({
                messages: {
                    default: 'Glissez-déposez un fichier ici ou cliquez',
                    replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                    remove:  'Supprimer',
                    error:   'Désolé, le fichier trop volumineux'
                }
            });

            // Used events
            var drEvent = $('.dropify-event').dropify();

            drEvent.on('dropify.beforeClear', function(event, element){
                return confirm("Do you really want to delete \"" + element.filename + "\" ?");
            });

            drEvent.on('dropify.afterClear', function(event, element){
                alert('File deleted');
            });
	$(".formChangeImage").submit(function(){
	  var formData = new FormData(this);
			$.ajax({
				type:'POST',
				url: "../save_edit_image/",
				data:formData,
				dataType:'json',
				cache:false,
				contentType: false,
				processData: false,
				success:function(result){
				  if(result.status=="success")
				  {
					 Materialize.toast('<span>Congrats !, "'+result.message+'".</span>', 3000);
					//$(".imgChangeImage").attr("src","<?=base_url()?>assets/identitas_pt/logo.png");
				  }
				  else{
					  Materialize.toast('<span>Ouch !, "'+result.message+'".</span>', 3000);
					}
				  
				},
				error:function(){
					alert("Koneksi Terputus,coba beberapa saat lagi");
				}
			  });
			  return false;
			})
        });
    </script>
    
</body>

</html>