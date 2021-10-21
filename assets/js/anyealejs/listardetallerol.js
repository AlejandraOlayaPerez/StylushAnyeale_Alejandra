//definir antes de cargar la funcion

var numPagina = 0;
var paginap = 1;
//Carga la funcion
cargarJS();
//Cargar archivos al momemto de carga la pagina.
function cargarJS() {
    consultarDetalleRol();
}

function consultarDetalleRol() {
    var idRol = document.getElementById("idRol").value;
    $.ajax({
        url: '../controller/gestioncontroller.php',
        type: 'GET',
        data: {
            idRol: idRol,
            pagina: paginap,
            funcion: "buscarUsuarioRol"
        }
    }).done(function (data) {
        // console.log(data);
        var datos = data.split("®");
        //paginacion
        var numRegistro = parseInt(datos[0]);
        numPagina = parseInt(numRegistro / 10);
        if (numRegistro % 10 > 0) numPagina++;

        var contenedorUL = document.getElementById("contenedorUL");
        contenedorUL.innerHTML = "";

        var li1 = document.createElement("li");
        li1.className = "page-item";
        var a1 = document.createElement("button");
        a1.className = "page-link";
        a1.value = "-";
        a1.style.fontFamily = "Times New Roman', Times, serif";
        a1.addEventListener('click', function () {
            modificarPagina(this.value);
        });
        a1.innerHTML = "&laquo;";
        li1.appendChild(a1);
        contenedorUL.appendChild(li1);

        var span = document.createElement("span");
        span.style.fontFamily = "Times New Roman', Times, serif";
        span.style.letterSpacing = "3px";
        span.innerHTML = " " + paginap + "/" + numPagina + " ";

        contenedorUL.appendChild(span);

        var li3 = document.createElement("li");
        li3.className = "page-item";
        var a3 = document.createElement("button");
        a3.className = "page-link";
        a3.style.fontFamily = "Times New Roman', Times, serif";
        a3.value = "+";
        a3.addEventListener('click', function () {
            modificarPagina(this.value);
        });
        a3.innerHTML = "&raquo;";

        li3.appendChild(a3);
        contenedorUL.appendChild(li3);

        var rol = JSON.parse(datos[1]);
        var contenedor = document.getElementById("listarDetalleRol");
        contenedor.innerHTML = "";
        for (i = 0; i < rol.length; i++) {
            agregarDetalleRol(rol[i]);
        }
        if (rol.length == 0) {
            crearTr(3, "listarDetalleRol");
        }
    })
}

function agregarDetalleRol(rol) {
    var tr = document.createElement("tr");

    var td1 = document.createElement("td");
    td1.innerHTML = rol['primerNombre']+" "+rol['primerApellido'];
    var td2 = document.createElement("td");
    td2.innerHTML = rol['correoElectronico'];
    var td3 = document.createElement("td");

    var botonEliminar = document.createElement("a");
    botonEliminar.className = "btn btn-danger";
    botonEliminar.style.margin = "2px";
    botonEliminar.setAttribute("data-bs-toggle", "modal");
    botonEliminar.setAttribute("data-bs-target", "#eliminarFormulario");
    botonEliminar.value = rol['idUser'];
    botonEliminar.addEventListener('click', function () {
        eliminarUsuarioRol(this);
    });
    botonEliminar.innerHTML = '<i class="fas fa-trash-alt"></i> Eliminar';

    td3.appendChild(botonEliminar);

    tr.appendChild(td1);
    tr.appendChild(td2);
    tr.appendChild(td3);

    var contenedor = document.getElementById("listarDetalleRol");
    contenedor.appendChild(tr);
}

function modificarPagina(campo) {
    if (campo == "-" && paginap > 1) {
        paginap -= 1;
    } else if (campo == "+" && paginap < numPagina) {
        paginap += 1;
    }
    consultarDetalleRol();
}