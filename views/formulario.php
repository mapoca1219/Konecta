<?php include_once "encabezado.php" ?>

<div class="col-xs-12">
	<h1>Nuevo producto</h1>
	<form method="post" action="../Controllers/nuevo.php">
		<label for="codigo">Código de Producto:</label>
		<input class="form-control" name="codigo" required type="text" id="codigo" placeholder="Escribe el código">

		<label for="nombrePrducto">Nombre del Producto:</label>
		<input class="form-control" name="nombrePrducto" required type="text" id="nombrePrducto" placeholder="Nombre del Producto">
			
		<label for="referencia">Referencia:</label>
		<textarea required id="referencia" name="referencia" cols="30" rows="5" class="form-control"></textarea>

		<label for="precio">Precio:</label>
		<input class="form-control" name="precio" required type="number" id="precio" placeholder="Precio del Producto">

		<label for="peso">Peso del Producto:</label>
		<input class="form-control" name="peso" step="any" required type="number" id="peso" placeholder="Peso del Producto">
			
		<label for="categoria">Categoria:</label>
		<textarea required id="categoria" name="categoria" cols="30" rows="5" class="form-control"></textarea>

		<label for="stock">Stock:</label>
		<input class="form-control" name="stock" required type="number" id="stock" placeholder="Cantidad o existencia">
			
		
		<label for="fechaCreacion">Fecha de Creacion:</label>
		<input class="form-control" name="fechaCreacion" required type="date" id="fechaCreacion" placeholder="Fecha de Creacion">
			
		<br><br><input class="btn btn-info" type="submit" value="Guardar">
	</form>
</div>
<?php include_once "pie.php" ?>