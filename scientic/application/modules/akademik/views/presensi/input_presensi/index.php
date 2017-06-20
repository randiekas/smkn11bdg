<section class="hbox stretch">
  <section>
    <section class="vbox">
      
      <section class="scrollable padder">
        <div class="row">
			
 
							
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
												<label for="idsemester" class="control-label col-sm-4">Semester</label>
												<div class="col-sm-8">
													<select  class="form-control" id="idsemester">
														
													</select>
													
												</div>
											</div>
											<div class="form-group form-group-sm">
												<label for="idpelajaran" class="control-label col-sm-4">Pelajaran</label>
												<div class="col-sm-8">
													<select  class="form-control" id="idpelajaran">
														
													</select>
													
												</div>
											</div>
											<div class="form-group form-group-sm">
												<label for="gurupelajaran" class="control-label col-sm-4">Guru</label>
												<div class="col-sm-8">
													<select  class="form-control" id="gurupelajaran">
														
													</select>
													
												</div>
											</div>
											 
											 <div id='jqxCalendar'></div>
											 <br/>
											<button type="button" class="btn btn-info btn-sm" id="filtersearchbutton">Lihat</button>
											 
										</div>
										
										
								</div>
								<div>
									<div class="form-horizontal">
									<br/>
									<div class="form-group form-group-sm">
												<input type="hidden" id="replid">
												<label for="calon_departemen" class="control-label col-sm-2">Keterangan</label>
												<div class="col-sm-3">
													<textarea class="form-control" id="keterangan"></textarea>
													
												</div>
												
												<label for="calon_departemen" class="control-label col-sm-1">Materi</label>
												<div class="col-sm-2">
													<textarea class="form-control" id="materi"></textarea>
													
												</div>
												<label for="calon_departemen" class="control-label col-sm-1">Rencana</label>
												<div class="col-sm-2">
													<textarea class="form-control" id="rencana"></textarea>
													
												</div>
												
												
											</div>
									<div class="form-group form-group-sm">
									 	<label for="calon_departemen" class="control-label col-sm-8"></label>
												<div class="col-sm-4">
													
													<button type="button" class="btn btn-info btn-sm" id="saverowbutton">Simpan</button>
													<button type="button" class="btn btn-info btn-sm" id="deleterowbutton">hapus</button>
													
												</div>
									</div>		
									</div>		
											
											
									<div id="jqxGridSiswa"></div>
								</div>
							</div>
						
				  
			</div>
			

			
			
			
			
          
			
			
			
			
          
      </section>
    </section>
  </section>
</section>

