<?php
//print_r($_POST);
if (empty($_POST["oculto"]) || empty($_POST["txtProducto"]) || empty($_POST["txtPrecio"]) || empty($_POST["txtStock"]) || empty($_POST["txtProveedor"]) || empty($_POST["txtFechaIngreso"])) {
    header('Location: index.php?mensaje=falta');
    exit();
}

include_once 'model/conexion.php';
$producto = $_POST["txtProducto"];
$precio = $_POST["txtPrecio"];
$stock = $_POST["txtStock"];
$proveedor = $_POST["txtProveedor"];
$fecha_ingreso = $_POST["txtFechaIngreso"];

$sentencia = $bd->prepare("INSERT INTO productos(nombre,precio,stock,proveedor,fecha_ingreso) VALUES (?,?,?,?,?);");
$resultado = $sentencia->execute([$producto, $precio, $stock, $proveedor, $fecha_ingreso]);

if ($resultado === TRUE) {
    header('Location: index.php?mensaje=registrado');
} else {
    header('Location: index.php?mensaje=error');
    exit();
}
