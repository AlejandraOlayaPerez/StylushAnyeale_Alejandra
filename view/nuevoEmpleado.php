<?php
require_once 'headGerente.php';
require_once '../model/empleado.php';
require_once '../model/conexionDB.php';

$oEmpleado = new empleado();
$idCargo = $_GET['idCargo'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/estilosGerente.css" type="text/css">
    <title>Nuevo Empleado</title>
</head>

<body>
    <div class="container">
        <section class="content">
            <div class="row">
                <div class="col-md-6">
                    <div class="card" style="background-color: rgb(119, 167, 191);">
                        <div class="card-header">
                            <h1 class="card-title" style=" font-family: 'Times New Roman', Times, serif; font-size: 30px; font-weight: 600;">NUEVO EMPLEADO</h1>
                        </div>
                        <form id="quickForm" action="../controller/usuarioController.php" method="GET">
                            <input type="text" name="idCargo" value="<?php echo $idCargo; ?>" style="display:none;">

                            <div class="row">
                                <div class="form-group">
                                    <label for="" class="form-label">Tipo de Documento</label>
                                    <select class="form-select" id="" name="tipoDocumento" required>
                                        <option value="" disabled selected>Selecciones una opción</option>
                                        <option value="TI" <?php if ($oEmpleado->tipoDocumento == "TI") {echo "selected";} ?>>Tarjeta de Identidad</option>
                                        <option value="CC" <?php if ($oEmpleado->tipoDocumento == "CC") {echo "selected";} ?>>Cedula Ciudadanía</option>
                                        <option value="CE" <?php if ($oEmpleado->tipoDocumento == "CE") {echo "selected";} ?>>Cedula Extranjería</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="" class="form-label">Documento Identidad</label>
                                    <input type="number" class="form-control" id="" name="documentoIdentidad" placeholder="Documento de identidad" value="<?php echo $oEmpleado->documentoIdentidad; ?>" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <label for="" class="form-label">Primer Nombre</label>
                                    <input type="text" class="form-control" id="" name="primerNombre" placeholder="Primer Nombre" value="<?php echo $oEmpleado->primerNombre; ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="" class="form-label">Segundo Nombre</label>
                                    <input type="text" class="form-control" id="" name="segundoNombre" placeholder="Segundo Nombre" value="<?php echo $oEmpleado->segundoNombre; ?>" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <label for="" class="form-label">Primer Apellido</label>
                                    <input type="text" class="form-control" id="" name="primerApellido" placeholder="Primer Apellido" value="<?php echo $oEmpleado->primerApellido; ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="" class="form-label">Segundo apellido</label>
                                    <input type="text" class="form-control" id="" name="segundoApellido" placeholder="Segundo Apellido" value="<?php echo $oEmpleado->segundoApellido; ?>" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <label for="" class="form-label">Fecha de Nacimiento</label>
                                    <input type="date" class="form-control" id="" name="fechaNacimiento" value="<?php echo $oEmpleado->fechaNacimiento; ?>" required>
                                </div>

                                <div class="form-group">
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
                                <div class="form-group">
                                    <label for="" class="form-label">Direccion</label>
                                    <input type="text" class="form-control" id="" name="direccion" placeholder="Direccion" value="<?php echo $oEmpleado->direccion; ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="" class="form-label">Barrio</label>
                                    <input type="text" class="form-control" id="" name="barrio" placeholder="Barrio" value="<?php echo $oEmpleado->barrio; ?>" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <label for="" class="form-label">Correo Electronico</label>
                                    <input type="email" class="form-control" id="" name="email" placeholder="name@example.com" value="<?php echo $oEmpleado->email; ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="" class="form-label">Telefono</label>
                                    <input type="number" class="form-control" id="" name="telefono" placeholder="Telefono" value="<?php echo $oEmpleado->telefono; ?>" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <label for="" class="form-label">Hoja de vida</label>
                                    <select class="form-select" id=""  name="hojaDeVida" required>
                                        <option value="" disabled selected>Selecciones una opción</option>
                                        <option value="SI" <?php if($oEmpleado->hojaDeVida=="SI"){ echo "selected";} ?> >SI</option>
                                        <option value="NO" <?php if($oEmpleado->hojaDeVida=="NO"){ echo "selected";} ?> >NO</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="formFile" class="form-label">Adjunto Hoja de vida</label>
                                    <input class="form-control" type="file" id="formFile" name="hojaVidaDocumento">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <label for="" class="form-label">Nivel de Estudio</label>
                                    <select class="form-select" id="" name="nivelEstudio" required>
                                        <option value="" disabled selected>Selecciones una opción</option>
                                        <option value="bachillerato" <?php if ($oEmpleado->nivelEstudio == "bachillerato") {echo "selected";} ?>>Bachillerato</option>
                                        <option value="tecnico" <?php if ($oEmpleado->nivelEstudio == "tecnico") {echo "selected";} ?>>Tecnico</option>
                                        <option value="tecnologo" <?php if ($oEmpleado->nivelEstudio == "tecnologo") {echo "selected";} ?>>Tecnologo</option>
                                        <option value="profesional" <?php if ($oEmpleado->nivelEstudio == "profesional") {echo "selected";} ?>>Profesional</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="" class="form-label">Experiencia laboral</label>
                                    <select class="form-select" id="" name="experienciaLaboral" required>
                                        <option value="" disabled selected>Selecciones una opción</option>
                                        <option value="Menos de un 1 año" <?php if ($oEmpleado->experienciaLaboral == "Menos de un 1 año") {echo "selected";} ?>>Menos de un 1 año</option>
                                        <option value="Menos de 2 años" <?php if ($oEmpleado->experienciaLaboral == "Menos de 2 años") {echo "selected";} ?>>Menos de 2 años</option>
                                        <option value="Mas de 2 años" <?php if ($oEmpleado->experienciaLaboral == "Mas de 2 años") {echo "selected";} ?>>Mas de 2 años</option>
                                        <option value="5 años" <?php if ($oEmpleado->experienciaLaboral == "5 años") {echo "selected";} ?>>5 años </option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                            <div class="form-group">
                                    <label for="" class="form-label">Estado Civil</label>
                                    <select class="form-select" id="" name="estadoCivil" required>
                                        <option value="" disabled selected>Selecciones una opción</option>
                                        <option value="Soltero" <?php if ($oEmpleado->estadoCivil == "Soltero") {echo "selected";} ?>>Soltero</option>
                                        <option value="Casado" <?php if ($oEmpleado->estadoCivil == "Casado") {echo "selected";} ?>>Casado</option>
                                        <option value="Divorciado" <?php if ($oEmpleado->estadoCivil == "Divorciado") {echo "selected";} ?>>Divorciado</option>
                                        <option value="Viudo" <?php if ($oEmpleado->estadoCivil == "Viudo") {echo "selected";} ?>>viudo</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-success" name="funcion" value="nuevoEmpleado"><i class="far fa-save"></i> Guardar</button>
                            <a href="listarEmpleado.php?idCargo=<?php echo $_GET['idCargo']; ?>" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>


                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                  
                </div>
            </div>
        </section>
    </div>
</body>

</html>

<?php
require_once 'footerGerente.php';
?>

<script>
    $(function() {
        $.validator.setDefaults({
            submitHandler: function() {
                alert("Formulario enviado de forma correcta");
            }
        });
        $('#quickForm').validate({
            rules: {
                tipoDocumento: {
                    required: true,
                    tipoDocumento: true,
                },
                documentoIdentidad: {
                    required: true,
                    documentoIdentidad: true,
                },
                primerNombre: {
                    required: true,
                    primerNombre: true
                },
                segundoNombre: {
                    required: true,
                    segundoNombre: true
                },
                primerApellido: {
                    required: true,
                    segundoNombre: true
                },
                segundoApellido: {
                    required: true,
                    segundoNombre: true
                },
                fechaNacimiento: {
                    required: true,
                    segundoNombre: true
                },
                genero: {
                    required: true,
                    genero: true
                },
                direccion: {
                    required: true,
                    direccion: true
                },
                barrio: {
                    required: true,
                    barrio: true
                },
                email: {
                    required: true,
                    email: true
                },
                telefono: {
                    required: true,
                    telefono: true
                },
                hojaDeVida: {
                    required: true,
                    hojaDeVida: true
                },
                hojaVidaDocumento: {
                    required: true,
                    hojaVidaDocumento: true
                },
                experienciaLaboral: {
                    required: true,
                    experienciaLaboral: true
                },
                nivelEstudio: {
                    required: true,
                    nivelEstudio: true
                },
                estadoCivil: {
                    required: true,
                    estadoCivil: true
                }
            },
            messages: {
                tipoDocumento: {
                    required: "Ingrese el Tipo de Documento correctamente",
                },
                documentoIdentidad: {
                    required: "Ingrese el documento de identidad",
                },
                primerNombre: {
                    required: "Ingrese el primer nombre",
                },
                segundoNombre: {
                    required: "Ingrese el segundo nombre",
                },
                primerApellido: {
                    required: "Ingrese el primer apellido",
                },
                segundoApellido: {
                    required: "Ingrese el segundo apellido",
                },
                fechaNacimiento: {
                    required: "Ingrese la fecha de nacimiento",
                },
                genero: {
                    required: "Ingrese el genero",
                },
                direccion: {
                    required: "Ingrese la direccion",
                },
                barrio: {
                    required: "Ingrese el barrio",
                },
                email: {
                    required: "Ingrese un corro valido",
                },
                telefono: {
                    required: "Ingrese un numero de telefono valido",
                },
                hojaDeVida: {
                    required: "Ingrese si el empleado tiene hoja de vida",
                },
                hojaVidaDocumento: {
                    required: "Ingrese el documento de la hoja de vida",
                },
                experienciaLaboral: {
                    required: "Ingrese cuanta experiencia laboral tiene el empleado",
                },
                nivelEstudio: {
                    required: "Ingrese el nivel de estudio del empleado",
                },
                estadoCivil: {
                    required: "Ingrese el estado civil del empleado",
                },
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>