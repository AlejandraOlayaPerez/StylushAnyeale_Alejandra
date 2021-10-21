<?php require_once 'headreservacion.php'; ?>

<div class="row">
    <div class="col col-md-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb estilo">
                <li class="breadcrumb-item"><a href="paginaprincipalcliente.php">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tus Reservaciones</li>
            </ol>
        </nav>
    </div>
</div>
<main>
    <section class="section services-section" id="services">
       
            <div class="row">
                <div class="col-md-6">
                    <div class="section-title">
                        <h2>¡Tus Reservacion!</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                require_once '../model/reservaciones.php';
                $oReservacion = new reservacion();
                $consulta = $oReservacion->listarReservacionesPorIdCliente($_SESSION['idCliente']);
                foreach ($consulta as $registro) {
                    if ($registro['fechaReservacion'] >= $fechaActual) {
                ?>
                        <div class="col col-xl-4 col-md-6 col-12">
                            <div class="feature-box-1">
                                <div class="icon">
                                    <i class="fas fa-calendar-week"></i>
                                </div>
                                <div class="feature-content">
                                    <h1 class="card-title pricing-card-title" style="-webkit-text-fill-color: black; font-family: 'Times New Roman', Times, serif;"><small class="text-muted fw-light"><strong>Precio: $</strong><?php echo $registro['precio']; ?></small></h1> <br>
                                    <p style="-webkit-text-fill-color: black; font-family: 'Times New Roman', Times, serif;"><strong>Estilista: </strong><?php echo $registro['estilista']; ?></p>
                                    <p style="-webkit-text-fill-color: black; font-family: 'Times New Roman', Times, serif;"><strong>Fecha: </strong><?php echo $registro['fechaReservacion']; ?></p>
                                    <p style="-webkit-text-fill-color: black; font-family: 'Times New Roman', Times, serif;"><strong>Hora: </strong><?php echo $registro['horaReservacion'] . " - " . $registro['horaFinal']; ?></p>
                                    <?php if ($registro['domicilio'] == 1) {
                                    ?>
                                        <p style="-webkit-text-fill-color: black; font-family: 'Times New Roman', Times, serif;"><strong>Domicilio: </strong><?php if ($registro['domicilio']) echo "SI"; ?> </p>
                                        <p style="-webkit-text-fill-color: black; font-family: 'Times New Roman', Times, serif;"><strong>Direccion: </strong><?php echo $registro['direccion']; ?></p>
                                    <?php } else {
                                    ?>
                                        <br>
                                        <br>
                                    <?php
                                    } ?>
                                </div>
                                <br>
                                <div class="footer-content">
                                    <a href="formularioE¡editareeservacion.php?idReservacion=<?php echo $registro['idReservacion']; ?>" class="btn btn-success"> <i class="fas fa-edit"></i> Actualizar Reservacion</a>
                                    <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarFormulario" onclick="eliminarReservacion(<?php echo $registro['idReservacion']; ?>)"><i class="far fa-calendar-times"></i> Cancelar</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
    </section>



</main>
<?php require_once 'linkfooter.php'; ?>
<?php require_once 'linkjs.php'; ?>

</html>

<div class="modal fade" id="eliminarFormulario" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Label">Eliminar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>¿Esta seguro que desea eliminar la reservacion?</p>
            </div>
            <div class="modal-footer">
                <form action="../controller/reservacionController.php" method="GET">
                    <input type="text" name="idReservacion" id="eliminarReservacion" style="display: none;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger" name="funcion" value="eliminarReservacion"><i class="fas fa-trash-alt"></i> Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>