jqxGridJurnal = $("#jqxGridJurnal");
jqxGridJurnalDataFields = [
	{ "name": "replid"},
	{ "name": "sumber"},
	{ "name": "idsumber"},
	{ "name": "tanggal",'type':'date'},
	{ "name": "transaksi"},
	{ "name": "petugas"},
	{ "name": "nokas"},
	{ "name": "idtahunbuku"},
	{ "name": "keterangan"},
	{ "name": "debet",'type':'number'},
	{ "name": "kredit",'type':'number'},
	{ "name": "departemen"}

];   
  var dataSource = {
	  id: 'replid',
	  datatype: "json",
	  datafields: jqxGridJurnalDataFields,
	  root: 'Rows',
	  pagesize: 50,
	   filter: function()
     {
       // update the grid and send a request to the server.
       jqxGridJurnal.jqxGrid('updatebounddata', 'filter');
     },
     cache: false,
     sort: function()
     {
       // update the grid and send a request to the server.
       jqxGridJurnal.jqxGrid('updatebounddata', 'sort');
     },
    beforeprocessing: function(data)
    {
      dataSource.totalrecords = data[0].TotalRows;
    },
	  url: current_url()+"/grid/",
		data: {
					tanggal_awal:'',
					tanggal_akhir:'',
					idtahunbuku:'',
					idbukubesar:''
				}
	 //,type:'get',
  }
  var adapter = new $.jqx.dataAdapter(dataSource);
  // update data source.
   
jqxGridJurnal.jqxGrid(
{
	theme:themeWidget,
    source: adapter,
   width : "100%",
   height : $( window ).height(),
   autoheight: false,
   pageable: true,
   virtualmode: false,
   showfilterrow: true,
   showstatusbar:true,
   showaggregates:true,
   filterable: true,
   sortable: true,
   columnsResize: true,
   altrows: true,
   selectionmode:'multiplecellsextended',
   enablebrowserselection:false,
   groupable: false,
   pagesizeoptions:[50,100,150,200],
   localization:{ currencysymbol: "Rp.",currencysymbolposition: "before", patterns: {d: "d/M/yyyy",}},
     columns: [
		 {text: '#', sortable: false, filterable: false, editable: false,
						  groupable: false, draggable: false, resizable: false,
						  datafield: '', columntype: 'number', width: '5%',
						  cellsrenderer: function (row, column, value) {
							  return "<div style='margin:4px;'>" + (value + 1) + "</div>";
		 }},
		{ text: "Tanggal", datafield: "tanggal",width: "15%",columntype: 'datetimeinput',cellsformat:'d'},
		{ text: "No.Jurnal", datafield: "nokas",width: "15%" },
		{ text: "Petugas", datafield: "petugas",width: "10%" },
		{ text: "Transaksi", datafield: "transaksi",width: "25%" },
		{ text: "Debet", datafield: "debet",width: "15%",cellsformat:'c2',filtertype:'number',aggregates: ['sum']},
		{ text: "Kredit", datafield: "kredit",width: "15%",cellsformat:'c2',filtertype:'number',aggregates: ['sum']}
    ]
});