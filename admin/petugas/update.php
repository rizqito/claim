<?php
	$id_petugas = $_GET['id'];	
	$q = $Connection->prepare("SELECT * FROM petugas WHERE ID_PETUGAS=:id_petugas");
	$q->execute(array(':id_petugas'=>$id_petugas));
	$r = $q->fetch(PDO::FETCH_ASSOC);

	$q1 = $Connection->prepare("SELECT * FROM user WHERE ID_PETUGAS=:id_petugas");
	$q1->execute(array(':id_petugas'=>$id_petugas));
	$r1 = $q1->fetch(PDO::FETCH_ASSOC);

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
								<h2 class="text-primary no-margin">Edit Petugas</h2>
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
										<label>ID</label>
										<!-- <span class="help">e.g. "Mona Lisa Portrait"</span> -->
										<input type="text" class="form-control" required readonly name="id_petugas" value="<?php echo $r['ID_PETUGAS'];?>">
									</div>
									<div class="form-group">
										<label>Nama</label>										
										<input type="text" class="form-control" required name="nama" value="<?php echo $r['NAMA'];?>">
									</div>
									<div class="form-group">
										<label>No Hp</label>
										<input type="text" class="form-control" required name="no_hp" value="<?php echo $r['NO_HP'];?>">
									</div>
									<br>
									<h5>Tidak perlu diisi (jika tidak ada perubahan)</h5>
									<div class="form-group">
										<label>Username</label>
										<input type="text" class="form-control" name="username">
									</div>
									<div class="form-group">
										<label>Password</label>
										<input type="password" class="form-control" name="password">
									</div>
									<div class="form-group">
										<label>Konfirmasi Password</label>
										<input type="password" class="form-control" name="k_password">
									</div>
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