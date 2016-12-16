<?php
	include('inc/conexion.php');

	$sql="UPDATE personas SET "."paterno='{$_POST['txt-paterno']}',"."materno='{$_POST['txt-materno']}',"."nombres='{$_POST['txt-nombres']}' "."WHERE persona_id={$_POST['txt-id']}";

	$resultado=$conexion->query($sql);
	if($resultado){
		header("Location:listar.php");
	}else{
		header("Location:nuevo.php");
	}
?>