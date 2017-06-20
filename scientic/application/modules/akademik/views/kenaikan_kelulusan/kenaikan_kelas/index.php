<section class="hbox stretch">
  <section>
    <section class="vbox">
      <header class="header bg-white b-b b-light">
        <p class="groupAction">
          <button type="button" class="btn btn-s-md btn-info btn-sm" id="addrowbutton">Pindah</button>
          <button type="button" class="btn btn-s-md btn-info btn-sm" id="deleterowbutton" disabled>Batal Pindah</button>
          <i class="fa fa-spin fa-spinner hide" id="spin"></i>
        </p>
      </header>
      <section class="scrollable padder">
        <div class="row">

			<div id="jqxTabs" style="overflow:hidden;">
            <ul>
              <li style="margin-left: 30px;">Data Siswa</li>
              <li>Detail Siswa</li>


            </ul>

            <div><!--form in div-->

							<div id="nested2">

								<div class="form-horizontal">

										<br/>
										<div class="col-md-12">
											<div class="form-group form-group-sm">
												<label for="calon_departemen" class="control-label col-sm-4">Departemen</label>
												<div class="col-sm-8">
													<select class="form-control" id="calon_departemen">
														<?php
														foreach($this->db->get("departemen")->result() as $row)
														{
														?>
														<option value="<?=$row->departemen?>"><?=$row->departemen?></option>
														<?php
														}
														?>
													</select>

												</div>
											</div>

											<div class="form-group form-group-sm">
												<label for="siswa_idtahunajaran" class="control-label col-sm-4">Th. Ajaran</label>
												<div class="col-sm-8">
													<select  class="form-control" id="siswa_idtahunajaran">

													</select>

												</div>
											</div>

											<div class="form-group form-group-sm">
												<label for="siswa_tingkat" class="control-label col-sm-4">Tingkat</label>
												<div class="col-sm-8">
													<select  class="form-control" id="siswa_tingkat">

													</select>

												</div>
											</div>

											<div class="form-group form-group-sm">
												<label for="siswa_idkelas" class="control-label col-sm-4">Kelas</label>
												<div class="col-sm-8">
													<select  class="form-control" id="siswa_idkelas">

													</select>

												</div>
											</div>
											<div class="form-group form-group-sm">
												<label for="nopendaftaran" class="control-label col-sm-4"></label>
												<div class="col-sm-8">

														<button type="button" class="btn btn-info btn-sm" id="filtersiswabutton">Tampilkan</button>
												</div>
											</div>
											<hr/>
											Kelas Tujuan

                      <div class="form-group form-group-sm">
												<label for="tujuan_departemen" class="control-label col-sm-4">Departemen</label>
												<div class="col-sm-8">
													<select class="form-control" id="tujuan_departemen">
														<?php
														foreach($this->db->get("departemen")->result() as $row)
														{
														?>
														<option value="<?=$row->departemen?>"><?=$row->departemen?></option>
														<?php
														}
														?>
													</select>

												</div>
											</div>

											<div class="form-group form-group-sm">
												<label for="tujuan_idtahunajaran" class="control-label col-sm-4">Th. Ajaran</label>
												<div class="col-sm-8">
													<select  class="form-control" id="tujuan_idtahunajaran">

													</select>

												</div>
											</div>

											<div class="form-group form-group-sm">
												<label for="tujuan_tingkat" class="control-label col-sm-4">Tingkat</label>
												<div class="col-sm-8">
													<select  class="form-control" id="tujuan_tingkat">

													</select>

												</div>
											</div>

											<div class="form-group form-group-sm">
												<label for="tujuan_idkelas" class="control-label col-sm-4">Kelas</label>
												<div class="col-sm-8">
													<select  class="form-control" id="tujuan_idkelas">

													</select>

												</div>
											</div>


											<div class="form-group form-group-sm">
												<label for="nopendaftaran" class="control-label col-sm-4"></label>
												<div class="col-sm-8">

														<button type="button" class="btn btn-info btn-sm" id="filtertujuanbutton">Tampilkan</button>
												</div>
											</div>
										</div>


								</div>
								<div>
                    <div id="nested3">
                        <div>
                          <div id="jqxGridSiswa"></div>
                        </div>
                        <div>
                          <div id="jqxGridTujuan"></div>
                        </div>
                    </div>


								</div>
							</div>

				  <div>

				  </div>
			</div>

			<div>

					<form class="form-horizontal formcalonsiswa" method="POST" enctype="multipart/form-data">
						<div class="container">
							<hr/>

								<?=$this->load->view("formdatapribadi")?>
						</div>
						<div class="container">
						<hr/>
								<?=$this->load->view("formdataorangtua")?>
						</div>
					</form>

			</div>









          </div>

        </div>
      </section>
    </section>
  </section>
