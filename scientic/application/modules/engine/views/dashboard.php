<!DOCTYPE html>
<html lang="en" class="app">
<head>
<meta charset="utf-8" />
<title>ISSAC Engine</title>
<meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<link rel="stylesheet" href="<?=base_url("assets/backend")?>/css/app.v1.css" type="text/css" />
<link rel="stylesheet" href="<?=base_url("assets/backend")?>/js/calendar/bootstrap_calendar.css" type="text/css" />
<!--[if lt IE 9]> <script src="<?=base_url("assets/backend")?>/js/ie/html5shiv.js"></script> <script src="<?=base_url("assets/backend")?>/js/ie/respond.min.js"></script> <script src="<?=base_url("assets/backend")?>/js/ie/excanvas.js"></script> <![endif]-->
<link rel="stylesheet" href="<?=base_url("assets/jqwidgets")?>/jqwidgets/styles/jqx.base.css" type="text/css" />
<script type="text/javascript" src="<?=base_url("assets/jqwidgets")?>/scripts/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="<?=base_url("assets/codemirror-master")?>/theme/ambiance.css">
<link rel="stylesheet" href="<?=base_url("assets/codemirror-master")?>/lib/codemirror.css">
<link rel="stylesheet" href="<?=base_url("assets/codemirror-master")?>/addon/dialog/dialog.css">
<link rel="stylesheet" href="<?=base_url("assets/codemirror-master")?>/addon/search/matchesonscrollbar.css">
<link rel="stylesheet" href="<?=base_url("assets/codemirror-master")?>/addon/fold/foldgutter.css" />

<link rel="stylesheet" type="text/css" href="<?=base_url("assets/craftpip")?>/css/jquery-confirm.css" />
<style>
    .dh_hover {
      opacity: 0.8;
      border: 1px solid #0990C5;
      position: relative;
      top: -2px;
      left: -2px;
    }

    #dialog {
      display: none;
      position: relative;
      top: 5px;
      left: 15px;
      font-size: 16px;
      font-weight: normal;
      background: #DDD;
      padding: 5px 10px;
      width: 300px;
      z-index: 3;
      border: 3px solid #999;
    }
    .CodeMirror {
    border: 1px solid #eee;
    width:100%;
  }
  .initial {
    display:initial !important;
  }
  </style>
