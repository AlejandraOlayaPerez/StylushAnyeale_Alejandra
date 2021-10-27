<?php
require_once 'headpagina.php';
require_once '../model/usuario.php';
require_once '../model/cargo.php';

$idCargo = $_GET['idCargo'];
?>

<body>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body table-responsive p-0">
                <table class="table colorestabla">
                    <thead>
                        <tr class="estiloTr">
                            <th>Tipo Documento</th>
                            <th>Documento</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Telefono</th>
                            <th><button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-empresa" onclick="mostrarUsuario();"><i class="fas fa-user-plus"></i> Agregar Usuario</button></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $oUsuario = new usuario();
                        $consulta = $oUsuario->listarCargoUsuario($idCargo);
                        if (count($consulta) > 0) {
                            foreach ($consulta as $registro) {
                        ?>
                                <tr>
                                    <td><?php echo $registro['tipoDocumento']; ?></td>
                                    <td><?php echo $registro['documentoIdentidad']; ?></td>
                                    <td><?php echo $registro['nombre']; ?></td>
                                    <td><?php echo $registro['apellido']; ?></td>
                                    <td><?php echo $registro['telefono']; ?></td>
                                    <td><a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarFormulario" onclick="eliminarEmpleadoCargo(<?php echo $registro['idUser']; ?>, <?php echo $_GET['idCargo']; ?>)"><i class="fas fa-trash-alt"></i> Eliminar</a></td>
                                </tr>
                            <?php }
                        } else { //en caso de que no tengo informacion, mostrara un mensaje
                            ?>
                            <!-- no hay ningun registro -->
                            <tr>
                                <td colspan="6" style="font-family: 'Times New Roman', Times, serif; text-align: center; font-weight: 600;">No hay usuarios registrados en este cargo</td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <a href="listarcargo.php" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
    </div>

</body>

</html>

<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/eliminar.min.js"></script>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/general.min.js"></script>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/mostrarUsuario.min.js"></script>
<?php require_once 'footer.php'; ?>

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
                <form action="../controller/cargoController.php" method="GET">
                    <input type="text" name="idUser" id="eliminarEmpleado" style="display: none;">
                    <input type="text" name="idCargo" id="eliminarCargo" style="display:none;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger" name="funcion" value="eliminarEmpleadoCargo"><i class="fas fa-trash-alt"></i> Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>




<div class="modal fade" id="modal-empresa">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="../controller/usuarioController.php" method="GET">
                <input type="text" id="idCargo" name="idCargo" value="<?php echo $_GET['idCargo']; ?>" style="display: none;">
                <div class="modal-header estiloModalBody">
                    <h4 class="modal-title">Seleccionar Usuarios</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body estiloModalBody">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-tools">
                                <ul class="pagination pagination-sm contenedorUL" id="contenedorUL">

                                </ul>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table colorestabla">
                                <thead>
                                    <tr class="estiloTr">
                                        <th>Selección</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                    </tr>
                                </thead>
                                <tbody id="mostrarUsuario">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer estiloModalBody">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success" name="funcion" value="registrarUsuarioCargo">Registrar Usuarios</button>
                </div>
            </form>
        </div>
    </div>
</div>