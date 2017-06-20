<section class="hbox stretch">
  <section>
    <section class="vbox">
      <header class="header bg-white b-b b-light">
        <p class="groupAction">
          <button type="button" class="btn btn-s-md btn-info btn-sm" id="addrowbutton" disabled>Tambah</button>
		  <button type="button" class="btn btn-s-md btn-info btn-sm" id="deleterowbutton" disabled>Hapus</button>
          <i class="fa fa-spin fa-spinner hide" id="spin"></i>
        </p>
      </header>
      <section class="scrollable padder">
        <div class="row">
			<form class="form-horizontal formcalonsiswa" method="POST" enctype="multipart/form-data">
			<div id="jqxTabs" style="overflow:hidden;">
            <ul>
              <li style="margin-left: 30px;">Calon & Penempatan Siswa</li>
              <li>Data Pribadi</li>
			  <li>Data Orang Tua</li>
			  <li>Informasi Pembayaran</li>
			  <li>Data Nilai Ujian</li>
            </ul>

            <div><!--form in div-->
					<div id="mainSplitter">
						<div class="splitter-panel">
							<div id="nested1">
								<div>

									<br/>
									<div class="col-md-12">
											<div class="form-group form-group-sm">
												<label for="calon_departemen" class="control-label col-sm-4">Departemen</label>
												<div class="col-sm-8">
													<select name="calon_departemen" class="form-control" id="calon_departemen" required="">
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
												<label for="calon_proses" class="control-label col-sm-4">PMB</label>
												<div class="col-sm-8">
													<select name="calon_proses" class="form-control" id="calon_proses" required="">

													</select>

												</div>
											</div>
											<div class="form-group form-group-sm">
												<label for="calon_kelompok" class="control-label col-sm-4">Kelompok</label>
												<div class="col-sm-8">
													<select name="calon_kelompok" class="form-control" id="calon_kelompok" required="">
														<?php
														foreach($this->db->get("kelompokcalonsiswa")->result() as $row)
														{
														?>
														<option value="<?=$row->kelompok?>"><?=$row->kelompok?></option>
														<?php
														}
														?>
													</select>

												</div>
											</div>
											<div class="form-group form-group-sm">
												<label for="nopendaftaran" class="control-label col-sm-4"></label>
												<div class="col-sm-8">
													<button type="button" class="btn btn-info btn-sm" id="filtercalonbutton">Tampilkan</button>

												</div>
											</div>
									</div>


								</div>
								<div>
									<div id="jqxGrid"></div>
								</div>
							</div>
						</div>
						<div class="splitter-panel">
							<div id="nested2">
								<div>

										<br/>
										<div class="col-md-12">
											<div class="form-group form-group-sm">
												<label for="siswa_idangkatan" class="control-label col-sm-4">Angkatan</label>
												<div class="col-sm-8">
													<select name="siswa_idangkatan" class="form-control" id="siswa_idangkatan" required="">

													</select>

												</div>
											</div>

											<div class="form-group form-group-sm">
												<label for="siswa_idtahunajaran" class="control-label col-sm-4">Th. Ajaran</label>
												<div class="col-sm-8">
													<select name="siswa_idtahunajaran" class="form-control" id="siswa_idtahunajaran" required="">

													</select>

												</div>
											</div>

											<div class="form-group form-group-sm">
												<label for="siswa_tingkat" class="control-label col-sm-4">Tingkat</label>
												<div class="col-sm-8">
													<select name="siswa_tingkat" class="form-control" id="siswa_tingkat" required="">

													</select>

												</div>
											</div>

											<div class="form-group form-group-sm">
												<label for="siswa_idkelas" class="control-label col-sm-4">Kelas</label>
												<div class="col-sm-8">
													<select name="siswa_idkelas" class="form-control" id="siswa_idkelas" required="">

													</select>

												</div>
											</div>
											<div class="form-group form-group-sm">
												<label for="nopendaftaran" class="control-label col-sm-4"></label>
												<div class="col-sm-8">

														<button type="button" class="btn btn-info btn-sm" id="filtersiswabutton">Tampilkan</button>
												</div>
											</div>

										</div>


								</div>
								<div>
									<div id="jqxGridSiswa"></div>
								</div>
							</div>
						</div>
					</div>
				  <div>

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
	$('#mainSplitter').jqxSplitter({ width: '100%', height: $( window ).height()-100, orientation: 'horizontal', panels: [{ size: $( window ).height()-370 }] });
	$("#filtercalonbutton").click(function(){
		elementJqxGridReligion.jqxGrid('source')._source.data.departemen = $("#calon_departemen").val();
		elementJqxGridReligion.jqxGrid('source')._source.data.proses= $("#calon_proses").val();
		elementJqxGridReligion.jqxGrid('source')._source.data.kelompok= $("#calon_kelompok").val();
		elementJqxGridReligion.jqxGrid('updatebounddata');
	});
	$("#filtersiswabutton").click(function(){

		jqxGridSiswa.jqxGrid('source')._source.data.departemen = $("#calon_departemen").val();
		jqxGridSiswa.jqxGrid('source')._source.data.idtahunajaran= $("#siswa_idtahunajaran").val();
		jqxGridSiswa.jqxGrid('source')._source.data.idkelas= $("#siswa_idkelas").val();
		jqxGridSiswa.jqxGrid('updatebounddata');
	});
	$("#calon_departemen").change(function(){
		loadFilterOption();
	});
	$("#siswa_idtahunajaran").change(function(){
		loadKelasOption();

	});
	loadKelasOption();
	loadFilterOption();
	$("#calon_proses").change(function(){

	});
	$("#calon_departemen").change(function(){

	});
	$(".groupAction button").click(function(){
		$(".groupAction button").addClass("btn-info");
		$(".groupAction button").removeClass("btn-primary");
		$(this).removeClass("btn-info");
		$(this).addClass("btn-primary");

	});
	$('#nested1').jqxSplitter({  orientation: 'vertical', panels: [{ size: '30%'}] });
	$('#nested2').jqxSplitter({  orientation: 'vertical', panels: [{ size: '30%'}] });
  <?=$this->load->view("jqxgrid/jqxgrid.js",array(),TRUE)?>
  <?=$this->load->view("jqxgridSiswa.js",array(),TRUE)?>
  $('#jqxTabs').jqxTabs({ width: '100%', height: $(window).height()-60, position: 'top'});

  $("#addrowbutton").click(function(){

	  if(elementJqxGridReligion.jqxGrid('getselectedrowindexes').length>=1)
	  {
			var nopendaftaran = new Object();
			for(x=0;x<elementJqxGridReligion.jqxGrid('getselectedrowindexes').length;x++)
			{
				nopendaftaran[x] = elementJqxGridReligion.jqxGrid('getrowdata', elementJqxGridReligion.jqxGrid('getselectedrowindexes')[x]).nopendaftaran;
			}
			$.ajax({
			  url:current_url()+"/store",
			  type:"POST",
			  dataType:'json',
			  data:{nopendaftaran:nopendaftaran,angkatan:$("#siswa_idangkatan").val(),kelas:$("#siswa_idkelas").val()},
			  success:function(result)
			  {
					Notification.open(result.message,"success");
					elementJqxGridReligion.jqxGrid('updatebounddata');
					elementJqxGridReligion.jqxGrid('clearselection');
					$("#filtersiswabutton").click();
			  }
		  });
	  }
      //elementJqxGridReligion.jqxGrid({showeverpresentrow: true})
    });
	$("#deleterowbutton").click(function(){
	  var replid = new Object();
		for(x=0;x<jqxGridSiswa.jqxGrid('getselectedrowindexes').length;x++)
		{
			replid[x] = jqxGridSiswa.jqxGrid('getrowdata', jqxGridSiswa.jqxGrid('getselectedrowindexes')[x]).replid;
		}
	  if(jqxGridSiswa.jqxGrid('getselectedrowindexes').length>=1)
	  {


			$.ajax({
			  url:current_url()+"/destroy",
			  type:"POST",
			  dataType:'json',
			  data:{replid:replid},
			  success:function(result)
			  {
					Notification.open(result.message,"success");
					elementJqxGridReligion.jqxGrid('updatebounddata');
					elementJqxGridReligion.jqxGrid('clearselection');
					jqxGridSiswa.jqxGrid('clearselection');
					$("#filtersiswabutton").click();
			  }
		  });

	  }
      //elementJqxGridReligion.jqxGrid({showeverpresentrow: true})
    });
	$("#saverowbutton").click(function(){
			var status = "success";
			if(("input[name=idproses]").val()=="")
			{
				Notification.open("PSB Harus Diisi","error");
				status = "failed";
			}
			if(("input[name=nopendaftaran]").val()=="")
			{
				Notification.open("Nomor Pendaftaran Harus diisi","error");
				status = "failed";
			}
			if(("input[name=idkelompok]").val()=="")
			{
				Notification.open("Kelompok harus diisi","error");
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
			  /*
			  if($("[name=id]").val()=="")
			  {
					$("#formMahasiswa .reset").click();
				}
				else{
				$("#saverowbutton").attr("disabled","true");
			 }

			elementJqxGridReligion.jqxGrid('updatebounddata');
			*/
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
		$("#siswa_idangkatan").load(current_url()+"/getAngkatan/"+$("#calon_departemen").val());
		$("#siswa_idtahunajaran").load(current_url()+"/getTahunAjaran/"+$("#calon_departemen").val(),function(){
			loadKelasOption();
		});
		$("#siswa_tingkat").load(current_url()+"/getTingkat/"+$("#calon_departemen").val());
		$("#calon_proses").load(current_url()+"/getProses/"+$("#calon_departemen").val(),function(){
			$("#filtercalonbutton").click();
		});
	}
function loadKelasOption()
	{
		$("#siswa_idkelas").load(current_url()+"/getKelas/"+$("#siswa_idtahunajaran").val(),function(){
			$("#filtersiswabutton").click();
		});
	}
</script>
