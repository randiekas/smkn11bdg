var jqxsetting = <?=$this->load->view("jqxgrid/jqxgrid.json",array(),TRUE)?>;
var datafields = <?=$this->load->view("jqxgrid/datafields.json",array(),TRUE)?>;
elementJqxGridReligion = $(jqxsetting.element);
var source =
{
    datatype: "json",
    id: datafields.ID,
	datafields:datafields.fields,
    url: jqxsetting.urlDataGrid,
    root: 'Rows',
    pagesize: jqxsetting.pagesize,
     cache: false,
    
    beforeprocessing: function(data)
    {
      source.totalrecords = data[0].TotalRows;
    },
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
						 //elementJqxGridReligion.jqxGrid('updatebounddata');
						 elementJqxGridReligion.jqxGrid({showeverpresentrow: false})
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
								 elementJqxGridReligion.jqxGrid('updatebounddata');
								 elementJqxGridReligion.jqxGrid('addgroup', 'ref_grup');
								 elementJqxGridReligion.jqxGrid({showeverpresentrow: false})
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
            },
  deleterow: function (ids,commit) {
      // synchronize with the server - send delete command
      // call commit with parameter true if the synchronization with the server is successful
      //and with parameter false if the synchronization failed.
	  deleterow = "";
      rows = new Array();
      var datarow = new Array();
      var rowsSelected = elementJqxGridReligion.jqxGrid('getselectedcells');
      x = 0;
	  
      rowsSelected.forEach(function(e){
        rows[x] = elementJqxGridReligion.jqxGrid('getrowdata',e.rowindex).id;
		currItem = $('#jqxGrid').jqxGrid('getrowdata', e.rowindex);
		deleterow = deleterow+currItem.ref_kode+"("+currItem.ref_ket+"),";
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
					elementJqxGridReligion.jqxGrid('updatebounddata');
					elementJqxGridReligion.jqxGrid('addgroup', 'ref_grup');
					elementJqxGridReligion.jqxGrid({showeverpresentrow: false})
				 }
				 else{
					 Notification.open(data.message,"error");
					//elementJqxGridReligion.jqxGrid('updatebounddata');
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

// create new row.
$("#addrowbutton").on('click', function () {
    elementJqxGridReligion.jqxGrid({showeverpresentrow: true})
});
// delete row.
$("#deleterowbutton").on('click', function (){
    var rowsSelected = elementJqxGridReligion.jqxGrid('getselectedcells');
    if (rowsSelected.length>=1) {
        var commit = elementJqxGridReligion.jqxGrid('deleterow');
    }
});

elementJqxGridReligion.on('bindingcomplete',function(event){
	elementJqxGridReligion.jqxGrid('sortby', 'ref_nama', 'asc');
});
elementJqxGridReligion.on("filter", function (event) 
{
	elementJqxGridReligion.jqxGrid('sortby', 'ref_nama', 'asc');
});        