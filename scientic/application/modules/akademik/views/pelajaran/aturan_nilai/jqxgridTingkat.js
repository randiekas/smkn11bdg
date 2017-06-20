jqwidgetsTingkat = $("#jqwidgetsTingkat");
var url = current_url()+"/getTingkat/";
// prepare the data
var source =
{
    datatype: "json",
    datafields: [
		{ "name": "replid"},
		{ "name": "departemen"},
		{ "name": "tingkat"},
		{ "name": "dasarpenilaian"},
		{ "name": "keterangan"}
  	],
	data:{departemen:''},
    url: url
};
var dataadapter = new $.jqx.dataAdapter(source);
jqwidgetsTingkat.jqxGrid(
{
  theme:themeWidget,
   width : "99.80%",
   height : '100%',
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
   groups:['tingkat'],
     columns: [
	{ text: "Tingkat", datafield: "tingkat",width: "15%" },
	{ text: "Aspek", datafield: "dasarpenilaian",width: "25%" },
	{ text: "Keterangan", datafield: "keterangan",width: "60%" },
    ]
});
jqwidgetsTingkat.on('rowselect', function (event) {
	if($("#addGrading").val())
	{
		$("#addGrading").jqxButton({disabled:false});
	}
	if($("#addBobot").val())
	{
		$("#addBobot").jqxButton({disabled:false});
	}
	
	jqwidgetsGrading.jqxGrid('showloadelement');
	var row  = event.args.row;
	dataTingkat = row;
	jqwidgetsGrading.jqxGrid("source")._source.data.nip=dataGuruMengajar.nip;
	jqwidgetsGrading.jqxGrid("source")._source.data.idtingkat=row.replid;
	jqwidgetsGrading.jqxGrid("source")._source.data.idpelajaran=dataGuruMengajar.idpelajaran;
	jqwidgetsGrading.jqxGrid("source")._source.data.dasarpenilaian=row.dasarpenilaian;
	jqwidgetsGrading.jqxGrid("clearselection");
	jqwidgetsGrading.jqxGrid('updatebounddata');
	jqwidgetsGrading.jqxGrid({showeverpresentrow: false});
	
	
	jqwidgetsBobot.jqxGrid("source")._source.data.nip=dataGuruMengajar.nip;
	jqwidgetsBobot.jqxGrid("source")._source.data.idtingkat=row.replid;
	jqwidgetsBobot.jqxGrid("source")._source.data.idpelajaran=dataGuruMengajar.idpelajaran;
	jqwidgetsBobot.jqxGrid("source")._source.data.dasarpenilaian=row.dasarpenilaian;
	jqwidgetsBobot.jqxGrid("clearselection");
	jqwidgetsBobot.jqxGrid("clear");
	jqwidgetsBobot.jqxGrid('updatebounddata');
	jqwidgetsBobot.jqxGrid({showeverpresentrow: false});
});
