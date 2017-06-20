<div class="bg-primary dk intro">
<div class="row"><center><button class="btn btn-rounded bg-white"><img src="../../../../../assets/frontend/images/logo-toga.png" width="165px" /></button></center>
<div class="col-md-6 col-md-offset-3 text-center">
<div class="m-t-xl m-b-xl padder">
<div class="h1 text-white font-thin l-h-2x">Selamat datang di situs Resmi SMKN 11&nbsp;Bandung</div>
</div>
<p class="text-center m-b-xl"><a class="btn btn-lg btn-white b-2x b-white btn-rounded bg-empty m-sm" href="http://scientic.smkn11bdg.sakolah.com">E-Learning</a> <a class="btn btn-lg btn-white b-2x b-white btn-rounded bg-empty m-sm" href="http://idisi.smkn11bdg.sakolah.com">SCIENTIC</a></p>
</div>
</div>
</div>
<div id="produk" class="">
<div class="wrapper">
<div class="row m-t-xl m-b-xl">
<div class="col-md-6"><section class="panel panel-default">
	<header class="panel-heading bg-light">
	<ul class="nav nav-tabs">
		<li class="active"><a href="#tabpengumuman" data-toggle="tab">Pengumuman</a></li>
		<li><a href="#tabmading" data-toggle="tab"> MADING</a></li>
		<li><a href="#tabagenda" data-toggle="tab"> Agenda</a></li>
	</ul>
