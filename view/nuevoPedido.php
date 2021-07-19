<?php
require 'headGerente.php';
require_once '../model/conexionDB.php';
require_once '../model/pedido.php';
require_once '../model/producto.php';
?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/estilosGerente.css" type="text/css">
    <script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/js/permisoHabilitar.js"></script>
    <title>NUEVO PEDIDO</title>
</head>

<body>
    <div class="container">
        <section class="content">
            <div class="row">
                <div class="col-md-6">
                    <div class="card" style="background-color: rgb(119, 167, 191);">
                        <div class="card-header">
                            <h1 class="card-title" style=" font-family: 'Times New Roman', Times, serif; font-size: 30px; font-weight: 600;">NUEVO PEDIDO</h1>
                        </div>
                        <form id="quickForm" action="../controller/usuarioController.php" method="GET">

                            <div class="row">
                                <div class="form-group">
                                    <label for="">Documento Identidad</label>
                                    <input class="form-control" type="number" name="documentoIdentidad" placeholder="Documento Identidad">
                                </div>
                                <div class="form-group">
                                    <label for="">Responsable del pedido</label>
                                    <input class="form-control" type="text" name="responsablePedido" placeholder="Responsable Pedido">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label for="">Empresa</label>
                                    <input class="form-control" type="text" name="empresa" placeholder="Empresa">
                                </div>
                                <div class="form-group">
                                    <label for="">Direccion</label>
                                    <input class="form-control" type="text" name="direccion" placeholder="Direccion">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label for="">Fecha Pedido</label>
                                    <input class="form-control" type="date" name="fechaPedido" placeholder="Fecha Pedido">
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-success" name="funcion" value="nuevoPedido"><i class="far fa-save"></i> Guardar</button>
                            <a href="listarPedido.php" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    
                </div>
            </div>
        </section>
    </div>
</body>

</html>

<?php
require_once 'footerGerente.php';
?>

<!-- <script>
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
</script> -->