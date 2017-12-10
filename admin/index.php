<?php
include("../config/config.php");
include("header.php");
if (isset($_GET['page'])) {
	if ($_GET['page']=='petugas')	
		include("petugas/index.php");		
	if ($_GET['page']=='container')	
		include("container/index.php");		
	if ($_GET['page']=='barang')	
		include("barang/index.php");		
}else{
	include("home.php");
}
include("footer.php");
?>