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

			<div id="jqxTabs" style="overflow:hidden;">
            <ul>
                <li style="margin-left: 30px;">Data Siswa</li>
                <li>Informasi Umum</li>
                <li>F-PD SMA/SMK</li>
                <li>Import Siswa</li>

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
														<button type="button" class="btn btn-info btn-sm" id="exportbutton">Export</button>
														
												</div>
											</div>
											<hr/>
											Pencarian
											<div class="form-group form-group-sm">
												<label for="field" class="control-label col-sm-4">Kelas</label>
												<div class="col-sm-8">
													<select  class="form-control" id="field">
														<option value="nis">NIS</option>
														<option value="nisn">N I S N</option>
														<option value="nama">Nama</option>
														<option value="panggilan">Nama Panggilan</option>
														<option value="agama">Agama</option>
														<option value="suku">Suku</option>
														<option value="status">Status</option>
														<option value="kondisi">Kondisi Siswa</option>
														<option value="darah">Golongan Darah</option>
														<option value="alamatsiswa">Alamat Siswa</option>
														<option value="asalsekolah">Asal Sekolah</option>
														<option value="namaayah">Nama Ayah</option>
														<option value="namaibu">Nama Ibu</option>
														<option value="alamatortu">Alamat Orang Tua</option>
														<option value="keterangan">Keterangan</option>
													</select>

												</div>
											</div>
											<div class="form-group form-group-sm">
												<label for="field" class="control-label col-sm-4">Keywords</label>
												<div class="col-sm-8">
													<input type="text" id="keywords" class="form-control"/>

												</div>
											</div>
											<div class="form-group form-group-sm">
												<label for="nopendaftaran" class="control-label col-sm-4"></label>
												<div class="col-sm-8">

														<button type="button" class="btn btn-info btn-sm" id="filtersearchbutton">Tampilkan</button>
												</div>
											</div>
										</div>


								</div>
								<div>
									<div id='Menu'>
											<ul>
												<li>Mutasi Siswa</li>
											</ul>
									</div>
									<div id="popupWindow">
										<div>Mutasi Siswa</div>
										<div style="overflow: hidden;" class="form-horizontal">
											<div class="form-group form-group-sm">
												<label for="mutasi_nis" class="control-label col-sm-4">NIS</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="mutasi_nis" id="mutasi_nis" readonly>
												</div>
											</div>
											<div class="form-group form-group-sm">
												<label for="mutasi_nama" class="control-label col-sm-4">Nama</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="mutasi_nama" id="mutasi_nama" readonly>
												</div>
											</div>
											<div class="form-group form-group-sm">
												<label for="mutasi_departemen" class="control-label col-sm-4">Departemen</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="mutasi_departemen" id="mutasi_departemen" readonly>
												</div>
											</div>
											<div class="form-group form-group-sm">
												<label for="mutasi_tglmutasi" class="control-label col-sm-4">Tanggal Mutasi</label>
												<div class="col-sm-8">
													<input type="date" class="form-control" name="mutasi_tglmutasi" id="mutasi_tglmutasi" value="<?=date("Y-m-d")?>">
												</div>
											</div>
											<div class="form-group form-group-sm">
												<label for="mutasi_jenismutasi" class="control-label col-sm-4">Jenis Mutasi</label>
												<div class="col-sm-8">
													<select class="form-control" name="mutasi_jenismutasi" id="mutasi_jenismutasi">
														<?php
														foreach($this->db->get("jenismutasi")->result() as $row)
														{
														echo "<option value='{$row->replid}'>{$row->jenismutasi}</option>";
														}
														?>
													</select>

												</div>
											</div>
											<div class="form-group form-group-sm">
												<label for="mutasi_keterangan" class="control-label col-sm-4">Keterangan</label>
												<div class="col-sm-8">
													<textarea class="form-control" name="mutasi_keterangan" id="mutasi_keterangan"></textarea>
												</div>
											</div>
											<div class="form-group form-group-sm">
												<label for="mutasi_keterangan" class="control-label col-sm-4"></label>
												<div class="col-sm-8">
													<button type="button" class="btn btn-info btn-sm" id="mutasisavebutton">Simpan</button>
													<button type="button" class="btn btn-info btn-sm" id="Cancel">Batal</button>
												</div>
											</div>

										</div>
								   </div>
									<div id="jqxGridSiswa"></div>
								</div>
							</div>

				  <div>

				  </div>
			</div>

			<div>

					<form class="form-horizontal formcalonsiswa" method="POST" enctype="multipart/form-data">
                        <div class="container">
							<br/>
                                <?=$this->load->view("formdatapribadi")?>
						</div>
						<div class="container">
						<hr/>
								<?=$this->load->view("formdataorangtua")?>
						</div>
					</form>

			</div>
            <div>

					<form class="form-horizontal formcalonsiswa form_fpd_sma_smk" method="POST" enctype="multipart/form-data">
                        <div class="container">
							<br/>
                                <?=$this->load->view("fpd_sma_smk")?>
						</div>
						
					</form>

			</div>
			<div>
				<div id="jqxGrid"></div>
			</div>








          </div>

        </div>
      </section>
    </section>
  </section>
