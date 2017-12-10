<?php	
	$id_petugas = $_GET['id'];
	$petugas->delete($id_petugas);
?>
	<script type="text/javascript">
		alert("Data berhasil terhapus");
	</script>		
	<meta http-equiv="refresh" content="0;URL=index.php?page=petugas">