<?php 
    if(!isset($_GET['codigo'])){
        header('Location: index.php?mensaje=eliminado');
        exit();
    }

    include 'model/conexion.php';
    $codigo = $_GET['codigo'];

    $sentencia = $bd->prepare("DELETE FROM promociones where id = ?;");
    $resultado = $sentencia->execute([$codigo]);

    if ($resultado === TRUE){
        header('Location: index.php?mensaje=eliminado');
    } else {
        header('Location: index.php?mensaje=eliminado');
    }
?>