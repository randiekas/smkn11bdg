<section class="hbox stretch">
  <section>
    <section class="vbox">
      <section class="scrollable padder">
        <section class="row m-b-md">
          <div class="col-sm-6">
            <h3 class="m-b-xs text-black">Dashboard</h3>
            <small>Welcome back, John Smith, <i class="fa fa-map-marker fa-lg text-primary"></i> New York City</small>
          </div>
          <div class="col-sm-6 text-right text-left-xs m-t-md">
            <div class="btn-group"> <a class="btn btn-rounded btn-default b-2x dropdown-toggle" data-toggle="dropdown">Widgets <span class="caret"></span></a>
              <ul class="dropdown-menu text-left pull-right">
                <li><a href="#">Notification</a></li>
                <li><a href="#">Messages</a></li>
                <li><a href="#">Analysis</a></li>
                <li class="divider"></li>
                <li><a href="#">More settings</a></li>
              </ul>
            </div>
            <a href="#" class="btn btn-icon b-2x btn-default btn-rounded hover"><i class="i i-bars3 hover-rotate"></i></a> <a href="#nav, #sidebar" class="btn btn-icon b-2x btn-info btn-rounded" data-toggle="class:nav-xs, show"><i class="fa fa-bars"></i></a> </div>
        </section>
        <div class="row">
          <?php
          if(isset($_SESSION["level_id"]))
          {
          foreach(getGroupModulAll($_SESSION["level_id"]) as $row)
          {
          ?>
          <div class="col-md-3 col-sm-6">
            <div class="panel b-a">
              <div class="panel-heading no-border bg-info lter text-center">
                <a href="<?=site_url($row["slug"])?>"> <i class="fa fa-twitter fa fa-3x m-t m-b text-white"></i> </a>
              </div>
              <div class="padder-v text-center clearfix">
                <div class="col-xs-12 b-r">
                  <div class="h3 font-bold"><?=$row["name"]?></div>
                  <small class="text-muted"><?=$row["slug"]?></small>
                </div>
              </div>
            </div>
          </div>
          <?php
          }
          }
          ?>
        </div>


      </section>
    </section>
  </section>
  <!-- side content -->
  <!-- / side content -->
</section>
