<?php
//print_r($_POST);
if (empty($_POST["txtPromocion"]) || empty($_POST["txtDuracion"]) || empty($_POST["txtCelular"])) {
    header('Location: index.php');
    exit();
}

include_once 'model/conexion.php';
$promocion = $_POST["txtPromocion"];
$duracion = $_POST["txtDuracion"];
$celular = $_POST["txtCelular"];
$codigo = $_POST["codigo"];


$sentencia = $bd->prepare("INSERT INTO promociones(promocion,duracion,celular,id_productos) VALUES (?,?,?,?);");
$resultado = $sentencia->execute([$promocion,$duracion,$celular, $codigo ]);

if ($resultado === TRUE) {
    header('Location: agregarPromocion.php?codigo='.$codigo);
} 