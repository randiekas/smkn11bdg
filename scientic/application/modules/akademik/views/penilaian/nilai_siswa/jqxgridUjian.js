jqwidgetsGrading = $("#jqwidgetsNAU");
jqwidgetsGradingDataFields = [];
var updateAction = function (rowid, rowdata, commit) {
                 // synchronize with the server - send update command
                 jqwidgetsGrading.jqxGrid('showloadelement');
                 $.ajax({
                     dataType: 'json',
                     url: current_url()+"/updateUjian/",
                     data: rowdata,
                     type:'post',
                     success: function (data, status, xhr) {
                         // update command is executed.
						 if(data.status=="success")
						 {
							 Notification.open(Notification.textSuccessUpdate(),"success");
							 jqwidgetsGrading.jqxGrid('hideloadelement');
							 commit(true);
						 }
						 else{
							 Notification.open(data.message,"error");
							 jqwidgetsGrading.jqxGrid('hideloadelement');
							 commit(false);
						 }
                     },
                     error: function (data,status) {
                         Notification.open(Notification.textFailedUpdate(),"error");
                         commit(false);
                     }
                 });
             };
 
   
  var dataSource = {
	  datatype: "json",
	  datafields: jqwidgetsGradingDataFields,
	  updaterow: updateAction,
	  id:"replid",
	  deleterow:function (ids,commit) {
      // synchronize with the server - send delete command
      // call commit with parameter true if the synchronization with the server is successful
      //and with parameter false if the synchronization failed.
	  deleterow = "";
      rows = new Array();
      var datarow = new Array();
      x = 0;
	  
      rowsSelected.forEach(function(e){
        rows[x] = jqwidgetsGrading.jqxGrid('getrowid',e);
		currItem = jqwidgetsGrading.jqxGrid('getrowdata', e);
		deleterow = deleterow+currItem.kode+'('+currItem.deskripsi+')';
		x++;
      });
	 
     var str = "{replid:rows}";
     var json = JSON.stringify(eval("(" + str + ")"));
     post = JSON.parse(json);
	 confirm = function(){
		$.ajax({
			 dataType: 'json',
			 url: current_url()+"/destroyUjian",
			 data: post,
			 type:'post',
			 success: function (data, status, xhr) {
				 // update command is executed.
				 //commit(true);
				 if(data.status=="success")
				 {
					 Notification.open(Notification.textSuccessDelete(),"success");
					jqwidgetsGrading.jqxGrid('updatebounddata', 'sort');
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


  },
	url: current_url()+"/getUjian/",
	data:{idpelajaran:'',idkelas:'',idsemester:'',idjenis:'',idaturan:'',nipguru:''},
	type:'post',
	id:'replid'
  }
  var adapter = new $.jqx.dataAdapter(dataSource);
  // update data source.
   
jqwidgetsGrading.jqxGrid(
{
  theme:themeWidget,
    source: adapter,
   width : "99.80%",
   height : $( window ).height()-45,
   autoheight: false,
   showaggregates: true,
   pageable: false,
   pagesize:500,
   showfilterrow: true,
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
   showtoolbar:false,
   columns: [
		{ text: "NIS", datafield: "nis",width: "200px",editable:false},
		{ text: "Nama", datafield: "nama",width: "200px",editable:false}
    ]
});
jqwidgetsGrading.on('rowselect', function (event) {
	var row  = event.args.row;
	dataUjian = row;
	jqwidgetsBobot.jqxGrid("source")._source.data.idujian=dataUjian.replid;
	jqwidgetsBobot.jqxGrid("source")._source.data.idkelas=dataGuruMengajar.idkelas;
	jqwidgetsBobot.jqxGrid('updatebounddata');
});

