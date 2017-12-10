<?php
	$no_container = $_GET['id'];	
	$q = $Connection->prepare("SELECT * FROM container WHERE NO_CONTAINER=:no_container");
	$q->execute(array(':no_container'=>$no_container));
	$r = $q->fetch(PDO::FETCH_ASSOC);

	if (isset($_POST['simpan'])) {
		$no_container=$_POST['no_container'];
		$nama_container=$_POST['nama_container'];
		$asal_container=$_POST['asal_container'];
		$tujuan_container=$_POST['tujuan_container'];
		@$foto_tampak_luar=$_FILES['foto_tampak_luar']['name'];
		@$tmp_foto_tampak_luar=$_FILES['foto_tampak_luar']['tmp_name'];
			move_uploaded_file($tmp_foto_tampak_luar, '../images/'.$foto_tampak_luar);
		@$foto_tampak_dalam=$_FILES['foto_tampak_dalam']['name'];
		@$tmp_foto_tampak_dalam=$_FILES['foto_tampak_dalam']['tmp_name'];
			move_uploaded_file($tmp_foto_tampak_dalam, '../images/'.$foto_tampak_dalam);			
		$status=$r['STATUS'];
		if ($status='OTW') {
			$waktu_masuk="";	
		}else{
			$waktu_masuk=date("Y-m-d H:i:s");
		}
	    if($container->update($no_container,$nama_container,$asal_container,$tujuan_container,$foto_tampak_luar,$foto_tampak_dalam,$waktu_masuk,$status)){
		?>
			<script type="text/javascript">
				alert("Data berhasil terubah !");
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
								<h2 class="text-primary no-margin">Edit Container</h2>
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
										<input type="text" class="form-control" required name="no_container" value="<?php echo $r['NO_CONTAINER'];?>" readonly>
									</div>
									<div class="form-group">
										<label>Nama Container</label>
										<input type="text" class="form-control" required name="nama_container" value="<?php echo $r['NAMA_CONTAINER'];?>">
									</div>
									<div class="form-group">
										<label>Asal Container</label>
										<input type="text" class="form-control" required name="asal_container" value="<?php echo $r['ASAL_CONTAINER'];?>">
									</div>
									<div class="form-group">
										<label>Tujuan Container</label>
										<input type="text" class="form-control" required name="tujuan_container" value="<?php echo $r['TUJUAN_CONTAINER'];?>">
									</div>
									<?php
									if ($r['STATUS']=='OTW') {
										?>
											<div class="form-group">
												<label>Foto Tampak Luar</label>
												<input type="text" class="form-control" required name="foto_tampak_luar" value="Dalam Perjalanan" readonly>
											</div>
											<div class="form-group">
												<label>Foto Tampak Dalam</label>
												<input type="text" class="form-control" required name="foto_tampak_dalam" value="Dalam Perjalanan" readonly>
											</div>
										<?php
									}else{
										?>
											<div class="form-group">
												<label>Foto Tampak Luar</label>
												<input type="file" class="form-control" required name="foto_tampak_luar" value="Dalam Perjalanan" readonly>
											</div>
											<div class="form-group">
												<label>Foto Tampak Dalam</label>
												<input type="file" class="form-control" required name="foto_tampak_dalam" value="Dalam Perjalanan" readonly>
											</div>
										<?php	
									}
									?>
									<div class="form-group">
										<button type="submit" name="simpan" class="btn btn-primary btn-cons">Update</button>
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