<script type="text/javascript">
$(document).ready(function(){
	$('#nested2').jqxSplitter({  width:'100%',height:$(window).height()-10,orientation: 'vertical', panels: [{ size: '30%'}] });
	function fillPresensi()
	{
		var getDate= $('#jqxCalendar').jqxCalendar('getDate'); 
		//console.log(event.args);
		var tanggal = getDate.getFullYear()+"-"+(getDate.getMonth()+1)+"-"+getDate.getDate();
		jqxGridSiswa.jqxGrid('showloadelement');
		$.ajax({
				url:current_url()+"/getPresensi",
				type:"post",
				dataType: 'json',
				data:{idkelas:$("#siswa_idkelas").val(),
						idsemester:$("#idsemester").val(),
						idpelajaran:$("#idpelajaran").val(),
						gurupelajaran:$("#gurupelajaran").val(),
						tanggal:tanggal},
				success:function(response){
					if(response)
					{
						$("#keterangan").val(response.keterangan);
						$("#materi").val(response.materi);
						$("#rencana").val(response.rencana);
						$("#replid").val(response.replid);
						jqxGridSiswa.jqxGrid('source')._source.data.idkelas= $("#siswa_idkelas").val();
						jqxGridSiswa.jqxGrid('source')._source.data.idsemester = $("#idsemester").val();
						jqxGridSiswa.jqxGrid('source')._source.data.idpelajaran= $("#idpelajaran").val();
						jqxGridSiswa.jqxGrid('source')._source.data.gurupelajaran= $("#gurupelajaran").val();
						jqxGridSiswa.jqxGrid('source')._source.data.tanggal= tanggal;
						jqxGridSiswa.jqxGrid('updatebounddata');
						
					}else{
						jqxGridSiswa.jqxGrid('clear');
						$("#keterangan").val('');
						$("#materi").val('');
						$("#rencana").val('');
						$("#replid").val('');
					}
					jqxGridSiswa.jqxGrid('hideloadelement');
				}
			});
	}
	$("#jqxCalendar").jqxCalendar({width: '100%', height: 220});
	$('#jqxCalendar').on('change', function (event)
	{ 
		fillPresensi();
	});
	$("#filtersearchbutton").click(function(){	
		fillPresensi();
	});
	$("#calon_departemen").change(function(){
		loadFilterOption();
	});
	$("#siswa_idtahunajaran").change(function(){
		loadKelasOption();		
	});
	loadKelasOption();
	loadFilterOption();
 
 
	
	
  
  <?=$this->load->view("jqxgridSiswa.js",array(),TRUE)?>
  
 
  $("#saverowbutton").click(function(){
			var getDate= $('#jqxCalendar').jqxCalendar('getDate'); 
			var tanggal = getDate.getFullYear()+"-"+(getDate.getMonth()+1)+"-"+getDate.getDate();
			jqxGridSiswa.jqxGrid('showloadelement');
			$.ajax({
				  url:current_url()+"/store",
				  type:"POST",
				  dataType:'json',
				  data:{idkelas:$("#siswa_idkelas").val(),
							replid:$("#replid").val(),
							idsemester:$("#idsemester").val(),
							idpelajaran:$("#idpelajaran").val(),
							tanggal:tanggal,
							gurupelajaran:$("#gurupelajaran").val(),
							keterangan:$("#keterangan").val(),
							materi:$("#materi").val(),
							rencana:$("#rencana").val()
				  },
				  success:function(result)
				  {
						Notification.open(result.message,"success");
						jqxGridSiswa.jqxGrid('hideloadelement');
						if($("#replid").val()=="")
						{
							$("#replid").val(result.replid);
						}
						fillPresensi();
						/*
						Notification.open(result.message,"success");
						jqxGridSiswa.jqxGrid('updatebounddata');
						jqxGridSiswa.jqxGrid('clearselection');
						$("#filtersiswabutton").click();
						*/
				  }
			  });
    });
	$("#deleterowbutton").click(function(){
	  if($("#replid").val()!="")
	  {
			confirm = function(){
			$.ajax({
			  url:current_url()+"/destroy",
			  type:"POST",
			  dataType:'json',
			  data:{replid:$("#replid").val()},
			  success:function(result)
			  {
					Notification.open(result.message,"success");
					fillPresensi();
			  }
		  });
	};
	 
	messageDelete = "Apakah anda yakin akan menghapus presensi ini ?<br> ";
	alert.confirm(alert.titleDelete(),messageDelete,confirm,function(){});
   
	  }
      
    });
	
		
});
$("#idpelajaran").change(function(){
	$("#gurupelajaran").load(current_url()+"/getGuru/"+$("#idpelajaran").val());
});
function loadFilterOption()
	{
		$("#siswa_idtahunajaran").load(current_url()+"/getTahunAjaran/"+$("#calon_departemen").val(),function(){
			loadKelasOption();
		});
		$("#siswa_tingkat").load(current_url()+"/getTingkat/"+$("#calon_departemen").val());
		$("#idangkatan").load(current_url()+"/getAngkatan/"+$("#calon_departemen").val());
		$("#idsemester").load(current_url()+"/getSemester/"+$("#calon_departemen").val());
		$("#idpelajaran").load(current_url()+"/getPelajaran/"+$("#calon_departemen").val(),function(){
			$("#gurupelajaran").load(current_url()+"/getGuru/"+$("#idpelajaran").val(),function(){
				$("#filtersearchbutton").click();
			});
		});
		
	}
function loadKelasOption()
	{
		$("#siswa_idkelas").load(current_url()+"/getKelas/"+$("#siswa_idtahunajaran").val(),function(){
			
			$("#filtersearchbutton").click();
		});
	}
</script>
