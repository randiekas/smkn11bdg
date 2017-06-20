<div id="jqxDockingLayout">
<!--The panel content divs can have a flat structure-->
<!--documentGroup-->
<div data-container="UIDesigner">
  <div id="contenteditable" style="height:100%">
    <section id="canvas" style="height:100%;-webkit-user-select:none">
    			<div class="sizer">

    				<div class="ui-offset">
              <iframe id="frameUIDesigner"></iframe>


    					<div class="grid"></div>

    					<div class="highlight-rect"></div>

    					<div class="focus-rect">
    						<div class="move-handle"></div>
    					</div>

    					<div class="dom-highlight"></div>

    					<div class="line"></div>

    					<div class="inline-caret"></div>

    				</div>
    			</div>

    		</section>



  </div>
</div>
<div data-container="UIPreview">
  <iframe id="frameUIPreview" style="width:100%;height:100%;border:none">
  </iframe>
</div>
<div data-container="UICode">
  <textarea id="UICodeSource" name="UICodeSource" class="UICodeSource" style="width:'100%';height:'100%'"></textarea>
</div>
<div data-container="ControllerCode">
  <textarea id="ControllerCodeSource" name="ControllerSource" class="ControllerSource" style="width:'100%';height:'100%'"></textarea>
</div>
<div data-container="ModelCode">
  <textarea id="ModelCodeSource" name="ModelSource" class="ModelSource" style="width:'100%';height:'100%'"></textarea>
</div>
<div data-container="BlueprintModule">
    Coming Soon . . .
</div>
<div data-container="BlueprintGlobal">
      <div id='jqxExpanderUserLevel' style="float:left">
          <div>
              User Level
          </div>
          <div>
            <div id="jqxgridUserLevel"></div>

            <div id="jqxNotification">
               <div id="notificationContent">
               </div>
           </div>

           <div id="containerNotification" style="width:100%">
           </div>
          </div>
      </div>
      <div id='jqxExpanderUserLevelModule' style="float:left">
          <div>
            User Level Module
          </div>
          <div>
            <div id="jqxTreeUserLevelModule"></div>
          </div>
      </div>
      <div id='jqxExpanderUserLevelUser'style="float:left">
          <div>
            User Level User
          </div>
          <div>
            <div id="jqxgridUserLevelUser"></div>
          </div>
      </div>
</div>
<!--bottom tabbedGroup-->
<div data-container="ElementsPanel">
    <textarea id="editorElements" name="editorElements" class="editorElements" style="width:'100%';height:'100%'"></textarea>
</div>
<div data-container="PropertiesPanel">
    <div id="jqxgridProperties" style="float:left">
    </div>
    <div id='jqxNavigationBarProperties' style="float:left">
            <div>Value</div>
            <div>
              <textarea id="editorValue" name="code" class="PropertiesValue" style="width:'100%';height:'100%'"></textarea>
            </div>
            <div>
                properties.json
            </div>
            <div>
              <textarea id="editorProperties" name="code" class="propertiesJson" style="width:'100%';height:'100%'"><?=$this->load->view("engine/designer/level/jqxgrid.json",array(),TRUE)?></textarea>
            </div>
        </div>
</div>
<div data-container="EventsPanel">
    Coming soon ...
</div>
<div data-container="PluginsPanel">
  <div class="row">
      <div class="col-sm-4">
        <?php
        foreach($this->db->get("plugins")->result() as $row)
        {
        ?>
        <div class="input-group">
          <input type="text" class="input-sm form-control addPluginName_<?=$row->id?>" placeholder="Folder Name ( No Space )">
          <span class="input-group-btn">
          <button class="btn btn-sm btn-default btn-s-lg addPluginButton" id-plugin="<?=$row->id?>" folder="<?=$row->folder?>" type="button"><i class="fa fa-plus pull-right"></i> <?=$row->name?></button>
          </span>
        </div>
        <?php
        }
        ?>
      </div>
  </div>
