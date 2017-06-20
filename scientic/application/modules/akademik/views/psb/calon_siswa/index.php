<section class="hbox stretch">
  <section>
    <section class="vbox">
      <header class="header bg-white b-b b-light">
        <p class="groupAction">
          <button type="button" class="btn btn-s-md btn-info btn-sm" id="addrowbutton">Tambah</button>
		  <button type="button" class="btn btn-s-md btn-info btn-sm" id="saverowbutton" disabled>Simpan</button>
          <button type="button" class="btn btn-s-md btn-info btn-sm" id="deleterowbutton" disabled>Hapus</button>
          <i class="fa fa-spin fa-spinner hide" id="spin"></i>
        </p>
      </header>
      <section class="scrollable padder">
        <div class="row">
			<form class="form-horizontal formcalonsiswa" method="POST" enctype="multipart/form-data">
			<div id="jqxTabs" style="overflow:hidden;">
            <ul>
              <li style="margin-left: 30px;">Calon Siswa</li>
              <li>Data Pribadi</li>
			  <li>Data Orang Tua</li>
			  <li>Informasi Pembayaran</li>
			  <li>Data Nilai Ujian</li>
            </ul>

            <div><!--form in div-->
				  <div>
						<div id="jqxGrid"></div>
				  </div>
			</div>

			<div>


						<div class="container">
							<hr/>

								<?=$this->load->view("formdatapribadi")?>

						</div>


			</div>



			<div>

						<div class="container">
							<hr/>

								<?=$this->load->view("formdataorangtua")?>

						</div>

			</div>

			<div>

						<div class="container">
							<hr/>
							<div class="col-md-6">
								<?=$this->load->view("formdatasumbangan")?>
							</div>
						</div>

			</div>

			<div>

						<div class="container">
							<hr/>

								<?=$this->load->view("formdataujian")?>

						</div>

			</div>

          </div>
          </form>
        </div>
      </section>
    </section>
  </section>
</section>
<script type="text/javascript">
$(document).ready(function(){
	$(".groupAction button").click(function(){
		$(".groupAction button").addClass("btn-info");
		$(".groupAction button").removeClass("btn-primary");
		$(this).removeClass("btn-info");
		$(this).addClass("btn-primary");

	});
  <?=$this->load->view("jqxgrid/jqxgrid.js",array(),TRUE)?>
  $('#jqxTabs').jqxTabs({ width: '100%', height: $(window).height()-60, position: 'top'});

  $("#addrowbutton").click(function(){
		$("#jqxTabs").jqxTabs("select",1);
	  $("#saverowbutton").removeAttr("disabled");
	  $(".formcalonsiswa input,.formcalonsiswa select,.formcalonsiswa textarea").val('');
	  $("input[name=tahunmasuk]").val('<?=date("Y")?>');
      //elementJqxGridReligion.jqxGrid({showeverpresentrow: true})
    });
	$("#saverowbutton").click(function(){
			var status = "success";
			if($("select[name=idproses]").val()=="")
			{
				Notification.open("PSB Harus Diisi","error");
				status = "failed";
			}
			if($("select[name=nopendaftaran]").val()=="")
			{
				Notification.open("Nomor Pendaftaran Harus diisi","error");
				status = "failed";
			}
			if($("select[name=idkelompok]").val()=="")
			{
				Notification.open("Kelompok harus diisi","error");
				status = "failed";
			}
			if($("select[name=nisn]").val()=="")
			{
				Notification.open("NISN harus di isi","error");
				status = "failed";
			}
			if(status=="success")
			{
					$(".formcalonsiswa").submit();
			}

     });
	 $(".formcalonsiswa").submit(function(){
      var formData = new FormData(this);
      $.ajax({
        type:'POST',
        url: "<?=current_url()?>/save",
        data:formData,
        dataType:'json',
        cache:false,
        contentType: false,
        processData: false,
        success:function(result){
          if(result.status=="success")
          {

			  if($("[name=replid]").val()=="")
			  {
					$(".formcalonsiswa input,.formcalonsiswa select,.formcalonsiswa textarea").val('');
					$("input[name=tahunmasuk]").val('<?=date("Y")?>');
				}

			elementJqxGridReligion.jqxGrid('updatebounddata');

            Notification.open(result.message,"success");

            //$(".imgChangeImage").attr("src","<?=base_url()?>assets/identitas_pt/logo.png");
          }
          else{
            Notification.open(result.message,"error");
          }
        },
        error:function(){

          Notification.open("Connection lost, Check your Connection and try again !","error");
        }
      });
      return false;
    })
});


</script>
