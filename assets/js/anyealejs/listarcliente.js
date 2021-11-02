//definir antes de cargar la funcion
var pagina = 1;
var numPagina = 0;
//Carga la funcion
cargarJS();
//Cargar archivos al momemto de carga la pagina.
function cargarJS() {
    consultarCliente();
}

function consultarCliente() {
    var tipoDocumento = document.getElementById("tipoDocumento2").value;
    var documentoIdentidad = document.getElementById("documentoIdentidad2").value;

    $.ajax({
        url: '../controller/clientecontroller.php',
        type: 'GET',
        data: {
            tipoDocumento: tipoDocumento,
            documentoIdentidad: documentoIdentidad,
            pagina: pagina,
            funcion: "buscarClienteAdmin"
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

        var user = JSON.parse(datos[1]);
        var contenedor = document.getElementById("listarCliente");
        contenedor.innerHTML = "";
        for (i = 0; i < user.length; i++) {
            cliente(user[i]);
        }
        if (user.length == 0) {
            crearTr(5, "listarCliente");
        }
    })
}

function cliente(user) {
    var tr = document.createElement("tr");
    var td1 = document.createElement("td");
    td1.innerHTML = user['tipoDocumento'];
    var td2 = document.createElement("td");
    td2.innerHTML = user['documentoIdentidad'];
    var td3 = document.createElement("td");
    td3.innerHTML = user['primerNombre'] + user['primerApellido'];
    var td4 = document.createElement("td");
    td4.innerHTML = user['email'];
    var td5 = document.createElement("td");
    td5.innerHTML = user['telefono'];



    tr.appendChild(td1);
    tr.appendChild(td2);
    tr.appendChild(td3);
    tr.appendChild(td4);
    tr.appendChild(td5);
    var contenedor = document.getElementById("listarCliente");
    contenedor.appendChild(tr);
}

function modificarPagina(campo) {
    if (campo == "-" && pagina > 1) {
        pagina -= 1;
    } else if (campo == "+" && pagina < numPagina) {
        pagina += 1;
    }
    consultarCliente();
}