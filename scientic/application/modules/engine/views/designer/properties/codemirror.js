var editorValue = CodeMirror.fromTextArea(document.getElementById("editorValue"), {
  mode: "application/javascript",
  styleActiveLine: true,
  lineNumbers: true,
  lineWrapping: false,
  theme:"ambiance",
  viewportMargin: Infinity,
  extraKeys: {"Alt-S": function(){
    saveValue();
  }}
});
var editorProperties = CodeMirror.fromTextArea(document.getElementById("editorProperties"), {
  mode: "application/json",
  styleActiveLine: true,
  lineNumbers: true,
  lineWrapping: false,
  theme:"ambiance",
  viewportMargin: Infinity
});
function saveValue()
{
  $.ajax({
    async: false,
    url:"http://localhost/erp_campus/index.php/engine/Widget_jqxgrid/getSave/",
    type:"post",
    data:{path:"level/jqxgrid-function/columns.js",source:editorValue.getValue()}
  }).done(function(result){
      $('#jqxgridUserLevel').jqxGrid('render');
     alert("telah berhasil di simpan");
  });
}
