jqwidgetsKaryatulis = $("#jqwidgetsKaryatulis");
jqwidgetsKaryatulisDataFields = [
	{ "name": "replid"},
	{ "name": "nip"},
	{ "name": "judul"},
	{ "name": "tahun"},
	{ "name": "publikasi"},
	{ "name": "keterangan"}
];
var dataSource = {
              datafields: jqwidgetsKaryatulisDataFields,
			  datatype: "json",
			  url:current_url()+'/getKaryatulis',
			  type:'post',
			  data:{nip:''},
			  updaterow: function (rowid, rowdata, commit) {
                           // synchronize with the server - send update command
                           elementJqxGridReligion.jqxGrid('showloadelement');
                           $.ajax({
                               dataType: 'json',
                               url: current_url()+"/saveKaryatulis",
                               data: rowdata,
                               type:'post',
                               success: function (data, status, xhr) {
                                   // update command is executed.
                                   if(data.status=="success")
									 {
										 Notification.open(Notification.textSuccessUpdate(),"success");
										 jqwidgetsKaryatulis.jqxGrid('hideloadelement');
										 
									}
									 else{
											Notification.open(data.message,"error");
											jqwidgetsKaryatulis.jqxGrid('hideloadelement');
											jqwidgetsKaryatulis.jqxGrid('updatebounddata');
									 }

                               },
                               error: function (data,status) {
                                   Notification.open(Notification.textFailedUpdate(),"error");

                               }
                           });
                       },
              addrow: function (rowid, rowdata, commit) {
                            rowdata.nip = pegawai.nip;
                            $.ajax({
                                dataType: 'json',
                                url: current_url()+"/saveKaryatulis",
                                data: rowdata,
                                type:'post',
                                success: function (data, status, xhr) {
									if(data.status=="success")
									 {
										jqwidgetsKaryatulis.jqxGrid({showeverpresentrow: false});
										jqwidgetsKaryatulis.jqxGrid('updatebounddata');
										Notification.open(Notification.textSuccessCreate(),"success");
									}
									 else{
											Notification.open(data.message,"error");
											jqwidgetsKaryatulis.jqxGrid('hideloadelement');
									 }
									

                                },
                                error: function (data,status) {
                                   Notification.open(Notification.textFailedCreate(),"error");

                                }
                            });
                       },
                       deleterow: function (id,commit) {

                           $.ajax({
                              dataType: 'json',
                              url: current_url()+"/deleteKaryatulis",
                              data: {id:id},
                              type:'post',
                              success: function (data, status, xhr) {
                                  // update command is executed.
                                  //commit(true);
								  if(data.status=="success")
									 {
										 Notification.open(Notification.textSuccessDelete(),"success");
										jqwidgetsKaryatulis.jqxGrid('updatebounddata');
									}
									 else{
											Notification.open(data.message,"error");
											jqwidgetsKaryatulis.jqxGrid('hideloadelement');
									 }
                                  
                              },
                              error: function (data,status) {
                                  Notification.open(Notification.textFailedDelete(),"error");
                              }
                          });


                       },
          }
          var adapter = new $.jqx.dataAdapter(dataSource);
        
        
jqwidgetsKaryatulis.jqxGrid(
{
  theme:themeWidget,
   width : "100%",
   height : $( window ).height()-170,
   source: adapter,
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
                    container.append('<input id="addKaryatulis" type="button" value="Tambah" />');
                    container.append('<input style="margin-left: 5px;" id="deleteKaryatulis" type="button" value="Hapus" />');
						var c= {};
						if(elementJqxGridReligion.jqxGrid('getselectedrowindex')==-1)
						{
							c= {disabled:true};
						}
						$("#addKaryatulis").jqxButton(c);
						$("#deleteKaryatulis").jqxButton(c);
						// create new row.
						$("#addKaryatulis").on('click', function () {
							jqwidgetsKaryatulis.jqxGrid({showeverpresentrow: true});
						});
						// delete row.
						$("#deleteKaryatulis").on('click', function () {
							var selectedrowindex = jqwidgetsKaryatulis.jqxGrid('getselectedrowindex');
							  var rowscount = jqwidgetsKaryatulis.jqxGrid('getdatainformation').rowscount;
							  if (selectedrowindex >= 0 && selectedrowindex < rowscount) {
								  var id = jqwidgetsKaryatulis.jqxGrid('getrowdata', selectedrowindex).replid;
								  var commit = jqwidgetsKaryatulis.jqxGrid('deleterow', id);
							  }
						});
    },
     columns: [
	 { text: "Judul", datafield: "judul",width: "35%" },
	 { text: "Tahun", datafield: "tahun",width: "15%" },
	 { text: "Publikasi", datafield: "publikasi",width: "15%" },
	 { text: "Keterangan", datafield: "keterangan",width: "35%" }
    ]
});
$("#addKaryatulis").click(function(){
  jqwidgetsKaryatulis.jqxGrid({showeverpresentrow: true});
});
$("#deleteKaryatulis").click(function(){
  var selectedrowindex = jqwidgetsKaryatulis.jqxGrid('getselectedrowindex');
  var rowscount = jqwidgetsKaryatulis.jqxGrid('getdatainformation').rowscount;
  if (selectedrowindex >= 0 && selectedrowindex < rowscount) {
      var id = jqwidgetsKaryatulis.jqxGrid('getrowdata', selectedrowindex).id;
      var commit = jqwidgetsKaryatulis.jqxGrid('deleterow', id);
  }
});