</section>

<script type="text/javascript">
$(document).ready(function(){
    $("#jqxNavigationBar").jqxNavigationBar({ width: '100%', expandMode: 'multiple',expandedIndexes: [0,1,2,3,4,5,6]});
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

	$("#exportbutton").click(function(){
        var postdata = new Object();
        window.open("data_siswa/export_excel/"+$("#siswa_idkelas").val(), "_blank");
        /*
        $(".form_fpd_sma_smk [name]").each(function(e){
            postdata[$(this).attr("name")] = $(this).attr("name");
        }).promise()
            .done( function() {
            postdata["idkelas"] = $("#siswa_idkelas").val();
            $.ajax({
                url:'data_siswa/export_excel',
                type:"post",
                data:postdata,
                success:function(result){
                console.log(result);
                }
            });
	   });
       */
    });
    $("#filtersiswabutton").click(function(){
		jqxGridSiswa.jqxGrid('source')._source.data.filter= 'false';
		jqxGridSiswa.jqxGrid('source')._source.data.departemen = $("#calon_departemen").val();
		jqxGridSiswa.jqxGrid('source')._source.data.idtahunajaran= $("#siswa_idtahunajaran").val();
		jqxGridSiswa.jqxGrid('source')._source.data.idkelas= $("#siswa_idkelas").val();
		jqxGridSiswa.jqxGrid('updatebounddata');
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
  $("#siswa_tingkat").change(function(){
		loadKelasOption();
	});
	loadFilterOption();

	$("#calon_departemen").change(function(){

	});
	$(".groupAction button").click(function(){
		$(".groupAction button").addClass("btn-info");
		$(".groupAction button").removeClass("btn-primary");
		$(this).removeClass("btn-info");
		$(this).addClass("btn-primary");

	});

	$('#nested2').jqxSplitter({  width:'99.80%',height:'99.70%',orientation: 'vertical', panels: [{ size: '30%'}] });

  <?=$this->load->view("jqxgridSiswa.js",array(),TRUE)?>
  <?=$this->load->view("jqxgrid/jqxgrid.js",array(),TRUE)?>
  $('#jqxTabs').jqxTabs({ width: '100%', height: $(window).height()-60, position: 'top'});
   $("#addrowbutton").click(function(){
		$("#jqxTabs").jqxTabs("select",1);
		$("#saverowbutton").removeAttr("disabled");
		$(".formcalonsiswa input,.formcalonsiswa select,.formcalonsiswa textarea").val('');
		jqxGridSiswa.jqxGrid('clearselection');
      //elementJqxGridReligion.jqxGrid({showeverpresentrow: true})
    });
  $("#addrowbutton").click(function(){

	  /*
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
	  */

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
		$(".formcalonsiswa:visible input[type=submit]").click();
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
		$("#siswa_idtahunajaran").load(current_url()+"/getTahunAjaran/"+$("#calon_departemen").val(),function(){
			//loadKelasOption();
		});
		$("#siswa_tingkat").load(current_url()+"/getTingkat/"+$("#calon_departemen").val(),function(){
      loadKelasOption();
    });
		$("select[name=idangkatan]").load(current_url()+"/getAngkatan/"+$("#calon_departemen").val());

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
</script>
