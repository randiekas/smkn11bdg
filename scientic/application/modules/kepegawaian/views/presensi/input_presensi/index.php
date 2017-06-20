<section class="hbox stretch">
  <section>
    <section class="vbox">
      
      <section class="scrollable padder">
        <div class="row">
			
							
							<div id="nested2">
								<div class="form-horizontal">
										
										<br/>
										<div class="col-md-12">
										 
										 
											 <div id='jqxCalendar'></div>
											 <br/>
											<button type="button" class="btn btn-info btn-sm" id="generatebutton">Input</button>
											<button type="button" class="btn btn-info btn-sm" id="deleterowbutton">Delete</button>
											 
										</div>
										
										
								</div>
								<div>
									<div id="jqxGridSiswa"></div>
								</div>
							</div>
						
				  
			</div>
			

			
			
			
			
          
			
			
			
			
          
      </section>
    </section>
  </section>
</section>

<script type="text/javascript">
$(document).ready(function(){
	$('#nested2').jqxSplitter({  width:'100%',height:$(window).height()-10,orientation: 'vertical', panels: [{ size: '20%'}] });
	function fillPresensi()
	{
		var getDate= $('#jqxCalendar').jqxCalendar('getDate'); 
		//console.log(event.args);
		var tanggal = getDate.getFullYear()+"-"+(getDate.getMonth()+1)+"-"+getDate.getDate();
		jqxGridSiswa.jqxGrid('source')._source.data.tanggal= tanggal;
		jqxGridSiswa.jqxGrid('updatebounddata');
	}
	$("#jqxCalendar").jqxCalendar({width: '100%', height: 220});
	$('#jqxCalendar').on('change', function (event)
	{ 
		fillPresensi();
	});
	
 
	
  
  <?=$this->load->view("jqxgridSiswa.js",array(),TRUE)?>
  
 
  $("#saverowbutton").click(function(){
			var getDate= $('#jqxCalendar').jqxCalendar('getDate'); 
			var tanggal = getDate.getFullYear()+"-"+(getDate.getMonth()+1)+"-"+getDate.getDate();
			jqxGridSiswa.jqxGrid('showloadelement');
			$.ajax({
				  url:current_url()+"/store",
				  type:"POST",
				  dataType:'json',
				  data:{idkelas:$("#siswa_idkelas").val(),
							replid:$("#replid").val(),
							idsemester:$("#idsemester").val(),
							idpelajaran:$("#idpelajaran").val(),
							tanggal:tanggal,
							gurupelajaran:$("#gurupelajaran").val(),
							keterangan:$("#keterangan").val(),
							materi:$("#materi").val(),
							rencana:$("#rencana").val()
				  },
				  success:function(result)
				  {
						Notification.open(result.message,"success");
						jqxGridSiswa.jqxGrid('hideloadelement');
						if($("#replid").val()=="")
						{
							$("#replid").val(result.replid);
						}
						fillPresensi();
						/*
						Notification.open(result.message,"success");
						jqxGridSiswa.jqxGrid('updatebounddata');
						jqxGridSiswa.jqxGrid('clearselection');
						$("#filtersiswabutton").click();
						*/
				  }
			  });
    });
	$("#deleterowbutton").click(function(){
			var getDate= $('#jqxCalendar').jqxCalendar('getDate'); 
			var tanggal = getDate.getFullYear()+"-"+(getDate.getMonth()+1)+"-"+getDate.getDate();
			confirm = function(){
			$.ajax({
			  url:current_url()+"/destroy",
			  type:"POST",
			  dataType:'json',
			  data:{tanggal:tanggal},
			  success:function(result)
					{
						Notification.open(result.message,"success");
						fillPresensi();
					}
				});
			};
	 
	messageDelete = "Apakah anda yakin akan menghapus semua presensi pada tanggal ini ?<br> ";
	alert.confirm(alert.titleDelete(),messageDelete,confirm,function(){});
   
	  
      
    });
	$("#generatebutton").click(function(){
			var getDate= $('#jqxCalendar').jqxCalendar('getDate'); 
			var tanggal = getDate.getFullYear()+"-"+(getDate.getMonth()+1)+"-"+getDate.getDate();
			jqxGridSiswa.jqxGrid('showloadelement');
			$.ajax({
                     dataType: 'json',
                     url: current_url()+"/store/",
                     data: {tanggal:tanggal},
                     type:'post',
                     success: function (data, status, xhr) {
                         // update command is executed.
                         if(data.status=="success")
						 {
							 jqxGridSiswa.jqxGrid('hideloadelement');
							 Notification.open(data.message,"success");
							 jqxGridSiswa.jqxGrid('updatebounddata', 'sort');
						 }
						else{
							Notification.open(data.message,"error");
						}

                     },
                     error: function (data,status) {
                        Notification.open(Notification.textFailedCreate(),"error");
                         commit(false);
                     }
                 });
    });
});
</script>
