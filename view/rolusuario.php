<div id="main-content" class="file_manager">
    <?php
    require_once '../controller/usuariocontroller.php';
    $oUsuarioController = new usuarioController();
    ?>
    <div class="container">
        <div class="row clearfix">
            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="card">
                    <div class="file">
                        <a href="javascript:void(0);">
                            <div class="icon">
                                <i class="fas fa-project-diagram"></i>
                            </div>
                            <div class="file-name">
                                <p class="m-b-5 text-muted">Rol</p>
                                <?php
                                $oUsuario = $oUsuarioController->nombreRol($_SESSION['idUser']);
                                ?>
                                <small><?php echo $oUsuario->nombreRol; ?></small>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="card">
                    <div class="file">
                        <a href="javascript:void(0);">
                            <div class="icon">
                                <i class="fas fa-address-card"></i>
                            </div>
                            <div class="file-name">
                                <p class="m-b-5 text-muted">Cargo</p>
                                <?php
                                $oUser = $oUsuarioController->nombreCargo($_SESSION['idUser']);
                                ?>
                                <small><?php echo $oUser->nombreServicio; ?></small>
                            </div>
                        </a>
                    </div>
                </div>
            </div>



        </div>

    </div>
</div>