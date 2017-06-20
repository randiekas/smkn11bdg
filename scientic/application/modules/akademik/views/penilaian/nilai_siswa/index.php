<section class="hbox stretch">
  <section>
    <section class="vbox">
      <section class="scrollable padder">
        <div class="row">

          <div id="jqxTabs" style="overflow:hidden;">
            <ul>
              <li style="margin-left: 30px;">Guru Mengajar</li>
              <li>Nilai Akhir</li>
			</ul>

            <div><!--form in div-->
				<div id="jqwidgetsGuruMengajar"></div>
                
              
			</div>

			<div>
				<div id="nested2">
								<div>
										<div id="jqwidgetsTingkat"></div>
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
	<?=$this->load->view("jqxgridGuruMengajar.js",array(),TRUE)?>
	<?=$this->load->view("jqxgridTingkat.js",array(),TRUE)?>
	<?=$this->load->view("jqxgridUjian.js",array(),TRUE)?>
  $('#jqxTabs').jqxTabs({ width: '100%', height: $(window).height()-10, position: 'top'});
  $('#nested2').jqxSplitter({  width:'99.80%',height:'99.70%',orientation: 'vertical', panels: [{ size: '30%'}] });
  $(document).ajaxComplete(function(event,xhr,setting){
		if(xhr.status=="200")
		{
			
			if(setting.url=="<?=current_url()?>/getUjian/")
			{
				
				var response = $.parseJSON(xhr.responseText);
				var c =  [
								{ text: "NIS", datafield: "nis",width: "200px"},
								{ text: "Nama", datafield: "nama",width: "200px"},
							];
				var nfields =  [
										{ "name": "nis","type":"string"},
										{ "name": "nama","type":"string"},
									];		
				
				if(response[0])
				{
					$.each(response[0],function(i,item){
						if(i!="nis" && i!="nama")
						{
							c[c.length+1] = { text: i, datafield: i,width: "100px",
													cellsrenderer: function (row, columnfield, value, defaulthtml, columnproperties) {
														newvalue = value.split('#');
														if (newvalue[1]) {
															return '<span style="margin: 4px; float: ' + columnproperties.cellsalign + ';">'+newvalue[1]+"</span>";
														}
													}
												};
												 
							
						}
						
					});
					jqwidgetsGrading.jqxGrid("source")._source.datafields = nfields;
					jqwidgetsGrading.jqxGrid({columns:c});
					
				}
			}
		}
	});
	
});

</script>
