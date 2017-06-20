var jqxsetting = <?=$this->load->view("jqxgrid/jqxgrid.json",array(),TRUE)?>;
var datafields = <?=$this->load->view("jqxgrid/datafields.json",array(),TRUE)?>;
elementJqxGridReligion = $(jqxsetting.element);
var source =
{
    datatype: "json",
    id: datafields.ID,
    url: jqxsetting.urlDataGrid,
	pagesize: jqxsetting.pagesize,
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
						 if(data.status=="success")
						 {
							 elementJqxGridReligion.jqxGrid('hideloadelement');
							 commit(true);
						 }
						 else{
							 elementJqxGridReligion.jqxGrid('hideloadelement');
							 commit(false);
						 }
                     },
                     error: function (data,status) {
                         commit(false);
                     }
                 });
             }
};
var dataadapter = new $.jqx.dataAdapter(source);
var jqxsetting = <?=$this->load->view("jqxgrid/jqxgrid.json",array(),TRUE)?>;
elementJqxGridReligion.jqxGrid(jqxsetting.config);