<html>
<head>
<meta charset="utf-8">
<title>Buscador de envíos</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
	<div class="container">
	<h3 style="text-align: center; background-color: #CECECE;">Buscar envíos</h3>
		<form class="form-horizontal" role="form" action="" method="post">
			<div class="form-group">
				<label for="destinatario" class="col-sm-2 control-label">Destinatario: </label>
			    <div class="col-sm-4">
			      	<input type="text" class="form-control" name="destinatario"/>
			    </div>
			</div>
			
			<div class="form-group">
				<label for="poblacion" class="col-sm-2 control-label">Poblacion:  </label>
			    <div class="col-sm-4">
			      	<input type="text" class="form-control" name="poblacion"/>
			    </div>
			</div>
			      	
			<div class="form-group">
				<label for="codigo_postal" class="col-sm-2 control-label">Código Postal: </label>
			    <div class="col-sm-4">
			      	<input type="text" class="form-control" name="codigo_postal"/>
			    </div>
			</div>

			<div class="form-group">
				<label for="checkbox" class="col-sm-2 control-label">¿Desea realizar la búsqueda exacta?</label>
				<div class="col-sm-1">
			    	<input type="checkbox" class="form-control" name="buscaigual" value="identico">
			    </div>
			</div>
			
			<div class="form-group">
			    <div class="col-sm-offset-3 col-sm-10">
			      	<button type="submit" class="btn btn-primary" name="buscar">Buscar</button>
			    </div>
		 	</div>
		</form>
	</div>
</body>
</html>