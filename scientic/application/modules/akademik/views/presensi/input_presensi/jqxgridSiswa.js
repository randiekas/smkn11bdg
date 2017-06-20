jqxGridSiswa = $("#jqxGridSiswa");
jqxGridSiswaDataFields = [
	{ "name": "replid"},
	{ "name": "idpresensi"},
	{ "name": "nis"},
	{ "name": "nama"},
	{ "name": "hadir"},
	{ "name": "ijin"},
	{ "name": "sakit"},
	{ "name": "alpa"},
	{ "name": "cuti"},
	{ "name": "keterangan"}
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
		deleterow = deleterow+currItem.nim+"("+currItem.nama+"),";
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
	  url: current_url()+"/grid_data/",
		data: {
					idkelas:$("#siswa_idkelas").val(),
					idsemester:$("#idsemester").val(),
					idpelajaran:$("#idpelajaran").val(),
					gurupelajaran:$("#gurupelajaran").val(),
					tanggal:'<?=date("Y-m-d")?>'
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
   height : $( window ).height()-110,
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
   //selectionmode:'multiplerows',
   groupable: false,
     columns: [
		{ text: "NIS", datafield: "nis",width: "20%",editable:false},
		{ text: "Nama", datafield: "nama",width: "30%" ,editable:false},
		{ text: "hadir", datafield: "hadir",
			columntype:"checkbox",width: "7%",
			createEverPresentRowWidget: function (datafield, htmlElement, popup, addCallback) {
				var inputTag = $("<div style ='border: none;margin-left:42%'> </ div>").appendTo(htmlElement);
				inputTag.jqxCheckBox({ width: 10, height: 10 });
				return inputTag;
			},
			getEverPresentRowWidgetValue: function (datafield, htmlElement, validate) {
									return htmlElement.jqxCheckBox('val');
			}
		},
		{ text: "ijin", datafield: "ijin",
			columntype:"checkbox",width: "5%",
			createEverPresentRowWidget: function (datafield, htmlElement, popup, addCallback) {
				var inputTag = $("<div style ='border: none;margin-left:42%'> </ div>").appendTo(htmlElement);
				inputTag.jqxCheckBox({ width: 10, height: 10 });
				return inputTag;
			},
			getEverPresentRowWidgetValue: function (datafield, htmlElement, validate) {
									return htmlElement.jqxCheckBox('val');
			}
		},
		{ text: "sakit", datafield: "sakit",
			columntype:"checkbox",width: "8%",
			createEverPresentRowWidget: function (datafield, htmlElement, popup, addCallback) {
				var inputTag = $("<div style ='border: none;margin-left:42%'> </ div>").appendTo(htmlElement);
				inputTag.jqxCheckBox({ width: 10, height: 10 });
				return inputTag;
			},
			getEverPresentRowWidgetValue: function (datafield, htmlElement, validate) {
									return htmlElement.jqxCheckBox('val');
			}
		},
		{ text: "alpa", datafield: "alpa",
			columntype:"checkbox",width: "5%",
			createEverPresentRowWidget: function (datafield, htmlElement, popup, addCallback) {
				var inputTag = $("<div style ='border: none;margin-left:42%'> </ div>").appendTo(htmlElement);
				inputTag.jqxCheckBox({ width: 10, height: 10 });
				return inputTag;
			},
			getEverPresentRowWidgetValue: function (datafield, htmlElement, validate) {
									return htmlElement.jqxCheckBox('val');
			}
		},
		{ text: "cuti", datafield: "cuti",
			columntype:"checkbox",width: "5%",
			createEverPresentRowWidget: function (datafield, htmlElement, popup, addCallback) {
				var inputTag = $("<div style ='border: none;margin-left:42%'> </ div>").appendTo(htmlElement);
				inputTag.jqxCheckBox({ width: 10, height: 10 });
				return inputTag;
			},
			getEverPresentRowWidgetValue: function (datafield, htmlElement, validate) {
									return htmlElement.jqxCheckBox('val');
			}
		},
		{ text: "keterangan", datafield: "keterangan",width: "20%"}
		
    ]
});
