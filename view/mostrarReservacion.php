<?php
require_once 'headPagina.php';
require_once '../model/reservaciones.php';
require_once '../model/conexionDB.php';

date_default_timezone_set('America/Bogota');
if (isset($_GET['filtroFecha'])) {
    $filtroFecha = $_GET['filtroFecha'];
} else {
    $filtroFecha = Date("Y-m-d");
}

$filtroDomicilio = "";
$filtroReservaciones = "";

if (isset($_GET['filtroDomicilio'])) {
    $filtroDomicilio = $_GET['filtroDomicilio'];
}

if (isset($_GET['filtroReservaciones'])) {
    $filtroReservaciones = $_GET['filtroReservaciones'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RESERVACIONES</title>
</head>

<body>
    <div class="content-wrapper">
        <div class="content-header">

            <?php
            require_once '../controller/mensajeController.php';

            if (isset($_GET['mensaje'])) {
                $oMensaje = new mensajes();
                echo $oMensaje->mensaje($_GET['tipoMensaje'], $_GET['mensaje']);
            }
            ?>

            <div class="container-fluid">
                <div class="card">
                    <div class="card-header border-0">
                        <form id="formLimpiar" action="" method="GET">
                            <div class="row">
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label class="card-title" style="font-family:'Times New Roman', Times, serif; font-size: 20px; font-weight: 600;">Reservacion por fecha: </label>
                                    <input type="date" class="form-control datetimepicker-input" style="font-family:'Times New Roman', Times, serif; font-size: 20px;" name="filtroFecha" onchange="this.form.submit()" value="<?php echo $filtroFecha; ?>">
                                </div>
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label class="card-title" style="font-family:'Times New Roman', Times, serif; font-size: 20px; font-weight: 600;">Reservacion por Domicilio: </label>
                                    <select class="form-select" id="" name="filtroDomicilio" onchange="this.form.submit()">
                                        <option value=""  selected>Selecciones una opción</option>
                                        <option value="1" <?php if ($filtroDomicilio == "1") {
                                                                echo "selected";
                                                            } ?>>SI</option>
                                        <option value="0" <?php if ($filtroDomicilio == "0") {
                                                                echo "selected";
                                                            } ?>>NO</option>
                                    </select>
                                </div>
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label class="card-title" style="font-family:'Times New Roman', Times, serif; font-size: 20px; font-weight: 600;">Reservacion sin realizar: </label>
                                    <select class="form-select" id="" name="filtroReservaciones" onchange="this.form.submit()">
                                        <option value=""  selected>Selecciones una opción</option>
                                        <option value="1" <?php if ($filtroReservaciones == "1") {
                                                                    echo "selected";
                                                                } ?>>SI</option>
                                        <option value="0" <?php if ($filtroReservaciones == "0") {
                                                                    echo "selected";
                                                                } ?>>NO</option>
                                    </select>
                                </div>
                                <div class="col col-xl-4 col-md-6 col-12">
                                <br>
                                <input type="button" class="btn btn-light" value="Limpiar Filtros" onclick="limpiarFiltroReservacion()">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                                <tr style="background-color: rgb(249, 201, 242);">
                                    <th>Cliente</th>
                                    <th>Servicio</th>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Domicilio</th>
                                    <th>Direccion</th>
                                    <th>¿Reservacion realizada?</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $oReservacion = new reservacion();
                                $consulta = $oReservacion->mostrarReservacion($filtroFecha, $filtroDomicilio, $filtroReservaciones);
                                if (count($consulta) > 0) {
                                    foreach ($consulta as $registro) {
                                ?>
                                        <tr>
                                            <td><?php echo $registro['primerNombre'] . " " . $registro['primerApellido']; ?></td>
                                            <td><?php echo $registro['servicio']; ?></td>
                                            <td><?php echo $registro['fechaReservacion']; ?></td>
                                            <td><?php echo $registro['horaReservacion']; ?></td>
                                            <td><?php if ($registro['domicilio']) echo "SI";
                                                else echo "NO";  ?><?php if ($registro['domicilio'] == 0) ?></td>
                                            <td><?php if ($registro['domicilio'] == 0) echo "NO";
                                                else echo $registro['direccion'] ?>
                                            <td><?php if ($registro['validar']) echo "SI";
                                                else echo "NO"; ?><?php if ($registro['validar'] == 0) ?></td>
                                            <td>
                                                <a class="btn btn-light" data-bs-toggle="modal" data-bs-target="#eliminarFormulario" onclick="validarReservacion(<?php echo $registro['idReservacion']; ?>)"><i class="fas fa-check-circle"></i> Validar</a>
                                            </td>
                                        </tr>
                                    <?php }
                                } else { //en caso de que no tengo informacion, mostrara un mensaje
                                    ?>
                                    <!-- no hay ningun registro -->
                                    <tr>
                                        <td colspan="9" style="font-family: 'Times New Roman', Times, serif; text-align: center; font-weight: 600;">No hay reservaciones disponibles</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <a href="home/paginaPrincipalGerente.php" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
        </div>
    </div>
</body>

</html>

<?php
require_once 'footer.php';
?>

<div class="modal fade" id="eliminarFormulario" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Label">Validar Reservacion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>¿La reservacion ya fue realizada?</p>
            </div>
            <div class="modal-footer">
                <form action="../controller/reservacionController.php" method="GET">
                    <input type="text" name="idReservacion" id="validarReservacion" style="display:none;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success" name="funcion" value="validarReservacion"><i class="fas fa-check-circle"></i> Reservacion relizada</button>
                </form>
            </div>
        </div>
    </div>
</div>