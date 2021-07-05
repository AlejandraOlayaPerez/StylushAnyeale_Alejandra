<?php
require_once 'headGerente.php';
require_once '../model/cargo.php';
require_once '../model/conexionDB.php';

$oCargo = new cargo();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/estilosGerente.css" type="text/css">
    <title>Nuevo Cargo</title>
</head>

<body>
    <div class="container">

        <h1>NUEVO CARGO</h1>
        <br>

        <form action="../controller/usuarioController.php" method="GET">
            <div class="row">
                <div class="col-md-6">
                    <label for="" class="form-label">Cargo</label>
                    <select class="form-select" id="" name="cargo" required>
                        <option value="" disabled selected>Selecciones una opción</option>
                        <option value="recepcionista" <?php if ($oCargo->cargo == "recepcionista") {echo "selected";} ?>>Recepcionista</option>
                        <option value="estilista" <?php if ($oCargo->cargo == "estilista") {echo "selected";} ?>>Estilista</option>
                        <option value="vendedor" <?php if ($oCargo->cargo == "vendedor") {echo "selected";} ?>>Vendedor</option>
                        <option value="cajero" <?php if ($oCargo->cargo == "cajero") {echo "selected";} ?>>Cajero</option>
                    </select>
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-success" name="funcion" value="nuevoCargo"><i class="far fa-save"></i> Guardar</button>
            <a href="listarCargo.php" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
        </form>
    </div>
</body>

</html>

<?php
require_once 'footerGerente.php';
?>