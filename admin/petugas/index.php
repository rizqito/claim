<?php
	@$aksi=$_GET['aksi'];
	if (isset($aksi)) {
		if($aksi=='tambah')
			include("insert.php");
		if($aksi=='edit')
			include("update.php");
		if($aksi=='hapus')
			include("delete.php");
	}else{
		include("view.php");
	}
?>