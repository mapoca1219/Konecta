<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "../Providers/base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM productos WHERE id = ?;");
$sentencia->execute([$id]);
$producto = $sentencia->fetch(PDO::FETCH_OBJ);
if($producto === FALSE){
	echo "¡No existe algún producto con ese ID!";
	exit();
}

?>
<?php include_once "../views/encabezado.php" ?>
	<div class="col-xs-12">
		<h1>Editar producto con el ID <?php echo $producto->id; ?></h1>
		<form method="post" action="../Controllers/guardarDatosEditados.php">
			<input type="hidden" name="id" value="<?php echo $producto->id; ?>">
	
			<label for="codigo">Código de Producto:</label>
			<input value="<?php echo $producto->codigo ?>" class="form-control" name="codigo" required type="text" id="codigo" placeholder="Escribe el código">

			<label for="nombrePrducto">Nombre del Producto:</label>
			<input value="<?php echo $producto->nombrePrducto ?>" class="form-control" name="nombrePrducto" required type="text" id="nombrePrducto" placeholder="Nombre del Producto">
			
			<label for="referencia">Referencia:</label>
			<textarea required id="referencia" name="referencia" cols="30" rows="5" class="form-control"><?php echo $producto->referencia ?></textarea>

			<label for="precio">Precio:</label>
			<input value="<?php echo $producto->precio ?>" class="form-control" name="precio" required type="number" id="precio" placeholder="Precio del Producto">

			<label for="peso">Peso del Producto:</label>
			<input value="<?php echo $producto->peso ?>" class="form-control" name="peso" step="any" required type="number" id="peso" placeholder="Peso del Producto">
			
			<label for="categoria">Categoria:</label>
			<textarea required id="categoria" name="categoria" cols="30" rows="5" class="form-control"><?php echo $producto->categoria ?></textarea>

			<label for="stock">Stock:</label>
			<input value="<?php echo $producto->stock ?>" class="form-control" name="stock" required type="number" id="stock" placeholder="Cantidad o existencia">
			
			<label for="fechaCreacion">Fecha de Creacion:</label>
			<input value="<?php echo $producto->fechaCreacion?>" class="form-control" name="fechaCreacion" required type="date" id="fechaCreacion" placeholder="Fecha de Creacion">
			
			<br><br><input class="btn btn-info" type="submit" value="Guardar">
			<a class="btn btn-warning" href="../views/listar.php">Cancelar</a>
		</form>
	</div>
<?php include_once "../views/pie.php" ?>
