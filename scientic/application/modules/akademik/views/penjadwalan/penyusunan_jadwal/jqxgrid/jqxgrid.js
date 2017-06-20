var jqxsetting = <?=$this->load->view("jqxgrid/jqxgrid.json",array(),TRUE)?>;
var datafields = <?=$this->load->view("jqxgrid/datafields.json",array(),TRUE)?>;
elementJqxGridReligion = $(jqxsetting.element);
var source =
{
    datatype: "json",
    id: datafields.ID,
    url: jqxsetting.urlDataGrid,
    data:{departemen:$("#departemen").val(),idkelas:$("#idkelas").val(),infojadwal:$("#infojadwal").val(),hari:$("#hari").val()},
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
var contextMenu = $("#Menu").jqxMenu({ width: 200, height: 29, autoOpenPopup: false, mode: 'popup'});
elementJqxGridReligion.on('contextmenu', function () {
                return false;
            });

// handle context menu clicks.
$("#Menu").on('itemclick', function (event) {
	var args = event.args;
	var cell = elementJqxGridReligion.jqxGrid('getselectedcell');
	var value = cell.value.split("#");
	if(value[1])
	{
				$.ajax({
					url:current_url()+"/destroy",
					type:'post',
					data:{replid:value[0]},
					dataType:'json',
					success:function(result)
					{
						if(result.status=='success')
						{
							Notification.open(result.message,"success");
							elementJqxGridReligion.jqxGrid('updatebounddata');
							jqwidgetsGuru.jqxGrid('updatebounddata');
						}
						else{
							Notification.open(result.message,"error");
						}
					}
				})
	}
});
elementJqxGridReligion.on('cellclick', function (event) {
                if (event.args.rightclick) {
					if(event.args.value)
					{
					var position = $.jqx.position(event.args);
                    
					$('#jqxGrid').jqxGrid('selectcell', event.args.rowindex,event.args.datafield);
                    
                    var scrollTop = $(window).scrollTop();
                    var scrollLeft = $(window).scrollLeft();
                    contextMenu.jqxMenu('open', parseInt(event.args.originalEvent.clientX) + 5 + scrollLeft, parseInt(event.args.originalEvent.clientY) + 5 + scrollTop);

                    return false;
					}
                }
            });