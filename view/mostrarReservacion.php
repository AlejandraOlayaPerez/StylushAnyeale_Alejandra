<?php
require_once 'headpagina.php';
require_once '../model/reservaciones.php';
require_once '../model/conexionDB.php';
?>

<body>
    <div class="container-fluid">

        <div class="card">
            <div class="card-header border-0">
                <form id="formLimpiar" action="" method="GET">
                    <div class="row">
                        <div class="col-md-3">
                            <label style="font-family:'Times New Roman', Times, serif; font-size: 20px; font-weight: 600;"> Fecha Inicio: </label>
                            <input type="date" class="form-control datetimepicker-input" style="font-family:'Times New Roman', Times, serif; font-size: 20px;" id="fecha" onchange="mostrarReservacion()">

                            <label style="font-family:'Times New Roman', Times, serif; font-size: 20px; font-weight: 600;"> Fecha Final: </label>
                            <input type="date" class="form-control datetimepicker-input" style="font-family:'Times New Roman', Times, serif; font-size: 20px;" id="fechaFinal" onchange="mostrarReservacion()">
                        </div>
                        <div class="col-md-3">
                            <label style="font-family:'Times New Roman', Times, serif; font-size: 20px; font-weight: 600;"> Reservacion por Domicilio: </label>
                            <select class="form-select" id="domicilio" name="cancelado" onchange="mostrarReservacion()">
                                <option value="" disabled selected>Selecciones una opción</option>
                                <option value="1">Reservacion con domicilio</option>
                                <option value="0">Reservacion sin domicilio</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="button" class="btn btn-info" value="Limpiar Filtros" onclick="limpiarFiltroReservacion()">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                    <thead>
                        <tr style="background-color: rgb(249, 201, 242);">
                            <th>Cliente</th>
                            <th>Servicio</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Domicilio</th>
                            <th>Direccion</th>
                            <th>¿Reservacion realizada?</th>
                            <th>¿Reservacion cancelada?</th>
                            <th><button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-empresa" onclick="cliente();"><i class="fas fa-user-plus"></i> Crear reservacion</button></th>
                        </tr>
                    </thead>
                    <tbody id="listarReservacion">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>

<?php require_once 'footer.php'; ?>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/eliminar.min.js"></script>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/general.min.js"></script>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/mostrarreservacion.js"></script>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/nuevaReservacion.min.js"></script>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/limpiarFormFiltros.min.js"></script>



<div class="modal fade" id="eliminarFormulario" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header estiloModalHeader">
                <h5 class="modal-title" id="Label">Validar Reservacion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body estiloModalBody">
                <p>¿La reservacion ya fue realizada?</p>
            </div>
            <div class="modal-footer estiloModalBody">
                <form action="../controller/reservacionController.php" method="GET">
                    <input type="text" name="idReservacion" id="validarReservacion" style="display: none;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success" name="funcion" value="validarReservacion"><i class="fas fa-check-circle"></i> Reservacion relizada</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="cancelarReservacion" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header estiloModalHeader">
                <h5 class="modal-title" id="Label">Cancelar Reservacion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body estiloModalBody">
                <p>¿Desea cancelar la reservacion?</p>
            </div>
            <div class="modal-footer estiloModalBody">
                <form action="../controller/reservacionController.php" method="GET">
                    <input type="text" name="idReservacion" id="reservacion" style="display:none;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success" name="funcion" value="cancelarReservacion"><i class="fas fa-trash-alt"></i> Cancelar Reservacion</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-empresa">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header estiloModalHeader">
                <h4 class="modal-title">Seleccione Cliente</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body estiloModalBody">
                <div class="card estiloModalBody">
                    <div class="card-header">
                        <label for="" class="form-label">Buscar: </label>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group m-b-0">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-search"></i></span>
                                    </div>
                                    <select class="form-control" id="tipoDocumento2" name="tipoDocumento" onchange="cliente()">
                                        <option value="" selected>Selecciones una opción</option>
                                        <option value="TI">Tarjeta de Identidad</option>
                                        <option value="CC">Cedula Ciudadanía</option>
                                        <option value="CE">Cedula Extranjería</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group m-b-0">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-search"></i></span>
                                    </div>
                                    <input type="number" class="form-control" id="documentoIdentidad2" placeholder="Busca por documento" name="documentoIdentidad" onchange="cliente()">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="card-body table-responsive p-0">
                        <table class="table colorestabla">
                            <thead>
                                <tr class="estiloTr">
                                    <th></th>
                                    <th>Tipo Documento</th>
                                    <th>Documento</th>
                                    <th>Nombres</th>
                                </tr>
                            </thead>
                            <tbody id="cliente">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>