//definir antes de cargar la funcion
var pagina = 1;
var numPagina = 0;
//Carga la funcion
cargarJS();
//Cargar archivos al momemto de carga la pagina.
function cargarJS() {
    cosultarModulo();
}

function cosultarModulo() {

    $.ajax({
        url: '../controller/gestioncontroller.php',
        type: 'GET',
        data: {
            pagina: pagina,
            funcion: "buscarModulo"
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

        var modulo = JSON.parse(datos[1]);
        var contenedor = document.getElementById("listarModulo");
        contenedor.innerHTML = "";
        for (i = 0; i < modulo.length; i++) {
            agregarModulo(modulo[i]);
        }
        if (modulo.length == 0) {
            crearTr(2, "listarModulo");
        }
    })
}

function agregarModulo(modulo){
    var tr = document.createElement("tr");
    tr.id = modulo['idModulo'];

    var td1 = document.createElement("td");
    td1.innerHTML = modulo['nombreModulo'];
    var td2 = document.createElement("td");

    var botonEditar = document.createElement("a");
    botonEditar.href = "formularioeditarmodulo.php?idModulo=" + modulo['idModulo'];
    botonEditar.style.margin = "2px";
    botonEditar.className = "btn btn-warning";
    botonEditar.innerHTML = '<i class="fas fa-edit"></i> Editar';

    var botonEliminar = document.createElement("a");
    botonEliminar.className = "btn btn-danger";
    botonEliminar.style.margin = "2px";
    botonEliminar.setAttribute("data-bs-toggle", "modal");
    botonEliminar.setAttribute("data-bs-target", "#eliminarFormulario3");
    botonEliminar.value = modulo['idModulo'];
    botonEliminar.addEventListener('click', function () {
        eliminarModulo(this);
    });
    botonEliminar.innerHTML = '<i class="fas fa-trash-alt"></i> Eliminar';

    var botonDetalle = document.createElement("a");
    botonDetalle.style.margin = "2px";
    botonDetalle.href = "listarPagina.php?idModulo=" + modulo['idModulo'];
    botonDetalle.className = "btn btn-info";
    botonDetalle.innerHTML = '<i class="fas fa-file"></i> Ver. Pagina';

    td2.appendChild(botonEditar);
    td2.appendChild(botonEliminar);
    td2.appendChild(botonDetalle);

    tr.appendChild(td1);
    tr.appendChild(td2);

    var contenedor = document.getElementById("listarModulo");
    contenedor.appendChild(tr);
}

function modificarPagina(campo) {
    if (campo == "-" && pagina > 1) {
        pagina -= 1;
    } else if (campo == "+" && pagina < numPagina) {
        pagina += 1;
    }
    cosultarModulo();
}