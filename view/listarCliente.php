<?php
require_once 'headPagina.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLIENTE</title>
</head>

<body>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header border-0">
                        <p class="card-title">Clientes</p>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                                <tr style="background-color: rgb(249, 201, 242);">
                                    <th>Tipo Documento</th>
                                    <th>Documento Identidad</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Correo Electronico</th>
                                    <th>Telefono</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require_once '../model/cliente.php';
                                $oCliente = new cliente();
                                $consulta = $oCliente->listarCliente();
                                if (count($consulta) > 0) {
                                    foreach ($consulta as $registro) {
                                ?>
                                        <tr style="background-color: rgba(255, 255, 204, 255);">
                                            <td><?php echo $registro['tipoDocumento']; ?></td>
                                            <td><?php echo $registro['documentoIdentidad']; ?></td>
                                            <td><?php echo $registro['primerNombre'] . " " . $registro['segundoNombre']; ?></td>
                                            <td><?php echo $registro['primerApellido'] . " " . $registro['segundoApellido']; ?></td>
                                            <td><?php echo $registro['email']; ?></td>
                                            <td><?php echo $registro['telefono']; ?></td>
                                        </tr>
                                    <?php }
                                } else { //en caso de que no tengo informacion, mostrara un mensaje
                                    ?>
                                    <!-- no hay ningun registro -->
                                    <tr>
                                        <td colspan="6" style="font-family: 'Times New Roman', Times, serif; text-align: center; font-weight: 600;">No hay Clientes disponibles</td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php
require_once 'footer.php';
?>