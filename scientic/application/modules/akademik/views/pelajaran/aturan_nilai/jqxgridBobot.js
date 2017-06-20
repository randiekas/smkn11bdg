jqwidgetsBobot = $("#jqwidgetsBobot");
jqwidgetsBobotDataFields = [
	{ "name": "replid"},
	{ "name": "nipguru"},
	{ "name": "idtingkat"},
	{ "name": "idpelajaran"},
	{ "name": "dasarpenilaian"},
	{ "name": "idjenisujian"},
	{ "name": "bobot"},
	{ "name": "aktif"},
	{ "name": "keterangan"}
];
var updateAction = function (rowid, rowdata, commit) {
                 // synchronize with the server - send update command
                 jqwidgetsBobot.jqxGrid('showloadelement');
                 $.ajax({
                     dataType: 'json',
                     url: current_url()+"/updateBobot/",
                     data: rowdata,
                     type:'post',
                     success: function (data, status, xhr) {
                         // update command is executed.
						 if(data.status=="success")
						 {
							 Notification.open(Notification.textSuccessUpdate(),"success");
							 jqwidgetsBobot.jqxGrid('hideloadelement');
							 commit(true);
						 }
						 else{
							 Notification.open(data.message,"error");
							 jqwidgetsBobot.jqxGrid('hideloadelement');
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
				rowdata.nipguru = dataGuruMengajar.nip;
				rowdata.idpelajaran = dataGuruMengajar.idpelajaran;
				rowdata.idtingkat = dataTingkat.replid;
				rowdata.dasarpenilaian = dataTingkat.dasarpenilaian;
                 $.ajax({
                     dataType: 'json',
                     url: current_url()+"/storeBobot/",
                     data: rowdata,
                     type:'post',
                     success: function (data, status, xhr) {
                         // update command is executed.
                         if(data.status=="success")
						 {
							 Notification.open(Notification.textSuccessCreate(),"success");
							 jqwidgetsBobot.jqxGrid('updatebounddata', 'sort');
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
	  datafields: jqwidgetsBobotDataFields,
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
        rows[x] = jqwidgetsBobot.jqxGrid('getrowid',e);
		currItem = jqwidgetsBobot.jqxGrid('getrowdata', e);
		deleterow = '?';
		x++;
      });
	 
     var str = "{replid:rows}";
     var json = JSON.stringify(eval("(" + str + ")"));
     post = JSON.parse(json);
	 confirm = function(){
		$.ajax({
			 dataType: 'json',
			 url: current_url()+"/destroyBobot",
			 data: post,
			 type:'post',
			 success: function (data, status, xhr) {
				 // update command is executed.
				 //commit(true);
				 if(data.status=="success")
				 {
					 Notification.open(Notification.textSuccessDelete(),"success");
					jqwidgetsBobot.jqxGrid('updatebounddata', 'sort');
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
	url: current_url()+"/getBobot/",
	data: {nip:'',idtingkat:'',idpelajaran:'',dasarpenilaian:''},
	type:'post',
	id:'replid'
  }
  var adapter = new $.jqx.dataAdapter(dataSource);
  // update data source.
   
jqwidgetsBobot.jqxGrid(
{
  theme:themeWidget,
    source: adapter,
   width : "99.80%",
   height : '100%',
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
   showtoolbar:true,
   rendertoolbar: function (toolbar) {
                    var me = this;
                    var container = $("<div style='margin: 5px;'>Bobot</div>");
                    toolbar.append(container);
                    container.append('<div style="float:right"><input id="addBobot" type="button" value="Tambah" /><input style="margin-left: 5px;" id="deleteBobot" type="button" value="Hapus" /></div>');
                    
						var c= {};
						if(jqwidgetsTingkat.jqxGrid('getselectedrowindex')==-1)
						{
							c= {disabled:true};
						}
						$("#addBobot").jqxButton(c);
						$("#deleteBobot").jqxButton(c);
						// create new row.
						$("#addBobot").on('click', function () {
							jqwidgetsBobot.jqxGrid({showeverpresentrow: true});
						});
						// delete row.
						$("#deleteBobot").on('click', function () {
							rowsSelected = jqwidgetsBobot.jqxGrid('getselectedrowindexes');
								if (rowsSelected.length>=1) {
									var commit = jqwidgetsBobot.jqxGrid('deleterow');
								}
						});
    },
     columns: [
		{ text: "Pengujian", datafield: "idjenisujian",width: "60%",
			columntype: 'dropdownlist',
			createeditor: function (row, column, editor) {
			// assign a new data source to the dropdownlist.
			var source =
			{
				datatype: "json",
				localdata: <?=$jenisujian = getDataField("jenisujian","replid","jenisujian")?>,
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
                  localdata: <?=$jenisujian?>,
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
            var items = <?=$jenisujian?>;
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
		{ text: "Bobot (%)", datafield: "bobot",width: "30%" },
		{ text: "Aktif ?", datafield: "aktif",
		columntype:"checkbox",width: "10%",
		createEverPresentRowWidget: function (datafield, htmlElement, popup, addCallback) {
			var inputTag = $("<div style ='border: none;margin-left:42%'> </ div>").appendTo(htmlElement);
			inputTag.jqxCheckBox({ width: 10, height: 10 });
			return inputTag;
		},
		getEverPresentRowWidgetValue: function (datafield, htmlElement, validate) {
                                return htmlElement.jqxCheckBox('val');
                                
                            }
		}
    ]
});
jqwidgetsBobot.on('rowselect', function (event) {
	$("#deleteBobot").jqxButton({disabled:false});
  
});