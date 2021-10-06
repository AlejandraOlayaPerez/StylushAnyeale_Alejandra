<?php
require_once 'headPagina.php';
require_once '../model/usuario.php';
require_once '../model/conexiondb.php';

$oUsuario = new usuario();
?>

<body>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header" style="background-color: rgb(249, 201, 242); font-family:'Times New Roman', Times, serif;">
                <!--filtro-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group m-b-0">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Buscar usuario.." style="font-family:'Times New Roman', Times, serif; font-size: 20px;" data-bs-toggle="tooltip" data-bs-placement="right" title="Busca por nombre del usuario" value="" id="busquedaUsuario" onkeyup="consultarUsuario()">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group m-b-0">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                            </div>
                            <input type="number" class="form-control" placeholder="Buscar documento.." style="font-family:'Times New Roman', Times, serif; font-size: 20px;" data-bs-toggle="tooltip" data-bs-placement="right" title="Busca por documento identidad" value="" id="documento" onkeyup="consultarUsuario()">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                    <thead>
                        <tr style="background-color: rgb(249, 201, 242);">
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
    </div>
</body>

<script src="/anyeale_proyecto/stylushAnyeale_Alejandra/assets/js/filtros.js"></script>
<script>
    consultarUsuario();
</script>
<?php require_once 'footer.php'; ?>


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
                    <input type="text" name="idUser" id="eliminarUser">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" name="funcion" value="habilitarDeshabilitarUsuario" class="btn btn-danger"><i class="fas fa-user-slash"></i> Deshabilitar</button>
                </form>
            </div>
        </div>
    </div>
</div>