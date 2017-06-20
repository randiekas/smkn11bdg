jqwidgetsSekolah = $("#jqwidgetsSekolah");
jqwidgetsSekolahDataFields = [
	{ "name": "replid"},
	{ "name": "nip"},
	{ "name": "bidangstudy"},
	{ "name": "jenjang"},
	{ "name": "gelar"},
	{ "name": "satuan"},
	{ "name": "fakultas"},
	{ "name": "kependidikan"},
	{ "name": "tahunmulai"},
	{ "name": "tahunselesai"},
	{ "name": "nim"},
	{ "name": "masih"},
	{ "name": "semester"},
	{ "name": "ipk"}
];
var dataSource = {
              datafields: jqwidgetsSekolahDataFields,
			  datatype: "json",
			  url:current_url()+'/getSekolah',
			  type:'post',
			  data:{nip:''},
			  updaterow: function (rowid, rowdata, commit) {
                           // synchronize with the server - send update command
                           elementJqxGridReligion.jqxGrid('showloadelement');
                           $.ajax({
                               dataType: 'json',
                               url: current_url()+"/saveSekolah",
                               data: rowdata,
                               type:'post',
                               success: function (data, status, xhr) {
                                   // update command is executed.
                                   if(data.status=="success")
									 {
										 Notification.open(Notification.textSuccessUpdate(),"success");
										 jqwidgetsSekolah.jqxGrid('hideloadelement');
										 
									}
									 else{
											Notification.open(data.message,"error");
											jqwidgetsSekolah.jqxGrid('hideloadelement');
											jqwidgetsSekolah.jqxGrid('updatebounddata');
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
                                url: current_url()+"/saveSekolah",
                                data: rowdata,
                                type:'post',
                                success: function (data, status, xhr) {
									if(data.status=="success")
									 {
										jqwidgetsSekolah.jqxGrid({showeverpresentrow: false});
										jqwidgetsSekolah.jqxGrid('updatebounddata');
										Notification.open(Notification.textSuccessCreate(),"success");
									}
									 else{
											Notification.open(data.message,"error");
											jqwidgetsSekolah.jqxGrid('hideloadelement');
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
                              url: current_url()+"/deleteSekolah",
                              data: {id:id},
                              type:'post',
                              success: function (data, status, xhr) {
                                  // update command is executed.
                                  //commit(true);
								  if(data.status=="success")
									 {
										 Notification.open(Notification.textSuccessDelete(),"success");
										jqwidgetsSekolah.jqxGrid('updatebounddata');
									}
									 else{
											Notification.open(data.message,"error");
											jqwidgetsSekolah.jqxGrid('hideloadelement');
									 }
                                  
                              },
                              error: function (data,status) {
                                  Notification.open(Notification.textFailedDelete(),"error");
                              }
                          });


                       },
          }
          var adapter = new $.jqx.dataAdapter(dataSource);
        
        
jqwidgetsSekolah.jqxGrid(
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
                    container.append('<input id="addSekolah" type="button" value="Tambah" />');
                    container.append('<input style="margin-left: 5px;" id="deleteSekolah" type="button" value="Hapus" />');
						var c= {};
						if(elementJqxGridReligion.jqxGrid('getselectedrowindex')==-1)
						{
							c= {disabled:true};
						}
						$("#addSekolah").jqxButton(c);
						$("#deleteSekolah").jqxButton(c);
						// create new row.
						$("#addSekolah").on('click', function () {
							jqwidgetsSekolah.jqxGrid({showeverpresentrow: true});
						});
						// delete row.
						$("#deleteSekolah").on('click', function () {
							var selectedrowindex = jqwidgetsSekolah.jqxGrid('getselectedrowindex');
							  var rowscount = jqwidgetsSekolah.jqxGrid('getdatainformation').rowscount;
							  if (selectedrowindex >= 0 && selectedrowindex < rowscount) {
								  var id = jqwidgetsSekolah.jqxGrid('getrowdata', selectedrowindex).replid;
								  var commit = jqwidgetsSekolah.jqxGrid('deleterow', id);
							  }
						});
    },
     columns: [
	  { text: "Bidang Study", datafield: "bidangstudy",width: "10%" },
	   { text: "Jenjang", datafield: "jenjang",width: "15%" ,
			columntype: 'dropdownlist',
			createeditor: function (row, column, editor) {
				// assign a new data source to the dropdownlist.
				var source =
				{
					datatype: "json",
					localdata: <?=$tingkat = getDataField("referensi","ref_nama","ref_nama","ref_grup","92")?>,
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
					  localdata: <?=$tingkat?>,
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
	  { text: "Gelar", datafield: "gelar",width: "10%" },
	  { text: "Satuan", datafield: "satuan",width: "15%" },
	  { text: "Fakultas", datafield: "fakultas",width: "10%" },
	  { text: "Kependidikan", datafield: "kependidikan",width: "10%" },
	  { text: "Tahun", datafield: "tahunmulai",width: "10%" },
      { text: "Tahun", datafield: "tahunselesai",width: "10%" },
	  { text: "NIM", datafield: "nim",width: "15%" },
	  { text: "Masih", datafield: "masih",
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
	  { text: "Semester", datafield: "semester",width: "10%" },
	  { text: "IPK", datafield: "ipk",width: "10%" }
	  
    ]
});
$("#addSekolah").click(function(){
  jqwidgetsSekolah.jqxGrid({showeverpresentrow: true});
});
$("#deleteSekolah").click(function(){
  var selectedrowindex = jqwidgetsSekolah.jqxGrid('getselectedrowindex');
  var rowscount = jqwidgetsSekolah.jqxGrid('getdatainformation').rowscount;
  if (selectedrowindex >= 0 && selectedrowindex < rowscount) {
      var id = jqwidgetsSekolah.jqxGrid('getrowdata', selectedrowindex).id;
      var commit = jqwidgetsSekolah.jqxGrid('deleterow', id);
  }
});