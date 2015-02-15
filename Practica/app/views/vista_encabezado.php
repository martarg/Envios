<html>
<head>
<meta charset="utf-8">
<title>Página principal</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
	
	<div class="container">
		<div style="margin-top: 7%; float: right; text-align: right;">
        	Iniciado a las <?php echo $_SESSION['tiempo'];?>
			<br><a href="<?php echo webroot;?>index.php?action=cerrar" >Cerrar sesión</a>
		</div>
		<div class="page-header" style="background-color: #D0F5A9">
		  	<h1 style="padding-top: 20px; margin-left: 30px;">KeNoLLega S.L.</h1>
		</div>
		
		<ul class="nav nav-tabs">
		  <li role="presentation"><a href="<?php echo webroot;?>">Inicio</a></li>
		  <li role="presentation"><a href="<?php echo webroot;?>controllers/cntr_insertar.php">Añadir envío</a></li>
		  <li role="presentation"><a href="<?php echo webroot;?>controllers/cntr_buscar.php">Buscar</a></li>
		</ul>
		<br>
</div>
</body>
</html>
