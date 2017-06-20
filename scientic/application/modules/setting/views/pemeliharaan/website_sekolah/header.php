<header class="bg-white header header-md navbar navbar-fixed-top-xs box-shadow">
    <div class="navbar-header aside-md dk"> 
		<a href="index.html" class="navbar-brand">
			<img src="<?=assets_url("assets/frontend")?>/images/logo-toga.png">
		</a> 
		<a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user"> <i class="fa fa-info"></i> </a> 
	</div>
    
    
    <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user user">
		<li class="active"> 
			<a class="active" href="<?=site_url()?>">BERANDA</a>
		</li>
		<li> 
			<a href="<?=site_url("pengumuman")?>">Pengumuman</a>
		</li>
		<li class="active"> 
			<a class="active" href="<?=site_url("profil")?>">PROFIL SEKOLAH</a>
		</li>
		<li> 
			<a href="<?=site_url("organisasi_siswa")?>">ORGANISASI SISWA</a>
		</li>
		<li> 
			<a href="<?=site_url("sarana_prasarana")?>">SARANA PRASARANA</a>
		</li>
	</ul>
</header>