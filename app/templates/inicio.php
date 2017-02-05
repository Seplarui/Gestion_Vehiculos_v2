<?php ob_start()?>
<head>
<meta charset="utf8"/>
</head>
<h1>Inicio</h1>
<h3>Fecha:<?php echo $parametros['fecha']?></h3>
<?php echo $parametros['mensaje']?>
<?php $contenido=ob_get_clean()?>
<?php include 'layout.php'?>
