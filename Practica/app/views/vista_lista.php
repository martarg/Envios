<html>
<head>
<meta charset="utf-8">
<title>Vista envíos</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
	<div class="container">
		<table class="table table-striped" style="text-align:center">
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
				<th></th>
				<th></th>
				<th></th>
			</tr>

			<tr>
			<?php
			foreach ( $envios as $fila ) {
			?>
				<td><?php echo $fila['id']?></td>
				<td><?php echo $fila['destinatario']?></td>
				<td><?php echo $fila['telefono']?></td>
				<td><?php echo $fila['direccion']?></td>
				<td><?php echo $fila['poblacion']?></td>
				<td><?php echo $fila['codigo_postal']?></td>
				<td><?php echo $fila['provincia']?></td>
				<td><?php echo $fila['email']?></td>
				<td><?php echo $fila['estado']?></td>
				<td><?php echo $fila['fecha_creacion']?></td>
				<td><?php echo $fila['fecha_entrega']?></td>
				<td><?php echo $fila['observaciones']?></td>
				<td><a class="btn btn-default" href="cntr_modificar.php?id=<?=$fila['id']?>" style="background-color: #8FDCBB">
						<span class="fa fa-pencil-square-o"></span>
					</a>
				<td><a class="btn btn-default" href="cntr_eliminar.php?id=<?=$fila['id']?>" style="background-color: #F79999">
						<span class="fa fa-trash"></span>
					</a>
				<td><a class="btn btn-default" href="cntr_recepcion.php?id=<?=$fila['id']?>" >
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