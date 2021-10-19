//definir antes de cargar la funcion
var pagina = 1;
var numPagina = 0;
//Carga la funcion
cargarJS();
//Cargar archivos al momemto de carga la pagina.
function cargarJS() {
    buscarProducto();
}

function buscarProducto() {
    var codigo = document.getElementById("busquedaProductoCodigo").value;
    var nombre = document.getElementById("busquedaProductoNombre").value;

    $.ajax({
        url: '../controller/productoServicioController.php',
        type: 'GET',
        data: {
            codigo: codigo,
            nombre: nombre,
            pagina: pagina,
            funcion: "buscarProductoInventario"
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

        var producto = JSON.parse(datos[1]);
        var contenedor = document.getElementById("productosBusqueda");
        contenedor.innerHTML = "";
        for (i = 0; i < producto.length; i++) {
            productoBusqueda(producto[i]);
        }
        if (producto.length == 0) {
            crearTr(5, "productosBusqueda");
        }
    })
}

function productoBusqueda(producto) {
    var tr = document.createElement("tr");
    tr.id = producto['IdProducto'];
    var tdCodigo = document.createElement("td");
    tdCodigo.innerHTML = producto['codigoProducto'];
    var tdProducto = document.createElement("td");
    tdProducto.innerHTML = producto['nombreProducto'];
    var tdCantidad = document.createElement("td");
    tdCantidad.innerHTML = producto['cantidad'];
    var tdPrecio = document.createElement("td");
    tdPrecio.innerHTML = "$"+separadorMiles(producto['valorUnitario']);

    var tdBotones = document.createElement("td");
    var div1 = document.createElement("div");
    div1.className = "btn-group";

    var boton1 = document.createElement("button");
    boton1.type = "button";
    boton1.className = "btn btn-success";
    boton1.innerHTML = "Acciones";
    var boton2 = document.createElement("button");
    boton2.type = "button";
    boton2.className = "btn btn-success dropdown-toggle";
    boton2.setAttribute("data-toggle", "dropdown");
    var span = document.createElement("span");
    span.className = "sr-only";

    div1.appendChild(boton1);
    div1.appendChild(boton2);
    boton2.appendChild(span);

    var div2 = document.createElement("div");
    div2.className = "dropdown-menu";
    div2.role = "menu";

    var botonEditar = document.createElement("a");
    botonEditar.href = "formularioEditarProducto.php?idProducto=" + producto['IdProducto'];
    botonEditar.className = "dropdown-item";
    botonEditar.innerHTML = '<i class="fas fa-edit"></i> Editar';

    var botonSeguimiento = document.createElement("a");
    botonSeguimiento.href = "seguimientoProducto.php?idProducto=" + producto['IdProducto'];
    botonSeguimiento.className = "dropdown-item";
    botonSeguimiento.innerHTML = '<i class="fas fa-info"></i> Seguimiento';

    var botonEliminar = document.createElement("a");
    botonEliminar.className = "dropdown-item";
    botonEliminar.setAttribute("data-bs-toggle", "modal");
    botonEliminar.setAttribute("data-bs-target", "#eliminarFormulario");
    botonEliminar.value = producto['IdProducto'];
    botonEliminar.addEventListener('click', function () {
        eliminarProducto(this);
    });
    botonEliminar.innerHTML = '<i class="fas fa-trash-alt"></i> Eliminar';

    div1.appendChild(div2);

    div2.appendChild(botonEditar);
    div2.appendChild(botonEliminar);
    div2.appendChild(botonSeguimiento);
    tdBotones.appendChild(div1);


    tr.appendChild(tdCodigo);
    tr.appendChild(tdProducto);
    tr.appendChild(tdCantidad);
    tr.appendChild(tdPrecio);
    tr.appendChild(tdBotones);


    var contenedor = document.getElementById("productosBusqueda");
    contenedor.appendChild(tr);
}

function modificarPagina(campo) {
    if (campo == "-" && pagina > 1) {
        pagina -= 1;
    } else if (campo == "+" && pagina < numPagina) {
        pagina += 1;
    }
    buscarProducto();
}