cargarJS()

function cargarJS() {
    productosCategoria();
}

function productosCategoria() {

    var idProducto = document.getElementById("idProducto").value;
    var idCategoria = document.getElementById("idCategoria").value;

    $.ajax({
        url: '../controller/productoserviciocontroller.php',
        type: 'GET',
        data: {
            idCategoria: idCategoria,
            idProducto:idProducto,
            funcion: "mostrarProductosPorCategoria"
        }
    }).done(function (data) {
        // console.log(data);
        var datos = JSON.parse(data);
        var contenedor = document.getElementById("mostrarProductos");
        contenedor.innerHTML = "";
        for (i = 0; i < datos.length; i++) {
            mostrarProducto(datos[i]);
        }
    })
}

function mostrarProducto(datos) {
    var divCol = document.createElement("div");
    divCol.className = "col-md-6";
    var divCar = document.createElement("div");
    divCar.className = "card"

    var img = document.createElement("img");
    img.className = "card-img-top imgCard";
    img.src = "../" + datos['fotoProducto'];

    var divCard = document.createElement("div");
    divCard.className = "card-body cardProducto";

    var h5Titulo = document.createElement("h5");
    h5Titulo.className = "";
    h5Titulo.innerHTML = datos['nombreProducto'];

    var pPrecio = document.createElement("p");
    pPrecio.className = "card-title";
    pPrecio.innerHTML = "$" + separadorMiles(datos['valorUnitario']);

    var divFooter = document.createElement("div");
    divFooter.className = "card-footer cardProducto";

    var botonDetalle = document.createElement("a");
    botonDetalle.href = "detalleProducto.php?idProducto=" + datos['IdProducto'];
    botonDetalle.className = "btn btn-info";
    botonDetalle.innerHTML = "<i class='fas fa-info-circle'></i> Detalle"



    divCard.appendChild(h5Titulo);
    divCard.appendChild(pPrecio);

    divFooter.appendChild(botonDetalle);

    divCar.appendChild(img);
    divCar.appendChild(divCard);
    divCar.appendChild(divFooter);

    divCol.appendChild(divCar);

    var contenedor = document.getElementById("mostrarProductos");
    contenedor.appendChild(divCol);
}