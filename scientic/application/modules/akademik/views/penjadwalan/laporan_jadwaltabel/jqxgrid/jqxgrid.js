var jqxsetting = <?=$this->load->view("jqxgrid/jqxgrid.json",array(),TRUE)?>;
var datafields = <?=$this->load->view("jqxgrid/datafields.json",array(),TRUE)?>;
elementJqxGridReligion = $(jqxsetting.element);
var source =
{
    datatype: "json",
    id: datafields.ID,
    url: jqxsetting.urlDataGrid,
    data:{departemen:$("#departemen").val(),idkelas:$("#idkelas").val(),infojadwal:$("#infojadwal").val(),nip:$("#nipguru").val()},
	type:'post',
    pagesize: jqxsetting.pagesize
};
var dataadapter = new $.jqx.dataAdapter(source);
var jqxsetting = <?=$this->load->view("jqxgrid/jqxgrid.json",array(),TRUE)?>;
// initialize jqxGrid
elementJqxGridReligion.jqxGrid(jqxsetting.config);
//$("#jqxNotification").jqxNotification({ width: "100%", appendContainer: "#containerNotification", opacity: 0.9, autoClose: true, template: "info" });
$("#deleterowbutton").on('click', function (){
    rowsSelected = elementJqxGridReligion.jqxGrid('getselectedrowindexes');
    if (rowsSelected.length>=1) {
        var commit = elementJqxGridReligion.jqxGrid('deleterow');
    }
});
elementJqxGridReligion.on('rowselect', function (event) {
  $(".groupAction button").removeAttr("disabled");
});