</div>
<!--right tabbedGroup-->
<div data-container="ContentList">
  <div id="jqxNavigationBar">
      <div>
          <div style='margin-top: 2px;'>

              <div style='margin-left: 4px; float: left;'>
                  Module List
              </div>
          </div>
      </div>
      <div>
        <div id="ListOfModule" style="border: none;">
        </div>
        <div id='jqxMenu'></div>
        <div id="popupWindow">
                    <div>New Menu</div>
                    <div style="overflow: hidden;">
                        <form id="formModule">
                        <section class="panel panel-default">
                          <div class="panel-body">
                            <form class="bs-example form-horizontal">
                              <input type="hidden" name="id">
                              <input type="hidden" name="parent_id" value="0">
                              <input type="hidden" name="sort_number">
                              <input type="hidden" name="module_type" value="folder">
                              <div class="form-group">
                                <label>Label</label>
                                <input type="text" class="form-control" placeholder="Label" id="inputName" name="moduleFolder" required>
                              </div>
                              <div class="form-group">
                                <label>URL</label>
                                <input type="text" class="form-control" placeholder="URL" id="inputUrl" name="url" required>
                              </div>
                              <div class="form-group">
                                <label>SLUG</label>
                                <input type="text" class="form-control" placeholder="SLUG" id="inputSlug" name="slug" required>
                              </div>
                              <div class="form-group">
                                <label>Icon</label>
                                <input type="text" class="form-control" placeholder="Icon" id="inputIcon" name="icon" required value="images/folder.png">
                              </div>
                              <div class="form-group">
                                <label>NA</label>
                                <label>
                                  <input type="checkbox" checked="" name="na">
                                </label>
                              </div>

                              <div class="form-group">

                                  <input style="margin-right: 5px;" type="submit" id="Save" value="Save" /><input id="Cancel" type="button" value="Cancel" />
                                  <input type="reset" class="reset">
                              </div>


                            </form>
                          </div>
                        </section>
                        <input type="submit" style="display:none">
                      </form>
                    </div>
               </div>
      </div>
      <div>
          <div style='margin-top: 2px;'>

              <div style='margin-left: 4px; float: left;'>
                  Page List</div>
          </div>
      </div>
      <div>
        <div id="ListOfPage" style="border: none;">
        </div>
      </div>
  </div>



</div>
<div data-container="UIComponent">
  <div id="splitterUICode" style="-webkit-user-select:none">
      <div>
        <div id="jqxNavigationBarListOfCopmonents">
            <div>
                <div style='margin-top: 2px;'>

                    <div style='margin-left: 4px; float: left;'>
                        Bootstrap
                    </div>
                </div>
            </div>
            <div>
              <div>
                <div id="ListOfUIComponentBootstrap">
                </div>
              </div>
            </div>
            <div>
                <div style='margin-top: 2px;'>

                    <div style='margin-left: 4px; float: left;'>
                        Widgets
                    </div>
                </div>
            </div>
            <div>
              <div id="ListOfUIComponentWidgets">
              </div>
            </div>
        </div>



      </div>
      <div>
        <div id="jqxtreeUICodePreview" style="overflow-y: auto;">

        </div>
      </div>
  </div>

