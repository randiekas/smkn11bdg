//http://localhost/erp_campus/index.php/dashboard/signin
var editorControllerCodeSource = CodeMirror.fromTextArea(document.getElementById("ControllerCodeSource"), {
  mode: "application/x-httpd-php",
  matchBrackets: true,
  width:"100%",
  height:"800",
  styleActiveLine: true,
  lineNumbers: true,
  lineWrapping: false,
  theme:"ambiance",
  viewportMargin: Infinity,
  foldGutter: true,
  gutters: ["CodeMirror-linenumbers", "CodeMirror-foldgutter"],
  matchTags: {bothTags: true},
  extraKeys: {"Alt-F": "findPersistent",
              "Alt-S": function(){
                saveControllerCode();
              },
              "Ctrl-J": "toMatchingTag"
  }

  });
$('#frameUIPreview').load(function(){
  loadControllerCode();
});
function loadControllerCode()
{
  var value = "";
  $.ajax({
    async: false,
    //url:$(this).attr("src").substr(),
    url:'<?=site_url()?>/engine/designer/getControllerCode',
    data:{url:$("#frameUIPreview").attr("src").substr()},
    type:"post"
  }).done(function(result){
     value = result;
  });
  editorControllerCodeSource.setValue(value);
}
function saveControllerCode()
{
  $.ajax({
    async: false,
    url:"<?=site_url()?>/engine/designer/saveControllerCode/",
    type:"post",
    data:{url:$('#frameUIPreview').attr("src"),source:editorControllerCodeSource.getValue()}
  }).done(function(result){
     alert("Sudah Tersimpan");
  });
}
loadControllerCode()
