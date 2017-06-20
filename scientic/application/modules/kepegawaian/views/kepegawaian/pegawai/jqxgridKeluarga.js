jqwidgetsKeluarga = $("#jqwidgetsKeluarga");
jqwidgetsKeluargaDataFields = [
{ "name": "replid"},
{ "name": "nip"},
{ "name": "status"},
{ "name": "jenjang"},
{ "name": "nama"},
{ "name": "nisn"},
{ "name": "jk"},
{ "name": "tempatlahir"},
{ "name": "tanggallahir"},
{ "name": "ts"},
{ "name": "token"},
{ "name": "issync"},
];
var dataSource = {
              datafields: jqwidgetsKeluargaDataFields,
			  datatype: "json",
			  url:current_url()+'/getKeluarga',
			  type:'post',
			  data:{nip:''},
			  updaterow: function (rowid, rowdata, commit) {
                           // synchronize with the server - send update command
                           elementJqxGridReligion.jqxGrid('showloadelement');
                           $.ajax({
                               dataType: 'json',
                               url: current_url()+"/saveKeluarga",
                               data: rowdata,
                               type:'post',
                               success: function (data, status, xhr) {
                                   // update command is executed.
                                   if(data.status=="success")
									 {
										 Notification.open(Notification.textSuccessUpdate(),"success");
										 jqwidgetsKeluarga.jqxGrid('hideloadelement');
										 
									}
									 else{
											Notification.open(data.message,"error");
											jqwidgetsKeluarga.jqxGrid('hideloadelement');
											jqwidgetsKeluarga.jqxGrid('updatebounddata');
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
                                url: current_url()+"/saveKeluarga",
                                data: rowdata,
                                type:'post',
                                success: function (data, status, xhr) {
									if(data.status=="success")
									 {
										jqwidgetsKeluarga.jqxGrid({showeverpresentrow: false});
										jqwidgetsKeluarga.jqxGrid('updatebounddata');
										Notification.open(Notification.textSuccessCreate(),"success");
									}
									 else{
											Notification.open(data.message,"error");
											jqwidgetsKeluarga.jqxGrid('hideloadelement');
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
                              url: current_url()+"/deleteKeluarga",
                              data: {id:id},
                              type:'post',
                              success: function (data, status, xhr) {
                                  // update command is executed.
                                  //commit(true);
								  if(data.status=="success")
									 {
										 Notification.open(Notification.textSuccessDelete(),"success");
										jqwidgetsKeluarga.jqxGrid('updatebounddata');
									}
									 else{
											Notification.open(data.message,"error");
											jqwidgetsKeluarga.jqxGrid('hideloadelement');
									 }
                                  
                              },
                              error: function (data,status) {
                                  Notification.open(Notification.textFailedDelete(),"error");
                              }
                          });


                       },
          }
          var adapter = new $.jqx.dataAdapter(dataSource);
        
        
jqwidgetsKeluarga.jqxGrid(
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
                    container.append('<input id="addKeluarga" type="button" value="Tambah" />');
                    container.append('<input style="margin-left: 5px;" id="deleteKeluarga" type="button" value="Hapus" />');
						var c= {};
						if(elementJqxGridReligion.jqxGrid('getselectedrowindex')==-1)
						{
							c= {disabled:true};
						}
						$("#addKeluarga").jqxButton(c);
						$("#deleteKeluarga").jqxButton(c);
						// create new row.
						$("#addKeluarga").on('click', function () {
							jqwidgetsKeluarga.jqxGrid({showeverpresentrow: true});
						});
						// delete row.
						$("#deleteKeluarga").on('click', function () {
							var selectedrowindex = jqwidgetsKeluarga.jqxGrid('getselectedrowindex');
							  var rowscount = jqwidgetsKeluarga.jqxGrid('getdatainformation').rowscount;
							  if (selectedrowindex >= 0 && selectedrowindex < rowscount) {
								  var id = jqwidgetsKeluarga.jqxGrid('getrowdata', selectedrowindex).replid;
								  var commit = jqwidgetsKeluarga.jqxGrid('deleterow', id);
							  }
						});
    },
     columns: [
	 { text: "Status", datafield: "status",width: "15%",
		columntype: 'dropdownlist',
		createeditor: function (row, column, editor) {
			// assign a new data source to the dropdownlist.
			var source =
			{
				datatype: "json",
				localdata: <?=$status = getDataField("referensi","ref_kode","ref_nama","ref_grup","76")?>,
				datafields: [
					{ name: 'value' },
					{ name: 'label' }
				],
			};
			var dataAdapter = new $.jqx.dataAdapter(source);
			// Create a jqxDropDownList
			editor.jqxDropDownList({source: dataAdapter, displayMember: "label", valueMember: "value"});
		},
		createEverPresentRowWidget: function (datafield, htmlElement, popup, addCallback) {
              var inputTag = $("<div style='border: none;'></div>").appendTo(htmlElement);
              var source =
              {
                  datatype: "json",
                  localdata: <?=$status?>,
                  datafields: [
                      { name: 'value' },
                      { name: 'label' }
                  ],
              };
              var dataAdapter = new $.jqx.dataAdapter(source);

              // Create a jqxDropDownList
              inputTag.jqxDropDownList({source: dataAdapter, displayMember: "label", valueMember: "value",width: '100%'});
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

                                var value = selectedItem.value;
                                return value;
                            },
          resetEverPresentRowWidgetValue: function (datafield, htmlElement) {
              htmlElement.jqxDropDownList('clearSelection');
          },
		   initeditor:function (row, cellValue, editor, cellText, width, height) {
			editor.jqxDropDownList('selectItem', cellValue);
		},
		  cellsrenderer: function (row, columnfield, value, defaulthtml, columnproperties) {
            var items = <?=$status?>;
            var newValue = new Array();
            $.each(items,function(e,v){
                newValue[v.value]='<span style="margin: 4px; float: ' + columnproperties.cellsalign + ';">'+v.label+"</span>";
            });
            return newValue[value];
        },
		geteditorvalue: function (row, cellvalue, editor) {
			// return the editor's value.
			return editor.jqxDropDownList('getSelectedItem').value;
		}
	 },
	 { text: "Jenjang", datafield: "jenjang",width: "15%",
		columntype: 'dropdownlist',
		createeditor: function (row, column, editor) {
			// assign a new data source to the dropdownlist.
			var source =
			{
				datatype: "json",
				localdata: <?=$jenjang = getDataField("referensi","ref_kode","ref_nama","ref_grup","92")?>,
				datafields: [
					{ name: 'value' },
					{ name: 'label' }
				],
			};
			var dataAdapter = new $.jqx.dataAdapter(source);
			// Create a jqxDropDownList
			editor.jqxDropDownList({source: dataAdapter, displayMember: "label", valueMember: "value"});
		},
		createEverPresentRowWidget: function (datafield, htmlElement, popup, addCallback) {
              var inputTag = $("<div style='border: none;'></div>").appendTo(htmlElement);
              var source =
              {
                  datatype: "json",
                  localdata: <?=$jenjang?>,
                  datafields: [
                      { name: 'value' },
                      { name: 'label' }
                  ],
              };
              var dataAdapter = new $.jqx.dataAdapter(source);

              // Create a jqxDropDownList
              inputTag.jqxDropDownList({source: dataAdapter, displayMember: "label", valueMember: "value",width: '100%'});
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

                                var value = selectedItem.value;
                                return value;
                            },
          resetEverPresentRowWidgetValue: function (datafield, htmlElement) {
              htmlElement.jqxDropDownList('clearSelection');
          },
		   initeditor:function (row, cellValue, editor, cellText, width, height) {
			editor.jqxDropDownList('selectItem', cellValue);
		},
		  cellsrenderer: function (row, columnfield, value, defaulthtml, columnproperties) {
            var items = <?=$jenjang?>;
            var newValue = new Array();
            $.each(items,function(e,v){
                newValue[v.value]='<span style="margin: 4px; float: ' + columnproperties.cellsalign + ';">'+v.label+"</span>";
            });
            return newValue[value];
        },
		geteditorvalue: function (row, cellvalue, editor) {
			// return the editor's value.
			return editor.jqxDropDownList('getSelectedItem').value;
		}
	 },
	 { text: "NISN", datafield: "nisn",width: "15%" },
	 { text: "Nama", datafield: "nama",width: "15%" },
	 { text: "L/P", datafield: "jk",width: "5%" },
	 { text: "Tempat Lahir", datafield: "tempatlahir",width: "15%" },
	 { text: "Tanggal Lahir", datafield: "tanggallahir",width: "10%",
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
	  { text: "Thn Masuk", datafield: "tahunmasuk",width: "10%" },
    ]
});
$("#addKeluarga").click(function(){
  jqwidgetsKeluarga.jqxGrid({showeverpresentrow: true});
});
$("#deleteKeluarga").click(function(){
  var selectedrowindex = jqwidgetsKeluarga.jqxGrid('getselectedrowindex');
  var rowscount = jqwidgetsKeluarga.jqxGrid('getdatainformation').rowscount;
  if (selectedrowindex >= 0 && selectedrowindex < rowscount) {
      var id = jqwidgetsKeluarga.jqxGrid('getrowdata', selectedrowindex).id;
      var commit = jqwidgetsKeluarga.jqxGrid('deleterow', id);
  }
});