</head>
<body class="">
  <?=$this->load->view("canvas")?>
  <section class="vbox">
    <header class="bg-white header header-md navbar navbar-fixed-top-xs box-shadow">
      <div class="navbar-header aside-md dk"> <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav"> <i class="fa fa-bars"></i> </a> <a href="<?=base_url()?>" class="navbar-brand"><img src="<?=base_url("assets/backend")?>/images/logo.png" class="m-r-sm">ISSAC</a> <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user"> <i class="fa fa-cog"></i> </a> </div>
      <ul class="nav navbar-nav hidden-xs">
        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="i i-grid"></i> </a>
          <section class="dropdown-menu aside-lg bg-white on animated fadeInLeft">
            <div class="row m-l-none m-r-none m-t m-b text-center">
              <div class="col-xs-4">
                <div class="padder-v"> <a href="#"> <span class="m-b-xs block"> <i class="i i-mail i-2x text-primary-lt"></i> </span> <small class="text-muted">Mailbox</small> </a> </div>
              </div>
              <div class="col-xs-4">
                <div class="padder-v"> <a href="#"> <span class="m-b-xs block"> <i class="i i-calendar i-2x text-danger-lt"></i> </span> <small class="text-muted">Calendar</small> </a> </div>
              </div>
              <div class="col-xs-4">
                <div class="padder-v"> <a href="#"> <span class="m-b-xs block"> <i class="i i-map i-2x text-success-lt"></i> </span> <small class="text-muted">Map</small> </a> </div>
              </div>
              <div class="col-xs-4">
                <div class="padder-v"> <a href="#"> <span class="m-b-xs block"> <i class="i i-paperplane i-2x text-info-lt"></i> </span> <small class="text-muted">Trainning</small> </a> </div>
              </div>
              <div class="col-xs-4">
                <div class="padder-v"> <a href="#"> <span class="m-b-xs block"> <i class="i i-images i-2x text-muted"></i> </span> <small class="text-muted">Photos</small> </a> </div>
              </div>
              <div class="col-xs-4">
                <div class="padder-v"> <a href="#"> <span class="m-b-xs block"> <i class="i i-clock i-2x text-warning-lter"></i> </span> <small class="text-muted">Timeline</small> </a> </div>
              </div>
            </div>
          </section>
        </li>
      </ul>
      <form class="navbar-form navbar-left input-s-lg m-t m-l-n-xs hidden-xs" role="search">
        <div class="form-group">
          <div class="input-group"> <span class="input-group-btn">
            <button type="submit" class="btn btn-sm bg-white b-white btn-icon"><i class="fa fa-search"></i></button>
            </span>
            <input type="text" class="form-control input-sm no-border" placeholder="Search apps, projects...">
          </div>
        </div>
      </form>
      <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user user">
        <li class="hidden-xs"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="i i-chat3"></i> <span class="badge badge-sm up bg-danger count">2</span> </a>
          <section class="dropdown-menu aside-xl animated flipInY">
            <section class="panel bg-white">
              <header class="panel-heading b-light bg-light"> <strong>You have <span class="count">2</span> notifications</strong> </header>
              <div class="list-group list-group-alt"> <a href="#" class="media list-group-item"> <span class="pull-left thumb-sm"> <img src="<?=base_url("assets/backend")?>/images/a0.jpg" alt="John said" class="img-circle"> </span> <span class="media-body block m-b-none"> Use awesome animate.css<br>
                <small class="text-muted">10 minutes ago</small> </span> </a> <a href="#" class="media list-group-item"> <span class="media-body block m-b-none"> 1.0 initial released<br>
                <small class="text-muted">1 hour ago</small> </span> </a> </div>
              <footer class="panel-footer text-sm"> <a href="#" class="pull-right"><i class="fa fa-cog"></i></a> <a href="#notes" data-toggle="class:show animated fadeInRight">See all the notifications</a> </footer>
            </section>
          </section>
        </li>
        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="thumb-sm avatar pull-left"> <img src="<?=base_url("assets/backend")?>/images/a0.jpg"> </span> <?=$this->session->userdata("username")?> <b class="caret"></b> </a>
          <ul class="dropdown-menu animated fadeInRight">
            <span class="arrow top"></span>
            <li> <a href="#">Settings</a> </li>
            <li> <a href="profile.html">Profile</a> </li>
            <li> <a href="#"> <span class="badge bg-danger pull-right">3</span> Notifications </a> </li>
            <li> <a href="docs.html">Help</a> </li>
            <li class="divider"></li>
            <li> <a href="<?=site_url("dashboard/signout")?>">Logout</a> </li>
          </ul>
        </li>
      </ul>
    </header>
    <section>
      <section class="hbox stretch">
        <section id="content"><?php $this->load->view((isset($content))?$content:"content") ?></section>
      </section>
    </section>
  </section>


  <div class="cloak"></div>

  <div id="freeze-ui"></div>

  <div id="dragbox">
  <div id="ghost"></div>
  </div>

  <div id="style-drag"></div>

  <span contenteditable id="focus-target"></span>
