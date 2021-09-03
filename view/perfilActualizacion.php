<!-- SUBIR UNA SOLA IMAGEN-->

<div class="card card-primary">
    <form action="../controller/imagenController.php" method="POST" enctype="multipart/form-data">
        <div class="card-body" style="background-color: rgba(255, 255, 204, 255);">
            <div class="row">
                <div class="col col-md-6">
                    <label for="">Actualizar foto de perfil</label>
                    <input name="archivos" type="file" class="form-control" accept="image/*">
                </div>
            </div>
        </div>
        <div class="card-footer" style="background-color: rgba(255, 255, 204, 255);">
            <button type="submit" class="btn btn-info" name="funcion" value="fotoPerfilUsuario">Actualizar Foto</botton>
        </div>
    </form>
</div>