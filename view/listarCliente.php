<?php
require_once 'headpagina.php';
require_once '../model/cliente.php';

$oCliente = new cliente();
?>

<body>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header cardHeader">
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group m-b-0">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                            </div>
                            <select class="form-control" id="tipoDocumento2" name="tipoDocumento" onchange="consultarCliente()">
                                <option value="" selected>Selecciones una opción</option>
                                <option value="TI">Tarjeta de Identidad</option>
                                <option value="CC">Cedula Ciudadanía</option>
                                <option value="CE">Cedula Extranjería</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group m-b-0">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                            </div>
                            <input type="number" class="form-control" placeholder="Buscar por documento identidad.." data-bs-toggle="tooltip" data-bs-placement="right" title="Busca el documento del cliente" id="documentoIdentidad2" name="documentoIdentidad" placeholder="Documento Identidad" onkeyup="consultarCliente()">
                        </div>
                    </div>
                </div>
                <br>
                <div class="card-tools">
                    <ul class="pagination pagination-sm contenedorUL" id="contenedorUL">

                    </ul>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body table-responsive p-0">
                <table class="table colorestabla">
                    <thead>
                        <tr class="estiloTr">
                            <th>Tipo Documento</th>
                            <th>Documento Identidad</th>
                            <th>Nombres</th>
                            <th>Correo Electronico</th>
                            <th>Telefono</th>
                            <th></th>
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

<?php require_once 'linkfooter.php'; ?>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/eliminar.min.js"></script>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/general.min.js"></script>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/listarcliente.min.js"></script>
