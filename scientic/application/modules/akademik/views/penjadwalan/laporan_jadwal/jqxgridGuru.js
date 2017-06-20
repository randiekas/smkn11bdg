jqwidgetsGuru = $("#jqwidgetsGuru");

jqwidgetsGuruDataFields = [
	{ "name": "departemen"},
	{ "name": "statusguru"},
	{ "name": "nip"},
	{ "name": "nama"},
	{ "name": "idpelajaran"},
	{ "name": "pelajaran"},
	{ "name": "jumlah_mengajar"},
	{ "name": "jam_mengajar"},
	{ "name": "mengajar_kelas"}
];
var updateAction = function (rowid, rowdata, commit) {
                 // synchronize with the server - send update command
                 jqwidgetsGuru.jqxGrid('showloadelement');
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
							 jqwidgetsGuru.jqxGrid('hideloadelement');
							 commit(true);
						 }
						 else{
							 Notification.open(data.message,"error");
							 jqwidgetsGuru.jqxGrid('hideloadelement');
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
							 jqwidgetsGuru.jqxGrid('updatebounddata', 'sort');
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
      var rowsSelected = jqwidgetsGuru.jqxGrid('getselectedrowindexes');
      x = 0;
      rowsSelected.forEach(function(e){
        rows[x] = jqwidgetsGuru.jqxGrid('getrowid',e);
		currItem = jqwidgetsGuru.jqxGrid('getrowdata', e);
		deleterow = deleterow+currItem.idtahunajaran+"("+currItem.kelas+"),";
        x++;
      });
	 
     var str = "{"+datafields.replid+":rows}";
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
					jqwidgetsGuru.jqxGrid('updatebounddata', 'sort');
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
	  datafields: jqwidgetsGuruDataFields,
	  updaterow: updateAction,
	  addrow:addAction,
	  deleterow:deleteAction,
	  url: current_url()+"/getGuru/",
		data: {departemen:$("#departemen").val(),infojadwal:$('#infojadwal').val()},
	 type:'post'
  }
  var adapter = new $.jqx.dataAdapter(dataSource);
  // update data source.
   
jqwidgetsGuru.jqxGrid(
{
  theme:themeWidget,
    source: adapter,
   width : "100%",
   height : '100%',
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
   editable:false,
   editmode:'dblclick',
   groupable: false,
   
   rendered: function(type)
                {
                    // select all grid cells.
                    var gridCells = $('#jqwidgetsGuru').find('.jqx-grid-cell');

                    // initialize the jqxDragDrop plug-in. Set its drop target to the second Grid.
                    gridCells.jqxDragDrop({
                        appendTo: 'body',  dragZIndex: 99999,
                        dropAction: 'none',
                        initFeedback: function (feedback) {
                            feedback.height(25);
                        },
                        dropTarget: $('#jqxGrid'), revert: true
                    });
                    gridCells.off('dragStart');
                    gridCells.off('dragEnd');
                    gridCells.off('dropTargetEnter');
                    gridCells.off('dropTargetLeave');

                    // disable revert when the dragged cell is over the second Grid.
                    gridCells.on('dropTargetEnter', function () {
                        gridCells.jqxDragDrop({ revert: false });
                    });
                    // enable revert when the dragged cell is outside the second Grid.
                    gridCells.on('dropTargetLeave', function () {
                        gridCells.jqxDragDrop({ revert: true });
                    });
                    // initialize the dragged object.
                    gridCells.on('dragStart', function (event) {
						
						var value = $('#jqwidgetsGuru').jqxGrid('getrowdata',$('#jqwidgetsGuru').jqxGrid('getselectedrowindex'));
						var position = $.jqx.position(event.args);
                        var cell = $("#jqwidgetsGuru").jqxGrid('getcellatposition', position.left, position.top);
                        $(this).jqxDragDrop('data', {
                            value: value
                        });
                    });
                    // set the new cell value when the dragged cell is dropped over the second Grid.      
                    gridCells.on('dragEnd', function (event) {
						
                        var value = event.args.value;;
                        var position = $.jqx.position(event.args);
                        var cell = $("#jqxGrid").jqxGrid('getcellatposition', position.left, position.top);
						console.log(cell);
                        if (cell.row != null) {
							if(cell.value==null)
							{
							var data = $('#jqxGrid').jqxGrid('getrowdata', cell.row);
							
							var insert = {
									idkelas:$("#idkelas").val(),
									nipguru:value.nip,
									idpelajaran:value.idpelajaran,
									departemen:$("#departemen").val(),
									infojadwal:$("#infojadwal").val(),
									hari:$("#hari").val(),
									kode_ruang:cell.column,
									jamke:data.jamke,
									jam1:data.jam1,
									jam2:data.jam2};
							
							
							$.ajax({
								url:current_url()+"/store",
								type:'post',
								data:insert,
								dataType:'json',
								success:function(result)
								{
									if(result.status=='success')
									{
										Notification.open(result.message,"success");
										elementJqxGridReligion.jqxGrid('updatebounddata');
										jqwidgetsGuru.jqxGrid('updatebounddata');
									}
									else{
										Notification.open(result.message,"error");
									}
								}
							})
							
                            //$("#jqxGrid").jqxGrid('setcellvalue', cell.row, cell.column, value);
							}
                        }
                    });
                },                
     columns: [
		{ text: "Status", datafield: "statusguru",width: "10%" },
		{ text: "NIP", datafield: "nip",width: "15%" },
		{ text: "nama", datafield: "nama",width: "25%" },
		{ text: "Pelajaran", datafield: "pelajaran",width: "20%"},
		{ text: "Jumlah Mengajar", datafield: "jumlah_mengajar",width: "10%"},
		{ text: "Jam Mengajar", datafield: "jam_mengajar",width: "10%"},
		{ text: "Mengajar Kelas", datafield: "mengajar_kelas",width: "10%"}
    ]
});
jqwidgetsGuru.on('rowselect', function (event) {
  $("#deleterowbutton").removeAttr("disabled");
});