<?php

require 'headGerente.php';
require_once '../model/conexionDB.php';
require_once '../model/usuario.php';
?>

<html>

<head>
<link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/estilosGerente.css" type="text/css">
</head>

<body>
    <div class="container">

        <H1 class="tituloGrande">NUEVO USUARIO</H1>
        <form action="../controller/usuarioController.php" method="POST">
            <div class="row">
                <div class="col col-6">
                    <label for="">Usuario_Nombre</label>
                    <input class="form-control" type="text" name="nombreUser" placeholder="Usuario_Nombre" requied minlength="5" maxlength="30">
                </div>
                <div class="col col-6">
                    <label for="">Correo electronico</label>
                    <input class="form-control" type="email" name="correoElectronico" placeholder="Correo Electronico" requied minlength="15" maxlength="50">
                </div>
            </div>
            <div class="row">
                <div class="col col-6">
                    <label for="">Contraseña</label>
                    <input class="form-control" type="password" name="contrasena" placeholder="Contraseña" requied minlength="5" maxlength="30">
                </div>
                <div class="col col-6">
                    <label for="">Confirmar contraseña</label>
                    <input class="form-control" type="password" name="confirmarContrasena" placeholder="Confirmar Contraseña" requied minlength="5" maxlength="30">
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-success" name="funcion" value="registro">Registrar usuario</button>
            <a href="home/paginaPrincipalGerente.php?ventana=usuario" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
        </form>
    </div>
</body>

</html>

<?php
require_once 'footerGerente.php';
?>