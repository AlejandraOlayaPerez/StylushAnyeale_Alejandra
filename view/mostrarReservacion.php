<?php
//referenciamos archivos de la carpeta Model
require_once 'headGerente.php';
require_once '../model/reservaciones.php';
require_once '../model/conexionDB.php';

date_default_timezone_set('America/Bogota');
if (isset($_GET['filtroFecha'])) {
    $filtroFecha = $_GET['filtroFecha'];
} else {
    $filtroFecha = Date("Y-m-d");
}

$filtroDomicilio="";
$filtroReservaciones="";

if (isset($_GET['filtroDomicilio'])) {
    $filtroDomicilio=$_GET['filtroDomicilio'];
}

if (isset($_GET['filtroReservaciones'])){
    $filtroReservaciones=$_GET['filtroReservaciones'];
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/estilosGerente.css" type="text/css">
    <script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/js/eliminar.js"></script>
    <title>RESERVACIONES</title>
</head>

<body>
    <div class="container">

        <?php
        require_once '../controller/mensajeController.php';

        if (isset($_GET['mensaje'])) {
            $oMensaje = new mensajes();
            echo $oMensaje->mensaje($_GET['tipoMensaje'], $_GET['mensaje']);
        }
        ?>

        <div class="col-md-12" style="background-color: rgb(249, 201, 242);">
            <div class="card">
                <div class="card-header" style="background-color: rgb(249, 201, 242);">
                    <form action="" method="GET">
                        <div class="row">
                            <div class="col col-xl-4 col-md-6 col-12">
                                <label class="card-title" style="font-family:'Times New Roman', Times, serif; font-size: 20px; font-weight: 600;">Reservacion por fecha: </label>
                                <input type="date" style="font-family:'Times New Roman', Times, serif; font-size: 20px;" name="filtroFecha" onchange="this.form.submit()" value="<?php echo $filtroFecha; ?>">
                            </div>
                            <div class="col col-xl-4 col-md-6 col-12">
                                <label class="card-title" style="font-family:'Times New Roman', Times, serif; font-size: 20px; font-weight: 600;">Reservacion por Domicilio: </label>
                                <select class="form-select" id="" name="filtroDomicilio" onchange="this.form.submit()">
                                        <option value="" disabled selected>Selecciones una opción</option>
                                        <option value="true" <?php if ($filtroDomicilio) {echo "selected";} ?>>SI</option>
                                        <option value="false" <?php if (!$filtroDomicilio) {echo "selected";} ?>>NO</option>
                                    </select>
                            </div>
                            <div class="col col-xl-4 col-md-6 col-12">
                                <label class="card-title" style="font-family:'Times New Roman', Times, serif; font-size: 20px; font-weight: 600;">Reservacion sin realizar: </label>
                                <select class="form-select" id="" name="filtroReservaciones" onchange="this.form.submit()">
                                        <option value="" disabled selected>Selecciones una opción</option>
                                        <option value="true" <?php if ($filtroReservaciones) {echo "selected";} ?>>SI</option>
                                        <option value="false" <?php if (!$filtroReservaciones) {echo "selected";} ?>>NO</option>
                                    </select>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card-body p-0" style="background-color: rgb(119, 167, 191);">
                    <table class="table" style="font-family:'Times New Roman', Times, serif; font-size: 20px;">
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
                                    <td style="font-family: 'Times New Roman', Times, serif; text-align: center; font-weight: 600;">No hay registro de reservaciones.</td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <a href="home/paginaPrincipalGerente.php" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
    </div>
</body>

</html>

<?php
require_once 'footerGerente.php';
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