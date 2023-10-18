<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $codigo = $_POST['codigo'];
    $producto = $_POST["txtProducto"];
    $precio = $_POST["txtPrecio"];
    $stock = $_POST["txtStock"];
    $proveedor = $_POST["txtProveedor"];
    $fecha_ingreso = $_POST["txtFechaIngreso"];

    $sentencia = $bd->prepare("UPDATE productos SET nombre = ?, precio = ?, stock = ?,proveedor = ?,fecha_ingreso = ? where id = ?;");
    $resultado = $sentencia->execute([$producto, $precio, $stock, $proveedor, $fecha_ingreso,$codigo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }