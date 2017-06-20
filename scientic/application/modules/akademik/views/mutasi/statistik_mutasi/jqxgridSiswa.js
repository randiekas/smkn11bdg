jqxGridSiswa = $("#jqxGridSiswa");
jqxGridSiswaDataFields = [
	{ "name": "replid"},
	{ "name": "nis"},
	{ "name": "nisn"},
	{ "name": "nik"},
	{ "name": "nama"},
	{ "name": "asalsekolah"},
	{ "name": "lahir"},
	{ "name": "tglmutasi"}
];

   
  var dataSource = {
	  datatype: "json",
	  datafields: jqxGridSiswaDataFields,
	  url: current_url()+"/grid_data/",
		data: {jenismutasi:null},
	 type:'post'
  }
  var adapter = new $.jqx.dataAdapter(dataSource);
  // update data source.
   
jqxGridSiswa.jqxGrid(
{
	theme:themeWidget,
    source: adapter,
   width : "100%",
   height : $( window ).height()-100,
   autoheight: false,
   showaggregates: true,
   pageable: true,
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
   //selectionmode:'multiplerows',
   groupable: false,
     columns: [
		{ text: "NIS", datafield: "nis",width: "15%" },
		{ text: "NISN", datafield: "nisn",width: "15%",editable:false},
		{ text: "Nama", datafield: "nama",width: "25%",editable:false},
		{ text: "Asal Sekolah", datafield: "asalsekolah",width: "25%",editable:false},
		{ text: "TTL", datafield: "lahir",width: "10%",editable:false},
		{ text: "Tanggal Mutasi", datafield: "tglmutasi",width: "10%",editable:false},
    ]
});
jqxGridSiswa.on('rowselect', function (event) {
  $("#deleterowbutton").removeAttr("disabled");
  $("#saverowbutton").removeAttr("disabled");
  var row = event.args.row;
		
		$.ajax({
			url:current_url()+"/getDetail",
			type:"post",
			dataType: 'json',
			data:{nis:row.nis},
			success:function(response){
				$(".showfoto").attr("src","<?=base_url()?>assets/siswa/"+response.nis+"/"+response.foto);
				$(".formcalonsiswa input,.formcalonsiswa textarea,.formcalonsiswa select").each(function(){
					if($(this).attr("type")!="file")
					{
						
						if($(this).attr("type")=="radio")
						{
							
						  $("input[type=radio][name='"+$(this).attr("name")+"']").removeAttr("checked");
						  
						  $("input[type=radio][name='"+$(this).attr("name")+"'][value='"+response[$(this).attr("name")]+"']").prop("checked",true);
						  

						}else{
						$(this).val(response[$(this).attr("name")]);	
						}
					}
				});
				/*
				
				*/
				
			}
		});
	if(row.siswa==1)
	{
		setTimeout(function(){
			jqxGridSiswa.jqxGrid('unselectrow', event.args.rowindex);
		},200);		
	}
	else{
		//$("#addrowbutton").removeAttr("disabled");
	}
});

 

            jqxGridSiswa.on('rowclick', function (event) {
                if (event.args.rightclick) {
                    jqxGridSiswa.jqxGrid('selectrow', event.args.rowindex);
                    var scrollTop = $(window).scrollTop();
                    var scrollLeft = $(window).scrollLeft();
                    contextMenu.jqxMenu('open', parseInt(event.args.originalEvent.clientX) + 5 + scrollLeft, parseInt(event.args.originalEvent.clientY) + 5 + scrollTop);

                    return false;
                }
            });