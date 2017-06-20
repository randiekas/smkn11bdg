editorElements = CodeMirror.fromTextArea(document.getElementById("editorElements"), {
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
                saveEditorElements();
              },
              "Ctrl-J": "toMatchingTag"
  }
});
function saveEditorElements()
{
  selectedElement.html(editorElements.getValue());
  Designer.onLoadFrame();
  //loadUICodePreview();
}
