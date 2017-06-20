var jqxsetting = <?=$this->load->view("jqxgrid/jqxgrid.json",array(),TRUE)?>;
var datafields = <?=$this->load->view("jqxgrid/datafields.json",array(),TRUE)?>;
elementJqxGridReligion = $(jqxsetting.element);
var source =
{
    datatype: "json",
    id: datafields.ID,
    url: jqxsetting.urlDataGrid,
    root: 'Rows',
    pagesize: jqxsetting.pagesize,
    
     cache: false,
      
    beforeprocessing: function(data)
    {
      source.totalrecords = data[0].TotalRows;
    },
    updaterow: function (rowid, rowdata, commit) {
                 // synchronize with the server - send update command
                 elementJqxGridReligion.jqxGrid('showloadelement');
                 $.ajax({
                     dataType: 'json',
                     url: jqxsetting.urlUpdateGrid,
                     data: rowdata,
                     type:'post',
                     success: function (data, status, xhr) {
                         // update command is executed.
                         Notification.open(Notification.textSuccessUpdate(),"success");
                         elementJqxGridReligion.jqxGrid('hideloadelement');
                         commit(true);
                     },
                     error: function (data,status) {
                         Notification.open(Notification.textFailedUpdate(),"error");
                         commit(false);
                     }
                 });
             },
   addrow: function (rowid, rowdata, commit) {
                 $.ajax({
                     dataType: 'json',
                     url: jqxsetting.urlCreateGrid,
                     data: rowdata,
                     type:'post',
                     success: function (data, status, xhr) {
                         // update command is executed.
                         Notification.open(Notification.textSuccessCreate(),"success");
                         elementJqxGridReligion.jqxGrid('updatebounddata', 'sort');

                     },
                     error: function (data,status) {
                        Notification.open(Notification.textFailedCreate(),"error");
                         commit(false);
                     }
                 });
            },
  deleterow: function (ids,commit) {
      // synchronize with the server - send delete command
      // call commit with parameter true if the synchronization with the server is successful
      //and with parameter false if the synchronization failed.
	  
	  deleterow = "";
	  
	  
	  
	  
      rows = new Array();
      var datarow = new Array();
      var rowsSelected = rowsSelectedGuru;
	  
      x = 0;
      rowsSelected.forEach(function(e){
        rows[x] = elementJqxGridReligion.jqxGrid('getrowid',e);
		currItem = $('#jqxGrid').jqxGrid('getrowdata', e);
		deleterow = deleterow+currItem.nip+"("+currItem.nama+"),";
        x++;
      });
	  
     var str = "{"+datafields.ID+":rows}";
     var json = JSON.stringify(eval("(" + str + ")"));
     post = JSON.parse(json);


     confirm = function(){
		$.ajax({
			 dataType: 'json',
			 url: jqxsetting.urlDeleteGrid,
			 data: post,
			 type:'post',
			 success: function (data, status, xhr) {
				 // update command is executed.
				 //commit(true);
				 Notification.open(Notification.textSuccessDelete(),"success");
				 elementJqxGridReligion.jqxGrid('updatebounddata', 'sort');
			 },
			 error: function (data,status) {
				 Notification.open(Notification.textFailedDelete(),"error");
				 commit(false);
			 }
		 });
	}
	messageDelete = alert.contentDelete()+"<br> NIP  : "+deleterow;
	alert.confirm(alert.titleDelete(),messageDelete,confirm,function(){});


  },
};
var dataadapter = new $.jqx.dataAdapter(source);
var jqxsetting = <?=$this->load->view("jqxgrid/jqxgrid.json",array(),TRUE)?>;
// initialize jqxGrid
elementJqxGridReligion.jqxGrid(jqxsetting.config);
//$("#jqxNotification").jqxNotification({ width: "100%", appendContainer: "#containerNotification", opacity: 0.9, autoClose: true, template: "info" });
	elementJqxGridReligion.on('rowselect', function (event) {
	pegawai = event.args.row;
	
	if($("#addKeluarga").val())
	{
		$("#addKeluarga").jqxButton({disabled:false});
		$("#deleteKeluarga").jqxButton({disabled:false});
	}
	if($("#addBeasiswa").val())
	{
		$("#addBeasiswa").jqxButton({disabled:false});
		$("#deleteBeasiswa").jqxButton({disabled:false});
	}
	if($("#addBuku").val())
	{
		$("#addBuku").jqxButton({disabled:false});
		$("#deleteBuku").jqxButton({disabled:false});
	}
	if($("#addDiklat").val())
	{
		$("#addDiklat").jqxButton({disabled:false});
		$("#deleteDiklat").jqxButton({disabled:false});
	}
	if($("#addKaryatulis").val())
	{
		$("#addKaryatulis").jqxButton({disabled:false});
		$("#deleteKaryatulis").jqxButton({disabled:false});
	}
	if($("#addKesejahteraan").val())
	{
		$("#addKesejahteraan").jqxButton({disabled:false});
		$("#deleteKesejahteraan").jqxButton({disabled:false});
	}
	if($("#addTunjangan").val())
	{
		$("#addTunjangan").jqxButton({disabled:false});
		$("#deleteTunjangan").jqxButton({disabled:false});
	}
	if($("#addTugas").val())
	{
		$("#addTugas").jqxButton({disabled:false});
		$("#deleteTugas").jqxButton({disabled:false});
	}
	if($("#addInpasing").val())
	{
		$("#addInpasing").jqxButton({disabled:false});
		$("#deleteInpasing").jqxButton({disabled:false});
	}
	if($("#addPenghargaan").val())
	{
		$("#addPenghargaan").jqxButton({disabled:false});
		$("#deletePenghargaan").jqxButton({disabled:false});
	}
	if($("#addNilai").val())
	{
		$("#addNilai").jqxButton({disabled:false});
		$("#deleteNilai").jqxButton({disabled:false});
	}
	if($("#addGolongan").val())
	{
		$("#addGolongan").jqxButton({disabled:false});
		$("#deleteGolongan").jqxButton({disabled:false});
	}
	if($("#addJabatan").val())
	{
		$("#addJabatan").jqxButton({disabled:false});
		$("#deleteJabatan").jqxButton({disabled:false});
	}
	if($("#addGaji").val())
	{
		$("#addGaji").jqxButton({disabled:false});
		$("#deleteGaji").jqxButton({disabled:false});
	}
	
	if($("#addSekolah").val())
	{
		$("#addSekolah").jqxButton({disabled:false});
		$("#deleteSekolah").jqxButton({disabled:false});
	}
	if($("#addSertifikasi").val())
	{
		$("#addSertifikasi").jqxButton({disabled:false});
		$("#deleteSertifikasi").jqxButton({disabled:false});
	}
	if($("#addPekerjaan").val())
	{
		$("#addPekerjaan").jqxButton({disabled:false});
		$("#deletePekerjaan").jqxButton({disabled:false});
	}
	
	
	jqwidgetsKeluarga.jqxGrid('source')._source.data.nip= pegawai.nip;
	jqwidgetsKeluarga.jqxGrid('updatebounddata');
	
	jqwidgetsBeasiswa.jqxGrid('source')._source.data.nip= pegawai.nip;
	jqwidgetsBeasiswa.jqxGrid('updatebounddata');
	
	jqwidgetsBuku.jqxGrid('source')._source.data.nip= pegawai.nip;
	jqwidgetsBuku.jqxGrid('updatebounddata');
	
	jqwidgetsDiklat.jqxGrid('source')._source.data.nip= pegawai.nip;
	jqwidgetsDiklat.jqxGrid('updatebounddata');
	
	jqwidgetsKaryatulis.jqxGrid('source')._source.data.nip= pegawai.nip;
	jqwidgetsKaryatulis.jqxGrid('updatebounddata');
	
	jqwidgetsKesejahteraan.jqxGrid('source')._source.data.nip= pegawai.nip;
	jqwidgetsKesejahteraan.jqxGrid('updatebounddata');
	
	jqwidgetsTunjangan.jqxGrid('source')._source.data.nip= pegawai.nip;
	jqwidgetsTunjangan.jqxGrid('updatebounddata');
	
	jqwidgetsTugas.jqxGrid('source')._source.data.nip= pegawai.nip;
	jqwidgetsTugas.jqxGrid('updatebounddata');
	
	jqwidgetsInpasing.jqxGrid('source')._source.data.nip= pegawai.nip;
	jqwidgetsInpasing.jqxGrid('updatebounddata');
	
	jqwidgetsPenghargaan.jqxGrid('source')._source.data.nip= pegawai.nip;
	jqwidgetsPenghargaan.jqxGrid('updatebounddata');
	
	jqwidgetsNilai.jqxGrid('source')._source.data.nip= pegawai.nip;
	jqwidgetsNilai.jqxGrid('updatebounddata');
	
	jqwidgetsGolongan.jqxGrid('source')._source.data.nip= pegawai.nip;
	jqwidgetsGolongan.jqxGrid('updatebounddata');
	
	jqwidgetsJabatan.jqxGrid('source')._source.data.nip= pegawai.nip;
	jqwidgetsJabatan.jqxGrid('updatebounddata');
	
	jqwidgetsGaji.jqxGrid('source')._source.data.nip= pegawai.nip;
	jqwidgetsGaji.jqxGrid('updatebounddata');
	
	
	
	jqwidgetsSekolah.jqxGrid('source')._source.data.nip= pegawai.nip;
	jqwidgetsSekolah.jqxGrid('updatebounddata');
	
	jqwidgetsSertifikasi.jqxGrid('source')._source.data.nip= pegawai.nip;
	jqwidgetsSertifikasi.jqxGrid('updatebounddata');
	
	jqwidgetsPekerjaan.jqxGrid('source')._source.data.nip= pegawai.nip;
	jqwidgetsPekerjaan.jqxGrid('updatebounddata');
	
	
	/*
	  reloadPendidikan(row);
	  reloadPengembangan(row);
	  reloadJabatan(row);
	 */
});


