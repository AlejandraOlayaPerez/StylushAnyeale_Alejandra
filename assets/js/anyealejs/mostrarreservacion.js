cargarJS()

function cargarJS() {
    mostrarReservacion();
}

function mostrarReservacion() {
    var fecha = document.getElementById("fecha").value;
    var fechafinal = document.getElementById("fechaFinal").value;
    var domicilio = document.getElementById("domicilio").value;


    $.ajax({
        url: '../controller/reservacioncontroller.php',
        type: 'GET',
        data: {
            fecha: fecha,
            fechafinal:fechafinal,
            domicilio: domicilio,
            funcion: "buscarTodasReservacion"
        }
    }).done(function (data) {
        // console.log(data);
        var reservacion = JSON.parse(data);
        var contenedor = document.getElementById("listarReservacion");
        contenedor.innerHTML = "";
        for (i = 0; i < reservacion.length; i++) {
            reservas(reservacion[i]);
        }
        if (reservacion.length == 0) {
            crearTr(9, "listarReservacion");
        }
    })
}

function reservas(reservacion) {
    var tr = document.createElement("tr");
    tr.id = reservacion['idReservacion'];

    var tdCliente = document.createElement("td");
    tdCliente.innerHTML = reservacion['primerNombre'] + " " + reservacion['primerApellido'];
    var tdServicio = document.createElement("td");
    tdServicio.innerHTML = reservacion['nombreServicio'];
    var tdFecha = document.createElement("td");
    tdFecha.innerHTML = reservacion['fechaReservacion'];
    var tdHora = document.createElement("td");
    tdHora.innerHTML = reservacion['horaReservacion'] + " a " + reservacion['horaFinal'];
    var tdDomicilio = document.createElement("td");
    if (reservacion['domicilio'] == 1) {
        tdDomicilio.innerHTML = "SI"
    } else {
        tdDomicilio.innerHTML = "NO"
    };
    var tdDireccion = document.createElement("td");
    tdDireccion.innerHTML = reservacion['direccion'];
    var tdValidar = document.createElement("td");
    if (reservacion['validar'] == 1) {
        tdValidar.innerHTML = "SI"
    } else {
        tdValidar.innerHTML = "NO"
    };
    var tdCancelar = document.createElement("td");
    if (reservacion['eliminado'] == 1) {
        tdCancelar.innerHTML = "SI"
    } else {
        tdCancelar.innerHTML = "NO"
    };

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

    var botonEditar = document.createElement("a");
    botonEditar.href = "editarreservacion.php?idReservacion=" + reservacion['idReservacion'] + "&idCliente=" + reservacion['idCliente'];
    botonEditar.className = "dropdown-item";
    botonEditar.innerHTML = '<i class="fas fa-edit"></i> Editar';

    var botonEliminar = document.createElement("a");
    botonEliminar.className = "dropdown-item";
    botonEliminar.setAttribute("data-bs-toggle", "modal");
    botonEliminar.setAttribute("data-bs-target", "#cancelarReservacion");
    botonEliminar.value = reservacion['idReservacion'];
    botonEliminar.addEventListener('click', function () {
        cancelarReservacion(this);
    });
    botonEliminar.innerHTML = '<i class="fas fa-trash-alt"></i> Eliminar';

    var botonValidar = document.createElement("a");
    botonValidar.className = "dropdown-item";
    botonValidar.setAttribute("data-bs-toggle", "modal");
    botonValidar.setAttribute("data-bs-target", "#eliminarFormulario");
    botonValidar.value = reservacion['idReservacion'];
    botonValidar.addEventListener('click', function () {
        validarReservacion(this);
    });
    botonValidar.innerHTML = '<i class="fas fa-check-circle"></i> Validar';

    div1.appendChild(div2);
    if (reservacion['validar'] == 0 && reservacion['eliminado'] == 0) {
        div2.appendChild(botonEditar);
        div2.appendChild(botonValidar);
        div2.appendChild(botonEliminar);
    } else {
        div1 = document.createElement('button');
        div1.innerHTML = "Sin Acciones";
        div1.className = "btn btn-dark";
        div1.disabled = true;
        // div1.style="width="
    }

    tdBotones.appendChild(div1);

    tr.appendChild(tdCliente);
    tr.appendChild(tdServicio);
    tr.appendChild(tdFecha);
    tr.appendChild(tdHora);
    tr.appendChild(tdDomicilio);
    tr.appendChild(tdDireccion);
    tr.appendChild(tdValidar);
    tr.appendChild(tdCancelar);
    tr.appendChild(tdBotones)

    var contenedor = document.getElementById("listarReservacion");
    contenedor.appendChild(tr);
}