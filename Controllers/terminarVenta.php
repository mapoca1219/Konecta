<?php
if(!empty($_POST["total"])) header("Location: ../views/vender.php?status=6");


session_start();


$total = $_POST["total"];
include_once "../Providers/base_de_datos.php";
date_default_timezone_set('america/bogota');

$ahora = date("Y-m-d H:i:s");


$sentencia = $base_de_datos->prepare("INSERT INTO ventas(fecha, total) VALUES (?, ?);");
$sentencia->execute([$ahora, $total]);

$sentencia = $base_de_datos->prepare("SELECT id FROM ventas ORDER BY id DESC LIMIT 1;");
$sentencia->execute();
$resultado = $sentencia->fetch(PDO::FETCH_OBJ);

$idVenta = $resultado === false ? 1 : $resultado->id;

$id = !empty($producto->total);


if ($id){

	header("Location: ../views/vender.php?status=6");
	
	} else {

	//Preparamos la orden SQL
	$base_de_datos->beginTransaction();
	$sentencia = $base_de_datos->prepare("INSERT INTO productos_vendidos(id_producto, id_venta, cantidad) VALUES (?, ?, ?);");
	$sentenciaExistencia = $base_de_datos->prepare("UPDATE productos SET stock = stock - ? WHERE id = ?;");
	foreach ($_SESSION["carrito"] as $producto) {
	$total += $producto->total;
	$sentencia->execute([$producto->id, $idVenta, $producto->cantidad]);
	$sentenciaExistencia->execute([$producto->cantidad, $producto->id]);
	}
	$base_de_datos->commit();
	unset($_SESSION["carrito"]);
	$_SESSION["carrito"] = [];
	header("Location: ../views/vender.php?status=1");
	
	//Aqui ejecutaremos esa orden
	
	}
	


?>