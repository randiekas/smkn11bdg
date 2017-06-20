jqwidgetsPengembangan = $("#jqwidgetsPengembangan");
jqwidgetsPengembanganDataFields = [
  { "name": "id"},
  { "name": "nip"},
  { "name": "nama_pelatihan"},
  { "name": "kd_bdilmu"},
  { "name": "periode_mulai"},
  { "name": "periode_selesai"},
  { "name": "tempat"},
  { "name": "sponsor"},
  { "name": "negara"},
  { "name": "sertifikat"}
];
jqwidgetsPengembangan.jqxGrid(
{
  theme:themeWidget,
   width : "100%",
   height : $( window ).height()-170,
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
                    container.append('<input id="addPengembangan" type="button" value="Tambah" />');
                    container.append('<input style="margin-left: 5px;" id="deletePengembangan" type="button" value="Hapus" />');
						$("#addPengembangan").jqxButton();
						$("#deletePengembangan").jqxButton();
						// create new row.
						$("#addPengembangan").on('click', function () {
							jqwidgetsPengembangan.jqxGrid({showeverpresentrow: true});
						});
						// delete row.
						$("#deletePengembangan").on('click', function () {
							var selectedrowindex = jqwidgetsPengembangan.jqxGrid('getselectedrowindex');
							  var rowscount = jqwidgetsPengembangan.jqxGrid('getdatainformation').rowscount;
							  if (selectedrowindex >= 0 && selectedrowindex < rowscount) {
								  var id = jqwidgetsPengembangan.jqxGrid('getrowdata', selectedrowindex).id;
								  var commit = jqwidgetsPengembangan.jqxGrid('deleterow', id);
							  }
						});
    },
     columns: [
       { text: "Nama Pelatihan", datafield: "nama_pelatihan",width: "15%" },
      { text: "Bidang Ilmu", datafield: "kd_bdilmu",width: "15%" },
      { text: "Mulai", datafield: "periode_mulai",width: "10%",
        columntype:"datetimeinput",
        createeditor: function (row, column, editor) {
            editor.jqxDateTimeInput({formatString: 'yyyy-MM-dd', showCalendarButton: true});
        },
        geteditorvalue:function (row, cellValue, editor) {
            return editor.jqxDateTimeInput("val");
        },
        createEverPresentRowWidget: function (datafield, htmlElement, popup, addCallback) {
            var inputTag = $("<div style='border: none;'></div>").appendTo(htmlElement);
            inputTag.jqxDateTimeInput({ width: '100%', formatString: 'yyyy-MM-dd', showCalendarButton: true});
            return inputTag;
        },
        getEverPresentRowWidgetValue: function (datafield, htmlElement, validate) {
            return htmlElement.jqxDateTimeInput("val");
        }
      },
      { text: "Selesai", datafield: "periode_selesai",width: "10%",
        columntype:"datetimeinput",
        createeditor: function (row, column, editor) {
            editor.jqxDateTimeInput({formatString: 'yyyy-MM-dd', showCalendarButton: true});
        },
        geteditorvalue:function (row, cellValue, editor) {
            return editor.jqxDateTimeInput("val");
        },
        createEverPresentRowWidget: function (datafield, htmlElement, popup, addCallback) {
            var inputTag = $("<div style='border: none;'></div>").appendTo(htmlElement);
            inputTag.jqxDateTimeInput({ width: '100%', formatString: 'yyyy-MM-dd', showCalendarButton: true});
            return inputTag;
        },
        getEverPresentRowWidgetValue: function (datafield, htmlElement, validate) {
            return htmlElement.jqxDateTimeInput("val");
        }
      },
      { text: "Tempat Pelatihan", datafield: "tempat",width: "20%" },
      { text: "Sponsor", datafield: "sponsor",width: "15%" },
      { text: "Negara", datafield: "negara",width: "15%" }
    ]
});

function reloadPengembangan(row)
{
	jqwidgetsPengembangan.jqxGrid({showeverpresentrow: false});
  $.ajax({
    dataType: 'json',
    url: current_url()+"/getPengembangan/",
    data: {nip:row.nip},
    type:'post',
    success: function (result, status, xhr) {
          var records = new Array();
          records = result;
          var dataSource = {
              datafields: jqwidgetsPengembanganDataFields,
              localdata: records,
              updaterow: function (rowid, rowdata, commit) {
                           // synchronize with the server - send update command
                           jqwidgetsPengembangan.jqxGrid('showloadelement');
                           $.ajax({
                               dataType: 'json',
                               url: current_url()+"/savePengembangan",
                               data: rowdata,
                               type:'post',
                               success: function (data, status, xhr) {
                                   // update command is executed.
                                   if(data.status=="success")
									 {
										 Notification.open(Notification.textSuccessUpdate(),"success");
										 jqwidgetsPengembangan.jqxGrid('hideloadelement');
										 
									}
									 else{
											Notification.open(data.message,"error");
											jqwidgetsPengembangan.jqxGrid('hideloadelement');
											jqwidgetsPengembangan.jqxGrid('updatebounddata');
									 }

                               },
                               error: function (data,status) {
                                   Notification.open(Notification.textFailedUpdate(),"error");

                               }
                           });
                       },
              addrow: function (rowid, rowdata, commit) {
                            rowdata.nip = row.nip;
                            $.ajax({
                                dataType: 'json',
                                url: current_url()+"/savePengembangan",
                                data: rowdata,
                                type:'post',
                                success: function (data, status, xhr) {
									if(data.status=="success")
									 {
											reloadPengembangan(row);
											Notification.open(Notification.textSuccessCreate(),"success");
									}
									 else{
											Notification.open(data.message,"error");
											jqwidgetsPengembangan.jqxGrid('hideloadelement');
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
                              url: current_url()+"/deletePengembangan",
                              data: {id:id},
                              type:'post',
                              success: function (data, status, xhr) {
                                  // update command is executed.
                                  //commit(true);
                                  if(data.status=="success")
									 {
										 Notification.open(Notification.textSuccessDelete(),"success");
										reloadPengembangan(row);
									}
									 else{
											Notification.open(data.message,"error");
											jqwidgetsPengembangan.jqxGrid('hideloadelement');
									 }
                              },
                              error: function (data,status) {
                                  Notification.open(Notification.textFailedDelete(),"error");
                              }
                          });


                       },
          }
          var adapter = new $.jqx.dataAdapter(dataSource);
          // update data source.
          jqwidgetsPengembangan.jqxGrid({ source: adapter });

          $(".buttonPengembangan button").removeAttr("disabled");
    },
    error: function (data,status) {
      //console.log(items);
      Notification.open(Notification.textFailedCreate(),"error");
      //commit(false);
    }
  });
}
