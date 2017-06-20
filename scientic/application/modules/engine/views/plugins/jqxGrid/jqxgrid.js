var jqxsetting = <?=$this->load->view("religion/jqxgrid.json",array(),TRUE)?>;
var datafields = <?=$this->load->view("religion/datafields.json",array(),TRUE)?>;
elementJqxGridReligion = $(jqxsetting.element);
var source =
{
    datatype: "json",
    id: datafields.ID,
    url: jqxsetting.urlDataGrid,
    root: 'Rows',
    pagesize: jqxsetting.pagesize,
    filter: function()
     {
       // update the grid and send a request to the server.
       elementJqxGridReligion.jqxGrid('updatebounddata', 'filter');
     },
     cache: false,
     sort: function()
     {
       // update the grid and send a request to the server.
       elementJqxGridReligion.jqxGrid('updatebounddata', 'sort');
     },
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
      rows = new Array();
      var datarow = new Array();
      var rowsSelected = elementJqxGridReligion.jqxGrid('getselectedcells');
      x = 0;
      rowsSelected.forEach(function(e){
        rows[x] = elementJqxGridReligion.jqxGrid('getrowid',e.rowindex);
        x++;
      });
     var str = "{"+datafields.ID+":rows}";
     var json = JSON.stringify(eval("(" + str + ")"));
     post = JSON.parse(json);


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


  },
};
var dataadapter = new $.jqx.dataAdapter(source);
var jqxsetting = <?=$this->load->view("religion/jqxgrid.json",array(),TRUE)?>;
// initialize jqxGrid
elementJqxGridReligion.jqxGrid(jqxsetting.config);
//$("#jqxNotification").jqxNotification({ width: "100%", appendContainer: "#containerNotification", opacity: 0.9, autoClose: true, template: "info" });
