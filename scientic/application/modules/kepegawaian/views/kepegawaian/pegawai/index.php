<style>
	.imgChangeImage{
		width: 130px;
	}
	.pd{
		padding-top: 20px;
	}
	.pd2{
		padding-top: 40px;
	}
	.divider{
		margin-bottom: 10px !important;
	}
</style>
<section class="hbox stretch">
  <section>
    <section class="vbox">
      <header class="header bg-white b-b b-light">
        <p class="groupAction">
          <button type="button" class="btn btn-s-md btn-info btn-sm" id="addrowbutton">Tambah</button>
          <button type="button" class="btn btn-s-md btn-info btn-sm" id="saverowbutton" disabled>Simpan</button>
          <button type="button" class="btn btn-s-md btn-info btn-sm" id="editrowbutton" disabled>Ubah</button>
          <button type="button" class="btn btn-s-md btn-info btn-sm" id="deleterowbutton" disabled>Hapus</button>
		  <i class="fa fa-spin fa-spinner hide" id="spin"></i>
        </p>
      </header>
      <section class="scrollable padder">
        <div class="row">
          
            <div id="jqxWidget">
              <div id="jqxTabs" style="overflow:hidden;">
                <ul>
                  <li style="margin-left: 30px;">Index</li>
				  <li>Informasi Umum</li>
				  <li>Anak</li>
				  <li>Beasiswa</li>
				  <li>Buku</li>
				  <li>Diklat</li>
				  <li>Karya Tulis</li>
				  <li>Kesejahteraan</li>
				  <li>Tunjangan</li>
				  <li>Tugas</li>
				  <li>Inpasing</li>
				  <li>Penghargaan</li>
				  <li>Nilai Tes</li>
				  <li>Riwayat Gaji Berkala</li>
				  <li>Riwayat Jabatan Struktural</li>
				  <li>Riwayat Kepangkatan</li>
				 <li>Riwayat Pendidikan Formal</li>
				  <li>Riwayat Sertifikasi</li>
				 <li>Riwayat Jabatan Fungsional</li>
				</ul>

                <div><!--form in div-->
                  <div id="jqxGrid"></div>

                </div>

                <div class="col-md-12 content-wrapper" style="display: block;overflow-x:hidden;">
                  <!--form in div-->
					<br/>
					<form id="formDosen" class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" name="formDosen">
					<?php $this->load->view("informasiUmum")?>
					<input type="reset" class="reset" style="display:none">
                  
					</form>
                </div>
				<div>
					<div id="jqwidgetsKeluarga"></div>
				</div>
				<div>
					<div id="jqwidgetsBeasiswa"></div>
				</div>
				<div>
					<div id="jqwidgetsBuku"></div>
				</div>
				<div>
					<div id="jqwidgetsDiklat"></div>
				</div>
				<div>
					<div id="jqwidgetsKaryatulis"></div>
				</div>
				<div>
					<div id="jqwidgetsKesejahteraan"></div>
				</div>
				<div>
					<div id="jqwidgetsTunjangan"></div>
				</div>
				<div>
					<div id="jqwidgetsTugas"></div>
				</div>
				<div>
					<div id="jqwidgetsInpasing"></div>
				</div>
				<div>
					<div id="jqwidgetsPenghargaan"></div>
				</div>
				<div>
					<div id="jqwidgetsNilai"></div>
				</div>
				<div><!--Style untuk scroll hanya di hidden-->
					<div id="jqwidgetsGaji"></div>
				</div>
				<div><!--Style untuk scroll hanya di hidden-->
					<div id="jqwidgetsJabatan"></div>
                </div>
				
				
                <div><!--Style untuk scroll hanya di hidden-->
                  
                  <div id="jqwidgetsGolongan"></div>
                </div>

                

                
			  
				
			  
				  <div>
					<div id="jqwidgetsSekolah"></div>
				  </div>
			  
				  <div>
					<div id="jqwidgetsSertifikasi"></div>
				  </div>
			  
				  <div>
					<div id="jqwidgetsPekerjaan"></div>
				  </div>
			  
				  
			  
            </div>
           
        </div>
      </section>
    </section>
  </section>
