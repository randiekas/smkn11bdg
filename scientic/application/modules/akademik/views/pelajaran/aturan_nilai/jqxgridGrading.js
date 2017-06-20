jqwidgetsGrading = $("#jqwidgetsGrading");

jqwidgetsGradingDataFields = [
	{ "name": "replid"},
	{ "name": "nipguru"},
	{ "name": "idtingkat"},
	{ "name": "idpelajaran"},
	{ "name": "dasarpenilaian"},
	{ "name": "nmin"},
	{ "name": "nmax"},
	{ "name": "grade"}
];
var updateAction = function (rowid, rowdata, commit) {
                 // synchronize with the server - send update command
                 jqwidgetsGrading.jqxGrid('showloadelement');
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
var addAction = function (rowid, rowdata, commit) {
				rowdata.nipguru = dataGuruMengajar.nip;
				rowdata.idpelajaran = dataGuruMengajar.idpelajaran;
				rowdata.idtingkat = dataTingkat.replid;
				rowdata.dasarpenilaian = dataTingkat.dasarpenilaian;
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
							 jqwidgetsGrading.jqxGrid('updatebounddata', 'sort');
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
   
  var dataSource = {
	  datatype: "json",
	  datafields: jqwidgetsGradingDataFields,
	  updaterow: updateAction,
	  addrow:addAction,
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
		deleterow = deleterow+currItem.nmin+'-'+currItem.nmax+'('+currItem.grade+')';
		x++;
      });
	 
     var str = "{replid:rows}";
     var json = JSON.stringify(eval("(" + str + ")"));
     post = JSON.parse(json);
	 confirm = function(){
		$.ajax({
			 dataType: 'json',
			 url: current_url()+"/destroy",
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
	url: current_url()+"/getGrading/",
	data: {nip:'',idtingkat:'',idpelajaran:'',dasarpenilaian:''},
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
   height :'100%',
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
   showtoolbar:true,
   rendertoolbar: function (toolbar) {
                    var me = this;
                    var container = $("<div style='margin: 5px;'>Grading</div>");
                    toolbar.append(container);
                    container.append('<div style="float:right"><input id="addGrading" type="button" value="Tambah" /><input style="margin-left: 5px;" id="deleteGrading" type="button" value="Hapus" /></div>');
                    
						var c= {};
						if(jqwidgetsTingkat.jqxGrid('getselectedrowindex')==-1)
						{
							c= {disabled:true};
						}
						$("#addGrading").jqxButton(c);
						$("#deleteGrading").jqxButton(c);
						// create new row.
						$("#addGrading").on('click', function () {
							jqwidgetsGrading.jqxGrid({showeverpresentrow: true});
						});
						// delete row.
						$("#deleteGrading").on('click', function () {
							rowsSelected = jqwidgetsGrading.jqxGrid('getselectedrowindexes');
								if (rowsSelected.length>=1) {
									var commit = jqwidgetsGrading.jqxGrid('deleterow');
								}
						});
    },
     columns: [
	{ text: "Nilai Minimum", datafield: "nmin",width: "30%" },
	{ text: "Nilai Maximum", datafield: "nmax",width: "30%" },
	{ text: "Grade", datafield: "grade",width: "40%" }
    ]
});
jqwidgetsGrading.on('rowselect', function (event) {
  $("#deleteGrading").jqxButton({disabled:false});
});