//http://localhost/erp_campus/index.php/dashboard/signin
var editorModelCodeSource = CodeMirror.fromTextArea(document.getElementById("ModelCodeSource"), {
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
                saveModelCode();
              },
              "Ctrl-J": "toMatchingTag"
  }

  });
$('#frameUIPreview').load(function(){
  loadModelCode();
});
function loadModelCode()
{
  var value = "";
  $.ajax({
    async: false,
    //url:$(this).attr("src").substr(),
    url:'<?=site_url()?>/engine/designer/getModelCode',
    data:{url:$("#frameUIPreview").attr("src").substr()},
    type:"post"
  }).done(function(result){
     value = result;
  });
  editorModelCodeSource.setValue(value);
}
function saveModelCode()
{
  $.ajax({
    async: false,
    url:"<?=site_url()?>/engine/designer/saveModelCode/",
    type:"post",
    data:{url:$('#frameUIPreview').attr("src"),source:editorModelCodeSource.getValue()}
  }).done(function(result){
     alert("Sudah Tersimpan");
  });
}
loadModelCode();
/*
folding all
for (var i = 0; i < editorSource.lineCount() ; i++) {
            editorSource.foldCode({ line: i, ch: 0 }, null, "fold");
        }
*/
