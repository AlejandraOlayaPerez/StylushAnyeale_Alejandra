function validarCampo(campo) {
  var span = document.getElementById(campo.id + "Span");
  //console.log(campo.id + "span");
  var valido = false;
  // agregar en el switch un caso por cada tipo de dato y llamar la función de validación
  switch (campo.type) {
    case "text":
      valido = validarTexto(campo, span);
      break;
    case "textarea":
      valido = validarTexto(campo, span);
      break;
    case "number":
      valido = validarNumber(campo, span);
      break;
    case "select-one":
      valido = validarSelect(campo, span);
      break;
    case "select-multiple":
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
    case "file":
      valido = validarFile(campo, span);
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
  if (campo.value < campo.min) {
    $(campo).removeClass('is-valid');
    $(campo).addClass('is-invalid');
    span.style = "color:red; font-size: 10pt";
    span.innerHTML = "Debe tener un mínimo de " + campo.min + " números";
    return false;
  }
  if (campo.value > campo.max) {
    $(campo).removeClass('is-valid');
    $(campo).addClass('is-invalid');
    span.style = "color:red; font-size: 10pt";
    span.innerHTML = "Debe tener un máximo de " + campo.max + " números";
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

function validarFile(campo, span) {
  var file = campo.files;
  if (campo.required && file.length == 0) {
    $(campo).removeClass('is-valid');
    $(campo).addClass('is-invalid');
    span.style = "color:red; font-size: 10pt";
    span.innerHTML = "Por favor, Inserte imagenes";
    return false;
  }
  if (campo.required && file.length < 4) {
    $(campo).removeClass('is-valid');
    $(campo).addClass('is-invalid');
    span.style = "color:red; font-size: 10pt";
    span.innerHTML = "Por favor, Minimo se debe insertar de 4 o 5 imagenes";
    return false;
  }
  if (campo.required && file.length > 5) {
    $(campo).removeClass('is-valid');
    $(campo).addClass('is-invalid');
    span.style = "color:red; font-size: 10pt";
    span.innerHTML = "Por favor, Solo se permite insertar de 4 a 5 imagenes";
    return false;
  }
  $(campo).removeClass('is-invalid');
  $(campo).addClass('is-valid');
  span.style = "color:green; font-size: 10pt";
  span.innerHTML = "Correcto";
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
  var campoV = campo.value;
  var espacios = false;
  var cont = 0;
  while (!espacios && (cont < campoV.length)) {
    if (campoV.charAt(cont) == " ")
      espacios = true;
    cont++;
  }
  if (espacios) {
    $(campo).removeClass('is-valid');
    $(campo).addClass('is-invalid');
    span.style = "color:red; font-size: 10pt";
    span.innerHTML = "Por favor, La contraseña no debe tener espacios";
    return false;
  }
  var mediumRegex = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
  if (!mediumRegex.test(campo.value)) {
    $(campo).removeClass('is-valid');
    $(campo).addClass('is-invalid');
    span.style = "color:red; font-size: 10pt";
    span.innerHTML = "Debe tener 1 letra mayuscula, 1 letra minuscula, 1 numero y 1 caracter especial";
    return false;
  }


  $(campo).removeClass('is-invalid');
  $(campo).addClass('is-valid');
  span.style = "color:green; font-size: 10pt";
  span.innerHTML = "Valor correcto";
  return true;
}