</header>
<div class="panel-body scrollable" style="max-height: 500px;">
<div class="tab-content">
<div id="tabpengumuman" class="tab-pane active">
	<?php
	$this->db->where("id_category_news","1");
	$query = $this->db->get("sync_v_news",3,0);
	if($query->num_rows()>=1)
	{
		foreach($query->result() as $row)
		{
			?>
			<article class="media">
				<div class="pull-left">
					<span class="fa-stack fa-lg"> <i class="fa fa-circle fa-stack-2x text-danger"></i> <i class="<?=$row->icon?> fa-stack-1x text-white"></i> </span>
				</div>
				<div class="media-body">
					<a class="h4" href="#"><?=$row->title?></a>
					<p>
						<?=str_replace('<?=scientic_url()?>',scientic_url(),$row->content)?>
					</p>
					<br/>
					<em class="text-xs">dipublikasikan pada <span class="text-danger"><?=$row->created?></span></em>
				</div>
			</article>
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
<div id="tabmading" class="tab-pane">
	<?php
	$this->db->where("id_category_news","2");
	$query = $this->db->get("sync_v_news",3,0);
	if($query->num_rows()>=1)
	{
		foreach($query->result() as $row)
		{
			?>
			<article class="media">
				<div class="pull-left">
					<span class="fa-stack fa-lg"> <i class="fa fa-circle fa-stack-2x text-info"></i> <i class="<?=$row->icon?> fa-stack-1x text-white"></i> </span>
				</div>
				<div class="media-body">
					<a class="h4" href="#"><?=$row->title?></a>
					<?=str_replace('<?=scientic_url()?>',scientic_url(),$row->content)?>
					<a class="text-danger" href="#">[ Baca Selengkapnya ]</a><br /> 
					<em class="text-xs">dipublikasikan pada <span class="text-danger"><?=$row->created?></span></em>
				</div>
			</article>
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
<div id="tabagenda" class="tab-pane">
	<?php
	$this->db->where("id_category_news","3");
	$query = $this->db->get("sync_v_news",3,0);
	if($query->num_rows()>=1)
	{
		foreach($query->result() as $row)
		{
				?>
				<article class="media">
					<div class="pull-left">
						<span class="fa-stack fa-lg"> <i class="fa fa-circle fa-stack-2x text-danger"></i> <i class="<?=$row->icon?> fa-stack-1x text-white"></i> </span>
					</div>
					<div class="media-body">
						<a class="h4" href="#"><?=$row->title?></a>
						<p>
							<?=str_replace('<?=scientic_url()?>',scientic_url(),$row->content)?>
						</p>
						<br/>
						<em class="text-xs">dipublikasikan pada <span class="text-danger"><?=$row->created?></span></em>
					</div>
				</article>
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
</section></div>
<div class="col-md-6"><section class="panel panel-default scrollable" style="max-height: 500px;"><header class="panel-heading"><a class="btn btn-sm btn-info" href="#"> Twitter</a> Hubungi Kami di Twitter</header>
<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 230px;">
<section class="panel-body slim-scroll" style="overflow: hidden; width: auto; height: 230px;" data-height="230px" data-size="10px">

</section>
<div class="slimScrollBar" style="width: 10px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 174.587px; background: #000000;">&nbsp;</div>
<div class="slimScrollRail" style="width: 10px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: #333333;">&nbsp;</div>
</div>
</section></div>
</div>
</div>
</div>
<!-- content !-->
<div id="features" class="bg-white">
<div class="container">
<div class="row m-t-xl m-b-xl">
<div id="team" class="col-md-4">
<section class="panel no-border bg-light lt bg-primary">
<div class="panel-body">
<div class="row m-t-xl">
<div class="col-xs-3 text-right padder-v">&nbsp;</div>
<div class="col-xs-6 text-center">
<div class="inline"><center>
<div style="width: 140px; height: 140px; line-height: 140px;">
<div class="thumb-lg"><img class="img-circle" src="../../../../../assets/frontend/images/kepalasekolah.jpg" /></div>
<canvas width="140" height="140"></canvas></div>
</center>
<div class="h4 m-t m-b-xs font-bold text-lt">Kepala Sekolah</div>
<small class="m-b text-white">Dr. Anne Sukmawati KD, M.Mpd</small> <br /> <small class="m-b text-white">NIP.19621105 198603 2 008</small></div>
</div>
<div class="col-xs-3 padder-v">&nbsp;</div>
</div>
</div>
<footer class="panel-footer dk text-center no-border">
<div class="row pull-out">
<div class="col-xs-4">
<div class="padder-v"><a class="btn btn-rounded btn-sm btn-info" href="#"> Twitter</a></div>
</div>
<div class="col-xs-4 dker">
<div class="padder-v"><a class="btn btn-rounded btn-sm btn-primary" href="#"> Linkedin</a></div>
</div>
<div class="col-xs-4">
<div class="padder-v"><a class="btn btn-rounded btn-sm btn-danger" href="#"> Google+</a></div>
</div>
</div>
</footer></section>
</div>
<div class="col-sm-8 wrapper-xl">
<h3 class="text-dark text-u-c">Sambutan Kepala Sekolah</h3>
<p style="text-align: justify;">Puji syukur kami panjatkan ke hadirat Tuhan Yang Maha Esa atas karunia dan hidayah-Nya, sehingga kita semua dapat membaktikan segala hal yang kita miliki untuk kemajuan dunia pendidikan. Apapun bentuk dan sumbangsih yang kita berikan, jika dilandasi niat yang tulus tanpa memandang imbalan apapun akan menghasilkan mahakarya yang agung untuk bekal kita dan generasi setelah kita.<br />Pendidikan adalah harga mati untuk menjadi pondasi bangsa dan negara dalam menghadapi perkembangan zaman. Hal ini seiring dengan penguasaan teknologi untuk dimanfaatkan sebaik mungkin, sehingga menciptakan iklim kondusif dalam ranah keilmuan. Dengan konsep yang kontekstual dan efektif, kami mengejewantahkan nilai-nilai pendidikan yang tertuang dalam visi misi SMK Negeri 11 Bandung, sebagai panduan hukum dalam menjabarkan tujuan hakiki pendidikan.<br /><br /> Dalam sebuah sistem ketata kelolaan Sekolah Berbasis Manajemen, kami berusaha terus meningkatkan kinerja dan profesionalisme demi terwujudnya pelayanan prima dalam cakupan Lembaga Pendidikan terutama di SMK Negeri 11 Bandung ini. Kami sudah mulai menerapkan sistem Teknologi Komputerisasi agar transparansi pengelolaan pendidikan terjaga optimalisasinya.<br />Sebuah sistem akan bermanfaat dan berdaya guna tinggi jika didukung dan direalisasikan oleh semua komponen yang berkompeten di SMK Negeri 11 Bandung baik sistem manajerial, akademik, pelayanan publik, prestasi,moralitas dan semua hal yang berinteraksi di dalamnya. Alhamdulilah peningkatan tersebut dapat dilihat dari data-data kepegawaian dan karya-karya nyata yang telah dihasilkan walaupun masih ada kelemahan yang terus kami treatment dengan menyeimbangkan hasil kinerja dan prize yang diberikan. Mudah-mudahan semua yang kita berikan untuk kemajuan dan keajegan nilai-nilai pendidikan dapat terus meningkat.<br /><br /> Secara pribadi saya mohon maaf, jika pemenuhan tuntutan dan kinerja yang saya lakukan masih ada kelemahan. Oleh karena itu, bantuan dan kerjasama dari berbagai pihak untuk optimalisasi mutu dan kualitas pendidikan sangat saya harapkan. Mudah-mudahan dalam tiap langkah dan nafas kita menciptakan nilai jual yang tinggi bagi keilmuan dan nilai hakiki di hadapan Tuhan Yang Maha Esa. <br />Demikian sambutan ini saya sampaikan, ditutup dengan pesan moral dan keilmuan bagi kita semua.</p>
</div>
</div>
</div>
</div>
<div id="tentang" class="bg-white dker clearfix">
<div class="container m-t-xl m-b-xl">
<div class="m-t-xl m-b text-center">
<h3 class="font-thin text-dark text-u-c m-b-xl">VISI DAN MISI Sekolah</h3>
</div>
<div id="b-slide" class="" data-interval="6000">
<div class="text-center m-t-xl m-b-xl">
<div class="item">
<div class="row">
<div class="col-sm-12 m-b-xl">
<h4 class="font-thin l-h-2x m-b-lg"><em> " Menjadi SMK mandiri yang berbudaya lingkungan dengan berbasis ICT " </em></h4>
<div class="text-left font-thin font-bold">MISI Sekolah :</div>
<ol class="text-left">
<li><strong>Siap</strong> memberikan layanan pendidikan yang berkualitas tinggi dan menciptakan lingkungan yang sehat dan baik</li>
<li><strong>Me</strong><strong>ningkatkan</strong>&nbsp;proses pembelajaran bagi peserta didik dengan memberi keteladanan, memotivasi, mengilhami, memberdayakan, dan membudayakan</li>
<li><strong>Komitmen</strong> tinggi dan kreatif menghasilkan&nbsp; tamatan yang cerdas, mandiri&nbsp; dan kompetitif sesuai kebutuhan masyarakat lokal dan global</li>
</ol>
</div>
</div>
</div>
</div>
</div>
</div>
</div>