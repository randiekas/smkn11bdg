<section class="hbox stretch">
  <section>
    <section class="vbox">
      <header class="header bg-white b-b b-light">
        <p class="groupAction">
          <button type="button" class="btn btn-s-md btn-info btn-sm" id="deleterowbutton" disabled>Batal Lulus</button>
          <i class="fa fa-spin fa-spinner hide" id="spin"></i>
        </p>
      </header>
      <section class="scrollable padder">
        <div class="row">

			<div id="jqxTabs" style="overflow:hidden;">
            <ul>
              <li style="margin-left: 30px;">Data Siswa</li>
              <li>Detail Siswa</li>


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
												<label for="tahunlulus" class="control-label col-sm-4">Tahun Lulus</label>
												<div class="col-sm-8">
													<select class="form-control" id="tahunlulus">
														<?php
														for($year=2000;$year<=date("Y");$year++)
														{
														?>
														<option selected><?=$year?></option>
														<?php
														}
														?>
													</select>

												</div>
											</div>
											
											<div class="form-group form-group-sm">
												<label for="nopendaftaran" class="control-label col-sm-4"></label>
												<div class="col-sm-8">

														<button type="button" class="btn btn-info btn-sm" id="filteralumnibutton">Tampilkan</button>
												</div>
											</div>
										</div>


								</div>
								<div>
                    <div id="jqxGridAlumni"></div>


								</div>
							</div>

				  <div>

				  </div>
			</div>

			<div>

					<form class="form-horizontal formcalonsiswa" method="POST" enctype="multipart/form-data">
						<div class="container">
							<hr/>

								<?=$this->load->view("formdatapribadi")?>
						</div>
						<div class="container">
						<hr/>
								<?=$this->load->view("formdataorangtua")?>
						</div>
					</form>

			</div>









          </div>

        </div>
      </section>
    </section>
  </section>
</section>

<script type="text/javascript">
$(document).ready(function(){
	
	
  $("#filteralumnibutton").click(function(){
		jqxGridAlumni.jqxGrid('source')._source.data.tahunlulus = $("#tahunlulus").val();
		jqxGridAlumni.jqxGrid('source')._source.data.departemen = $("#calon_departemen").val();
		jqxGridAlumni.jqxGrid('updatebounddata');
	});
	$("#calon_departemen").change(function(){
		loadFilterOption();
	});
	
  

	loadFilterOption();


	$(".groupAction button").click(function(){
		$(".groupAction button").addClass("btn-info");
		$(".groupAction button").removeClass("btn-primary");
		$(this).removeClass("btn-info");
		$(this).addClass("btn-primary");

	});

	$('#nested2').jqxSplitter({  width:'100%',height:'100%',orientation: 'vertical', panels: [{ size: '30%'}] });
  

  <?=$this->load->view("jqxgridAlumni.js",array(),TRUE)?>

  $('#jqxTabs').jqxTabs({ width: '100%', height: $(window).height()-60, position: 'top'});

  
  $("#deleterowbutton").click(function(){
	  if(jqxGridAlumni.jqxGrid('getselectedrowindexes').length>=1)
	  {
			var nis = new Object();
			for(x=0;x<jqxGridAlumni.jqxGrid('getselectedrowindexes').length;x++)
			{
				nis[x] = jqxGridAlumni.jqxGrid('getrowdata', jqxGridAlumni.jqxGrid('getselectedrowindexes')[x]).nis;
			}
			$.ajax({
			  url:current_url()+"/destroy",
			  type:"POST",
			  dataType:'json',
			  data:{nis:nis,idkelas:'',departemen:$("#calon_departemen").val(),idtingkat:$("#siswa_tingkat").val()},
			  success:function(result)
			  {
					Notification.open(result.message,"success");
					jqxGridAlumni.jqxGrid('updatebounddata');
					jqxGridAlumni.jqxGrid('clearselection');
					$("#filtersiswabutton").click();

			  }
		  });
	  }
  });
  $("#filteralumnibutton").click();
});

function loadFilterOption()
	{
		$("#siswa_idtahunajaran").load(current_url()+"/getTahunAjaran/"+$("#calon_departemen").val());
	}
</script>
