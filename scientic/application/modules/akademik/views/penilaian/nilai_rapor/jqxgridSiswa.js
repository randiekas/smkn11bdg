jqwidgetsSiswa = $("#jqwidgetsSiswa");
var url = current_url()+"/getSiswa/";
// prepare the data
var source =
{
    datatype: "json",
    datafields: [
		{ "name": "replid"},
		{ "name": "departemen"},
		{ "name": "tahunmasuk"},
		{ "name": "idangkatan"},
		{ "name": "idkelas"},
		{ "name": "kelas"},
		{ "name": "idtahunajaran"},
		{ "name": "nis"},
		{ "name": "nisn"},
		{ "name": "nama"},
		{ "name": "asalsekolah"},
		{ "name": "lahir"},
		{ "name": "aktif"}
  	],
	data:{idkelas:'',idtahunajaran:''},
	type:'POST',
    url: url
};
var dataadapter = new $.jqx.dataAdapter(source);
jqwidgetsSiswa.jqxGrid(
{
  theme:themeWidget,
   width : "99.80%",
   height : $( window ).height()-45,
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
   groupable: false,
   showtoolbar:false,
  columns: [
		{ text: "Nama", datafield: "nama",width: "100%",columntype:'textbox'}
    ]
});
jqwidgetsSiswa.on('rowselect', function (event) {

	jqwidgetsUjian.jqxGrid('showloadelement');
	var row  = event.args.row;
	dataAspekPenilaian = row;
	
	jqwidgetsUjian.jqxGrid("source")._source.data.idkelas=dataKelas.idkelas;
	jqwidgetsUjian.jqxGrid("source")._source.data.idsemester=dataKelas.idsemester;
	jqwidgetsUjian.jqxGrid("source")._source.data.nis=row.nis;
	jqwidgetsUjian.jqxGrid('updatebounddata');
	jqwidgetsUjian.on('bindingcomplete',function(event){
			jqwidgetsUjian.jqxGrid({groups:['pelajaran']});
			jqwidgetsUjian.jqxGrid('expandallgroups');
	});
});
