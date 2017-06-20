jqwidgetsTingkat = $("#jqwidgetsTingkat");
var url = current_url()+"/getTingkat/";
// prepare the data
var source =
{
    datatype: "json",
    datafields: [
		{ "name": "replid"},
		{ "name": "departemen"},
		{ "name": "tingkat"},
		{ "name": "dasarpenilaian"},
		{ "name": "keterangan"},
		{ "name": "nipguru"},
		{ "name": "idtingkat"},
		{ "name": "idpelajaran"},
		{ "name": "idjenisujian"},
		{ "name": "idaturan"},
		{ "name": "jenisujian"},
		{ "name": "jenisujianketerangan"},
		{ "name": "bobot"}

  	],
	data:{departemen:'',nipguru:'',idtingkat:'',idpelajaran:''},
	type:'POST',
    url: url
};
var dataadapter = new $.jqx.dataAdapter(source);
jqwidgetsTingkat.jqxGrid(
{
  theme:themeWidget,
   width : "99.80%",
   height : $( window ).height()-45,
   source: dataadapter,
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
   groupable: false,
   showtoolbar:true,
   rendertoolbar: function (toolbar) {
                    var me = this;
                    var container = $("<div style='margin: 5px;'>KKM : <input type='number' id='nilaimin' style='width:60px'><button id='buttonKKM' type='button'><i class='fa fa-save'></i></button></div>");
                    toolbar.append(container);
                    container.append('<div style="float:right"><input id="hitungNilai" type="button" value="Hitung Nilai Akhir" /></div>');
                    	var c= {};
						if(jqwidgetsGuruMengajar.jqxGrid('getselectedrowindex')==-1)
						{
							c= {disabled:true};
						}else{
							$('#nilaimin').val(dataGuruMengajar.nilaimin);
						}
						$("#buttonKKM").jqxButton(c);
						$("#hitungNilai").jqxButton(c);
						
						// create new row.
						$("#hitungNilai").on('click', function () {
							if(dataGuruMengajar.idinfonap==null)
							{
								Notification.open("KKM Harus di isi terlebih dahulu","error");
							}
							else
							{
								jqwidgetsGrading.jqxGrid('showloadelement');
								 $.ajax({
									 dataType: 'json',
									 url: current_url()+"/hitungNilai/",
									 data: {idpelajaran:dataGuruMengajar.idpelajaran,idkelas:dataGuruMengajar.idkelas,idsemester:dataGuruMengajar.idsemester,idinfo:dataGuruMengajar.idinfonap},
									 type:'post',
									 success: function (data, status, xhr) {
										 // update command is executed.
										 if(data.status=="success")
										 {
											 Notification.open(Notification.textSuccessUpdate(),"success");
											 jqwidgetsGrading.jqxGrid('hideloadelement');
											jqwidgetsGrading.jqxGrid('updatebounddata');
										 }
										 else{
											 Notification.open(data.message,"error");
											 jqwidgetsGrading.jqxGrid('hideloadelement');
											
										 }
									 },
									 error: function (data,status) {
										 Notification.open(Notification.textFailedUpdate(),"error");
										 
									 }
								 });
							}
						});
						$("#buttonKKM").on('click', function () {
							
							jqwidgetsGrading.jqxGrid('showloadelement');
							 $.ajax({
								 dataType: 'json',
								 url: current_url()+"/savekkm/",
								 data: {idpelajaran:dataGuruMengajar.idpelajaran,idkelas:dataGuruMengajar.idkelas,idsemester:dataGuruMengajar.idsemester,nilaimin:$('#nilaimin').val()},
								 type:'post',
								 success: function (data, status, xhr) {
									 // update command is executed.
									 if(data.status=="success")
									 {
										 dataGuruMengajar.idinfonap = data.idinfonap;
										 dataGuruMengajar.nilaimin = $('#nilaimin').val();
										 Notification.open("KKM berhsail disetup","success");
										 jqwidgetsGrading.jqxGrid('hideloadelement');
										
									 }
									 else{
										 Notification.open(data.message,"error");
										 jqwidgetsGrading.jqxGrid('hideloadelement');
										
									 }
								 },
								 error: function (data,status) {
									 Notification.open(Notification.textFailedUpdate(),"error");
									 
								 }
							 });
							
						});
						// delete row.
						
    },
     columns: [
    { text: "Aspek", datafield: "dasarpenilaian",width: "100%" }
    ]
});
jqwidgetsTingkat.on('rowselect', function (event) {
 
	
	jqwidgetsGrading.jqxGrid('showloadelement');
	var row  = event.args.row;
	dataAspekPenilaian = row;
	//console.log(dataGuruMengajar);
	jqwidgetsGrading.jqxGrid("source")._source.data.departemen=dataGuruMengajar.departemen;
	jqwidgetsGrading.jqxGrid("source")._source.data.nipguru=dataGuruMengajar.nip;
	jqwidgetsGrading.jqxGrid("source")._source.data.idtingkat=dataGuruMengajar.idtingkat;
	jqwidgetsGrading.jqxGrid("source")._source.data.dasarpenilaian=row.dasarpenilaian;
	jqwidgetsGrading.jqxGrid("source")._source.data.idpelajaran=dataGuruMengajar.idpelajaran;
	jqwidgetsGrading.jqxGrid("source")._source.data.idkelas=dataGuruMengajar.idkelas;
	jqwidgetsGrading.jqxGrid("source")._source.data.idsemester=dataGuruMengajar.idsemester;
	jqwidgetsGrading.jqxGrid("source")._source.data.idjenis=row.idjenisujian;
	jqwidgetsGrading.jqxGrid("source")._source.data.idaturan=row.idaturan;
	jqwidgetsGrading.jqxGrid('updatebounddata');
	
});