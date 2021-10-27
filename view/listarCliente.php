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
                    <div class="col-md-3">
                    <label for="" class="form-label">Tipo de Documento: </label>
                        <select class="form-control" id="tipoDocumento2" name="tipoDocumento" onchange="consultarCliente()">
                            <option value="" selected>Selecciones una opción</option>
                            <option value="TI">Tarjeta de Identidad</option>
                            <option value="CC">Cedula Ciudadanía</option>
                            <option value="CE">Cedula Extranjería</option>
                        </select>
                    </div>
                    <div class="col col-xl-4 col-md-6 col-12">
                        <label for="" class="form-label">Documento: </label>
                        <input type="number" class="form-control" id="documentoIdentidad2" name="documentoIdentidad" placeholder="Documento Identidad" onchange="consultarCliente()">
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

<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/eliminar.min.js"></script>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/general.min.js"></script>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/listarcliente.min.js"></script>
<?php require_once 'footer.php'; ?>