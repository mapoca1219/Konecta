<?php
#Salir si alguno de los datos no está presente
if(
	!isset($_POST["codigo"]) || 
	!isset($_POST["nombrePrducto"]) || 
	!isset($_POST["referencia"]) || 
	!isset($_POST["precio"]) || 
	!isset($_POST["peso"]) || 
	!isset($_POST["categoria"]) || 
	!isset($_POST["stock"]) ||
	!isset($_POST["fechaCreacion"])
	) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "../Providers/base_de_datos.php";
$codigo = $_POST["codigo"];
$nombrePrducto = $_POST["nombrePrducto"];
$referencia = $_POST["referencia"];
$precio = $_POST["precio"];
$peso = $_POST["peso"];
$categoria = $_POST["categoria"];
$stock = $_POST["stock"];
$fechaCreacion = $_POST["fechaCreacion"];

$sentencia = $base_de_datos->prepare("INSERT INTO productos(codigo, nombrePrducto, referencia, precio, peso, categoria, stock, fechaCreacion) VALUES (?, ?, ?, ?, ?, ?, ?, ?);");
$resultado = $sentencia->execute([$codigo, $nombrePrducto, $referencia, $precio, $peso, $categoria, $stock, $fechaCreacion]);

if($resultado === TRUE){
	header("Location: ../views/listar.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista";


?>
<?php include_once "../views/pie.php" ?>