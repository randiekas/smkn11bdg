<section class="hbox stretch">
  <section>
    <section class="vbox">
      <header class="header bg-white b-b b-light">
        <p class="groupAction">
			<button type="button" class="btn btn-s-md btn-info btn-sm" id="filterrowButton">Tampil</button>
          <button type="button" class="btn btn-s-md btn-info btn-sm" id="addrowbutton">Tambah</button>
          <button type="button" class="btn btn-s-md btn-info btn-sm" id="deleterowbutton" disabled>Hapus</button>
          <i class="fa fa-spin fa-spinner hide" id="spin"></i>
        </p>
      </header>
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
							<div class="col-md-3">
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
									<label for="tingkat" class="control-label col-sm-4">Semester</label>
									<div class="col-sm-8">
										<select name="semester" class="form-control" id="semester" required="">
											
										</select>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group form-group-sm">
									<label for="tingkat" class="control-label col-sm-4">Pelajaran</label>
									<div class="col-sm-8">
										<select name="pelajaran" class="form-control" id="pelajaran" required="">
											
										</select>
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
		$('#mainSplitter').jqxSplitter({ width: '100%', height: $( window ).height()-100, orientation: 'horizontal', panels: [{ size: 50 }] });
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
			elementJqxGridReligion.jqxGrid({showeverpresentrow: false})
			elementJqxGridReligion.jqxGrid('source')._source.data.tingkat = $("#tingkat").val();
			elementJqxGridReligion.jqxGrid('source')._source.data.semester= $("#semester").val();
			elementJqxGridReligion.jqxGrid('source')._source.data.pelajaran= $("#pelajaran").val();
			elementJqxGridReligion.jqxGrid('updatebounddata');
	});
  });
 
  function loadFilterOption()
	{
		$("#tingkat").load(current_url()+"/getTingkat/"+$("#departemen").val());
		$("#semester").load(current_url()+"/getSemester/"+$("#departemen").val());
		$("#pelajaran").load(current_url()+"/getPelajaran/"+$("#departemen").val(),function(){
			$("#filterrowButton").click();
		});
	}
</script>
