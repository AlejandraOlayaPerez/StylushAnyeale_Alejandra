//Carga la funcion
cargarJS();
//Cargar archivos al momemto de carga la pagina.
function cargarJS() {
    productosPedido();
}

function productosPedido() {
    var idPedido = document.getElementById("idPedido").value;
    $.ajax({
        url: '../controller/pedidoController.php',
        type: 'POST',
        data: {
            idPedido: idPedido,
            funcion: "traerProductos"
        }
    }).done(function (data) {
        console.log(data);
        var producto = JSON.parse(data);
        var contenedor = document.getElementById("listarProducto");
        contenedor.innerHTML = "";
        for (i = 0; i < producto.length; i++) {
            productosDelPedido(producto[i]);

        }
        if (producto.length == 0) {
            crearTr(4, "listarProducto");
        }
    })
}

function productosDelPedido(producto) {
    var tr = document.createElement("tr");
    tr.id = producto['idProducto'];
    var inputOculto = document.createElement("input");
    inputOculto.name = "productos[]";
    inputOculto.value = producto['idProducto'];
    inputOculto.id = producto['idProducto'];
    inputOculto.style = "display: none;";
    tr.appendChild(inputOculto);
    var tdCodigo = document.createElement("td");
    tdCodigo.innerHTML = producto['codigoProducto'];
    var tdProducto = document.createElement("td");
    tdProducto.innerHTML = producto['producto'];
    var tdCantidad = document.createElement("td");
    var inputCantidad = document.createElement("input");
    inputCantidad.type = "number";
    inputCantidad.className = "form-control";
    inputCantidad.name = "cantidadProducto[]";
    inputCantidad.value = producto['cantidad'];

    tdCantidad.appendChild(inputCantidad);

    var tdEliminar = document.createElement("td");
    var botonEliminar = document.createElement("button");
    botonEliminar.className = "btn btn-danger";
    botonEliminar.innerHTML = "Eliminar";
    botonEliminar.type = "button";
    botonEliminar.addEventListener('click', function () {
        eliminarTR(producto['idProducto']);
    });

    tdEliminar.appendChild(botonEliminar);

    tr.appendChild(tdCodigo);
    tr.appendChild(tdProducto);
    tr.appendChild(tdCantidad);
    tr.appendChild(tdEliminar);

    var contenedor = document.getElementById("listarProducto");
    contenedor.appendChild(tr);
}


function eliminarTR(idProducto) {
    var contenedor = document.getElementById("listarProducto");
    var tr = document.getElementById(idProducto);
    var trVacio = document.getElementById("trVacio");

    contenedor.removeChild(tr);

    if (contenedor.querySelectorAll('input').length == 0) {
        crearTr("listarProducto");
    }

}