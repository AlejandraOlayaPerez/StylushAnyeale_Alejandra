<?php
require_once 'headPagina.php';
require_once '../model/producto.php';
$oProducto = new producto();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NUEVO PRODUCTO</title>
</head>

<body>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-default" style="background-color: rgba(255, 255, 204, 255);">
                            <div class="card-header" style="background-color: rgb(249, 201, 242);">
                                <label class="card-title">NUEVO SERVICIO</label>
                            </div>

                            <form id="formulario" action="../controller/productoServicioController.php" method="GET">
                                <input type="text" name="funcion" value="crearProducto" style="display: none;">
                                <div class="card-body p-0">
                                    <div class="bs-stepper">
                                        <div class="bs-stepper-header" role="tablist">
                                            <div class="step" data-target="#logins-part">
                                                <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                                                    <span class="bs-stepper-circle">1</span>
                                                    <span class="bs-stepper-label">Imagen Producto</span>
                                                </button>
                                            </div>
                                            <div class="line"></div>
                                            <div class="step" data-target="#information-part">
                                                <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                                                    <span class="bs-stepper-circle">2</span>
                                                    <span class="bs-stepper-label">Producto</span>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="bs-stepper-content">

                                            <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">

                                                <div class="row" style="margin: 5px;">
                                                    <div class="col col-md-12">
                                                        <div class="col col-md-6">
                                                            <label for="">Fotos</label>
                                                            <input name="fotos[]" id="fotos" type="file" class="form-control" multiple accept="image/*">
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <button style="margin: 5px;" class="btn btn-info float-right" type="button" onclick="stepper.next();"><i class="fas fa-arrow-circle-right"></i> Siguiente</button>
                                                <a href="/Anyeale_proyecto/StylushAnyeale_Alejandra/view/listarProducto.php" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
                                                <br>
                                            </div>

                                            <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                                                <div class="card-body" style="background-color: rgba(255, 255, 204, 255);">
                                                    <div class="row" style="margin: 5px; ">
                                                        <div class="col col-xl-4 col-md-6 col-12">
                                                            <label for="" class="form-label">Codigo Producto</label>
                                                            <input class="form-control" type="text" id="codigoProducto" name="codigoProducto" placeholder="Codigo Producto" onchange="validarCampo(this);" required maxlength="20">
                                                            <span id="codigoProductoSpan"></span>
                                                        </div>
                                                        <div class="col col-xl-4 col-md-6 col-12">
                                                            <label for="" class="form-label">Producto</label>
                                                            <input class="form-control" type="text" id="nombreProducto" name="nombreProducto" placeholder="Nombre Producto" onchange="validarCampo(this);" required maxlength="50" minlength="2">
                                                            <span id="nombreProductoSpan"></span>
                                                        </div>
                                                        <div class="col col-xl-4 col-md-6 col-12">
                                                            <label for="" class="form-label">Recomendaciones</label> 
                                                            <textarea class="form-control" rows="3" type="text" id="recomendaciones" name="Recomendaciones" placeholder="Recomendaciones" onchange="validarCampo(this);" required minlength="10" maxlength="500"></textarea>
                                                            <span id="recomendacionesSpan"></span>
                                                        </div>
                                                        <div class="col col-xl-4 col-md-6 col-12">
                                                            <label for="" class="form-label">Valor Unitario</label>
                                                            <input class="form-control" type="text" id="valorUnitario" name="valorUnitario" placeholder="Valor Unitario" onchange="validarCampo(this);" required>
                                                            <span id="valorUnitarioSpan"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <button style="margin: 5px;" class="btn btn-info" type="button" onclick="stepper.previous()"><i class="fas fa-arrow-circle-left"></i> Anterior</button>
                                                <button type="button" class="btn btn-success" onclick="validarPaginaFinal();"><i class="far fa-save"></i> Registrar Producto</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php
require_once 'footer.php';
?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    })
</script>

