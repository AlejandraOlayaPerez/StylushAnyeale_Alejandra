//definir antes de cargar la funcion

var numPagina = 0;
var paginap = 1;
//Carga la funcion
cargarJS();
//Cargar archivos al momemto de carga la pagina.
function cargarJS() {
    consultarPagina();
}

function consultarPagina() {
    var idModulo = document.getElementById("idModulo").value;
    $.ajax({
        url: '../controller/gestioncontroller.php',
        type: 'GET',
        data: {
            idModulo: idModulo,
            pagina: paginap,
            funcion: "buscarPagina"
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

        var pagina = JSON.parse(datos[1]);
        var contenedor = document.getElementById("listarPagina");
        contenedor.innerHTML = "";
        for (i = 0; i < pagina.length; i++) {
            agregarPagina(pagina[i]);
        }
        if (pagina.length == 0) {
            crearTr(5, "listarPagina");
        }
    })
}

function agregarPagina(pagina) {
    var tr = document.createElement("tr");
    tr.id = pagina['idPagina'];

    var td1 = document.createElement("td");
    td1.innerHTML = pagina['nombrePagina'];
    var td2 = document.createElement("td");
    td2.innerHTML = pagina['enlace'];
    var td3 = document.createElement("td");
    if (pagina['requireSession'] == 1) {
        td3.innerHTML = "SI"
    } else {
        td3.innerHTML = "NO"
    };
    var td4 = document.createElement("td");
    if (pagina['menu'] == 1) {
        td4.innerHTML = "SI"
    } else {
        td4.innerHTML = "NO"
    };

    var td5 = document.createElement("td");

    var botonEditar = document.createElement("a");
    botonEditar.href = "formularioeditarpagina.php?idPagina=" + pagina['idPagina']+"&idModulo="+pagina['idModulo'];
    botonEditar.style.margin = "2px";
    botonEditar.className = "btn btn-warning";
    botonEditar.innerHTML = '<i class="fas fa-edit"></i> Editar';

    var botonEliminar = document.createElement("a");
    botonEliminar.className = "btn btn-danger";
    botonEliminar.style.margin = "2px";
    botonEliminar.setAttribute("data-bs-toggle", "modal");
    botonEliminar.setAttribute("data-bs-target", "#eliminarFormulario");
    botonEliminar.value = pagina['idPagina'];
    botonEliminar.addEventListener('click', function () {
        eliminarPagina(this);
    });
    botonEliminar.innerHTML = '<i class="fas fa-trash-alt"></i> Eliminar';

    td5.appendChild(botonEditar);
    td5.appendChild(botonEliminar);

    tr.appendChild(td1);
    tr.appendChild(td2);
    tr.appendChild(td3);
    tr.appendChild(td4);
    tr.appendChild(td5);

    var contenedor = document.getElementById("listarPagina");
    contenedor.appendChild(tr);
}

function modificarPagina(campo) {
    if (campo == "-" && paginap > 1) {
        paginap -= 1;
    } else if (campo == "+" && paginap < numPagina) {
        paginap += 1;
    }
    consultarPagina();
}