<?php
require 'headGerente.php';
require_once '../model/conexionDB.php';
require_once '../model/usuario.php';
?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/estilosGerente.css" type="text/css">
    <title>NUEVO USUARIO</title>
</head>

<body>
    <div class="container">
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="background-color: rgb(119, 167, 191);">
                        <div class="card-header">
                            <h1 class="card-title" style=" font-family: 'Times New Roman', Times, serif; font-size: 30px; font-weight: 600;">NUEVO USUARIO</h1>
                        </div>
                        <form id="quickForm" action="../controller/usuarioController.php" method="POST">

                            <div class="row">
                                <div class="form-group">
                                    <label for="">Usuario_Nombre</label>
                                    <input class="form-control" type="text" name="nombreUser" placeholder="Usuario_Nombre" requied minlength="5" maxlength="30">
                                </div>
                                <div class="form-group">
                                    <label for="">Correo electronico</label>
                                    <input class="form-control" type="email" name="correoElectronico" placeholder="Correo Electronico" minlength="15" maxlength="50">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label for="">Contraseña</label>
                                    <input class="form-control" type="password" name="contrasena" placeholder="Contraseña" minlength="5" maxlength="30">
                                </div>
                                <div class="form-group">
                                    <label for="">Confirmar contraseña</label>
                                    <input class="form-control" type="password" name="confirmarContrasena" placeholder="Confirmar Contraseña" minlength="5" maxlength="30">
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-success" name="funcion" value="registro">Registrar usuario</button>
                            <a href="home/paginaPrincipalGerente.php?ventana=usuario" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>

<?php
require_once 'footerGerente.php';
?>

<script>
    $(function() {
        $.validator.setDefaults({
            submitHandler: function() {
                alert("Formulacion enviado de forma correcta");
            }
        });
        $('#quickForm').validate({
            rules: {
                nombreUser: {
                    required: true,
                    nombreUser: true,
                },
                correoElectronico: {
                    required: true,
                    correoElectronico: true,
                },
                contrasena: {
                    required: true,
                    contrasena: true
                },
                confirmarContrasena: {
                    required: true,
                    confirmarContrasena: true
                },
            },
            messages: {
                nombreUser: {
                    required: "Ingrese el nombre del Usuario",
                },
                correoElectronico: {
                    required: "Ingrese el correo electronico",
                    correoElectronico: "Ingrese un correo electronico valido"
                },
                contrasena: {
                    required: "Dijite la contraseña",
                },
                confirmarContrasena: {
                    required: "Dijite la confirmacion de contraseña",
                },
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>