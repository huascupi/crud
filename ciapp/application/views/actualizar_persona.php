<?php
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
			<div class="col-md-6">
				<form id="frm-nuevo" name="frm-nuevo" class="form-horizontal" method="post" action="<?php echo base_url('personas/guardar_cambios')?>">
					<div class="form-group">
					<h3>ACTUALIZACIÓN DE LOS DATOS DE UNA PERSONA</h3>
						<label for="dni" class="col-sm-4 control-label">CÓDIGO (DNI)</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="dni" placeholder="Ingrese el código (dni)" name="dni" value="<?php echo $dni; ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="nombres" class="col-sm-4 control-label">NOMBRES</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="nombres" placeholder="Ingrese el/los nombres" name="nombres" value="<?php echo $nombres; ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="paterno" class="col-sm-4 control-label">APELLIDO PATERNO</label>
						<div class="col-sm-8"><input type="text" class="form-control" id="paterno" placeholder="Ingrese el apellido paterno" name="paterno" value="<?php echo $paterno; ?>">
						</div>
					</div>
					<div class="form-group">
					<label for="materno" class="col-sm-4 control-label">APELLIDO MATERNO</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="materno" placeholder="Ingrese el apellido materno" name="materno" value="<?php echo $materno; ?>">
						</div>
					</div>
					<div class="form-group">
					<label for="f_nac" class="col-sm-4 control-label">FECHA DE NACIMIENTO</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="f_nac" placeholder="Ingrese la fecha de nacimiento" name="f_nac" value="<?php echo $f_nac; ?>">
						</div>
					</div>
					<div class="form-group">
					<label for="l_nac" class="col-sm-4 control-label">LUGAR DE NACIMIENTO</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="l_nac" placeholder="Ingrese el lugar de nacimiento" name="l_nac" value="<?php echo $l_nac; ?>">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-8">
							<button class="btn btn-primary" id="btnGuardar" name="btnGuardar">Guardar</button>
						</div>
					</div>
					<input type="hidden" name="Id" value="<?php echo $id; ?>"></input>
				</form>
			</div>
			<div class="col-md-6" id="div-contenido2">		
			</div>
		</div>
	</div>	
	<script src="<?php echo base_url('assets/js/jquery-1.12.4.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>	
</body>
</html>