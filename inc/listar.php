<?php
	include('inc/cabecera.php');
	include('inc/menu.php');
	include('inc/conexion.php');


?>

<div class="container">

	<div class="row">
		<div class="col-md-8">

			<h1>Listado de Personas</h1>
			<table class="table">
					
				<tr>
					<th>id</th>
					<th>Apellidos y Nombres</th>
					<th>Fecha Creacion</th>
					<th>Modificar</th>
					<th>Eliminar</th>
				<tr>
				<?php 
					$consulta=$conexion->query('SELECT p.* FROM personas p');
					while ($fila=$consulta->fetch_assoc()){
					?>
						<tr>
							<td><?php echo $fila['persona_id'];?></td>
							<td><?php echo $fila['paterno'].' '.
								$fila['materno'].' '.$fila['nombres'];?></td>
							<td><?php echo $fila['fecha_registro'];?></td>
							<td>
								<a href="modificar.php? id=<?php echo $fila['persona_id'];?>">
									<span class="glyphicon glyphicon-edit"></span>
								</a>
							</td>
							<td>
								<a href="eliminar.php? id=<?php echo $fila['persona_id'];?>">
									<span class="glyphicon glyphicon-trash"></span>
								</a>
							</td>
					<?php
						}
					?>
			</table>
		</div>
		<div class="col-md-4">
			<div class="alert alert-success">
				<strong>Bienvenidos</strong> al CRUD Personas.
			</div>
		</div>
	</div>

</div>

<?php
	include('inc/scripts.php');
	include('inc/pie.php');
?>