jqwidgetsBeasiswa = $("#jqwidgetsBeasiswa");
jqwidgetsBeasiswaDataFields = [
{ "name": "replid"},
{ "name": "nip"},
{ "name": "jenis"},
{ "name": "penyelenggara"},
{ "name": "dari"},
{ "name": "sampai"},
{ "name": "masihmenerima"}
];
var dataSource = {
              datafields: jqwidgetsBeasiswaDataFields,
			  datatype: "json",
			  url:current_url()+'/getBeasiswa',
			  type:'post',
			  data:{nip:''},
			  updaterow: function (rowid, rowdata, commit) {
                           // synchronize with the server - send update command
                           elementJqxGridReligion.jqxGrid('showloadelement');
                           $.ajax({
                               dataType: 'json',
                               url: current_url()+"/saveBeasiswa",
                               data: rowdata,
                               type:'post',
                               success: function (data, status, xhr) {
                                   // update command is executed.
                                   if(data.status=="success")
									 {
										 Notification.open(Notification.textSuccessUpdate(),"success");
										 jqwidgetsBeasiswa.jqxGrid('hideloadelement');
										 
									}
									 else{
											Notification.open(data.message,"error");
											jqwidgetsBeasiswa.jqxGrid('hideloadelement');
											jqwidgetsBeasiswa.jqxGrid('updatebounddata');
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
                                url: current_url()+"/saveBeasiswa",
                                data: rowdata,
                                type:'post',
                                success: function (data, status, xhr) {
									if(data.status=="success")
									 {
										jqwidgetsBeasiswa.jqxGrid({showeverpresentrow: false});
										jqwidgetsBeasiswa.jqxGrid('updatebounddata');
										Notification.open(Notification.textSuccessCreate(),"success");
									}
									 else{
											Notification.open(data.message,"error");
											jqwidgetsBeasiswa.jqxGrid('hideloadelement');
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
                              url: current_url()+"/deleteBeasiswa",
                              data: {id:id},
                              type:'post',
                              success: function (data, status, xhr) {
                                  // update command is executed.
                                  //commit(true);
								  if(data.status=="success")
									 {
										 Notification.open(Notification.textSuccessDelete(),"success");
										jqwidgetsBeasiswa.jqxGrid('updatebounddata');
									}
									 else{
											Notification.open(data.message,"error");
											jqwidgetsBeasiswa.jqxGrid('hideloadelement');
									 }
                                  
                              },
                              error: function (data,status) {
                                  Notification.open(Notification.textFailedDelete(),"error");
                              }
                          });


                       },
          }
          var adapter = new $.jqx.dataAdapter(dataSource);
        
        
jqwidgetsBeasiswa.jqxGrid(
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
                    container.append('<input id="addBeasiswa" type="button" value="Tambah" />');
                    container.append('<input style="margin-left: 5px;" id="deleteBeasiswa" type="button" value="Hapus" />');
						var c= {};
						if(elementJqxGridReligion.jqxGrid('getselectedrowindex')==-1)
						{
							c= {disabled:true};
						}
						$("#addBeasiswa").jqxButton(c);
						$("#deleteBeasiswa").jqxButton(c);
						// create new row.
						$("#addBeasiswa").on('click', function () {
							jqwidgetsBeasiswa.jqxGrid({showeverpresentrow: true});
						});
						// delete row.
						$("#deleteBeasiswa").on('click', function () {
							var selectedrowindex = jqwidgetsBeasiswa.jqxGrid('getselectedrowindex');
							  var rowscount = jqwidgetsBeasiswa.jqxGrid('getdatainformation').rowscount;
							  if (selectedrowindex >= 0 && selectedrowindex < rowscount) {
								  var id = jqwidgetsBeasiswa.jqxGrid('getrowdata', selectedrowindex).replid;
								  var commit = jqwidgetsBeasiswa.jqxGrid('deleterow', id);
							  }
						});
    },
     columns: [
	 { text: "Jenis", datafield: "jenis",width: "20%",
		columntype: 'dropdownlist',
		createeditor: function (row, column, editor) {
			// assign a new data source to the dropdownlist.
			var source =
			{
				datatype: "json",
				localdata: <?=$status = getDataField("referensi","ref_kode","ref_nama","ref_grup","88")?>,
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
	 
	 { text: "Penyelenggara", datafield: "penyelenggara",width: "45%" },
	 { text: "Dari Tahun", datafield: "dari",width: "10%" },
	 { text: "Sampai Tahun", datafield: "sampai",width: "10%" },
	 { text: "Masih Menerima", datafield: "masihmenerima",width: "15%",
		columntype:"checkbox",
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
$("#addBeasiswa").click(function(){
  jqwidgetsBeasiswa.jqxGrid({showeverpresentrow: true});
});
$("#deleteBeasiswa").click(function(){
  var selectedrowindex = jqwidgetsBeasiswa.jqxGrid('getselectedrowindex');
  var rowscount = jqwidgetsBeasiswa.jqxGrid('getdatainformation').rowscount;
  if (selectedrowindex >= 0 && selectedrowindex < rowscount) {
      var id = jqwidgetsBeasiswa.jqxGrid('getrowdata', selectedrowindex).id;
      var commit = jqwidgetsBeasiswa.jqxGrid('deleterow', id);
  }
});