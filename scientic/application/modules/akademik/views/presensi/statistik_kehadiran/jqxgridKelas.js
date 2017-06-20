jqxGridKelas = $("#jqxGridKelas");
jqxGridKelasDataFields = [
	{ "name": "replid"},
	{ "name": "kelas"},
	{ "name": "hadir"},
	{ "name": "ijin"},
	{ "name": "sakit"},
	{ "name": "alpa"},
	{ "name": "cuti"},
	{ "name": "keterangn"}
];
  
  var dataSource = {
	  datatype: "json",
	  datafields: jqxGridKelasDataFields,
	  url: current_url()+"/grid_data/",
		data: {
					idtingkat:$("#siswa_tingkat").val(),
					idtahunajaran:$("#siswa_idtahunajaran").val(),
					idsemester:$("#idsemester").val(),
					tanggal_awal:'<?=date("Y-m-d")?>',
					tanggal_akhir:'<?=date("Y-m-d")?>'
				},
	 type:'post'
  }
  var adapter = new $.jqx.dataAdapter(dataSource);
  // update data source.
   
jqxGridKelas.jqxGrid(
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
		{ text: "Kelas", datafield: "kelas",width: "50%" },
		{ text: "hadir", datafield: "hadir",width: "10%"},
		{ text: "ijin", datafield: "ijin",width: "10%"},
		{ text: "sakit", datafield: "sakit",width: "10%"},
		{ text: "alpa", datafield: "alpa",width: "10%"},
		{ text: "cuti", datafield: "cuti",width: "10%"}
    ]
});
jqxGridKelas.on('rowselect', function (event) {
  var row = event.args.row;
		jqxGridDetailPresensi.jqxGrid('source')._source.data.idkelas= row.replid;
		jqxGridSiswa.jqxGrid('source')._source.data.idkelas= row.replid;
		jqxGridSiswa.jqxGrid('source')._source.data.idsemester= $("#idsemester").val();
		jqxGridSiswa.jqxGrid('updatebounddata');
});
