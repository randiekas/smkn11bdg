<section class="hbox stretch">
  <section>
    <section class="vbox">
      <section class="scrollable padder">
        <div class="row">

          <div id="jqxTabs" style="overflow:hidden;">
            <ul>
              <li style="margin-left: 30px;">Guru Mengajar</li>
              <li>Input Nilai</li>
			  
            </ul>

            <div><!--form in div-->
				<div id="jqwidgetsGuruMengajar"></div>
                
              
			</div>

			<div>
				
				<div id="mainSplitter">
					<div class="splitter-panel">
						<div id="jqwidgetsTingkat"></div>
					</div>
					<div class="splitter-panel">
						<div id="secondNested">
							<div>
								<div id="jqwidgetsGrading"></div>
							</div>
							<div>
								<div id="jqwidgetsBobot"></div>
							</div>
						</div>
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
	$('#mainSplitter').jqxSplitter({ width: '99.80%', height: '99%', orientation: 'vertical', panels: [{ size: '30%' }] });
	$('#secondNested').jqxSplitter({ width: '99.80%', height: '100%',  orientation: 'horizontal', panels: [{ size: '40%'}] });
	
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
	<?=$this->load->view("jqxgridUjian.js",array(),TRUE)?>
	<?=$this->load->view("jqxgridNilai.js",array(),TRUE)?>
  $('#jqxTabs').jqxTabs({ width: '100%', height: $(window).height()-10, position: 'top'});
});
</script>