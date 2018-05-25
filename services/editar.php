<?php
	if(isset($_GET['editar'])){
		$editar_id = $_GET['editar'];
		
		$consulta = "SELECT * FROM productos WHERE id='$editar_id'";
		$ejecutar = mysqli_query($con, $consulta);
		
		$fila=mysqli_fetch_array($ejecutar);
		
		$nomb = $fila['nombre'];
		$codi = $fila['codigo'];
		$valo = $fila['valor'];
	}
?>

<br />
<br />
<form method="POST" action="">
	<input type="text" name="nombre" value="<?php echo $nomb; ?>"/><br />
	<input type="text" name="codigo" value="<?php echo $codi; ?>"/><br />
	<input type="text" name="valor" value="<?php echo $valo; ?>"/><br />
	<input type="submit" name="actualizar" value="ACTUALIZAR DATOS"/>
</form>

<?php
	if(isset($_POST['actualizar'])){
		
		$actualizar_nombre = $_POST['nombre'];
		$actualizar_codigo = $_POST['codigo'];
		$actualizar_valor = $_POST['valor'];
		
		$actualizar = "UPDATE productos SET nombre='$actualizar_nombre', codigo='$actualizar_codigo', valor='$actualizar_valor' WHERE id='$editar_id'";
		
		$ejecutar = mysqli_query($con, $actualizar);
		
		if($ejecutar){
			echo "<script>alert('Datos actualizados!')</script>";
			echo "<script>window.open('formulario.php','_self')</script>";
			
		}
	}
?>