<!-- Bootstrap -->
<!-- App -->
<script src="<?=base_url("assets/backend")?>/js/app.v1.js"></script>
<script src="<?=base_url("assets/codemirror-master/")?>/lib/codemirror.js"></script>
<script src="<?=base_url("assets/codemirror-master/")?>/mode/javascript/javascript.js"></script>
<script src="<?=base_url("assets/codemirror-master/")?>/addon/selection/active-line.js"></script>
<script src="<?=base_url("assets/codemirror-master/")?>/addon/edit/matchbrackets.js"></script>
<script src="<?=base_url("assets/codemirror-master/")?>/addon/dialog/dialog.js"></script>
<script src="<?=base_url("assets/codemirror-master/")?>/addon/search/searchcursor.js"></script>
<script src="<?=base_url("assets/codemirror-master/")?>/addon/search/search.js"></script>
<script src="<?=base_url("assets/codemirror-master/")?>/addon/scroll/annotatescrollbar.js"></script>
<script src="<?=base_url("assets/codemirror-master/")?>/addon/search/matchesonscrollbar.js"></script>
<script src="<?=base_url("assets/codemirror-master/")?>/mode/htmlmixed/htmlmixed.js"></script>
<script src="<?=base_url("assets/codemirror-master/")?>/mode/xml/xml.js"></script>
<script src="<?=base_url("assets/codemirror-master/")?>/mode/javascript/javascript.js"></script>
<script src="<?=base_url("assets/codemirror-master/")?>/mode/css/css.js"></script>
<script src="<?=base_url("assets/codemirror-master/")?>/mode/clike/clike.js"></script>
<script src="<?=base_url("assets/codemirror-master/")?>/mode/php/php.js"></script>
<script src="<?=base_url("assets/codemirror-master/")?>/addon/fold/foldcode.js"></script>
<script src="<?=base_url("assets/codemirror-master/")?>/addon/fold/foldgutter.js"></script>
<script src="<?=base_url("assets/codemirror-master/")?>/addon/fold/brace-fold.js"></script>
<script src="<?=base_url("assets/codemirror-master/")?>/addon/fold/xml-fold.js"></script>
<script src="<?=base_url("assets/codemirror-master/")?>/addon/fold/markdown-fold.js"></script>
<script src="<?=base_url("assets/codemirror-master/")?>/addon/fold/comment-fold.js"></script>
<script src="<?=base_url("assets/codemirror-master/")?>/mode/markdown/markdown.js"></script>
<script src="<?=base_url("assets/codemirror-master/")?>/addon/edit/matchtags.js"></script>
<script type="text/javascript" src="<?=base_url("assets/craftpip")?>/js/jquery-confirm.js"></script>
<script type="text/javascript" src="<?=base_url("assets/jqwidgets")?>/jqwidgets/jqxcore.js"></script>
<script type="text/javascript" src="<?=base_url("assets/jqwidgets")?>/jqwidgets/jqxdata.js"></script>
<script type="text/javascript" src="<?=base_url("assets/jqwidgets")?>/jqwidgets/jqxbuttons.js"></script>
<script type="text/javascript" src="<?=base_url("assets/jqwidgets")?>/jqwidgets/jqxscrollbar.js"></script>
<script type="text/javascript" src="<?=base_url("assets/jqwidgets")?>/jqwidgets/jqxmenu.js"></script>
<script type="text/javascript" src="<?=base_url("assets/jqwidgets")?>/jqwidgets/jqxgrid.js"></script>
<script type="text/javascript" src="<?=base_url("assets/jqwidgets")?>/jqwidgets/jqxgrid.selection.js"></script>
<script type="text/javascript" src="<?=base_url("assets/jqwidgets")?>/jqwidgets/jqxgrid.sort.js"></script>
<script type="text/javascript" src="<?=base_url("assets/jqwidgets")?>/jqwidgets/jqxgrid.edit.js"></script>
<script type="text/javascript" src="<?=base_url("assets/jqwidgets")?>/jqwidgets/jqxknockout.js"></script>
<script type="text/javascript" src="<?=base_url("assets/jqwidgets")?>/jqwidgets/jqxcheckbox.js"></script>
<script type="text/javascript" src="<?=base_url("assets/jqwidgets")?>/jqwidgets/jqxgrid.pager.js"></script>
<script type="text/javascript" src="<?=base_url("assets/jqwidgets")?>/jqwidgets/jqxdropdownlist.js"></script>
<script type="text/javascript" src="<?=base_url("assets/jqwidgets")?>/jqwidgets/jqxlistbox.js"></script>
<script type="text/javascript" src="<?=base_url("assets/jqwidgets")?>/jqwidgets/jqxgrid.filter.js"></script>
<script type="text/javascript" src="<?=base_url("assets/jqwidgets")?>/jqwidgets/jqxgrid.columnsresize.js"></script>
<script type="text/javascript" src="<?=base_url("assets/jqwidgets")?>/jqwidgets/jqxgrid.grouping.js"></script>
<script type="text/javascript" src="<?=base_url("assets/jqwidgets")?>/jqwidgets/jqxgrid.export.js"></script>
<script type="text/javascript" src="<?=base_url("assets/jqwidgets")?>/jqwidgets/jqxdata.export.js"></script>
<script type="text/javascript" src="<?=base_url("assets/jqwidgets")?>/jqwidgets/jqxNotification.js"></script>
<script type="text/javascript" src="<?=base_url("assets/jqwidgets")?>/jqwidgets/jqxcombobox.js"></script>
<script type="text/javascript" src="<?=base_url("assets/jqwidgets")?>/jqwidgets/jqxnumberinput.js"></script>
<script type="text/javascript" src="<?=base_url("assets/jqwidgets")?>/jqwidgets/jqxexpander.js"></script>
<script type="text/javascript" src="<?=base_url("assets/jqwidgets")?>/jqwidgets/jqxTree.js"></script>
<script type="text/javascript" src="<?=base_url("assets/jqwidgets")?>/jqwidgets/jqxTabs.js"></script>
<script type="text/javascript" src="<?=base_url("assets/jqwidgets")?>/jqwidgets/jqxInput.js"></script>
<script type="text/javascript" src="<?=base_url("assets/jqwidgets")?>/jqwidgets/jqxDateTimeInput.js"></script>
<script type="text/javascript" src="<?=base_url("assets/jqwidgets")?>/jqwidgets/jqxcalendar.js"></script>
<script type="text/javascript" src="<?=base_url("assets/jqwidgets")?>/jqwidgets/jqxValidator.js"></script>
<script type="text/javascript" src="<?=base_url("assets/jqwidgets")?>/jqwidgets/jqxChart.js"></script>
<script type="text/javascript" src="<?=base_url("assets/jqwidgets")?>/jqwidgets/jqxDataTable.js"></script>
<script type="text/javascript" src="<?=base_url("assets/jqwidgets")?>/jqwidgets/jqxribbon.js"></script>
<script type="text/javascript" src="<?=base_url("assets/jqwidgets")?>/jqwidgets/jqxlayout.js"></script>
<script type="text/javascript" src="<?=base_url("assets/jqwidgets")?>/jqwidgets/jqxDockingLayout.js"></script>
<script type="text/javascript" src="<?=base_url("assets/jqwidgets")?>/jqwidgets/jqxWindow.js"></script>
<script type="text/javascript" src="<?=base_url("assets/jqwidgets")?>/jqwidgets/jqxDocking.js"></script>
<script type="text/javascript" src="<?=base_url("assets/jqwidgets")?>/jqwidgets/jqxDropDownButton.js"></script>
<script type="text/javascript" src="<?=base_url("assets/jqwidgets")?>/jqwidgets/jqxEditor.js"></script>
<script type="text/javascript" src="<?=base_url("assets/jqwidgets")?>/jqwidgets/jqxDragDrop.js"></script>
<script type="text/javascript" src="<?=base_url("assets/jqwidgets")?>/jqwidgets/jqxNavigationBar.js"></script>
<script type="text/javascript" src="<?=base_url("assets/jqwidgets")?>/jqwidgets/jqxTreeGrid.js"></script>
<script type="text/javascript" src="<?=base_url("assets/jqwidgets")?>/jqwidgets/jqxgrid.aggregates.js"></script>
<script type="text/javascript" src="<?=base_url("assets/jqwidgets")?>/jqwidgets/jqxgrid.columnsreorder.js"></script>
<script type="text/javascript" src="<?=base_url("assets/jqwidgets")?>/jqwidgets/jqxDateTimeInput.js"></script>
<script type="text/javascript" src="<?=base_url("assets/jqwidgets")?>/jqwidgets/jqxSplitter.js"></script>
<script type="text/javascript">
dragElement = null;
edge=null;
aboveCanvas = false;
aboveOverview = false;
isDragging = false;
draggedComponent = null;
dropCall = null;
inlineEditingBar = null;
tabBar = null;
toolBar = null;
columnOperationsBar = null;
overviewPane = null;
optionsPane = null;
componentPane = null;
assetsPane = null;
stylesPane = null;
context = null;
openedContexts = [];
packages = [];
userThemes = [];
recent = [];
userCSSElement = null;
canvas = null;
pubsub = {};
changedIDMap = {};
selectorIframe = "frameUIDesigner";
moveElement = false;
selectedElement = null;
tempCopySelectedElement = null;
itemValue = null;
var mouseX ;
var mouseY ;
var zoom = 1;

