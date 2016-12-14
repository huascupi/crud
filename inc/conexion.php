<html>
	<head>
	</head>
	<body>
		<?
			$conexion = new mysqli("u2226","root","root",'programacionweb');
			if($conexion->conect_errno){
				echo "Error al connectar a la BBDD".
					$conexion->connect_errno.",".
					$conexion->connect_error;
				exit();
			}else{
				$conexion->set_charset("utf8");
			}
		?>
	</body>
</html>