jqxGridJurnalDetail = $("#jqxGridJurnalDetail");
jqxGridJurnalDetailDataFields = [
	{ "name": "tanggal"},
	{ "name": "petugas"},
	{ "name": "transaksi"},
	{ "name": "keterangan"},
	{ "name": "nokas"},
	{ "name": "debet",'type':'number'},
	{ "name": "kredit",'type':'number'}
];   
  var dataSource = {
	  datatype: "json",
	  datafields: jqxGridJurnalDetailDataFields,
	  url: current_url()+"/grid_jurnal_detail/",
		data: {
					koderek:'',
					tanggal_awal:'',
					tanggal_akhir:''
				},
	 type:'post'
  }
  var adapter = new $.jqx.dataAdapter(dataSource);
  // update data source.
   
jqxGridJurnalDetail.jqxGrid(
{
	theme:themeWidget,
    source: adapter,
   width : "100%",
   height : $( window ).height()-($( window ).height()*0.6),
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
   everpresentrowactions: "addBottom reset",
   editable:false,
   //editmode:'dblclick',
   editmode:'click',
   selectionmode:'multiplecellsadvanced',
   groupable: false,
   showtoolbar:true,
   localization:{ currencysymbol: "Rp.",currencysymbolposition: "before"},
     columns: [
		 {text: '#', sortable: false, filterable: false, editable: false,
						  groupable: false, draggable: false, resizable: false,
						  datafield: '', columntype: 'number', width: '5%',
						  cellsrenderer: function (row, column, value) {
							  return "<div style='margin:4px;'>" + (value + 1) + "</div>";
		 }},
		{ text: "No Jurnal", datafield: "nokas",width: "15%" },
		{ text: "Tanggal", datafield: "tanggal",width: "15%" },
		{ text: "Petugas", datafield: "petugas",width: "10%" },
		{ text: "Transaksi", datafield: "transaksi",width: "15%" },
		{ text: "Debet", datafield: "debet",width: "20%",aggregates: ['sum'],cellsformat:'c2'},
		{ text: "Kredit", datafield: "kredit",width: "20%",aggregates: ['sum'],cellsformat:'c2'},
    ]
});
jqxGridJurnalDetail.on('rowselect', function (event) {
  $("#deleterowbutton").removeAttr("disabled");
  $("#saverowbutton").removeAttr("disabled");
  var row = event.args.row;
  dataJurnalDetail  = row;
	 
});

            