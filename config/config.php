<?php
	@session_start();
	$host = "localhost";
	$user = "root";
	$pass = "";
	$dbname = "claim_barang";

	try{
		$Connection = new PDO("mysql:host={$host};dbname={$dbname}",$user,$pass);
		$Connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	catch(PDOException $e){
		echo $e->getMessage();
	}
	
	include "../admin/controller/petugasController.php";
	$petugas = new PETUGAS($Connection);

	include "../admin/controller/containerController.php";
	$container = new CONTAINER($Connection);

	include "../admin/controller/barangController.php";
	$barang = new BARANG($Connection);	

	// include "barang/controller.php";
	// $barang = new BARANG($Connection);
?>