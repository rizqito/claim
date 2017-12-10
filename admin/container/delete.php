<?php	
	$no_container = $_GET['id'];
	$container->delete($no_container);
?>
	<script type="text/javascript">
		alert("Data berhasil terhapus");
	</script>		
	<meta http-equiv="refresh" content="0;URL=index.php?page=container">