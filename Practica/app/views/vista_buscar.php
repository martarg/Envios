<html>
<head>
<meta charset="utf-8">
<title>Vista envíos</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
	<table class="table">
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
			</tr>
			<?php 
			}
			?>
	</table>

</body>
</html>