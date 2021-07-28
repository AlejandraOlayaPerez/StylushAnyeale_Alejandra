<?php
require 'headGerente.php';
require_once '../model/conexionDB.php';
require_once '../model/rol.php';
require_once '../controller/gestionController.php';;

$idRol = $_GET['idRol'];

$oUsuarioController = new usuarioController();
$listarDeUsuarioDiferente = $oUsuarioController->usuarioDiferenteEnRol($idRol);
?>

<html>

<head>
    <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/estilosGerente.css" type="text/css">
    <title>NUEVO EMPLEADO</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col col-xl-4 col-md-6 col-12">

                <form action="../controller/gestionController.php" method="GET">
                    <h3 class="tituloGrande">Empleados: </h3>
                    <input name="idRol" value="<?php echo $idRol; ?>" style="display:none">


                    <select class="form-select" name="idUser" id="" required>
                        <option value="" disabled selected>Selecciones una opción</option>
                        <?php foreach ($listarDeUsuarioDiferente as $registro) {
                        ?>
                            <option value="<?php echo $registro['idUser']; ?>"><?php echo $registro['primerNombre'] . " " . $registro['primerApellido']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <br>
                    <button type="submit" class="btn btn-success" name="funcion" value="registrarUsuarioEnRol"><i class="far fa-save"></i> Guardar</button>
                    <a href="listarDetalleRol.php?idRol=<?php echo $idRol; ?>" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
                </form>
            </div>
        </div>

    </div>
</body>

</html>

<?php
require_once 'footerGerente.php';
?>