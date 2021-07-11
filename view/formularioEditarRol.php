<?php
require_once 'headGerente.php';
require_once '../controller/usuarioController.php';

$oUsuarioController = new usuarioController();
$oRol = $oUsuarioController->consultarRolId($_GET['idRol']); //la consultaRolId retorna la instancia completa del rol, la esta almacenando en la variable $oRol

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/estilosGerente.css" type="text/css">
    <title>Editar Rol</title>
</head>

<body>
    <form action="../controller/usuarioController.php" method="GET">
        <div class="container">
            <h1 class="tituloGrande">EDITAR ROL</h1>


            <div class="row">
                <div class="col col-6">
                    <label for="" class="form-label">Nombre_Rol</label>
                    <input type="text" name="idRol" value="<?php echo $oRol->idRol; ?>" style="display:none;">
                    <select class="form-select" id="" name="nombreRol" required>
                        <option value="" disabled selected>Selecciones una opción</option>
                        <option value="Gerente" <?php if ($oRol->nombreRol == "Gerente") {echo "selected";} ?>>Gerente</option>
                        <option value="Recepcionista" <?php if ($oRol->nombreRol == "Recepcionista") {echo "selected";} ?>>Recepcionista</option>
                        <option value="Cajero" <?php if ($oRol->nombreRol == "Cajero") {echo "selected";} ?>>Cajero</option>
                        <option value="Vendedor" <?php if ($oRol->nombreRol == "Vendedor") {echo "selected";} ?>>Vendedor</option>
                        <option value="Personal" <?php if ($oRol->nombreRol == "Personal") {echo "selected";} ?>>Personal</option>
                        <option value="Tecnicos" <?php if ($oRol->nombreRol == "Tecnicos") {echo "selected";} ?>>Tecnicos</option>
                    </select>
                </div>
            </div>

            <br>
            <button type="submit" class="btn btn-success" name="funcion" value="actualizarRol">Guardar</button>
    </form>
    <a href="home/paginaPrincipalGerente.php?ventana=rol" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
</body>