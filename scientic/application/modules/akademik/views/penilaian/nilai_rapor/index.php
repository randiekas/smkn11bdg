<section class="hbox stretch">
  <section>
    <section class="vbox">
      <section class="scrollable padder">
        <div class="row">

          <div id="jqxTabs" style="overflow:hidden;">
            <ul>
              <li style="margin-left: 30px;">Pilih Kelas</li>
              <li>Nilai Akhir</li>
			</ul>

            <div><!--form in div-->
				<div id="jqwidgetsKelas"></div>
                
              
			</div>

			<div>
				<div id="nested2">
								<div>
										<div id="jqwidgetsSiswa"></div>
								</div>
								<div>
									 
									 
									<div id="jqwidgetsNAU"></div>
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
	$(".groupAction button").click(function(){
		$(".groupAction button").addClass("btn-info");
		$(".groupAction button").removeClass("btn-primary");
		$(this).removeClass("btn-info");
		$(this).addClass("btn-primary");
		
		$(".groupAction button").removeClass("active");
        $(this).addClass("active");
	});
	<?=$this->load->view("jqxgridKelas.js",array(),TRUE)?>
	<?=$this->load->view("jqxgridSiswa.js",array(),TRUE)?>
	<?=$this->load->view("jqxgridUjian.js",array(),TRUE)?>
  $('#jqxTabs').jqxTabs({ width: '100%', height: $(window).height()-10, position: 'top'});
  $('#nested2').jqxSplitter({  width:'99.80%',height:'99.70%',orientation: 'vertical', panels: [{ size: '30%'}] });
 
});
</script>