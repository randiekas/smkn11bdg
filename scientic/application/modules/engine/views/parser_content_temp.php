<!DOCTYPE html>
<html lang="en" class="app">
<head>
<meta charset="utf-8" />
<title>ISSAC Engine | Web Application</title>
<meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<link rel="stylesheet" href="<?=base_url("assets/backend")?>/css/app.v1.css" type="text/css" />
<link rel="stylesheet" href="<?=base_url("assets/backend")?>/js/calendar/bootstrap_calendar.css" type="text/css" />
<!--[if lt IE 9]> <script src="<?=base_url("assets/backend")?>/js/ie/html5shiv.js"></script> <script src="<?=base_url("assets/backend")?>/js/ie/respond.min.js"></script> <script src="<?=base_url("assets/backend")?>/js/ie/excanvas.js"></script> <![endif]-->
<link rel="stylesheet" href="<?=base_url("assets/jqwidgets")?>/jqwidgets/styles/jqx.base.css" type="text/css" />
<script type="text/javascript" src="<?=base_url("assets/jqwidgets")?>/scripts/jquery-1.11.1.min.js"></script>

<link rel="stylesheet" type="text/css" href="<?=base_url("assets/craftpip")?>/css/jquery-confirm.css" />
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
        <section id="content"><?= $content ?></section>
    </section>
  </section>
</section>
<!-- Bootstrap -->
<!-- App -->
<script src="<?=base_url("assets/backend")?>/js/app.v1.js"></script>
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
<script type="text/javascript" src="<?=base_url("assets/jqwidgets")?>/jqwidgets/jqxDateTimeInput.js"></script>
<script type="text/javascript" src="<?=base_url("assets/jqwidgets")?>/scripts/demos.js"></script>

<script type="text/javascript">
function base_url()
{
  return "<?=base_url()?>";
}
function current_url()
{
  return "<?=current_url()?>";
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


</script>
</body>
</html>
