<!DOCTYPE html>

<html>

<head>
<title>Gestión de Vehículos</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css"
	href="<?php echo 'css/'.Config::$css?>" />
</head>

<body>

	<div id="cabecera">

		<h1>Gestión de Vehículos</h1>
	</div>

	<div id="menu">

		<hr>

		<a href="index.php?ctl=inicio">Inicio</a> <a
			href="index.php?ctl=listar">Listar Vehículos</a> <a
			href="index.php?ctl=insertar">Insertar Vehículos</a> <a
			href="index.php?ctl=buscar">Buscar por Marca</a> <a
			href="index.php?ctl=buscarPorId">Buscar por "Id"</a>

		<hr>
	</div>

	<div id="contenido">
	
	<?php echo $contenido?>
	
	
	</div>

	<div id="pie">

		<hr>
		<div align="center">Pie de Página</div>

	</div>


</body>

</html>