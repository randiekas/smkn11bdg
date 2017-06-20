jqxGridDetailPresensi = $("#jqxGridDetailPresensi");
jqxGridDetailPresensiDataFields = [
	{ "name": "replid"},
	{ "name": "idpresensi"},
	{ "name": "tanggal"},
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
	  datafields: jqxGridDetailPresensiDataFields,
	  url: current_url()+"/grid_data_detail/",
		data: {
					idkelas:'',
					idsemester:$("#idsemester").val(),
					tanggal_awal:'<?=date("Y-m-d")?>',
					tanggal_akhir:'<?=date("Y-m-d")?>',
					nis:null,
				},
	 type:'post'
  }
  var adapter = new $.jqx.dataAdapter(dataSource);
  // update data source.
   
jqxGridDetailPresensi.jqxGrid(
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
		{ text: "Tanggal", datafield: "tanggal",width: "20%",editable:false},
		{ text: "Nama", datafield: "nama",width: "30%" ,editable:false},
		{ text: "hadir", datafield: "hadir",width: "10%",
			columntype:"checkbox",
			createEverPresentRowWidget: function (datafield, htmlElement, popup, addCallback) {
				var inputTag = $("<div style ='border: none;margin-left:42%'> </ div>").appendTo(htmlElement);
				inputTag.jqxCheckBox({ width: 10, height: 10 });
				return inputTag;
			},
			getEverPresentRowWidgetValue: function (datafield, htmlElement, validate) {
									return htmlElement.jqxCheckBox('val');
			}
		},
		{ text: "ijin", datafield: "ijin",width: "10%",
			columntype:"checkbox",
			createEverPresentRowWidget: function (datafield, htmlElement, popup, addCallback) {
				var inputTag = $("<div style ='border: none;margin-left:42%'> </ div>").appendTo(htmlElement);
				inputTag.jqxCheckBox({ width: 10, height: 10 });
				return inputTag;
			},
			getEverPresentRowWidgetValue: function (datafield, htmlElement, validate) {
									return htmlElement.jqxCheckBox('val');
			}},
		{ text: "sakit", datafield: "sakit",width: "10%",
			columntype:"checkbox",
			createEverPresentRowWidget: function (datafield, htmlElement, popup, addCallback) {
				var inputTag = $("<div style ='border: none;margin-left:42%'> </ div>").appendTo(htmlElement);
				inputTag.jqxCheckBox({ width: 10, height: 10 });
				return inputTag;
			},
			getEverPresentRowWidgetValue: function (datafield, htmlElement, validate) {
									return htmlElement.jqxCheckBox('val');
			}},
		{ text: "alpa", datafield: "alpa",width: "10%",
			columntype:"checkbox",
			createEverPresentRowWidget: function (datafield, htmlElement, popup, addCallback) {
				var inputTag = $("<div style ='border: none;margin-left:42%'> </ div>").appendTo(htmlElement);
				inputTag.jqxCheckBox({ width: 10, height: 10 });
				return inputTag;
			},
			getEverPresentRowWidgetValue: function (datafield, htmlElement, validate) {
									return htmlElement.jqxCheckBox('val');
			}},
		{ text: "cuti", datafield: "cuti",width: "10%",
			columntype:"checkbox",
			createEverPresentRowWidget: function (datafield, htmlElement, popup, addCallback) {
				var inputTag = $("<div style ='border: none;margin-left:42%'> </ div>").appendTo(htmlElement);
				inputTag.jqxCheckBox({ width: 10, height: 10 });
				return inputTag;
			},
			getEverPresentRowWidgetValue: function (datafield, htmlElement, validate) {
									return htmlElement.jqxCheckBox('val');
			}}
    ]
});
