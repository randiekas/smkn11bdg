jqwidgetsGuruMengajar = $("#jqwidgetsGuruMengajar");

jqwidgetsGuruMengajarDataFields = [
	{ "name": "replid"},
	{ "name": "nip"},
	{ "name": "idpelajaran"},
	{ "name": "statusguru"},
	{ "name": "aktif"},
	{ "name": "keterangan"}
];
var updateAction = function (rowid, rowdata, commit) {
                 // synchronize with the server - send update command
                 jqwidgetsGuruMengajar.jqxGrid('showloadelement');
                 $.ajax({
                     dataType: 'json',
                     url: current_url()+"/update/",
                     data: rowdata,
                     type:'post',
                     success: function (data, status, xhr) {
                         // update command is executed.
						 if(data.status=="success")
						 {
							 Notification.open(Notification.textSuccessUpdate(),"success");
							 jqwidgetsGuruMengajar.jqxGrid('hideloadelement');
							 commit(true);
						 }
						 else{
							 Notification.open(data.message,"error");
							 jqwidgetsGuruMengajar.jqxGrid('hideloadelement');
							 commit(false);
						 }
                     },
                     error: function (data,status) {
                         Notification.open(Notification.textFailedUpdate(),"error");
                         commit(false);
                     }
                 });
             };
var addAction = function (rowid, rowdata, commit) {
				rowdata.idpelajaran = $('#jqwidgetsPelajaran').jqxGrid('getrowdata', $('#jqwidgetsPelajaran').jqxGrid('getselectedrowindex')).replid;
                 $.ajax({
                     dataType: 'json',
                     url: current_url()+"/store/",
                     data: rowdata,
                     type:'post',
                     success: function (data, status, xhr) {
                         // update command is executed.
                         if(data.status=="success")
						 {
							 Notification.open(Notification.textSuccessCreate(),"success");
							 jqwidgetsGuruMengajar.jqxGrid('updatebounddata', 'sort');
						 }
						else{
							if(data.message)
							{
								Notification.open(data.message,"error");
							}
							else{
								alert.alert("Gagal Menyimpan","Kode UPB telah digunakan, silahkan gunakan kode UPB yang lain.",function(){})
							}
						}

                     },
                     error: function (data,status) {
                        Notification.open(Notification.textFailedCreate(),"error");
                         commit(false);
                     }
                 });
            };

  var dataSource = {
	  datatype: "json",
	  datafields: jqwidgetsGuruMengajarDataFields,
	  updaterow: updateAction,
	  addrow:addAction,
	  id:"replid",
	  deleterow:function (ids,commit) {
      // synchronize with the server - send delete command
      // call commit with parameter true if the synchronization with the server is successful
      //and with parameter false if the synchronization failed.
	  deleterow = "";
      rows = new Array();
      var datarow = new Array();
      x = 0;

      rowsSelected.forEach(function(e){
        rows[x] = jqwidgetsGuruMengajar.jqxGrid('getrowid',e);
		currItem = jqwidgetsGuruMengajar.jqxGrid('getrowdata', e);
		deleterow = deleterow+currItem.nip;
		x++;
      });

     var str = "{replid:rows}";
     var json = JSON.stringify(eval("(" + str + ")"));
     post = JSON.parse(json);
	 confirm = function(){
		$.ajax({
			 dataType: 'json',
			 url: current_url()+"/destroy",
			 data: post,
			 type:'post',
			 success: function (data, status, xhr) {
				 // update command is executed.
				 //commit(true);
				 if(data.status=="success")
				 {
					 Notification.open(Notification.textSuccessDelete(),"success");
					jqwidgetsGuruMengajar.jqxGrid('updatebounddata', 'sort');
				}
				 else{
						Notification.open(data.message,"error");

				 }

			 },
			 error: function (data,status) {
				 Notification.open(Notification.textFailedDelete(),"error");
				 commit(false);
			 }
		 });
	};

	messageDelete = alert.contentDelete()+"<br> Kode  : "+deleterow;
	alert.confirm(alert.titleDelete(),messageDelete,confirm,function(){});


  },
	  url: current_url()+"/getGuruMengajar/",
		data: {idpelajaran:0},
	 type:'post'
  }
  var adapter = new $.jqx.dataAdapter(dataSource);
  // update data source.

jqwidgetsGuruMengajar.jqxGrid(
{
  theme:themeWidget,
    source: adapter,
   width : "100%",
   height : $( window ).height()-110,
   autoheight: false,
   showaggregates: true,
   pageable: false,
   pagesize:500,
   showfilterrow: true,
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
     columns: [
	{ text: "NIP", datafield: "nip",width: "30%",
		columntype: 'dropdownlist',
		createeditor: function (row, column, editor) {
			// assign a new data source to the dropdownlist.
			var source =
			{
				datatype: "json",
				localdata: <?=$pegawai = getDataField("pegawai","nip","nama")?>,
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
                  localdata: <?=$pegawai?>,
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
            var items = <?=$pegawai?>;
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
{ text: "Status Guru", datafield: "statusguru",width: "20%",filtertype:'checkedlist',
		columntype: 'dropdownlist',
		createeditor: function (row, column, editor) {
			// assign a new data source to the dropdownlist.
			var source =
			{
				datatype: "json",
				localdata: <?=$statusguru = getDataField("statusguru","replid","status")?>,
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
                  localdata: <?=$statusguru?>,
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
            var items = <?=$statusguru?>;
            var newValue = new Array();
            $.each(items,function(e,v){
                newValue[v.value]='<span style="margin: 4px; float: ' + columnproperties.cellsalign + ';">'+v.label+"</span>";
            });
            return newValue[value];
        },
		geteditorvalue: function (row, cellvalue, editor) {
						// return the editor's value.
						return editor.jqxDropDownList('getSelectedItem').value;
					},
		createfilterwidget: function (column, columnElement, widget) {
			widget.jqxDropDownList({ dropDownWidth: 250 });
		}
	},
	{ text: "Keterangan", datafield: "keterangan",width: "40%" },
	{ text: "Aktif ?", datafield: "aktif",width: "10%",filtertype:'bool',
		columntype:"checkbox",width: "10%",
		createEverPresentRowWidget: function (datafield, htmlElement, popup, addCallback) {
			var inputTag = $("<div style ='border: none;margin-left:42%'> </ div>").appendTo(htmlElement);
			inputTag.jqxCheckBox({ width: 10, height: 10 });
			return inputTag;
		},
		getEverPresentRowWidgetValue: function (datafield, htmlElement, validate) {
                                return htmlElement.jqxCheckBox('val');

                            }
	},
    ]
});
jqwidgetsGuruMengajar.on('rowselect', function (event) {
  $("#deleterowbutton").removeAttr("disabled");
});
$("#deleterowbutton").on('click', function (){
	rowsSelected = jqwidgetsGuruMengajar.jqxGrid('getselectedrowindexes');
    if (rowsSelected.length>=1) {
        var commit = jqwidgetsGuruMengajar.jqxGrid('deleterow');
    }
});
