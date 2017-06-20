jqxgridDetailPembayaran = $("#jqxgridDetailPembayaran");
jqxgridDetailPembayaranDataFields = [
	{ "name": "replid"},
	{ "name": "tanggal",'type':'date'},
	{ "name": "nokas"},
	{ "name": "koderek"},
	{ "name": "jumlah",'type':'number'},
	{ "name": "info1",'type':'number'},
	{ "name": "keterangan"},
	{ "name": "petugas"},
];   
  var dataSource = {
	  datatype: "json",
	  datafields: jqxgridDetailPembayaranDataFields,
	  url: current_url()+"/grid_data_cicilan/",
		data: {
					idbesarjtt:''
				},
	 type:'post',
	 addrow: function (rowid, rowdata, commit) {
				rowdata.nis = datasiswa.nis;
				rowdata.idpenerimaan = $("#idpenerimaan").val();;
				rowdata.idbesarjtt = tagihan.replid;
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
								else{
									alert.alert("Gagal Menyimpan","Kode UPB telah digunakan, silahkan gunakan kode UPB yang lain.",function(){})
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
   height : $( window ).height()-390,
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
                    container.append('<input id="tambahCicilan" type="button" value="Tambah Cicilan" />');
                    container.append(' <input id="hapusCIcilan" type="button" value="Hapus Cicilan" />');
                    
						
						$("#tambahCicilan").jqxButton({disabled:true});
						$("#hapusCIcilan").jqxButton({disabled:true});
						
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
						$("#hapusCIcilan").on('click', function () {
								if(confirm("Apakah anda yakin akan menghapus cicilan ini ?"))
								{
								jqxgridDetailPembayaran.jqxGrid('showloadelement');
								$.ajax({
									 dataType: 'json',
									 url: current_url()+'/delete_cicilan',
									 type:'post',
									 data:{replid:dataCicilan.replid},
									 success: function (data, status, xhr) {
											if(data.status=='success')
											{
												Notification.open(data.message,"success");
											}else{
												Notification.open(data.message,"error");
											}
											
											jqxgridDetailPembayaran.jqxGrid('updatebounddata', 'sort');
											jqxgridDetailPembayaran.jqxGrid('hideloadelement');
									},
									 error: function (data,status) {
										 Notification.open(Notification.textFailedDelete(),"error");
										 jqxgridDetailPembayaran.jqxGrid('hideloadloadelement');
									 }
								 });
								}
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
		{ text: "Petugas", datafield: "petugas",width: "15%",editable:false,
			createEverPresentRowWidget: function (datafield, htmlElement, popup, addCallback) {
				  var inputTag = $("<div style='border: none;margin:5px'><?=$this->session->userdata('entity_id')?></div>").appendTo(htmlElement);
				  
				  return inputTag;
			  }
		},
		{ text: "Keterangan", datafield: "keterangan",width: "25%",editable:false},
		{ text: "Besar", datafield: "jumlah",width: "25%",editable:false,aggregates: ['sum'],cellsformat:'c2'},
		{ text: "Diskon", datafield: "info1",width: "15%",editable:false,aggregates: ['sum'],cellsformat:'c2'}
		
    ]
});
jqxgridDetailPembayaran.on('rowselect', function (event) {
  $("#deleterowbutton").removeAttr("disabled");
  $("#saverowbutton").removeAttr("disabled");
  var row = event.args.row;
  dataCicilan  = row;
	 
});

            