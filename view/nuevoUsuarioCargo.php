<?php
require 'headGerente.php';
require_once '../model/conexionDB.php';
require_once '../model/usuario.php';

$idCargo = $_GET['idCargo'];


?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/estilosGerente.css" type="text/css">
    <title>NUEVO USUARIO EN CARGO</title>
</head>

<body>
    <div class="container">
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="background-color: rgb(119, 167, 191);">
                        <div class="card-header">
                            <h1 class="card-title" style=" font-family: 'Times New Roman', Times, serif; font-size: 30px; font-weight: 600;">NUEVO USUARIO EN ESTE CARGO</h1>
                        </div>
                        <form action="../controller/cargoController.php" method="GET">
                        <input name="idCargo" value="<?php echo $idCargo; ?>" style="display:none">
                            <?php
                            require_once '../model/usuario.php';
                            $oUsuario = new usuario();
                            $result = $oUsuario->mostrarUsuario();
                            ?>
                            <div class="row" style="margin: 5px;">
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="">Nombre Usuario</label>
                                    <select select class="form-select" name="idUser" id="" required>
                                        <option value="" disabled selected>Selecciones una opción</option>
                                        <?php foreach ($result as $registro) {
                                        ?>
                                            <option value="<?php echo $registro['idUser']; ?>"><?php echo $registro['primerNombre'] . " " . $registro['primerApellido']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success" name="funcion" value="actualizarCargoEnEmpleado"> <i class="far fa-save"></i>Registrar usuario</button>
                            <a href="mostrarUsuarioCargo.php?idCargo=<?php echo $_GET['idCargo']; ?>" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>

<?php
require_once 'footerGerente.php';
?>