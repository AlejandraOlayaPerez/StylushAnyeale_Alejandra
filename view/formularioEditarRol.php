<?php
require_once 'headPagina.php';
require_once '../controller/gestionController.php';

$oGestionController = new gestionController();
$oRol = $oGestionController->consultarRolId($_GET['idRol']); //la consultaRolId retorna la instancia completa del rol, la esta almacenando en la variable $oRol
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR ROL</title>
</head>

<body>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="card card-primary">
                    <div class="card-header" style="background-color: rgb(249, 201, 242);">
                        <label class="card-title" style="-webkit-text-fill-color: black;">EDITAR ROL</label>
                    </div>
                    <form>
                        <div class="card-body" style="background-color: rgba(255, 255, 204, 255);">
                            <input type="text" name="idRol" value="<?php echo $oRol->idRol; ?>" style="display:none;">
                            <div class="row" style="margin: 5px; ">
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="" class="form-label">Nombre_Rol</label>
                                    <input class="form-control" type="text" name="nombreRol" placeholder="Nombre del Rol" value="<?php echo $oRol->nombreRol ?>">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer" style="background-color: rgba(255, 255, 204, 255);">
                            <a href="listarRol.php" class="btn btn-dark"><i class="fas fa-arrow-circle-left"></i> Atras</a>
                            <button type="submit" class="btn btn-success" name="funcion" value="actualizarRol"><i class="fas fa-edit"></i>Actualizar Rol</button>
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