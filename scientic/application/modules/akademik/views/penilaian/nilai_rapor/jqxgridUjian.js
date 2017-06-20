jqwidgetsUjian = $("#jqwidgetsNAU");
jqwidgetsUjianDataFields = [
		{ "name": "pelajaran","type":"string"},
		{ "name": "dasarpenilaian","type":"string"},
		{ "name": "kkm","type":"string"},
		{ "name": "nilaiangka","type":"string"},
		{ "name": "nilaihuruf","type":"string"}
		];
   
  var dataSource = {
		  datatype: "json",
		  datafields: jqwidgetsUjianDataFields,
		  id:"replid",
		url: current_url()+"/getNilai/",
		data:{idkelas:'',idsemester:'',nis:''},
		type:'post',
		id:'replid'
  }
  var adapter = new $.jqx.dataAdapter(dataSource);
  // update data source.
   
jqwidgetsUjian.jqxGrid(
{
  theme:themeWidget,
    source: adapter,
   width : "99.80%",
   height : $( window ).height()-45,
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
   editmode:'dblclick',
   groupsexpandedbydefault: true,
   groupable: true,
   groups:['pelajaran'],
   showtoolbar:false,
   columns: [
		{ text: "Pelajaran", datafield: "pelajaran",width: "200px",editable:false},
		{ text: "Aspek", datafield: "dasarpenilaian",width: "150px",editable:false},
		{ text: "KKM", datafield: "kkm",width: "50px",editable:false},
		{ text: "Angka", datafield: "nilaiangka",width: "80px",editable:false},
		{ text: "Huruf", datafield: "nilaihuruf",width: "80px",editable:false}		
    ]
});
