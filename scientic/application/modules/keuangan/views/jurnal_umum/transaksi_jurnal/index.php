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
											<div class="form-group form-group-sm">
											<div class="col-sm-12">
											<button type="button" class="btn btn-info btn-sm pull-right" id="filtersearchbutton">Tampilkan</button>
											</div>
											</div>
											 <hr/>
											 
											 
											
											
											
											
										</div>
										
										
								</div>
								<div>
									<div class="form-horizontal">
										 
										
										 
										<div id="jqxGridJurnal"></div> 
										
										<div id="jqxGridJurnalDetail"></div> 
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
	//$(".besar").jqxNumberInput({ width: 250, height: 25, decimalDigits:0,digits: 12,spinButtons: true,symbol: 'Rp.',decimalSeparator: ".",inputMode: 'advanced',min: 0,spinMode: 'simple' });
	//$(".cicilan").jqxNumberInput({ width: 250, height: 25, decimalDigits:0,digits: 12,spinButtons: true,symbol: 'Rp.',decimalSeparator: ".",inputMode: 'advanced',min: 0,spinMode: 'simple' });
	$("#idkategori").change(function(){
		loadIDPenerimaan();
	})
	function loadIDPenerimaan()
	{
		$("#idpenerimaan").load(current_url()+"/getPenerimaan/"+$("#idkategori").val());
	}
	$("#filtersearchbutton").click(function(){	
		jqxGridJurnal.jqxGrid('source')._source.data.filter= 'false';
		jqxGridJurnal.jqxGrid('source')._source.data.departemen = $("#departemen").val();
		jqxGridJurnal.jqxGrid('source')._source.data.idtahunajaran= $("#siswa_idtahunajaran").val();
		jqxGridJurnal.jqxGrid('source')._source.data.idkelas= $("#siswa_idkelas").val();
		jqxGridJurnal.jqxGrid('updatebounddata');
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
  
  <?=$this->load->view("jqxgridJurnal.js",array(),TRUE)?>
  <?=$this->load->view("jqxgridJurnalDetail.js",array(),TRUE)?>
  

  $("#form_tagihan").submit(function(){	
		jqxGridJurnalDetail.jqxGrid('showloadelement');
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
						jqxGridJurnalDetail.jqxGrid('hideloadelement');
						if($("#replid").val()=="")
						{
							$("#replid").val(result.replid);
						}
				  }
			  });
		
			  
		return false;
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
