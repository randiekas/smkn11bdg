jqwidgetsGuruMengajar = $("#jqwidgetsGuruMengajar");
var url = current_url()+"/getGuruMengajar/";
// prepare the data
var source =
{
    datatype: "json",
    datafields: [
		{ "name": "idpelajaran"},
		{ "name": "departemen",type: 'string'},
		{ "name": "kode",type: 'string'},
		{ "name": "nama_pelajaran",type: 'string'},
		{ "name": "nip",type: 'string'},
		{ "name": "nama_pegawai",type: 'string'},

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
   groupable: true,
   groups:['departemen'],
     columns: [
		{ text: "Departemen", datafield: "departemen",width: "15%",filtertype:'checkedlist'},
		{ text: "Kode", datafield: "kode",width: "15%",filtertype:'checkedlist'},
		{ text: "Pelajaran", datafield: "nama_pelajaran",width: "25%"},
		{ text: "NIP", datafield: "nip",width: "20%"},
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
	jqwidgetsTingkat.jqxGrid({groups:['tingkat']});
	
	jqwidgetsTingkat.jqxGrid('clearselection');
	jqwidgetsBobot.jqxGrid('clearselection');
	jqwidgetsGrading.jqxGrid('clearselection');
	
	jqwidgetsBobot.jqxGrid('clear');
	jqwidgetsGrading.jqxGrid('clear');
	
	
});

jqwidgetsGuruMengajar.on('bindingcomplete',function(event){
			jqwidgetsGuruMengajar.jqxGrid('expandallgroups');
	});
jqwidgetsGuruMengajar.on("filter", function (event) 
{
    jqwidgetsGuruMengajar.jqxGrid('expandallgroups');                    
});
jqwidgetsGuruMengajar.on("sort", function (event) 
{
    jqwidgetsGuruMengajar.jqxGrid('expandallgroups');	
});