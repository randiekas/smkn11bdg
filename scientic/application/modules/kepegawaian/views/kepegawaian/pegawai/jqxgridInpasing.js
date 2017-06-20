jqwidgetsInpasing = $("#jqwidgetsInpasing");
jqwidgetsInpasingDataFields = [
{ "name": "replid"},
{ "name": "nip"},
{ "name": "golongan"},
{ "name": "skinpasing"},
{ "name": "tmtpasing"},
{ "name": "angkakredit"},
{ "name": "masakerjatahun"},
{ "name": "masakerjabulan"}
];
var dataSource = {
              datafields: jqwidgetsInpasingDataFields,
			  datatype: "json",
			  url:current_url()+'/getInpasing',
			  type:'post',
			  data:{nip:''},
			  updaterow: function (rowid, rowdata, commit) {
                           // synchronize with the server - send update command
                           elementJqxGridReligion.jqxGrid('showloadelement');
                           $.ajax({
                               dataType: 'json',
                               url: current_url()+"/saveInpasing",
                               data: rowdata,
                               type:'post',
                               success: function (data, status, xhr) {
                                   // update command is executed.
                                   if(data.status=="success")
									 {
										 Notification.open(Notification.textSuccessUpdate(),"success");
										 jqwidgetsInpasing.jqxGrid('hideloadelement');
										 
									}
									 else{
											Notification.open(data.message,"error");
											jqwidgetsInpasing.jqxGrid('hideloadelement');
											jqwidgetsInpasing.jqxGrid('updatebounddata');
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
                                url: current_url()+"/saveInpasing",
                                data: rowdata,
                                type:'post',
                                success: function (data, status, xhr) {
									if(data.status=="success")
									 {
										jqwidgetsInpasing.jqxGrid({showeverpresentrow: false});
										jqwidgetsInpasing.jqxGrid('updatebounddata');
										Notification.open(Notification.textSuccessCreate(),"success");
									}
									 else{
											Notification.open(data.message,"error");
											jqwidgetsInpasing.jqxGrid('hideloadelement');
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
                              url: current_url()+"/deleteInpasing",
                              data: {id:id},
                              type:'post',
                              success: function (data, status, xhr) {
                                  // update command is executed.
                                  //commit(true);
								  if(data.status=="success")
									 {
										 Notification.open(Notification.textSuccessDelete(),"success");
										jqwidgetsInpasing.jqxGrid('updatebounddata');
									}
									 else{
											Notification.open(data.message,"error");
											jqwidgetsInpasing.jqxGrid('hideloadelement');
									 }
                                  
                              },
                              error: function (data,status) {
                                  Notification.open(Notification.textFailedDelete(),"error");
                              }
                          });


                       },
          }
          var adapter = new $.jqx.dataAdapter(dataSource);
        
        
jqwidgetsInpasing.jqxGrid(
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
                    container.append('<input id="addInpasing" type="button" value="Tambah" />');
                    container.append('<input style="margin-left: 5px;" id="deleteInpasing" type="button" value="Hapus" />');
						var c= {};
						if(elementJqxGridReligion.jqxGrid('getselectedrowindex')==-1)
						{
							c= {disabled:true};
						}
						$("#addInpasing").jqxButton(c);
						$("#deleteInpasing").jqxButton(c);
						// create new row.
						$("#addInpasing").on('click', function () {
							jqwidgetsInpasing.jqxGrid({showeverpresentrow: true});
						});
						// delete row.
						$("#deleteInpasing").on('click', function () {
							var selectedrowindex = jqwidgetsInpasing.jqxGrid('getselectedrowindex');
							  var rowscount = jqwidgetsInpasing.jqxGrid('getdatainformation').rowscount;
							  if (selectedrowindex >= 0 && selectedrowindex < rowscount) {
								  var id = jqwidgetsInpasing.jqxGrid('getrowdata', selectedrowindex).replid;
								  var commit = jqwidgetsInpasing.jqxGrid('deleterow', id);
							  }
						});
    },
     columns: [
	 { text: "Jabatan PTK", datafield: "golongan",width: "20%",
		columntype: 'dropdownlist',
		createeditor: function (row, column, editor) {
			// assign a new data source to the dropdownlist.
			var source =
			{
				datatype: "json",
				localdata: <?=$status = getDataField("golongan","replid","golongan")?>,
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
	 
		 { text: "No. SK Inpasing", datafield: "skinpasing",width: "30%" },
		 { text: "TMT Tambahan", datafield: "tmtpasing",width: "15%" ,
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
		 { text: "Angka Kredit", datafield: "angkakredit",width: "15%" },
		 { text: "Masa Kerja Tahun", datafield: "masakerjatahun",width: "10%" },
		 { text: "Masa Kerja Bulan", datafield: "masakerjabulan",width: "10%" }
    ]
});
$("#addInpasing").click(function(){
  jqwidgetsInpasing.jqxGrid({showeverpresentrow: true});
});
$("#deleteInpasing").click(function(){
  var selectedrowindex = jqwidgetsInpasing.jqxGrid('getselectedrowindex');
  var rowscount = jqwidgetsInpasing.jqxGrid('getdatainformation').rowscount;
  if (selectedrowindex >= 0 && selectedrowindex < rowscount) {
      var id = jqwidgetsInpasing.jqxGrid('getrowdata', selectedrowindex).id;
      var commit = jqwidgetsInpasing.jqxGrid('deleterow', id);
  }
});