$(function(){
	$(this).on({
		mousemove:function( event ) {
			mouseX = event.pageX;
			mouseY = event.pageY;
			Designer.mouseMove();
		},
		mouseup:function(){
			Designer.dragEnd();
		},
    keydown:function(key)
		{
			if(key.keyCode==46)
			{
				Designer.deleteElement();
			}
		}
	});
$('#ListOfUIComponentBootstrap').on('initialized', function (event) {
  $("#ListOfUIComponentBootstrap .jqx-tree-dropdown-root li").mousedown(function(){
    var element = $(this);
  	Designer.dragStart(element,false);
  });
  $(this).on('select',function (event)
  {
      var args = event.args;
      var item = $(this).jqxTree('getItem', args.element);
      $.ajax({
          async: false,
          url:"<?=site_url()?>/engine/designer/getComponentSource",
          type:"post",
          data:{id:item.id}
        }).done(function(result){
           itemValue = result;
        });

  });
});
$('#ListOfUIComponentWidgets').on('initialized', function (event) {
  $("#ListOfUIComponentWidgets .jqx-tree-dropdown-root li").mousedown(function(){
    var element = $(this);
  	Designer.dragStart(element,false);
  });
  $(this).on('select',function (event)
  {
      var args = event.args;
      var item = $(this).jqxTree('getItem', args.element);
      itemValue = '<div class="initial">'+item.value+"</div>";
  });
});

$(".move-handle").mousedown(function(){
	var element = $(this);
	Designer.dragStart(element,true);
});


$("#"+selectorIframe).attr("style","width: 1024px; height: 3793px");
$("#frameUIPreview").attr("src","<?=site_url()?>/dashboard/signin");
$("#frameUIPreview").load(function(){
  $("#"+selectorIframe).attr("src","<?=site_url()?>/engine/designer/getUIDesigner?slug="+$(this).attr("src"));
});
$("#"+selectorIframe).load(function(){
  $(this).contents().on({
		mousemove:function( event ) {
			mouseX = event.pageX;
			mouseY = event.pageY;
			Designer.mouseMove();
		},
		mouseup:function(){
			Designer.dragEnd();
			Designer.insertElement();
		},
		keydown:function(key)
		{
			if(key.keyCode==46)
			{
				Designer.deleteElement();
			}
      else if(key.originalEvent.keyCode==83 && key.originalEvent.altKey==true)
      {
        Designer.saveUIDesigner();
      }
      else if(key.originalEvent.keyCode==67 && key.originalEvent.altKey==true)
      {
        Designer.copySelectedElement();
      }
      else if(key.originalEvent.keyCode==86 && key.originalEvent.altKey==true)
      {
        Designer.pasteSelectedElement();
      }
      else if(key.originalEvent.keyCode==68 && key.originalEvent.altKey==true)
      {
        Designer.duplicateSelectedElement();
        return false;
      }
      else if(key.originalEvent.keyCode==82 && key.originalEvent.altKey==true)
      {
        Designer.reload();
      }

		}
	});
	Designer.onLoadFrame();
});

});

