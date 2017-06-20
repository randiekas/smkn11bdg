$(".addPluginButton").click(function(){
  $.ajax({
    url:"<?=site_url()?>/engine/plugins/addPlugins/",
    type:"POST",
    data:{url:$("#frameUIPreview").attr("src").substr(),name:$(".addPluginName_"+$(this).attr("id-plugin")).val(),folder:$(this).attr("folder")},
    success:function(result){
      alert("Pluggin Added");
    }
  });
});
