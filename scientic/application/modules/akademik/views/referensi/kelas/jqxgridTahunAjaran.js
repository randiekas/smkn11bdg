jqwidgetsTahunAjaran = $("#jqwidgetsTahunAjaran");
var url = current_url()+"/getTahunAjaran/";
// prepare the data
var source =
{
    datatype: "json",
    datafields: [
		{ "name": "replid"},
		{ "name": "tahunajaran"},
		{ "name": "departemen"},
		{ "name": "tglmulai"},
		{ "name": "tglakhir"},
		{ "name": "aktif"},
		{ "name": "keterangan"}
  	],
    id: 'sandi_dosen',
    url: url
};
var dataadapter = new $.jqx.dataAdapter(source);
jqwidgetsTahunAjaran.jqxGrid(
{
  theme:themeWidget,
   width : "100%",
   height : $( window ).height()-110,
   source: dataadapter,
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
   editable:false,
   groupable: true,
   groups:['departemen'],
     columns: [
    { text: "Depertemen", datafield: "departemen",width: "20%"},
	{ text: "Tahun Ajaran", datafield: "tahunajaran",width: "20%" },
	{ text: "Mulai", datafield: "tglmulai",width: "15%"},
	{ text: "Berakhir", datafield: "tglakhir",width: "15%"},
	{ text: "Keterangan", datafield: "keterangan",width: "20%" },
	{ text: "Aktif ?", datafield: "aktif",columntype:"checkbox",width: "10%"}
    ]
});
jqwidgetsTahunAjaran.on('rowselect', function (event) {
  $("#addrowbutton").removeAttr("disabled");
  
  jqwidgetsKelas.jqxGrid('showloadelement');
	var row  = event.args.row;
	jqwidgetsKelas.jqxGrid("source")._source.data.idtahunajaran=row.replid;
	jqwidgetsKelas.jqxGrid('updatebounddata');
	
});
jqwidgetsTahunAjaran.on('bindingcomplete',function(event){
			jqwidgetsTahunAjaran.jqxGrid('expandallgroups');
	});
jqwidgetsTahunAjaran.on("filter", function (event) 
{
	jqwidgetsTahunAjaran.jqxGrid('sortby', 'tahunajaran', 'asc');
    jqwidgetsTahunAjaran.jqxGrid('expandallgroups');
});        