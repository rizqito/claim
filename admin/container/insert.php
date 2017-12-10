<?php
	if (isset($_POST['simpan'])) {
		$no_container=$_POST['no_container'];
		$nama_container=$_POST['nama_container'];
		$asal_container=$_POST['asal_container'];
		$tujuan_container=$_POST['tujuan_container'];		
	    if($container->create($no_container,$nama_container,$asal_container,$tujuan_container)){	        	
		?>
			<script type="text/javascript">
				alert("Data berhasil tersimpan !");
			</script>
			<meta http-equiv="refresh" content="0;URL=index.php?page=container">
		<?php
		}else{
		?>
				<script type="text/javascript">
					alert("Gagal");
				</script>
		<?php
		}		
	}
?>
<div class="content sm-gutter">
	<div class="container container-fixed-lg p-t-20">
		<div class="row">
			<div class="col-lg-12">
				<div class="card card-default">
					<div class="card-header ">
						<div class="padding-10">
							<div class="pull-left">
								<h2 class="text-primary no-margin">Tambah Container</h2>
								<!-- <p class="no-margin">Today's sales</p> -->
							</div>
								<form method="post" action="index.php?page=container">
									<div class="pull-right"><button type="submit" class="btn btn-primary btn-cons">Kembali</button></div>
								</form>
							<div class="clearfix"></div>
						</div>
					</div>
					<div class="card-block">
						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-6">
								<form role="form" method="post">									
									<div class="form-group">
										<label>No Container</label>										
										<input type="text" class="form-control" required name="no_container">
									</div>
									<div class="form-group">
										<label>Nama Container</label>
										<input type="text" class="form-control" required name="nama_container">
									</div>
									<div class="form-group">
										<label>Asal Container</label>
										<input type="text" class="form-control" required name="asal_container">
									</div>
									<div class="form-group">
										<label>Tujuan Container</label>
										<input type="text" class="form-control" required name="tujuan_container">
									</div>									
									<div class="form-group">
										<button type="submit" name="simpan" class="btn btn-primary btn-cons">Simpan</button>
									</div>
								</form>
							</div>
							<div class="col-md-3"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>