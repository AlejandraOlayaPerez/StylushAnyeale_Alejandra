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
        console.log(data);
        var datos = data.split("®");
        //paginacion
        var numRegistro = parseInt(datos[0]);
        numPagina = parseInt(numRegistro / 5);
        if (numRegistro % 5 > 0) numPagina++;


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
            productoCategoria(datosProducto[i]);
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

function productoCategoria(datosProducto){
   var tr = document.createElement("tr");

    var td1 = document.createElement("td");
    var inputSeleccionar = document.createElement("input");
    inputSeleccionar.type="checkbox";
    inputSeleccionar.name="categoriaProducto[]";
    inputSeleccionar.value=datosProducto['IdProducto'];

    var inputOculto = document.createElement("input");
    inputOculto.type="text";
    inputOculto.className="idProducto";
    inputOculto.value=datosProducto['IdProducto'];
    inputOculto.style.display="none";

    var td2 = document.createElement("td");
    td2.innerHTML=datosProducto['codigoProducto'];

    var td3 = document.createElement("td");
    td3.innerHTML=datosProducto['nombreProducto'];

    td1.appendChild(inputSeleccionar);
    td1.appendChild(inputOculto);
    tr.appendChild(td1);
    tr.appendChild(td2);
    tr.appendChild(td3);

    var contenedor = document.getElementById("informacionProducto");
        contenedor.appendChild(tr);
}