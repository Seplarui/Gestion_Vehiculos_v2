<?php ob_start() ?>
<head>
<meta charset="utf8"/>
</head>
<form name="formBusqueda" action="index.php?ctl=buscar" method="POST">


<table>

<tr>
<td>Marca</td>
<td><input type="text" name="marca" value="<?php echo $parametros['marca']?>">Puedes utilizar '%' como comodín</td>
<td><input type="submit" value="buscar"></td>
</tr>
</table>

</form>

<?php if (count($parametros['resultado'])>0):?>
<table>

<tr>
<th>Marca</th>
<th>Modelo</th>
<th>Motor</th>
</tr>

<?php foreach ($parametros['resultado'] as $marca):?>
<tr>
<td><a href="index.php?ctl=ver&id=<?php echo $marca->getId();?>">
<?php echo $marca->getMarca();?></a></td>
<td><?php echo $marca->getModelo(); ?></td>
<td><?php echo $marca->getMotor(); ?></td>
</tr>

<?php endforeach;?>

</table>
<?php endif;?>
<?php $contenido=ob_get_clean()?>
<?php include 'layout.php'?>
