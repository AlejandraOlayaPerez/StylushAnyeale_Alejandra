<?php
require_once 'headPagina.php';
require_once '../model/modulo.php';
require_once '../controller/gestionController.php';
require_once '../model/pagina.php';

$idModulo = $_GET['idModulo'];
$oPagina = new Pagina();
$oPagina->idModulo = $_GET['idModulo'];

$oModulo = new modulo();

$oGestionController = new gestionController();
$oModulo = $oGestionController->consultarModuloId($_GET['idModulo']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>PAGINA</title>
</head>

<body>
    <div class="content-wrapper">
        <div class="content-header">
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

                $consulta = $oPagina->listarPagina($pagina);
                $numeroRegistro = $oPagina->numRegistro;
                $numPagina = intval($numeroRegistro / 10); //intval, traera el resultado en Entero en caso de que sea decimal
                if (fmod($numeroRegistro, 10) > 0) $numPagina++; //fmod es el modulo, para conocer el residuo
                // echo $numPagina;
                ?>

                <div class="card border border-dark">
                    <div class="card-header" style="background-color: rgb(249, 201, 242); font-family:'Times New Roman', Times, serif; -webkit-text-fill-color: black;">
                        <label class="card-title">Paginas en el modulo: <?php echo $oModulo->nombreModulo; ?> </label>
                        <!--Paginacion-->
                        <div class="card-tools">
                            <ul class="pagination pagination-sm float-right border border-dark">
                                <li class="page-item"><a class="page-link" style="font-family:'Times New Roman', Times, serif; -webkit-text-fill-color: black;" href="listarPagina.php?page=1&idModulo=<?php echo $_GET['idModulo']; ?>">&laquo;</a></li>
                                <?php
                                for ($i = 1; $i <= $numPagina; $i++) {
                                ?>
                                    <li class="page-item"><a class="page-link" style="font-family:'Times New Roman', Times, serif; -webkit-text-fill-color: black;" href="listarPagina.php?page=<?php echo $i; ?>&idModulo=<?php echo $_GET['idModulo']; ?>"><?php echo $i; ?></a></li>
                                <?php
                                }
                                ?>
                                <li class="page-item"><a class="page-link" style="font-family:'Times New Roman', Times, serif; -webkit-text-fill-color: black;" href="listarPagina.php?page=<?php echo $numPagina; ?>&idModulo=<?php echo $_GET['idModulo']; ?>">&raquo;</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-valign-middle">
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
                                if (count($consulta) > 0) {
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
                                    <?php }
                                } else { //en caso de que no tengo informacion, mostrara un mensaje
                                    ?>
                                    <!-- no hay ningun registro -->
                                    <tr>
                                        <td colspan="2" style="font-family: 'Times New Roman', Times, serif; text-align: center; font-weight: 600;">No hay paginas disponibles</td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <a href="listarModulo.php?idModulo=<?php echo $_GET['idModulo']; ?>" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
            </div>
        </div>
    </div>
</body>

</html>

<?php
require_once 'footer.php';
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
                    <input type="text" name="idPagina" id="eliminarPagina" style="display:none;">
                    <input type="text" name="idModulo" id="eliminarModulo" style="display:none;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger" name="funcion" value="eliminarPagina"><i class="fas fa-trash-alt"></i> Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>