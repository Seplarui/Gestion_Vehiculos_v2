<?php ob_start()?>

<table>
	<tr>
		<th>Marca</th>
		<th>Modelo</th>
		<th>Motor</th>
	</tr>

<?php foreach ($parametros['marcas'] as $marca): ?>
	<tr>
		<td><a href="index.php?ctl=ver&id=<?php echo $marca['id']?>">
		<?php echo $marca['marca']?></a></td>
		<td><?php echo $marca['modelo']?></td>
		<td><?php echo $marca['motor']?></td>
	</tr>
	
	<?php endforeach;?>
</table>

<?php $contenido=ob_get_clean()?>
<?php include 'layout.php'?>