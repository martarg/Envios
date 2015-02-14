<html>
<head>
<meta charset="utf-8">
<title>Página principal</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
	
	<div class="container">
		<div style="float: right">
			<?php if (isset($usuario)): ?>
        		<p>Hola, <?=$usuario ?></p>
        	<?php endif; ?>
			
			<a href="index.php?action=cerrar" >Cerrar sesión</a>
		</div>
		<div class="page-header" style="background-color: #D0F5A9">
		  	<h1 style="padding-top: 20px; margin-left: 30px;">KeNoLLega S.L.</h1>
		</div>
		
		<ul class="nav nav-tabs">
		  <li role="presentation"><a href="../index.php">Inicio</a></li>
		  <li role="presentation"><a href="controllers/cntr_insertar.php">Añadir envío</a></li>
		  <li role="presentation"><a href="controllers/cntr_buscar.php">Buscar</a></li>
		  <!-- <li role="presentation"><a href="index.php?action=cerrar">Cerrar sesión</a></li> -->
		</ul>
		<br>
</div>
</body>
</html>
