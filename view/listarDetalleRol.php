<?php
require_once 'headPagina.php';
require_once '../controller/gestionController.php';
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
            <div class="col-12">
                <div class="card card-primary card-tabs">
                    <div class="card-header p-0 pt-1" style="background-color: rgba(255, 255, 204, 255);">
                        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true" style="font-family: 'Times New Roman', Times, serif; -webkit-text-fill-color: black;">Usuario</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false" style="font-family: 'Times New Roman', Times, serif; -webkit-text-fill-color: black;">Permisos</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-one-tabContent">
                            <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                <?php require_once 'usuarios.php'; ?>

                                <a href="listarRol.php?idRol=<?php echo $idRol; ?>" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
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
                <div class="modal-header">
                    <h5 class="modal-title" id="Label">Eliminar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Esta seguro que desea eliminar el usuario rol?</p>
                </div>
                <div class="modal-footer">
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
                    <div class="modal-header">
                        <h4 class="modal-title">Seleccionar Usuarios</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table align-middle">
                            <thead>
                                <tr>
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success" name="funcion" value="registrarUsuarioRol">Registrar Usuarios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<?php require_once 'footer.php'; ?>