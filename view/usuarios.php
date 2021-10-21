<div class="card">
    <div class="card-header cardHeader2">
        <h4>Usuarios del rol: <?php echo $oRol->nombreRol; ?></h4>
        <div class="card-tools">
            <ul class="pagination pagination-sm contenedorUL" id="contenedorUL">

            </ul>
        </div>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table colorestabla">
            <thead>
                <tr class="estiloTr">
                    <th>Nombre_Usuario</th>
                    <th>Correo Electronico</th>
                    <th><button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-empresa"><i class="fas fa-user-plus"></i> Agregar Usuario</button></th>
                </tr>
            </thead>
            <tbody id="listarDetalleRol">

            </tbody>
        </table>
    </div>
</div>