<!DOCTYPE html>

<html>

<head>
<title>Gesti�n de Veh�culos</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css"
	href="<?php echo 'css/'.Config::$css?>" />
</head>

<body>

	<div id="cabecera">

		<h1>Gesti�n de Veh�culos</h1>
	</div>

	<div id="menu">

		<hr>

		<a href="index.php?ctl=inicio">Inicio</a> <a
			href="index.php?ctl=listar">Listar Veh�culos</a> <a
			href="index.php?ctl=insertar">Insertar Veh�culos</a> <a
			href="index.php?ctl=buscar">Buscar por Marca</a> <a
			href="index.php?ctl=buscarPorId">Buscar por "Id"</a>

		<hr>
	</div>

	<div id="contenido">
	
	<?php echo $contenido?>
	
	
	</div>

	<div id="pie">

		<hr>
		<div align="center">Pie de P�gina</div>

	</div>


</body>

</html>