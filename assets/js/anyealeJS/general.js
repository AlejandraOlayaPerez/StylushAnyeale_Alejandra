function crearTr(columnas, idContenedor) {
    var tr = document.createElement("tr");
    tr.id = "trVacio";
    var td = document.createElement("td");
    td.colSpan = columnas;
    td.style = "font-family: 'Times New Roman', Times, serif; text-align: center; font-weight: 600;"
    td.innerHTML = "No hay informacion que mostrar, agrege informacion nueva";

    tr.appendChild(td);
    var contenedor = document.getElementById(idContenedor);
    contenedor.appendChild(tr);
}

function crearComentario(idContenedor) {
    var inputPregunta = document.createElement("input");
    inputPregunta.style = "display: none";

    var message = document.createElement("div");
    message.className = "chat-message left";

    var mensaje = document.createElement("div");
    mensaje.className = "message";

    var nombre = document.createElement("a");
    nombre.className = "message-author";
    nombre.innerHTML = "No hay mensajes que mostrar, se el primero en comentar";

    var spanDate = document.createElement("span");
    spanDate.className = "message-date";

    var spanMensaje = document.createElement("span");
    spanMensaje.className = "message-content";

    mensaje.appendChild(nombre);
    mensaje.appendChild(spanDate);
    mensaje.appendChild(spanMensaje);

    message.appendChild(mensaje);

    var contenedor = document.getElementById(idContenedor);
    contenedor.appendChild(message);
}

function crearTrReserva(columnas, idContenedor) {
    var tabla = document.getElementById("tablaReservacion");
    tabla.style = "";
    var tr = document.createElement("tr");
    tr.id = "trVacio";
    var td = document.createElement("td");
    td.colSpan = columnas;
    td.style = "font-family: 'Times New Roman', Times, serif; text-align: center; font-weight: 600;"
    td.innerHTML = "No hay informacion que mostrar, agrege informacion nueva";

    tr.appendChild(td);
    var contenedor = document.getElementById(idContenedor);
    contenedor.appendChild(tr);
}

function trEliminar(idContenedor) {
    var contenedor = document.getElementById(idContenedor);
    var trVacio = document.getElementById("trVacio");

    if (trVacio != null) {
        contenedor.removeChild(trVacio);
    }

}

function cardCrear() {

}

function separadorMilesCuadroTexto(valorUnitario) {


    // valorUnitario.addEventListener('keyup', (e) => {
    var entrada = valorUnitario.value.split('.').join('');
    entrada = entrada.split('').reverse();

    var salida = [];
    var aux = '';

    var paginador = Math.ceil(entrada.length / 3);

    for (let i = 0; i < paginador; i++) {
        for (let j = 0; j < 3; j++) {

            if (entrada[j + (i * 3)] != undefined) {
                aux += entrada[j + (i * 3)];
            }
        }
        salida.push(aux);
        aux = '';

        valorUnitario.value = salida.join('.').split("").reverse().join('');
    }
    // }, false);
}

function separadorMiles(entrada) {

    var entrada = entrada.split('.');
    var centavo = entrada[1];
    entrada = entrada[0];
    entrada = entrada.split('').reverse();
    var salida = [];
    var aux = '';
    var paginador = Math.ceil(entrada.length / 3);

    for (let i = 0; i < paginador; i++) {
        for (let j = 0; j < 3; j++) {

            if (entrada[j + (i * 3)] != undefined) {
                aux += entrada[j + (i * 3)];
            }
        }
        salida.push(aux);
        aux = '';
    }
    return salida.join('.').split("").reverse().join('') + "," + centavo;
}

function separadorMilesDetalle(campo, entrada, valores) {
    for (var j = 0; j < valores; j++) {
        var entrada = entrada.split('.');
        var centavo = entrada[1];
        entrada = entrada[0];
        entrada = entrada.split('').reverse();
        var salida = [];
        var aux = '';
        var paginador = Math.ceil(entrada.length / 3);

        for (let i = 0; i < paginador; i++) {
            for (let j = 0; j < 3; j++) {

                if (entrada[j + (i * 3)] != undefined) {
                    aux += entrada[j + (i * 3)];
                }
            }
            salida.push(aux);
            aux = '';
        }
        return salida.join('.').split("").reverse().join('') + "," + centavo;
    }
}

function separadorMilesPrecio(campo, entrada) {
    var entrada = entrada.split('.');
    entrada = entrada[0];
    entrada = entrada.split('').reverse();
    var salida = [];
    var aux = '';
    var paginador = Math.ceil(entrada.length / 3);

    for (let i = 0; i < paginador; i++) {
        for (let j = 0; j < 3; j++) {

            if (entrada[j + (i * 3)] != undefined) {
                aux += entrada[j + (i * 3)];
            }
        }
        salida.push(aux);
        aux = '';
    }
    campo.innerHTML = "$" + salida.join('.').split("").reverse().join('');
}

function separadorMilesValor(campo, entrada) {
    var entrada = entrada.split('.');
    var centavo = entrada[1];
    entrada = entrada[0];
    entrada = entrada.split('').reverse();
    var salida = [];
    var aux = '';
    var paginador = Math.ceil(entrada.length / 3);

    for (let i = 0; i < paginador; i++) {
        for (let j = 0; j < 3; j++) {

            if (entrada[j + (i * 3)] != undefined) {
                aux += entrada[j + (i * 3)];
            }
        }
        salida.push(aux);
        aux = '';
    }
    campo.value = salida.join('.').split("").reverse().join('') + "," + centavo;
}

function separadorMilesValor2(campo, entrada) {
    var entrada = entrada.split('.');
    var centavo = entrada[1];
    entrada = entrada[0];
    entrada = entrada.split('').reverse();
    var salida = [];
    var aux = '';
    var paginador = Math.ceil(entrada.length / 3);

    for (let i = 0; i < paginador; i++) {
        for (let j = 0; j < 3; j++) {

            if (entrada[j + (i * 3)] != undefined) {
                aux += entrada[j + (i * 3)];
            }
        }
        salida.push(aux);
        aux = '';
    }
    campo.value = salida.join('.').split("").reverse().join('') + "," + centavo;
}