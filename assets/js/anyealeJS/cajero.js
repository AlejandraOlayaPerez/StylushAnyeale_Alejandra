function buscarCliente() {
    var tipoDocumento = document.getElementById("tipoDocumento2").value;
    var documentoIdentidad = document.getElementById("documentoIdentidad2").value;

    $.ajax({
        url: '../controller/clientecontroller.php',
        type: 'GET',
        data: {
            tipoDocumento: tipoDocumento,
            documentoIdentidad: documentoIdentidad,
            funcion: "buscarReservacionPorCC"
        }
    }).done(function (data) {
        // console.log(data);
        var datos = JSON.parse(data);
        var contenedor = document.getElementById("informacionCliente");
        contenedor.innerHTML = "";
        for (i = 0; i < datos.length; i++) {
            agregarBusqueda(datos[i]);
        }
        if (datos.length == 0) {
            crearTr(5, "informacionCliente");
        }
    })
}

function agregarBusqueda(datos) {
    var nuevoTR = document.createElement("tr"); //creamos un fila de una tabla
    nuevoTR.id = datos['idCliente'];
    var idCliente = document.getElementById("idCliente");
    idCliente.value = datos['idCliente'];
    var TD0 = document.createElement("td");
    var botonSeleccionar = document.createElement("button");
    botonSeleccionar.className = "btn btn-info";
    botonSeleccionar.innerHTML = "Seleccionar";
    botonSeleccionar.type = "button";
    // botonSeleccionar.data-bs-dismiss;"modal";
    botonSeleccionar.addEventListener('click', function () {
        agregarCliente(datos['idCliente'], datos['tipoDocumento'], datos['documentoIdentidad'], datos['primerNombre'], datos['segundoNombre'],
            datos['primerApellido'], datos['segundoApellido'], datos['email']);
    });
    var TD1 = document.createElement("td");
    TD1.innerHTML = datos['tipoDocumento'];
    var TD2 = document.createElement("td");
    TD2.innerHTML = datos['documentoIdentidad'];
    var TD3 = document.createElement("td");
    TD3.innerHTML = datos['primerNombre'] + datos['segundoNombre'];
    var TD4 = document.createElement("td");
    TD4.innerHTML = datos['primerApellido'] + datos['segundoApellido'];
    var TD5 = document.createElement("td");
    TD5.innerHTML = datos['telefono'];

    TD0.appendChild(botonSeleccionar);
    nuevoTR.appendChild(TD0);
    nuevoTR.appendChild(TD1);
    nuevoTR.appendChild(TD2);
    nuevoTR.appendChild(TD3);
    nuevoTR.appendChild(TD4);
    nuevoTR.appendChild(TD5);

    var contenedor = document.getElementById("informacionCliente");
    contenedor.appendChild(nuevoTR);
}

var idC = 0;

function crearReservacion() {
    // var idCliente=document.getElementById('idCliente').value;
    window.location.href = "crearreservacion.php?idCliente=" + idC + "&cajero=cajero";

}

function agregarCliente(idCliente, tipoDocumento, documentoIdentidad, primerNombre, primerApellido, telefono, idReservacion, fechaReservacion, horaReservacion, domicilio, direccion, precio, validar, IdServicio, nombreServicio) {
    var InputIdCliente = document.getElementById("idCliente");
    InputIdCliente.value = idCliente;

    var InputTipoDocumento = document.getElementById("tipoDocumento");
    InputTipoDocumento.value = tipoDocumento;

    var InputDocumentoIdentidad = document.getElementById("documentoIdentidad");
    InputDocumentoIdentidad.value = documentoIdentidad;

    var InputPrimerNombre = document.getElementById("primerNombre");
    InputPrimerNombre.value = primerNombre;

    var InputPrimerApellido = document.getElementById("primerApellido");
    InputPrimerApellido.value = primerApellido;

    var InputTelefono = document.getElementById("telefono");
    InputTelefono.value = telefono;

    mostrarReservaciones();
    $('#modal-xl').modal('hide');

    idC = idCliente;

    var botonAgregar = document.getElementById("nuevaReservacion");
    botonAgregar.style = "";
}

