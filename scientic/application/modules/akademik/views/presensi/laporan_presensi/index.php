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
											
											 
											 <div id='jqxCalendar'></div>
											 <br/>
											<button type="button" class="btn btn-info btn-sm" id="filtersearchbutton">Lihat</button>
											 
										</div>
										
										
								</div>
								<div>
									
									
									
									 <div id="jqxTabs" style="overflow:hidden;">
										<ul>
										  <li style="margin-left: 30px;">Laporan Presensi Kelas</li>
										  <li>Detail Presensi</li>
										</ul>

										<div><!--form in div-->
										  <div>
												<input type="hidden" id="replid">
												<div id="jqxGridSiswa"></div>
										  </div>
									  </div>

									  <div>
										<div id="jqxGridDetailPresensi"></div>
									  </div>

									  </div>
									  
									  
									
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
	$('#jqxTabs').jqxTabs({ width: '100%', height: $(window).height()-10, position: 'top'});
	function fillPresensi()
	{
		var range = $('#jqxCalendar').jqxCalendar('getRange'); 
		var getDateFrom= range.from; 
		var getDateTo= range.to; 
		//console.log(event.args);
		var tanggal_awal = getDateFrom.getFullYear()+"-"+(getDateFrom.getMonth()+1)+"-"+getDateFrom.getDate();
		var tanggal_akhir = getDateTo.getFullYear()+"-"+(getDateTo.getMonth()+1)+"-"+getDateTo.getDate();
		
		jqxGridSiswa.jqxGrid('source')._source.data.idkelas= $("#siswa_idkelas").val();
		jqxGridSiswa.jqxGrid('source')._source.data.idsemester = $("#idsemester").val();
		jqxGridSiswa.jqxGrid('source')._source.data.tanggal_awal= tanggal_awal;
		jqxGridSiswa.jqxGrid('source')._source.data.tanggal_akhir= tanggal_akhir;
		jqxGridSiswa.jqxGrid('updatebounddata');
		
		jqxGridDetailPresensi.jqxGrid('source')._source.data.idkelas= $("#siswa_idkelas").val();
		jqxGridDetailPresensi.jqxGrid('source')._source.data.idsemester = $("#idsemester").val();
		jqxGridDetailPresensi.jqxGrid('source')._source.data.tanggal_awal= tanggal_awal;
		jqxGridDetailPresensi.jqxGrid('source')._source.data.tanggal_akhir= tanggal_akhir;
	}
	$("#jqxCalendar").jqxCalendar({width: '100%', height: 220,selectionMode:'range'});
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
  <?=$this->load->view("jqxgridDetailPresensi.js",array(),TRUE)?>
  
 
  
	
		
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
		
		
	}
function loadKelasOption()
	{
		$("#siswa_idkelas").load(current_url()+"/getKelas/"+$("#siswa_idtahunajaran").val(),function(){
			
			$("#filtersearchbutton").click();
		});
	}
</script>
