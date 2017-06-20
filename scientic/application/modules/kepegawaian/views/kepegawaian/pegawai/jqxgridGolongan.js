jqwidgetsGolongan = $("#jqwidgetsGolongan");
jqwidgetsGolonganDataFields = [
{ "name": "replid"},
{ "name": "nip"},
{ "name": "golongan"},
{ "name": "sk"},
{ "name": "tanggalsk"},
{ "name": "tmt"},
{ "name": "masakerjatahun"},
{ "name": "masakerjabulan"}
];
var dataSource = {
              datafields: jqwidgetsGolonganDataFields,
			  datatype: "json",
			  url:current_url()+'/getGolongan',
			  type:'post',
			  data:{nip:''},
			  updaterow: function (rowid, rowdata, commit) {
                           // synchronize with the server - send update command
                           elementJqxGridReligion.jqxGrid('showloadelement');
                           $.ajax({
                               dataType: 'json',
                               url: current_url()+"/saveGolongan",
                               data: rowdata,
                               type:'post',
                               success: function (data, status, xhr) {
                                   // update command is executed.
                                   if(data.status=="success")
									 {
										 Notification.open(Notification.textSuccessUpdate(),"success");
										 jqwidgetsGolongan.jqxGrid('hideloadelement');
										 
									}
									 else{
											Notification.open(data.message,"error");
											jqwidgetsGolongan.jqxGrid('hideloadelement');
											jqwidgetsGolongan.jqxGrid('updatebounddata');
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
                                url: current_url()+"/saveGolongan",
                                data: rowdata,
                                type:'post',
                                success: function (data, status, xhr) {
									if(data.status=="success")
									 {
										jqwidgetsGolongan.jqxGrid({showeverpresentrow: false});
										jqwidgetsGolongan.jqxGrid('updatebounddata');
										Notification.open(Notification.textSuccessCreate(),"success");
									}
									 else{
											Notification.open(data.message,"error");
											jqwidgetsGolongan.jqxGrid('hideloadelement');
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
                              url: current_url()+"/deleteGolongan",
                              data: {id:id},
                              type:'post',
                              success: function (data, status, xhr) {
                                  // update command is executed.
                                  //commit(true);
								  if(data.status=="success")
									 {
										 Notification.open(Notification.textSuccessDelete(),"success");
										jqwidgetsGolongan.jqxGrid('updatebounddata');
									}
									 else{
											Notification.open(data.message,"error");
											jqwidgetsGolongan.jqxGrid('hideloadelement');
									 }
                                  
                              },
                              error: function (data,status) {
                                  Notification.open(Notification.textFailedDelete(),"error");
                              }
                          });


                       },
          }
          var adapter = new $.jqx.dataAdapter(dataSource);
        
        
jqwidgetsGolongan.jqxGrid(
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
                    container.append('<input id="addGolongan" type="button" value="Tambah" />');
                    container.append('<input style="margin-left: 5px;" id="deleteGolongan" type="button" value="Hapus" />');
						var c= {};
						if(elementJqxGridReligion.jqxGrid('getselectedrowindex')==-1)
						{
							c= {disabled:true};
						}
						$("#addGolongan").jqxButton(c);
						$("#deleteGolongan").jqxButton(c);
						// create new row.
						$("#addGolongan").on('click', function () {
							jqwidgetsGolongan.jqxGrid({showeverpresentrow: true});
						});
						// delete row.
						$("#deleteGolongan").on('click', function () {
							var selectedrowindex = jqwidgetsGolongan.jqxGrid('getselectedrowindex');
							  var rowscount = jqwidgetsGolongan.jqxGrid('getdatainformation').rowscount;
							  if (selectedrowindex >= 0 && selectedrowindex < rowscount) {
								  var id = jqwidgetsGolongan.jqxGrid('getrowdata', selectedrowindex).replid;
								  var commit = jqwidgetsGolongan.jqxGrid('deleterow', id);
							  }
						});
    },
     columns: [
       { text: "Pangkat Golongan", datafield: "golongan",width: "15%" ,
			columntype: 'dropdownlist',
			createeditor: function (row, column, editor) {
				// assign a new data source to the dropdownlist.
				var source =
				{
					datatype: "json",
					localdata: <?=$golongan = getDataField("golongan","golongan","golongan")?>,
					datafields: [
						{ name: 'value' },
						{ name: 'label' }
					],
				};
				var dataAdapter = new $.jqx.dataAdapter(source);
				// Create a jqxDropDownList
				editor.jqxDropDownList({autoDropDownHeight: true,source: dataAdapter, displayMember: "label", valueMember: "value"});
			},
			createEverPresentRowWidget: function (datafield, htmlElement, popup, addCallback) {
				  var inputTag = $("<div style='border: none;'></div>").appendTo(htmlElement);
				  var source =
				  {
					  datatype: "json",
					  localdata: <?=$golongan?>,
					  datafields: [
						  { name: 'value' },
						  { name: 'label' }
					  ],
				  };
				  var dataAdapter = new $.jqx.dataAdapter(source);

				  // Create a jqxDropDownList
				  inputTag.jqxDropDownList({autoDropDownHeight: true,source: dataAdapter, displayMember: "label", valueMember: "value",width: '100%'});
				  $(document).on('keydown.productname', function (event) {
					  if (event.keyCode == 13) {
						  if (event.target === inputTag[0]) {
							  addCallback();
						  }
						  else if ($(event.target).ischildof(inputTag)) {
							  addCallback();
						  }
					  }
				  });
				  return inputTag;
			  },
			  getEverPresentRowWidgetValue: function (datafield, htmlElement, validate) {
									var selectedItem = htmlElement.jqxDropDownList('getSelectedItem');
									if (!selectedItem)
										return "";

									var value = selectedItem.label;
									return value;
								},
			  resetEverPresentRowWidgetValue: function (datafield, htmlElement) {
				  htmlElement.jqxDropDownList('clearSelection');
			  }
	   },
      { text: "No SK", datafield: "sk",width: "30%" },
      { text: "Tanggal SK", datafield: "tanggalsk",width: "10%",
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
	   { text: "TMT Pangkat", datafield: "tmt",width: "15%",
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
      { text: "Masa Kerja Tahun", datafield: "masakerjatahun",width: "15%" },
	  { text: "Masa Kerja Bulan", datafield: "masakerjabulan",width: "15%" }
    ]
});
$("#addGolongan").click(function(){
  jqwidgetsGolongan.jqxGrid({showeverpresentrow: true});
});
$("#deleteGolongan").click(function(){
  var selectedrowindex = jqwidgetsGolongan.jqxGrid('getselectedrowindex');
  var rowscount = jqwidgetsGolongan.jqxGrid('getdatainformation').rowscount;
  if (selectedrowindex >= 0 && selectedrowindex < rowscount) {
      var id = jqwidgetsGolongan.jqxGrid('getrowdata', selectedrowindex).id;
      var commit = jqwidgetsGolongan.jqxGrid('deleterow', id);
  }
});