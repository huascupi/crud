<?php
	include('inc/cabecera.php');
	include('inc/menu.php');
	include('inc/conexion.php');


?>

<div class="container">

	<div class="row">
		<div class="col-md-8">

			<h1>Gestion de Personas</h1>

		</div>
		<div class="col-md-4">
			<div class="alert alert-success">
				<strong>Bienvenidos</strong> al CRUD Personas.
			</div>
		</div>
	</div>
	<?php var_dump($conexion);?>
	<?php 
		echo'<pre>';print_r($conexion);echo'</pre>';
	?>
	<?php 
		$consulta=$conexion->query('SELECT p.* FROM personas p');
		$fila=$consulta->fetch_assoc();

			echo '<pre>';print_r($fila);echo '</pre>';
	?>
</div>

<?php
	include('inc/scripts.php');
	include('inc/pie.php');
?>