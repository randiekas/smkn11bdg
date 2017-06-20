jqwidgetsBobot = $("#jqwidgetsBobot");
jqwidgetsBobotDataFields = [
	{ "name": "nis"},
	{ "name": "nama"},
	{ "name": "replid"},
	{ "name": "nilaiujian"},
	{ "name": "keterangan"}
];
var updateAction = function (rowid, rowdata, commit) {
                 // synchronize with the server - send update command
                 jqwidgetsBobot.jqxGrid('showloadelement');
					rowdata.idujian = dataUjian.replid;
                 $.ajax({
                     dataType: 'json',
                     url: current_url()+"/updateNilai/",
                     data: rowdata,
                     type:'post',
                     success: function (data, status, xhr) {
                         // update command is executed.
						 if(data.status=="success")
						 {
							 Notification.open(Notification.textSuccessUpdate(),"success");
							 jqwidgetsBobot.jqxGrid('hideloadelement');
							 console.log(rowdata);
							 if(rowdata.replid==null)
							 {
								 jqwidgetsBobot.jqxGrid('updatebounddata');
							 }else{
								 commit(true);
							 }
							 
						 }
						 else{
							 Notification.open(data.message,"error");
							 jqwidgetsBobot.jqxGrid('hideloadelement');
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
	  datafields: jqwidgetsBobotDataFields,
	  updaterow: updateAction,
	  id:"replid",
	url: current_url()+"/getNilai/",
	data: {idujian:'',idkelas:''},
	type:'post',
	id:'replid'
  }
  var adapter = new $.jqx.dataAdapter(dataSource);
  // update data source.
   
jqwidgetsBobot.jqxGrid(
{
  theme:themeWidget,
    source: adapter,
   width : "99.80%",
   height : $( window ).height()-45,
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
   editmode:'singleclick',
   groupable: false,
   showtoolbar:false,
   
     columns: [
		{ text: "NIS", datafield: "nis",width: "20%",editable:false},
		{ text: "Nama", datafield: "nama",width: "30%" ,editable:false},
		{ text: "Nilai", datafield: "nilaiujian",width: "10%" },
		{ text: "Keterangan", datafield: "keterangan",width: "40%" }
	]
});