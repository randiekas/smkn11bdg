<!doctype html>
<html class="no-js" lang="en" ng-app="myApp">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="<?= $this->lang->line('website_description'); ?>">
        <meta name="keywords" content="<?= $this->lang->line('website_keywords'); ?>">
        <title><?= $this->lang->line('website_title'); ?></title>
        <script type="text/javascript">function base_url(){ return "<?=base_url()?>"; }</script>
        
		<!-- favicon
		============================================ -->		
        <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
		
		<!-- Google Fonts
		============================================ -->		
        <link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,800' rel='stylesheet' type='text/css'>
	   
		<!-- Bootstrap CSS
		============================================ -->		
        <link rel="stylesheet" href="template/css/bootstrap.min.css">
        
		<!-- Color Swithcer CSS
		============================================ -->
        <link rel="stylesheet" href="template/css/color-switcher.css">
        
		<!-- Fontawsome CSS
		============================================ -->
        <link rel="stylesheet" href="template/css/font-awesome.min.css">
        
		<!-- Owl Carousel CSS
		============================================ -->
        <link rel="stylesheet" href="template/css/owl.carousel.css">
        
		<!-- jquery-ui CSS
		============================================ -->
        <link rel="stylesheet" href="template/css/jquery-ui.css">
        
		<!-- Meanmenu CSS
		============================================ -->
        <link rel="stylesheet" href="template/css/meanmenu.min.css">
        
		<!-- Animate CSS
		============================================ -->
        <link rel="stylesheet" href="template/css/animate.css">
        
		<!-- Animated Headlines CSS
		============================================ -->
        <link rel="stylesheet" href="template/css/animated-headlines.css">
        
        <!-- Nivo slider CSS
		============================================ -->
		<link rel="stylesheet" href="template/lib/nivo-slider/css/nivo-slider.css" type="text/css" />
		<link rel="stylesheet" href="template/lib/nivo-slider/css/preview.css" type="text/css" media="screen" />
        
		<!-- Metarial Iconic Font CSS
		============================================ -->
        <link rel="stylesheet" href="template/css/material-design-iconic-font.css">
        <link rel="stylesheet" href="template/css/material-design-iconic-font.min.css">
        
		<!-- Slick CSS
		============================================ -->
        <link rel="stylesheet" href="template/css/slick.css">
        
		<!-- Video CSS
		============================================ -->
        <link rel="stylesheet" href="template/css/jquery.mb.YTPlayer.css">
        
		<!-- Style CSS
		============================================ -->
        <link rel="stylesheet" href="template/style.css">
        
		<!-- Color CSS
		============================================ -->
        <link rel="stylesheet" href="template/css/color.css">
        
		<!-- Responsive CSS
		============================================ -->
        <link rel="stylesheet" href="template/css/responsive.css">
        
		<!-- Modernizr JS
		============================================ -->		
        <script src="template/js/vendor/modernizr-2.8.3.min.js"></script>
	    
        <!-- Color Css Files
		============================================ -->	
        <link rel="alternate stylesheet" type="text/css" href="template/switcher/color-one.css" title="color-one" media="screen" />
        <link rel="alternate stylesheet" type="text/css" href="template/switcher/color-two.css" title="color-two" media="screen" />
        <link rel="alternate stylesheet" type="text/css" href="template/switcher/color-three.css" title="color-three" media="screen" />
        <link rel="alternate stylesheet" type="text/css" href="template/switcher/color-four.css" title="color-four" media="screen" />
        <link rel="alternate stylesheet" type="text/css" href="template/switcher/color-five.css" title="color-five" media="screen" />
        <link rel="alternate stylesheet" type="text/css" href="template/switcher/color-six.css" title="color-six" media="screen" />
        <link rel="alternate stylesheet" type="text/css" href="template/switcher/color-seven.css" title="color-seven" media="screen" />
        <link rel="alternate stylesheet" type="text/css" href="template/switcher/color-eight.css" title="color-eight" media="screen" />
        <link rel="alternate stylesheet" type="text/css" href="template/switcher/color-nine.css" title="color-nine" media="screen" />
        <link rel="alternate stylesheet" type="text/css" href="template/switcher/color-ten.css" title="color-ten" media="screen" />
        <link rel="alternate stylesheet" type="text/css" href="template/switcher/color-ten.css" title="color-ten" media="screen" />
        <link rel="alternate stylesheet" type="text/css" href="template/switcher/pattren1.css" title="pattren1" media="screen" />
        <link rel="alternate stylesheet" type="text/css" href="template/switcher/pattren2.css" title="pattren2" media="screen" />
        <link rel="alternate stylesheet" type="text/css" href="template/switcher/pattren3.css" title="pattren3" media="screen" />
        <link rel="alternate stylesheet" type="text/css" href="template/switcher/pattren4.css" title="pattren4" media="screen" />
        <link rel="alternate stylesheet" type="text/css" href="template/switcher/pattren5.css" title="pattren5" media="screen" />
        <link rel="alternate stylesheet" type="text/css" href="template/switcher/background1.css" title="background1" media="screen" />
        <link rel="alternate stylesheet" type="text/css" href="template/switcher/background2.css" title="background2" media="screen" />
        <link rel="alternate stylesheet" type="text/css" href="template/switcher/background3.css" title="background3" media="screen" />
        <link rel="alternate stylesheet" type="text/css" href="template/switcher/background4.css" title="background4" media="screen" />
        <link rel="alternate stylesheet" type="text/css" href="template/switcher/background5.css" title="background5" media="screen" />
    
        <link href="js/plugins/magnific-popup/magnific-popup.css" type="text/css" rel="stylesheet" media="screen,projection">
        <style>
            marquee span a {color:white};
        </style>
    </head>
    <body ng-init="button_readmore='<?= $this->lang->line('button_readmore')?>';berita_11='<?= $this->lang->line('text_berita_11')?>';berita_kewilayahan='<?= $this->lang->line('text_berita_kewilayahan')?>';pusat_belajar_11='<?= $this->lang->line('text_pusat_belajar')?>';sumber_bacaan='<?= $this->lang->line('text_sumber_bacaan')?>';tampilkan_semua='<?= $this->lang->line('text_tampilkan_semua')?>'">
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        <!--Main Wrapper Start-->
        <div class="as-mainwrapper">
            <!--Bg White Start-->
            <div class="bg-white">
                <!--Header Area Start-->
                <header class="header-two">
                    <div class="header-top">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-7 col-md-6 col-sm-5 hidden-xs">
                                    <marquee scrollamount="5"><span>WIFI EDUKASI SMKN 11 BANDUNG 
                                    <?php
                                        $this->db->where("link","berita_sekolah");
                                        $result = $this->db->get("v_news",8,0)->result_array();
                                        foreach($result as $row)
                                        {
                                            echo " <img src='".base_url("images/logo11.png")."' style='height:24px'> <a href='#{$row["link"]}/detail/{$row["id"]}'>".$row["title_".$this->session->userdata("site_lang")]."</a>";
                                        }
                                    ?>
                                    </span></marquee>
                                </div>
                                <div class="col-lg-5 col-md-6 col-sm-7 col-xs-12">
                                    <div class="header-top-right">
									<span><a href="#kritik_saran" style="color:white"><?= $this->lang->line('navigation_contacts'); ?></a></span>
                                        <span><?= $this->lang->line('phone_number'); ?></span>
                                        <span>
                                            <a href="<?=site_url("beranda/switch_language/indonesia")?>" style="color:white">Indonesia</a> | 
                                            <a href="<?=site_url("beranda/switch_language/english")?>" style="color:white">English</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="header-logo-menu sticker">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-2 col-sm-12">
                                    <div class="logo">
                                        <a href="<?=base_url()?>" style="line-height: 50px;text-align: center;"><img src="<?=base_url("images/logo11.jpg")?>" alt="SMKN 11 BDG" style="height:64px;"> SMKN 11 BDG</a>
                                    </div>
                                </div>
                                <div class="col-md-10 hidden-sm hidden-xs">
                                    <div class="mainmenu-area pull-right">
                                        <div class="mainmenu">
                                            <nav>
                                                <ul id="nav" ng-controller="navigation_lists">
                                                    <li ng-repeat="navigation in list_navigations | filter:{ type: '!external' }">
                                                        <a href="#/{{navigation.link}}" title="{{navigation.title}}">
                                                            {{navigation.name}}
                                                         </a>
                                                    </li>
                                                    
                                                </ul>
                                            </nav>
                                        </div>
                                        <ul class="header-search">
                                            <li class="search-menu">
                                                <i id="toggle-search" class="zmdi zmdi-search-for"></i>
                                            </li>
                                        </ul>
                                        <!--Search Form-->
                                        <div class="search">
                                            <div class="search-form" ng-controller="searchable">
                                                
                                                    <input type="search" placeholder="Search here..." name="search" ng-keyup="search(keywords)" ng-model="keywords"/>
                                                    <button type="submit">
                                                        <span><i class="fa fa-search"></i></span>
                                                    </button>
                                                
                                            </div>
                                        </div>
                                        <!--End of Search Form-->
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>  
                    <!-- Mobile Menu Area start -->
                    <div class="mobile-menu-area">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="mobile-menu">
                                        <nav id="dropdown">
                                            <ul ng-controller="navigation_lists">
                                                <li ng-repeat="navigation in list_navigations | filter:{ type: '!external' }">
                                                        <a href="#/{{navigation.link}}" title="{{navigation.title}}">
                                                            {{navigation.name}}
                                                         </a>
                                                    </li>
                                                
                                            </ul>
                                        </nav>
                                    </div>					
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Mobile Menu Area end -->   
                </header>
                <!--End of Header Area-->
                <section id="content" ng-view></section>
                
                
                <!--Newsletter Area Start-->
                <div class="newsletter-area newsletter-two" style="background:#2d3e50 none repeat scroll 0 0">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-5 col-sm-5 col-xs-12">
                                <div class="newsletter-content">
                                    <h3>SUBSCRIBE</h3>
                                    <h2>TO OUR NEWSLETTER</h2>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-7 col-xs-12">
                                <div class="newsletter-form">
                                    <form action="#" id="mc-form" class="mc-form footer-newsletter fix">
                                        <div class="subscribe-form">
                                            <input id="mc-email" type="email" name="email" placeholder="Enter your email address...">
                                            <button id="mc-submit" type="submit">SUBSCRIBE</button>
                                        </div>    
                                    </form>
                                    <!-- mailchimp-alerts Start -->
                                    <div class="mailchimp-alerts text-centre fix">
                                        <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                        <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                                        <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                                    </div>
                                    <!-- mailchimp-alerts end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End of Newsletter Area-->
               
                <!--Footer Area Start-->
                <footer class="footer-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-sm-7">
                                <span><?= $this->lang->line('website_footer'); ?></span>
                            </div>
                            <div class="col-md-6 col-sm-5">
                                <div class="column-right">
                                    <span>Privacy Policy , Terms &amp; Conditions</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <!--End of Footer Area-->
            </div>   
            <!--End of Bg White--> 
        </div>    
        <!--End of Main Wrapper Area--> 
        
        
        
		<!-- jquery
		============================================ -->		
        <script src="template/js/vendor/jquery-1.12.4.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                
               $('marquee span').mouseover(function() {
                    $("marquee").attr('scrollamount',0);
                }).mouseout(function() {
                     $("marquee").attr('scrollamount',5);
                }); 
            });
        </script>
        
		<!-- bootstrap JS
		============================================ -->		
        <script src="template/js/bootstrap.min.js"></script>
        
        <!-- nivo slider js
		============================================ -->       
		<script src="template/lib/nivo-slider/js/jquery.nivo.slider.js" type="text/javascript"></script>
		<script src="template/lib/nivo-slider/home.js" type="text/javascript"></script>
        
		<!-- meanmenu JS
		============================================ -->		
        <script src="template/js/jquery.meanmenu.js"></script>
		
		<!-- wow JS
		============================================ -->		
        <script src="template/js/wow.min.js"></script>
        
		<!-- owl.carousel JS
		============================================ -->		
        <script src="template/js/owl.carousel.min.js"></script>
        
		<!-- scrollUp JS
		============================================ -->		
        <script src="template/js/jquery.scrollUp.min.js"></script>
        
		<!-- Waypoints JS
		============================================ -->		
        <script src="template/js/waypoints.min.js"></script>
        
		<!-- Counterup JS
		============================================ -->		
        <script src="template/js/jquery.counterup.min.js"></script>
        
		<!-- Slick JS
		============================================ -->		
        <script src="template/js/slick.min.js"></script>
        
		<!-- Animated Headlines JS
		============================================ -->		
        <script src="template/js/animated-headlines.js"></script>
        
		<!-- Textilate JS
		============================================ -->		
        <script src="template/js/textilate.js"></script>
        
		<!-- Lettering JS
		============================================ -->		
        <script src="template/js/lettering.js"></script>
        
		<!-- Video Player JS
		============================================ -->		
        <script src="template/js/jquery.mb.YTPlayer.js"></script>
        
		<!-- Mail Chimp JS
		============================================ -->		
        <script src="template/js/jquery.ajaxchimp.min.js"></script>
        
		<!-- AJax Mail JS
		============================================ -->		
        <script src="template/js/ajax-mail.js"></script>
        
		<!-- plugins JS
		============================================ -->		
        <script src="template/js/plugins.js"></script>
        
		<!-- StyleSwitch JS
		============================================ -->	
        <script src="template/js/styleswitch.js"></script>
        
		<!-- main JS
		============================================ -->		
        <script src="template/js/main.js"></script>
        
        
        <!-- custom !-->
        <script type="text/javascript" src="js/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
        
        <script src="lib/angular/angular.js"></script>
        <script src="lib/angular/angular-route.js"></script>
        <script src="lib/angular/angular-sanitize.min.js"></script>
        <script src="js/app.js"></script>
        <script src="js/services.js"></script>
        <script src="js/controllers.js"></script>
        <script src="js/filters.js"></script>
        <script src="js/directives.js"></script>
        <script src="js/plugins/imagesloaded.pkgd.min.js"></script>
        
        <!-- custom !-->
    </body>

</html>