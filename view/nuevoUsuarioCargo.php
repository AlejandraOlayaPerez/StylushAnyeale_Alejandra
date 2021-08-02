<?php
require_once 'headPagina.php';
require_once '../model/conexionDB.php';
require_once '../model/usuario.php';

$idCargo = $_GET['idCargo'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NUEVO USUARIO</title>
</head>

<body>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="card card-primary">
                    <div class="card-header" style="background-color: rgb(249, 201, 242);">
                        <label class="card-title" style="-webkit-text-fill-color: black;">NUEVO ROL</label>
                    </div>
                    <form action="../controller/cargoController.php" method="GET">
                        <div class="card-body" style="background-color: rgba(255, 255, 204, 255);">
                            <input name="idCargo" value="<?php echo $idCargo; ?>" style="display:none">
                            <?php
                            require_once '../model/usuario.php';
                            $oUsuario = new usuario();
                            $result = $oUsuario->mostrarUsuario();
                            ?>
                            <div class="row" style="margin: 5px;">
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="">Nombre Usuario</label>
                                    <select select class="form-select" name="idUser" id="" required>
                                        <option value="" disabled selected>Selecciones una opción</option>
                                        <?php foreach ($result as $registro) {
                                        ?>
                                            <option value="<?php echo $registro['idUser']; ?>"><?php echo $registro['primerNombre'] . " " . $registro['primerApellido']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer" style="background-color: rgba(255, 255, 204, 255);">
                            <a href="mostrarUsuarioCargo.php?idCargo=<?php echo $_GET['idCargo']; ?>" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
                            <button type="submit" class="btn btn-success" name="funcion" value="actualizarCargoEnEmpleado"> <i class="far fa-save"></i>Registrar usuario</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>

</html>

<?php
require_once 'footer.php';
?>