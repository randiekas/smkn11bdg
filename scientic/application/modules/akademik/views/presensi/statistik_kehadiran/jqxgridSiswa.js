jqxGridSiswa = $("#jqxGridSiswa");
jqxGridSiswaDataFields = [
	{ "name": "replid"},
	{ "name": "idpresensi"},
	{ "name": "nis"},
	{ "name": "nama"},
	{ "name": "hadir"},
	{ "name": "ijin"},
	{ "name": "sakit"},
	{ "name": "alpa"},
	{ "name": "cuti"},
	{ "name": "keterangn"}
];  
  var dataSource = {
	  datatype: "json",
	  datafields: jqxGridSiswaDataFields,
	  url: current_url()+"/grid_data_siswa/",
		data: {
					idkelas:'',
					idsemester:$("#idsemester").val(),
					tanggal_awal:'<?=date("Y-m-d")?>',
					tanggal_akhir:'<?=date("Y-m-d")?>'
				},
	 type:'post'
  }
  var adapter = new $.jqx.dataAdapter(dataSource);
  // update data source.
   
jqxGridSiswa.jqxGrid(
{
	theme:themeWidget,
    source: adapter,
   width : "99.80%",
   height : $( window ).height()-50,
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
   editmode:'dblclick',
   //selectionmode:'multiplecellsadvanced',
   groupable: false, 
     columns: [
		{ text: "NIS", datafield: "nis",width: "20%",editable:false},
		{ text: "Nama", datafield: "nama",width: "30%" ,editable:false},
		{ text: "hadir", datafield: "hadir",width: "10%"},
		{ text: "ijin", datafield: "ijin",width: "10%"},
		{ text: "sakit", datafield: "sakit",width: "10%"},
		{ text: "alpa", datafield: "alpa",width: "10%"},
		{ text: "cuti", datafield: "cuti",width: "10%"}
    ]
});
jqxGridSiswa.on('rowselect', function (event) {
  var row = event.args.row;
		jqxGridDetailPresensi.jqxGrid('source')._source.data.nis= row.nis;
		jqxGridDetailPresensi.jqxGrid('updatebounddata');
});
