var jqxsetting = <?=$this->load->view("jqxgrid/jqxgrid.json",array(),TRUE)?>;
var datafields = <?=$this->load->view("jqxgrid/datafields.json",array(),TRUE)?>;
elementJqxGridReligion = $(jqxsetting.element);
var source =
{
    datatype: "json",
    id: datafields.ID,
	type:'post',
	data:{periode_awal:$("#periode_awal").val(),periode_akhir:$("#periode_akhir").val()},
    url: jqxsetting.urlDataGrid,
	pagesize: jqxsetting.pagesize
};
var dataadapter = new $.jqx.dataAdapter(source);
var jqxsetting = <?=$this->load->view("jqxgrid/jqxgrid.json",array(),TRUE)?>;
elementJqxGridReligion.jqxGrid(jqxsetting.config);

elementJqxGridReligion.on('rowselect', function (event) {
  var row = event.args.row;
	jqxGridSiswa.jqxGrid('source')._source.data.jenismutasi = row.replid;
	jqxGridSiswa.jqxGrid('updatebounddata');
});