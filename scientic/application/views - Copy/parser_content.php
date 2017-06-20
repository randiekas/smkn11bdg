<!DOCTYPE html>
<html lang="en" class="app">
<head>
<meta charset="utf-8" />
<title>ISSAC Engine | Web Application</title>
<meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<link rel="stylesheet" href="<?=cdn_url("scientic/backend")?>/css/app.v1.3.css" type="text/css" />
<link rel="stylesheet" href="<?=cdn_url("scientic/backend")?>/js/calendar/bootstrap_calendar.css" type="text/css" />
<!--[if lt IE 9]> <script src="<?=cdn_url("scientic/backend")?>/js/ie/html5shiv.js"></script> <script src="<?=cdn_url("scientic/backend")?>/js/ie/respond.min.js"></script> <script src="<?=cdn_url("scientic/backend")?>/js/ie/excanvas.js"></script> <![endif]-->
<link rel="stylesheet" href="<?=cdn_url("jqwidgets")?>/jqwidgets/styles/jqx.base.css" type="text/css" />
<link rel="stylesheet" href="<?=cdn_url("jqwidgets")?>/jqwidgets/styles/jqx.arctic.css" type="text/css" />
<script type="text/javascript">
themeWidget = "arctic";
</script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/scripts/jquery-1.11.1.min.js"></script>

<link rel="stylesheet" type="text/css" href="<?=cdn_url("craftpip")?>/css/jquery-confirm.css" />
<style type="text/css">
        .big-image
        {
            float: left;
            margin-right: 15px;
            margin-bottom: 15px;
            border: 1px solid #999;
            background: #fff;
            padding: 3px;
        }
        .small-image
        {
            border: 1px solid #ccc;
            background: #fff;
            padding: 3px;
        }

        .important-text
        {
            font-size: 13px;
            color: #000;
        }
        .more-text
        {
            color: #444;
            font-size: 11px;
            font-style: italic;
        }
    </style>
<style>
.dh_hover {
  opacity: 0.8;
  border: 1px solid #0990C5;
  position: relative;
  top: -2px;
  left: -2px;
}
</style>
</head>
<body class="">
<section class="vbox">
  <section>
    <section class="hbox stretch">
        <section id="content"><?php $this->load->view((isset($content))?$content:"content") ?></section>
    </section>
  </section>
</section>
<div id="messageNotification" style="z-index:9999999999">
    <div class="messageNotification">

    </div>
</div>
<!-- Bootstrap -->
<!-- App -->
<script src="<?=cdn_url("scientic/backend")?>/js/app.v1.js"></script>
<script type="text/javascript" src="<?=cdn_url("craftpip")?>/js/jquery-confirm.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxcore.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/globalization/globalize.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxdata.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxbuttons.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxscrollbar.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxmenu.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxdatatable.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxgrid.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxtreegrid.js"></script>
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
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxmaskedinput.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxcalendar.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxvalidator.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxchart.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxgrid.aggregates.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxeditor.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxsplitter.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxdragdrop.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxwindow.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/jqwidgets/jqxnavigationbar.js"></script>
<script type="text/javascript" src="<?=cdn_url("jqwidgets")?>/scripts/demos.js"></script>

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
var alert = {
	alert:function(title,content,confirm){
		$.alert({
			title: title,
			content: content,
			confirm: confirm
		});
	},
	titleDelete:function(){
		return "Hapus";
	},
	contentDelete:function(){
		return "Apakah anda yakin menghapus data ini ?";
	},
	confirm:function(title,content,confirm,cancel){
		$.confirm({
			title: title,
			content: content,
			confirm:confirm,
			cancel: cancel
		});
	}
}
Notification.initial();
function toRp(angka){
    var rev     = parseInt(angka, 10).toString().split('').reverse().join('');
    var rev2    = '';
    for(var i = 0; i < rev.length; i++){
        rev2  += rev[i];
        if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
            rev2 += '.';
        }
    }
    return 'Rp. ' + rev2.split('').reverse().join('') + ',00';
}
function setInputDate()
{
  var formatString ="";
  $(".inputDate").each(function(){
	  if($(this).attr("formatString"))
	  {
		  formatString = $(this).attr("formatString");
	  }
	  else{
		  formatString = "yyyy-MM-dd";
	  }
    $(this).jqxDateTimeInput({formatString: formatString});
  });
}
</script>
</body>
</html>
