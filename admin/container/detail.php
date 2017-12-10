<?php
	$id_container = $_GET['id'];	
	$q = $Connection->prepare("SELECT * FROM container WHERE NO_CONTAINER='$id_container'");
	$q->execute(array(':no_container'=>$id_container));
	$r = $q->fetch(PDO::FETCH_ASSOC);

	if (isset($_POST['simpan'])) {
		$id_petugas=$_POST['id_petugas'];
		$nama=$_POST['nama'];
		$no_hp=$_POST['no_hp'];
		$username=$_POST['username'];		
		$password=$_POST['password'];
		$k_password=$_POST['k_password'];
		if ($username!="" && $password!="" && $k_password!="") {
			if ($password==$k_password) {
			$md5=md5($password);
	        if($petugas->update_petugas($id_petugas,$nama,$no_hp)){
	        	$petugas->update_user($id_petugas,$username,$md5);
				?>
				<script type="text/javascript">
					alert("Data berhasil terubah !");
				</script>
				<meta http-equiv="refresh" content="0;URL=index.php?page=petugas">
				<?php
			}else{
				?>
					<script type="text/javascript">
						alert("Gagal");
					</script>
				<?php
			}
			}else{
				?>
					<script type="text/javascript">
						alert("Password & Konfirmasi Password Tidak Sama");
					</script>
				<?php
			}	
		}else{						
		    if($petugas->update_petugas($id_petugas,$nama,$no_hp)){		        
				?>
				<script type="text/javascript">
					alert("Data berhasil terubah !");
				</script>
				<meta http-equiv="refresh" content="0;URL=index.php?page=petugas">
				<?php
			}else{
				?>
					<script type="text/javascript">
						alert("Gagal");
					</script>
				<?php
			}			
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
								<h2 class="text-primary no-margin">Detail Container</h2>
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
										<input type="text" class="form-control" required name="nama_container" value="<?php echo $r['NAMA_CONTAINER'];?>" readonly>
									</div>
									<div class="form-group">
										<label>Asal Container</label>
										<input type="text" class="form-control" required name="asal_container" value="<?php echo $r['ASAL_CONTAINER'];?>" readonly>
									</div>
									<div class="form-group">
										<label>Tujuan Container</label>
										<input type="text" class="form-control" required name="tujuan_container" value="<?php echo $r['TUJUAN_CONTAINER'];?>" readonly>
									</div>									
										<?php
										if ($r['STATUS']=='OTW') {
											?>
												<div class="form-group">
												<label>Status</label>
												<input type="text" class="form-control" required name="tujuan_container" value="Dalam Perjalanan" readonly>	
												</div>											
											<?php
										}else{
											?>
												<div class="form-group">
													<label>Status</label>	
													<input type="text" class="form-control" required name="tujuan_container" value="Masuk" readonly>													
												</div>
												<div class="form-group">
													<label>Foto Tampak Luar</label>	
													<input type="text" class="form-control" required name="tujuan_container" value="Masuk" readonly>													
												</div>
												<div class="form-group">
													<label>Foto Tampak Dalam</label>	
													<input type="text" class="form-control" required name="tujuan_container" value="Masuk" readonly>													
												</div>
												<div class="form-group">
													<label>Waktu Masuk</label>	
													<input type="text" class="form-control" required name="tujuan_container" value="Masuk" readonly>													
												</div>												
											<?php
										}
										?>									
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