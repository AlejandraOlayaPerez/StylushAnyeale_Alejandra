//definir antes de cargar la funcion
var pagina = 1;
var numPagina = 0;
//Carga la funcion
cargarJS();
//Cargar archivos al momemto de carga la pagina.
function cargarJS() {
    consultarUsuario();
}

function consultarUsuario() {
    var busquedaUsuario = document.getElementById("busquedaUsuario").value;
    var documento = document.getElementById("documento").value;

    $.ajax({
        url: '../controller/usuariocontroller.php',
        type: 'GET',
        data: {
            busquedaUsuario: busquedaUsuario,
            documento: documento,
            pagina: pagina,
            funcion: "buscarUsariosAjax"
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
        span.innerHTML = " " + pagina + "/" + numPagina + " ";

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

        var user = JSON.parse(datos[1]);
        var contenedor = document.getElementById("usuario");
        contenedor.innerHTML = "";
        for (i = 0; i < user.length; i++) {
            usuario(user[i]);
        }
        if (user.length == 0) {
            crearTr(7, "usuario");
        }
    })
}

function usuario(user) {
    var tr = document.createElement("tr");
    tr.id = user['idUser'];

    var tdTipo = document.createElement("td");
    tdTipo.innerHTML = user['tipoDocumento'];
    var tdDocumento = document.createElement("td");
    tdDocumento.innerHTML = user['documentoIdentidad'];
    var tdNombre = document.createElement("td");
    tdNombre.innerHTML = user['primerNombre'] + " " + user['primerApellido'];
    var tdCorreo = document.createElement("td");
    tdCorreo.innerHTML = user['correoElectronico'];
    var tdRol = document.createElement("td");
    if (user['Rol'] == null) {
        tdRol.innerHTML = "Sin Rol";
    } else {
        tdRol.innerHTML = user['Rol'];
    }

    var tdHabilitado = document.createElement("td");
    if (user['habilitar'] == 1) {
        tdHabilitado.innerHTML = "SI"
    } else {
        tdHabilitado.innerHTML = "NO"
    };
    var tdBoton = document.createElement("td");
    var botonDeshabilitar = document.createElement("a");
    botonDeshabilitar.className = "btn btn-danger";
    botonDeshabilitar.setAttribute("data-bs-toggle", "modal");
    botonDeshabilitar.setAttribute("data-bs-target", "#eliminarFormulario");
    botonDeshabilitar.value = user['idUser'];
    botonDeshabilitar.addEventListener('click', function () {
        eliminarUsuario(this);
    });
    botonDeshabilitar.innerHTML = '<i class="fas fa-user-slash"></i> Deshabilitar';

    var botonHabilitar = document.createElement("a");
    botonHabilitar.href = "../controller/usuariocontroller.php?funcion=habilitarDeshabilitarUsuario&habilitar=true&idUser=" + user['idUser'];
    botonHabilitar.className = "btn btn-info";
    botonHabilitar.innerHTML = '<i class="far fa-user"></i> Habilitar';

    if (user['habilitar'] == 0) {
        tdBoton.appendChild(botonHabilitar);
    } else {
        tdBoton.appendChild(botonDeshabilitar);
    }

    tr.appendChild(tdTipo);
    tr.appendChild(tdDocumento);
    tr.appendChild(tdNombre);
    tr.appendChild(tdCorreo);
    tr.appendChild(tdRol);
    tr.appendChild(tdHabilitado);
    tr.appendChild(tdBoton);
    var contenedor = document.getElementById("usuario");
    contenedor.appendChild(tr);
}

function modificarPagina(campo) {
    if (campo == "-" && pagina > 1) {
        pagina -= 1;
    } else if (campo == "+" && pagina < numPagina) {
        pagina += 1;
    }
    consultarUsuario();
}