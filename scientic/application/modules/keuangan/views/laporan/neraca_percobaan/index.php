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
												<label for="idtahunbuku" class="control-label col-sm-4">Tahun Buku</label>
												<div class="col-sm-8">
													<select class="form-control" id="idtahunbuku">
														<?php
														foreach($this->db->get("tahunbuku")->result() as $row)
														{
														?>
														<option value="<?=$row->replid?>" <?=($row->aktif=="1")?"selected":""?>><?=$row->tahunbuku?> (<?=($row->aktif=="1")?"Aktif":""?>)</option>
														<?php
														}
														?>
													</select>
												</div>
											</div>
												<div id='jqxCalendar'></div>
											 <hr/>
											 <div class="form-group form-group-sm">
											<div class="col-sm-12">
											<button type="button" class="btn btn-info btn-sm pull-right" id="filtersearchbutton">Tampilkan</button>
											</div>
											</div>
											 
											
											
											
											
										</div>
										
										
								</div>
								<div>
									<div class="form-horizontal">
										 
										
										 
										<div id="jqxGridJurnal"></div> 
										
										
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
	$('#nested2').jqxSplitter({  width:'100%',height:$(window).height()-2,orientation: 'vertical', panels: [{ size: '20%'}] });
	$("#jqxCalendar").jqxCalendar({width: '100%', height: 220,selectionMode:'range'});
	$('#jqxCalendar').on('change', function (event)
	{ 
		fillJurnal();
	});
	$("#filtersearchbutton").click(function(){	
		fillJurnal();
	});
	
  function fillJurnal()
  {
	  var range = $('#jqxCalendar').jqxCalendar('getRange'); 
		var getDateFrom= range.from; 
		var getDateTo= range.to; 
		//console.log(event.args);
		var tanggal_awal = getDateFrom.getFullYear()+"-"+(getDateFrom.getMonth()+1)+"-"+getDateFrom.getDate();
		var tanggal_akhir = getDateTo.getFullYear()+"-"+(getDateTo.getMonth()+1)+"-"+getDateTo.getDate();
		
		jqxGridJurnal.jqxGrid('clear');
		jqxGridJurnal.jqxGrid('clearselection');
		
		jqxGridJurnal.jqxGrid('source')._source.data.tanggal_awal= tanggal_awal;
		jqxGridJurnal.jqxGrid('source')._source.data.tanggal_akhir= tanggal_akhir;
		jqxGridJurnal.jqxGrid('source')._source.data.idtahunbuku= $("#idtahunbuku").val();
		jqxGridJurnal.jqxGrid('source')._source.data.idbukubesar= $("#idbukubesar").val();
		
		jqxGridJurnal.jqxGrid('updatebounddata');
		
  }
  <?=$this->load->view("jqxgridJurnal.js",array(),TRUE)?>
  
  
		
});
</script>
