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
												<label for="departemen" class="control-label col-sm-4">Departemen</label>
												<div class="col-sm-8">
													<select class="form-control" id="departemen">
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
												<label for="idkategori" class="control-label col-sm-4">Pembayaran</label>
												<div class="col-sm-8">
													<select  class="form-control" id="idkategori">
														<?php
														$this->db->order_by("urutan","asc");
														$this->db->where("kode","SKR");
														foreach($this->db->get("kategoripenerimaan")->result() as $row)
														{
														?>
														<option value="<?=$row->kode?>"><?=$row->kategori?></option>		
														<?php
														}
														?>
													</select>
													
												</div>
											</div>
											
											<div class="form-group form-group-sm">
												<label for="idpenerimaan" class="control-label col-sm-4"></label>
												<div class="col-sm-8">
													<select  class="form-control" id="idpenerimaan">
														
													</select>
													
												</div>
											</div>
											
											<div class="form-group form-group-sm">
												<label for="siswa_idkelas" class="control-label col-sm-4">Tahun Buku</label>
												<div class="col-sm-8">
													<?php
													$this->db->where("aktif","1");
													$tahunbuku = $this->db->get("tahunbuku")->last_row();
													?>
													<input type="text" class="form-control" value="<?=$tahunbuku->tahunbuku?>" readonly>
													<input type="hidden" id="idtahunbuku" value="<?=$tahunbuku->replid?>" readonly>
														
													
													
												</div>
											</div>
											 <hr/>
											 
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
											<div class="col-sm-12">
											<button type="button" class="btn btn-info btn-sm pull-right" id="filtersearchbutton">Tampilkan</button>
											</div>
											</div>
											<div id="jqxGridSiswa"></div> 
											
										</div>
										
										
								</div>
								<div>
									<div class="form-horizontal">
									<br/>
										
										
										
										<div class="col-md-6">
										<h5 class="m-t-xs">Data Siswa</h5>
										
										 <div class="form-group form-group-sm">
											<label for="nama" class="control-label col-sm-4">NIS</label>
											<div class="col-sm-8">
												: <span class="span_nis"></span>
											</div>
										</div>
										<div class="form-group form-group-sm">
											<label for="nama" class="control-label col-sm-4">Nama</label>
											<div class="col-sm-8">
												: <span class="span_nama"></span>
											</div>
										</div>
										<div class="form-group form-group-sm">
											<label for="nama" class="control-label col-sm-4">Kelas</label>
											<div class="col-sm-8">
												: <span class="span_kelas"></span>
											</div>
										</div>
										<div class="form-group form-group-sm">
											<label for="nama" class="control-label col-sm-4">NO HP.</label>
											<div class="col-sm-8">
												: <span class="span_telepon"></span>
											</div>
										</div>
										<div class="form-group form-group-sm">
											<label for="nama" class="control-label col-sm-4">Alamat</label>
											<div class="col-sm-8">
												: <span class="span_alamat"></span>
											</div>
										</div>
										
	
										</div>
										
										
										<div class="col-md-6">
											<center><img class="showfoto" alt="foto" height="178"/></center>
											
										</div>
										
										
										<div id="jqxgridDetailPembayaran"></div> 
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
	loadIDPenerimaan();
	
	$("#idkategori").change(function(){
		loadIDPenerimaan();
	})
	function loadIDPenerimaan()
	{
		$("#idpenerimaan").load(current_url()+"/getPenerimaan/"+$("#idkategori").val());
	}
	$("#filtersearchbutton").click(function(){	
		jqxGridSiswa.jqxGrid('source')._source.data.filter= 'false';
		jqxGridSiswa.jqxGrid('source')._source.data.departemen = $("#departemen").val();
		jqxGridSiswa.jqxGrid('source')._source.data.idtahunajaran= $("#siswa_idtahunajaran").val();
		jqxGridSiswa.jqxGrid('source')._source.data.idkelas= $("#siswa_idkelas").val();
		jqxGridSiswa.jqxGrid('updatebounddata');
	});
	$("#departemen").change(function(){
		loadFilterOption();
	});
	$("#siswa_idtahunajaran").change(function(){
		loadKelasOption();
		
	});
	loadFilterOption();
	loadKelasOption();
	
 
 
	
	$('#nested2').jqxSplitter({  width:'100%',height:$(window).height()-2,orientation: 'vertical', panels: [{ size: '30%'}] });
  
  <?=$this->load->view("jqxgridSiswa.js",array(),TRUE)?>
  <?=$this->load->view("jqxgridDetailPembayaran.js",array(),TRUE)?>
  

  $("#form_tagihan").submit(function(){	
		jqxgridDetailPembayaran.jqxGrid('showloadelement');
		var datapost = $(this).serialize();
		datapost += "&besar="+$('.besar').val();
		datapost += "&cicilan="+$('.cicilan').val();
		datapost += "&idtahunbuku="+$("#idtahunbuku").val();
		datapost += "&idpenerimaan="+$("#idpenerimaan").val();
		datapost += "&nis="+datasiswa.nis;
		
		
		
		//var datapost = $(this).serialize();
		
			$.ajax({
				  url:current_url()+"/store",
				  type:"POST",
				  dataType:'json',
				  data:datapost,
				  success:function(result)
				  {
						Notification.open(result.message,"success");
						jqxgridDetailPembayaran.jqxGrid('hideloadelement');
						if($("#replid").val()=="")
						{
							jqxGridSiswa.jqxGrid('selectrow',datasiswa.uid);
						}
				  }
			  });
		
			  
		return false;
    });
		
});
function loadFilterOption()
	{
		$("#siswa_idtahunajaran").load(current_url()+"/getTahunAjaran/"+$("#departemen").val(),function(){
			//loadKelasOption();
		});
		$("#siswa_tingkat").load(current_url()+"/getTingkat/"+$("#departemen").val(),function(){
      loadKelasOption();
    });
		$("#idangkatan").load(current_url()+"/getAngkatan/"+$("#departemen").val());

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
