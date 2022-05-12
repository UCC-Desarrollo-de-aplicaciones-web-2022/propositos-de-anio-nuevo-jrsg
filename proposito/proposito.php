<?php
session_start();

include '../config/conexion.php';

$id = !empty($_GET['id']) ? $_GET['id'] : '';

$proposito      = '';
$vencimiento    = '';
if(!empty($id)){
    $sql = "select * from propositos where id = $id";
    $result = mysqli_query($conexion, $sql);

    if($result){
        $fila = mysqli_fetch_assoc($result);
        $proposito      = $fila['proposito'];
        $vencimiento    = $fila['vencimiento'];
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Propósitos</title>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="../css/estilos.css"/>
</head>

<body>

<?php require '../config/nav.php' ?>

<div class="container">
    <form action="guardar.php" method="post">
    <div class="row">
        <div class="col-md-12">
            <h1>Propósito</h1>

            <input type="submit" name="accion" value="Cancelar" class="btn btn-secondary">
            <input type="submit" name="accion" value="Guardar" class="btn btn-primary">
            <input type="hidden" name="id_proposito" value="<?php echo $id ?>" />
        </div>
    </div>

    <!-- mostrar la imagen en la funcionalidad de consulta/editar
    <div class="row my-3">
        <div class="col-md-6">
            <img src="../img/image-placeholder.png" class="img-thumbnail">
        </div>
    </div>-->

    <div class="row mt-5">
        <div class="col-md-6">
            <div class="form-group">
                <label>Propósito</label>
                <input type="text" name="proposito" class="form-control" value="<?php echo $proposito ?>">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Fecha de vencimiento</label>
                <input type="date" name="vencimiento" class="form-control"  value="<?php echo $vencimiento ?>"/>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Imagen</label>
                <input type="file" name="imagen" class="form-control"/>
            </div>
        </div>
    </div>

    </form>
</div>

</body>
</html>