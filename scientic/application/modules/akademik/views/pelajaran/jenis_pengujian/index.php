<section class="hbox stretch">
  <section>
    <section class="vbox">
      <header class="header bg-white b-b b-light">
        
			<div class="col-sm-3" style="margin-top:15px">
				<select name="departemen" class="form-control" id="departemen" required="">
					<option value=""> -- Pilih Departemen -- </option>
					<option value="SMK">SMK</option>		
					<option value="SMP">SMP</option>		
				</select>
			</div>
			<div class="col-sm-3" style="margin-top:15px">
				<select name="idpelajaran" class="form-control" id="idpelajaran" required="">
					<option value=""> -- Pilih Pelajaran -- </option>
				</select>
			</div>
		<p class="groupAction">
		 <button type="button" class="btn btn-s-md btn-info btn-sm" id="filterrowbutton">Tampilkan</button>
          <button type="button" class="btn btn-s-md btn-info btn-sm" id="addrowbutton">Tambah</button>
          <button type="button" class="btn btn-s-md btn-info btn-sm" id="deleterowbutton" disabled>Hapus</button>
          <i class="fa fa-spin fa-spinner hide" id="spin"></i>
        </p>
      </header>
      <section class="scrollable padder">
        <div class="row">
          <div id="jqxGrid"></div>
        </div>
      </section>
    </section>
  </section>
</section>
<script type="text/javascript">
  var items = new Object();
  $(document).ready(function(){
	  function loadPelajaran()
	  {
		  $("#idpelajaran").load(current_url()+"/getPelajaran/"+$("#departemen").val());
	  }
	  $(".groupAction button").click(function(){
		$(".groupAction button").addClass("btn-info");
		$(".groupAction button").removeClass("btn-primary");
		$(this).removeClass("btn-info");
		$(this).addClass("btn-primary");		
	});
	$("#departemen").change(function(){
		loadPelajaran();
	});
    <?=$this->load->view("jqxgrid/jqxgrid.js",array(),TRUE)?>
    $("#addrowbutton").click(function(){
      elementJqxGridReligion.jqxGrid({showeverpresentrow: true})
    });
	$("#filterrowbutton").click(function(){
			elementJqxGridReligion.jqxGrid('source')._source.data.idpelajaran = $("#idpelajaran").val();
			elementJqxGridReligion.jqxGrid('updatebounddata');
	});
	loadPelajaran();
  });
</script>
