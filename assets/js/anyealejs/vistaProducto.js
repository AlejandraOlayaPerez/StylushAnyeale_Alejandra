//definir antes de cargar la funcion
var pagina = 1;
var numPagina = 0;
//Carga la funcion
cargarJS();
//Cargar archivos al momemto de carga la pagina.
function cargarJS() {
    vistaProducto();
}

function vistaProducto() {
    var categoria = document.getElementById("idCategoria").value;
    var tags = document.getElementById("idTags").value;
    var vista = document.getElementById("vista").value;
    var rangoMenor = document.getElementById("rangoMenor").value;
    var rangoMayor = document.getElementById("rangoMayor").value;
    var buscar = document.getElementById("buscar").value;


    $.ajax({
        url: '../controller/productoserviciocontroller.php',
        type: 'GET',
        data: {
            categoria: categoria,
            tags: tags,
            vista: vista,
            rangoMenor: rangoMenor,
            rangoMayor: rangoMayor,
            buscar: buscar,
            pagina: pagina,
            funcion: "buscarProductosVista"
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

        var producto = JSON.parse(datos[1]);
        var contenedor = document.getElementById("listaProducto");
        contenedor.innerHTML = "";
        for (i = 0; i < producto.length; i++) {
            agregarVista(producto[i]);
        }
    })
}

function modificarPagina(campo) {
    if (campo == "-" && pagina > 1) {
        pagina -= 1;
    } else if (campo == "+" && pagina < numPagina) {
        pagina += 1;
    }
    vistaProducto();
}

function agregarVista(producto) {
    var divCol = document.createElement("div");
    divCol.className = "col-md-3";
    var divCar = document.createElement("div");
    divCar.className = "card"

    var img = document.createElement("img");
    img.className = "card-img-top imgCard";
    img.src = "../" + producto['fotoProducto'];

    var divCard = document.createElement("div");
    divCard.className = "card-body cardProducto";

    var h5Titulo = document.createElement("h5");
    h5Titulo.className = "";
    h5Titulo.innerHTML = producto['nombreProducto'];

    var pPrecio = document.createElement("p");
    pPrecio.className = "card-title";
    pPrecio.innerHTML = "$" + separadorMiles(producto['valorUnitario']);

    var divFooter = document.createElement("div");
    divFooter.className = "card-footer cardProducto";

    var botonDetalle = document.createElement("a");
    botonDetalle.href = "detalleproducto.php?idProducto=" + producto['IdProducto'] + "&idCategoria=" + producto['idCategoria'];
    botonDetalle.className = "btn btn-info";
    botonDetalle.innerHTML = "<i class='fas fa-info-circle'></i> Detalle"



    divCard.appendChild(h5Titulo);
    divCard.appendChild(pPrecio);

    divFooter.appendChild(botonDetalle);

    divCar.appendChild(img);
    divCar.appendChild(divCard);
    divCar.appendChild(divFooter);

    divCol.appendChild(divCar);

    var contenedor = document.getElementById("listaProducto");
    contenedor.appendChild(divCol);
}