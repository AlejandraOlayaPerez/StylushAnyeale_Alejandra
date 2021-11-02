<!-- SUBIR UNA SOLA IMAGEN-->

<form action="../controller/imagencontroller.php" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col col-md-6">
            <label for="">Actualizar foto de perfil</label>
            <input name="archivos" type="file" class="form-control" accept="image/*">
        </div>
    </div>
<br>
    <button type="submit" class="btn btn-info" name="funcion" value="fotoPerfilUsuario">Actualizar Foto</botton>
</form>