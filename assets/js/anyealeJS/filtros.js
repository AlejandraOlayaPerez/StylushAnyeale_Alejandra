//Carga la funcion
cargarJS();
//Cargar archivos al momemto de carga la pagina.
function cargarJS(){
    mostrarReservacion();
}
//funcion para buscar Clientes
function buscarCliente(){
    var tipoDocumento = document.getElementById("tipoDocumento2").value;
    var documentoIdentidad = document.getElementById("documentoIdentidad2").value;

    $.ajax({
        url: '../controller/clientecontroller.php',
        type: 'GET',
        data: {tipoDocumento:tipoDocumento,documentoIdentidad:documentoIdentidad,funcion:"buscarReservacionPorCC"}
    }).done(function (data){
        // console.log(data);
        var datos=JSON.parse(data);
        var contenedor=document.getElementById("listarCliente");
        contenedor.innerHTML="";
        for(i=0; i<datos.length; i++){
        agregarBusqueda(datos[i]);
        }
    })
}

function agregarBusqueda(datos){
    var nuevoTR=document.createElement("tr"); //creamos un fila de una tabla
    nuevoTR.id=datos['idCliente'];

    var TD1=document.createElement("td");
    TD1.innerHTML=datos['tipoDocumento'];
    var TD2=document.createElement("td");
    TD2.innerHTML=datos['documentoIdentidad'];
    var TD3=document.createElement("td");
    TD3.innerHTML=datos['primerNombre']+datos['segundoNombre'];
    var TD4=document.createElement("td");
    TD4.innerHTML=datos['primerApellido']+datos['segundoApellido'];
    var TD6=document.createElement("td");
    TD6.innerHTML=datos['email']
    var TD5=document.createElement("td");
    TD5.innerHTML=datos['telefono'];

    nuevoTR.appendChild(TD1);
    nuevoTR.appendChild(TD2);
    nuevoTR.appendChild(TD3);
    nuevoTR.appendChild(TD4);
    nuevoTR.appendChild(TD6);
    nuevoTR.appendChild(TD5);

    var contenedor=document.getElementById("listarCliente");
    contenedor.appendChild(nuevoTR);
} 

//categoria



//Mostrar Reservacion

function mostrarReservacion(){
    var fecha = document.getElementById("fecha").value;
    var domicilio = document.getElementById("domicilio").value;
    var validar = document.getElementById("validar").value;
    var cancelado = document.getElementById("cancelado").value;
    

    $.ajax({
        url: '../controller/reservacioncontroller.php',
        type: 'GET',
        data: {fecha:fecha, domicilio:domicilio, validar:validar, cancelado:cancelado,funcion:"buscarTodasReservacion"}
    }).done(function (data){
        console.log(data);
        var reservacion=JSON.parse(data);
        var contenedor=document.getElementById("listarReservacion");
        contenedor.innerHTML="";
        for(i=0; i<reservacion.length; i++){
            reservas(reservacion[i]);
        }
        if(reservacion.length==0){
            crearTr(9, "listarReservacion");
        }
    })
}

