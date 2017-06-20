<section class="hbox stretch">
  <section>
    <section class="vbox">
		
      <header class="header bg-white b-b b-light">
			<div class="col-md-6" style="margin-top:15px">
				<div class="form-group form-group-sm">
					<div class="col-sm-6">
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
					<div class="col-sm-3">
						<select class="form-control" id="periode_awal">
							<?php
							$periode = $this->db->query("select DISTINCT year(tglmutasi) as periode from mutasisiswa order by year(tglmutasi) ASC")->result();
							foreach($periode as $row)
							{
							?>
							<option><?=$row->periode?></option>
							<?php
							}
							?>
						</select>
					</div>
					<div class="col-sm-3">
						<select class="form-control" id="periode_akhir">
							<?php
							foreach($periode as $row)
							{
							?>
							<option><?=$row->periode?></option>
							<?php
							}
							?>
						</select>
					</div>
				</div>
			</div>
			
			<div class="col-sm-4" style="margin-top:12px">
				<button type="button" class="btn btn-s-md btn-info btn-sm" id="filterrowbutton">Filter</button>
			</div>
      </header>
      <section class="scrollable padder">
        <div class="row">

			<div id="jqxTabs" style="overflow:hidden;">
            <ul>
              <li style="margin-left: 30px;">Data Mutasi</li>
              <li>Detail Siswa</li>
			

            </ul>

            <div><!--form in div-->

							<div id="nested2">
								<div>
										<div id="jqxGrid"></div>

								</div>
								<div>
									 
									 
									<div id="jqxGridSiswa"></div>
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

	$("#filtersiswabutton").click(function(){
		elementJqxGridReligion.jqxGrid('source')._source.data.periode_awal = $("#periode_awal").val();
		elementJqxGridReligion.jqxGrid('source')._source.data.periode_akhir= $("#periode_akhir").val();
		
		elementJqxGridReligion.jqxGrid('updatebounddata');
	});
	
	$(".groupAction button").click(function(){
		$(".groupAction button").addClass("btn-info");
		$(".groupAction button").removeClass("btn-primary");
		$(this).removeClass("btn-info");
		$(this).addClass("btn-primary");

	});

	$('#nested2').jqxSplitter({  width:'99.80%',height:'99.70%',orientation: 'vertical', panels: [{ size: '30%'}] });

  <?=$this->load->view("jqxgridSiswa.js",array(),TRUE)?>
  <?=$this->load->view("jqxgrid/jqxgrid.js",array(),TRUE)?>
  $('#jqxTabs').jqxTabs({ width: '100%', height: $(window).height()-60, position: 'top'});
 });
</script>
