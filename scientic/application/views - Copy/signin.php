<!DOCTYPE html>
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
        <link href="<?=cdn_url("scientic/signin/")?>/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=cdn_url("scientic/signin/")?>/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=cdn_url("scientic/signin/")?>/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=cdn_url("scientic/signin/")?>/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="<?=cdn_url("scientic/signin/")?>/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?=cdn_url("scientic/signin/")?>/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=cdn_url("scientic/signin/")?>/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?=cdn_url("scientic/signin/")?>/assets/global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?=cdn_url("scientic/signin/")?>/assets/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="<?=cdn_url("scientic/signin/")?>/assets/pages/css/login-5.min.css" rel="stylesheet" type="text/css" />
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
            .loader {
            border: 5px solid #f3f3f3; /* Light grey */
            border-top: 5px solid #3498db; /* Blue */
            border-radius: 50%;
            width: 32px;
            height: 32px;
            animation: spin 2s linear infinite;
            float:right;
            display:none;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
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
                    <div class="login-bg" style="background-image:url(<?=cdn_url("scientic/signin/")?>/assets/pages/img/login/bg1.jpg)">
                        <img class="login-logo" src="<?=cdn_url("images/icon.png")?>" style="width:64px"/>
                    </div>
                </div>
                <div class="col-md-6 login-container bs-reset">
                    <div class="login-content" style="margin-top:15%">
                        <center><img src="<?=cdn_url("images/logo_besar.png")?>" style="width:100%"></center>
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
                                    <!--
                                    <div class="forgot-password">
                                        <a href="javascript:;">Forgot Password?</a>
                                    </div>
                                    !-->
                                    <button class="btn blue" type="submit">Sign In</button>
                                    <span class="loader"></span>
                                    
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="login-footer">
                        <div class="row bs-reset">

                            <div class="col-xs-8 bs-reset">
                                <div class="login-copyright text-right">
                                    <p>Copyright &copy; SCOLA 2017</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END : LOGIN PAGE 5-1 -->
        <!--[if lt IE 9]>
			<script src="<?=cdn_url("scientic/signin/")?>/assets/global/plugins/respond.min.js"></script>
			<script src="<?=cdn_url("scientic/signin/")?>/assets/global/plugins/excanvas.min.js"></script>
		<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script type="text/javascript">
        function cdn_url()
        {
          return "<?=cdn_url()?>";
        }
        function assets_url()
        {
          return "<?=assets_url()?>";
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
        <script src="<?=cdn_url("scientic/signin/")?>/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?=cdn_url("scientic/signin/")?>/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?=cdn_url("scientic/signin/")?>/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="<?=cdn_url("scientic/signin/")?>/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?=cdn_url("scientic/signin/")?>/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?=cdn_url("scientic/signin/")?>/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="<?=cdn_url("scientic/signin/")?>/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?=cdn_url("scientic/signin/")?>/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?=cdn_url("scientic/signin/")?>/assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="<?=cdn_url("scientic/signin/")?>/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <script src="<?=cdn_url("scientic/signin/")?>/assets/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script type="text/javascript">
          //var Login=function(){var e=function(){$(".login-form input").keypress(function(e){return 13==e.which?($(".login-form").validate().form()&&$(".login-form").submit(),!1):void 0})};return{init:function(){e(),$(".login-bg").backstretch([cdn_url()+"scientic/material/assets/pages/img/login/bg1.jpg"],{fade:1e3,duration:8e3})}}}();jQuery(document).ready(function(){Login.init()});
        </script>

        <script type="text/javascript">
		
        $(".form_signin").submit(function(){
                $(".loader").show();
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
                    $(".loader").show();
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
