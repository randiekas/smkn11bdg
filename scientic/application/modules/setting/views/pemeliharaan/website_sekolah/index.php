<section class="hbox stretch">
  <section>
    <section class="vbox">
		<!--
      <header class="header bg-white b-b b-light" style="display:none">
        <p class="groupAction">
          <button type="button" class="btn btn-s-md btn-info btn-sm" id="addrowbutton">Tambah</button>
          <button type="button" class="btn btn-s-md btn-info btn-sm" id="deleterowbutton" disabled>Hapus</button>
          <i class="fa fa-spin fa-spinner hide" id="spin"></i>
        </p>
      </header>
	  !-->
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
  });
</script>
