jqwidgetsPoint = $("#jqwidgetsPoint");
jqwidgetsPointDataFields = [
    { "name": "replid"},
    { "name": "kode"},
    { "name": "kode_jenis"},
    { "name": "nis"},
    { "name": "tanggal"},
    { "name": "keterangan"},
    { "name": "user"},
    { "name": "point"},
    { "name": "nama"},
    { "name": "kategori"},
    { "name": "jenis"}
];
var dataSource = {
              datafields: jqwidgetsPointDataFields,
			  datatype: "json",
			  url:current_url()+'/getPoint',
			  type:'post',
			  data:{nis:''},
			  updaterow: function (rowid, rowdata, commit) {
                           // synchronize with the server - send update command
                           jqwidgetsPoint.jqxGrid('showloadelement');
                           $.ajax({
                               dataType: 'json',
                               url: current_url()+"/update",
                               data: rowdata,
                               type:'post',
                               success: function (data, status, xhr) {
                                   // update command is executed.
                                   if(data.status=="success")
									 {
										 Notification.open(Notification.textSuccessUpdate(),"success");
										 jqwidgetsPoint.jqxGrid('hideloadelement');
										 
									}
									 else{
											Notification.open(data.message,"error");
											jqwidgetsPoint.jqxGrid('hideloadelement');
											jqwidgetsPoint.jqxGrid('updatebounddata');
									 }

                               },
                               error: function (data,status) {
                                   Notification.open(Notification.textFailedUpdate(),"error");

                               }
                           });
                       },
              addrow: function (rowid, rowdata, commit) {
                            rowdata.nis = siswa.nis;
                            $.ajax({
                                dataType: 'json',
                                url: current_url()+"/store",
                                data: rowdata,
                                type:'post',
                                success: function (data, status, xhr) {
									if(data.status=="success")
									 {
										jqwidgetsPoint.jqxGrid({showeverpresentrow: false});
										jqwidgetsPoint.jqxGrid('updatebounddata');
										Notification.open(Notification.textSuccessCreate(),"success");
									}
									 else{
											Notification.open(data.message,"error");
											jqwidgetsPoint.jqxGrid('hideloadelement');
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
                              url: current_url()+"/destroy",
                              data: {id:id},
                              type:'post',
                              success: function (data, status, xhr) {
                                  // update command is executed.
                                  //commit(true);
								  if(data.status=="success")
									 {
										 Notification.open(Notification.textSuccessDelete(),"success");
										jqwidgetsPoint.jqxGrid('updatebounddata');
									}
									 else{
											Notification.open(data.message,"error");
											jqwidgetsPoint.jqxGrid('hideloadelement');
									 }
                                  
                              },
                              error: function (data,status) {
                                  Notification.open(Notification.textFailedDelete(),"error");
                              }
                          });


                       },
          }
          var adapter = new $.jqx.dataAdapter(dataSource);
        
        
jqwidgetsPoint.jqxGrid(
{
  theme:themeWidget,
   width : "100%",
   height : $( window ).height()-40,
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
						if(jqxGridSiswa.jqxGrid('getselectedrowindex')==-1)
						{
							c= {disabled:true};
						}
						$("#addKeluarga").jqxButton(c);
						$("#deleteKeluarga").jqxButton(c);
						// create new row.
						$("#addKeluarga").on('click', function () {
							jqwidgetsPoint.jqxGrid({showeverpresentrow: true});
						});
						// delete row.
						$("#deleteKeluarga").on('click', function () {
							var selectedrowindex = jqwidgetsPoint.jqxGrid('getselectedrowindex');
							  var rowscount = jqwidgetsPoint.jqxGrid('getdatainformation').rowscount;
							  if (selectedrowindex >= 0 && selectedrowindex < rowscount) {
								  var id = jqwidgetsPoint.jqxGrid('getrowdata', selectedrowindex).replid;
								  var commit = jqwidgetsPoint.jqxGrid('deleterow', id);
							  }
						});
    },
     columns: [
        { text: "Kode", datafield: "kode_jenis",width: "15%",
         columntype: 'dropdownlist',
		  createeditor: function (row, column, editor) {
			// assign a new data source to the dropdownlist.
			var source =
			{
				datatype: "json",
				localdata: <?=$status = getDataField("point_jenis","replid","kode")?>,
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
        { text: "Nama Kode", datafield: "nama",width: "35%",
            createEverPresentRowWidget: function (datafield, htmlElement, popup, addCallback) {
              var inputTag = $("<div style='border: none;'>[Auto]</div>").appendTo(htmlElement);
              return inputTag;
          },
        },
        { text: "Tanggal", datafield: "tanggal",width: "15%",
            createEverPresentRowWidget: function (datafield, htmlElement, popup, addCallback) {
              var inputTag = $("<div style='border: none;'>[Auto]</div>").appendTo(htmlElement);
              return inputTag;
          },
        },
        { text: "keterangan", datafield: "keterangan",width: "20%" },
        { text: "User", datafield: "user",width: "15%" }
    ]
});
$("#addKeluarga").click(function(){
  jqwidgetsPoint.jqxGrid({showeverpresentrow: true});
});
$("#deleteKeluarga").click(function(){
  var selectedrowindex = jqwidgetsPoint.jqxGrid('getselectedrowindex');
  var rowscount = jqwidgetsPoint.jqxGrid('getdatainformation').rowscount;
  if (selectedrowindex >= 0 && selectedrowindex < rowscount) {
      var id = jqwidgetsPoint.jqxGrid('getrowdata', selectedrowindex).id;
      var commit = jqwidgetsPoint.jqxGrid('deleterow', id);
  }
});