</section>
<script type="text/javascript">
  var items = new Object();
  $(document).ready(function(){
	  $(".groupAction button").click(function(){
		$(".groupAction button").addClass("btn-info");
		$(".groupAction button").removeClass("btn-primary");
		$(this).removeClass("btn-info");
		$(this).addClass("btn-primary");
		 // $("#jqxNavigationBar").jqxNavigationBar({ width: 300, expandMode: 'multiple', expandedIndexes: [2, 3]});
		 
		
	});
	$("#jqxNavigationBar").jqxNavigationBar({ width: '100%', expandMode: 'multiple',expandedIndexes: [0,1,2,3,4,5]});
    $(".tgllahir").jqxDateTimeInput({formatString: 'dd-MM-yyyy'});
    <?=$this->load->view("jqxgrid/jqxgrid.js",array(),TRUE)?>
	<?=$this->load->view("jqxgridKeluarga.js",array(),TRUE)?>
	<?=$this->load->view("jqxgridBeasiswa.js",array(),TRUE)?>
	<?=$this->load->view("jqxgridBuku.js",array(),TRUE)?>
	<?=$this->load->view("jqxgridDiklat.js",array(),TRUE)?>
	<?=$this->load->view("jqxgridKaryatulis.js",array(),TRUE)?>
	<?=$this->load->view("jqxgridKesejahteraan.js",array(),TRUE)?>
	<?=$this->load->view("jqxgridTunjangan.js",array(),TRUE)?>
	<?=$this->load->view("jqxgridTugas.js",array(),TRUE)?>
	<?=$this->load->view("jqxgridInpasing.js",array(),TRUE)?>
	<?=$this->load->view("jqxgridPenghargaan.js",array(),TRUE)?>
	<?=$this->load->view("jqxgridNilai.js",array(),TRUE)?>
    <?=$this->load->view("jqxgridGolongan.js",array(),TRUE)?>
    <?=$this->load->view("jqxgridJabatan.js",array(),TRUE)?>
	<?=$this->load->view("jqxgridGaji.js",array(),TRUE)?>
	
	<?=$this->load->view("jqxgridSekolah.js",array(),TRUE)?>
	<?=$this->load->view("jqxgridSertifikasi.js",array(),TRUE)?>
	<?=$this->load->view("jqxgridPekerjaan.js",array(),TRUE)?>
	
    $(".groupAction button").click(function(){
      $(".groupAction button").removeClass("active");
      $(this).addClass("active");
    })
    //setInputDate();
    var initWidgets = function (tab) {
      switch (tab) {
        case 0:
          break;
        case 1:
          break;
      }
    }
    $('#jqxTabs').jqxTabs({ width: '100%', height: $(window).height()-60, position: 'top',initTabContent:initWidgets});
    $("#editrowbutton").click(function(){
      $('#jqxTabs').jqxTabs('select', 1);
      removeReadOnly();
    });
    
    $("#saverowbutton").click(function(){
      $("#formDosen input[type=submit]").click();
    });
    $("#deleterowbutton").on('click', function (){
        rowsSelectedGuru = elementJqxGridReligion.jqxGrid('getselectedrowindexes');
        if (rowsSelectedGuru.length>=1) {
            var commit = elementJqxGridReligion.jqxGrid('deleterow');
        }
    });
    $("#jqxGrid").on('rowselect', function (event) {
      items = event.args.row;
      setReadOnly();
      $("#saverowbutton").removeAttr("disabled");
      $("#editrowbutton").removeAttr("disabled");
      $("#deleterowbutton").removeAttr("disabled");
      $(".imgChangeImage").attr("src","<?=base_url()?>assets/pegawai/"+items.nip+"/"+items.nip+".jpg");
      $("#formDosen input,#formDosen textarea,#formDosen select").each(function(){
        if($(this).attr("type")=="radio")
        {
          $("input[type=radio][name='"+$(this).attr("name")+"']").removeAttr("checked");
          $("input[type=radio][name='"+$(this).attr("name")+"'][value='"+items[$(this).attr("name")]+"']").prop("checked",true);

        }
        if($(this).attr("name")=="tgllahir")
        {
          $(".tgllahir").jqxDateTimeInput("val",items[$(this).attr("name")]);
        }
        else if($(this).attr("name")=="kota")
        {
          set_kota(items[$(this).attr("name")],"provinsi","kota");
        }
        else if($(this).attr("name")=="kota_ot")
        {
          set_kota(items[$(this).attr("name")],"provinsi_ot","kota_ot");
        }
        else if($(this).attr("name")=="kota_skl")
        {
          set_kota(items[$(this).attr("name")],"provinsi_skl","kota_skl");
        }
        else{
          if($(this).attr("type")!="radio")
          {
            $(this).val(items[$(this).attr("name")]);
          }
        }
      });
    });
	
	setReadOnly();
  });
  
  $('[name="provinsi"]').change(function(){
    $.ajax({
      type:'POST',
      url: "<?=current_url()?>/getKota/",
      data:{kode_propinsi:$(this).val()},
      success:function(result){
        $('[name="kota"]').html(result);

      }
    });
  });
  $("#formDosen").submit(function(){
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

          Notification.open(result.message,"success");
		  $(".imgChangeImage").attr("src","<?=base_url()?>assets/dosen/"+items.nip+"/s.jpg").promise().done(function(){
			  console.log("called");
			$(".imgChangeImage").attr("src","<?=base_url()?>assets/dosen/"+items.nip+"/"+items.nip+".jpg");
		  });
		  elementJqxGridReligion.jqxGrid('updatebounddata');
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
  function setReadOnly()
  {
    $("#formDosen input,#formDosen select").each(function(){
      if($(this).attr("name"))
      {
        $(this).attr("readonly","true");
      }
    });
  }
  function removeReadOnly()
  {
    $("#formDosen input,#formDosen select").removeAttr("readonly");
  }
  function set_kota(kode_kota,name_provinsi,name_kota)
  {
    //console.log(kode_kota);
    $.ajax({
      type:'POST',
      url: "<?=current_url()?>/getKota/",
      data:{kode_propinsi:$('[name="'+name_provinsi+'"]').val(),kode_kota:kode_kota},
      success:function(result){
        $('[name="'+name_kota+'"]').html(result);

      }
    });
  }
</script>
