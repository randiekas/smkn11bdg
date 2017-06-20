var jqxgrid_setting = <?=$this->load->view("engine/designer/user/jqxgrid.json",array(),true)?>;
var datafields = <?=$this->load->view("engine/designer/user/datafields.json",array(),true)?>;
var sources =
{
    datatype: "json",
    id: datafields.ID,
    url: jqxgrid_setting.urlDataGrid(),
    root: 'Rows',
    pagesize: jqxgrid_setting.pagesize(),
    filter: function()
     {
       // update the grid and send a request to the server.
       $("#jqxgridUserLevelUser").jqxGrid('updatebounddata', 'filter');
     },
     cache: false,
     sort: function()
     {
       // update the grid and send a request to the server.
       $("#jqxgridUserLevelUser").jqxGrid('updatebounddata', 'sort');
     },
    beforeprocessing: function(data)
    {
      sources.totalrecords = data[0].TotalRows;
    },
    updaterow: function (rowid, rowdata, commit) {
                 // synchronize with the server - send update command
                 $('#jqxgridUserLevelUser').jqxGrid('showloadelement');
                 $.ajax({
                     dataType: 'json',
                     url: jqxgrid_setting.urlUpdateGrid(),
                     data: rowdata,
                     type:'post',
                     success: function (data, status, xhr) {
                         // update command is executed.
                         settingNotification.successUpdate();
                         $('#jqxgridUserLevelUser').jqxGrid('hideloadelement');
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
                     url: jqxgrid_setting.urlCreateGrid(),
                     data: rowdata,
                     type:'post',
                     success: function (data, status, xhr) {
                         // update command is executed.
                         settingNotification.successCreate();
                         $("#jqxgridUserLevelUser").jqxGrid('updatebounddata', 'sort');

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
        rows[x] = $("#jqxgridUserLevelUser").jqxGrid('getrowid',ids[x]);
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
               url: jqxgrid_setting.urlDeleteGrid(),
               data: post,
               type:'post',
               success: function (data, status, xhr) {
                   // update command is executed.
                   //commit(true);
                   settingNotification.successDelete();
                   $("#jqxgridUserLevelUser").jqxGrid('updatebounddata', 'sort');
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


var dataadapter = new $.jqx.dataAdapter(sources);
// initialize jqxGrid
$("#jqxgridUserLevelUser").jqxGrid(jqxgrid_setting.config());
