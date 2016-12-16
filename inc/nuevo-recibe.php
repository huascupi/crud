<?php
	include('inc/conexion.php');

	$sql="INSERT INTO personas SET "."paterno='{$_POST['txt-paterno']}',"."materno='{$_POST['txt-materno']}',"."nombres='{$_POST['txt-nombres']}'";

	$resultado=$conexion->query($sql);
	if($resultado){
		header("Location:listar.php");
	}else{
		header("Location:nuevo.php");
	}
?>