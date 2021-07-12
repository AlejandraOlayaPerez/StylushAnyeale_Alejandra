<?php
//referenciamos archivos de la carpeta Model
require_once 'headGerente.php';
require_once '../model/reservaciones.php';
require_once '../model/conexionDB.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/estilosGerente.css" type="text/css">
    <script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/js/eliminar.js"></script>
    <title>Reservaciones</title>
</head>

<body>
    <div class="container">



        <table class="table" style="font-family:'Times New Roman', Times, serif; font-size: 20px;">
            <thead>
                <tr class="table-primary">
                    <td>Cliente</td>
                    <td>Servicio</td>
                    <td>Fecha</td>
                    <td>Hora</td>
                    <td>Domicilio</td>
                    <td>Direccion</td>
                    <td>¿Reservacion realizada?</td>
                    <td><a class="btn btn-info" href="HistorialReservaciones.php"><i class="fas fa-file-alt"></i> Historial</a></td>
                </tr>
            </thead>
            <tbody>
                <?php
               
                $oReservacion=new reservacion();
                $consulta=$oReservacion->mostrarReservacion();
                
        print_r($consulta);
                foreach ($consulta as $registro) {
                ?>
                    <tr>
                        <td><?php echo $registro['primerNombre']." ".$registro['primerApellido']; ?></td>
                        <td><?php echo $registro['servicio']; ?></td>
                        <td><?php echo $registro['fechaReservacion']; ?></td>
                        <td><?php echo $registro['horaReservacion']; ?></td>
                        <td><?php if ($registro['domicilio']) echo "SI"; else echo "NO";  ?><?php if ($registro['domicilio'] == 0) ?></td>
                        <td><?php if ($registro['domicilio']==0) echo "NO"; else echo $registro['direccion']; ?>
                        <td><?php if ($registro['validar']) echo "SI"; else echo "NO"; ?><?php if ($registro['validar']== 0) ?></td>
                        <td>
                            <a class="btn btn-light" data-bs-toggle="modal" data-bs-target="#eliminarFormulario" onclick="validarReservacion(<?php echo $registro['idReservacion']; ?>)"><i class="fas fa-check-circle"></i> Validar</a>
                            <a href="detalleReservacion.php?idReservacion=<?php echo $registro['idReservacion']; ?>" class="btn btn-light"><i class="fas fa-address-card"></i> Detalle</a>
                        </td>
                    </tr>
                    <?php } ?>
            </tbody>
        </table>
        <a href="listarCargo.php" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
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
                <form action="../controller/usuarioController.php" method="GET">
                    <input type="text" name="idReservacion" id="validarReservacion" style="display:none;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success" name="funcion" value="validarReservacion"><i class="fas fa-check-circle"></i> Reservacion relizada</button>
                </form>
            </div>
        </div>
    </div>
</div>