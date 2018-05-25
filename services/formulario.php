<!DOCTYPE html>
<meta charset="UTF=8">

<?php
$con = mysqli_connect("localhost","root","","producto") or die ("error");
?>
<html>
 <head>
	<title>control</title>
	<meta charset="UTF=8">
 </head>
 <body>
	<form method="POST" action="formulario.php">
		<label>Nombre: </Label>
		<input type="text" name="nombre" placeholder="escriba su nombre"><br />
		<label>Codigo: </Label>
		<input type="text" name="codigo" placeholder="ingrese codigo"><br />
		<label>Valor: </Label>
		<input type="text" name="valor" placeholder="ingrese valor"><br />
		<input type="submit" name="insert" value="Insertar datos">
	</form>
<br />
<br />
<br />
	<?php
		if(isset($_POST['insert'])){
			$nom = $_POST['nombre'];
			$cod = $_POST['codigo'];
			$valo = $_POST['valor'];
			$insert = "INSERT INTO productos (nombre, codigo, valor) VALUES('$nom','$cod','$valo')";
			$ejecutar = mysqli_query($con, $insert);
			if($ejecutar){
				echo "<h2>Datos insertados</h2>";
			}
		}
	?>
	<table width="500" border="2" style="bacgraund-color:#F7FE2E;">
		<tr>
			<th>Id</th>
			<th>nombre</th>
			<th>codigo</th>
			<th>valor</th>
			<th>Editar</th>
			<th>Borrar</th>
		</tr>
		<?php
			$consulta = "SELECT * FROM productos";
			$ejecutar = mysqli_query($con, $consulta);
			$i=0;
			while($fila = mysqli_fetch_array($ejecutar)){
				$id = $fila['id'];
				$nombre = $fila['nombre'];
				$codigo = $fila['codigo'];
				$valor = $fila['valor'];
			$i++;
			?>
			<tr align="center">
			<th><?php echo $id; ?></th>
			<th><?php echo $nombre; ?></th>
			<th><?php echo $codigo; ?></th>
			<th><?php echo $valor; ?></th>
			<th><a href="formulario.php?editar=<?php echo $id; ?>">editar</a></th>
			<th><a href="formulario.php?borrar=<?php echo $id; ?>">borrar</a></th>
		</tr>
		<?php }	?>
	</table>
	
	<?php
		if(isset($_GET['editar'])){
			include("editar.php");
		}
	?>
	
	<?php
		if(isset($_GET['borrar'])){
			$borrar_id = $_GET['borrar'];
			
			$borrar = "DELETE FROM productos WHERE id='$borrar_id'";
			$ejecutar = mysqli_query($con, $borrar);
			
			if ($ejecutar){
				echo "<script>alert('El producto a sido eliminado')</script>";
				echo "<script>window.open('formulario.php','_self')</script>";
			}
		}
	?>











</body>
</html>