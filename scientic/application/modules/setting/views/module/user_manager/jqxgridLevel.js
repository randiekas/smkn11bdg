
jqwidgetsLevel = $("#jqwidgetsLevel");
jqwidgetsLevelDataFields = [
	{ "name": "id"},
	{ "name": "code"},
	{ "name": "name"},
	{ "name": "na"}
];
jqwidgetsLevelDataSource =
	{
		datatype: "json",
		datafields: jqwidgetsLevelDataFields,
		id: 'id',
		url: current_url()+"/getLevel/",
		updaterow: function (rowid, rowdata, commit) {
			 // synchronize with the server - send update command
			 jqwidgetsLevel.jqxGrid('showloadelement');
			 $.ajax({
				 dataType: 'json',
				 url: current_url()+"/updateLevel/",
				 data: rowdata,
				 type:'post',
				 success: function (data, status, xhr) {
					 // update command is executed.
					 if(data.status=="success")
					 {
						 Notification.open(Notification.textSuccessUpdate(),"success");
						 jqwidgetsLevel.jqxGrid('hideloadelement');
						 commit(true);
					 }
					 else{
						 Notification.open(data.message,"error");
						 jqwidgetsLevel.jqxGrid('hideloadelement');
						 commit(false);
					 }
				 },
				 error: function (data,status) {
					 Notification.open(Notification.textFailedUpdate(),"error");
					 commit(false);
				 }
			 });
		 },
		deleterow: function (ids,commit) {
			$.ajax({
			 dataType: 'json',
			 url: current_url()+"/deleteLevel",
			 data: {id:ids},
			 type:'post',
			 success: function (data, status, xhr) {
				 // update command is executed.
				 //commit(true);
				 if(data.status=="success")
				 {
					 Notification.open(Notification.textSuccessDelete(),"success");
					//elementJqxGridReligion.jqxGrid('updatebounddata', 'sort');
					commit(true);
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
	};
var jqwidgetsLevelAdapter = new $.jqx.dataAdapter(jqwidgetsLevelDataSource);
jqwidgetsLevel.jqxGrid(
{
  theme:themeWidget,
   width : "100%",
   height : "100%",
   source: jqwidgetsLevelAdapter,
   autoheight: false,
   showaggregates: true,
   pageable: false,
   pagesize:500,
   showfilterrow: false,
   filterable: true,
   sortable: true,
   columnsResize: true,
   altrows: true,
   showeverpresentrow: false,
   everpresentrowposition: "top",
   everpresentrowactions: "add reset",
   editable:true,
   editmode:'dblclick',
   groupable: false,
   showtoolbar: true,
   rendertoolbar: function (toolbar) {
                    var me = this;
                    var container = $("<div style='margin: 5px;'></div>");
                    toolbar.append(container);
                    container.append('<input id="leveladdrowbutton" type="button" value="Tambah Level" />');
                    container.append('<input style="margin-left: 5px;" id="leveldeleterowbutton" type="button" value="Hapus Level" />');
                    $("#leveladdrowbutton").jqxButton();
                    
                    $("#leveldeleterowbutton").jqxButton();
                    
                    
                    
                    // create new row.
                    $("#leveladdrowbutton").on('click', function () {
                        $("#popupWindowLevel").jqxWindow('show');
						
                    });

                    

                    // delete row.
                    $("#leveldeleterowbutton").on('click', function () {
                        var selectedrowindex = jqwidgetsLevel.jqxGrid('getselectedrowindex');
                        var rowscount = jqwidgetsLevel.jqxGrid('getdatainformation').rowscount;
                        if (selectedrowindex >= 0 && selectedrowindex < rowscount) {
	
								 confirm = function(){
									var id = jqwidgetsLevel.jqxGrid('getrowid', selectedrowindex);
									var commit = jqwidgetsLevel.jqxGrid('deleterow', id);
								}
								
								var records = jqwidgetsLevel.jqxGrid('getrowdata', selectedrowindex);
								alert.confirm(alert.titleDelete(),"Apakah anda yakin akan menghapus level "+records.name+" ?",confirm,function(){});
                            
                        }
                    });
                },
     columns: [
		{ text: "id", datafield: "id",width: "10%",editable:false},
		{ text: "code", datafield: "code",width: "20%" },
		{ text: "name", datafield: "name",width: "60%" },
		{ text: "na", datafield: "na",width: "10%" }
    ]
});
jqwidgetsLevel.on("rowselect",function(event){
	$("#useraddrowbutton").jqxButton({disabled: false});
	$("#userdeleterowbutton").jqxButton({disabled: false});
	// event arguments.
    var args = event.args;
    // row's bound index.
    var rowBoundIndex = args.rowindex;
    // row's data. The row's data object or null(when all rows are being selected or unselected with a single action). If you have a datafield called "firstName", to access the row's firstName, use var firstName = rowData.firstName;
    var rowData = args.row;
	//console.log(rowData);
	elementJqxGridSource.data.level_id=rowData.id;
	var dataAdapter = new $.jqx.dataAdapter(elementJqxGridSource);
	elementJqxGrid.jqxTreeGrid({source:dataAdapter})
	
	jqwidgetsUserDataSource.data.level_id=rowData.id;
	jqwidgetsUser.jqxGrid('updatebounddata');
});
$("#popupWindowLevel").jqxWindow({ width: 250, resizable: false,  isModal: true, autoOpen: false, cancelButton: $("#CancelLevel"), modalOpacity: 0.3 });
$("#CancelLevel").jqxButton();
$("#SaveLevel").jqxButton();
$("#SaveLevel").click(function(){
	$.ajax({
                     dataType: 'json',
                     url: current_url()+"/saveLevel",
                     data: {code:$("#level_code").val(),name:$("#level_name").val()},
                     type:'post',
                     success: function (data, status, xhr) {
                         // update command is executed.
                         if(data.status=="success")
						 {
							 Notification.open("Data Level telah berhasil ditambahkan","success");
							 jqwidgetsLevel.jqxGrid('updatebounddata', 'sort');
							 $("#level_code").val('');
							 $("#level_name").val('');
							 $("#popupWindowLevel").jqxWindow('hide');
						 }
						else{
							if(data.message)
							{
								Notification.open(data.message,"error");
							}
							
						}

                     },
                     error: function (data,status) {
                        Notification.open(Notification.textFailedCreate(),"error");
                         commit(false);
                     }
                 });
});

function reloadLevel()
{
  
}
reloadLevel();
