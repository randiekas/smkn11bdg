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
				if(response.tagihan != null)
				{
					var form = document.getElementById("form_tagihan");
					tagihan = response.tagihan;
					$("#replid").val(tagihan.replid);
					$('.besar').val(tagihan.besar)
					$('.cicilan').val(tagihan.cicilan)
					
					form.ts.value = tagihan.ts;
					form.lunas.value = tagihan.lunas;
					form.keterangan.value = tagihan.keterangan;
					
					if(tagihan.lunas=="0")
					{
						$("#tambahCicilan").jqxButton({disabled:false});
						$("#hapusCIcilan").jqxButton({disabled:false});
					}else{
						$("#tambahCicilan").jqxButton({disabled:true});
						$("#hapusCIcilan").jqxButton({disabled:true});
					}
					jqxgridDetailPembayaran.jqxGrid('source')._source.data.idbesarjtt = tagihan.replid;
					jqxgridDetailPembayaran.jqxGrid('updatebounddata');
				}else{
						$("#tambahCicilan").jqxButton({disabled:true});
						$("#hapusCIcilan").jqxButton({disabled:true});
					}
					
					jqxgridDetailPembayaran.jqxGrid('clear');
					jqxgridDetailPembayaran.jqxGrid('clearselection');
			}
		});
	 
});

            