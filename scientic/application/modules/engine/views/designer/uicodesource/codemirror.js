//http://localhost/erp_campus/index.php/dashboard/signin
var editorUICodeSource = CodeMirror.fromTextArea(document.getElementById("UICodeSource"), {
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
                saveUICode();
              },
              "Ctrl-J": "toMatchingTag"
  }

  });
$('#frameUIPreview').load(function(){
  loadUICode();
});
function loadUICode()
{
  var value = "";
  $.ajax({
    async: false,
    //url:$(this).attr("src").substr(),
    url:'<?=site_url()?>/engine/designer/getUICode',
    data:{url:$("#frameUIPreview").attr("src").substr()},
    type:"post"
  }).done(function(result){
     value = result;
  });
  editorUICodeSource.setValue(value);
}
function saveUICode()
{
  $.ajax({
    async: false,
    url:"<?=site_url()?>/engine/designer/saveUICode/",
    type:"post",
    data:{url:$('#frameUIPreview').attr("src"),source:editorUICodeSource.getValue()}
  }).done(function(result){
     alert("Sudah Tersimpan");
     var src = $('#frameUIPreview').attr("src");
     $('#frameUIPreview').attr("src",src);
  });
}
loadUICode();
/*
folding all
for (var i = 0; i < editorSource.lineCount() ; i++) {
            editorSource.foldCode({ line: i, ch: 0 }, null, "fold");
        }
*/
