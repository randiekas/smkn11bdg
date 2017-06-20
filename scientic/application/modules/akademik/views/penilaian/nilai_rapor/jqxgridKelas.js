jqwidgetsKelas = $("#jqwidgetsKelas");
var url = current_url()+"/getKelas/";
// prepare the data
var source =
{
    datatype: "json",
    datafields: [
		{ "name": "departemen"},
		{ "name": "idtingkat"},
		{ "name": "tingkat"},
		{ "name": "idtahunajaran"},
		{ "name": "tahunajaran"},
		{ "name": "idsemester"},
		{ "name": "semester"},
		{ "name": "idkelas"},
		{ "name": "kelas"}
  	],
    url: url
};
var dataadapter = new $.jqx.dataAdapter(source);
jqwidgetsKelas.jqxGrid(
{
  theme:themeWidget,
   width : "99.80%",
   height : $( window ).height()-45,
   source: dataadapter,
   autoheight: false,
   showaggregates: true,
   pageable: false,
   pagesize:500,
   showfilterrow: true,
   filterable: true,
   sortable: true,
   columnsResize: true,
   altrows: true,
   showeverpresentrow: false,
   everpresentrowposition: "top",
   everpresentrowactions: "add reset",
   editable:false,
   groupable: true,
   groupsexpandedbydefault: true,
   groups:['departemen'],
     columns: [
		{ text: "Departemen", datafield: "departemen",width: "10%",filtertype:'checkedlist'},
		{ text: "Tahun Ajaran", datafield: "tahunajaran",width: "20%",filtertype:'checkedlist'},
		{ text: "Tingkat", datafield: "tingkat",width: "10%",filtertype:'checkedlist'},
		{ text: "Semester", datafield: "semester",width: "20%",filtertype:'checkedlist'},
		{ text: "Kelas", datafield: "kelas",width: "40%",filtertype:'checkedlist',filtertype:'checkedlist'}
    ]
});
jqwidgetsKelas.on('rowselect', function (event) {
  //$("#addrowbutton").removeAttr("disabled");
	if($("#hitungNilai").val())
	{
		$("#hitungNilai").jqxButton({disabled:false});
	}
	jqwidgetsSiswa.jqxGrid('showloadelement');
	var row  = event.args.row;
	dataKelas = row;
	jqwidgetsSiswa.jqxGrid("source")._source.data.idkelas=row.idkelas;
	jqwidgetsSiswa.jqxGrid("source")._source.data.idtahunajaran=row.idtahunajaran;
	jqwidgetsSiswa.jqxGrid("source")._source.data.idtingkat=row.idtingkat;
	jqwidgetsSiswa.jqxGrid("source")._source.data.idpelajaran=row.idpelajaran;
	
	jqwidgetsSiswa.jqxGrid('updatebounddata');
	
	jqwidgetsSiswa.jqxGrid('clearselection');
	jqwidgetsUjian.jqxGrid('clearselection');
	

	jqwidgetsUjian.jqxGrid('clear');
});
