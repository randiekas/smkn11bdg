<!DOCTYPE html>
<html lang="en" class="app">
<head>
<meta charset="utf-8" />
<title>SCOLA - SCIENTIC </title>
<meta name="description" content="ERP SCHOOLS" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<link rel="stylesheet" href="<?=cdn_url("scientic/backend")?>/css/app.v1.3.css" type="text/css" />
<link rel="stylesheet" href="<?=cdn_url("scientic/backend")?>/js/calendar/bootstrap_calendar.css" type="text/css" />
<!--[if lt IE 9]> <script src="<?=cdn_url("scientic/backend")?>/js/ie/html5shiv.js"></script> <script src="<?=cdn_url("scientic/backend")?>/js/ie/respond.min.js"></script> <script src="<?=cdn_url("scientic/backend")?>/js/ie/excanvas.js"></script> <![endif]-->
<link rel="stylesheet" href="<?=cdn_url("jqwidgets")?>/jqwidgets/styles/jqx.base.css" type="text/css" />
<script type="text/javascript">
themeWidget = '';
</script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/scripts/jquery-1.11.1.min.js"></script>
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

  <section class="vbox">
    <header class="bg-primary header header-md navbar navbar-fixed-top-xs box-shadow" style="background:#364268">
      <div class="navbar-header aside-md dk" style="background:#364268"> <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav"> <i class="fa fa-bars"></i> </a> <a href="<?=base_url()?>" class="navbar-brand" style="color:white !important"><img src="<?=cdn_url("images")?>/icon.png" class="m-r-sm">SCIENTIC</a> <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user"> <i class="fa fa-cog"></i> </a> </div>
      <ul class="nav navbar-nav hidden-xs">
        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-th-large"></i> </a>
          <section class="dropdown-menu aside-lg bg-white on animated fadeInLeft">
            <div class="row m-l-none m-r-none m-t m-b text-center">

              <?php
              $this->db->where("parent_id","0");
              $this->db->order_by("sort_number","ASC");
              $module = $this->db->get("module");
              foreach($module->result() as $row)
              {
              ?>
              <div class="col-xs-4">
                <div class="padder-v">
                  <a href="<?=site_url()?>/<?=$row->url?>">
                  <span class="thumb-sm block">
                  <img src="<?=base_url()?>/assets/jqwidgets/<?=$row->icon?>" class="img-circle" style="width:100%">
                  </span>
                  <br>
                  <small class="text-muted"><?=$row->name?></small>
                  </a>
                </div>
              </div>
              <?php
              }
              ?>

            </div>
          </section>
        </li>
      </ul>
      <form class="navbar-form navbar-left input-s-lg m-t m-l-n-xs hidden-xs form_transaction_codes" role="search">
        <div class="form-group">
          <div class="input-group"> <span class="input-group-btn">
            <button type="submit" class="btn btn-sm bg-white b-white btn-icon"><i class="fa fa-search"></i></button>
            </span>
            <input type="text" class="form-control input-sm no-border transaction_codes" placeholder="Transaction Codes">
          </div>
        </div>
      </form>
      <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user user">
        <li class="hidden-xs"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-bell-o"></i> <span class="badge badge-sm up bg-danger count">0</span> </a>
          <section class="dropdown-menu aside-xl animated flipInY">
            <section class="panel bg-white">
              <header class="panel-heading b-light bg-light"> <strong>You have <span class="count">0</span> notifications</strong> </header>
              <div class="list-group list-group-alt">
				<!--
				<a href="#" class="media list-group-item"> <span class="pull-left thumb-sm"> <img src="<?=cdn_url("scientic/backend")?>/images/a0.jpg" alt="John said" class="img-circle"> </span> <span class="media-body block m-b-none"> Use awesome animate.css<br>
                <small class="text-muted">10 minutes ago</small> </span> </a> <a href="#" class="media list-group-item"> <span class="media-body block m-b-none"> 1.0 initial released<br>
                <small class="text-muted">1 hour ago</small> </span> </a>
				!-->
				</div>
              <footer class="panel-footer text-sm"> <a href="#" class="pull-right"><i class="fa fa-cog"></i></a> <a href="#notes" data-toggle="class:show animated fadeInRight">See all the notifications</a> </footer>
            </section>
          </section>
        </li>
        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="thumb-sm avatar pull-left"> <img src="<?=cdn_url("scientic/backend")?>/images/a0.jpg"> </span> <?=$this->session->userdata("username")?> <b class="caret"></b> </a>
          <ul class="dropdown-menu animated fadeInRight">
            <span class="arrow top"></span>
            <li> <a href="#" onclick="openFrame('dashboard/setting/')">Settings</a> </li>
            <li> <a href="#"> <span class="badge bg-danger pull-right">0</span> Notifications </a> </li>
            <li> <a href="docs.html">Help</a> </li>
            <li class="divider"></li>
            <li> <a href="<?=site_url("dashboard/signout")?>">Logout</a> </li>
          </ul>
        </li>
      </ul>
    </header>
    <section>
      <section class="hbox stretch">
        <section id="content"><?php $this->load->view("window"); ?></section>
      </section>
    </section>
  </section>
  <div id="messageNotification">
  </div>
