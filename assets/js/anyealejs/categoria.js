//definir antes de cargar la funcion
var pagina = 1;
var numPagina = 0;
//Carga la funcion
cargarJS();
//Cargar archivos al momemto de carga la pagina.
function cargarJS() {
    buscarCategoria();
}

function buscarCategoria() {
    var categoria = document.getElementById("categoriaBusqueda").value;

    $.ajax({
        url: '../controller/productoserviciocontroller.php',
        type: 'GET',
        data: {
            categoria: categoria,
            pagina: pagina,
            funcion: "buscarCategoria"
        }
    }).done(function (data) {
        console.log(data);
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
        span.style.background = "white";
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

        var categoria = JSON.parse(datos[1]);
        var contenedor = document.getElementById("categoria");
        contenedor.innerHTML = "";
        for (i = 0; i < categoria.length; i++) {
            agregarCategoria(categoria[i]);
        }
        if (categoria.length == 0) {
            crearTr(2, "categoria");
        }
    })
}

function modificarPagina(campo) {
    if (campo == "-" && pagina > 1) {
        pagina -= 1;
    } else if (campo == "+" && pagina < numPagina) {
        pagina += 1;
    }
    buscarCategoria();
}

function agregarCategoria(categoria) {
    var categoriatr = document.createElement("tr");
    categoriatr.id = categoria['idCategoria'];

    var tdCategoria = document.createElement("td");
    tdCategoria.innerHTML = categoria['nombreCategoria'];

    var tdBotones = document.createElement("td");
    var botonEditar = document.createElement("a");
    botonEditar.href = "formularioeditarcategoria.php?idCategoria=" + categoria['idCategoria'];
    botonEditar.className = "btn btn-warning";
    botonEditar.style = "margin: 4px";
    botonEditar.innerHTML = '<i class="fas fa-edit"></i> Editar';

    var botonEliminar = document.createElement("a");
    botonEliminar.className = "btn btn-danger";
    botonEliminar.setAttribute("data-bs-toggle", "modal");
    botonEliminar.setAttribute("data-bs-target", "#eliminarFormulario");
    botonEliminar.value = categoria['idCategoria'];
    botonEliminar.addEventListener('click', function () {
        eliminarCategoria(this);
    });
    botonEliminar.innerHTML = '<i class="fas fa-trash-alt"></i> Eliminar';

    var botonDetalle = document.createElement("a");
    botonDetalle.href = "detallecategoria.php?idCategoria=" + categoria['idCategoria'];
    botonDetalle.className = "btn btn-info";
    botonDetalle.style = "margin: 4px";
    botonDetalle.innerHTML = '<i class="far fa-eye"></i> Detalle';

    tdBotones.appendChild(botonEditar);
    tdBotones.appendChild(botonEliminar);
    tdBotones.appendChild(botonDetalle);

    categoriatr.appendChild(tdCategoria);
    categoriatr.appendChild(tdBotones);

    var contenedor = document.getElementById("categoria");
    contenedor.appendChild(categoriatr);
}