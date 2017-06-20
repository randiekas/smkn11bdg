var data = <?=$this->load->view("engine/designer/properties/data.json",array(),TRUE)?>;
for(x=0;x<data.length;x++)
{
  if($("#jqxgridUserLevel").jqxGrid(data[x].name)!=null)
  {
    if($("#jqxgridUserLevel").jqxGrid(data[x].name).length==0)
    {
      data[x].value = '[]';
    }
    else{
      data[x].value = $("#jqxgridUserLevel").jqxGrid(data[x].name);
    }
  }
  else{
    if(data[x].type=="Array")
    {
      data[x].value = '[]';
    }
    else{
      data[x].value = 'null';
    }
  }

  if(data[x].default==false)
  {
    NDefault = "false";
  }
  else if(data[x].default==true){
    NDefault = "true";
  }
  else{
    NDefault = data[x].default;
  }
  if(data[x].value==false)
  {
    NValue = "false";
  }
  else if(data[x].value==true){
    NValue = "true";
  }
  else{
    NValue = data[x].value;
  }

  if ( NDefault != NValue) {
    properties[data[x].name] = NValue;
  }
}
var cellsrenderer = function (row, columnfield, value, defaulthtml, columnproperties, rowdata) {
                if(rowdata.default==false)
                {
                  NDefault = "false";
                }
                else if(rowdata.default==true){
                  NDefault = "true";
                }
                else{
                  NDefault = rowdata.default;
                }
                if(rowdata.value==false)
                {
                  NValue = "false";
                }
                else if(rowdata.value==true){
                  NValue = "true";
                }
                else{
                  NValue = rowdata.value;
                }

                if ( NDefault != NValue) {
                    return '<span style="margin: 4px; float: ' + columnproperties.cellsalign + '; color: #ff0000;">' + value + '</span>';
                }
                else {
                    return '<span style="margin: 4px; float: ' + columnproperties.cellsalign + '; color: #008000;">' + value + '</span>';
                }
            }
// prepare the data
var source =
{
    datatype: "json",
    datafields: [
        { name: 'name', type: 'string' },
        { name: 'type', type: 'string' },
        { name: 'default', type: 'string' },
        { name: 'value', type: 'string' }
    ],
    id: 'id',
    localdata:data
};
var dataAdapter = new $.jqx.dataAdapter(source);

$("#jqxgridProperties").jqxGrid(
{
    width:"56%",
    height:"100%",
    source: dataAdapter,
    columnsresize: true,
    editable:true,
    editmode:"dblclick",//favourites
    filterable:true,
    showfilterrow: true,
    columns: [
      { text: 'Name', datafield: 'name', width: 220, editable:false, cellsrenderer:cellsrenderer },
      { text: 'Type', datafield: 'type', width: 120, editable:false },
      { text: 'default', datafield: 'default', width: 120,editable:false },
      { text: 'value', datafield: 'value', width: 120 }
  ]
});

$("#jqxgridProperties").on('cellendedit', function (event)
{
    // event arguments.
    var args = event.args;
    // column data field.
    var dataField = event.args.datafield;
    // row's bound index.
    var rowBoundIndex = event.args.rowindex;
    // cell value
    var value = args.value;
    // cell old value.
    var oldvalue = args.oldvalue;
    // row's data.
    var rowData = args.row;

    var ob = {};
    if(rowData.type=="Boolean")
    {
      if(value=="false")
      {
        ob[rowData.name] = false;

      }
      else{
        ob[rowData.name] = true;

      }
    }
    else{
      ob[rowData.name] = value;

    }
    $("#jqxgridUserLevel").jqxGrid(ob);
    /*
    $.ajax({
      url:'http://localhost/erp_campus/index.php/engine/designer/save',
      type:"POST",
      data:{rows:$("#jqxgridProperties").jqxGrid("getRows")},
      success:function(){

      }
    });
    */
});
$("#jqxgridProperties").on('rowselect', function (event)
{

    // event arguments.
     var args = event.args;
     // row's bound index.
     var rowBoundIndex = args.rowindex;
     // row's data. The row's data object or null(when all rows are being selected or unselected with a single action). If you have a datafield called "firstName", to access the row's firstName, use var firstName = rowData.firstName;
     var rowData = args.row;
     var value = "";
     if(rowData.type=="Function" || rowData.type=="Array")
     {
       $.ajax({
         async: false,
         url:"http://localhost/erp_campus/index.php/engine/Widget_jqxgrid/get/",
         type:"post",
         data:{path:"level/jqxgrid-function/"+rowData.name+".js"}
       }).done(function(result){
          value = result;
       });

     }
     else{
       if(rowData.value===true)
       {
         value = "true";
       }
       else if(rowData.value===false)
       {
         value = "false";
       }
       else{
         value = rowData.value;
       }

     }
    $(".PropertiesValue").val(value);
    editorValue.setValue($(".PropertiesValue").val());
});
$("#jqxgridUserLevel").on("bindingcomplete", function (event) {
  var value = properties;
  var blkstr = [];
  $.each(value, function(idx2,val2) {
    var str = idx2 + ":" + val2;
    blkstr.push(str);
  });
  //$(".propertiesJson").val('{'+blkstr.join(", ")+'}');
  //editorProperties.setValue($(".propertiesJson").val());
});
