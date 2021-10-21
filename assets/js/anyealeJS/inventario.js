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
        url: '../controller/productoserviciocontroller.php',
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

        var inventario = JSON.parse(datos[1]);
        var contenedor = document.getElementById("productosBusqueda");
        contenedor.innerHTML = "";
        for (i = 0; i < inventario.length; i++) {
            agregarBusqueda(inventario[i]);
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

function agregarBusqueda(inventario) {
    var tr = document.createElement("tr");
    tr.id = inventario['IdProducto'];
    var idProducto = document.createElement("input");
    idProducto.value = inventario['IdProducto'];
    idProducto.style = "display:none";
    var td1 = document.createElement("td");
    td1.innerHTML = inventario['codigoProducto'];
    var td2 = document.createElement("td");
    td2.innerHTML = inventario['nombreProducto'];
    var td3 = document.createElement("td");
    td3.innerHTML = inventario['cantidad'];
    var td4 = document.createElement("td");
    td4.innerHTML = inventario['valorUnitario'];
    var td5 = document.createElement("td");
    var botonRestar = document.createElement("a");
    botonRestar.className = "btn btn-info";
    botonRestar.setAttribute("data-toggle", "modal");
    botonRestar.setAttribute("data-target", "#modal-default");
    botonRestar.value = inventario['IdProducto'];
    botonRestar.addEventListener('click', function () {
        cantidadInventario(this);
    });
    botonRestar.innerHTML = '<i class="fas fa-pen"></i> Cantidad';

    td5.appendChild(botonRestar);

    tr.appendChild(idProducto);
    tr.appendChild(td1);
    tr.appendChild(td2);
    tr.appendChild(td3);
    tr.appendChild(td4);
    tr.appendChild(td5);

    var contenedor = document.getElementById("productosBusqueda");
    contenedor.appendChild(tr);
}

// function buscarFactura(){
//     var fechaInicio = document.getElementById("fechaInicio").value;
//     var fechaFinal = document.getElementById("fechaFinal").value;

//     $.ajax({
//         url: '../controller/productoServicioController.php',
//         type: 'GET',
//         data: {fechaInicio:fechaInicio,fechaFinal:fechaFinal,funcion:"rangoFechas"}
//     }).done(function (data){
//         // console.log(data);
//         var datosFactura=JSON.parse(data);
//         var contenedor=document.getElementById("facturas");
//         contenedor.innerHTML="";
//         for(i=0; i<datosFactura.length; i++){
//             agregarFactura(datosFactura[i]);
//         }
//     })
// }

// function agregarFactura(datosFactura){
//     var tr=document.createElement("tr");
//     tr.id=datosFactura['idFactura'];
//     var idProducto=document.createElement("input");
//     idProducto.value=datosFactura['idFactura'];
//     idProducto.style="display:none";
//     var td1 = document.createElement("td");
//     td1.innerHTML=datosFactura['fechaFactura'];
//     var td3 = document.createElement("td");
//     td3.innerHTML=datosFactura['producto'];
//     var td4 = document.createElement("td");
//     td4.innerHTML = datosFactura['cantidad'];
//     var td5 = document.createElement("td");
//     td5.innerHTML = datosFactura['precio'];

//     tr.appendChild(idProducto);
//     tr.appendChild(td1);
//     tr.appendChild(td3);
//     tr.appendChild(td4);
//     tr.appendChild(td5);

//     var contenedor = document.getElementById("facturas");
//     contenedor.appendChild(tr);
// }

function cantidadInventario() {
    
}