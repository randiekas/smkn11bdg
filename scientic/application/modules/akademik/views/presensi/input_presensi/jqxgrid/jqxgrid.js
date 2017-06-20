var jqxsetting = <?=$this->load->view("jqxgrid/jqxgrid.json",array(),TRUE)?>;
var datafields = <?=$this->load->view("jqxgrid/datafields.json",array(),TRUE)?>;
elementJqxGridReligion = $(jqxsetting.element);
var source =
{
    datatype: "json",
    id: datafields.ID,
    url: jqxsetting.urlDataGrid,
	data:{departemen:$("#calon_departemen").val(),
				proses:$("#calon_proses").val(),
				kelompok:$("#calon_kelompok").val()},
    updaterow: function (rowid, rowdata, commit) {
                 // synchronize with the server - send update command
                 elementJqxGridReligion.jqxGrid('showloadelement');
                 $.ajax({
                     dataType: 'json',
                     url: jqxsetting.urlUpdateGrid,
                     data: rowdata,
                     type:'post',
                     success: function (data, status, xhr) {
                         // update command is executed.
						 if(data.status=="success")
						 {
							 Notification.open(Notification.textSuccessUpdate(),"success");
							 elementJqxGridReligion.jqxGrid('hideloadelement');
							 commit(true);
						 }
						 else{
							 Notification.open(data.message,"error");
							 elementJqxGridReligion.jqxGrid('hideloadelement');
							 commit(false);
						 }
                     },
                     error: function (data,status) {
                         Notification.open(Notification.textFailedUpdate(),"error");
                         commit(false);
                     }
                 });
             },
   addrow: function (rowid, rowdata, commit) {
                 $.ajax({
                     dataType: 'json',
                     url: jqxsetting.urlCreateGrid,
                     data: rowdata,
                     type:'post',
                     success: function (data, status, xhr) {
                         // update command is executed.
                         if(data.status=="success")
						 {
							 Notification.open(Notification.textSuccessCreate(),"success");
							 elementJqxGridReligion.jqxGrid('updatebounddata', 'sort');
						 }
						else{
							if(data.message)
							{
								Notification.open(data.message,"error");
							}
							else{
								alert.alert("Gagal Menyimpan","Kode UPB telah digunakan, silahkan gunakan kode UPB yang lain.",function(){})
							}
						}

                     },
                     error: function (data,status) {
                        Notification.open(Notification.textFailedCreate(),"error");
                         commit(false);
                     }
                 });
            },
  deleterow: function (ids,commit) {
      // synchronize with the server - send delete command
      // call commit with parameter true if the synchronization with the server is successful
      //and with parameter false if the synchronization failed.
	  deleterow = "";
      rows = new Array();
      var datarow = new Array();
      var rowsSelected = elementJqxGridReligion.jqxGrid('getselectedrowindexes');
      x = 0;
      rowsSelected.forEach(function(e){
        rows[x] = elementJqxGridReligion.jqxGrid('getrowid',e);
		currItem = $('#jqxGrid').jqxGrid('getrowdata', e);
		deleterow = deleterow+currItem.kelompok+"("+currItem.idproses+"),";
        x++;
      });
     var str = "{"+datafields.ID+":rows}";
     var json = JSON.stringify(eval("(" + str + ")"));
     post = JSON.parse(json);


     confirm = function(){
		$.ajax({
			 dataType: 'json',
			 url: jqxsetting.urlDeleteGrid,
			 data: post,
			 type:'post',
			 success: function (data, status, xhr) {
				 // update command is executed.
				 //commit(true);
				 if(data.status=="success")
				 {
					 Notification.open(Notification.textSuccessDelete(),"success");
					elementJqxGridReligion.jqxGrid('updatebounddata', 'sort');
				}
				 else{
						Notification.open(data.message,"error");
						
				 }
				 
			 },
			 error: function (data,status) {
				 Notification.open(Notification.textFailedDelete(),"error");
				 commit(false);
			 }
		 });
	}
	messageDelete = alert.contentDelete()+"<br> Kode  : "+deleterow;
	alert.confirm(alert.titleDelete(),messageDelete,confirm,function(){});


  },
};
var dataadapter = new $.jqx.dataAdapter(source);
var jqxsetting = <?=$this->load->view("jqxgrid/jqxgrid.json",array(),TRUE)?>;
// initialize jqxGrid
elementJqxGridReligion.jqxGrid(jqxsetting.config);
//$("#jqxNotification").jqxNotification({ width: "100%", appendContainer: "#containerNotification", opacity: 0.9, autoClose: true, template: "info" });
$("#deleterowbutton").on('click', function (){
    var rowsSelected = elementJqxGridReligion.jqxGrid('getselectedrowindexes');
    if (rowsSelected.length>=1) {
        var commit = elementJqxGridReligion.jqxGrid('deleterow');
    }
});
elementJqxGridReligion.on('rowselect', function (event) {
		var row = event.args.row;
		
		$.ajax({
			url:current_url()+"/getDetail",
			type:"post",
			dataType: 'json',
			data:{nopendaftaran:row.nopendaftaran},
			success:function(response){
				console.log("<?=base_url()?>assets/psb/"+response.nopendaftaran+"/"+response.foto);
				$(".showfoto").attr("src","<?=base_url()?>assets/psb/"+response.nopendaftaran+"/"+response.foto);
				$(".formcalonsiswa input,.formcalonsiswa textarea,.formcalonsiswa select").each(function(){
					if($(this).attr("type")!="file")
					{
						$(this).val(response[$(this).attr("name")]);
						if($(this).attr("type")=="radio")
						{
						  $("input[type=radio][name='"+$(this).attr("name")+"']").removeAttr("checked");
						  $("input[type=radio][name='"+$(this).attr("name")+"'][value='"+response[$(this).attr("name")]+"']").prop("checked",true);

						}
					}
				});
				/*
				
				*/
				
			}
		});
	if(row.siswa==1)
	{
		setTimeout(function(){
			elementJqxGridReligion.jqxGrid('unselectrow', event.args.rowindex);
		},200);		
	}
	else{
		$("#addrowbutton").removeAttr("disabled");
	}
});
