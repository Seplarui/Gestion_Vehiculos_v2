<?php ob_start()?>

<head>
<meta charset="utf8"/>
</head>

<h1><?php echo $parametros['marca']?></h1>
<table>

	<tr>

		<td>Marca</td>
		<td><?php echo $marca['marca']?></td>

	</tr>
	<tr>
		<td>Modelo</td>
		<td><?php echo $marca['modelo']?></td>

	</tr>
	<tr>

		<td>Motor</td>
		<td><?php echo $marca['motor']?></td>
	</tr>

<?php $contenido=ob_get_clean()?>
<?php include 'layout.php'?>


</table>
