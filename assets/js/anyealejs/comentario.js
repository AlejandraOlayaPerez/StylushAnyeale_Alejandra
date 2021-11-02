cargarJS()

function cargarJS() {
    listarComentario();
}

function listarComentario() {
    var idProducto = document.getElementById("idProducto").value;
    var idCliente = document.getElementById("idCliente").value;

    $.ajax({
        url: '../controller/clientecontroller.php',
        type: 'GET',
        data: {
            idProducto: idProducto,
            idCliente: idCliente,
            funcion: "ajaxComentario"
        }
    }).done(function (data) {
        // console.log(data);
        var datos = JSON.parse(data);
        var contenedor = document.getElementById("comentario");
        contenedor.innerHTML = "";
        for (i = 0; i < datos.length; i++) {
            comentario(datos[i]);
        }
        if (datos.length == 0) {
            crearComentario("comentario");
        }
    })
}

function comentario(datos) {

    var inputPregunta = document.createElement("input");
    inputPregunta.id = "idPregunta";
    inputPregunta.value = datos['idPregunta'];
    inputPregunta.style = "display: none";

    var message = document.createElement("div");
    message.id = "pregunta" + datos['idPregunta'];
    message.className = "chat-message left";

    var img = document.createElement("img");
    img.className = "message-avatar";
    img.src = "../" + datos['perfilCliente'];

    var mensaje = document.createElement("div");
    mensaje.className = "message";

    var nombre = document.createElement("a");
    nombre.className = "message-author";
    nombre.innerHTML = datos['primerNombre'] + datos['primerApellido'];

    var spanDate = document.createElement("span");
    spanDate.className = "message-date";
    spanDate.innerHTML = datos['fechaComentario'] + "-" + datos['horaComentario'];

    var spanMensaje = document.createElement("span");
    spanMensaje.className = "message-content";
    spanMensaje.innerHTML = datos['pregunta'];

    var spanResponder = document.createElement("a");
    spanResponder.className = "message-date";
    spanResponder.innerHTML = "Responder";
    spanResponder.value = "pregunta" + datos['idPregunta'];
    spanResponder.addEventListener('click', function () {
        responderComentario(this);
    });
    // spanResponder.href="";

    mensaje.appendChild(nombre);
    mensaje.appendChild(spanDate);
    mensaje.appendChild(spanMensaje);

    message.appendChild(img);
    message.appendChild(mensaje);
    message.appendChild(spanResponder);
    message.appendChild(inputPregunta);

    var contenedor = document.getElementById("comentario");
    contenedor.appendChild(message);
}

function responderComentario(idPregunta) {
    var pregunta = document.getElementById(idPregunta.value);
    idPregunta.style = "display: none";
    var row = document.createElement("div");
    row.className = "row";

    var colMd = document.createElement("div");
    colMd.className = "col-md-12";

    var form = document.createElement("form");
    form.action = "../controller/clientecontroller.php";
    form.method = "GET";

    var idProducto = document.getElementById("idProducto").value;
    var input1 = document.createElement("input");
    input1.type = "text";
    input1.name = "idProducto";
    input1.value = idProducto;
    input1.style = "display: none";

    var idCliente = document.getElementById("idCliente").value;
    var input2 = document.createElement("input");
    input2.type = "text";
    input2.name = "idCliente";
    input2.value = idCliente;
    input2.style = "display: none";

    var idCategoria = document.getElementById("idCategoria").value;
    var input4 = document.createElement("input");
    input4.type = "text";
    input4.name = "idCategoria";
    input4.value = idCategoria;
    input4.style = "display: none";

    var idComentario = document.getElementById("idPregunta").value;
    var input3 = document.createElement("input");
    input3.type = "text";
    input3.name = "idPregunta";
    input3.value = idComentario;
    input3.style = "display: none";

    var textarea = document.createElement("textarea");
    textarea.id = "summernote";
    textarea.style.margin = "5px";
    textarea.setAttribute("style", "margin-left: 100px; width: 555px");
    textarea.className = "form-control";
    textarea.type = "text";
    textarea.name = "respuesta";

    var boton = document.createElement("button");
    boton.type = "submit";
    boton.className = "btn btn-info float-right";
    boton.style.margin = "5px";
    boton.name = "funcion";
    boton.value = "respuestaPregunta";
    boton.innerHTML = "Enviar"


    form.appendChild(textarea);
    form.appendChild(input1);
    form.appendChild(input2);
    form.appendChild(input3);
    form.appendChild(input4);
    form.appendChild(boton);
    colMd.appendChild(form);
    row.appendChild(colMd)
    pregunta.appendChild(row);
}