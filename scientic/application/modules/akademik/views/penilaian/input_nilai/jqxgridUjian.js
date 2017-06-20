jqwidgetsGrading = $("#jqwidgetsGrading");
jqwidgetsGradingDataFields = [
	{ "name": "replid"},
	{ "name": "idpelajaran"},
	{ "name": "idkelas"},
	{ "name": "idsemester"},
	{ "name": "idjenis"},
	{ "name": "deskripsi"},
	{ "name": "tanggal"},
	{ "name": "tglkirimSMS"},
	{ "name": "idaturan"},
	{ "name": "idrpp"},
	{ "name": "kode"},
	{ "name": "info1"} 
];
var updateAction = function (rowid, rowdata, commit) {
                 // synchronize with the server - send update command
                 jqwidgetsGrading.jqxGrid('showloadelement');
                 $.ajax({
                     dataType: 'json',
                     url: current_url()+"/updateUjian/",
                     data: rowdata,
                     type:'post',
                     success: function (data, status, xhr) {
                         // update command is executed.
						 if(data.status=="success")
						 {
							 Notification.open(Notification.textSuccessUpdate(),"success");
							 jqwidgetsGrading.jqxGrid('hideloadelement');
							 commit(true);
						 }
						 else{
							 Notification.open(data.message,"error");
							 jqwidgetsGrading.jqxGrid('hideloadelement');
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
				rowdata.idpelajaran = dataGuruMengajar.idpelajaran;
				rowdata.idkelas = dataGuruMengajar.idkelas;
				rowdata.idsemester = dataGuruMengajar.idsemester;
				rowdata.idjenis = dataAspekPenilaian.idjenisujian;
				rowdata.idaturan = dataAspekPenilaian.idaturan;
                 $.ajax({
                     dataType: 'json',
                     url: current_url()+"/storeUjian/",
                     data: rowdata,
                     type:'post',
                     success: function (data, status, xhr) {
                         // update command is executed.
                         if(data.status=="success")
						 {
							 Notification.open(Notification.textSuccessCreate(),"success");
							 jqwidgetsGrading.jqxGrid('updatebounddata');
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
	  datafields: jqwidgetsGradingDataFields,
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
        rows[x] = jqwidgetsGrading.jqxGrid('getrowid',e);
		currItem = jqwidgetsGrading.jqxGrid('getrowdata', e);
		deleterow = deleterow+currItem.kode+'('+currItem.deskripsi+')';
		x++;
      });
	 
     var str = "{replid:rows}";
     var json = JSON.stringify(eval("(" + str + ")"));
     post = JSON.parse(json);
	 confirm = function(){
		$.ajax({
			 dataType: 'json',
			 url: current_url()+"/destroyUjian",
			 data: post,
			 type:'post',
			 success: function (data, status, xhr) {
				 // update command is executed.
				 //commit(true);
				 if(data.status=="success")
				 {
					 Notification.open(Notification.textSuccessDelete(),"success");
					jqwidgetsGrading.jqxGrid('updatebounddata', 'sort');
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
	url: current_url()+"/getUjian/",
	data:{idpelajaran:'',idkelas:'',idsemester:'',idjenis:'',idaturan:''},
	type:'post',
	id:'replid'
  }
  var adapter = new $.jqx.dataAdapter(dataSource);
  // update data source.
   
jqwidgetsGrading.jqxGrid(
{
  theme:themeWidget,
    source: adapter,
   width : "99.80%",
   height : $( window ).height()*(53/100),
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
                    var container = $("<div style='margin: 5px;'>Input Ujian</div>");
                    toolbar.append(container);
                    container.append('<div style="float:right"><input id="addGrading" type="button" value="Tambah" /><input style="margin-left: 5px;" id="deleteGrading" type="button" value="Hapus" /></div>');
						var c= {};
						if(jqwidgetsTingkat.jqxGrid('getselectedrowindex')==-1)
						{
							c= {disabled:true};
						}
						$("#addGrading").jqxButton(c);
						$("#deleteGrading").jqxButton(c);
						// create new row.
						$("#addGrading").on('click', function () {
							jqwidgetsGrading.jqxGrid({showeverpresentrow: true});
						});
						// delete row.
						$("#deleteGrading").on('click', function () {
							rowsSelected = jqwidgetsGrading.jqxGrid('getselectedrowindexes');
								if (rowsSelected.length>=1) {
									var commit = jqwidgetsGrading.jqxGrid('deleterow');
								}
						});
    },
     columns: [
		{ text: "Kode Ujian", datafield: "kode",width: "15%" },
		{ text: "Tanggal", datafield: "tanggal",width: "18%",
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
		{ text: "RPP", datafield: "idrpp",width: "22%",
			columntype: 'dropdownlist',
			createeditor: function (row, column, editor) {
			// assign a new data source to the dropdownlist.
			var source =
			{
				datatype: "json",
				localdata: rpp,
				datafields: [
					{ name: 'value' },
					{ name: 'label' }
				],
			};
			var dataAdapter = new $.jqx.dataAdapter(source);
			// Create a jqxDropDownList
			editor.jqxDropDownList({source: dataAdapter, displayMember: "label", valueMember: "value",width: '450px'});
		},
		createEverPresentRowWidget: function (datafield, htmlElement, popup, addCallback) {
              var inputTag = $("<div style='border: none;'></div>").appendTo(htmlElement);
              var source =
              {
                  datatype: "json",
                  localdata: rpp,
				  datafields: [
                      { name: 'value' },
                      { name: 'label' }
                  ],
              };
              var dataAdapter = new $.jqx.dataAdapter(source);
              // Create a jqxDropDownList
              inputTag.jqxDropDownList({source: dataAdapter, displayMember: "label", valueMember: "value",width: '450px'});
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
            var items = rpp;
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
		{ text: "Bobot", datafield: "info1",width: "10%" },
		{ text: "Materi", datafield: "deskripsi",width: "35%" }
    ]
});
jqwidgetsGrading.on('rowselect', function (event) {
  $("#deleteGrading").jqxButton({disabled:false});
  
	var row  = event.args.row;
	dataUjian = row;
	jqwidgetsBobot.jqxGrid("source")._source.data.idujian=dataUjian.replid;
	jqwidgetsBobot.jqxGrid("source")._source.data.idkelas=dataGuruMengajar.idkelas;
	jqwidgetsBobot.jqxGrid('updatebounddata');
});

