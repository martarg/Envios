<html>
<head>
<meta charset="utf-8">
<title>Vista envíos</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
	<div class="container">
	<h3 style="text-align: center; background-color: #CECECE;">Resultados de la búsqueda</h3>
		<table class="table">
		<tr>
				<th>#</th>
				<th>Destinatario</th>
				<th>Teléfono</th>
				<th>Dirección</th>
				<th>Población</th>
				<th>Código Postal</th>
				<th>Provincia</th>
				<th>Correo electrónico</th>
				<th>Estado</th>
				<th>Fecha creación</th>
				<th>Fecha entrega</th>
				<th>Observaciones</th>
			</tr>
		<tr>
				<?php
				foreach ( $resultado as $reg ) {
				?>
				<tr>
					<td><?php echo $reg['id']?></td>
					<td><?php echo $reg['destinatario']?></td>
					<td><?php echo $reg['telefono']?></td>
					<td><?php echo $reg['direccion']?></td>
					<td><?php echo $reg['poblacion']?></td>
					<td><?php echo $reg['codigo_postal']?></td>
					<td><?php echo $reg['provincia']?></td>
					<td><?php echo $reg['email']?></td>
					<td><?php echo $reg['estado']?></td>
					<td><?php echo $reg['fecha_creacion']?></td>
					<td><?php echo $reg['fecha_entrega']?></td>
					<td><?php echo $reg['observaciones']?></td>
					
					<td><a class="btn btn-default" href="cntr_modificar.php?id=<?=$reg['id']?>" style="background-color: #8FDCBB">
						<span class="fa fa-pencil-square-o"></span>
					</a>
				<td><a class="btn btn-default" href="cntr_eliminar.php?id=<?=$reg['id']?>" style="background-color: #F79999">
						<span class="fa fa-trash"></span>
					</a>
				<td><a class="btn btn-default" href="cntr_recepcion.php?id=<?=$reg['id']?>" >
						<span class="fa fa-check"></span>
					</a>
				</tr>
				<?php 
				}
				?>
		</table>
	</div>
</body>
</html>