jqwidgetsKesejahteraan = $("#jqwidgetsKesejahteraan");
jqwidgetsKesejahteraanDataFields = [
	{ "name": "replid"},
	{ "name": "nip"},
	{ "name": "jeniskesejahteraan"},
	{ "name": "nama"},
	{ "name": "penyelenggara"},
	{ "name": "dari"},
	{ "name": "sampai"},
	{ "name": "status"}
];
var dataSource = {
              datafields: jqwidgetsKesejahteraanDataFields,
			  datatype: "json",
			  url:current_url()+'/getKesejahteraan',
			  type:'post',
			  data:{nip:''},
			  updaterow: function (rowid, rowdata, commit) {
                           // synchronize with the server - send update command
                           elementJqxGridReligion.jqxGrid('showloadelement');
                           $.ajax({
                               dataType: 'json',
                               url: current_url()+"/saveKesejahteraan",
                               data: rowdata,
                               type:'post',
                               success: function (data, status, xhr) {
                                   // update command is executed.
                                   if(data.status=="success")
									 {
										 Notification.open(Notification.textSuccessUpdate(),"success");
										 jqwidgetsKesejahteraan.jqxGrid('hideloadelement');
										 
									}
									 else{
											Notification.open(data.message,"error");
											jqwidgetsKesejahteraan.jqxGrid('hideloadelement');
											jqwidgetsKesejahteraan.jqxGrid('updatebounddata');
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
                                url: current_url()+"/saveKesejahteraan",
                                data: rowdata,
                                type:'post',
                                success: function (data, status, xhr) {
									if(data.status=="success")
									 {
										jqwidgetsKesejahteraan.jqxGrid({showeverpresentrow: false});
										jqwidgetsKesejahteraan.jqxGrid('updatebounddata');
										Notification.open(Notification.textSuccessCreate(),"success");
									}
									 else{
											Notification.open(data.message,"error");
											jqwidgetsKesejahteraan.jqxGrid('hideloadelement');
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
                              url: current_url()+"/deleteKesejahteraan",
                              data: {id:id},
                              type:'post',
                              success: function (data, status, xhr) {
                                  // update command is executed.
                                  //commit(true);
								  if(data.status=="success")
									 {
										 Notification.open(Notification.textSuccessDelete(),"success");
										jqwidgetsKesejahteraan.jqxGrid('updatebounddata');
									}
									 else{
											Notification.open(data.message,"error");
											jqwidgetsKesejahteraan.jqxGrid('hideloadelement');
									 }
                                  
                              },
                              error: function (data,status) {
                                  Notification.open(Notification.textFailedDelete(),"error");
                              }
                          });


                       },
          }
          var adapter = new $.jqx.dataAdapter(dataSource);
        
        
jqwidgetsKesejahteraan.jqxGrid(
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
                    container.append('<input id="addKesejahteraan" type="button" value="Tambah" />');
                    container.append('<input style="margin-left: 5px;" id="deleteKesejahteraan" type="button" value="Hapus" />');
						var c= {};
						if(elementJqxGridReligion.jqxGrid('getselectedrowindex')==-1)
						{
							c= {disabled:true};
						}
						$("#addKesejahteraan").jqxButton(c);
						$("#deleteKesejahteraan").jqxButton(c);
						// create new row.
						$("#addKesejahteraan").on('click', function () {
							jqwidgetsKesejahteraan.jqxGrid({showeverpresentrow: true});
						});
						// delete row.
						$("#deleteKesejahteraan").on('click', function () {
							var selectedrowindex = jqwidgetsKesejahteraan.jqxGrid('getselectedrowindex');
							  var rowscount = jqwidgetsKesejahteraan.jqxGrid('getdatainformation').rowscount;
							  if (selectedrowindex >= 0 && selectedrowindex < rowscount) {
								  var id = jqwidgetsKesejahteraan.jqxGrid('getrowdata', selectedrowindex).replid;
								  var commit = jqwidgetsKesejahteraan.jqxGrid('deleterow', id);
							  }
						});
    },
     columns: [
	 { text: "Judul Kesejahteraan", datafield: "jeniskesejahteraan",width: "20%" },
	 { text: "Nama", datafield: "nama",width: "25%" },
	 { text: "Penyelenggara", datafield: "penyelenggara",width: "20%" },
	 { text: "Dari Tahun", datafield: "dari",width: "10%" },
	 { text: "Sampai Tahun", datafield: "sampai",width: "10%" },
	 { text: "Status", datafield: "status",width: "15%" }
    ]
});
$("#addKesejahteraan").click(function(){
  jqwidgetsKesejahteraan.jqxGrid({showeverpresentrow: true});
});
$("#deleteKesejahteraan").click(function(){
  var selectedrowindex = jqwidgetsKesejahteraan.jqxGrid('getselectedrowindex');
  var rowscount = jqwidgetsKesejahteraan.jqxGrid('getdatainformation').rowscount;
  if (selectedrowindex >= 0 && selectedrowindex < rowscount) {
      var id = jqwidgetsKesejahteraan.jqxGrid('getrowdata', selectedrowindex).id;
      var commit = jqwidgetsKesejahteraan.jqxGrid('deleterow', id);
  }
});