</div>
<!--floatGroup-->
<div data-container="OutputPanel">
    <div style="font-family: Consolas;">
        Terima kasih telah memilih engine ini.
    </div>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
      var WindowWidth =  $( window ).width();
      var WindowHeight =  $( window ).height();
        // the 'layout' JSON array defines the internal structure of the docking layout
        var layout = [{
            type: 'layoutGroup',
            orientation: 'horizontal',
            items: [{
                type: 'tabbedGroup',
                width: WindowWidth*(0.2),
                minWidth: 200,
                items: [{
                    type: 'layoutPanel',
                    title: 'Content List',
                    contentContainer: 'ContentList',
                    initContent: function () {
                      $("#jqxNavigationBar").jqxNavigationBar({expandMode: 'multiple',height:"100%", expandedIndexes: [0, 1]});
                      <?=$this->load->view("modulelist/jqxtree.js",array(),TRUE)?>
                      <?=$this->load->view("pagelist/jqxtree.js",array(),TRUE)?>
                    }
                }, {
                    type: 'layoutPanel',
                    title: 'UI Component',
                    contentContainer: 'UIComponent',
                    initContent: function () {
                        // initialize a jqxTree inside the Solution Explorer Panel
                        $('#splitterUICode').jqxSplitter({ width: '100&', height: '99%', orientation: 'horizontal', panels: [{ size: '70%', collapsible: false },{collapsible: true }] });
                        $("#jqxNavigationBarListOfCopmonents").jqxNavigationBar({expandMode: 'multiple',height:"100%", expandedIndexes: [0, 1]});
                        <?=$this->load->view("listofuicomponentwidget/jqxtree.js",array(),TRUE)?>
                        <?=$this->load->view("listofuicomponentbootstrap/jqxtree.js",array(),TRUE)?>


                    }
                }]
            },{
                type: 'layoutGroup',
                orientation: 'vertical',
                width: WindowWidth*(0.8),
                items: [{
                    type: 'documentGroup',
                    height: (WindowHeight-60)*(0.7),
                    minHeight: 200,
                    items: [{
                        type: 'documentPanel',
                        title: 'UI Preview',
                        contentContainer: 'UIPreview'
                    },{
                        type: 'documentPanel',
                        title: 'UI Designer',
                        contentContainer: 'UIDesigner'
                    },{
                        type: 'documentPanel',
                        title: 'UI Code',
                        contentContainer: 'UICode',
                        initContent:function(){

                          <?=$this->load->view("uicodesource/codemirror.js",array(),TRUE)?>
                        }
                    },{
                        type: 'documentPanel',
                        title: 'Controller Code',
                        contentContainer: 'ControllerCode',
                        initContent:function(){

                          <?=$this->load->view("controllercodesource/codemirror.js",array(),TRUE)?>
                        }
                    },{
                        type: 'documentPanel',
                        title: 'Model Code',
                        contentContainer: 'ModelCode',
                        initContent:function(){

                          <?=$this->load->view("modelcodesource/codemirror.js",array(),TRUE)?>
                        }
                    }, {
                        type: 'documentPanel',
                        title: 'Blueprint Module',
                        contentContainer: 'BlueprintModule'
                    }, {
                        type: 'documentPanel',
                        title: 'User Application',
                        contentContainer: 'BlueprintGlobal',
                        initContent:function(){


                            $("#jqxExpanderUserLevel").jqxExpander({width:'30%',height:'100%'});
                            $("#jqxExpanderUserLevelModule").jqxExpander({width:'40%',height:'100%'});
                            $("#jqxExpanderUserLevelUser").jqxExpander({width:'30%',height:'100%'});


                        }
                    }]
                }, {
                    type: 'tabbedGroup',
                    height: (WindowHeight-60)*(0.3),
                    pinnedHeight: 30,
                    items: [{
                        type: 'layoutPanel',
                        title: 'Elements',
                        contentContainer: 'ElementsPanel',

                    },{
                        type: 'layoutPanel',
                        title: 'Properties',
                        contentContainer: 'PropertiesPanel',

                    },{
                        type: 'layoutPanel',
                        title: 'Events',
                        contentContainer: 'EventsPanel',

                    },{
                        type: 'layoutPanel',
                        title: 'Plugins',
                        contentContainer: 'PluginsPanel',

                    }]
                }]
            }]
        }  /*
          ,{
              type: 'floatGroup',
              width: 500,
              height: 300,
              position: {
                  x: 350,
                  y: 250
              },
              items: [{
                  type: 'layoutPanel',
                  title: 'Thanks',
                  contentContainer: 'OutputPanel',
                  selected: true
              }]
          }
          */];


        $('#jqxDockingLayout').jqxDockingLayout({width: WindowWidth, height: WindowHeight-60, layout: layout });
    });
</script>
<script type="text/javascript">
$(document).ready(function () {
   // prepare the data
   <?=$this->load->view("level/jqxgrid.js",array(),TRUE)?>
});
</script>
<script type="text/javascript">
$(document).ready(function(){
  // prepare the data
  <?=$this->load->view("user/jqxgrid.js",array(),TRUE)?>
});
</script>
<script type="text/javascript">
$(document).ready(function(){
  // prepare the data
  <?=$this->load->view("module/jqxtree.js",array(),TRUE)?>
});
</script>
<script type="text/javascript">
var properties = {};
$(document).ready(function(){
  <?=$this->load->view("elements/codemirror.js",array(),TRUE)?>
  // prepare the data
  <?=$this->load->view("properties/jqxgrid.js",array(),TRUE)?>
  <?=$this->load->view("properties/jqxnavigationbar.js",array(),TRUE)?>
  <?=$this->load->view("properties/codemirror.js",array(),TRUE)?>
  <?=$this->load->view("plugins/plugins.js",array(),TRUE)?>

});
</script>
<script type="text/javascript">
$(document).ready(function(){
  <?=$this->load->view("uicodepreview/jqxtree.js",array(),TRUE)?>
});
</script>