function mostrarReservaciones() {
    var idCliente = document.getElementById("idCliente").value;

    $.ajax({
        url: '../controller/reservacioncontroller.php',
        type: 'GET',
        data: {
            idCliente: idCliente,
            funcion: "buscarReservacionIdAjax"
        }
    }).done(function (data) {
        // console.log(data);
        var datos = JSON.parse(data);
        var contenedor = document.getElementById("informacionCliente");
        contenedor.innerHTML = "";
        for (i = 0; i < datos.length; i++) {
            agregarReservacion(datos[i]);
        }
        if (datos.length == 0) {
            crearTrReserva(8, "informacionReservacion");
        }

    })
}

function agregarReservacion(datos) {
    var contenedor = document.getElementById("informacionReservacion");
    var tabla = document.getElementById("tablaReservacion");
    tabla.style = "";
    var trBody = document.createElement("tr");
    trBody.id = datos['idReservacion'];

    var tdServicio = document.createElement("td");
    tdServicio.innerHTML = datos['nombreServicio'];
    var tdFecha = document.createElement("td");
    tdFecha.innerHTML = datos['fechaReservacion'];
    var tdHora = document.createElement("td");
    tdHora.innerHTML = datos['horaReservacion'];
    var tdDomicilio = document.createElement("td");
    if (datos['domicilio'] == 1) {
        tdDomicilio.innerHTML = "SI"
    } else {
        tdDomicilio.innerHTML = "NO"
    };
    var tdDireccion = document.createElement("td");
    tdDireccion.innerHTML = datos['direccion'];
    var tdPrecio = document.createElement("td");
    tdPrecio.className = "precio";
    tdPrecio.innerHTML = datos['precio'];
    var precio = document.getElementById("pago").value = datos['precio'];
    var idCliente = document.getElementById("cliente").value = datos['idCliente'];
    var tdValidar = document.createElement("td");
    if (datos['validar'] == 1) {
        tdValidar.innerHTML = "SI"
    } else {
        tdValidar.innerHTML = "NO"
    };

    var tdBoton = document.createElement("td");
    var botonAceptar = document.createElement("a");
    botonAceptar.className = "btn btn-danger";
    botonAceptar.style.margin = "2px";
    botonAceptar.setAttribute("data-bs-toggle", "modal");
    botonAceptar.setAttribute("data-bs-target", "#eliminarFormulario");
    botonAceptar.value = datos['idReservacion'];
    botonAceptar.addEventListener('click', function () {
        pagoReservacion(this);
    });
    botonAceptar.innerHTML = '<i class="fas fa-money-check-alt"></i> Pagar';

    tdBoton.appendChild(botonAceptar);

    trBody.appendChild(tdServicio);
    trBody.appendChild(tdFecha);
    trBody.appendChild(tdHora);
    trBody.appendChild(tdDomicilio);
    trBody.appendChild(tdDireccion);
    trBody.appendChild(tdPrecio);
    trBody.appendChild(tdValidar);
    trBody.appendChild(tdBoton);

    contenedor.appendChild(trBody);
}



var pagina = 1;
var numPagina = 0;