<script>
  
  function validarPaginaFinal() {
    // evento.preventDefault();
    var valido = true;
    // agregar el id de cada campo de la página para poder validar
    var campos = ["codigoProducto", "nombreProducto", "recomendaciones", "valorUnitario"];
    campos.forEach(element => {
      var campo = document.getElementById(element);
      if (!validarCampo(campo))
        valido = false;
    });
    if (valido)
      document.getElementById('formulario').submit();
  }

  function validarCampo(campo) {
    var span = document.getElementById(campo.id + "Span");
    //console.log(campo.id + "span");
    var valido = false;
    // agregar en el switch un caso por cada tipo de dato y llamar la función de validación
    switch (campo.type) {
      case "text":
        valido = validarTexto(campo, span);
        break;
      case "number":
        valido = validarNumber(campo, span);
        break;
      case "select-one":
        valido = validarSelect(campo, span);
        break;
      case "date":
        valido = validarDate(campo, span);
        break;
      case "email":
        valido = validarEmail(campo, span);
        break;
      case "password":
        valido = validarPassword(campo, span);
        break;
    }
    return valido;
  }
  //crear una función por cada tipo de dato, ya que cada tipo tiene sus validaciones correspondientes
  function validarTexto(campo, span) {
    if (campo.required && campo.value == "") {
      $(campo).removeClass('is-valid');
      $(campo).addClass('is-invalid');
      span.style = "color:red; font-size: 10pt";
      span.innerHTML = "Por favor, Complete el campo vacio";
      return false;
    }
    if (campo.value != "" && campo.value.length < campo.minLength) {
      $(campo).removeClass('is-valid');
      $(campo).addClass('is-invalid');
      span.style = "color:red; font-size: 10pt";
      span.innerHTML = "Longitud mínima " + campo.minLength;
      return false;
    }
    $(campo).removeClass('is-invalid');
    $(campo).addClass('is-valid');
    span.style = "color:green; font-size: 10pt";
    span.innerHTML = "Valor correcto";
    return true;
  }

  function validarNumber(campo, span) {
    if (campo.required && campo.value == "") {
      $(campo).removeClass('is-valid');
      $(campo).addClass('is-invalid');
      span.style = "color:red; font-size: 10pt";
      span.innerHTML = "Por favor, complete el campo vacio";
      return false;
    }
    if (campo.value.length < campo.minLength) {
      $(campo).removeClass('is-valid');
      $(campo).addClass('is-invalid');
      span.style = "color:red; font-size: 10pt";
      span.innerHTML = "Debe tener un minimo de " + campo.minLength + " numeros";
      return false;
    }
    $(campo).removeClass('is-invalid');
    $(campo).addClass('is-valid');
    span.style = "color:green; font-size: 10pt";
    span.innerHTML = "El campo es valido";
    return true;
  }

  function validarSelect(campo, span) {
    if (campo.required && campo.value == "") {
      $(campo).removeClass('is-valid');
      $(campo).addClass('is-invalid');
      span.style = "color:red; font-size: 10pt";
      span.innerHTML = "Por favor, seleccione unas de las opciones";
      return false;
    }
    $(campo).removeClass('is-invalid');
    $(campo).addClass('is-valid');
    span.style = "color:green; font-size: 10pt";
    span.innerHTML = "Valor correcto";
    return true;
  }

  function validarDate(campo, span) {
    if (campo.required && campo.value == "") {
      $(campo).removeClass('is-valid');
      $(campo).addClass('is-invalid');
      span.style = "color:red; font-size: 10pt";
      span.innerHTML = "Por favor, Seleccione su fecha de nacimiento";
      return false;
    }
    $(campo).removeClass('is-invalid');
    $(campo).addClass('is-valid');
    span.style = "color:green; font-size: 10pt";
    span.innerHTML = "Valor correcto";
    return true;
  }

  function validarEmail(campo, span) {
    if (campo.required && campo.value == "") {
      $(campo).removeClass('is-valid');
      $(campo).addClass('is-invalid');
      span.style = "color:red; font-size: 10pt";
      span.innerHTML = "Por favor, Complete el campo vacio";
      return false;
    }
    emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    if (!emailRegex.test(campo.value)) {
      $(campo).removeClass('is-valid');
      $(campo).addClass('is-invalid');
      span.style = "color:red; font-size: 10pt";
      span.innerHTML = "Por favor, Ingrese un correo electronico valido, ejemplo: example@email.com";
      return false;
    }
    $(campo).removeClass('is-invalid');
    $(campo).addClass('is-valid');
    span.style = "color:green; font-size: 10pt";
    span.innerHTML = "Valor correcto";
    return true;
  }

  function validarPassword(campo, span) {
    if (campo.required && campo.value == "") {
      $(campo).removeClass('is-valid');
      $(campo).addClass('is-invalid');
      span.style = "color:red; font-size: 10pt";
      span.innerHTML = "Por favor, Complete el campo vacio";
      return false;
    }
    if (campo.value.length < campo.minLength) {
      $(campo).removeClass('is-valid');
      $(campo).addClass('is-invalid');
      span.style = "color:red; font-size: 10pt";
      span.innerHTML = "Debe tener un minimo de " + campo.minLength + " caracteres";
      return false;
    }
    var campoV= campo.value;
    var espacios = false;
    var cont = 0;
    while (!espacios && (cont < campoV.length)) {
      if (campoV.charAt(cont) == " ")
        espacios = true;
      cont++;
    }
    if(espacios) {
      $(campo).removeClass('is-valid');
      $(campo).addClass('is-invalid');
      span.style = "color:red; font-size: 10pt";
      span.innerHTML = "Por favor, La contraseña no debe tener espacios";
      return false;
    }

    $(campo).removeClass('is-invalid');
    $(campo).addClass('is-valid');
    span.style = "color:green; font-size: 10pt";
    span.innerHTML = "Valor correcto";
    return true;
  }
</script>