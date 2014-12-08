<html>
<head>
<meta charset="utf-8">
<title>Vista envíos</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
	
	<div class="container" align="center">
		<h3>¿Está seguro que desea eliminar el envío?</h3>
	
		<strong>Código: #<?php echo $_GET['id']?>
		<br>Destinatario: <?php echo $_POST['destinatario']?></strong><br><br>
				
		<a class="btn btn-success" href="cntr_eliminar.php?id=<?=$codigo?>&confirmado=1">Aceptar</a>
		<a class="btn btn-warning" href="../index.php">Cancelar</a>
	</div>
	
</body>
</html>