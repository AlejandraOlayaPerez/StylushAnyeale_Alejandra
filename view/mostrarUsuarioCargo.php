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
    <title>USUARIO EN CARGO</title>
</head>

<body>
    <div class="container">

        <div class="col-md-12" style="background-color: rgb(249, 201, 242);">
            <div class="card">
                <div class="card-header" style="background-color: rgb(249, 201, 242);">
                    <h3 class="card-title" style="font-family:'Times New Roman', Times, serif; font-size: 20px; font-weight: 600;">Usuarios en este cargo</h1>
                </div>
                <div class="card-body p-0" style="background-color: rgb(119, 167, 191);">
                    <table class="table" style="font-family:'Times New Roman', Times, serif; font-size: 20px;">
                        <thead>
                            <tr style="background-color: rgb(249, 201, 242);">
                                <th>Tipo Documento</th>
                                <th>Documento</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Telefono</th>
                                <th><a class="btn btn-info" href="nuevoUsuarioCargo.php?idCargo=<?php echo $_GET['idCargo']; ?>"><i class="fas fa-plus-square"></i> Agregar Usuario</a></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            //instanciamos empleado(), referenciamos la funcion listarEmpleado.
                            $oEmpleado = new empleado();
                            // $oEmpleado->idEmpleado = $_GET['idEmpleado'];
                            $consulta = $oEmpleado->listarEmpleado($idCargo);
                            if(count($consulta)>0){ //esta funcion me permite saber si la consulta tiene algo que mostrar, en caso de que traiga informacion, mostrara la informacion
                            foreach ($consulta as $registro) {
                            ?>
                                <tr>
                                    <td><?php echo $registro['tipoDocumento']; ?></td>
                                    <td><?php echo $registro['documentoIdentidad']; ?></td>
                                    <td><?php echo $registro['primerNombre'] . " " . $registro['segundoNombre']; ?></td>
                                    <td><?php echo $registro['primerApellido'] . " " . $registro['segundoApellido']; ?></td>
                                    <td><?php echo $registro['telefono']; ?></td>
                                    <td><a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarFormulario" onclick="eliminarEmpleadoCargo(<?php echo $registro['idEmpleado']; ?>, <?php echo $registro['idCargo']; ?>)"><i class="fas fa-trash-alt"></i> Eliminar</a></td>                              
                                </tr>
                            <?php }
                            
                            }else{ //en caso de que no tengo informacion, mostrara un mensaje
                            ?>
                                <!-- no hay ningun registro -->
                                <tr>
                                    <td style="font-family: 'Times New Roman', Times, serif; text-align: center; font-weight: 600;">No hay usuarios registrados en este cargo</td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
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
                    <button type="submit" class="btn btn-danger" name="funcion" value="eliminarEmpleadoCargo"><i class="fas fa-trash-alt"></i>Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>

