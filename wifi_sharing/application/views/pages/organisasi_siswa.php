<div class="wrapper">
<div class="row">
<div class="col-md-8"><section class="panel panel-default">
<header class="panel-heading bg-light">
<ul class="nav nav-tabs">
	<?php
	$x=1;
	$organizations = $this->db->get("sync_website_organizations")->result();
	foreach($organizations as $row)
	{
	?>
		<li class="<?=($x++==1)?"active":""?>"><a href="#tab<?=$row->id?>" data-toggle="tab"><?=$row->name?></a></li>
	<?php
	}
	?>
	
</ul>
</header>
<div class="panel-body bg-light">
<div class="tab-content">
<?php
	$news = $this->db->get("sync_website_organization_news")->result_array();
	foreach($organizations as $row)
	{
	?>
		<div id="tab<?=$row->id?>" class="tab-pane active">
				<div class="blog-post">
					<?php
						foreach($news as $r)
						{
							if($r['id_organization']==$row->id)
							{
							?>
							<div class="post-item">
								<div class="caption wrapper-lg">
									<h2 class="post-title"><a href="#"><?=$r['title']?></a></h2>
									<div class="post-sum">
										<?=$r['content']?>
									</div>
									<div class="line line-lg">&nbsp;</div>
									<div class="text-muted">Oleh <a class="m-r-sm" href="#"><?=$r['author']?></a> <?=$r['created']?></div>
								</div>
							</div>
					<?php
							}
						}
					?>
				 </div>
		</div>
<?php
	}
	?>
</div>
</div>
</section>&nbsp;</div>
<div class="col-md-4 hidden-xs"><section class="panel panel-default scrollable" style="max-height: 500px;"><header class="panel-heading"><a class="btn btn-sm btn-info" href="#"> Twitter</a> Hubungi Kami di Twitter</header>
<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 230px;">
<section class="panel-body slim-scroll" style="overflow: hidden; width: auto; height: 230px;" data-height="230px" data-size="10px">

</section>
<div class="slimScrollBar" style="width: 10px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 174.587px; background: #000000;">&nbsp;</div>
<div class="slimScrollRail" style="width: 10px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: #333333;">&nbsp;</div>
</div>
</section></div>
</div>
</div>