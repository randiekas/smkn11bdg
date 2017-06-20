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
									<label for="tingkat" class="control-label col-sm-4">Tahun</label>
									<div class="col-sm-8">
										<select name="idtahunajaran" class="form-control" id="idtahunajaran" required="">
											
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
							<div class="col-md-6">
								<div class="form-group form-group-sm">
									<label for="departemen" class="control-label col-sm-2">Info</label>
									<div class="col-sm-7">
										<select name="infojadwal" class="form-control" id="infojadwal" required="">
											
										</select>
									</div>
									<div class="col-sm-3">
										<button type="button" class="btn btn-sm btn-primary addinfojadwal"><i class="fa fa-plus"></i></button>
										<button type="button" class="btn btn-sm btn-primary removeinfojadwal"><i class="fa fa-minus"></i></button>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group form-group-sm">
									<label for="tingkat" class="control-label col-sm-4">Hari</label>
									<div class="col-sm-8">
										<select name="hari" class="form-control" id="hari" required="">
											<?php
											$this->db->where("ref_grup","54");
											foreach($this->db->get("referensi")->result() as $row)
											{
												echo "<option value='{$row->ref_kode}'>{$row->ref_nama}</option>";
											}
											?>
											
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
					<div id="secondNested">
						<div>
							
							<div id="jqwidgetsGuru"></div>
							
						</div>
						<div>
								<div id='Menu'>
										<ul>
											<li>Delete Jadwal ini</li>
										</ul>
								</div>
							<div id="jqxGrid"></div>
							
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
  var items = new Object();
  $(document).ready(function(){
		$("#departemen").change(function(){
			loadFilterOption();
		});
		loadFilterOption();
		$('#mainSplitter').jqxSplitter({ width: '100%', height: $( window ).height()-10, orientation: 'horizontal', panels: [{ size: 100 }] });
		$('#secondNested').jqxSplitter({ width: '100%', height: '100%',  orientation: 'horizontal', panels: [{ size: 250}] });
		$(".groupAction button").click(function(){
		$(".groupAction button").addClass("btn-info");
		$(".groupAction button").removeClass("btn-primary");
		$(this).removeClass("btn-info");
		$(this).addClass("btn-primary");
		
		
	});
	<?=$this->load->view("jqxgridGuru.js",array(),TRUE)?>
    <?=$this->load->view("jqxgrid/jqxgrid.js",array(),TRUE)?>
    $("#addrowbutton").click(function(){
      elementJqxGridReligion.jqxGrid({showeverpresentrow: true})
    });
	$("#filterrowButton").click(function(){
			
			elementJqxGridReligion.jqxGrid('source')._source.data.departemen = $("#departemen").val();
			elementJqxGridReligion.jqxGrid('source')._source.data.idkelas= $("#idkelas").val();
			elementJqxGridReligion.jqxGrid('source')._source.data.infojadwal= $("#infojadwal").val();
			elementJqxGridReligion.jqxGrid('source')._source.data.hari= $("#hari").val();
			elementJqxGridReligion.jqxGrid('updatebounddata');
			jqwidgetsGuru.jqxGrid('source')._source.data.departemen= $("#departemen").val();
			jqwidgetsGuru.jqxGrid('source')._source.data.infojadwal= $("#infojadwal").val();
			jqwidgetsGuru.jqxGrid('updatebounddata');
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
	$(".addinfojadwal").click(function(){
		var deskripsi = prompt("keterangan info jadwal :");
		if(deskripsi)
		{
			$.ajax({
				url:current_url()+"/addInfoJadwal",
				type:'post',
				dataType:'Json',
				data:{deskripsi:deskripsi,idtahunajaran:$("#idtahunajaran").val()},
				success:function(result)
				{
					if(result.status=='success')
					{
						location.reload();
					}else{
						console.log(result.message);
					}
				}
			})
		}
	});
	$(".removeinfojadwal").click(function(){
		if(confirm("apakah anda yakin akan menghapus jadwal ini ?"))
		{
			$.ajax({
				url:current_url()+"/removeInfoJadwal",
				type:'post',
				dataType:'Json',
				data:{replid:$("#infojadwal").val()},
				success:function(result)
				{
					if(result.status=='success')
					{
						location.reload();
					}else{
						console.log(result.message);
					}
				}
			})
		}
	});
</script>
