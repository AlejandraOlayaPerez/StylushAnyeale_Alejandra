<?php
//referenciamos archivos de la carpeta Model
require_once 'headGerente.php';
require_once '../model/empleado.php';
require_once '../model/conexionDB.php';
require_once '../model/cargo.php';

$idCargo = $_GET['idCargo'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/estilosGerente.css" type="text/css">
    <script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/js/eliminar.js"></script>
    <title>Listar Empleado</title>
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
        <br>

        <table class="table" style="font-family:'Times New Roman', Times, serif; font-size: 20px;">
            <thead>
                <tr class="table-primary">
                    <td>Tipo Documento</td>
                    <td>Documento</td>
                    <td>Nombres</td>
                    <td>Apellidos</td>
                    <td><a class="btn btn-info" href="nuevoEmpleado.php?idCargo=<?php echo $_GET['idCargo']; ?>"><i class="fas fa-user-plus"></i> Nuevo</a></td>
                </tr>
            </thead>
            <tbody>

                <?php
                //instanciamos empleado(), referenciamos la funcion listarEmpleado.
                $oEmpleado = new empleado();
                // $oEmpleado->idEmpleado = $_GET['idEmpleado'];
                $consulta = $oEmpleado->listarEmpleado($idCargo);
                foreach ($consulta as $registro) {
                ?>
                    <tr>
                        <td><?php echo $registro['tipoDocumento']; ?></td>
                        <td><?php echo $registro['documentoIdentidad']; ?></td>
                        <td><?php echo $registro['primerNombre'] . " " . $registro['segundoNombre']; ?></td>
                        <td><?php echo $registro['primerApellido'] . " " . $registro['segundoApellido']; ?></td>
                        <th>
                            <a href="detalleEmpleado.php?idEmpleado=<?php echo $registro['idEmpleado']; ?>&idCargo=<?php echo $_GET['idCargo']; ?>" class="btn btn-light"><i class="fas fa-address-card"></i> Informacion personal</a>
                            <a href="formularioEditarEmpleado.php?idEmpleado=<?php echo $registro['idEmpleado']; ?>" class="btn btn-warning"><i class="fas fa-user-edit"></i> Editar</a>
                            <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarFormulario" onclick="eliminarEmpleado(<?php echo $registro['idEmpleado']; ?>, <?php echo $registro['idCargo']; ?>)"><i class="fas fa-trash-alt"></i> Eliminar</a>
                        </th>
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
                <h5 class="modal-title" id="Label">Eliminar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>¿Esta seguro que desea eliminar al empleado?</p>
            </div>
            <div class="modal-footer">
                <form action="../controller/usuarioController.php" method="GET">
                    <input type="text" name="idEmpleado" id="eliminarEmpleado" style="display:none;">
                    <input type="text" name="idCargo" id="eliminarCargo" style="display:none;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger" name="funcion" value="eliminarEmpleado"><i class="fas fa-trash-alt"></i>Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>