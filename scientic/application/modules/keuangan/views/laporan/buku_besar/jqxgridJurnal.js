jqxGridJurnal = $("#jqxGridJurnal");
jqxGridJurnalDataFields = [
	{ "name": "nama",'type':'string'},
	{ "name": "kode"},
	{ "name": "debet",'type':'number'},
	{ "name": "kredit",'type':'number'}
];   
  var dataSource = {
	  datatype: "json",
	  datafields: jqxGridJurnalDataFields,
	  url: current_url()+"/grid_jurnal/",
		data: {
					tanggal_awal:'',
					tanggal_akhir:'',
					idtahunbuku:'',
					idbukubesar:''
				},
	 type:'post',
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
   showstatusbar: true,
   pageable: false,
   pagesize:500,
   showfilterrow: true,
   filterable: true,
   sortable: true,
   columnsResize: true,
   altrows: false,
   showeverpresentrow: false,
   everpresentrowposition: "bottom",
   everpresentrowactions: "addBottom reset",
   editable:false,
   editmode:'dblclick',
   //selectionmode:'multiplerows',
   groupable: false,
   localization:{ currencysymbol: "Rp.",currencysymbolposition: "before", patterns: {d: "d/M/yyyy",}},
     columns: [
		 {text: '#', sortable: false, filterable: false, editable: false,
						  groupable: false, draggable: false, resizable: false,
						  datafield: '', columntype: 'number', width: '5%',
						  cellsrenderer: function (row, column, value) {
							  return "<div style='margin:4px;'>" + (value + 1) + "</div>";
		 }},
		{ text: "Rekening", datafield: "nama",width: "45%" },
		{ text: "Debet", datafield: "debet",width: "25%",cellsformat:'c2',filtertype:'number' ,aggregates: ['sum']},
		{ text: "Kredit", datafield: "kredit",width: "25%",cellsformat:'c2',filtertype:'number',aggregates: ['sum']},
    ]
});
jqxGridJurnal.on('rowselect', function (event) {
  $("#deleterowbutton").removeAttr("disabled");
  $("#saverowbutton").removeAttr("disabled");
  var row = event.args.row;
  dataJurnal = row;
	jqxGridJurnalDetail.jqxGrid('clear');
	jqxGridJurnalDetail.jqxGrid('clearselection');
	jqxGridJurnalDetail.jqxGrid('source')._source.data.koderek = dataJurnal.kode;
	jqxGridJurnalDetail.jqxGrid('updatebounddata');
});