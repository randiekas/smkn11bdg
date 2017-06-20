<div class="wrapper">
<div class="row">
<div class="col-md-8"><section class="panel panel-default"><header class="panel-heading bg-light">
<ul class="nav nav-tabs">
<li class="active"><a href="#tabpengumuman" data-toggle="tab">Pengumuman</a></li>
<li><a href="#tabmading" data-toggle="tab">Berita</a></li>
<li><a href="#tabkegiatan" data-toggle="tab">Berita Kegiatan</a></li>
<li><a href="#tabagenda" data-toggle="tab">Agenda</a></li>
</ul>
</header>
<div class="panel-body bg-light">
<div class="tab-content">
<div id="tabpengumuman" class="tab-pane active">
<div class="blog-post">
<?php
	$this->db->where("id_category_news","1");
	$query = $this->db->get("sync_v_news");
	if($query->num_rows()>=1)
	{
		foreach($query->result() as $row)
		{
			?>
			<div class="post-item">
				<div class="caption wrapper-lg">
					<h2 class="post-title"><a href="#"><?=$row->title?></a></h2>
					<div class="post-sum">
						<?=$row->content?>
					</div>
					<div class="line line-lg">&nbsp;</div>
					<div class="text-muted">Oleh <a class="m-r-sm" href="#"><?=$row->author?></a> <?=$row->created?></div>
				</div>
			</div>
<?php
		}
	}
	else{
		?>
		<div class="alert alert-info">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<i class="fa fa-info-sign"></i><strong>Oops !</strong> Sepertinya belum ada postingan di tautan ini. 
		</div>
		<?php
	}
	?>
 
 
</div>
</div>
<div id="tabmading" class="tab-pane">
<div class="blog-post">
<?php
	$this->db->where("id_category_news","2");
	$query = $this->db->get("sync_v_news");
	if($query->num_rows()>=1)
	{
		foreach($query->result() as $row)
		{
			?>
			<div class="post-item">
				<div class="caption wrapper-lg">
					<h2 class="post-title"><a href="#"><?=$row->title?></a></h2>
					<div class="post-sum">
						<?=$row->content?>
					</div>
					<div class="line line-lg">&nbsp;</div>
					<div class="text-muted">Oleh <a class="m-r-sm" href="#"><?=$row->author?></a> <?=$row->created?></div>
				</div>
			</div>
<?php
		}
	}
	else{
		?>
		<div class="alert alert-info">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<i class="fa fa-info-sign"></i><strong>Oops !</strong> Sepertinya belum ada postingan di tautan ini. 
		</div>
		<?php
	}
	?>
 
 
</div>
</div>
<div id="tabkegiatan" class="tab-pane">
	<div class="blog-post">
<?php
	$this->db->where("id_category_news","4");
	$query = $this->db->get("sync_v_news");
	if($query->num_rows()>=1)
	{
		foreach($query->result() as $row)
		{
			?>
			<div class="post-item">
				<div class="caption wrapper-lg">
					<h2 class="post-title"><a href="#"><?=$row->title?></a></h2>
					<div class="post-sum">
						<?=$row->content?>
					</div>
					<div class="line line-lg">&nbsp;</div>
					<div class="text-muted">Oleh <a class="m-r-sm" href="#"><?=$row->author?></a> <?=$row->created?></div>
				</div>
			</div>
<?php
		}
	}
	else{
		?>
		<div class="alert alert-info">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<i class="fa fa-info-sign"></i><strong>Oops !</strong> Sepertinya belum ada postingan di tautan ini. 
		</div>
		<?php
	}
	?>
 
 
</div>
</div>
<div id="tabagenda" class="tab-pane">
<div class="blog-post">
<?php
	$this->db->where("id_category_news","3");
	$query = $this->db->get("sync_v_news");
	if($query->num_rows()>=1)
	{
		foreach($query->result() as $row)
		{
			?>
			<div class="post-item">
				<div class="caption wrapper-lg">
					<h2 class="post-title"><a href="#"><?=$row->title?></a></h2>
					<div class="post-sum">
						<?=$row->content?>
					</div>
					<div class="line line-lg">&nbsp;</div>
					<div class="text-muted">Oleh <a class="m-r-sm" href="#"><?=$row->author?></a> <?=$row->created?></div>
				</div>
			</div>
<?php
		}
	}
	else{
		?>
		<div class="alert alert-info">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<i class="fa fa-info-sign"></i><strong>Oops !</strong> Sepertinya belum ada postingan di tautan ini. 
		</div>
		<?php
	}
	?>
 
 
</div>
</div>
</div>
</div>
</section></div>
<div class="col-md-4 hidden-xs"><section class="panel panel-default scrollable" style="max-height: 500px;"><header class="panel-heading"><a class="btn btn-sm btn-info" href="#"> Twitter</a> Hubungi Kami di Twitter</header>
<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 230px;">
<section class="panel-body slim-scroll" style="overflow: hidden; width: auto; height: 230px;" data-height="230px" data-size="10px">

</section>
<div class="slimScrollBar" style="width: 10px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 174.587px; background: #000000;">&nbsp;</div>
<div class="slimScrollRail" style="width: 10px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: #333333;">&nbsp;</div>
</div>
</section>&nbsp;</div>
</div>
</div>