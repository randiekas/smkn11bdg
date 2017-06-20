<section class="hbox stretch">
  <section>
    <section class="vbox">
      <section class="scrollable padder">
        <div class="row">
						<div id="nested2">
								<div class="form-horizontal">
										<br/>
										<div class="col-md-12">
											<div class="form-group form-group-sm col-md-3">
												<div class="col-sm-12">
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
											
											<div class="form-group form-group-sm col-md-4">
												<label for="idkategori" class="control-label col-sm-4">Pembayaran</label>
												<div class="col-sm-8">
													<select  class="form-control" id="idpengeluaran">
														
													</select>
													
													
												</div>
											</div>
											
											
											
											<div class="form-group form-group-sm col-md-4">
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
											 <div class="form-group form-group-sm col-md-2">
											<div class="col-sm-12">
											<button type="button" class="btn btn-info btn-sm pull-right" id="filtersearchbutton">Tampilkan</button>
											</div>
											</div>
											
											
										</div>
										
										
								</div>
								<div>
									<div id="jqxgridDetailPembayaran"></div> 
								</div>		
								</div>
							</div>
						
				  
			
			

			
			
			
			
          
			
			
			
			
          
      </section>
    </section>
  </section>
</section>

<script type="text/javascript">
$(document).ready(function(){
	loadIDPengeluaran();
	$("#departemen").change(function(){
		loadIDPengeluaran();
	})
	function loadIDPengeluaran()
	{
		$("#idpengeluaran").load(current_url()+"/getPenerimaan/"+$("#departemen").val());
	}
	$("#filtersearchbutton").click(function(){
		jqxgridDetailPembayaran.jqxGrid('source')._source.data.departemen = $("#departemen").val();
		jqxgridDetailPembayaran.jqxGrid('source')._source.data.idtahunajaran= $("#siswa_idtahunajaran").val();
		jqxgridDetailPembayaran.jqxGrid('source')._source.data.idkelas= $("#siswa_idkelas").val();
		jqxgridDetailPembayaran.jqxGrid('source')._source.data.idpenerimaan= $("#idpenerimaan").val();
		jqxgridDetailPembayaran.jqxGrid('updatebounddata');
	});
	
 
	
	$('#nested2').jqxSplitter({  width:'100%',height:$(window).height()-2,orientation: 'horizontal', panels: [{ size: '60'}] });
  
  
  <?=$this->load->view("jqxgridDetailPembayaran.js",array(),TRUE)?>
  
});
</script>
