jqwidgetsGaji = $("#jqwidgetsGaji");
jqwidgetsGajiDataFields = [
	{ "name": "replid"},
	{ "name": "nip"},
	{ "name": "pangkatgolongan"},
	{ "name": "nosk"},
	{ "name": "tanggalsk"},
	{ "name": "tmtkgb"},
	{ "name": "masakerjatahun"},
	{ "name": "masakerjabulan"},
	{ "name": "gajipokok"}
];
var dataSource = {
              datafields: jqwidgetsGajiDataFields,
			  datatype: "json",
			  url:current_url()+'/getGaji',
			  type:'post',
			  data:{nip:''},
			  updaterow: function (rowid, rowdata, commit) {
                           // synchronize with the server - send update command
                           elementJqxGridReligion.jqxGrid('showloadelement');
                           $.ajax({
                               dataType: 'json',
                               url: current_url()+"/saveGaji",
                               data: rowdata,
                               type:'post',
                               success: function (data, status, xhr) {
                                   // update command is executed.
                                   if(data.status=="success")
									 {
										 Notification.open(Notification.textSuccessUpdate(),"success");
										 jqwidgetsGaji.jqxGrid('hideloadelement');
										 
									}
									 else{
											Notification.open(data.message,"error");
											jqwidgetsGaji.jqxGrid('hideloadelement');
											jqwidgetsGaji.jqxGrid('updatebounddata');
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
                                url: current_url()+"/saveGaji",
                                data: rowdata,
                                type:'post',
                                success: function (data, status, xhr) {
									if(data.status=="success")
									 {
										jqwidgetsGaji.jqxGrid({showeverpresentrow: false});
										jqwidgetsGaji.jqxGrid('updatebounddata');
										Notification.open(Notification.textSuccessCreate(),"success");
									}
									 else{
											Notification.open(data.message,"error");
											jqwidgetsGaji.jqxGrid('hideloadelement');
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
                              url: current_url()+"/deleteGaji",
                              data: {id:id},
                              type:'post',
                              success: function (data, status, xhr) {
                                  // update command is executed.
                                  //commit(true);
								  if(data.status=="success")
									 {
										 Notification.open(Notification.textSuccessDelete(),"success");
										jqwidgetsGaji.jqxGrid('updatebounddata');
									}
									 else{
											Notification.open(data.message,"error");
											jqwidgetsGaji.jqxGrid('hideloadelement');
									 }
                                  
                              },
                              error: function (data,status) {
                                  Notification.open(Notification.textFailedDelete(),"error");
                              }
                          });


                       },
          }
          var adapter = new $.jqx.dataAdapter(dataSource);
        
        
jqwidgetsGaji.jqxGrid(
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
                    container.append('<input id="addGaji" type="button" value="Tambah" />');
                    container.append('<input style="margin-left: 5px;" id="deleteGaji" type="button" value="Hapus" />');
						var c= {};
						if(elementJqxGridReligion.jqxGrid('getselectedrowindex')==-1)
						{
							c= {disabled:true};
						}
						$("#addGaji").jqxButton(c);
						$("#deleteGaji").jqxButton(c);
						// create new row.
						$("#addGaji").on('click', function () {
							jqwidgetsGaji.jqxGrid({showeverpresentrow: true});
						});
						// delete row.
						$("#deleteGaji").on('click', function () {
							var selectedrowindex = jqwidgetsGaji.jqxGrid('getselectedrowindex');
							  var rowscount = jqwidgetsGaji.jqxGrid('getdatainformation').rowscount;
							  if (selectedrowindex >= 0 && selectedrowindex < rowscount) {
								  var id = jqwidgetsGaji.jqxGrid('getrowdata', selectedrowindex).replid;
								  var commit = jqwidgetsGaji.jqxGrid('deleterow', id);
							  }
						});
    },
     columns: [
      { text: "Pangkat Golongan", datafield: "pangkatgolongan",width: "15%",
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
	  { text: "No SK", datafield: "nosk",width: "25%" },
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
	  { text: "TMT KGB", datafield: "tmtkgb",width: "10%",
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
      { text: "Masa Kerja Tahun", datafield: "masakerjatahun",width: "10%" },
      { text: "Masa Kerja Bulan", datafield: "masakerjabulan",width: "10%" },
	  { text: "Gaji Pokok", datafield: "gajipokok",width: "20%"}
    ]
});
$("#addGaji").click(function(){
  jqwidgetsGaji.jqxGrid({showeverpresentrow: true});
});
$("#deleteGaji").click(function(){
  var selectedrowindex = jqwidgetsGaji.jqxGrid('getselectedrowindex');
  var rowscount = jqwidgetsGaji.jqxGrid('getdatainformation').rowscount;
  if (selectedrowindex >= 0 && selectedrowindex < rowscount) {
      var id = jqwidgetsGaji.jqxGrid('getrowdata', selectedrowindex).id;
      var commit = jqwidgetsGaji.jqxGrid('deleterow', id);
  }
});