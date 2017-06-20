<!DOCTYPE html>
<html lang="en" class="app">
<head>
<meta charset="utf-8" />
<title>Official SMKN 11 Bandung</title>
<meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<link rel="stylesheet" href="<?=assets_url("assets/frontend")?>/css/app.v1.css" type="text/css" />
<style>
.tooltip-inner{width:800px}
.panel-info{min-height:130px}
.navbar-fixed-top + section{
	padding-top: 70px;
}
.appear{
	visibility: hidden;
}
.animated{
	-webkit-animation-duration:1s;
	-moz-animation-duration:1s;
	-ms-animation-duration:1s;
	-o-animation-duration:1s;
	animation-duration:1s;
}

.h1{font-size: 30px}
h3{font-size: 30px;font-weight: 300}

.navbar{
	padding: 10px 0;
	border: none;
	-webkit-transition: padding ease-in-out 0.2s;
    transition: padding ease-in-out 0.2s;
}
.navbar-brand img{
	max-height: 40px;
}
.navbar.affix{
	padding: 0;
}
.navbar-nav > li > a{
	font-weight: bold;
	text-transform: uppercase;
	font-size: 12px;
}
.navbar-nav .dropdown-submenu .dropdown-menu{
	left: 0;
	top: 100%;
	border: none;
	background-color: #f5f5f5;
	min-width: 220px;
}
 
.intro > div{
	padding: 15% 0;
	background-color: #364268;
	background-color: rgba(18, 109, 167, 0.75);
}

.phone-img{
	margin: 40px auto;
	max-width: 420px;
}

/*phone*/
@media (max-width: 767px) {
	.navbar-fixed-top + section{
		padding-top: 50px;
	}
	.navbar.affix-top{
		padding: 0;
	}
	.navbar-brand{
		float: left !important;
	}
	.h1{font-size: 20px}
}

</style>
<!--[if lt IE 9]> <script src="js/ie/html5shiv.js"></script> <script src="js/ie/respond.min.js"></script> <script src="js/ie/excanvas.js"></script> <![endif]-->
</head>
<body class="">
<section class="vbox">
	<?php $this->load->view("header") ?>
	<section>
	<section class="hbox stretch">
         <section id="content">
			<section class="vbox">
					<section class="scrollable">
						<form method="post" action="<?=current_url()."/save_edit"?>">
							<div class="editable" name="testing">
									<?php $this->load->view("footer"); ?>
							</div>
						<input type="submit" style="display:none">
						</form>
						<!-- content !-->
					 </section>
				</section>
          </section>
	</section>
    </section>

</section>
<!-- footer -->

<!-- / footer -->
<!-- Bootstrap -->
<!-- App -->
<script src="<?=base_url("assets/tinymce")?>/js/tinymce/tinymce.min.js"></script>
<script src="<?=assets_url("assets/frontend")?>/js/app.v1.js"></script>
<script src="<?=assets_url("assets/frontend")?>/js/app.plugin.js"></script>
</body>
</html>
	
</section>
	<script type="text/javascript">
	tinymce.init({
				selector:"div.editable",
				inline:true,
				height: 400,
			  theme: 'modern',
			  plugins: [
				'advlist autolink lists link image charmap print preview hr anchor pagebreak',
				'searchreplace wordcount visualblocks visualchars code fullscreen',
				'insertdatetime media nonbreaking save table contextmenu directionality',
				'emoticons template paste textcolor colorpicker textpattern imagetools'
			  ],
			  toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
			  toolbar2: 'print preview media | forecolor backcolor emoticons',
			  image_advtab: true
				});
	</script>