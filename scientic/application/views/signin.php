<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.5
Version: 4.5
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>SCIENTIC</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <!--
        <link href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        !-->
        <link href="<?=base_url("assets/material/")?>/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url("assets/material/")?>/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url("assets/material/")?>/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url("assets/material/")?>/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url("assets/material/")?>/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?=base_url("assets/material/")?>/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url("assets/material/")?>/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?=base_url("assets/material/")?>/assets/global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?=base_url("assets/material/")?>/assets/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="<?=base_url("assets/material/")?>/assets/pages/css/login-5.min.css" rel="stylesheet" type="text/css" />
        <style>
        .dh_hover {
            border:1px solid #aaa!important;
            position: relative;
            top: -1px;
            left: -1px;
            right: -1px;
            bottom: -1px;
            opacity: 0.8;
          }
        </style>
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class=" login">
        <!-- BEGIN : LOGIN PAGE 5-1 -->
        <div class="user-login-5">
            <div class="row bs-reset">
                <div class="col-md-6 bs-reset">
                    <div class="login-bg" style="background-image:url(<?=base_url("assets/material/")?>/assets/pages/img/login/bg1.jpg)">
                        <img class="login-logo" src="<?=base_url("assets/backend/images/logo.png")?>" style="width:64px"/>
                    </div>
                </div>
                <div class="col-md-6 login-container bs-reset">
                    <div class="login-content">
                        <center><h1>SCIENTIC </h1></center>
                        <center><h2>( Synergic Integration of Academic )</h2></center>
                        <center><p> A Key for an Efficient Academic Operation</p></center>
                        <form action="<?=site_url()?>/dashboard/proccess_signin/" method="post" class="form_signin login-form">
                            <div class="row">
                                <div class="col-xs-6">
                                    <input type="text" placeholder="Username" class="form-control login-username" id="login-username" name="username" autofocus="true" required/> </div>
                                <div class="col-xs-6">
                                    <input type="password" placeholder="Password" class="form-control login-password" id="login-password" name="password" required/> </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="rem-password">

                                    </div>
                                </div>
                                <div class="col-sm-8 text-right">
                                    <div class="forgot-password">
                                        <a href="javascript:;">Forgot Password?</a>
                                    </div>
                                    <button class="btn blue" type="submit">Sign In</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="login-footer">
                        <div class="row bs-reset">

                            <div class="col-xs-8 bs-reset">
                                <div class="login-copyright text-right">
                                    <p>Copyright &copy; TOGA 2016</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END : LOGIN PAGE 5-1 -->
        <!--[if lt IE 9]>
			<script src="<?=base_url("assets/material/")?>/assets/global/plugins/respond.min.js"></script>
			<script src="<?=base_url("assets/material/")?>/assets/global/plugins/excanvas.min.js"></script>
		<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script type="text/javascript">
        function base_url()
        {
          return "<?=base_url()?>";
        }
        function site_url()
        {
          return "<?=site_url()?>";
        }
        function current_url()
        {
          return "<?=current_url()?>";
        }
        </script>
        <script src="<?=base_url("assets/material/")?>/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?=base_url("assets/material/")?>/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?=base_url("assets/material/")?>/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="<?=base_url("assets/material/")?>/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?=base_url("assets/material/")?>/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?=base_url("assets/material/")?>/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="<?=base_url("assets/material/")?>/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?=base_url("assets/material/")?>/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?=base_url("assets/material/")?>/assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="<?=base_url("assets/material/")?>/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <script src="<?=base_url("assets/material/")?>/assets/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?=base_url("assets/material/")?>/assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script type="text/javascript">
          var Login=function(){var e=function(){$(".login-form input").keypress(function(e){return 13==e.which?($(".login-form").validate().form()&&$(".login-form").submit(),!1):void 0})};return{init:function(){e(),$(".login-bg").backstretch([base_url()+"assets/material/assets/pages/img/login/bg1.jpg",base_url()+"assets/material/assets/pages/img/login/bg2.jpg",base_url()+"assets/material/assets/pages/img/login/bg3.jpg"],{fade:1e3,duration:8e3})}}}();jQuery(document).ready(function(){Login.init()});
        </script>

        <script type="text/javascript">
		
        $(".form_signin").submit(function(){
          $.ajax({
            url:$(this).attr("action"),
            data:$(this).serialize(),
            dataType:"Json",
            type:"POST",
            success:function(result)
            {
              if(result.status=="success")
              {
                  location.href="<?=site_url()?>/dashboard/";
              }
              else{
                alert(result.message);
              }
            }
          });
          return false;
        });
        </script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->

    </body>

</html>
