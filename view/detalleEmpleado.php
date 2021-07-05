<?php
//referenciamos archivos de la carpeta Model
require_once 'headGerente.php';
require_once '../model/empleado.php';
require_once '../model/conexionDB.php';
require_once '../controller/usuarioController.php';

$idEmpleado = $_GET['idEmpleado'];
$idCargo = $_GET['idCargo'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/estilosGerente.css" type="text/css">
    <title>Informacion Empleado</title>
</head>

<body>
    <div class="container">

        <h1 class="tituloGrande">INFORMACION DEL EMPLEADO</h1>
        <br>

        <?php
        $oUsuarioController = new usuarioController();
        $oEmpleado = $oUsuarioController->consultarEmpleadoPorId($idEmpleado);
        ?>

        <div class="row">
            <div class="col-md-6">
                <label for="" class="form-label">Tipo Documento</label>
                <input type="text" class="form-control" id="" name="tipoDocumento" value="<?php echo $oEmpleado->tipoDocumento; ?>" disabled>
            </div>

            <div class="col-md-6">
                <label for="" class="form-label">Documento identidad</label>
                <input type="text" class="form-control" id="" name="documentoIdentidad" value="<?php echo $oEmpleado->documentoIdentidad; ?>" disabled>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="" class="form-label">Nombres</label>
                <input type="text" class="form-control" id="" name="" value="<?php echo $oEmpleado->primerNombre . "" . $oEmpleado->segundoNombre; ?>" disabled>
            </div>

            <div class="col-md-6">
                <label for="" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="" name="" value="<?php echo $oEmpleado->primerApellido . "" . $oEmpleado->segundoApellido; ?>" disabled>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="" class="form-label">Fecha de Nacimiento</label>
                <input type="text" class="form-control" id="" name="" value="<?php echo $oEmpleado->fechaNacimiento ?>" disabled>
            </div>

            <div class="col-md-6">
                <label for="" class="form-label">Genero</label>
                <input type="text" class="form-control" id="" name="" value="<?php echo $oEmpleado->genero ?>" disabled>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="" class="form-label">Estado Civil</label>
                <input type="text" class="form-control" id="" name="" value="<?php echo $oEmpleado->estadoCivil ?>" disabled>
            </div>

            <!-- <div class="col-md-6">
                <label for="" class="form-label">Estado Civil</label>
                <input type="text" class="form-control" id="" name="" value="<?php echo $oEmpleado->estadoCivil ?>" disabled>
            </div> -->
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="" class="form-label">Direccion</label>
                <input type="text" class="form-control" id="" name="" value="<?php echo $oEmpleado->direccion ?>" disabled>
            </div>

            <div class="col-md-6">
                <label for="" class="form-label">Barrio</label>
                <input type="text" class="form-control" id="" name="" value="<?php echo $oEmpleado->barrio ?>" disabled>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="" class="form-label">Correo Electronico</label>
                <input type="text" class="form-control" id="" name="" value="<?php echo $oEmpleado->email ?>" disabled>
            </div>

            <div class="col-md-6">
                <label for="" class="form-label">Telefono</label>
                <input type="text" class="form-control" id="" name="" value="<?php echo $oEmpleado->telefono ?>" disabled>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="" class="form-label">Nivel Academico</label>
                <input type="text" class="form-control" id="" name="" value="<?php echo $oEmpleado->nivelEstudio ?>" disabled>
            </div>

            <div class="col-md-6">
                <label for="" class="form-label">experienciaLaboral</label>
                <input type="text" class="form-control" id="" name="" value="<?php echo $oEmpleado->experienciaLaboral ?>" disabled>
            </div>
        </div>

        <br>
        <a href="listarEmpleado.php?idCargo=<?php echo $_GET['idCargo']; ?>" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>

    </div>
</body>

</html>

<?php
require_once 'footerGerente.php';
?>