<?php
if (!isset($_GET['codigo'])) {
    header('Location: index.php?mensaje=error');
    exit();
}

include 'model/conexion.php';
$codigo = $_GET['codigo'];

$sentencia = $bd->prepare("SELECT pro.promocion, pro.duracion, pro.celular, pro.id_productos, prom.nombre
  FROM promociones pro 
  INNER JOIN productos prom ON prom.id = pro.id_productos
  WHERE pro.id = ?;");
$sentencia->execute([$codigo]);
$producto = $sentencia->fetch(PDO::FETCH_OBJ);

    $url = 'https://api.green-api.com/waInstance7103867698/SendMessage/65b16e1e5a9c4231a0f2bf96dae50342ac8e12f298034c54a2';
    $data = [
        "chatId" => "51".$producto->celular."@c.us",
        "message" =>  '¡No te pierdas nuestra increíble promoción! *'.strtoupper($producto->nombre).'* con *'.strtoupper($producto->promocion).'.* Válido solo *'.$producto->duracion.'.*'
    ];
    $options = array(
        'http' => array(
            'method'  => 'POST',
            'content' => json_encode($data),
            'header' =>  "Content-Type: application/json\r\n" .
                "Accept: application/json\r\n"
        )
    );

    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    $response = json_decode($result);
    header('Location: agregarPromocion.php?codigo='.$producto->id_productos);
?> 