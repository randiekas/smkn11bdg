jqwidgetsUser = $("#jqwidgetsUser");
jqwidgetsUserDataFields = [
	{ "name": "id"},
	{ "name": "username"},
	{ "name": "password"},
	{ "name": "lock"}
];
jqwidgetsUserDataSource =
	{
		datatype: "json",
		datafields: jqwidgetsUserDataFields,
		id: 'id',
		url: current_url()+"/getUser/",
		data:{
			level_id:"",
		},
		updaterow: function (rowid, rowdata, commit) {
			 // synchronize with the server - send update command
			 jqwidgetsUser.jqxGrid('showloadelement');
			 $.ajax({
				 dataType: 'json',
				 url: current_url()+"/updateUser/",
				 data: rowdata,
				 type:'post',
				 success: function (data, status, xhr) {
					 // update command is executed.
					 if(data.status=="success")
					 {
						 Notification.open(Notification.textSuccessUpdate(),"success");
						 jqwidgetsUser.jqxGrid('hideloadelement');
						 commit(true);
					 }
					 else{
						 Notification.open(data.message,"error");
						 jqwidgetsUser.jqxGrid('hideloadelement');
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
			 url: current_url()+"/deleteUser",
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
var jqwidgetsUserAdapter = new $.jqx.dataAdapter(jqwidgetsUserDataSource);
jqwidgetsUser.jqxGrid(
{
  theme:themeWidget,
   width : "100%",
   height : "100%",
   source: jqwidgetsUserAdapter,
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
                    container.append('<input id="useraddrowbutton" type="button" value="Tambah Akun" />');
                    container.append('<input style="margin-left: 5px;" id="userdeleterowbutton" type="button" value="Hapus Akun" />');
                    $("#useraddrowbutton").jqxButton({disabled: true});
                    
                    $("#userdeleterowbutton").jqxButton({disabled: true});
                    
                    
                    
                    // create new row.
                    $("#useraddrowbutton").on('click', function () {
                        $("#popupWindowUser").jqxWindow('show');
						$("#entity_id").load(current_url()+"/loadPegawai");
                    });

                    

                    // delete row.
                    $("#userdeleterowbutton").on('click', function () {
                        var selectedrowindex = jqwidgetsUser.jqxGrid('getselectedrowindex');
                        var rowscount = jqwidgetsUser.jqxGrid('getdatainformation').rowscount;
                        if (selectedrowindex >= 0 && selectedrowindex < rowscount) {
	
								 confirm = function(){
									var id = jqwidgetsUser.jqxGrid('getrowid', selectedrowindex);
									var commit = jqwidgetsUser.jqxGrid('deleterow', id);
								}
								
								var records = jqwidgetsUser.jqxGrid('getrowdata', selectedrowindex);
								alert.confirm(alert.titleDelete(),"Apakah anda yakin akan menghapus User "+records.username+" ?",confirm,function(){});
                            
                        }
                    });
                },
     columns: [
		{ text: "username", datafield: "username",width: "60%" },
		{ text: "password", datafield: "password",width: "30%" },
		{ text: "lock", datafield: "lock",width: "10%",columnstype:"checkbox"}
    ]
});

$("#popupWindowUser").jqxWindow({ width: 350, resizable: false,  isModal: true, autoOpen: false, cancelButton: $("#CancelUser"), modalOpacity: 0.3 });
$("#CancelUser").jqxButton();
$("#SaveUser").jqxButton();
$("#SaveUser").click(function(){
	var records = jqwidgetsLevel.jqxGrid('getrowdata', jqwidgetsLevel.jqxGrid('getselectedrowindex'));
	$.ajax({
                     dataType: 'json',
                     url: current_url()+"/saveUser",
                     data: {username:$("#user_username").val(),password:$("#user_password").val(),entity_id:$("#entity_id").val(),level:records.id},
                     type:'post',
                     success: function (data, status, xhr) {
                         // update command is executed.
                         if(data.status=="success")
						 {
							 Notification.open("Data User telah berhasil ditambahkan","success");
							 jqwidgetsUser.jqxGrid('updatebounddata', 'sort');
							 $("#user_username").val('');
							 $("#user_password").val('');
							 $("#popupWindowUser").jqxWindow('hide');
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

function reloadUser()
{
  
}
//reloadLevel();
