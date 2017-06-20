jqwidgetsGuruMengajar = $("#jqwidgetsGuruMengajar");
var url = current_url()+"/getGuruMengajar/";
// prepare the data
var source =
{
    datatype: "json",
    datafields: [
		{ "name": "idpelajaran"},
		{ "name": "departemen"},
		{ "name": "kode"},
		{ "name": "nama_pelajaran"},
		{ "name": "nip"},
		{ "name": "nama_pegawai"},

  	],
    url: url
};
var dataadapter = new $.jqx.dataAdapter(source);
jqwidgetsGuruMengajar.jqxGrid(
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
     columns: [
		{ text: "Departemen", datafield: "departemen",width: "15%" },
		{ text: "Kode", datafield: "kode",width: "15%" },
		{ text: "Pelajaran", datafield: "nama_pelajaran",width: "25%" },
		{ text: "NIP", datafield: "nip",width: "20%" },
		{ text: "Nama", datafield: "nama_pegawai",width: "25%" },
    ]
});
jqwidgetsGuruMengajar.on('rowselect', function (event) {
  //$("#addrowbutton").removeAttr("disabled");
	jqwidgetsTingkat.jqxGrid('showloadelement');
	var row  = event.args.row;
	dataGuruMengajar = row;
	jqwidgetsTingkat.jqxGrid("source")._source.data.departemen=row.departemen;
	jqwidgetsTingkat.jqxGrid('updatebounddata');
});
