//definir antes de cargar la funcion
var pagina = 1;
var numPagina = 0;
//Carga la funcion
cargarJS();
//Cargar archivos al momemto de carga la pagina.
function cargarJS() {
    consultarfactura();
}

function consultarfactura() {
    var factura = document.getElementById("factura").value;

    $.ajax({
        url: '../controller/productoserviciocontroller.php',
        type: 'GET',
        data: {
            factura: factura,
            pagina: pagina,
            funcion: "buscarFactura"
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

        var factura = JSON.parse(datos[1]);
        var contenedor = document.getElementById("listarFactura");
        contenedor.innerHTML = "";
        for (i = 0; i < factura.length; i++) {
            listarFactura(factura[i]);
        }
        if (factura.length == 0) {
            crearTr(6, "listarFactura");
        }
    })
}

function modificarPagina(campo) {
    if (campo == "-" && pagina > 1) {
        pagina -= 1;
    } else if (campo == "+" && pagina < numPagina) {
        pagina += 1;
    }
    consultarfactura();
}

function listarFactura(factura) {

    var tr = document.createElement("tr");
    tr.id = factura['idFactura'];

    var td = document.createElement("td");
    td.innerHTML = factura['idFactura'];
    var td2 = document.createElement("td");
    td2.innerHTML = factura['fechaCreacion'] + "/" + factura['fechaModificar'];
    var td3 = document.createElement("td");
    td3.innerHTML = factura['horaCreacion'] + "/" + factura['horaModificar'];
    var td4 = document.createElement("td");
    td4.innerHTML = "$" + separadorMiles(factura['valorTotal']);
    var td5 = document.createElement("td");
    if (factura['estado'] == 1) {
        td5.innerHTML = "Factura activa";
    }
    if (factura['estado'] == 2) {
        td5.innerHTML = "Factura pendiente";
    }
    if (factura['estado'] == 3) {
        td5.innerHTML = "Factura pagada";
    }
    if (factura['estado'] == 4) {
        td5.innerHTML = "Factura cancelada";
    }

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

    var botonValidar = document.createElement("a");
    botonValidar.className = "dropdown-item";
    botonValidar.style.margin = "2px";
    botonValidar.setAttribute("data-bs-toggle", "modal");
    botonValidar.setAttribute("data-bs-target", "#validarFormulario");
    botonValidar.value = factura['idFactura'];
    botonValidar.addEventListener('click', function () {
        validarFactura(this);
    });
    botonValidar.innerHTML = '<i class="fas fa-check-circle"></i> Validar';

    var botonCancelar = document.createElement("a");
    botonCancelar.className = "dropdown-item";
    botonCancelar.style.margin = "2px";
    botonCancelar.setAttribute("data-bs-toggle", "modal");
    botonCancelar.setAttribute("data-bs-target", "#eliminarFormulario");
    botonCancelar.value = factura['idFactura'];
    botonCancelar.addEventListener('click', function () {
        cancelarFactura(this);
    });
    botonCancelar.innerHTML = '<i class="fas fa-ban"></i> Cancelar';

    var botonSeguimiento = document.createElement("a");
    botonSeguimiento.href = "seguimientofactura.php?idFactura=" + factura['idFactura'];
    botonSeguimiento.className = "dropdown-item";
    botonSeguimiento.innerHTML = '<i class="fas fa-info"></i> Seguimiento';

    var botonPDF = document.createElement("a");
    botonPDF.className = "dropdown-item";
    botonPDF.href = "detallefactura.php?idFactura=" + factura['idFactura'];
    botonPDF.innerHTML = '<i class="fas fa-eye"></i> Vista Factura';

    div1.appendChild(div2);

    if (factura['estado'] == 2) {
        div2.appendChild(botonValidar);
        div2.appendChild(botonCancelar);
    }
    if (factura['estado'] == 1) {
        div2.appendChild(botonValidar);
        div2.appendChild(botonCancelar);
    }
    div2.appendChild(botonPDF);
    div2.appendChild(botonSeguimiento);

    tdBotones.appendChild(div1);

    tr.appendChild(td);
    tr.appendChild(td2);
    tr.appendChild(td3);
    tr.appendChild(td4);
    tr.appendChild(td5);
    tr.appendChild(tdBotones);


    var contenedor = document.getElementById("listarFactura");
    contenedor.appendChild(tr);
}