<div id="jqxDockingLayout">
<div data-container="UIPreview">
  <iframe id="frameUIPreview" style="width:100%;height:99.50%;border:none" SRC="<?=site_url()?>/dashboard/list_module/">
  </iframe>
</div>
<!--right tabbedGroup-->
<div data-container="ModuleList">
  <div id="ListOfModule" style="border: none;">
  </div>

</div>
<div data-container="FavouritesModules">
	<?php $this->load->view("menu_panduan") ?>
</div>
<!--floatGroup-->
<div data-container="OutputPanel">
    <div style="font-family: Consolas;">
        
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
                    title: 'Modules',
                    contentContainer: 'ModuleList',
                    initContent: function () {
                      <?=$this->load->view("modulelist/jqxtree.js",array(),TRUE)?>

                    }
                }, {
                    type: 'layoutPanel',
                    title: 'Panduan Aplikasi',
                    contentContainer: 'FavouritesModules',
                    initContent: function () {



                    }
                }]
            },{
                type: 'layoutGroup',
                orientation: 'vertical',
                width: WindowWidth*(0.8),
                items: [{
                    type: 'documentGroup',
                    height: (WindowHeight-61),
                    minHeight: 200,
                    items: [{
                        type: 'documentPanel',
                        title: 'Page of Module',
                        contentContainer: 'UIPreview'
                    }]
                }]
            }]
        }];


        $('#jqxDockingLayout').jqxDockingLayout({width: WindowWidth, height: WindowHeight-60, layout: layout });
    });
</script>
