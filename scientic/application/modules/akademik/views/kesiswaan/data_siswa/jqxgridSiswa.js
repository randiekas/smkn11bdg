jqxGridSiswa = $("#jqxGridSiswa");
jqxGridSiswaDataFields = [
	{ "name": "replid"},
	{ "name": "nis"},
	{ "name": "nisn"},
	{ "name": "nik"},
	{ "name": "nama"},
	{ "name": "asalsekolah"},
	{ "name": "lahir"},
	{ "name": "aktif"}
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
				filter:'false',
				field:'',
				keywords:'',
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
   height : $( window ).height()-100,
   autoheight: false,
   showaggregates: true,
   pageable: true,
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
		{ text: "NIS", datafield: "nis",width: "15%" },
		{ text: "NISN", datafield: "nisn",width: "15%",editable:false},
		{ text: "Nama", datafield: "nama",width: "25%",editable:false},
		{ text: "Asal Sekolah", datafield: "asalsekolah",width: "25%",editable:false},
		{ text: "TTL", datafield: "lahir",width: "10%",editable:false},
		{ text: "Status", datafield: "aktif",width: "10%",editable:false,
			columntype:"checkbox",width: "10%",
			createEverPresentRowWidget: function (datafield, htmlElement, popup, addCallback) {
				var inputTag = $("<div style ='border: none;margin-left:42%'> </ div>").appendTo(htmlElement);
				inputTag.jqxCheckBox({ width: 10, height: 10 });
				return inputTag;
			},
			getEverPresentRowWidgetValue: function (datafield, htmlElement, validate) {
									return htmlElement.jqxCheckBox('val');
			}
		}
    ]
});
jqxGridSiswa.on('rowselect', function (event) {
  $("#deleterowbutton").removeAttr("disabled");
  $("#saverowbutton").removeAttr("disabled");
  var row = event.args.row;
		
		$.ajax({
			url:current_url()+"/getDetail",
			type:"post",
			dataType: 'json',
			data:{nis:row.nis},
			success:function(response){
				$(".showfoto").attr("src","<?=base_url()?>assets/siswa/"+response.nis+"/"+response.foto);
				$(".formcalonsiswa input,.formcalonsiswa textarea,.formcalonsiswa select").each(function(){
					if($(this).attr("type")!="file")
					{
						
						if($(this).attr("type")=="radio")
						{
							
						  $("input[type=radio][name='"+$(this).attr("name")+"']").removeAttr("checked");
						  
						  $("input[type=radio][name='"+$(this).attr("name")+"'][value='"+response[$(this).attr("name")]+"']").prop("checked",true);
						  

						}else{
						$(this).val(response[$(this).attr("name")]);	
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
			jqxGridSiswa.jqxGrid('unselectrow', event.args.rowindex);
		},200);		
	}
	else{
		//$("#addrowbutton").removeAttr("disabled");
	}
});

$("#popupWindow").jqxWindow({ width: 400, resizable: false,  isModal: true, autoOpen: false, cancelButton: $("#Cancel"), modalOpacity: 0.01 });
var contextMenu = $("#Menu").jqxMenu({ width: 200, height: 29, autoOpenPopup: false, mode: 'popup'});
jqxGridSiswa.on('contextmenu', function () {
                return false;
            });
 

            // handle context menu clicks.
            $("#Menu").on('itemclick', function (event) {
                var args = event.args;
                var rowindex = jqxGridSiswa.jqxGrid('getselectedrowindex');
                if ($.trim($(args).text()) == "Mutasi Siswa") {
                    editrow = rowindex;
                    var offset = jqxGridSiswa.offset();
                    $("#popupWindow").jqxWindow({ position: { x: parseInt(offset.left) + 60, y: parseInt(offset.top) + 60} });

                    // get the clicked row's data and initialize the input fields.
                    var dataRecord = jqxGridSiswa.jqxGrid('getrowdata', editrow);
                   console.log(dataRecord);
					$("#mutasi_nis").val(dataRecord.nis);
					$("#mutasi_nama").val(dataRecord.nama);
					$("#mutasi_departemen").val($("#calon_departemen").val());
					
                    // show the popup window.
                    $("#popupWindow").jqxWindow('show');
                }
                else {
                    var rowid = jqxGridSiswa.jqxGrid('getrowid', rowindex);
                    jqxGridSiswa.jqxGrid('deleterow', rowid);
                }
            });

            jqxGridSiswa.on('rowclick', function (event) {
                if (event.args.rightclick) {
                    jqxGridSiswa.jqxGrid('selectrow', event.args.rowindex);
                    var scrollTop = $(window).scrollTop();
                    var scrollLeft = $(window).scrollLeft();
                    contextMenu.jqxMenu('open', parseInt(event.args.originalEvent.clientX) + 5 + scrollLeft, parseInt(event.args.originalEvent.clientY) + 5 + scrollTop);

                    return false;
                }
            });