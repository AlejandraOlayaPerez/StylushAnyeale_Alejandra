<?php
require_once 'headpagina.php';
require_once '../controller/usuariocontroller.php';
require_once '../model/usuario.php';

$idUser = $_SESSION['idUser'];


if (isset($_GET['ventana'])) { //
    $ventana = $_GET['ventana'];
} else {
    $ventana = "informacion";
}
?>

<head>
    <link rel="stylesheet" href="/anyeale_proyecto/stylushanyeale_alejandra/assets/css/anyealecss/rol.min.css" type="text/css">
</head>

<body>
    <div class="container-fluid">

        <br>

        <div class="card tabsHeader">
            <?php
            $oUsuarioController = new usuarioController();
            $oUsuario = $oUsuarioController->consultarUsuarioId($_SESSION['idUser']);
            ?>
            <div class="m-0 row justify-content-center">
                <div class="col-md-6">
                    <div class="card card-widget widget-user">
                        <div class="widget-user-header text-white" style="background: url('../image/Fondo_Negro.jpg') center center;"></div>
                        <div class="widget-user-image">
                            <?php
                            require_once '../controller/imagencontroller.php';
                            $oImagenController = new imagenController();
                            $oFoto = $oImagenController->listarImagenPerfilUsuario($_SESSION['idUser']);

                            ?>
                            <img class="img-circle elevation-2" src="../<?php echo $oFoto->fotoPerfil; ?>" alt="User Avatar">
                        </div>
                        <div class="card-footer">
                            <div class="text-center">
                                <h1 class="profile-username text-center"><?php echo $oUsuario->primerNombre . " " . $oUsuario->primerApellido; ?></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-5 col-sm-3">
                    <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link <?php if ($ventana == "foto") echo "active"; ?>" id="vert-tabs-home-tab" data-toggle="pill" href="#vert-tabs-home" role="tab" aria-controls="vert-tabs-home" aria-selected="true" style="font-family: 'Times New Roman', Times, serif; color:black;"><i class="fas fa-images"></i> Actualizar Foto</a>
                        <a class="nav-link <?php if ($ventana == "informacion") echo "active"; ?>" id="vert-tabs-profile-tab" data-toggle="pill" href="#vert-tabs-profile" role="tab" aria-controls="vert-tabs-profile" aria-selected="false" style="font-family: 'Times New Roman', Times, serif; color:black;"><i class="fas fa-edit"></i> Actualizar Informacion</a>
                        <a class="nav-link <?php if ($ventana == "seguridad") echo "active"; ?>" id="vert-tabs-messages-tab" data-toggle="pill" href="#vert-tabs-messages" role="tab" aria-controls="vert-tabs-messages" aria-selected="false" style="font-family: 'Times New Roman', Times, serif; color:black;"><i class="fas fa-shield-alt"></i> Seguridad</a>
                        <a class="nav-link <?php if ($ventana == "roles") echo "active"; ?>" id="vert-tabs-settings-tab" data-toggle="pill" href="#vert-tabs-settings" role="tab" aria-controls="vert-tabs-settings" aria-selected="false" style="font-family: 'Times New Roman', Times, serif; color:black;"><i class="fas fa-project-diagram"></i></i> Rol</a>
                    </div>
                </div>
                <div class="col-7 col-sm-9">
                    <div class="tab-content" id="vert-tabs-tabContent">
                        <div class="tab-pane fade <?php if ($ventana == "foto") echo "active show"; ?>" id="vert-tabs-home" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
                            <?php require_once 'perfilactualizacion.php'; ?>
                        </div>
                        <div class="tab-pane fade <?php if ($ventana == "informacion") echo "active show"; ?>" id="vert-tabs-profile" role="tabpanel" aria-labelledby="vert-tabs-profile-tab">
                            <?php require_once 'informacionusuario.php'; ?>
                        </div>
                        <div class="tab-pane fade <?php if ($ventana == "seguridad") echo "active show"; ?>" id="vert-tabs-messages" role="tabpanel" aria-labelledby="vert-tabs-messages-tab">
                            <?php require_once 'seguridadusuario.php'; ?>
                        </div>
                        <div class="tab-pane fade <?php if ($ventana == "roles") echo "active show"; ?>" id="vert-tabs-settings" role="tabpanel" aria-labelledby="vert-tabs-settings-tab">
                            <?php require_once 'rolusuario.php'; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php require_once 'footer.php'; ?>