<div class="container">
<div class="wrapper"><div class="blog-post">
<?php
	$this->db->where("id_category_news","6");
	$query = $this->db->get("sync_v_news",3,0);
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
</div>&nbsp;</div>
</div>