function reservas(reservacion){
    var tr = document.createElement("tr");
    tr.id=reservacion['idReservacion'];

    var tdCliente = document.createElement("td");
    tdCliente.innerHTML=reservacion['primerNombre']+" "+reservacion['primerApellido'];
    var tdServicio = document.createElement("td");
    tdServicio.innerHTML=reservacion['nombreServicio'];
    var tdFecha = document.createElement("td");
    tdFecha.innerHTML=reservacion['fechaReservacion'];
    var tdHora = document.createElement("td");
    tdHora.innerHTML=reservacion['horaReservacion']+" a "+reservacion['horaFinal'];
    var tdDomicilio = document.createElement("td");
    if(reservacion['domicilio']==1){tdDomicilio.innerHTML="SI"}else{tdDomicilio.innerHTML="NO"};
    var tdDireccion = document.createElement("td");
    tdDireccion.innerHTML=reservacion['direccion'];
    var tdValidar = document.createElement("td");
    if(reservacion['validar']==1){tdValidar.innerHTML="SI"}else{tdValidar.innerHTML="NO"};
    var tdCancelar = document.createElement("td");
    if(reservacion['eliminado']==1){tdCancelar.innerHTML="SI"}else{tdCancelar.innerHTML="NO"};

    var tdBotones=document.createElement("td");
    var div1 = document.createElement("div");
    div1.className="btn-group";

    var boton1=document.createElement("button");
    boton1.type="button";
    boton1.className="btn btn-success";
    boton1.innerHTML="Acciones";
    var boton2=document.createElement("button");
    boton2.type="button";
    boton2.className="btn btn-success dropdown-toggle";
    boton2.setAttribute("data-toggle", "dropdown");
    var span=document.createElement("span");
    span.className="sr-only";

    div1.appendChild(boton1);
    div1.appendChild(boton2);
    boton2.appendChild(span);

    var div2=document.createElement("div");
    div2.className="dropdown-menu";
    div2.role="menu";

    var botonEditar=document.createElement("a");
    botonEditar.href="editarReservacion.php?idReservacion="+reservacion['idReservacion']+"&idCliente="+reservacion['idCliente'];
    botonEditar.className="dropdown-item";
    botonEditar.innerHTML='<i class="fas fa-edit"></i> Editar';

    var botonEliminar=document.createElement("a");
    botonEliminar.className="dropdown-item";
    botonEliminar.setAttribute("data-bs-toggle", "modal");
    botonEliminar.setAttribute("data-bs-target", "#cancelarReservacion");
    botonEliminar.value=reservacion['idReservacion'];
    botonEliminar.addEventListener('click', function(){
        cancelarReservacion(this);
    });
    botonEliminar.innerHTML='<i class="fas fa-trash-alt"></i> Eliminar';

    var botonValidar=document.createElement("a");
    botonValidar.className="dropdown-item";
    botonValidar.setAttribute("data-bs-toggle", "modal");
    botonValidar.setAttribute("data-bs-target", "#eliminarFormulario");
    botonValidar.value=reservacion['idReservacion'];
    botonValidar.addEventListener('click', function(){
        validarReservacion(this);
    });
    botonValidar.innerHTML='<i class="fas fa-check-circle"></i> Validar';

    div1.appendChild(div2);
    if(reservacion['validar']==0 && reservacion['eliminado']==0){
        div2.appendChild(botonEditar);
        div2.appendChild(botonValidar);
        div2.appendChild(botonEliminar);
    }else{
        div1=document.createElement('button');
        div1.innerHTML="Sin Acciones";
        div1.className="btn btn-dark";
        div1.disabled=true;
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

    var contenedor=document.getElementById("listarReservacion");
    contenedor.appendChild(tr);
}

//buscar cliente nueva reservacion 

function cliente(){
    var tipoDocumento = document.getElementById("tipoDocumento2").value;
    var documentoIdentidad = document.getElementById("documentoIdentidad2").value;

    $.ajax({
        url: '../controller/clienteController.php',
        type: 'GET',
        data: {tipoDocumento:tipoDocumento,documentoIdentidad:documentoIdentidad,funcion:"buscarReservacionPorCC"}
    }).done(function (data){
        // console.log(data);
        var datos=JSON.parse(data);
        var contenedor=document.getElementById("cliente");
        contenedor.innerHTML="";
        for(i=0; i<datos.length; i++){
        agregarBusqueda(datos[i]);
        }
    })
}

function agregarBusqueda(datos){
    var nuevoTR=document.createElement("tr"); //creamos un fila de una tabla
    nuevoTR.id=datos['idCliente'];
    var TD0=document.createElement("td");
    var botonSeleccionar=document.createElement("a");
    botonSeleccionar.className="btn btn-info";
    botonSeleccionar.innerHTML="Seleccionar";
    botonSeleccionar.type="button";
    botonSeleccionar.href="crearReservacion.php?idCliente="+datos['idCliente'];
    var TD1=document.createElement("td");
    TD1.innerHTML=datos['tipoDocumento'];
    var TD2=document.createElement("td");
    TD2.innerHTML=datos['documentoIdentidad'];
    var TD3=document.createElement("td");
    TD3.innerHTML=datos['primerNombre']+" "+datos['primerApellido'];

    TD0.appendChild(botonSeleccionar);
    nuevoTR.appendChild(TD0);
    nuevoTR.appendChild(TD1);
    nuevoTR.appendChild(TD2);
    nuevoTR.appendChild(TD3);

    var contenedor=document.getElementById("cliente");
    contenedor.appendChild(nuevoTR);

}

