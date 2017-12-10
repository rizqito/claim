<?php
if (isset($_GET['page'])) {
	if ($_GET['page']=='petugas') {
		?>
			<div class="bg-white">
				<div class="container">
					<div class="menu-bar header-sm-height" data-pages-init='horizontal-menu' data-hide-extra-li="4">
						<a href="#" class="btn-link toggle-sidebar hidden-lg-up pg pg-close" data-toggle="horizontal-menu"></a>
						<ul>
							<li><a href="index.php">Dashboard</a></li>
							<li><a href="index.php?page=barang_masuk"><span class="title">Barang Masuk</span></a></li>
							<li><a href="index.php?page=claim"><span class="title">Claim Barang</span></a></li>
							<li><a href="javascript:;"><span class="title">Data</span><span class=" arrow"></span></a>
								<ul class="">
							 		<li class=""><a href="index.php?page=container">Container</a></li>
									<li class=""><a href="index.php?page=barang">Barang</a></li>
									<li class=""><a href="index.php?page=barang_rusak">Barang Rusak</a></li>
									<li class="active"><a href="index.php?page=petugas">Petugas</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="bg-white">
				<div class="container">
					<ol class="breadcrumb breadcrumb-alt">
						<li class="breadcrumb-item"><a href="index.php">Home</a></li>
						<li class="breadcrumb-item active">Data</li>
						<li class="breadcrumb-item active">Petugas</li>
					</ol>
				</div>
			</div>
		<?php
	}
	if ($_GET['page']=='container') {
		?>
			<div class="bg-white">
				<div class="container">
					<div class="menu-bar header-sm-height" data-pages-init='horizontal-menu' data-hide-extra-li="4">
						<a href="#" class="btn-link toggle-sidebar hidden-lg-up pg pg-close" data-toggle="horizontal-menu"></a>
						<ul>
							<li><a href="index.php">Dashboard</a></li>
							<li><a href="index.php?page=barang_masuk"><span class="title">Barang Masuk</span></a></li>
							<li><a href="index.php?page=claim"><span class="title">Claim Barang</span></a></li>
							<li><a href="javascript:;"><span class="title">Data</span><span class=" arrow"></span></a>
								<ul class="">
							 		<li class="active"><a href="index.php?page=container">Container</a></li>
									<li class=""><a href="index.php?page=barang">Barang</a></li>
									<li class=""><a href="index.php?page=barang_rusak">Barang Rusak</a></li>
									<li class=""><a href="index.php?page=petugas">Petugas</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="bg-white">
				<div class="container">
					<ol class="breadcrumb breadcrumb-alt">
						<li class="breadcrumb-item"><a href="index.php">Home</a></li>
						<li class="breadcrumb-item active">Data</li>
						<li class="breadcrumb-item active">Container</li>
					</ol>
				</div>
			</div>
		<?php
	}
}else{
	?>
		<div class="bg-white">
			<div class="container">
				<div class="menu-bar header-sm-height" data-pages-init='horizontal-menu' data-hide-extra-li="4">
					<a href="#" class="btn-link toggle-sidebar hidden-lg-up pg pg-close" data-toggle="horizontal-menu"></a>
					<ul>
						<li class=" active"><a href="index.php">Dashboard</a></li>
						<li><a href="index.php?page=barang_masuk"><span class="title">Barang Masuk</span></a></li>
						<li><a href="index.php?page=claim"><span class="title">Claim Barang</span></a></li>
						<li><a href="javascript:;"><span class="title">Data</span><span class=" arrow"></span></a>
							<ul class="">
						 		<li class=""><a href="index.php?page=container">Container</a></li>
								<li class=""><a href="index.php?page=barang">Barang</a></li>
								<li class=""><a href="index.php?page=barang_rusak">Barang Rusak</a></li>
								<li class=""><a href="index.php?page=petugas">Petugas</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="bg-white">
			<div class="container">
				<ol class="breadcrumb breadcrumb-alt">
					<li class="breadcrumb-item"><a href="index.php">Home</a></li>
					<li class="breadcrumb-item active">Dashboard</li>
				</ol>
			</div>
		</div>
	<?php
}
?>