//Tabla para los productos
function buscarProducto() {
    var codigoProducto = document.getElementById("codigoProducto").value;
    var nombreProducto = document.getElementById("nombreProducto").value;

    $.ajax({
        url: '../controller/clientecontroller.php',
        type: 'GET',
        data: {
            codigoProducto: codigoProducto,
            nombreProducto: nombreProducto,
            pagina: pagina,
            funcion: "buscarProductoAjax"
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

        var datosProducto = JSON.parse(datos[1]);
        var contenedor = document.getElementById("informacionProducto");
        contenedor.innerHTML = "";
        for (i = 0; i < datosProducto.length; i++) {
            agregarProducto(datosProducto[i]);
        }
        if (datosProducto.length == 0) {
            crearTr(5, "informacionProducto");
        }
    })
}

function modificarPagina(campo) {
    if (campo == "-" && pagina > 1) {
        pagina -= 1;
    } else if (campo == "+" && pagina < numPagina) {
        pagina += 1;
    }
    buscarProducto();
}

function agregarProducto(datosProducto) {
    var contenedor = document.getElementById("informacionProducto");

    var trProducto = document.createElement("tr");
    trProducto.id = datosProducto['IdProducto'];

    var productoResultado = document.getElementById("informacionProducto");
    var tr = document.getElementById(datosProducto['IdProducto']);
    // console.log(tr);

    var boton = document.createElement("td");
    var botonSeleecionarProducto = document.createElement("button");
    botonSeleecionarProducto.className = "btn btn-info";
    botonSeleecionarProducto.innerHTML = "Seleccionar";
    botonSeleecionarProducto.type = "button";
    botonSeleecionarProducto.addEventListener('click', function () {
        mostrarProductos(datosProducto['IdProducto'], datosProducto['codigoProducto'], datosProducto['nombreProducto'],
            datosProducto['valorUnitario'], this);
    });

    if (tr != null) {
        botonSeleecionarProducto.innerHTML = "Seleccionado";
        botonSeleecionarProducto.className = "btn btn-default";
        botonSeleecionarProducto.disabled = true;
    }

    var tdCodigo = document.createElement("td");
    tdCodigo.innerHTML = datosProducto['codigoProducto'];
    var tdNombreProducto = document.createElement("td");
    tdNombreProducto.innerHTML = datosProducto['nombreProducto'];
    var tdValorUnitario = document.createElement("td");
    tdValorUnitario.innerHTML = datosProducto['valorUnitario'];

    boton.appendChild(botonSeleecionarProducto);
    trProducto.appendChild(boton);
    trProducto.appendChild(tdCodigo);
    trProducto.appendChild(tdNombreProducto);
    trProducto.appendChild(tdValorUnitario);

    contenedor.appendChild(trProducto);

}

function mostrarProductos(IdProducto, codigoProducto, nombreProducto, valorUnitario, boton) {
    trEliminar("tablaFacturaProducto");
    var contenedor = document.getElementById("tablaFacturaProducto");
    var tablaProducto = document.getElementById("tablaProducto");
    tablaProducto.style = "";
    var inputOculto = document.createElement("input");
    inputOculto.type = "text";
    inputOculto.name = "productos[]";
    inputOculto.value = IdProducto;
    inputOculto.style = "display: none;";

    var trProducto = document.createElement("tr");
    trProducto.id = IdProducto;
    var tdCProducto = document.createElement("td");
    tdCProducto.innerHTML = codigoProducto;
    var tdNProducto = document.createElement("td");
    tdNProducto.innerHTML = nombreProducto;
    var tdCantidadProducto = document.createElement("td");
    var inputCantidadProducto = document.createElement("input");
    inputCantidadProducto.type = "number";
    inputCantidadProducto.name = "cantidadProducto[]";
    inputCantidadProducto.value = "1";
    inputCantidadProducto.min = "1";
    inputCantidadProducto.className = "cantidadProducto";
    inputCantidadProducto.addEventListener('change', function () {
        calcularTotalProducto();
    });
    var tdVUnitario = document.createElement("td");
    tdVUnitario.className = "valorUnitario";
    tdVUnitario.innerHTML = valorUnitario;
    var tdEliminar = document.createElement("td");
    var eliminar = document.createElement("button");
    eliminar.className = "btn btn-danger";
    eliminar.innerHTML = "Eliminar";
    eliminar.type = "button";
    eliminar.addEventListener('click', function () {
        eliminarTDProducto(IdProducto);
    });

    trProducto.appendChild(inputOculto);
    trProducto.appendChild(tdCProducto);
    trProducto.appendChild(tdNProducto);
    tdCantidadProducto.appendChild(inputCantidadProducto);
    trProducto.appendChild(tdCantidadProducto);
    trProducto.appendChild(tdVUnitario);
    tdEliminar.appendChild(eliminar);
    trProducto.appendChild(tdEliminar);

    contenedor.appendChild(trProducto);

    boton.innerHTML = "Seleccionado";
    boton.className = "btn btn-default";
    boton.disabled = true;

    calcularTotalProducto();
}

function calcularTotalProducto() {
    var contenedor = document.getElementById("tablaFacturaProducto");
    var producto = contenedor.querySelectorAll('tr');
    var totalProducto = 0;
    for (i = 0; i < producto.length; i++) {
        var precio = producto[i].getElementsByClassName('valorUnitario')[0].innerHTML;
        var cantidad = producto[i].getElementsByClassName('cantidadProducto')[0].value;
        var total = parseFloat(precio) * cantidad;
        totalProducto += total;
    }
    var total = document.getElementById("totalProducto");
    document.getElementById("total").value = totalProducto;
    total.innerHTML = totalProducto;
}


function eliminarTDProducto(IdProducto) {
    var contenedor = document.getElementById("tablaFacturaProducto");
    var tr = document.getElementById(IdProducto);

    contenedor.removeChild(tr);
    calcularTotalProducto();
}