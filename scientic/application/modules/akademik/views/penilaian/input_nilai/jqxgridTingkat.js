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
		{ "name": "keterangan"},
		{ "name": "nipguru"},
		{ "name": "idtingkat"},
		{ "name": "idpelajaran"},
		{ "name": "idjenisujian"},
		{ "name": "idaturan"},
		{ "name": "jenisujian"},
		{ "name": "jenisujianketerangan"},
		{ "name": "bobot"}

  	],
	data:{departemen:'',nipguru:'',idtingkat:'',idpelajaran:''},
	type:'POST',
    url: url
};
var dataadapter = new $.jqx.dataAdapter(source);
jqwidgetsTingkat.jqxGrid(
{
  theme:themeWidget,
   width : "99.80%",
   height : $( window ).height(),
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
   groupsexpandedbydefault: true,
   groupable: true,
   groups:['dasarpenilaian'],
     columns: [
    { text: "Aspek", datafield: "dasarpenilaian",width: "25%" },
	{ text: "Jenis Ujian", datafield: "jenisujian",width: "25%" },
	{ text: "Bobot (%)", datafield: "bobot",width: "15%" },
	{ text: "Keterangan", datafield: "jenisujianketerangan",width: "35%" },
    ]
});
jqwidgetsTingkat.on('rowselect', function (event) {
	if($("#addGrading").val())
	{
		$("#addGrading").jqxButton({disabled:false});
	}
	
	
	jqwidgetsGrading.jqxGrid('showloadelement');
	var row  = event.args.row;
	dataAspekPenilaian = row;
	
	
	jqwidgetsGrading.jqxGrid("source")._source.data.idpelajaran=dataGuruMengajar.idpelajaran;
	jqwidgetsGrading.jqxGrid("source")._source.data.idkelas=dataGuruMengajar.idkelas;
	jqwidgetsGrading.jqxGrid("source")._source.data.idsemester=dataGuruMengajar.idsemester;
	jqwidgetsGrading.jqxGrid("source")._source.data.idjenis=row.idjenisujian;
	jqwidgetsGrading.jqxGrid("source")._source.data.idaturan=row.idaturan;
	jqwidgetsGrading.jqxGrid({showeverpresentrow: false});
	jqwidgetsGrading.jqxGrid('clearselection');
	jqwidgetsGrading.jqxGrid('updatebounddata');
	
	jqwidgetsBobot.jqxGrid("source")._source.data.nip=dataGuruMengajar.nip;
	jqwidgetsBobot.jqxGrid("source")._source.data.idtingkat=row.replid;
	jqwidgetsBobot.jqxGrid("source")._source.data.idpelajaran=dataGuruMengajar.idpelajaran;
	jqwidgetsBobot.jqxGrid("source")._source.data.dasarpenilaian=row.dasarpenilaian;

	
	jqwidgetsBobot.jqxGrid('clearselection');
	jqwidgetsBobot.jqxGrid('clear');
	
});