<!-- Bootstrap -->
<!-- App -->
<script src="<?=cdn_url("scientic/backend")?>/js/app.v1.js"></script>
<script type="text/javascript" src="<?=cdn_url("craftpip")?>/js/jquery-confirm.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxcore.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxdata.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxbuttons.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxscrollbar.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxmenu.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxgrid.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxgrid.selection.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxgrid.sort.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxgrid.edit.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxknockout.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxcheckbox.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxgrid.pager.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxdropdownlist.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxlistbox.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxgrid.filter.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxgrid.columnsresize.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxgrid.grouping.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxgrid.export.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxdata.export.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxnotification.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxcombobox.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxnumberinput.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxexpander.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxtree.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxtabs.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxinput.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxdatetimeinput.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxcalendar.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxvalidator.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxchart.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxdatatable.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxribbon.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxlayout.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxdockinglayout.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxwindow.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxdocking.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxdropdownbutton.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxeditor.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxdragdrop.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxnavigationbar.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxtreegrid.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxgrid.aggregates.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxgrid.columnsreorder.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxdatetimeinput.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxsplitter.js"></script>
<script type="text/javascript">
$(".form_transaction_codes").submit(function(){
  $.ajax({
    type:"post",
    url:"<?=site_url()?>/dashboard/openTransaction/",
    data:{transaction_codes:$(".transaction_codes").val()},
    dataType:"json",
    success:function(result){
      if(result)
      {
        window.open("<?=site_url()?>/"+result.slug,'_blank');
      }
    }
  })

  return false;
});
function openFrame(url)
{
	$("#frameUIPreview").attr("src","<?=site_url()?>/"+url);
}
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
</script>
<script type="text/javascript">
function base_url()
{
  return "<?=base_url()?>";
}
function current_url()
{
  return "<?=current_url()?>";
}
function site_url()
{
  return "<?=site_url()?>";
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
<script type="text/javascript">
var Notification = {
  initial:function(){
    $("#messageNotification").jqxNotification({
      width: 350, position: "top-right", opacity: 0.9,
      autoOpen: false, animationOpenDelay: 800, autoClose: true, autoCloseDelay: 3000, template: "info"
    });
  },
  open:function(message,template){
    $(".messageNotification").html(message);
    $("#messageNotification").jqxNotification({template: template});
    $("#messageNotification").jqxNotification("open");

  },
  textSuccessCreate:function(){
    return "Insert Success";
  },
  textFailedCreate:function(){
    return "Create Failed";
  },
  textSuccessUpdate:function(){
    return "Update Success";
  },
  textFailedUpdate:function(){
    return "Update Failed";
  },
  textSuccessDelete:function(){
    return "Delete Success";
  },
  textFailedDelete:function(){
    return "Delete Failed";
  }
}
Notification.initial();
</script>
</body>
</html>
