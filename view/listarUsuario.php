<?php require_once 'headpagina.php'; ?>

<body>
    <div class="container-fluid">
        <div class="card cardHeader">
            <div class="card-header">
                <form id="formLimpiar" action="" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group m-b-0">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-search"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Buscar usuario.." data-bs-toggle="tooltip" data-bs-placement="right" title="Busca por nombre del usuario" value="" id="busquedaUsuario" onkeyup="consultarUsuario()">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group m-b-0">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-search"></i></span>
                                </div>
                                <input type="number" class="form-control" placeholder="Buscar documento.." data-bs-toggle="tooltip" data-bs-placement="right" title="Busca por el documento identidad" value="" id="documento" onchange="consultarUsuario()">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="button" class="btn btn-info" value="Borrar Filtro" onclick="limpiarFiltroReservacion()">
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-tools">
                            <ul class="pagination pagination-sm contenedorUL" id="contenedorUL">

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body table-responsive p-0">
                <table class="table colorestabla" style="padding: 15px;">
                    <thead>
                        <tr class="estiloTr">
                            <th>Tipo Documento</th>
                            <th>Documento</th>
                            <th>Nombre y apellido</th>
                            <th>CorreoElectronico</th>
                            <th>Rol</th>
                            <th>Habilitado</th>
                            <th><a class="btn btn-info" href="nuevoUsuario.php"><i class="fas fa-user-plus"></i> Registrar Usuario</a></th>
                        </tr>
                    </thead>
                    <tbody id="usuario">

                    </tbody>
                </table>
            </div>
        </div>
        <br>
    </div>
</body>

<?php require_once 'linkfooter.php'; ?>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/eliminar.min.js"></script>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/general.min.js"></script>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/listarUsuario.min.js"></script>


<div class="modal fade" id="eliminarFormulario" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Label">Deshabilitar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>¿Esta seguro que desea Deshabilitar el usuario?</p>
            </div>
            <div class="modal-footer">
                <form action="../controller/usuarioController.php" method="GET">
                    <input type="text" name="idUser" id="eliminarUser" style="display: none;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <input type="text" name="habilitar" value="false" style="display: none;">
                    <button type="submit" name="funcion" value="habilitarDeshabilitarUsuario" class="btn btn-danger"><i class="fas fa-user-slash"></i> Deshabilitar</button>
                </form>
            </div>
        </div>
    </div>
</div>