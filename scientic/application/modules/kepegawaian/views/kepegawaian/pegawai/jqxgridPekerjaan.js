jqwidgetsPekerjaan = $("#jqwidgetsPekerjaan");
jqwidgetsPekerjaanDataFields = [
{ "name": "replid"},
{ "name": "nip"},
{ "name": "jabatanfungsional"},
{ "name": "sk"},
{ "name": "tmt"}
];
var dataSource = {
              datafields: jqwidgetsPekerjaanDataFields,
			  datatype: "json",
			  url:current_url()+'/getPekerjaan',
			  type:'post',
			  data:{nip:''},
			  updaterow: function (rowid, rowdata, commit) {
                           // synchronize with the server - send update command
                           elementJqxGridReligion.jqxGrid('showloadelement');
                           $.ajax({
                               dataType: 'json',
                               url: current_url()+"/savePekerjaan",
                               data: rowdata,
                               type:'post',
                               success: function (data, status, xhr) {
                                   // update command is executed.
                                   if(data.status=="success")
									 {
										 Notification.open(Notification.textSuccessUpdate(),"success");
										 jqwidgetsPekerjaan.jqxGrid('hideloadelement');
										 
									}
									 else{
											Notification.open(data.message,"error");
											jqwidgetsPekerjaan.jqxGrid('hideloadelement');
											jqwidgetsPekerjaan.jqxGrid('updatebounddata');
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
                                url: current_url()+"/savePekerjaan",
                                data: rowdata,
                                type:'post',
                                success: function (data, status, xhr) {
									if(data.status=="success")
									 {
										jqwidgetsPekerjaan.jqxGrid({showeverpresentrow: false});
										jqwidgetsPekerjaan.jqxGrid('updatebounddata');
										Notification.open(Notification.textSuccessCreate(),"success");
									}
									 else{
											Notification.open(data.message,"error");
											jqwidgetsPekerjaan.jqxGrid('hideloadelement');
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
                              url: current_url()+"/deletePekerjaan",
                              data: {id:id},
                              type:'post',
                              success: function (data, status, xhr) {
                                  // update command is executed.
                                  //commit(true);
								  if(data.status=="success")
									 {
										 Notification.open(Notification.textSuccessDelete(),"success");
										jqwidgetsPekerjaan.jqxGrid('updatebounddata');
									}
									 else{
											Notification.open(data.message,"error");
											jqwidgetsPekerjaan.jqxGrid('hideloadelement');
									 }
                                  
                              },
                              error: function (data,status) {
                                  Notification.open(Notification.textFailedDelete(),"error");
                              }
                          });


                       },
          }
          var adapter = new $.jqx.dataAdapter(dataSource);
        
        
jqwidgetsPekerjaan.jqxGrid(
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
                    container.append('<input id="addPekerjaan" type="button" value="Tambah" />');
                    container.append('<input style="margin-left: 5px;" id="deletePekerjaan" type="button" value="Hapus" />');
						var c= {};
						if(elementJqxGridReligion.jqxGrid('getselectedrowindex')==-1)
						{
							c= {disabled:true};
						}
						$("#addPekerjaan").jqxButton(c);
						$("#deletePekerjaan").jqxButton(c);
						// create new row.
						$("#addPekerjaan").on('click', function () {
							jqwidgetsPekerjaan.jqxGrid({showeverpresentrow: true});
						});
						// delete row.
						$("#deletePekerjaan").on('click', function () {
							var selectedrowindex = jqwidgetsPekerjaan.jqxGrid('getselectedrowindex');
							  var rowscount = jqwidgetsPekerjaan.jqxGrid('getdatainformation').rowscount;
							  if (selectedrowindex >= 0 && selectedrowindex < rowscount) {
								  var id = jqwidgetsPekerjaan.jqxGrid('getrowdata', selectedrowindex).replid;
								  var commit = jqwidgetsPekerjaan.jqxGrid('deleterow', id);
							  }
						});
    },
     columns: [
	    { text: "Jabatan Fungsional", datafield: "jabatanfungsional",width: "25%",
			columntype: 'dropdownlist',
		createeditor: function (row, column, editor) {
			// assign a new data source to the dropdownlist.
			var source =
			{
				datatype: "json",
				localdata: <?=$status = getDataField("referensi","ref_kode","ref_nama","ref_grup","94")?>,
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
	  { text: "SK jabatan Fungsional", datafield: "sk",width: "55%" },
	  { text: "TMT", datafield: "tmt",width: "20%",
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
	  
	 
    ]
});
$("#addPekerjaan").click(function(){
  jqwidgetsPekerjaan.jqxGrid({showeverpresentrow: true});
});
$("#deletePekerjaan").click(function(){
  var selectedrowindex = jqwidgetsPekerjaan.jqxGrid('getselectedrowindex');
  var rowscount = jqwidgetsPekerjaan.jqxGrid('getdatainformation').rowscount;
  if (selectedrowindex >= 0 && selectedrowindex < rowscount) {
      var id = jqwidgetsPekerjaan.jqxGrid('getrowdata', selectedrowindex).id;
      var commit = jqwidgetsPekerjaan.jqxGrid('deleterow', id);
  }
});