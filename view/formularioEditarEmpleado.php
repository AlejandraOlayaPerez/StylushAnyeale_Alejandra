<?php
//referenciamos archivos de la carpeta Model
require_once 'headGerente.php';
require_once '../model/empleado.php';
require_once '../model/conexionDB.php';
require_once '../controller/usuarioController.php';

$oUsuarioController = new usuarioController();
$oEmpleado = $oUsuarioController->consultarEmpleadoPorId($_GET['idEmpleado']);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/estilosGerente.css" type="text/css">
    <title>EDITAR EMPLEADO</title>
</head>

<body>
    <div class="container">

        <h1 class="tituloGrande">EDITAR EMPLEADO</h1>
        <br>

        <form action="../controller/usuarioController.php" method="GET">
            <input type="text" name="idEmpleado" value="<?php echo $_GET['idEmpleado']; ?>" style="display: none;">
            <input type="text" name="idCargo" value="<?php echo $oEmpleado->idCargo; ?>" style="display: none;">
            <div class="row">
                <div class="col-md-6">
                    <label for="" class="form-label">Tipo de Documento</label>
                    <select class="form-select" id="" name="tipoDocumento" required>
                        <option value="" disabled selected>Selecciones una opción</option>
                        <option value="TI" <?php if ($oEmpleado->tipoDocumento == "TI") {echo "selected";} ?>>Tarjeta de Identidad</option>
                        <option value="CC" <?php if ($oEmpleado->tipoDocumento == "CC") {echo "selected";} ?>>Cedula Ciudadanía</option>
                        <option value="CE" <?php if ($oEmpleado->tipoDocumento == "CE") {echo "selected";} ?>>Cedula Extranjería</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="" class="form-label">Documento Identidad</label>
                    <input type="number" class="form-control" id="" name="documentoIdentidad" placeholder="Documento de identidad" value="<?php echo $oEmpleado->documentoIdentidad; ?>" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="" class="form-label">Primer Nombre</label>
                    <input type="text" class="form-control" id="" name="primerNombre" placeholder="Primer Nombre" value="<?php echo $oEmpleado->primerNombre; ?>" required>
                </div>

                <div class="col-md-6">
                    <label for="" class="form-label">Segundo Nombre</label>
                    <input type="text" class="form-control" id="" name="segundoNombre" placeholder="Segundo Nombre" value="<?php echo $oEmpleado->segundoNombre; ?>" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="" class="form-label">Primer Apellido</label>
                    <input type="text" class="form-control" id="" name="primerApellido" placeholder="Primer Apellido" value="<?php echo $oEmpleado->primerApellido; ?>" required>
                </div>

                <div class="col-md-6">
                    <label for="" class="form-label">Segundo apellido</label>
                    <input type="text" class="form-control" id="" name="segundoApellido" placeholder="Segundo Apellido" value="<?php echo $oEmpleado->segundoApellido; ?>" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="" class="form-label">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" id="" name="fechaNacimiento" value="<?php echo $oEmpleado->fechaNacimiento; ?>" required>
                </div>

                <div class="col-md-6">
                    <label for="" class="form-label">Genero</label>
                    <select class="form-select" id="" name="genero" required>
                        <option value="" disabled selected>Selecciones una opción</option>
                        <option value="Femenino" <?php if ($oEmpleado->genero == "Femenino") {echo "selected";} ?>>Femenino</option>
                        <option value="Masculino" <?php if ($oEmpleado->genero == "Masculino") {echo "selected";} ?>>Masculino</option>
                    <option value="Otro" <?php if ($oEmpleado->genero == "Otro") {echo "selected";} ?>>Otro</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="" class="form-label">Direccion</label>
                    <input type="text" class="form-control" id="" name="direccion" placeholder="Direccion" value="<?php echo $oEmpleado->direccion; ?>" required>
                </div>

                <div class="col-md-6">
                    <label for="" class="form-label">Barrio</label>
                    <input type="text" class="form-control" id="" name="barrio" placeholder="Barrio" value="<?php echo $oEmpleado->barrio; ?>" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="" class="form-label">Correo Electronico</label>
                    <input type="text" class="form-control" id="" name="email" placeholder="Correo Electronico" value="<?php echo $oEmpleado->email; ?>" required>
                </div>

                <div class="col-md-6">
                    <label for="" class="form-label">Telefono</label>
                    <input type="number" class="form-control" id="" name="telefono" placeholder="Telefono" value="<?php echo $oEmpleado->telefono; ?>" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="" class="form-label">Hoja de vida</label>
                    <select class="form-select" id=""  name="hojaDeVida" required>
                        <option value="" disabled selected>Selecciones una opción</option>
                        <option value="SI" <?php if($oEmpleado->nivelEstudio=="SI"){ echo "selected";} ?> >SI</option>
                        <option value="NO" <?php if($oEmpleado->nivelEstudio=="NO"){ echo "selected";} ?> >NO</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="formFile" class="form-label">Adjunto Hoja de vida</label>
                    <input class="form-control" type="file" id="formFile" name="hojaVidaDocumento">
                </div>
            </div>


            <div class="row">
                <div class="col-md-6">
                    <label for="" class="form-label">Nivel de Estudio</label>
                    <select class="form-select" id="" name="nivelEstudio" required>
                        <option value="" disabled selected>Selecciones una opción</option>
                        <option value="bachillerato" <?php if ($oEmpleado->nivelEstudio == "bachillerato") {echo "selected";} ?>>Bachillerato</option>
                        <option value="tecnico" <?php if ($oEmpleado->nivelEstudio == "tecnico") {echo "selected";} ?>>Tecnico</option>
                        <option value="tecnologo" <?php if ($oEmpleado->nivelEstudio == "tecnologo") { echo "selected";} ?>>Tecnologo</option>
                        <option value="profesional" <?php if ($oEmpleado->nivelEstudio == "profesional") {echo "selected";} ?>>Profesional</option>
                    </select>
                </div>

                div class="col-md-6">
            <label for="" class="form-label">Experiencia laboral</label>
            <select class="form-select" id=""  name="experienciaLaboral" required>
                <option value="" disabled selected>Selecciones una opción</option>
                <option value="Menos de un 1 año" <?php if($oEmpleado->estadoCivil=="Menos de un 1 año" ){ echo "selected";} ?> >Menos de un 1 año</option>
                <option value="Menos de 2 años" <?php if($oEmpleado->estadoCivil=="Menos de 2 años"){ echo "selected";} ?> >Menos de 2 años</option>
                <option value="Mas de 2 años" <?php if($oEmpleado->estadoCivil=="Mas de 2 años"){ echo "selected";} ?> >Mas de 2 años</option>
                <option value="5 años" <?php if($oEmpleado->estadoCivil=="5 años"){ echo "selected";} ?> >5 años </option>
            </select>
        </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="" class="form-label">Estado Civil</label>
                    <select class="form-select" id="" name="estadoCivil" required>
                        <option value="" disabled selected>Selecciones una opción</option>
                        <option value="soltero" <?php if ($oEmpleado->estadoCivil == "soltero") {echo "selected";} ?>>Soltero</option>
                        <option value="casado" <?php if ($oEmpleado->estadoCivil == "casado") {echo "selected";} ?>>Casado</option>
                        <option value="divorciado" <?php if ($oEmpleado->estadoCivil == "divorciado") {echo "selected";} ?>>Divorciado</option>
                        <option value="viudo" <?php if ($oEmpleado->estadoCivil == "viudo") {echo "selected";} ?>>viudo</option>
                    </select>
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-success" name="funcion" value="actualizarEmpleado"><i class="far fa-save"></i> Guardar</button>
            <a href="listarEmpleado.php?idCargo=<?php echo $oEmpleado->idCargo; ?>" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
        </form>

    </div>
</body>

</html>

<?php
require_once 'footerGerente.php';
?>