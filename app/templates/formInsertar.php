<?php ob_start()?>
<?php if(isset($parametros['mensaje'])):?>
<b><span style="color: red;"><?php echo $parametros['mensaje']?></span></b>

<?php endif;?>

<br />

<form name="formInsertar" action="index.php?ctl=insertar" method="POST">

	<table>

		<tr>

			<th>Marca</th>
			<th>Modelo</th>
			<th>Motor</th>
		</tr>

		<tr>
			<td><input type="text" name="marca"
				value="<?php echo $parametros['marca']?>" /></td>
			<td><input type="text" name="modelo"
				value="<?php echo $parametros['modelo']?>" /></td>
			<td><input type="text" name="motor"
				value="<?php echo $parametros['motor']?>" /></td>
	
	</table>

	<input type="submit" value="insertar" name="Insertar" />
</form>

<?php $contenido=ob_get_clean()?>
<?php include 'layout.php'?>