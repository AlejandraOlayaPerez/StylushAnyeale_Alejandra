<?php
require_once 'headpagina.php';
require_once '../controller/gestioncontroller.php';
require_once '../model/rol.php';
require_once '../model/usuario.php';
require_once '../model/pagina.php';
require_once '../model/modulo.php';

$idRol = $_GET['idRol'];

$oUsuario = new usuario();
$oRol = new rol();

$oGestionController = new gestionController();
$oRol = $oGestionController->consultarRolId($_GET['idRol']);
?>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-tabs tabsHeader">
                    <div class="card-header">
                        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link tabsHead active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Usuario</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link tabsHead" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Permisos</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-one-tabContent">
                            <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                <input type="text" id="idRol" value="<?php echo $_GET['idRol']; ?>" style="display: none;">
                                <?php require_once 'usuarios.php'; ?>

                                <a href="listarrol.php?idRol=<?php echo $idRol; ?>" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
                            </div>

                            <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                                <?php require_once 'permisos.php'; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="eliminarFormulario" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header estiloModalHeader">
                    <h5 class="modal-title" id="Label">Eliminar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body estiloModalBody">
                    <p>¿Esta seguro que desea eliminar el usuario rol?</p>
                </div>
                <div class="modal-footer estiloModalBody">
                    <form action="../controller/usuarioController.php" method="GET">
                        <input type="text" name="idUser" id="eliminarUsuarioRol" style="display: none;">
                        <input type="text" name="idRol" value="<?php echo $idRol ?> " style="display:none;">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger" name="funcion" value="eliminarUsuarioDeRol"><i class="fas fa-trash-alt"></i> Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-empresa">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="/Anyeale_proyecto/StylushAnyeale_Alejandra/controller/usuarioController.php" method="GET">
                    <input type="text" name="idRol" value="<?php echo $_GET['idRol']; ?>" style="display: none;">
                    <div class="modal-header estiloModalBody">
                        <h4 class="modal-title">Seleccionar Usuarios</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body estiloModalBody">
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table colorestabla">
                                    <thead>
                                        <tr class="estiloTr">
                                            <th>Selección</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require_once '../model/usuario.php';
                                        $oUsuario = new usuario();
                                        $consulta = $oUsuario->mostrarUsuarioRol($_GET['idRol']);
                                        foreach ($consulta as $registro) {
                                        ?>
                                            <tr>
                                                <td><input type="checkbox" name="rolUsuario[]" value="<?php echo $registro['idUser']; ?>"></td>
                                                <td><?php echo $registro['primerNombre']; ?></td>
                                                <td><?php echo $registro['primerApellido']; ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer estiloModalBody">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success" name="funcion" value="registrarUsuarioRol">Registrar Usuarios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<?php require_once 'footer.php'; ?>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/eliminar.min.js"></script>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/general.min.js"></script>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/permisoHabilitar.min.js"></script>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/listardetallerol.min.js"></script>