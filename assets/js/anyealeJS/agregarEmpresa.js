cargarJS();
//Cargar archivos al momemto de carga la pagina.
function cargarJS() {
    buscarEmpresa();
}

function buscarEmpresa() {
    var empresa = document.getElementById("empresa").value;
   
    $.ajax({
        url: '../controller/pedidocontroller.php',
        type: 'GET',
        data: {
            empresa: empresa,
            funcion: "buscarEmpresa"
        }
    }).done(function (data) {
        // console.log(data);
        var empresa = JSON.parse(data);
        var contenedor = document.getElementById("listarEmpresa");
        contenedor.innerHTML = "";
        for (i = 0; i < empresa.length; i++) {
            agregarEmpresaModal(empresa[i]);
        }
    })
}

function agregarEmpresaModal(empresa) {
    var nuevoTR = document.createElement("tr"); //creamos un fila de una tabla
    nuevoTR.id = empresa[idEmpresa];

    var td0 = document.createElement("td");
    var botonSeleccionar = document.createElement("button");
    botonSeleccionar.className = "btn btn-success";
    botonSeleccionar.innerHTML = "Agregar";
    botonSeleccionar.type = "button";
    botonSeleccionar.addEventListener('click', function () {
        agregarEmpresa(empresa['idEmpresa'], empresa['nombreEmpresa'], empresa['Nit'], empresa['direccion'])
    });

    td0.appendChild(botonSeleccionar);

    var TD1 = document.createElement("td");
    TD1.innerHTML = empresa['nombreEmpresa'];
    var TD2 = document.createElement("td");
    TD2.innerHTML = empresa['Nit'];
    var TD3 = document.createElement("td");
    TD3.innerHTML = empresa['direccion'];


    nuevoTR.appendChild(td0);
    nuevoTR.appendChild(TD1);
    nuevoTR.appendChild(TD2);
    nuevoTR.appendChild(TD3);

    var contenedor = document.getElementById("listarEmpresa");
    contenedor.appendChild(nuevoTR);
}

function agregarEmpresa(idEmpresa, nombreEmpresa, Nit, direccion) {
    var InputIdEmpresa = document.getElementById("idEmpresa");
    InputIdEmpresa.value = idEmpresa;

    var InputNit = document.getElementById("Nit");
    InputNit.value = Nit;

    var InputNombreEmpresa = document.getElementById("nombreEmpresa");
    InputNombreEmpresa.value = nombreEmpresa;

    var InputDireccion = document.getElementById("direccion");
    InputDireccion.value = direccion;
}