</section>

<script type="text/javascript">
$(document).ready(function(){

	$("#mutasisavebutton").click(function(){
			$.ajax({
			  url:current_url()+"/savemutasi",
			  type:"POST",
			  dataType:'json',
			  data:{nis:$("#mutasi_nis").val(),
						jenismutasi:$("#mutasi_jenismutasi").val(),
						tglmutasi:$("#mutasi_tglmutasi").val(),
						keterangan:$("#mutasi_keterangan").val(),
						departemen:$("#mutasi_departemen").val()
						},
			  success:function(result)
			  {
					Notification.open(result.message,"success");
					jqxGridSiswa.jqxGrid('updatebounddata');
					$("#popupWindow").jqxWindow('hide');
			  }
		  });
	});

	$("#filtersiswabutton").click(function(){
		jqxGridSiswa.jqxGrid('source')._source.data.filter= 'false';
		jqxGridSiswa.jqxGrid('source')._source.data.departemen = $("#calon_departemen").val();
		jqxGridSiswa.jqxGrid('source')._source.data.idtahunajaran= $("#siswa_idtahunajaran").val();
		jqxGridSiswa.jqxGrid('source')._source.data.idkelas= $("#siswa_idkelas").val();
		jqxGridSiswa.jqxGrid('updatebounddata');
	});
  $("#filtertujuanbutton").click(function(){
		jqxGridTujuan.jqxGrid('source')._source.data.filter= 'false';
		jqxGridTujuan.jqxGrid('source')._source.data.departemen = $("#tujuan_departemen").val();
		jqxGridTujuan.jqxGrid('source')._source.data.idtahunajaran= $("#tujuan_idtahunajaran").val();
		jqxGridTujuan.jqxGrid('source')._source.data.idkelas= $("#tujuan_idkelas").val();
		jqxGridTujuan.jqxGrid('updatebounddata');
	});
	$("#filtersearchbutton").click(function(){

		jqxGridSiswa.jqxGrid('source')._source.data.filter = 'true';
		jqxGridSiswa.jqxGrid('source')._source.data.field = $("#field").val();
		jqxGridSiswa.jqxGrid('source')._source.data.keywords = $("#keywords").val();
		jqxGridSiswa.jqxGrid('updatebounddata');
	});
	$("#calon_departemen").change(function(){
		loadFilterOption();
	});
	$("#siswa_idtahunajaran").change(function(){
		loadKelasOption();
	});
  $("#tujuan_idtahunajaran").change(function(){
		loadTujuanKelasOption();
	});
  $("#siswa_tingkat").change(function(){
		loadKelasOption();
	});
  $("#tujuan_tingkat").change(function(){
		loadTujuanKelasOption();
	});
	loadFilterOption();
	loadTujuanFilterOption();

	$(".groupAction button").click(function(){
		$(".groupAction button").addClass("btn-info");
		$(".groupAction button").removeClass("btn-primary");
		$(this).removeClass("btn-info");
		$(this).addClass("btn-primary");

	});

	$('#nested2').jqxSplitter({  width:'100%',height:'100%',orientation: 'vertical', panels: [{ size: '30%'}] });
  $('#nested3').jqxSplitter({  width:'100%',height:'100%',orientation: 'vertical', panels: [{ size: '50%'}] });

  <?=$this->load->view("jqxgridSiswa.js",array(),TRUE)?>
  <?=$this->load->view("jqxgridTujuan.js",array(),TRUE)?>

  $('#jqxTabs').jqxTabs({ width: '100%', height: $(window).height()-60, position: 'top'});

  $("#addrowbutton").click(function(){
	  if(jqxGridSiswa.jqxGrid('getselectedrowindexes').length>=1)
	  {
			var nis = new Object();
			for(x=0;x<jqxGridSiswa.jqxGrid('getselectedrowindexes').length;x++)
			{
				nis[x] = jqxGridSiswa.jqxGrid('getrowdata', jqxGridSiswa.jqxGrid('getselectedrowindexes')[x]).nis;
			}
			$.ajax({
			  url:current_url()+"/store",
			  type:"POST",
			  dataType:'json',
			  data:{nis:nis,idkelas:$("#tujuan_idkelas").val(),idkelaslama:$("#siswa_idkelas").val()},
			  success:function(result)
			  {
					Notification.open(result.message,"success");
					jqxGridSiswa.jqxGrid('updatebounddata');
					jqxGridSiswa.jqxGrid('clearselection');
					$("#filtertujuanbutton").click();
			  }
		  });
	  }
  });
  $("#deleterowbutton").click(function(){
	  if(jqxGridTujuan.jqxGrid('getselectedrowindexes').length>=1)
	  {
			var nis = new Object();
			for(x=0;x<jqxGridTujuan.jqxGrid('getselectedrowindexes').length;x++)
			{
				nis[x] = jqxGridTujuan.jqxGrid('getrowdata', jqxGridTujuan.jqxGrid('getselectedrowindexes')[x]).nis;
			}
			$.ajax({
			  url:current_url()+"/destroy",
			  type:"POST",
			  dataType:'json',
			  data:{nis:nis,idkelas:$("#tujuan_idkelas").val(),idkelaslama:$("#siswa_idkelas").val()},
			  success:function(result)
			  {
					Notification.open(result.message,"success");
					jqxGridTujuan.jqxGrid('updatebounddata');
					jqxGridTujuan.jqxGrid('clearselection');
          $("#filtersiswabutton").click();

			  }
		  });
	  }
  });
	$("#deleterowbutton").click(function(){
	  var replid = new Object();
		for(x=0;x<jqxGridSiswa.jqxGrid('getselectedrowindexes').length;x++)
		{
			replid[x] = jqxGridSiswa.jqxGrid('getrowdata', jqxGridSiswa.jqxGrid('getselectedrowindexes')[x]).replid;
		}
	  if(jqxGridSiswa.jqxGrid('getselectedrowindexes').length>=1)
	  {
			confirm = function(){
		$.ajax({
			  url:current_url()+"/destroy",
			  type:"POST",
			  dataType:'json',
			  data:{replid:replid},
			  success:function(result)
			  {
					Notification.open(result.message,"success");
					jqxGridSiswa.jqxGrid('updatebounddata');
					jqxGridSiswa.jqxGrid('clearselection');
					$("#filtersiswabutton").click();
			  }
		  });
	};

	messageDelete = "Apakah anda yakin akan menghapus siswa ini <br> "+$("#nis").val()+"  : "+$("#nama").val();
	alert.confirm(alert.titleDelete(),messageDelete,confirm,function(){});




	  }
      //elementJqxGridReligion.jqxGrid({showeverpresentrow: true})
    });
	$("#saverowbutton").click(function(){
		$("input[type='submit']").click();
     });
	 $(".formcalonsiswa").submit(function(){
	$("input[name=idkelas]").val($("#siswa_idkelas").val());
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
					$("#addrowbutton").click();
				}
				else{
				$("#saverowbutton").attr("disabled","true");
			 }

			jqxGridSiswa.jqxGrid('updatebounddata');

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

function loadFilterOption()
	{
		$("#siswa_idtahunajaran").load(current_url()+"/getTahunAjaran/"+$("#calon_departemen").val());
		$("#siswa_tingkat").load(current_url()+"/getTingkat/"+$("#calon_departemen").val(),function(){
			loadKelasOption();
		});
		$("#idangkatan").load(current_url()+"/getAngkatan/"+$("#calon_departemen").val());

	}
function loadTujuanFilterOption()
  	{
  		$("#tujuan_idtahunajaran").load(current_url()+"/getTahunAjaran/"+$("#tujuan_departemen").val());
  		$("#tujuan_tingkat").load(current_url()+"/getTingkat/"+$("#tujuan_departemen").val(),function(){
  			loadTujuanKelasOption();
  		});
  	}
function loadKelasOption()
	{
    $("#siswa_idkelas").load(current_url()+"/getKelas/"+$("#siswa_idtahunajaran").val()+"/"+$("#siswa_tingkat").val(),function(){
      if($("#siswa_idtahunajaran").val()!="" && $("#siswa_tingkat").val()!="")
			{
				$("#filtersiswabutton").click();
			}
		});
	}
  function loadTujuanKelasOption()
  	{
      $("#tujuan_idkelas").load(current_url()+"/getKelas/"+$("#tujuan_idtahunajaran").val()+"/"+$("#tujuan_tingkat").val(),function(){
        if($("#tujuan_idtahunajaran").val()!="" && $("#tujuan_tingkat").val()!="")
  			{
  				$("#filtertujuanbutton").click();
  			}
  		});

  	}
</script>
