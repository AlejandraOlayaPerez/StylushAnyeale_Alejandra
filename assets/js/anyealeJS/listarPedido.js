cargarJS();
//Cargar archivos al momemto de carga la pagina.
function cargarJS(){
    consultaPedido();
    fechaActual();
}

function fechaActual(){
    const fecha = new Date();
    date = fecha.getFullYear() + "-" + 0 + (fecha.getMonth() +1) + "-" + fecha.getDate();
    document.getElementById("fechaPedido").value=date;
}

function consultaPedido(){
    var fecha = document.getElementById("fechaPedido").value;
    var recibido = document.getElementById("recibido").value;
    var cancelado = document.getElementById("cancelado").value;
    var codigo = document.getElementById("codigo").value;

    $.ajax({
        url: '../controller/pedidoController.php',
        type: 'GET',
        data: {fecha:fecha, recibido:recibido, cancelado:cancelado, codigo:codigo,funcion:"buscarPedido"}
    }).done(function (data){
        // console.log(data);
        var pedido=JSON.parse(data);
        var contenedor=document.getElementById("filtroPedido");
        contenedor.innerHTML="";
        for(i=0; i<pedido.length; i++){
        agregarPedido(pedido[i]);
        }
        if(pedido.length==0){
            crearTr(5, "filtroPedido");
        }
    })
}

function agregarPedido(pedido){
    var tr = document.createElement("tr");
    tr.id=pedido['idPedido'];

    var tdCodigo = document.createElement("td");
    tdCodigo.innerHTML = pedido['idPedido'];
    var tdFecha = document.createElement("td");
    tdFecha.innerHTML = pedido['fechaPedido'];
    var tdRecibido = document.createElement("td");
    if(pedido['entregaPedido']==1){tdRecibido.innerHTML="SI"}else{tdRecibido.innerHTML="NO"};
    var tdCancelado = document.createElement("td");
    if(pedido['eliminado']==1){tdCancelado.innerHTML="SI"}else{tdCancelado.innerHTML="NO"};

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
    botonEditar.href="formularioEditarPedido.php?idPedido="+pedido['idPedido'];
    botonEditar.className="dropdown-item";
    botonEditar.innerHTML='<i class="fas fa-edit"></i> Editar';

    var botonSeguimiento=document.createElement("a");
    botonSeguimiento.href="seguimientoPedido.php?idPedido="+pedido['idPedido'];
    botonSeguimiento.className="dropdown-item";
    botonSeguimiento.innerHTML='<i class="fas fa-info"></i> Seguimiento';

    var botonEliminar=document.createElement("a");
    botonEliminar.className="dropdown-item";
    botonEliminar.setAttribute("data-bs-toggle", "modal");
    botonEliminar.setAttribute("data-bs-target", "#cancelarPedido");
    botonEliminar.value=pedido['idPedido'];
    botonEliminar.addEventListener('click', function(){
        cancelarPedido(this);
    });
    botonEliminar.innerHTML='<i class="fas fa-trash-alt"></i> Cancelar';

    var botonValidar=document.createElement("a");
    botonValidar.className="dropdown-item";
    botonValidar.setAttribute("data-bs-toggle", "modal");
    botonValidar.setAttribute("data-bs-target", "#eliminarFormulario");
    botonValidar.value=pedido['idPedido'];
    botonValidar.addEventListener('click', function(){
        comprobarPedido(this);
    });
    botonValidar.innerHTML='<i class="fas fa-check-circle"></i> Validar';

    var botonPDF=document.createElement("a");
    botonPDF.className="dropdown-item";
    botonPDF.href="pedidoPDF.php?idPedido="+pedido['idPedido'];
    botonPDF.innerHTML='<i class="fas fa-print"></i> Imprimir Pedido';
    
    const fecha = new Date();
    fechaActual = fecha.getFullYear() + "-" + 0 + (fecha.getMonth() +1) + "-" + fecha.getDate();

    div1.appendChild(div2);
    if(pedido['fechaPedido']==fechaActual && pedido['entregaPedido']==0 && pedido['eliminado']==0){
        div2.appendChild(botonEditar);
    }
    if (pedido['entregaPedido']==0 && pedido['eliminado']==0){
        div2.appendChild(botonValidar);
        div2.appendChild(botonEliminar);
    }
    div2.appendChild(botonPDF);
    div2.appendChild(botonSeguimiento);

    tdBotones.appendChild(div1);

    tr.appendChild(tdCodigo);
    tr.appendChild(tdFecha);
    tr.appendChild(tdRecibido);
    tr.appendChild(tdCancelado);
    tr.appendChild(tdBotones);

    var contenedor=document.getElementById("filtroPedido");
    contenedor.appendChild(tr);
}