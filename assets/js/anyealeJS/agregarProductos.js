var pagina = 1;
var numPagina = 0;

function cargarJS() {
    productoConsultar();
}

function productoConsultar() {
    var producto = document.getElementById("producto").value;

    $.ajax({
        url: '../controller/pedidocontroller.php',
        type: 'GET',
        data: {
            producto: producto,
            pagina: pagina,
            funcion: "buscarProducto"
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

        var producto = JSON.parse(datos[1]);
        var contenedor = document.getElementById("productoResultado");
        contenedor.innerHTML = "";
        for (i = 0; i < producto.length; i++) {
            agregarProductoModal(producto[i]);
        }
        if (producto.length == 0) {
            crearTr(4, "productoResultado");
        }
        if (contenedor.innerHTML == "") {
            crearTr(4, "productoResultado");
        }
    })
}

function modificarPagina(campo) {
    if (campo == "-" && pagina > 1) {
        pagina -= 1;
    } else if (campo == "+" && pagina < numPagina) {
        pagina += 1;
    }
    productoConsultar();
}

function agregarProductoModal(producto) {
    var nuevoTR = document.createElement("tr"); //creamos un fila de una tabla
    nuevoTR.id = producto['IdProducto'];

    var productoResultado = document.getElementById("productoResultado");
    var tr = document.getElementById(producto['IdProducto']);
    // console.log(tr);

    var td0 = document.createElement("td");
    var botonSeleccionar = document.createElement("button");
    botonSeleccionar.className = "btn btn-success";
    botonSeleccionar.innerHTML = "Seleccionar";
    botonSeleccionar.type = "button";
    botonSeleccionar.addEventListener('click', function () {
        agregarProducto(producto['IdProducto'], producto['codigoProducto'], producto['nombreProducto'], this)
    });

    if (tr != null) {
        botonSeleccionar.innerHTML = "Seleccionado";
        botonSeleccionar.className = "btn btn-default";
        botonSeleccionar.disabled = true;
    }

    td0.appendChild(botonSeleccionar);

    var TD1 = document.createElement("td");
    TD1.innerHTML = producto['codigoProducto'];
    var TD2 = document.createElement("td");
    TD2.innerHTML = producto['nombreProducto'];


    nuevoTR.appendChild(td0);
    nuevoTR.appendChild(TD1);
    nuevoTR.appendChild(TD2);

    var contenedor = document.getElementById("productoResultado");
    contenedor.appendChild(nuevoTR);

}

var tab = 0;

function agregarProducto(idProducto, codigo, producto, boton) {
    tab += 1;
    trEliminar("listarProducto");
    var contenedor = document.getElementById("listarProducto");
    var nuevoProducto = document.createElement("tr"); //creamos un fila de una tabla
    nuevoProducto.id = idProducto;
    var inputOculto = document.createElement("input");
    inputOculto.type = "text";
    inputOculto.name = "productos[]";
    inputOculto.value = idProducto;
    inputOculto.id = idProducto + "oculto";
    inputOculto.style = "display: none;";
    var spanOculto = document.createElement("Span");
    spanOculto.style = "display: none;";
    spanOculto.id = idProducto + "ocultoSpan";

    var codigoFila = document.createElement("td");
    codigoFila.innerHTML = codigo;
    var productoFila = document.createElement("td");
    productoFila.innerHTML = producto;
    var cantidad = document.createElement("td");
    var inputCantidad = document.createElement("input");
    inputCantidad.type = "number";
    inputCantidad.id = idProducto + "input";
    inputCantidad.name = "cantidadProducto[]";
    inputCantidad.className = "form-control";
    inputCantidad.min = 1;
    inputCantidad.max = 7;
    inputCantidad.required = true;
    inputCantidad.tabIndex = tab;
    inputCantidad.addEventListener('change', function () {
        validarCampo(this);
    });
    inputCantidad.min = 1;
    inputCantidad.type = "number";
    inputCantidad.value = 1;
    var span = document.createElement("Span");
    span.id = idProducto + "inputSpan";
    cantidad.appendChild(inputCantidad);
    cantidad.appendChild(span);

    var eliminar = document.createElement("td");
    var botonEliminar = document.createElement("button");
    botonEliminar.className = "btn btn-danger";
    botonEliminar.innerHTML = "Eliminar";
    botonEliminar.type = "button";
    botonEliminar.addEventListener('click', function () {
        eliminarTR(idProducto);
    });

    eliminar.appendChild(botonEliminar);

    nuevoProducto.appendChild(inputOculto);
    nuevoProducto.appendChild(spanOculto);
    nuevoProducto.appendChild(codigoFila);
    nuevoProducto.appendChild(productoFila);
    nuevoProducto.appendChild(cantidad);
    nuevoProducto.appendChild(eliminar);



    contenedor.appendChild(nuevoProducto);

    boton.innerHTML = "Seleccionado";
    boton.className = "btn btn-default";
    boton.disabled = true;
}

function eliminarTR(idProducto) {
    var contenedor = document.getElementById("listarProducto");
    var tr = document.getElementById(idProducto);
    var trVacio = document.getElementById("trVacio");

    contenedor.removeChild(tr);

    if (contenedor.querySelectorAll('input').length == 0) {
        crearTr(4, "listarProducto");
    }

}