<?php
require 'headGerente.php';
require_once '../model/pagina.php';
require_once '../model/conexionDB.php';
require_once '../model/modulo.php';

$idModulo = $_GET['idModulo'];

?>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/estilosGerente.css" type="text/css">
    <script src="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/js/eliminar.js"></script>
    <title>PAGINAS</title>
</head>

<body>
    <div class="container">
        <?php
        require_once '../controller/mensajeController.php';

        if (isset($_GET['mensaje'])) {
            $oMensaje = new mensajes();
            echo $oMensaje->mensaje($_GET['tipoMensaje'], $_GET['mensaje']);
        }
        ?>

        <?php
        require_once '../controller/gestionController.php';
        $oUsuarioController = new usuarioController();
        $oModulo = $oUsuarioController->consultarModuloId($idModulo);
        ?>

        <div class="row">
            <div class="col">
                <h1 class="tituloGrande">Modulo: </h1>
                <input class="form-control" type="text" value="<?php echo $oModulo->nombreModulo; ?> " disabled>
            </div>
        </div>

        <br>

        <div class="col-md-12" style="background-color: rgb(249, 201, 242);">
            <div class="card">
                <div class="card-header" style="background-color: rgb(249, 201, 242);">
                    <h3 class="card-title" style="font-family:'Times New Roman', Times, serif; font-size: 20px; font-weight: 600;">Paginas</h1>
                </div>
                <div class="card-body p-0" style="background-color: rgb(119, 167, 191);">
                    <table class="table" style="font-family:'Times New Roman', Times, serif; font-size: 20px;">
                        <thead>
                            <tr style="background-color: rgb(249, 201, 242);">
                                <th>Nombre_Pagina</th>
                                <th>Enlace</th>
                                <th>¿Se requiere inicio de sesion?</th>
                                <th><a class="btn btn-info" href="nuevaPagina.php?idModulo=<?php echo $_GET['idModulo']; ?>"><i class="fas fa-plus-square"></i> Nuevo Pagina</a></th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            require_once '../model/pagina.php';
                            require_once '../model/conexionDB.php';
                            $oPagina = new Pagina();
                            $oPagina->idModulo = $_GET['idModulo'];
                            $consulta = $oPagina->listarPagina();
                            foreach ($consulta as $registro) {
                            ?>
                                <tr>
                                    <input type="text" name="idPagina" value="<?php echo $oPagina->idPagina; ?>" style="display:none;">
                                    <td><?php echo $registro['nombrePagina']; ?></td>
                                    <td><?php echo $registro['enlace']; ?></td>
                                    <td><?php if ($registro['requireSession']) echo "SI";
                                        else echo "NO"; ?></td>
                                    <td>
                                        <a href="formularioEditarPagina.php?idPagina=<?php echo $registro['idPagina']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i> Editar</a>
                                        <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarFormulario" onclick="eliminarPagina(<?php echo $registro['idPagina']; ?>, <?php echo $registro['idModulo']; ?>)"><i class="fas fa-trash-alt"></i> Eliminar</a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <a href="home/paginaPrincipalGerente.php?ventana=modulo" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
    </div>
</body>

</html>

<?php
require_once 'footerGerente.php';
?>

<div class="modal fade" id="eliminarFormulario" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Label">Eliminar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>¿Esta seguro que desea eliminar la pagina?</p>
            </div>
            <div class="modal-footer">
                <form action="../controller/gestionController.php" method="GET">
                    <input type="text" name="idPagina" id="eliminarModulo" style="display:none;">
                    <input type="text" name="idModulo" id="eliminarPagina" style="display:none;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger" name="funcion" value="eliminarPagina"><i class="fas fa-trash-alt"></i> Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>