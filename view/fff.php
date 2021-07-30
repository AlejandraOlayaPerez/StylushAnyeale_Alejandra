<?php
require_once 'headPagina.php';
require_once '../controller/usuarioController.php';

$idUser=$_GET['idUser'];

$oUsuarioController=new usuarioController();
$oUsuario=$oUsuarioController->consultarUsuarioId($idUser);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | User Profile</title>
</head>

<body class="hold-transition sidebar-mini">


  <div class="content-wrapper">
    <br>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">


            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="../image/perfilPreterminado.png" alt="">
                </div>

                <h1 class="profile-username text-center"><?php echo $oUsuario->primerNombre." ".$oUsuario->primerApellido; ?></h1>

                <p class="text-muted text-center">Software Engineer</p>
              </div>
            </div>

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Informacion Personal</h3>
              </div>

              <div class="card-body">
                <strong><i class="fas fa-info-circle"></i> Nombres: </strong>
                <p></p>

                <hr>
                <strong><i class="fas fa-at"></i> Correo Electronico: </strong>
                <p></p>

                <hr>
                <strong><i class="fas fa-phone-square"></i> Telefono: </strong>
                <p></p>

                <hr>
                <a href="detalleUsuario.php?idUser=<?php echo $registro['idUser']; ?>" class="btn btn-info"><i class="fas fa-edit"></i> Ver. Mas</a>
                <a href="formularioEditarUsuario.php?idUser=<?php echo $registro['idUser']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i> Editar</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</body>

</html>

<?php
require_once 'footer.php';
?>