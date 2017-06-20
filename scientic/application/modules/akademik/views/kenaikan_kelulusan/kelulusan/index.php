<section class="hbox stretch">
  <section>
    <section class="vbox">
      <header class="header bg-white b-b b-light">
        <p class="groupAction">
          <button type="button" class="btn btn-s-md btn-info btn-sm" id="addrowbutton">Lulus</button>
          <button type="button" class="btn btn-s-md btn-info btn-sm" id="deleterowbutton" disabled>Batal Lulus</button>
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
											Alumni

                      <div class="form-group form-group-sm">
												<label for="tahunlulus" class="control-label col-sm-4">Tahun Lulus</label>
												<div class="col-sm-8">
													<select class="form-control" id="tahunlulus">
														<?php
														for($year=2000;$year<=date("Y");$year++)
														{
														?>
														<option selected><?=$year?></option>
														<?php
														}
														?>
													</select>

												</div>
											</div>
                      <div class="form-group form-group-sm">
												<label for="tanggallulus" class="control-label col-sm-4">Tanggal Lulus</label>
												<div class="col-sm-8">
													<input type="date" class="form-control" id="tanggallulus" value="<?=date("Y-m-d")?>">


												</div>
											</div>
											<div class="form-group form-group-sm">
												<label for="nopendaftaran" class="control-label col-sm-4"></label>
												<div class="col-sm-8">

														<button type="button" class="btn btn-info btn-sm" id="filteralumnibutton">Tampilkan</button>
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
                          <div id="jqxGridAlumni"></div>
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
  $("#filteralumnibutton").click(function(){
		jqxGridAlumni.jqxGrid('source')._source.data.tahunlulus = $("#tahunlulus").val();
		jqxGridAlumni.jqxGrid('updatebounddata');
	});
	$("#calon_departemen").change(function(){
		loadFilterOption();
	});
	$("#siswa_idtahunajaran").change(function(){
		loadKelasOption();
	});
  $("#siswa_tingkat").change(function(){
		loadKelasOption();
	});

	loadFilterOption();


	$(".groupAction button").click(function(){
		$(".groupAction button").addClass("btn-info");
		$(".groupAction button").removeClass("btn-primary");
		$(this).removeClass("btn-info");
		$(this).addClass("btn-primary");

	});

	$('#nested2').jqxSplitter({  width:'100%',height:'100%',orientation: 'vertical', panels: [{ size: '30%'}] });
  $('#nested3').jqxSplitter({  width:'100%',height:'100%',orientation: 'vertical', panels: [{ size: '50%'}] });

  <?=$this->load->view("jqxgridSiswa.js",array(),TRUE)?>
  <?=$this->load->view("jqxgridAlumni.js",array(),TRUE)?>

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
			  data:{nis:nis,tanggallulus:$("#tanggallulus").val(),idkelas:$("#siswa_idkelas").val(),departemen:$("#calon_departemen").val(),idtingkat:$("#siswa_tingkat").val()},
			  success:function(result)
			  {
					Notification.open(result.message,"success");
					jqxGridSiswa.jqxGrid('updatebounddata');
					jqxGridSiswa.jqxGrid('clearselection');
					$("#filteralumnibutton").click();
			  }
		  });
	  }
  });
  $("#deleterowbutton").click(function(){
	  if(jqxGridAlumni.jqxGrid('getselectedrowindexes').length>=1)
	  {
			var nis = new Object();
			for(x=0;x<jqxGridAlumni.jqxGrid('getselectedrowindexes').length;x++)
			{
				nis[x] = jqxGridAlumni.jqxGrid('getrowdata', jqxGridAlumni.jqxGrid('getselectedrowindexes')[x]).nis;
			}
			$.ajax({
			  url:current_url()+"/destroy",
			  type:"POST",
			  dataType:'json',
			  data:{nis:nis,tanggallulus:$("#tanggallulus").val(),idkelas:$("#siswa_idkelas").val(),departemen:$("#calon_departemen").val(),idtingkat:$("#siswa_tingkat").val()},
			  success:function(result)
			  {
					Notification.open(result.message,"success");
					jqxGridAlumni.jqxGrid('updatebounddata');
					jqxGridAlumni.jqxGrid('clearselection');
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
});

function loadFilterOption()
	{
		$("#siswa_idtahunajaran").load(current_url()+"/getTahunAjaran/"+$("#calon_departemen").val());
		$("#siswa_tingkat").load(current_url()+"/getTingkat/"+$("#calon_departemen").val(),function(){
			loadKelasOption();
		});
		$("#idangkatan").load(current_url()+"/getAngkatan/"+$("#calon_departemen").val());

	}
function loadKelasOption()
	{
    $("#siswa_idkelas").load(current_url()+"/getKelas/"+$("#siswa_idtahunajaran").val()+"/"+$("#siswa_tingkat").val(),function(){
      if($("#siswa_idtahunajaran").val()!="" && $("#siswa_tingkat").val()!="")
			{
				$("#filtersiswabutton").click();
				$("#filteralumnibutton").click();
			}
		});
	}
</script>
