<section class="hbox stretch">
  <section>
    <section class="vbox">
      <header class="header bg-white b-b b-light">
        <p class="groupAction">
          <button type="button" class="btn btn-s-md btn-info btn-sm" id="addrowbutton" disabled>Tambah</button>
          <button type="button" class="btn btn-s-md btn-info btn-sm" id="deleterowbutton" disabled>Hapus</button>
          <i class="fa fa-spin fa-spinner hide" id="spin"></i>
        </p>
      </header>
      <section class="scrollable padder">
        <div class="row">

          <div id="jqxTabs" style="overflow:hidden;">
            <ul>
              <li style="margin-left: 30px;">Guru Mengajar</li>
              <li>Tingkat</li>
			  <li>Grading</li>
            </ul>

            <div><!--form in div-->
				<div id="jqwidgetsGuruMengajar"></div>
                
              
			</div>

			<div>
				<div id="jqwidgetsTingkat"></div>
			</div>
			<div>
				<div id="jqwidgetsGrading"></div>
			</div>
		  
          </div>
        </div>
      </section>
  </section>
  </section>
</section>
<script type="text/javascript">
$(document).ready(function(){
	$(".groupAction button").click(function(){
		$(".groupAction button").addClass("btn-info");
		$(".groupAction button").removeClass("btn-primary");
		$(this).removeClass("btn-info");
		$(this).addClass("btn-primary");
		
		$(".groupAction button").removeClass("active");
        $(this).addClass("active");
	});
	<?=$this->load->view("jqxgridGuruMengajar.js",array(),TRUE)?>
	<?=$this->load->view("jqxgridTingkat.js",array(),TRUE)?>
	<?=$this->load->view("jqxgridGrading.js",array(),TRUE)?>
  $('#jqxTabs').jqxTabs({ width: '100%', height: $(window).height()-60, position: 'top'});
  $("#addrowbutton").click(function(){
	  $('#jqxTabs').jqxTabs('select', 2);
	  setTimeout(function(){
		  $('#jqwidgetsGrading').jqxGrid({ showeverpresentrow: true}); 
	  },300);
	  
  }); 
});
</script>
