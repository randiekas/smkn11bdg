var jqxsetting = <?=$this->load->view("engine/designer/level/jqxgrid.json",array(),TRUE)?>;
var datafields = <?=$this->load->view("engine/designer/level/datafields.json",array(),TRUE)?>;
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
       $("#jqxgridUserLevel").jqxGrid('updatebounddata', 'filter');
     },
     cache: false,
     sort: function()
     {
       // update the grid and send a request to the server.
       $("#jqxgridUserLevel").jqxGrid('updatebounddata', 'sort');
     },
    beforeprocessing: function(data)
    {
      source.totalrecords = data[0].TotalRows;
    },
    updaterow: function (rowid, rowdata, commit) {
                 // synchronize with the server - send update command
                 $('#jqxgridUserLevel').jqxGrid('showloadelement');
                 $.ajax({
                     dataType: 'json',
                     url: jqxsetting.urlUpdateGrid,
                     data: rowdata,
                     type:'post',
                     success: function (data, status, xhr) {
                         // update command is executed.
                         settingNotification.successUpdate();
                         $('#jqxgridUserLevel').jqxGrid('hideloadelement');
                         commit(true);
                     },
                     error: function (data,status) {
                         settingNotification.errorUpdate();
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
                         settingNotification.successCreate();
                         $("#jqxgridUserLevel").jqxGrid('updatebounddata', 'sort');

                     },
                     error: function (data,status) {
                       settingNotification.errorCreate();
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
      for(x=0;x<ids.length;x++)
      {
        //datarow[x] = "CustomerID = "+datarow+$("#jqxgridUserLevel").jqxGrid('getrowdata', ids[x]).CustomerID;
        rows[x] = $("#jqxgridUserLevel").jqxGrid('getrowid',ids[x]);
      }


      //post = JSON.parse('{'+datafields.ID+':rows}');
      //post = {eval(datafields.ID):rows};


     var str = "{"+datafields.ID+":rows}";
     var json = JSON.stringify(eval("(" + str + ")"));
     post = JSON.parse(json);
      $.confirm({
         title:"Perhatian !",
         confirmButton: 'Lanjutkan',
         cancelButton: 'Batal',
         content:settingNotification.textConfirmationDelete(),
         confirm:function(){
           $.ajax({
               dataType: 'json',
               url: jqxsetting.urlDeleteGrid,
               data: post,
               type:'post',
               success: function (data, status, xhr) {
                   // update command is executed.
                   //commit(true);
                   settingNotification.successDelete();
                   $("#jqxgridUserLevel").jqxGrid('updatebounddata', 'sort');
               },
               error: function (data,status) {
                   settingNotification.errorDelete();
                   commit(false);
               }
           });
         }

     });


  },
};
var dataadapter = new $.jqx.dataAdapter(source);
var jqxsetting = <?=$this->load->view("engine/designer/level/jqxgrid.json",array(),TRUE)?>;
// initialize jqxGrid
$("#jqxgridUserLevel").jqxGrid(jqxsetting.config);
$("#jqxNotification").jqxNotification({ width: "100%", appendContainer: "#containerNotification", opacity: 0.9, autoClose: true, template: "info" });
