<div style="background-image: url('img/fondo.jpg'); background-size: cover;background-position: center;">
<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET['codigo'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $codigo = $_GET['codigo'];

    $sentencia = $bd->prepare("select * from productos where id = ?;");
    $sentencia->execute([$codigo]);
    $productos = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($productos);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">Producto: </label>
                        <input type="text" class="form-control" name="txtProducto" required 
                        value="<?php echo $productos->nombre; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Precio por unidad: </label>
                        <input type="text" class="form-control" name="txtPrecio" autofocus required
                        value="<?php echo $productos->precio; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Stock: </label>
                        <input type="number" class="form-control" name="txtStock" autofocus required
                        value="<?php echo $productos->stock; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Proveedor: </label>
                        <input type="text" class="form-control" name="txtProveedor" autofocus required
                        value="<?php echo $productos->proveedor; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha Ingreso: </label>
                        <input type="date" class="form-control" name="txtFechaIngreso" autofocus required
                        value="<?php echo $productos->fecha_ingreso; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $productos->id; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<br><br><br>
<?php include 'template/footer.php' ?>
</div>