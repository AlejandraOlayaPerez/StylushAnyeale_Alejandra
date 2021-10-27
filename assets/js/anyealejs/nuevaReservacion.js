function cliente() {
    var tipoDocumento = document.getElementById("tipoDocumento2").value;
    var documentoIdentidad = document.getElementById("documentoIdentidad2").value;

    $.ajax({
        url: '../controller/clienteController.php',
        type: 'GET',
        data: {
            tipoDocumento: tipoDocumento,
            documentoIdentidad: documentoIdentidad,
            funcion: "buscarReservacionPorCC"
        }
    }).done(function (data) {
        // console.log(data);
        var datos = JSON.parse(data);
        var contenedor = document.getElementById("cliente");
        contenedor.innerHTML = "";
        for (i = 0; i < datos.length; i++) {
            agregarBusqueda(datos[i]);
        }
    })
}

function agregarBusqueda(datos) {
    var nuevoTR = document.createElement("tr"); //creamos un fila de una tabla
    nuevoTR.id = datos['idCliente'];
    var TD0 = document.createElement("td");
    var botonSeleccionar = document.createElement("a");
    botonSeleccionar.className = "btn btn-info";
    botonSeleccionar.innerHTML = "Seleccionar";
    botonSeleccionar.type = "button";
    botonSeleccionar.href = "crearReservacion.php?idCliente=" + datos['idCliente'];
    var TD1 = document.createElement("td");
    TD1.innerHTML = datos['tipoDocumento'];
    var TD2 = document.createElement("td");
    TD2.innerHTML = datos['documentoIdentidad'];
    var TD3 = document.createElement("td");
    TD3.innerHTML = datos['primerNombre'] + " " + datos['primerApellido'];

    TD0.appendChild(botonSeleccionar);
    nuevoTR.appendChild(TD0);
    nuevoTR.appendChild(TD1);
    nuevoTR.appendChild(TD2);
    nuevoTR.appendChild(TD3);

    var contenedor = document.getElementById("cliente");
    contenedor.appendChild(nuevoTR);

}