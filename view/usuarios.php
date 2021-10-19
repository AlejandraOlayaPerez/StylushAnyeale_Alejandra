
<?php
/*Isset si al variable page esta definida y su valor es difeente a nulo, si es nulo,
                                        el valor preterminado sera 1*/
if (isset($_GET['page'])) $pagina = $_GET['page'];
else $pagina = 1;

$consulta = $oUsuario->mostrarUsuariosPorIdRol($idRol, $pagina);
$numeroRegistro = $oUsuario->numRegistro;
$numPagina = intval($numeroRegistro / 10); //intval, traera el resultado en Entero en caso de que sea decimal
if (fmod($numeroRegistro, 10) > 0) $numPagina++; //fmod es el modulo, para conocer el residuo
// echo $numPagina;
?>

<div class="card border border-dark">
    <div class="card-header" style="background-color: rgb(249, 201, 242); font-family:'Times New Roman', Times, serif; -webkit-text-fill-color: black;">
        <h1 class="card-title">Usuarios en Rol: <?php echo $oRol->nombreRol; ?> </h1>
        <!--Paginacion-->
        <div class="card-tools">
            <ul class="pagination pagination-sm float-right border border-dark">
                <li class="page-item"><a class="page-link" style="font-family:'Times New Roman', Times, serif; -webkit-text-fill-color: black;" href="listarDetalleRol.php?page=1&idRol=<?php echo $idRol; ?>">&laquo;</a></li>
                <?php
                for ($i = 1; $i <= $numPagina; $i++) {
                ?>
                    <li class="page-item"><a class="page-link" style="font-family:'Times New Roman', Times, serif; -webkit-text-fill-color: black;" href="listarDetalleRol.php?page=<?php echo $i; ?>&idRol=<?php echo $idRol; ?>"><?php echo $i; ?></a></li>
                <?php
                }
                ?>
                <li class="page-item"><a class="page-link" style="font-family:'Times New Roman', Times, serif; -webkit-text-fill-color: black;" href="listarDetalleRol.php?page=<?php echo $numPagina; ?>&idRol=<?php echo $idRol; ?>">&raquo;</a></li>
            </ul>
        </div>
    </div>

    <div class="card-body table-responsive p-0">
        <table class="table table-striped table-valign-middle">
            <thead>
                <tr style="background-color: rgb(249, 201, 242);">
                    <th>Nombre_Usuario</th>
                    <th>Correo Electronico</th>
                    <th><button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-empresa"><i class="fas fa-user-plus"></i> Agregar Usuario</button></th>
                </tr>
            </thead>
            <tbody>

                <?php
                if (count($consulta) > 0) {
                    foreach ($consulta as $registro) { //tomar de todos los registros que retorna, toma una y almacena en registro
                ?>
                        <tr>
                            <td><?php echo $registro['primerNombre'] . " " . $registro['primerApellido']; ?></td>
                            <td><?php echo $registro['correoElectronico']; ?></td>
                            <td>
                                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarFormulario" value="" onclick="eliminarUsuarioRol(<?php echo $registro['idUser']; ?>)"><i class="fas fa-trash-alt"></i> Eliminar usuario</a>
                            </td>
                        </tr>
                    <?php }
                } else { //en caso de que no tengo informacion, mostrara un mensaje
                    ?>
                    <!-- no hay ningun registro -->
                    <tr>
                        <td colspan="3" style="font-family: 'Times New Roman', Times, serif; text-align: center; font-weight: 600;">No hay usuarios registrados en este rol</td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>