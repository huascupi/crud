<html>
	<head>
	</head>
	<body>
		<?
			$conexion = new mysqli("mysql.hostinger.es","u788422067_leo","leo2016",'u788422067_leo');
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