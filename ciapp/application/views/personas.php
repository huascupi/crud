<?php //Etiqueta de inicio de PHP

defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PERSONAS BY MEGUMI</title>
	<link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/app.css'); ?>" rel="stylesheet">
</head>
<body style="padding-top: 60px;">
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="listar">REGISTRO DE PERSONAS</a>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li><a href="<?php echo base_url('varones/listar');?>">VARONES</a></li>
					<li><a href="<?php echo base_url('mujeres/listar');?>">MUJERES</a></li>			
					<li><a target="_blanck" href="<?php echo base_url('personas/imprimir');?>">IMPRIMIR</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>
					PERSONAS
					<a class="btn btn-default" href="<?php echo base_url('personas/nueva_persona');?>" role="button">nueva persona</a>
					<a class="btn btn-default" href="<?php echo base_url('personas/nueva_persona');?>" role="button">buscar persona</a>
				</h1>
				<table class='table table-condensed table-hover table-bordered'>
					<tr>
						<th>CÓDIGO</th>
						<th>NOMBRES</th>
						<th>APELLIDO PATERNO</th>
						<th>APELLIDO MATERNO</th>
						<th>EDAD</th>
						<th>LUGAR DE NACIMIENTO</th>
					</tr>
<?php
						foreach ($resultado["items"] as $key => $row)
						{
?>
							<tr>
								<td><?php echo $row["dni"]; ?></td>
								<td><?php echo $row["nombres"]; ?></td>
								<td><?php echo $row["paterno"]; ?></td>
								<td><?php echo $row["materno"]; ?></td>
								<td><?php echo $row["f_nac"]; ?></td>
								<td><?php echo $row["l_nac"]; ?></td>
								<td>
									<a href="<?php echo base_url('personas/modificar');?>/id/<?php echo $row['id'];?>"><span class="glyphicon glyphicon-pencil"></span></a>
								</td>
								<td>
									<a href="<?php echo base_url('personas/eliminar');?>/id/<?php echo $row['id'];?>"><span class="glyphicon glyphicon-remove"></span></a>
								</td>
								<td>
									<a href="<?php echo base_url('personas/imprimir');?>/id/<?php echo $row['id'];?>"><span class="glyphicon glyphicon-print"></span></a>
								</td>
							</tr>
<?php
						}
?>
				</table>
			</div>
		</div>
	</div>
	<script src="<?php echo base_url('assets/js/jquery-1.12.4.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
</body>
</html>