var Designer = {
						dragStart:function(element,move){
							dragElement = element;
							iframe = document.getElementById(selectorIframe);
							dragbox = document.getElementById("dragbox");
							ghost = document.getElementById("ghost");
									var ghostX = element.offset().left - mouseX,
											ghostY =  element.offset().top - mouseY,
											ghostWidth = element.width(),
											ghostHeight = element.height();
									iframe.style.pointerEvents ="all";
									ghost.style.transform ="translate3D(" + ghostX +"px," + ghostY +"px, 0)";
									ghost.style.width =ghostWidth + "px";
									ghost.style.height =ghostHeight + "px";
									ghost.style.opacity =.5;
									dragbox.style.display ="block";
									setTimeout(function()
									{
											ghost.style.transform ="translate3d(10px, 10px, 0)";
											ghost.style.width ="14px";
											ghost.style.height ="14px";
											ghost.style.opacity =.9
									}.bind(this), 20);
									isDragging = true;
									dragbox.style.transform ="translate3D(" + mouseX	+ "px," + mouseY+"px, 0)";
									if(move)
									{
										moveElement = true;
									}
									else{
										moveElement = false;
									}
						},
						dragEnd:function()
						{
							iframe = document.getElementById(selectorIframe);
							if(isDragging)
							{
								dragbox.style.display ="none";
							}
							$(".line").attr("style","display: none;");
							$(".line").removeClass("left top bottom right");
							isDragging = false;
							iframe.style.pointerEvents ="all";
						},
						mouseMove:function(){
							if(isDragging)
							{
								dragbox.style.transform ="translate3D(" + mouseX	+ "px," + mouseY+"px, 0)";
							}
						},
						insertElement:function(){
							if(dragElement)
							{
								if(moveElement)
								{
									if(edge=="top")
									{
										currentElement.before(selectedElement);
									}
                  else if(edge=="left")
                  {
                    currentElement.prepend(selectedElement);
                  }
									else if(edge=="bottom"){
										currentElement.after(selectedElement);
									}
                  else if(edge=="right")
                  {
                    currentElement.append(selectedElement);
                  }
									$(".focus-rect").attr("style","display: none;");
										//selectedElement.remove();
								}
								else{
                  newElement = itemValue;
                  if(edge=="top")
									{
										currentElement.before(newElement);
									}
                  else if(edge=="left")
                  {
                    currentElement.prepend(newElement);
                  }
									else if(edge=="bottom"){
										currentElement.after(newElement);
									}
                  else if(edge=="right")
                  {
                    currentElement.append(newElement);
                  }

								}

								dragElement = null;
								Designer.onLoadFrame();

							}

						},
						deleteElement:function(){

							$(".focus-rect").attr("style","display: none;");
              selectedElement.remove().promise().done(function(){
                loadUICodePreview();
              });

						},
						//onload iframe
						onLoadFrame:function(){
              $("#"+selectorIframe).contents().find("body *").click(function(){

								 selectedElement=$(this);
								 var top = selectedElement.offset().top*zoom;
				         var left = selectedElement.offset().left*zoom;
								 var width = selectedElement.width()*zoom - 2;
								 var height = selectedElement.height()*zoom - 2;
				         $(".dom-highlight").attr("style","display: none;");
								 $(".focus-rect").attr("style","left: "+left+"px; top: "+top+"px; width: "+width+"px; height: "+height+"px; display: block;");
								 $(".move-handle").attr("style","display: block;");
                 //$(this).attr("contenteditable","true");
                 //selected item
								 var x = 0;
				         $("#jqxtreeUICodePreview").find('li').each(function(i){
				           var item = $('#jqxtreeUICodePreview').jqxTree('getItem', $("#jqxtreeUICodePreview").find('li')[x])

				           if(item.value.get(0)==selectedElement.get(0))
				           {
				              $('#jqxtreeUICodePreview').jqxTree('selectItem', $("#jqxtreeUICodePreview").find('li')[x]);
				              return false;
				           }
				           x++;
				          });
                 editorElements.setValue(selectedElement[0].innerHTML);
				         return false
				       });
							 $("#"+selectorIframe).contents().find("body *").hover(function(e){
				         	currentElement=$(this);

								 var top = currentElement.offset().top*zoom;
				         var left = currentElement.offset().left*zoom;
								 var width = currentElement.width()*zoom ;
								 var height = currentElement.height()*zoom;
				         $(".dom-highlight").attr("style","left: "+left+"px; top: "+top+"px; width: "+width+"px; height: "+height+"px; display: block;");

				         $(".dom-highlight .border").attr("style","width: "+width+"px; height: "+height+"px; top: 0px; left: 0px; border-width: 0px;");
				         $(".dom-highlight .padding").attr("style","width: "+width+"px; height: "+height+"px; top: 0px; left: 0px; border-width: 0px;");
				         $(".dom-highlight .main").attr("style","width: "+width+"px; height: "+height+"px; top: 0px; left: 0px; border-width: 0px;");
				         $(".dom-highlight .margin").attr("style","width: "+width+"px; height: "+height+"px; top: 0px; left: 0px; border-width: 0px;");


								 //line
								 //left
								 		if(isDragging)
										{
										 	 	$(".line").removeClass("left top bottom right");

												el_pos = $(this).offset();
										 		edge = closestEdge(e.pageX - el_pos.left, e.pageY - el_pos.top, $(this).width(), $(this).height());
												 //left
												 if(edge=="left")
												 {
													 //$(".line").attr("style","display: block; width: 1px; height: 195px; top: 37.5px; left: 286.5px;");
													 $(".line").attr("style","display: block; width: 1px; height: "+height+"px; top: "+top+"px; left: "+left+"px;");
													 $(".line").addClass("left");
												 }
												 //bottom
												 else if(edge=="bottom")
												 {
													 //$(".line").attr("style","display: block; width: 195px; height: 1px; top: 243.75px; left: 286.5px;");
													 $(".line").attr("style","display: block; width: "+width+"px; height: 1px; top: "+(top+height)+"px; left: "+left+"px;");
													 $(".line").addClass("top bottom");
												 }
												 //right
												 else if(edge=="right")
												 {
													 //$(".line").attr("style","display: none; width: 1px; height: 195px; top: 37.5px; left: 481.5px;");

													 $(".line").attr("style","display: block; width: 1px; height: "+height+"px; top: "+top+"px; left: "+(left+width)+"px;");
													 $(".line").addClass("right");
												 }
												 //top
												 else if(edge=="top")
												 {
													 $(".line").attr("style","display: block; width: "+width+"px; height: 1px; top: "+top+"px; left: "+left+"px;");
													 $(".line").addClass("top");
												 }
										}


				         return false;
				        });
								//end of onloadiframe
						},
            saveUIDesigner:function(){
              var UIDesignerSource = $("#"+selectorIframe).contents().find("#content")[0].innerHTML;
              $.ajax({
                  async: false,
                  url:"<?=site_url()?>/engine/designer/saveUIDesigner",
                  type:"post",
                  data:{url:$("#frameUIPreview").attr("src"),source:UIDesignerSource}
                }).done(function(result){
                   alert("telah berhasil di simpan");
                   var src = $('#frameUIPreview').attr("src");
                   $('#frameUIPreview').attr("src",src);
                });

            },
            copySelectedElement:function(){
              tempCopySelectedElement = selectedElement.clone();
              console.log(tempCopySelectedElement);
            },
            pasteSelectedElement:function(){
              currentElement.after(tempCopySelectedElement);
            },
            duplicateSelectedElement:function(){
              Designer.copySelectedElement();
              Designer.pasteSelectedElement();
            },
            reload:function(){
              $("#"+selectorIframe).attr("src","<?=site_url()?>/engine/designer/getUIDesigner?slug="+$("#frameUIPreview").attr("src"));
            }
					}

          function getParent(elementFrameUiDesignerAsset,elementFrameUiDesignerActive,x)
          {
            for(var n=1;n<x;n++)
            {
              if(elementFrameUiDesignerActive.get(0).parentElement==elementFrameUiDesigner[n].get(0))
              {
                return n;
              }
            }
            return 0;
          }
          function loadUICodePreview()
          {
            data = [];

            elementFrameUiDesigner = {};
            elementFrameUiDesignerTagName = {};
            var x = 1;
            $("#"+selectorIframe).contents().find("body *").each(function() {
              elementFrameUiDesigner[x] = $(this);
              elementFrameUiDesignerTagName[x] = $(this).prop("tagName");
              x++;
            }).promise().done(function(){
              for(var n=1;n<x;n++)
              {
                var parents = [{ "id": n,
                                  "parentid": (n==1)?0:getParent(elementFrameUiDesigner,elementFrameUiDesigner[n],x),
                                  "text": elementFrameUiDesignerTagName[n]+"#"+elementFrameUiDesigner[n].get(0).id+"."+elementFrameUiDesigner[n].get(0).classList,
                                  "value": elementFrameUiDesigner[n]
                              }];
                data = $.merge(data, parents);
              }

              // prepare the data
              var source =
              {
                  datatype: "json",
                  datafields: [
                      { name: 'id' },
                      { name: 'parentid' },
                      { name: 'text' },
                      { name: 'value' }
                  ],
                  id: 'id',
                  localdata: data
              };

              // create data adapter.
              var dataAdapter = new $.jqx.dataAdapter(source);
              // perform Data Binding.
              dataAdapter.dataBind();
              // get the tree items. The first parameter is the item's id. The second parameter is the parent item's id. The 'items' parameter represents
              // the sub items collection name. Each jqxTree item has a 'label' property, but in the JSON data, we have a 'text' field. The last parameter
              // specifies the mapping between the 'text' and 'label' fields.
              var records = dataAdapter.getRecordsHierarchy('id', 'parentid', 'items', [{ name: 'text', map: 'label'}]);

             // create jqxTree
             $('#jqxtreeUICodePreview').jqxTree({ width: "100%", height: "100%", source: records});
             $('#jqxtreeUICodePreview').jqxTree('expandAll');
             $('#jqxtreeUICodePreview').on('select',function (event)
            {
                var args = event.args;
                var item = $('#jqxtreeUICodePreview').jqxTree('getItem', args.element);
                selectedElement=$("#frameUIDesigner").contents().find(item.value);
                selectedElement

                  editorElements.setValue(selectedElement[0].innerHTML);


                //$("#frameUIDesigner").contents().find(".dh_hover").removeClass("dh_hover");
                //$("#frameUIDesigner").contents().find(item.value).addClass("dh_hover");
                var top = selectedElement.offset().top;
                var left = selectedElement.offset().left;
                $(".dom-highlight").attr("style","display: none;");
                $(".focus-rect").attr("style","left: "+left+"px; top: "+top+"px; width: "+selectedElement.width()+"px; height: "+selectedElement.height()+"px; display: block;");
                $(".move-handle").attr("style","display: block;");
                $("#dragbox").attr("style","display: block; transform: translate3d("+left+"px, "+top+"px, 0px);");

            });

            });


           // focus the jqxTree.

          }

				function closestEdge(x,y,w,h) {
				        var topEdgeDist = distMetric(x,y,w/2,0);
				        var bottomEdgeDist = distMetric(x,y,w/2,h);
				        var leftEdgeDist = distMetric(x,y,0,h/2);
				        var rightEdgeDist = distMetric(x,y,w,h/2);
				        var min = Math.min(topEdgeDist,bottomEdgeDist,leftEdgeDist,rightEdgeDist);
				        switch (min) {
				            case leftEdgeDist:
				                return "left";
				            case rightEdgeDist:
				                return "right";
				            case topEdgeDist:
				                return "top";
				            case bottomEdgeDist:
				                return "bottom";
				        }
				}


				function distMetric(x,y,x2,y2) {
				    var xDiff = x - x2;
				    var yDiff = y - y2;
				    return (xDiff * xDiff) + (yDiff * yDiff);
				}
