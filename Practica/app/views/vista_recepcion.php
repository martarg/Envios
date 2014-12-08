<html>
<head>
<meta charset="utf-8">
<title>Anotar recepción</title>
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
<link
	href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css"
	rel="stylesheet">
</head>
<body>

	<div class="container">
		<h3 style="text-align: center; background-color: #CECECE;">Anotar recepción <small>Envío #<?php echo $_GET['id']?></small></h3>
		<br>
		
		<form class="form-horizontal" method="post" action="">
		<div class="form-group">
		    <label for="observaciones" class="col-sm-2 control-label">Observaciones</label>
		    <div class="col-sm-4">
		      <textarea class="form-control" rows="3" name="observaciones"><?= isset($_POST['observaciones']) ? $_POST['observaciones'] : ''?></textarea>
		    </div>
		 </div>
		 
		 <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <input type="submit" class="btn btn-default" style="background-color: #CECECE" value="Aceptar">
		    </div>
		 </div>
		 </form>
	</div>
</body>
</html>