$("#addrowbutton").click(function(){

        $("#deleterowbutton").attr("disabled","true");
        $('#jqxTabs').jqxTabs('select', 1);
        removeReadOnly();
        $("#saverowbutton").removeAttr("disabled");
        $("#formDosen .reset").click();
		$(".imgChangeImage").attr("src","<?=base_url()?>assets/pegawai/default.png");
		
		
		elementJqxGridReligion.jqxGrid('clearselection');
		
	jqwidgetsKeluarga.jqxGrid('clear');
	
	
	jqwidgetsBeasiswa.jqxGrid('clear');
	
	
	jqwidgetsBuku.jqxGrid('clear');
	
	
	jqwidgetsDiklat.jqxGrid('clear');
	
	
	jqwidgetsKaryatulis.jqxGrid('clear');
	
	
	jqwidgetsKesejahteraan.jqxGrid('clear');
	
	
	jqwidgetsTunjangan.jqxGrid('clear');
	
	
	jqwidgetsTugas.jqxGrid('clear');
	
	
	jqwidgetsInpasing.jqxGrid('clear');
	
	
	jqwidgetsPenghargaan.jqxGrid('clear');
	
	
	jqwidgetsNilai.jqxGrid('clear');
	
	
	jqwidgetsGolongan.jqxGrid('clear');
	
	
	jqwidgetsJabatan.jqxGrid('clear');
	
	
	jqwidgetsGaji.jqxGrid('clear');
	
	
	
	
	jqwidgetsSekolah.jqxGrid('clear');
	
	
	jqwidgetsSertifikasi.jqxGrid('clear');
	
	
	jqwidgetsPekerjaan.jqxGrid('clear');
		
    });
