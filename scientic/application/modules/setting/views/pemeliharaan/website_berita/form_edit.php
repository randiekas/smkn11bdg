<!DOCTYPE html>
<html lang="en">
<head>
 
    <title>SID</title>

    <!-- CORE CSS-->    
    <link href="<?=assets_url("assets/sid")?>/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?=assets_url("assets/sid")?>/css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->    
    <link href="<?=assets_url("assets/sid")?>/css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">


    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="<?=assets_url("assets/sid")?>/js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?=assets_url("assets/sid")?>/js/plugins/jvectormap/jquery-jvectormap.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?=assets_url("assets/sid")?>/js/plugins/chartist-js/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">

	<link href="<?=assets_url("assets/sid")?>/js/plugins/dropify/css/dropify.min.css" type="text/css" rel="stylesheet" media="screen,projection">
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

    <!-- START MAIN -->
    <div id="">
        <!-- START WRAPPER -->
        <div class="wrapper">

            <!-- //////////////////////////////////////////////////////////////////////////// -->

            <!-- START CONTENT -->
            <section id="content">

                <!--start container-->
                <div class="container">

                    
                    <!-- //////////////////////////////////////////////////////////////////////////// -->

                    <!--card widgets start-->
                    <div id="card-widgets">
                        <div class="row">
						
							<div class="">
									<div class="col s12 m12 l8">
										<div class="card">
											<div class="card-content">
												<p class="row">
												  <span class="left"><a href="#"><?=@$kategori?></a></span>
												  <span class="right"><?=date('l, j F Y',strtotime($row->created))?></span>
												</p>
												<h4 class="card-title grey-text text-darken-4"><a  class="grey-text activator text-darken-4"><?=$row->title?></a>
												</h4>
												<form method="post" action="../save_edit/<?=$this->uri->segment(5)?>">
												<div class="blog-post-content editable">
												<?=str_replace('<?=scientic_url()?>',base_url(),$row->content)?>
												</div>
												</form>
												<div class="row">
												  <div class="col s2">
													<img src="<?=assets_url("assets/sid")?>/images/avatar.jpg" alt="" class="circle responsive-img valign profile-image">
												  </div>
												  <div class="col s9"> Oleh <a href="#">Admin</a></div>
												</div>
											</div>
											<div class="card-reveal">
												<span class="card-title grey-text text-darken-4"><i class="mdi-navigation-close right"></i> Judul Berita</span>
												<p>Here is some more information about this blog that is only revealed once clicked on.</p>
											</div>
										</div>
									</div>
							</div>
							<div class="">
									<div class="col s12 m12 l4">
									<div class="card">
										<form action="../save_edit_image/<?=$this->uri->segment(5)?>" method="POST" enctype="multipart/form-data" class="formChangeImage">
											<input type="text" value="<?=$row->id?>" name="id" class="hide">
											<input type="file" name="foto" id="input-file-events" class="dropify-event" data-default-file="<?=sid_url((file_exists("../sid/assets/news/".$row->id.".jpg"))?"/assets/news/".$row->id.".jpg":"/images/img2.jpg")?>" data-height="400px" onchange="$('.formChangeImage').submit()"/>
											<input type="submit" class="hide">
										</form>
										<div class="card-content">
											
											<a class="btn waves-effect waves-light blue"><i class="mdi-editor-border-color right"></i> Klik gambar untuk ubah Cover</a>
											
										</div>
										
									</div>
									</div>
							</div>

                        </div>
                    <!--card widgets end-->

                    <!-- //////////////////////////////////////////////////////////////////////////// -->


                    <!-- Floating Action Button -->
                    <div class="fixed-action-btn" style="bottom: 50px; right: 19px;">
                        <a class="btn-floating btn-large">
                          <i class="mdi-navigation-arrow-back"></i>
                        </a>
                        
                    </div>
                    <!-- Floating Action Button -->

                </div>
                <!--end container-->
            </section>
            <!-- END CONTENT -->


        </div>
        <!-- END WRAPPER -->

    </div>
    <!-- END MAIN -->

    <!-- ================================================
    Scripts
    ================================================ -->
    
    <!-- jQuery Library -->
    <script type="text/javascript" src="<?=assets_url("assets/sid")?>/js/plugins/jquery-1.11.2.min.js"></script>    
    <!--materialize js-->
    <script type="text/javascript" src="<?=assets_url("assets/sid")?>/js/materialize.min.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="<?=assets_url("assets/sid")?>/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    
    
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="<?=assets_url("assets/sid")?>/js/plugins.min.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
	<script type="text/javascript" src="<?=assets_url("assets/sid")?>/js/plugins/dropify/js/dropify.min.js"></script>
    <script type="text/javascript" src="<?=assets_url("assets/sid")?>/js/custom-script.js"></script>
	<script src="<?=base_url("assets/tinymce")?>/js/tinymce/tinymce.min.js"></script>



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
				'emoticons template paste textcolor colorpicker textpattern imagetools responsivefilemanager'
			  ],
			  toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
			  toolbar2: 'print preview media | forecolor backcolor emoticons | responsivefilemanager',
			  external_filemanager_path:"<?=base_url()?>/assets/responsivefilemanager/filemanager/",
			  filemanager_title:"Responsive Filemanager" ,
			  external_plugins: { "filemanager" : "/assets/responsivefilemanager/tinymce/plugins/responsivefilemanager/plugin.min.js"},
			  image_advtab: true
			  });
	</script>
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


<!-- Mirrored from demo.geekslabs.com/materialize/v3.1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 09 Dec 2016 10:18:48 GMT -->
</html>

