// initialize a jqxTree inside the Solution Explorer Panel
var url ="";
var slug="";
var data = <?=json_encode(getAccessMenu($_SESSION["level_id"]))?>;
  var source =
  {
      datatype: "json",
      datafields: [
          { name: 'id' },
          { name: 'parentid' },
          { name: 'label' },
          { name: 'slug' },
          { name: 'icon' }

      ],
      id: 'id',
      localdata: data
  };


    var dataAdapter = new $.jqx.dataAdapter(source);
    // perform Data Binding.
    dataAdapter.dataBind();
    var records = dataAdapter.getRecordsHierarchy('id', 'parentid', 'items',[{ name: 'slug', map: 'value'}]);
    $('#ListOfModule').jqxTree({ source: records});


    $('#ListOfModule').on('select', function (event) {
      var item = $(this).jqxTree('getItem', args.element);
      var slug = item.value;
          if(slug!="false")
          {
              
              $("#frameUIPreview").attr("src","<?=site_url()?>/"+slug);


          }
    });
    $('#ListOfPage').on('select', function (event) {
      var item = $(this).jqxTree('getItem', args.element);
      var url = item.value;
          if(url!="false")
          {
              $("#frameUIDesigner").attr("src","<?=site_url()?>/engine/designer/openPage/"+url);


          }
    });

    $("#ListOfModule").jqxTree('focus');
    //contextmenu
    $('#ListOfModule').css('visibility', 'visible');
          var source = [{id:"edit",label:"Edit"},{ id:"addGroup",label: "Add Group Module"},{id:"addFolder",label:"Add Module Folder"},{id:"addModule",label:"Add Module"},{id:"remove",label:"Remove"}];
          var contextMenu = $("#jqxMenu").jqxMenu({source:source, width: '150px',  height: '135px', autoOpenPopup: false, mode: 'popup' });
          var clickedItem = null;

          var attachContextMenu = function () {
              // open the context menu when the user presses the mouse right button.
              $("#ListOfModule li").on('mousedown', function (event) {
                  var target = $(event.target).parents('li:first')[0];

                  var rightClick = isRightClick(event);
                  if (rightClick && target != null) {
                      $("#ListOfModule").jqxTree('selectItem', target);
                      var scrollTop = $(window).scrollTop();
                      var scrollLeft = $(window).scrollLeft();

                      contextMenu.jqxMenu('open', parseInt(event.clientX) + 5 + scrollLeft, parseInt(event.clientY) + 5 + scrollTop);
                      return false;
                  }
              });
          }
          attachContextMenu();
          $("#jqxMenu").on('itemclick', function (event) {

              var item = $.trim($(event.args).text());
              switch (event.args.id) {
                  case "edit":
                  var selectedItem = $('#ListOfModule').jqxTree('selectedItem');
                  $.ajax({
                    url:"<?=site_url("engine/module/getDataEdit")?>",
                    type:"POST",
                    data:{"id":selectedItem.id},
                    dataType:"JSON",
                    success:function(result)
                    {
                      if(result.status=="success")
                      {
                        $("#formModule input[name=id]").val(result.message.id);
                        $("#formModule input[name=parent_id]").val(result.message.parent_id);
                        $("#formModule input[name=moduleFolder]").val(result.message.name);
                        $("#formModule input[name=url]").val(result.message.url);
                        $("#formModule input[name=slug]").val(result.message.slug);
                        $("#formModule input[name=icon]").val(result.message.icon);


                        if(result.message.na=="A")
                        {
                          if(!$("#formModule input[name=na]").attr("checked"))
                          {
                            $("#formModule input[name=na]").click();
                          }
                          //
                        }
                        else{
                          if($("#formModule input[name=na]").attr("checked"))
                          {
                            $("#formModule input[name=na]").removeAttr("checked");
                          }
                        }

                        $("#popupWindow").jqxWindow('open');
                      }
                      else{
                        alert(result.message);
                      }
                    }
                  });
                  break;
                  case "addGroup":
                      url = "";
                      var selectedItem = $('#ListOfModule').jqxTree('selectedItem');
                      if (selectedItem != null) {
                          url = "";
                          $("#formModule .reset").click();
                          $("#popupWindow").jqxWindow('open');
                          $("#formModule #inputName").focus();

                      }
                      break;
                  case "addModule":
                          var selectedItem = $('#ListOfModule').jqxTree('selectedItem');
                          if (selectedItem != null) {
                            $.ajax({
                              async:false,
                              url:"<?=site_url("engine/module/getDataEdit")?>",
                              type:"POST",
                              data:{"id":selectedItem.id},
                              dataType:"JSON",
                              success:function(result)
                              {
                                if(result.status=="success")
                                {
                                  $("#formModule .reset").click();
                                  url = result.message.url;
                                  slug = result.message.slug;
                                  $("#formModule input[name=parent_id]").val(result.message.id);
                                  $("#formModule input[name=url]").val(result.message.url+"/");
                                  $("#formModule input[name=slug]").val(result.message.slug+"/");
                                  $("#formModule input[name=module_type]").val("module");
                                  $("#formModule input[name=icon]").val("images/folder.png");
                                  $("#popupWindow").jqxWindow('open');
                                  $("#formModule #inputName").focus();
                                }
                                else{
                                  alert(result.message);
                                }
                              }
                            });

                          }
                          break;
                          case "addFolder":
                                  var selectedItem = $('#ListOfModule').jqxTree('selectedItem');
                                  if (selectedItem != null) {
                                    $.ajax({
                                      async:false,
                                      url:"<?=site_url("engine/module/getDataEdit")?>",
                                      type:"POST",
                                      data:{"id":selectedItem.id},
                                      dataType:"JSON",
                                      success:function(result)
                                      {
                                        if(result.status=="success")
                                        {
                                          $("#formModule .reset").click();
                                          url = result.message.url;
                                          slug = result.message.slug;
                                          $("#formModule input[name=parent_id]").val(result.message.id);
                                          $("#formModule input[name=url]").val(result.message.url+"/");
                                          $("#formModule input[name=slug]").val(result.message.slug+"/");
                                          $("#formModule input[name=icon]").val("images/folder.png");
                                          $("#popupWindow").jqxWindow('open');
                                          $("#formModule #inputName").focus();
                                        }
                                        else{
                                          alert(result.message);
                                        }
                                      }
                                    });

                                  }
                                  break;
                  case "remove":

                      var selectedItem = $('#ListOfModule').jqxTree('selectedItem');
                      var moduleFolder = selectedItem.label
                      moduleFolder = moduleFolder.replace(" ","_");
                      if (selectedItem != null) {
                        $.ajax({
                          url:"<?=site_url("engine/module/removeFolder")?>",
                          type:"POST",
                          data:{"id":selectedItem.id,"moduleFolder":moduleFolder},
                          dataType:"JSON",
                          success:function(result)
                          {
                            if(result.status=="success")
                            {
                              $('#ListOfModule').jqxTree('removeItem', selectedItem.element);

                              attachContextMenu();
                            }
                            else{
                              alert(result.message);
                            }
                          }
                        });

                      }
                      break;

              }
          });

          // disable the default browser's context menu.
          $(document).on('contextmenu', function (e) {
              if ($(e.target).parents('.jqx-tree').length > 0) {
                  return false;
              }
              return true;
          });

          function isRightClick(event) {
              var rightclick;
              if (!event) var event = window.event;
              if (event.which) rightclick = (event.which == 3);
              else if (event.button) rightclick = (event.button == 2);
              return rightclick;
          }
          //form

          $("#formModule #Cancel").jqxButton();
          $("#formModule #Save").jqxButton();
          $("#formModule").submit(function(){
            var moduleFolder = $("#inputName").val();
            $.ajax({
              url:"<?=site_url("engine/module/createFolder")?>",
              type:"POST",
              data:$(this).serialize(),
              dataType:"JSON",
              success:function(result)
              {
                if(result.status=="success")
                {
                  if(!$("#formModule input[name=id]").val())
                  {
                    location.href="<?=current_url()?>";
                    //$('#ListOfModule').jqxTree('addTo', { label: $("#inputName").val(),icon:"<?=base_url("assets/jqwidgets/images/folder.png")?>",value:false });
                    //attachContextMenu();
                  }
                  else{
                    location.href="<?=current_url()?>";
                    //$('#ListOfModule').jqxTree('updateItem', { label: $("#inputName").val()});
                  }

                  $("#popupWindow").jqxWindow('close');
                  $("#formModule .reset").click();
                }
                else{
                  alert(result.message);
                }
              }
            });
            return false;
          });
          $("#formModule #inputName").keyup(function(){
            var replace = $(this).val().replace(" ","_");
            var module = url.split("/");
            if(module.length==3 && $("#formModule input[name=module_type]").val()=="folder")
            {
              var newModule = [];

              for(var x=1;x<module.length;x++)
              {
                newModule[x-1] = module[x];
              }

              $("#formModule #inputUrl").val(module[0]+"/"+newModule.join("_")+replace+"/");
            }
            else{
              $("#formModule #inputUrl").val(url+replace+"/");
            }
            $("#formModule #inputSlug").val(slug+replace+"/");
          });
          $("#popupWindow").jqxWindow({width: 400, resizable: false,  isModal: true, autoOpen: false, cancelButton: $("#Cancel"), modalOpacity: 0.01});
