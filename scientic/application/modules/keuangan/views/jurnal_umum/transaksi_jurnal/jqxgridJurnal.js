jqxGridJurnal = $("#jqxGridJurnal");
jqxGridJurnalDataFields = [
	{ "name": "replid"},
	{ "name": "tanggal",'type':'date'},
	{ "name": "transaksi"},
	{ "name": "idpetugas"},
	{ "name": "petugas"},
	{ "name": "nokas",'type':'string'},
	{ "name": "idtahunbuku"},
	{ "name": "keterangan"},
	{ "name": "sumber"}
];   
  var dataSource = {
	  datatype: "json",
	  datafields: jqxGridJurnalDataFields,
	  url: current_url()+"/grid_jurnal/",
		data: {
				filter:'false',
				field:'',
				keywords:'',
				departemen:$("#calon_departemen").val(),
				idtahunajaran:$("#siswa_idtahunajaran").val(),
				idkelas:$("#siswa_idkelas").val()
				},
	 type:'post',
	 addrow: function (rowid, rowdata, commit) {
				rowdata.idtahunbuku = $("#idtahunbuku").val();
				$.ajax({
                     dataType: 'json',
                     url: current_url()+"/save_jurnal/",
                     data: rowdata,
                     type:'post',
                     success: function (data, status, xhr) {
                         // update command is executed.
                         if(data.status=="success")
						 {
							 Notification.open(Notification.textSuccessCreate(),"success");
							 jqxGridJurnal.jqxGrid('updatebounddata');
						 }
						else{
							if(data.message)
							{
								Notification.open(data.message,"error");
							}
							
						}

                     },
                     error: function (data,status) {
                        Notification.open(Notification.textFailedCreate(),"error");
                         commit(false);
                     }
                 });
            }
  }
  var adapter = new $.jqx.dataAdapter(dataSource);
  // update data source.
   
jqxGridJurnal.jqxGrid(
{
	theme:themeWidget,
    source: adapter,
   width : "100%",
   height : $( window ).height()-($( window ).height()*0.4),
   autoheight: false,
   showaggregates: true,
   pageable: true,
   pagesize:500,
   showfilterrow: true,
   filterable: true,
   sortable: true,
   columnsResize: true,
   altrows: false,
   showeverpresentrow: true,
   everpresentrowposition: "bottom",
   everpresentrowactions: "addBottom reset",
   editable:true,
   editmode:'dblclick',
   //selectionmode:'multiplerows',
   groupable: false,
   localization:{ currencysymbol: "Rp.",currencysymbolposition: "before", patterns: {d: "d/M/yyyy",}},
     columns: [
		{ text: "No Jurnal", datafield: "nokas",width: "15%",columntype: 'textbox', filtertype: 'input', filtercondition: 'starts_with',editable:false,
			createEverPresentRowWidget: function (datafield, htmlElement, popup, addCallback) {
				  var inputTag = $("<div style='border: none;margin:5px'>[Auto]</div>").appendTo(htmlElement);
				  
				  return inputTag;
			  }
		},
		{ text: "Petugas", datafield: "petugas",width: "20%",filtertype:'checkedlist',editable:false,
			createEverPresentRowWidget: function (datafield, htmlElement, popup, addCallback) {
				  var inputTag = $("<div style='border: none;margin:5px;'><?=$this->session->userdata('entity_id')?></div>").appendTo(htmlElement);
				  
				  return inputTag;
			  }
		},
		{ text: "Tanggal", datafield: "tanggal",width: "15%",columntype: 'datetimeinput',cellsformat:'d',filtertype:'range',
			cellsalign: 'right',
                      createEverPresentRowWidget: function (datafield, htmlElement, popup, addCallback) {
                          var inputTag = $("<div style='border: none;'></div>").appendTo(htmlElement);
                          inputTag.jqxDateTimeInput({ value: '<?=date("Y-m-d")?>', popupZIndex: 99999999, placeHolder: "Enter Date: ", width: '100%', height: 30 });
						  
                          $(document).on('keydown.date', function (event) {
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
                      initEverPresentRowWidget: function (datafield, htmlElement) {
					
                      },
                      getEverPresentRowWidgetValue: function (datafield, htmlElement, validate) {
                          var value = htmlElement.val();
                          return value;
                      },
                      resetEverPresentRowWidgetValue: function (datafield, htmlElement) {
                          htmlElement.val('<?=date("Y-m-d")?>');
                      }
		},
		{ text: "Transaksi", datafield: "transaksi",width: "20%",filtertype: 'input', filtercondition: 'starts_with'},
		{ text: "Keterangan", datafield: "keterangan",width: "30%" }
    ]
});
jqxGridJurnal.on('rowselect', function (event) {
  $("#deleterowbutton").removeAttr("disabled");
  $("#saverowbutton").removeAttr("disabled");
  var row = event.args.row;
  dataJurnal = row;
	jqxGridJurnalDetail.jqxGrid('clear');
	jqxGridJurnalDetail.jqxGrid('clearselection');
	jqxGridJurnalDetail.jqxGrid('source')._source.data.idjurnal = dataJurnal.replid;
	jqxGridJurnalDetail.jqxGrid('updatebounddata');
	
});

            