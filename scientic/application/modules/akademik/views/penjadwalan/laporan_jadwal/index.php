<section class="hbox stretch">
  <section>
    <section class="vbox">
      <section class="scrollable padder">
        <div class="row">
			<div id="mainSplitter">
				<div class="splitter-panel">
					<br/>
					<form class="form-horizontal formcalonsiswa" method="POST" enctype="multipart/form-data">
							<div class="col-md-3">
								<div class="form-group form-group-sm">
									<label for="departemen" class="control-label col-sm-4">Departemen</label>
									<div class="col-sm-8">
										<select name="departemen" class="form-control" id="departemen" required="">
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
							</div>
							<div class="col-md-2">
								<div class="form-group form-group-sm">
									<label for="tingkat" class="control-label col-sm-4">Tingkat</label>
									<div class="col-sm-8">
										<select name="tingkat" class="form-control" id="tingkat" required="">
											
										</select>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group form-group-sm">
									<label for="tingkat" class="control-label col-sm-4">Tahun</label>
									<div class="col-sm-8">
										<select name="idtahunajaran" class="form-control" id="idtahunajaran" required="">
											
										</select>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group form-group-sm">
									<label for="tingkat" class="control-label col-sm-2">Info</label>
									<div class="col-sm-10">
										<select name="infojadwal" class="form-control" id="infojadwal" required="">
											
										</select>
									</div>
								</div>
							</div>
							<div class="col-md-5">
								<div class="form-group form-group-sm">
									<label for="departemen" class="control-label col-sm-2">Guru</label>
									<div class="col-sm-10">
										<select name="hari" class="form-control" id="nipguru" required="">
											
										</select>
										
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group form-group-sm">
									<label for="tingkat" class="control-label col-sm-4">Kelas</label>
									<div class="col-sm-8">
										<select name="idkelas" class="form-control" id="idkelas" required="">
											
										</select>
										
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group form-group-sm">
									
									<div class="col-sm-4">
											<button type="button" class="btn btn-s-md btn-info btn-sm" id="filterrowButton">Filter</button>
									</div>
									<div class="col-sm-8">
											
									</div>
								</div>
							</div>
					</form>
					
				</div>

				<div class="splitter-panel">
					<div id="jqxGrid"></div>
					
				</div>
			</div>
          
        </div>
        
      </section>
    </section>
  </section>
</section>

<script type="text/javascript">
  var items = new Object();
  $(document).ready(function(){
		$("#departemen").change(function(){
			loadFilterOption();
		});
		loadFilterOption();
		$('#mainSplitter').jqxSplitter({ width: '100%', height: $( window ).height()-10, orientation: 'horizontal', panels: [{ size: 100 }] });
		
		$(".groupAction button").click(function(){
		$(".groupAction button").addClass("btn-info");
		$(".groupAction button").removeClass("btn-primary");
		$(this).removeClass("btn-info");
		$(this).addClass("btn-primary");
		
		
	});
	<?=$this->load->view("jqxgrid/jqxgrid.js",array(),TRUE)?>
    $("#addrowbutton").click(function(){
      elementJqxGridReligion.jqxGrid({showeverpresentrow: true})
    });
	$("#filterrowButton").click(function(){
			
			elementJqxGridReligion.jqxGrid('source')._source.data.departemen = $("#departemen").val();
			elementJqxGridReligion.jqxGrid('source')._source.data.idkelas= $("#idkelas").val();
			elementJqxGridReligion.jqxGrid('source')._source.data.infojadwal= $("#infojadwal").val();
			elementJqxGridReligion.jqxGrid('source')._source.data.nip= $("#nipguru").val();
			elementJqxGridReligion.jqxGrid('updatebounddata');
			elementJqxGridReligion.on('bindingcomplete',function(event){
					elementJqxGridReligion.jqxGrid({groups: ['hari']});
					elementJqxGridReligion.jqxGrid('expandallgroups');
			});
			
			
			
	});
  });
  $("#tingkat").change(function(){
	  $("#idkelas").load(current_url()+"/getKelas/"+$("#idtahunajaran").val()+"/"+$("#tingkat").val());
  });
  $("#idtahunajaran").change(function(){
	  $("#idkelas").load(current_url()+"/getKelas/"+$("#idtahunajaran").val()+"/"+$("#tingkat").val());
		$("#infojadwal").load(current_url()+"/getInfoJadwal/"+$("#idtahunajaran").val(),function(){
				$("#filterrowButton").click();
			});
  });
  function loadFilterOption()
	{
		$("#nipguru").load(current_url()+"/getGuru/"+$("#departemen").val())
		$("#tingkat").load(current_url()+"/getTingkat/"+$("#departemen").val(),function(){
			$("#idkelas").load(current_url()+"/getKelas/"+$("#idtahunajaran").val()+"/"+$("#tingkat").val());
		});
		$("#idtahunajaran").load(current_url()+"/getTahunAjaran/"+$("#departemen").val(),function(){
			$("#idkelas").load(current_url()+"/getKelas/"+$("#idtahunajaran").val()+"/"+$("#tingkat").val());
			$("#infojadwal").load(current_url()+"/getInfoJadwal/"+$("#idtahunajaran").val(),function(){
				$("#filterrowButton").click();
			});
		});
	}
</script>
