<?php
require_once 'headpagina.php';
require_once '../model/cliente.php';

$oCliente = new cliente();
?>

<body>
    <div class="container-fluid">

        <div class="card border">
            <div class="card-header">
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
<?php require_once 'linkjs.php'; ?>