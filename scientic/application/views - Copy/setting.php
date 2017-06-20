<section class="hbox stretch">
  <section>
    <section class="vbox">
      <section class="scrollable padder">
        <h3 class="m-b-xs text-black">LOGIN | <span class="text-sm">Setup Login.</span></h3>
		<hr>
        <div class="row">
         	 
        	<div class="col-sm-8">
              <section class="panel panel-default">
                  <header class="panel-heading bg-light">
                    <ul class="nav nav-tabs pull-right">
                      <li class="active"><a id="ATabIdentityofTheColege" href="#TabIdentityofTheColege" data-toggle="tab"><span class="label bg-success"><i class="fa fa-home icon-muted"></i></span>  Login</a></li>
                      

                    </ul>
                    <span class="hidden-sm">Setup Profile</span> </header>
                  <div class="panel-body">
                    <div class="tab-content">
 
						<div class="tab-pane active" id="TabIdentityofTheColege">
						<form class="bs-example form-horizontal formLogin" action="<?=site_url("dashboard/saveChangePassword")?>" method="POST">
                          <h5>Login Setting<hr></h5>
							  <div class="form-group">

								<label class="col-sm-4 control-label">Password Lama *</label>
								<div class="col-sm-8 input-group-sm">
								  <input type="password" name="oldPassword" class="form-control" placeholder="1XXXX" required="true">
								</div>

							  </div>
							  <div class="form-group">

								<label class="col-sm-4 control-label">Password Baru *</label>
								<div class="col-sm-8 input-group-sm">
								  <input type="password" name="newPassword" class="form-control" placeholder="1XXXX" required="true">
								</div>

							  </div>
							  <div class="form-group">

								<label class="col-sm-4 control-label">Ulangi Password Baru *</label>
								<div class="col-sm-8 input-group-sm">
								  <input type="password" name="repeatPassword" class="form-control" placeholder="1XXXX" required="true">
								</div>

							  </div>
							  <div class="form-group text-right">
                            <div class="col-lg-offset-2 col-lg-10"><i class="fa fa-spin fa-spinner hide" id="spin2"></i>
                              <button type="submit" onclick="$('.formLogin').submit()" class="btn btn-sm btn-primary btn-s-xs">Save</button>
                              <button type="reset" class="btn btn-sm btn-default btn-s-xs">Cancel</button>
                            </div>
                          </div>
						</form>
						</div>
                    </div>
                  </div>
                </section>
            </div>
          </div>
	         <script type="text/javascript" src="<?=base_url()?>assets/backend/js/datepicker/bootstrap-datepicker.js"></script>
            <script type="text/javascript">
              //$(".datepicker-input").each(function(){ $(this).datepicker();});
              $(document).ready(function(){
				  $(".formLogin").submit(function(){
					var oldPassword = $("[name=oldPassword]").val();
					var newPassword = $("[name=newPassword]").val();
					var repeatPassword = $("[name=repeatPassword]").val();
					if(oldPassword!="<?=$this->session->userdata("password")?>")
					{
						alert.alert("Akun","Password Lama Salah",function(){});
						return false;
					}
					if(newPassword!=repeatPassword)
					{
						alert.alert("Akun","Password Baru tidak cocok",function(){});
						return false;
					}
                  var formData = new FormData(this);
                	$.ajax({
                		type:'POST',
                		url: $(this).attr('action'),
                		data:formData,
                    dataType:'json',
                		cache:false,
                		contentType: false,
                		processData: false,
                		success:function(result){
                        if(result.status=="success")
                        {
                          $("#spin3").removeClass("show");
                          $("#spin3").removeClass("inline");
                          $(".btnSave3").html("Save");
                          $(".btnSave3").removeClass("disabled");
                          $(".btnSave3").removeAttr("disabled");

                          Notification.open(result.message,"success");
                        }
                        else{
                          $("#spin3").removeClass("show");
                          $("#spin3").removeClass("inline");
                          $(".btnSave3").html("Save");
                          $(".btnSave3").removeClass("disabled");
                          $(".btnSave3").removeAttr("disabled");

                          Notification.open(result.message,"error");
                        }
                    },
                    error:function(){
                        Notification.open("Connection lost, Check your Connection and try again !","error");
                    }
                    });
                    return false;
                });
				
					
              });
			  function set_kota(kode_kota,name_provinsi,name_kota)
			  {
				//console.log(kode_kota);
				$.ajax({
				  type:'POST',
				  url: "<?=site_url()?>/dashboard/getKota/",
				  data:{kode_propinsi:$('[name="'+name_provinsi+'"]').val(),kode_kota:kode_kota},
				  success:function(result){
					$('[name="'+name_kota+'"]').html(result);

				  }
				});
			  }
            </script>
    </section>
    </section>
  </section>
</section>
