jqxGridJurnal = $("#jqxGridJurnal");
jqxGridJurnalDataFields = [
	{ "name": "tipe",'type':'string'},
	{ "name": "nama",'type':'string'},
	{ "name": "total",'type':'number'}
];   
  var dataSource = {
	  datatype: "json",
	  datafields: jqxGridJurnalDataFields,
	  url: current_url()+"/grid/",
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
   height : $( window ).height(),
   autoheight: false,
   showaggregates: true,
   showstatusbar: false,
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
   selectionmode:'multiplecellsextended',
   enablebrowserselection:false,
   groupable: false,
   localization:{ currencysymbol: "Rp.",currencysymbolposition: "before", patterns: {d: "d/M/yyyy",}},
     columns: [
		 {text: '#', sortable: false, filterable: false, editable: false,
						  groupable: false, draggable: false, resizable: false,
						  datafield: '', columntype: 'number', width: '5%',
						  cellsrenderer: function (row, column, value) {
							  return "<div style='margin:4px;'>" + (value + 1) + "</div>";
		 }},
		{ text: "Rekening", datafield: "nama",width: "45%",
			cellsrenderer: function (row, column, value) {
							var data = jqxGridJurnal.jqxGrid('getrowdata',row);
							var space = "&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ";
							if(data.tipe=="TOTAL"){
								value = "<b>"+space+value+"</b>";
							}else if(data.tipe=="HEADER"){
								value = "<b>"+value+"</b>";
							}else if(data.tipe=="LABA"){
								value = "<b>"+value+"</b>";
							}else{
								value = space+value;
							}
							return "<div style='margin:4px;'>" + value + "</div>";
			}
		},
		{ text: "Total", datafield: "total",width: "50%",cellsformat:'c2',filtertype:'number'}
    ]
});