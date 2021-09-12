<?php
require_once 'headPagina.php';
require_once '../model/cliente.php';

$oCliente = new cliente();
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
    <div class="container-fluid">

        <?php
        require_once '../controller/mensajeController.php';

        if (isset($_GET['mensaje'])) {
            $oMensaje = new mensajes();
            echo $oMensaje->mensaje($_GET['tipoMensaje'], $_GET['mensaje']);
        }
        ?>

        <?php
        /*Isset si al variable page esta definida y su valor es difeente a nulo, si es nulo,
                el valor preterminado sera 1*/
        if (isset($_GET['page'])) $pagina = $_GET['page'];
        else $pagina = 1;

        $consulta = $oCliente->listarCliente($pagina);
        $numeroRegistro = $oCliente->numRegistro;
        $numPagina = intval($numeroRegistro / 10); //intval, traera el resultado en Entero en caso de que sea decimal
        if (fmod($numeroRegistro, 10) > 0) $numPagina++; //fmod es el modulo, para conocer el residuo
        // echo $numPagina;
        ?>

        <div class="card border border-dark">
            <div class="card-header" style="background-color: rgb(249, 201, 242); font-family:'Times New Roman', Times, serif; -webkit-text-fill-color: black;">
                <div class="row">
                    <div class="col col-xl-4 col-md-6 col-12">
                        <label for="" class="form-label">Tipo de Documento: </label>
                        <select class="form-control" id="tipoDocumento2" name="tipoDocumento" onchange="buscarCliente()">
                            <option value="" selected>Selecciones una opción</option>
                            <option value="TI">Tarjeta de Identidad</option>
                            <option value="CC">Cedula Ciudadanía</option>
                            <option value="CE">Cedula Extranjería</option>
                        </select>
                    </div>
                    <div class="col col-xl-4 col-md-6 col-12">
                        <label for="" class="form-label">Documento: </label>
                        <input type="number" class="form-control" id="documentoIdentidad2" name="documentoIdentidad" placeholder="Documento Identidad" onchange="buscarCliente()">
                    </div>
                </div>
                <!--Paginacion-->
                <div class="card-tools">
                    <ul class="pagination pagination-sm float-right border border-dark">
                        <li class="page-item"><a class="page-link" style="font-family:'Times New Roman', Times, serif; -webkit-text-fill-color: black;" href="listarCliente.php?page=1">&laquo;</a></li>
                        <?php
                        for ($i = 1; $i <= $numPagina; $i++) {
                        ?>
                            <li class="page-item"><a class="page-link" style="font-family:'Times New Roman', Times, serif; -webkit-text-fill-color: black;" href="listarCliente.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                        <?php
                        }
                        ?>
                        <li class="page-item"><a class="page-link" style="font-family:'Times New Roman', Times, serif; -webkit-text-fill-color: black;" href="listarCliente.php?page=<?php echo $numPagina; ?>">&raquo;</a></li>
                    </ul>
                </div>
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
                    <tbody id="listarCliente">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
<script>
    buscarCliente()
</script>
<?php require_once 'footer.php'; ?>