jqxGridAlumni = $("#jqxGridAlumni");
jqxGridAlumniDataFields = [
	{ "name": "replid"},
	{ "name": "nis"},
	{ "name": "nisn"},
	{ "name": "nik"},
	{ "name": "nama"},
	{ "name": "asalsekolah"},
	{ "name": "lahir"},
	{ "name": "tgllulus"},
	{ "name": "kelas"},
	{ "name": "aktif"}
];
var deleteAction= function (ids,commit) {
      // synchronize with the server - send delete command
      // call commit with parameter true if the synchronization with the server is successful
      //and with parameter false if the synchronization failed.

	  deleterow = "";
      rows = new Array();
      var datarow = new Array();
      var rowsSelected = jqxGridAlumni.jqxGrid('getselectedrowindexes');
      x = 0;
      rowsSelected.forEach(function(e){
        rows[x] = jqxGridAlumni.jqxGrid('getrowid',e);
		currItem = jqxGridAlumni.jqxGrid('getrowdata', e);
		deleterow = deleterow+currItem.nim+"("+currItem.nama+"),";
        x++;
      });

     var str = "{"+datafields.replid+":rows}";
     var json = JSON.stringify(eval("(" + str + ")"));
     post = JSON.parse(json);
	console.log("delete called");

     confirm = function(){
		$.ajax({
			 dataType: 'json',
			 url: jqxsetting.urlDeleteGrid,
			 data: post,
			 type:'post',
			 success: function (data, status, xhr) {
				 // update command is executed.
				 //commit(true);
				 if(data.status=="success")
				 {
					 Notification.open(Notification.textSuccessDelete(),"success");
					jqxGridAlumni.jqxGrid('updatebounddata', 'sort');
				}
				 else{
						Notification.open(data.message,"error");

				 }

			 },
			 error: function (data,status) {
				 Notification.open(Notification.textFailedDelete(),"error");
				 commit(false);
			 }
		 });
	};

	messageDelete = alert.contentDelete()+"<br> Kode  : "+deleterow;
	alert.confirm(alert.titleDelete(),messageDelete,confirm,function(){});


  };

  var dataSource = {
	  datatype: "json",
	  datafields: jqxGridAlumniDataFields,
	  deleterow:deleteAction,
	  url: current_url()+"/alumniData/",
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

jqxGridAlumni.jqxGrid(
{
	theme:themeWidget,
    source: adapter,
   width : "100%",
   height : $( window ).height()-110,
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
   selectionmode: 'checkbox',
   groupable: false,
     columns: [
			{ text: "Kelas", datafield: "kelas",width: "15%" },
			{ text: "NIS", datafield: "nis",width: "15%" },
			{ text: "NISN", datafield: "nisn",width: "15%",editable:false},
			{ text: "Nama", datafield: "nama",width: "25%",editable:false},
			{ text: "TTL", datafield: "lahir",width: "15%",editable:false},
			{ text: "Tanggal lulus", datafield: "tgllulus",width: "11%",editable:false}
		
    ]
});
jqxGridAlumni.on('rowselect', function (event) {
  $("#deleterowbutton").removeAttr("disabled");
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
			jqxGridAlumni.jqxGrid('unselectrow', event.args.rowindex);
		},200);
	}
	else{
		//$("#addrowbutton").removeAttr("disabled");
	}
});
