<?php
require_once 'headpagina.php';
require_once '../model/rol.php';
require_once '../controller/gestioncontroller.php';;

$idRol = $_GET['idRol'];

$oGestionController = new gestionController();
$listarDeUsuarioDiferente = $oGestionController->usuarioDiferenteEnRol($idRol);
?>

<body>

  <div class="container-fluid">
    <div class="card card-primary">
      <div class="card-header">
        <label class="card-title" style="-webkit-text-fill-color: black;">NUEVO USUARIO</label>
      </div>
      <form action="../controller/gestionController.php" method="GET" id="formUsuario">
        <div class="card-body">
          <div class="row">
            <div class="col col-xl-4 col-md-6 col-12">
              <label for="">Empleados: </label>
              <input name="idRol" value="<?php echo $idRol; ?>" style="display:none">
              <select class="form-select" name="idUser">
                <option value="" disabled selected>Selecciones una opción</option>
                <?php foreach ($listarDeUsuarioDiferente as $registro) {
                ?>
                  <option value="<?php echo $registro['idUser']; ?>"><?php echo $registro['primerNombre'] . " " . $registro['primerApellido']; ?></option>
                <?php
                }
                ?>
              </select>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <a href="listarDetalleRol.php?idRol=<?php echo $idRol; ?>" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
          <button type="submit" class="btn btn-success" name="funcion" value="registrarUsuarioEnRol"><i class="far fa-save"></i> Registrar Usuario</button>
        </div>
      </form>
    </div>
  </div>
</body>

</html>

<?php require_once 'footer.php'; ?>
<?php require_once 'linkjs.php'; ?>
