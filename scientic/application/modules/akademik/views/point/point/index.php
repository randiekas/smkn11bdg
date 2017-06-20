<section class="hbox stretch">
  <section>
    <section class="vbox">
      <section class="scrollable padder">
        <div class="row">

			<div id="jqxTabs" style="overflow:hidden;">
            <ul>
                <li style="margin-left: 30px;">Data Siswa</li>
                <li>Pelanggaran & Prestasi</li>
                
                

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
								                </div>
											</div>
											<hr/>
											
											
										</div>


								</div>
								<div>
									
									<div id="jqxGridSiswa"></div>
								</div>
							</div>

				  <div>

				  </div>
			</div>

			<div>
                <div id="jqwidgetsPoint"></div>
			</div>
            




          </div>

        </div>
      </section>
    </section>
  </section>
</section>

<script type="text/javascript">
$(document).ready(function(){
    

	
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
  <?=$this->load->view("jqxgridPoint.js",array(),TRUE)?>
  <?=$this->load->view("jqxgridSiswa.js",array(),TRUE)?>
  
  $('#jqxTabs').jqxTabs({ width: '100%', height: $(window).height(), position: 'top'});
   $("#addrowbutton").click(function(){
		$("#jqxTabs").jqxTabs("select",1);
		$("#saverowbutton").removeAttr("disabled");
		jqxGridSiswa.jqxGrid('clearselection');
      //elementJqxGridReligion.jqxGrid({showeverpresentrow: true})
    });
  	
	$("#saverowbutton").click(function(){
		$(".formcalonsiswa:visible input[type=submit]").click();
     });
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
