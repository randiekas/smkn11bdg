jqxGridSiswa = $("#jqxGridSiswa");
jqxGridSiswaDataFields = [
	{ "name": "replid"},
	{ "name": "nis"},
	{ "name": "nisn"},
	{ "name": "nik"},
	{ "name": "noun"},
	{ "name": "nama"}
];
var updateAction = function (rowid, rowdata, commit) {
                 // synchronize with the server - send update command
                 jqxGridSiswa.jqxGrid('showloadelement');
                 $.ajax({
                     dataType: 'json',
                     url: current_url()+"/update/",
                     data: rowdata,
                     type:'post',
                     success: function (data, status, xhr) {
                         // update command is executed.
						 if(data.status=="success")
						 {
							 Notification.open(Notification.textSuccessUpdate(),"success");
							 jqxGridSiswa.jqxGrid('hideloadelement');
							 commit(true);
						 }
						 else{
							 Notification.open(data.message,"error");
							 jqxGridSiswa.jqxGrid('hideloadelement');
							 commit(false);
						 }
                     },
                     error: function (data,status) {
                         Notification.open(Notification.textFailedUpdate(),"error");
                         commit(false);
                     }
                 });
             };
var addAction = function (rowid, rowdata, commit) {
				rowdata.idtahunajaran = $('#jqwidgetsTahunAjaran').jqxGrid('getrowdata', $('#jqwidgetsTahunAjaran').jqxGrid('getselectedrowindex')).replid;
                 $.ajax({
                     dataType: 'json',
                     url: current_url()+"/store/",
                     data: rowdata,
                     type:'post',
                     success: function (data, status, xhr) {
                         // update command is executed.
                         if(data.status=="success")
						 {
							 Notification.open(Notification.textSuccessCreate(),"success");
							 jqxGridSiswa.jqxGrid('updatebounddata', 'sort');
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
            };
var deleteAction= function (ids,commit) {
      // synchronize with the server - send delete command
      // call commit with parameter true if the synchronization with the server is successful
      //and with parameter false if the synchronization failed.
	  
	  deleterow = "";
      rows = new Array();
      var datarow = new Array();
      var rowsSelected = jqxGridSiswa.jqxGrid('getselectedrowindexes');
      x = 0;
      rowsSelected.forEach(function(e){
        rows[x] = jqxGridSiswa.jqxGrid('getrowid',e);
		currItem = jqxGridSiswa.jqxGrid('getrowdata', e);
		deleterow = deleterow+currItem.idtahunajaran+"("+currItem.kelas+"),";
        x++;
      });
	 
     var str = "{"+datafields.replid+":rows}";
     var json = JSON.stringify(eval("(" + str + ")"));
     post = JSON.parse(json);
	console.log("delete called");

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
					jqxGridSiswa.jqxGrid('updatebounddata', 'sort');
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
	};
	 
	messageDelete = alert.contentDelete()+"<br> Kode  : "+deleterow;
	alert.confirm(alert.titleDelete(),messageDelete,confirm,function(){});


  };
   
  var dataSource = {
	  datatype: "json",
	  datafields: jqxGridSiswaDataFields,
	  updaterow: updateAction,
	  addrow:addAction,
	  deleterow:deleteAction,
	  url: current_url()+"/getSiswa/",
		data: {
				departemen:$("#calon_departemen").val(),
				idtahunajaran:$("#siswa_idtahunajaran").val(),
				idkelas:$("#siswa_idkelas").val()
				},
	 type:'post'
  }
  var adapter = new $.jqx.dataAdapter(dataSource);
  // update data source.
   
jqxGridSiswa.jqxGrid(
{
	theme:themeWidget,
    source: adapter,
   width : "100%",
   height : $( window ).height()-340,
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
   selectionmode:'multiplerows',
   groupable: false,
     columns: [
		{ text: "NIS", datafield: "nis",width: "25%" },
		{ text: "NISN", datafield: "nisn",width: "25%",editable:false},
		{ text: "NAMA", datafield: "nama",width: "50%",editable:false}
    ]
});
jqxGridSiswa.on('rowselect', function (event) {
  $("#deleterowbutton").removeAttr("disabled");
});