<?php ob_start()?>
<head>
<meta charset="utf8"/>
</head>
<table>
	<tr>
		<th>Marca</th>
		<th>Modelo</th>
		<th>Motor</th>
	</tr>

<?php foreach ($parametros['marcas'] as $marca): ?>
	<tr>
		<td><a href="index.php?ctl=ver&id=<?php echo $marca->getId();  ?>">
		<?php echo $marca->getMarca();?></a></td>
		<td><?php echo $marca->getModelo()?></td>
		<td><?php echo $marca->getMotor()?></td>
	</tr>
	
	<?php endforeach;?>
</table>

<?php $contenido=ob_get_clean()?>
<?php include 'layout.php'?>