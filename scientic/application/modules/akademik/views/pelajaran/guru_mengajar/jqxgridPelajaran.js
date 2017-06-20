jqwidgetsPelajaran = $("#jqwidgetsPelajaran");
var url = current_url()+"/getPelajaran/";
// prepare the data
var source =
{
    datatype: "json",
    datafields: [
		{ "name": "replid"},
		{ "name": "kode",type: 'string'},
		{ "name": "nama",type: 'string'},
		{ "name": "departemen",type: 'string'},
		{ "name": "sifat",type: 'bool'},
		{ "name": "aktif",type: 'bool'},
		{ "name": "keterangan",type: 'string'}
  	],
    id: 'replid',
    url: url
};
var dataadapter = new $.jqx.dataAdapter(source);
jqwidgetsPelajaran.jqxGrid(
{
  theme:themeWidget,
   width : "100%",
   height : $( window ).height()-110,
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
    { text: "Depertemen", datafield: "departemen",width: "15%",filtertype:'checkedlist'},
	{ text: "Kode", datafield: "kode",width: "15%",filtertype:'checkedlist'},
	{ text: "Pelajaran", datafield: "nama",width: "25%",filtertype:'checkedlist'},
	{ text: "Keterangan", datafield: "keterangan",width: "25%" },
	{ text: "Wajib ?", datafield: "sifat",columntype:"checkbox",filtertype:'bool'},
	{ text: "aktif", datafield: "aktif",columntype:"checkbox",filtertype:'bool'}
    ]
});
jqwidgetsPelajaran.on('rowselect', function (event) {
  $("#addrowbutton").removeAttr("disabled");
  
  jqwidgetsGuruMengajar.jqxGrid('showloadelement');
	var row  = event.args.row;
	jqwidgetsGuruMengajar.jqxGrid("source")._source.data.idpelajaran=row.replid;
	jqwidgetsGuruMengajar.jqxGrid("clearselection");
	jqwidgetsGuruMengajar.jqxGrid('updatebounddata');
	jqwidgetsGuruMengajar.jqxGrid({showeverpresentrow: false});
	
});

jqwidgetsPelajaran.on('bindingcomplete',function(event){
			jqwidgetsPelajaran.jqxGrid('expandallgroups');
	});
jqwidgetsPelajaran.on("filter", function (event) 
{
    jqwidgetsPelajaran.jqxGrid('expandallgroups');                    
});
jqwidgetsPelajaran.on("sort", function (event) 
{
    jqwidgetsPelajaran.jqxGrid('expandallgroups');
                        
});