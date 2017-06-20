jqwidgetsGuruMengajar = $("#jqwidgetsGuruMengajar");
var url = current_url()+"/getGuruMengajar/";
// prepare the data
var source =
{
    datatype: "json",
    datafields: [
		{ "name": "departemen"},
		{ "name": "tahunajaran"},
		{ "name": "idtingkat"},
		{ "name": "tingkat"},
		{ "name": "idkelas"},
		{ "name": "kelas"},
		{ "name": "idsemester"},
		{ "name": "semester"},
		{ "name": "idpelajaran"},
		{ "name": "kode"},
		{ "name": "nama_pelajaran","type":"string"},
		{ "name": "nip","type":"string"},
		{ "name": "nama_pegawai","type":"string"}
  	],
    url: url
};
var dataadapter = new $.jqx.dataAdapter(source);
jqwidgetsGuruMengajar.jqxGrid(
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
   groupsexpandedbydefault: true,
   groupable: true,
   groups:['departemen'],
     columns: [
		{ text: "Departemen", datafield: "departemen",width: "10%",filtertype:'checkedlist'},
		{ text: "Tingkat", datafield: "tingkat",width: "10%",filtertype:'checkedlist',filtertype:'checkedlist'},
		{ text: "Kelas", datafield: "kelas",width: "10%",filtertype:'checkedlist',filtertype:'checkedlist'},
		{ text: "Kode", datafield: "kode",width: "10%",filtertype:'checkedlist',filtertype:'checkedlist'},
		{ text: "Pelajaran", datafield: "nama_pelajaran",width: "25%"},
		{ text: "NIP", datafield: "nip",width: "20%"},
		{ text: "Nama", datafield: "nama_pegawai",width: "25%"},
    ]
});
jqwidgetsGuruMengajar.on('rowselect', function (event) {
  //$("#addrowbutton").removeAttr("disabled");
	jqwidgetsTingkat.jqxGrid('showloadelement');
	var row  = event.args.row;
	dataGuruMengajar = row;
	jqwidgetsTingkat.jqxGrid("source")._source.data.departemen=row.departemen;
	jqwidgetsTingkat.jqxGrid("source")._source.data.nipguru=row.nip;
	jqwidgetsTingkat.jqxGrid("source")._source.data.idtingkat=row.idtingkat;
	jqwidgetsTingkat.jqxGrid("source")._source.data.idpelajaran=row.idpelajaran;
	
	$.ajax({
		datatype: "json",
		 url: current_url()+'/getRPP/',
		 type:'POST',
		data:{idtingkat:dataGuruMengajar.idtingkat,idsemester:dataGuruMengajar.idsemester,idpelajaran:dataGuruMengajar.idpelajaran},
		success:function(data){
			rpp = data;
		}
	});
	
	jqwidgetsTingkat.jqxGrid('updatebounddata');
	jqwidgetsTingkat.jqxGrid({groups:['dasarpenilaian']});
	
	jqwidgetsTingkat.jqxGrid('clearselection');
	jqwidgetsBobot.jqxGrid('clearselection');
	jqwidgetsGrading.jqxGrid('clearselection');
	
	jqwidgetsBobot.jqxGrid('clear');
	jqwidgetsGrading.jqxGrid('clear');
});