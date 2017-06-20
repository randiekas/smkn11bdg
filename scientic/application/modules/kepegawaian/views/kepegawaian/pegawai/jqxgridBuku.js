jqwidgetsBuku = $("#jqwidgetsBuku");
jqwidgetsBukuDataFields = [
	{ "name": "replid"},
	{ "name": "nip"},
	{ "name": "judulbuku"},
	{ "name": "tahun"},
	{ "name": "penerbit"}
];
var dataSource = {
              datafields: jqwidgetsBukuDataFields,
			  datatype: "json",
			  url:current_url()+'/getBuku',
			  type:'post',
			  data:{nip:''},
			  updaterow: function (rowid, rowdata, commit) {
                           // synchronize with the server - send update command
                           elementJqxGridReligion.jqxGrid('showloadelement');
                           $.ajax({
                               dataType: 'json',
                               url: current_url()+"/saveBuku",
                               data: rowdata,
                               type:'post',
                               success: function (data, status, xhr) {
                                   // update command is executed.
                                   if(data.status=="success")
									 {
										 Notification.open(Notification.textSuccessUpdate(),"success");
										 jqwidgetsBuku.jqxGrid('hideloadelement');
										 
									}
									 else{
											Notification.open(data.message,"error");
											jqwidgetsBuku.jqxGrid('hideloadelement');
											jqwidgetsBuku.jqxGrid('updatebounddata');
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
                                url: current_url()+"/saveBuku",
                                data: rowdata,
                                type:'post',
                                success: function (data, status, xhr) {
									if(data.status=="success")
									 {
										jqwidgetsBuku.jqxGrid({showeverpresentrow: false});
										jqwidgetsBuku.jqxGrid('updatebounddata');
										Notification.open(Notification.textSuccessCreate(),"success");
									}
									 else{
											Notification.open(data.message,"error");
											jqwidgetsBuku.jqxGrid('hideloadelement');
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
                              url: current_url()+"/deleteBuku",
                              data: {id:id},
                              type:'post',
                              success: function (data, status, xhr) {
                                  // update command is executed.
                                  //commit(true);
								  if(data.status=="success")
									 {
										 Notification.open(Notification.textSuccessDelete(),"success");
										jqwidgetsBuku.jqxGrid('updatebounddata');
									}
									 else{
											Notification.open(data.message,"error");
											jqwidgetsBuku.jqxGrid('hideloadelement');
									 }
                                  
                              },
                              error: function (data,status) {
                                  Notification.open(Notification.textFailedDelete(),"error");
                              }
                          });


                       },
          }
          var adapter = new $.jqx.dataAdapter(dataSource);
        
        
jqwidgetsBuku.jqxGrid(
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
                    container.append('<input id="addBuku" type="button" value="Tambah" />');
                    container.append('<input style="margin-left: 5px;" id="deleteBuku" type="button" value="Hapus" />');
						var c= {};
						if(elementJqxGridReligion.jqxGrid('getselectedrowindex')==-1)
						{
							c= {disabled:true};
						}
						$("#addBuku").jqxButton(c);
						$("#deleteBuku").jqxButton(c);
						// create new row.
						$("#addBuku").on('click', function () {
							jqwidgetsBuku.jqxGrid({showeverpresentrow: true});
						});
						// delete row.
						$("#deleteBuku").on('click', function () {
							var selectedrowindex = jqwidgetsBuku.jqxGrid('getselectedrowindex');
							  var rowscount = jqwidgetsBuku.jqxGrid('getdatainformation').rowscount;
							  if (selectedrowindex >= 0 && selectedrowindex < rowscount) {
								  var id = jqwidgetsBuku.jqxGrid('getrowdata', selectedrowindex).replid;
								  var commit = jqwidgetsBuku.jqxGrid('deleterow', id);
							  }
						});
    },
     columns: [
	 { text: "Judul Buku", datafield: "judulbuku",width: "50%" },
	 { text: "Tahun Terbit", datafield: "tahun",width: "15%" },
	 { text: "Penerbit", datafield: "penerbit",width: "35%" }
    ]
});
$("#addBuku").click(function(){
  jqwidgetsBuku.jqxGrid({showeverpresentrow: true});
});
$("#deleteBuku").click(function(){
  var selectedrowindex = jqwidgetsBuku.jqxGrid('getselectedrowindex');
  var rowscount = jqwidgetsBuku.jqxGrid('getdatainformation').rowscount;
  if (selectedrowindex >= 0 && selectedrowindex < rowscount) {
      var id = jqwidgetsBuku.jqxGrid('getrowdata', selectedrowindex).id;
      var commit = jqwidgetsBuku.jqxGrid('deleterow', id);
  }
});