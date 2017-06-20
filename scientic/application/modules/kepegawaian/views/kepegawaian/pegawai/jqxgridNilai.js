jqwidgetsNilai = $("#jqwidgetsNilai");
jqwidgetsNilaiDataFields = [
	{ "name": "replid"},
	{ "name": "nip"},
	{ "name": "jenistes"},
	{ "name": "nama"},
	{ "name": "penyelenggaran"},
	{ "name": "tahun"},
	{ "name": "skor"}
];
var dataSource = {
              datafields: jqwidgetsNilaiDataFields,
			  datatype: "json",
			  url:current_url()+'/getNilai',
			  type:'post',
			  data:{nip:''},
			  updaterow: function (rowid, rowdata, commit) {
                           // synchronize with the server - send update command
                           elementJqxGridReligion.jqxGrid('showloadelement');
                           $.ajax({
                               dataType: 'json',
                               url: current_url()+"/saveNilai",
                               data: rowdata,
                               type:'post',
                               success: function (data, status, xhr) {
                                   // update command is executed.
                                   if(data.status=="success")
									 {
										 Notification.open(Notification.textSuccessUpdate(),"success");
										 jqwidgetsNilai.jqxGrid('hideloadelement');
										 
									}
									 else{
											Notification.open(data.message,"error");
											jqwidgetsNilai.jqxGrid('hideloadelement');
											jqwidgetsNilai.jqxGrid('updatebounddata');
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
                                url: current_url()+"/saveNilai",
                                data: rowdata,
                                type:'post',
                                success: function (data, status, xhr) {
									if(data.status=="success")
									 {
										jqwidgetsNilai.jqxGrid({showeverpresentrow: false});
										jqwidgetsNilai.jqxGrid('updatebounddata');
										Notification.open(Notification.textSuccessCreate(),"success");
									}
									 else{
											Notification.open(data.message,"error");
											jqwidgetsNilai.jqxGrid('hideloadelement');
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
                              url: current_url()+"/deleteNilai",
                              data: {id:id},
                              type:'post',
                              success: function (data, status, xhr) {
                                  // update command is executed.
                                  //commit(true);
								  if(data.status=="success")
									 {
										 Notification.open(Notification.textSuccessDelete(),"success");
										jqwidgetsNilai.jqxGrid('updatebounddata');
									}
									 else{
											Notification.open(data.message,"error");
											jqwidgetsNilai.jqxGrid('hideloadelement');
									 }
                                  
                              },
                              error: function (data,status) {
                                  Notification.open(Notification.textFailedDelete(),"error");
                              }
                          });


                       },
          }
          var adapter = new $.jqx.dataAdapter(dataSource);
        
        
jqwidgetsNilai.jqxGrid(
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
                    container.append('<input id="addNilai" type="button" value="Tambah" />');
                    container.append('<input style="margin-left: 5px;" id="deleteNilai" type="button" value="Hapus" />');
						var c= {};
						if(elementJqxGridReligion.jqxGrid('getselectedrowindex')==-1)
						{
							c= {disabled:true};
						}
						$("#addNilai").jqxButton(c);
						$("#deleteNilai").jqxButton(c);
						// create new row.
						$("#addNilai").on('click', function () {
							jqwidgetsNilai.jqxGrid({showeverpresentrow: true});
						});
						// delete row.
						$("#deleteNilai").on('click', function () {
							var selectedrowindex = jqwidgetsNilai.jqxGrid('getselectedrowindex');
							  var rowscount = jqwidgetsNilai.jqxGrid('getdatainformation').rowscount;
							  if (selectedrowindex >= 0 && selectedrowindex < rowscount) {
								  var id = jqwidgetsNilai.jqxGrid('getrowdata', selectedrowindex).replid;
								  var commit = jqwidgetsNilai.jqxGrid('deleterow', id);
							  }
						});
    },
     columns: [
		{ text: "Jenis Tes", datafield: "jenistes",width: "20%" },
		{ text: "Nama", datafield: "nama",width: "30%" },
		{ text: "Penyelenggara", datafield: "penyelenggaran",width: "25%" },
		{ text: "Tahun", datafield: "tahun",width: "10%" ,
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
		{ text: "skor", datafield: "skor",width: "15%" }
    ]
});
$("#addNilai").click(function(){
  jqwidgetsNilai.jqxGrid({showeverpresentrow: true});
});
$("#deleteNilai").click(function(){
  var selectedrowindex = jqwidgetsNilai.jqxGrid('getselectedrowindex');
  var rowscount = jqwidgetsNilai.jqxGrid('getdatainformation').rowscount;
  if (selectedrowindex >= 0 && selectedrowindex < rowscount) {
      var id = jqwidgetsNilai.jqxGrid('getrowdata', selectedrowindex).id;
      var commit = jqwidgetsNilai.jqxGrid('deleterow', id);
  }
});