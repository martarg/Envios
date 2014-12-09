<html>
<head>
	<title>Añadir nuevo envío</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<h3 style="text-align: center; background-color: #CECECE;">Añadir nuevo envío</h3>
	<form class="form-horizontal" role="form" action="" method="post">
		<div class="form-group">
		    <label for="destinatario" class="col-sm-2 control-label">Destinatario</label>
		    <div class="col-sm-4">
		      <input type="text" class="form-control" name="destinatario" placeholder="Nombre" value="<?= isset($_POST['destinatario']) ? $_POST['destinatario'] : ''?>"/>
		    </div>
		 </div>
		 
		 <div class="form-group">
		    <label for="telefono" class="col-sm-2 control-label">Teléfono</label>
		    <div class="col-sm-4">
		      <input type="text" class="form-control" name="telefono" placeholder="Teléfono" value="<?= isset($_POST['telefono']) ? $_POST['telefono'] : ''?>"/>
		    </div>
		 </div>
	
		<div class="form-group">
		    <label for="direccion" class="col-sm-2 control-label">Dirección</label>
		    <div class="col-sm-4">
		      <input type="text" class="form-control" name="direccion" placeholder="Dirección" value="<?= isset($_POST['direccion']) ? $_POST['direccion'] : ''?>"/>
		    </div>
		</div>
		
		<div class="form-group">
		    <label for="poblacion" class="col-sm-2 control-label">Población</label>
		    <div class="col-sm-4">
		      <input type="text" class="form-control" name="poblacion" placeholder="Población" value="<?= isset($_POST['poblacion']) ? $_POST['poblacion'] : ''?>"/>
		    </div>
		</div>
		
		<div class="form-group">
		    <label for="codigo_postal" class="col-sm-2 control-label">Código Postal</label>
		    <div class="col-sm-4">
		      <input type="text" class="form-control" name="codigo_postal" placeholder="Código Postal" value="<?= isset($_POST['codigo_postal']) ? $_POST['codigo_postal'] : ''?>"/>
		    </div>
		</div>
		
		<div class="form-group">
		    <label for="provincia" class="col-sm-2 control-label">Provincia</label>
		    <div class="col-sm-4">
		    	<?=CreaSelect('provincia', $provincias, (isset($_POST['provincia']) ? $_POST['provincia'] : ''), 'class="form-control"');?>
		    </div>
		</div>
		
		<div class="form-group">
		    <label for="email" class="col-sm-2 control-label">Email</label>
		    <div class="col-sm-4">
		      <input type="email" class="form-control" name="email" placeholder="Email" value="<?= isset($_POST['email']) ? $_POST['email'] : ''?>">
		    </div>
		 </div>
		 
		 <div class="form-group">
		    <label for="observaciones" class="col-sm-2 control-label">Observaciones</label>
		    <div class="col-sm-4">
		      <textarea class="form-control" rows="3" name="observaciones"><?= isset($_POST['observaciones']) ? $_POST['observaciones'] : ''?></textarea>
		    </div>
		 </div>
		 
		 
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-default">Guardar</button>
		    </div>
		 </div>
	</form>
</div>	
</body>
</html>
