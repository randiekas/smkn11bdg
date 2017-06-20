<section class="hbox stretch">
  <section>
    <section class="vbox">
		
      <section class="scrollable padder">
		<section class="row m-b-md">
                  <div class="col-sm-6">
                    <h3 class="m-b-xs text-black">SCIENTIC</h3>
                    <small>A KEY for an Efficient Academic</small> </div>
                  
                </section>
					<div class="row">
					
							
								<?php
								$ModuleGroup = getGroupModulAll($this->session->userdata("level_id"));
								for($x=0;$x<count($ModuleGroup);$x++)
								{
									
								?>
								<div class="col-md-2 col-sm-2">
									<div class="panel b-a">
										<div class="panel-heading no-border bg-default lt text-center card"> 
											<a href="#"><img src="<?=base_url("assets/jqwidgets/".$ModuleGroup[$x]["icon"])?>" style="width:100%"></a> 
										</div>
									  <div class="padder-v clearfix">
										<div class="col-xs-12">
											<div class="btn-group dropup">
												<button class="btn btn-default btn-xs"><?=$ModuleGroup[$x]["name"]?> </button>
												<button class="btn btn-default dropdown-toggle btn-xs btntoggle" data-toggle="dropdown"><span class="caret"></span></button>
												 
												
												<ul class="dropdown-menu">
												  <?php
													$subModule = get_menu($this->session->userdata("level_id"),$ModuleGroup[$x]["id"]);
													for($y=0;$y<count($subModule);$y++)
													{
														
												  ?>
												  <li class="submenu"><a href="#"><?=$subModule[$y]["name"]?></a></li>
												  <?php
													}
												  ?>
												</ul>
											  </div>
										  
										 </div>
									  </div>
									</div>
							  </div>
							  <?php
							  }
							  ?>
					</div>
        
      </section>
    </section>
  </section>
</section>