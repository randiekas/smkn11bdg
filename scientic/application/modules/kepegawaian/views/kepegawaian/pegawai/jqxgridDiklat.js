jqwidgetsDiklat = $("#jqwidgetsDiklat");
jqwidgetsDiklatDataFields = [
	{ "name": "replid"},
	{ "name": "nip"},
	{ "name": "iddiklat"},
	{ "name": "nama"},
	{ "name": "penyelenggara"},
	{ "name": "tahun"},
	{ "name": "peran"}
];
var dataSource = {
              datafields: jqwidgetsDiklatDataFields,
			  datatype: "json",
			  url:current_url()+'/getDiklat',
			  type:'post',
			  data:{nip:''},
			  updaterow: function (rowid, rowdata, commit) {
                           // synchronize with the server - send update command
                           elementJqxGridReligion.jqxGrid('showloadelement');
                           $.ajax({
                               dataType: 'json',
                               url: current_url()+"/saveDiklat",
                               data: rowdata,
                               type:'post',
                               success: function (data, status, xhr) {
                                   // update command is executed.
                                   if(data.status=="success")
									 {
										 Notification.open(Notification.textSuccessUpdate(),"success");
										 jqwidgetsDiklat.jqxGrid('hideloadelement');
										 
									}
									 else{
											Notification.open(data.message,"error");
											jqwidgetsDiklat.jqxGrid('hideloadelement');
											jqwidgetsDiklat.jqxGrid('updatebounddata');
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
                                url: current_url()+"/saveDiklat",
                                data: rowdata,
                                type:'post',
                                success: function (data, status, xhr) {
									if(data.status=="success")
									 {
										jqwidgetsDiklat.jqxGrid({showeverpresentrow: false});
										jqwidgetsDiklat.jqxGrid('updatebounddata');
										Notification.open(Notification.textSuccessCreate(),"success");
									}
									 else{
											Notification.open(data.message,"error");
											jqwidgetsDiklat.jqxGrid('hideloadelement');
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
                              url: current_url()+"/deleteDiklat",
                              data: {id:id},
                              type:'post',
                              success: function (data, status, xhr) {
                                  // update command is executed.
                                  //commit(true);
								  if(data.status=="success")
									 {
										 Notification.open(Notification.textSuccessDelete(),"success");
										jqwidgetsDiklat.jqxGrid('updatebounddata');
									}
									 else{
											Notification.open(data.message,"error");
											jqwidgetsDiklat.jqxGrid('hideloadelement');
									 }
                                  
                              },
                              error: function (data,status) {
                                  Notification.open(Notification.textFailedDelete(),"error");
                              }
                          });


                       },
          }
          var adapter = new $.jqx.dataAdapter(dataSource);
        
        
jqwidgetsDiklat.jqxGrid(
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
                    container.append('<input id="addDiklat" type="button" value="Tambah" />');
                    container.append('<input style="margin-left: 5px;" id="deleteDiklat" type="button" value="Hapus" />');
						var c= {};
						if(elementJqxGridReligion.jqxGrid('getselectedrowindex')==-1)
						{
							c= {disabled:true};
						}
						$("#addDiklat").jqxButton(c);
						$("#deleteDiklat").jqxButton(c);
						// create new row.
						$("#addDiklat").on('click', function () {
							jqwidgetsDiklat.jqxGrid({showeverpresentrow: true});
						});
						// delete row.
						$("#deleteDiklat").on('click', function () {
							var selectedrowindex = jqwidgetsDiklat.jqxGrid('getselectedrowindex');
							  var rowscount = jqwidgetsDiklat.jqxGrid('getdatainformation').rowscount;
							  if (selectedrowindex >= 0 && selectedrowindex < rowscount) {
								  var id = jqwidgetsDiklat.jqxGrid('getrowdata', selectedrowindex).replid;
								  var commit = jqwidgetsDiklat.jqxGrid('deleterow', id);
							  }
						});
    },
     columns: [
	   { text: "Diklat", datafield: "iddiklat",width: "25%",
		columntype: 'dropdownlist',
		createeditor: function (row, column, editor) {
			// assign a new data source to the dropdownlist.
			var source =
			{
				datatype: "json",
				localdata: <?=$diklat = getDataField("diklat","replid","diklat")?>,
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
                  localdata: <?=$diklat?>,
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
            var items = <?=$diklat?>;
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
	{ text: "Nama", datafield: "nama",width: "20%" },
	{ text: "Penyelenggara", datafield: "penyelenggara",width: "30%" },
	{ text: "Tahun", datafield: "tahun",width: "10%" },
	 { text: "Peran", datafield: "peran",width: "15%" },
    ]
});
$("#addDiklat").click(function(){
  jqwidgetsDiklat.jqxGrid({showeverpresentrow: true});
});
$("#deleteDiklat").click(function(){
  var selectedrowindex = jqwidgetsDiklat.jqxGrid('getselectedrowindex');
  var rowscount = jqwidgetsDiklat.jqxGrid('getdatainformation').rowscount;
  if (selectedrowindex >= 0 && selectedrowindex < rowscount) {
      var id = jqwidgetsDiklat.jqxGrid('getrowdata', selectedrowindex).id;
      var commit = jqwidgetsDiklat.jqxGrid('deleterow', id);
  }
});