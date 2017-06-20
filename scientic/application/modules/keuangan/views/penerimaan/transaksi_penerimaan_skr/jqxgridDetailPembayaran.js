jqxgridDetailPembayaran = $("#jqxgridDetailPembayaran");
jqxgridDetailPembayaranDataFields = [
	{ "name": "replid"},
	{ "name": "tanggal",'type':'date'},
	{ "name": "jumlah",'type':'number'},
	{ "name": "keterangan"},
	{ "name": "petugas"},
];   
  var dataSource = {
	  datatype: "json",
	  datafields: jqxgridDetailPembayaranDataFields,
	  url: current_url()+"/grid_data_cicilan/",
		data: {
					idtahunbuku:$("#idtahunbuku").val(),
					idpenerimaan:$("#idpenerimaan").val(),
					nis:''
				},
	 type:'post',
	 addrow: function (rowid, rowdata, commit) {
				rowdata.nis = datasiswa.nis;
				rowdata.idpenerimaan = $("#idpenerimaan").val();;
				rowdata.idtahunbuku = $("#idtahunbuku").val();
                 $.ajax({
                     dataType: 'json',
                     url: current_url()+"/save_cicilan/",
                     data: rowdata,
                     type:'post',
                     success: function (data, status, xhr) {
                         // update command is executed.
						 if(data.status_pembayaran==1)
						 {
							 jqxGridSiswa.jqxGrid('selectrow',datasiswa.uid);
						 }else{
							 if(data.status=="success")
							 {
								 Notification.open(Notification.textSuccessCreate(),"success");
								 jqxgridDetailPembayaran.jqxGrid('updatebounddata', 'sort');
							 }
							else{
								if(data.message)
								{
									Notification.open(data.message,"error");
								}
								
							}
						}
                     },
                     error: function (data,status) {
                        Notification.open(Notification.textFailedCreate(),"error");
                         commit(false);
                     }
                 });
            },
  }
  var adapter = new $.jqx.dataAdapter(dataSource);
  // update data source.
   
jqxgridDetailPembayaran.jqxGrid(
{
	theme:themeWidget,
    source: adapter,
   width : "100%",
   height : $( window ).height()-240,
   autoheight: false,
   showstatusbar: true,
   showaggregates: true,
   pageable: false,
   showfilterrow: false,
   filterable: false,
   sortable: true,
   columnsResize: true,
   altrows: true,
   showeverpresentrow: false,
   everpresentrowposition: "top",
   everpresentrowactions: "add reset",
   editable:true,
   editmode:'dblclick',
   //selectionmode:'multiplerows',
   groupable: false,
   showtoolbar:true,
   localization:{ currencysymbol: "Rp.",currencysymbolposition: "before", patterns: {d: "d/M/yyyy",}},
   rendertoolbar: function (toolbar) {
                    var me = this;
                    var container = $("<div style='margin: 5px;'></div>");
                    toolbar.append(container);
                    container.append('<input id="tambahCicilan" type="button" value="Tambah Pembayaran" />');
                    
                    
						
						$("#tambahCicilan").jqxButton({disabled:true});
						
						
						// create new row.
						
						$("#tambahCicilan").on('click', function () {
								jqxgridDetailPembayaran.jqxGrid({showeverpresentrow:true});
								/*
								jqxGridSiswa.jqxGrid('showloadelement');
								$.ajax({
									 dataType: 'json',
									 url: '<?=current_url()?>/reset_siswa_import',
									 type:'post',
									 success: function (data, status, xhr) {
											elementJqxGridReligion.jqxGrid('updatebounddata', 'sort');
											jqxGridSiswa.jqxGrid('hideloadelement');
									},
									 error: function (data,status) {
										 Notification.open(Notification.textFailedDelete(),"error");
										 jqxGridSiswa.jqxGrid('hideloadloadelement');
									 }
								 });
								 */
						});
						
						
		},
     columns: [
		 {text: '#', sortable: false, filterable: false, editable: false,
						  groupable: false, draggable: false, resizable: false,
						  datafield: '', columntype: 'number', width: '5%',
						  cellsrenderer: function (row, column, value) {
							  return "<div style='margin:4px;'>" + (value + 1) + "</div>";
							},
						createEverPresentRowWidget: function (datafield, htmlElement, popup, addCallback) {
							  var inputTag = $("<div style='border: none;margin:5px'>[Auto]</div>").appendTo(htmlElement);
							  
							  return inputTag;
						  }
		},
		{ text: "Tanggal", datafield: "tanggal",width: "15%",editable:false,cellsformat:'d',
			createEverPresentRowWidget: function (datafield, htmlElement, popup, addCallback) {
				  var inputTag = $("<div style='border: none;margin:5px'><?=date('d/m/Y')?></div>").appendTo(htmlElement);		  
				  return inputTag;
			  }
		},
		{ text: "Petugas", datafield: "petugas",width: "20%",editable:false,
			createEverPresentRowWidget: function (datafield, htmlElement, popup, addCallback) {
				  var inputTag = $("<div style='border: none;margin:5px'><?=$this->session->userdata('entity_id')?></div>").appendTo(htmlElement);
				  
				  return inputTag;
			  }
		},
		{ text: "Keterangan", datafield: "keterangan",width: "35%",editable:false},
		{ text: "Besar", datafield: "jumlah",width: "25%",editable:false,aggregates: ['sum'],cellsformat:'c2'}
		
    ]
});
jqxgridDetailPembayaran.on('rowselect', function (event) {
  $("#deleterowbutton").removeAttr("disabled");
  $("#saverowbutton").removeAttr("disabled");
  var row = event.args.row;
  dataCicilan  = row;
	 
});

            