</script>

 <script type="text/javascript">
 function base_url()
 {
   return "<?=base_url()?>";
 }
 function current_url()
 {
   return "<?=base_url()?>";
 }
 var settingNotification={
   ElementContent:function(){
     return "#notificationContent";
   },
   ElementNotification:function(){
     return "#jqxNotification";
   },
   textSuccessCreate:function(){
     return "Data telah berhasil dimasukan";
   },
   textErrorCreate:function(){
     return "Data gagal dimasukkan";
   },
   textSuccessUpdate:function(){
     return "data telah berhasil diupdate";
   },
   textErrorUpdate:function(){
     return "data gagal diupdate";
   },
   textConfirmationDelete:function(){
     return "Apakah anda yakin akan menghapus data berikut :";
   },
   textSuccessDelete:function(){
     return "Data berhasil dihapus";
   },
   textErrorDelete:function(){
     return "Data gagal dihapus";
   },
   successCreate(){
     var notif = this.textSuccessCreate();
     $(this.ElementContent()).html(notif);
     $(this.ElementNotification()).jqxNotification("open");
   },
   errorCreate(){
     var notif = this.textErrorCreate();
     $(this.ElementContent()).html(notif);
     $(this.ElementNotification()).jqxNotification("open");
   },
   successUpdate(){
     var notif = this.textSuccessUpdate();
     $(this.ElementContent()).html(notif);
     $(this.ElementNotification()).jqxNotification("open");
   },
   errorUpdate(){
     var notif = this.textErrorUpdate();
     $(this.ElementContent()).html(notif);
     $(this.ElementNotification()).jqxNotification("open");
   },
   successDelete(){
     var notif = this.textSuccessDelete();
     $(this.ElementContent()).html(notif);
     $(this.ElementNotification()).jqxNotification("open");
   },
   errorDelete(){
     var notif = this.textErrorDelete();
     $(this.ElementContent()).html(notif);
     $(this.ElementNotification()).jqxNotification("open");
   }
 }
 </script>
</body>
</html>
