jqxGridSiswa = $("#jqxGridSiswa");
jqxGridSiswaDataFields = [
	{ "name": "replid"},
	{ "name": "nis"},
	{ "name": "nama"},
];   
  var dataSource = {
	  datatype: "json",
	  datafields: jqxGridSiswaDataFields,
	  url: current_url()+"/grid_data/",
		data: {
				filter:'false',
				field:'',
				keywords:'',
				departemen:$("#calon_departemen").val(),
				idtahunajaran:$("#siswa_idtahunajaran").val(),
				idkelas:$("#siswa_idkelas").val()
				},
	 type:'post'
  }
  var adapter = new $.jqx.dataAdapter(dataSource);
  // update data source.
   
jqxGridSiswa.jqxGrid(
{
	theme:themeWidget,
    source: adapter,
   width : "100%",
   height : $( window ).height()-390,
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
   editable:true,
   editmode:'dblclick',
   //selectionmode:'multiplerows',
   groupable: false,
     columns: [
		{ text: "NIS", datafield: "nis",width: "40%",editable:false},
		{ text: "Nama", datafield: "nama",width: "60%",editable:false}
		
    ]
});
jqxGridSiswa.on('rowselect', function (event) {
  $("#deleterowbutton").removeAttr("disabled");
  $("#saverowbutton").removeAttr("disabled");
  $("#replid").val("");
  $(".form_reset").click();
  var row = event.args.row;
  datasiswa = row;
		$.ajax({
			url:current_url()+"/getDetail",
			type:"post",
			dataType: 'json',
			data:{nis:row.nis,idtahunbuku:$("#idtahunbuku").val()},
			success:function(response){
				$(".span_nis").html(response.nis);
				$(".span_nama").html(response.nama);
				$(".span_kelas").html(response.kelas);
				$(".span_telepon").html(response.telponsiswa);
				$(".span_alamat").html(response.alamatsiswa);
				$(".showfoto").attr("src","<?=base_url()?>assets/siswa/"+response.nis+"/"+response.foto);
					jqxgridDetailPembayaran.jqxGrid({showeverpresentrow:false});
				
					$("#tambahCicilan").jqxButton({disabled:false});
					jqxgridDetailPembayaran.jqxGrid('clear');
					jqxgridDetailPembayaran.jqxGrid('clearselection');
					jqxgridDetailPembayaran.jqxGrid('source')._source.data.nis = row.nis;
					jqxgridDetailPembayaran.jqxGrid('source')._source.data.idpenerimaan = $("#idpenerimaan").val();
					jqxgridDetailPembayaran.jqxGrid('updatebounddata');
			}
		});
	 
});

            