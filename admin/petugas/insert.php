<?php
	if (isset($_POST['simpan'])) {
		$id_petugas=$_POST['id_petugas'];
		$nama=$_POST['nama'];
		$no_hp=$_POST['no_hp'];
		$username=$_POST['username'];		
		$password=$_POST['password'];
		$k_password=$_POST['k_password'];
		if ($password==$k_password) {
			$md5=md5($password);
	        if($petugas->create_petugas($id_petugas,$nama,$no_hp)){
	        	$petugas->create_user($id_petugas,$username,$md5);
				?>
				<script type="text/javascript">
					alert("Data berhasil tersimpan !");
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
								<h2 class="text-primary no-margin">Tambah Petugas</h2>
								<!-- <p class="no-margin">Today's sales</p> -->
							</div>
								<form method="post" action="index.php?page=petugas">
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
										<?php
										$Nom=$Connection->query("SELECT MAX(ID_PETUGAS) as maxKode FROM petugas");        
							        	$Arr=$Nom->fetch();
							        	$Kode=$Arr['maxKode'];
							        	$noUrut=(int)substr($Kode, 2, 4);
							        	$noUrut++;
							        	$Char = "P";
							        	$newID = $Char . sprintf("%03s", $noUrut);
        								?>
										<label>ID</label>
										<!-- <span class="help">e.g. "Mona Lisa Portrait"</span> -->
										<input type="text" class="form-control" required readonly name="id_petugas" value="<?php echo $newID;?>">
									</div>
									<div class="form-group">
										<label>Nama</label>										
										<input type="text" class="form-control" required name="nama">
									</div>
									<div class="form-group">
										<label>No Hp</label>
										<input type="text" class="form-control" required name="no_hp">
									</div>
									<div class="form-group">
										<label>Username</label>
										<input type="text" class="form-control" required name="username">
									</div>
									<div class="form-group">
										<label>Password</label>
										<input type="password" class="form-control" required name="password">
									</div>
									<div class="form-group">
										<label>Konfirmasi Password</label>
										<input type="password" class="form-control" required name="k_password">
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