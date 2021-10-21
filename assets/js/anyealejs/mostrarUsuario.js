//definir antes de cargar la funcion
var pagina = 1;
var numPagina = 0;


function mostrarUsuario() {
    var idCargo = document.getElementById("idCargo").value;
    $.ajax({
        url: '../controller/cargocontroller.php',
        type: 'GET',
        data: {
            idCargo: idCargo,
            pagina: pagina,
            funcion: "buscarUsuarioCargo"
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

        var cargo = JSON.parse(datos[1]);
        var contenedor = document.getElementById("mostrarUsuario");
        contenedor.innerHTML = "";
        for (i = 0; i < cargo.length; i++) {
            agregarCargo(cargo[i]);
        }
        if (cargo.length == 0) {
            crearTr(3, "mostrarUsuario");
        }
    })
}

function agregarCargo(cargo) {
    var tr = document.createElement("tr");

    var td1 = document.createElement("td");
    var inputSeleccionar = document.createElement("input");
    inputSeleccionar.type = "checkbox";
    inputSeleccionar.name = "cargoUsuario[]";
    inputSeleccionar.value = cargo['idUser'];

    var td2 = document.createElement("td");
    td2.innerHTML = cargo['primerNombre'];

    var td3 = document.createElement("td");
    td3.innerHTML = cargo['primerApellido'];

    td1.appendChild(inputSeleccionar);
    tr.appendChild(td1);
    tr.appendChild(td2);
    tr.appendChild(td3);

    var contenedor = document.getElementById("mostrarUsuario");
    contenedor.appendChild(tr);
}

function modificarPagina(campo) {
    if (campo == "-" && pagina > 1) {
        pagina -= 1;
    } else if (campo == "+" && pagina < numPagina) {
        pagina += 1;
    }
    mostrarUsuario();
}