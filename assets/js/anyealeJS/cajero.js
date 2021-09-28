function buscarCliente(){
    var tipoDocumento = document.getElementById("tipoDocumento2").value;
    var documentoIdentidad = document.getElementById("documentoIdentidad2").value;

    $.ajax({
        url: '../controller/clienteController.php',
        type: 'GET',
        data: {tipoDocumento:tipoDocumento,documentoIdentidad:documentoIdentidad,funcion:"buscarReservacionPorCC"}
    }).done(function (data){
        // console.log(data);
        var datos=JSON.parse(data);
        var contenedor=document.getElementById("informacionCliente");
        contenedor.innerHTML="";
        for(i=0; i<datos.length; i++){
        agregarBusqueda(datos[i]);
        }
    })
}

function agregarBusqueda(datos){
    var nuevoTR=document.createElement("tr"); //creamos un fila de una tabla
    nuevoTR.id=datos['idCliente'];
    var idCliente=document.getElementById("idCliente");
    idCliente.value=datos['idCliente'];
    var TD0=document.createElement("td");
    var botonSeleccionar=document.createElement("button");
    botonSeleccionar.className="btn btn-info";
    botonSeleccionar.innerHTML="Seleccionar";
    botonSeleccionar.type="button";
    // botonSeleccionar.data-bs-dismiss;"modal";
    botonSeleccionar.addEventListener('click', function(){
        agregarCliente(datos['idCliente'], datos['tipoDocumento'], datos['documentoIdentidad'], datos['primerNombre'], datos['segundoNombre'],
        datos['primerApellido'], datos['segundoApellido']);
    });
    var TD1=document.createElement("td");
    TD1.innerHTML=datos['tipoDocumento'];
    var TD2=document.createElement("td");
    TD2.innerHTML=datos['documentoIdentidad'];
    var TD3=document.createElement("td");
    TD3.innerHTML=datos['primerNombre']+datos['segundoNombre'];
    var TD4=document.createElement("td");
    TD4.innerHTML=datos['primerApellido']+datos['segundoApellido'];
    var TD5=document.createElement("td");
    TD5.innerHTML=datos['telefono'];

    TD0.appendChild(botonSeleccionar);
    nuevoTR.appendChild(TD0);
    nuevoTR.appendChild(TD1);
    nuevoTR.appendChild(TD2);
    nuevoTR.appendChild(TD3);
    nuevoTR.appendChild(TD4);
    nuevoTR.appendChild(TD5);

    var contenedor=document.getElementById("informacionCliente");
    contenedor.appendChild(nuevoTR);


}

var idC=0;
function crearReservacion(){
    // var idCliente=document.getElementById('idCliente').value;
    window.location.href="nuevaReservacion.php?idCliente="+idC;

}

function agregarCliente(idCliente, tipoDocumento, documentoIdentidad, primerNombre, primerApellido,telefono, idReservacion, fechaReservacion, horaReservacion, domicilio, direccion, precio, validar, IdServicio, nombreServicio){
    var InputIdCliente=document.getElementById("idCliente");
    InputIdCliente.value=idCliente;

    var InputTipoDocumento=document.getElementById("tipoDocumento");
    InputTipoDocumento.value=tipoDocumento;

    var InputDocumentoIdentidad=document.getElementById("documentoIdentidad");
    InputDocumentoIdentidad.value=documentoIdentidad;

    var InputPrimerNombre=document.getElementById("primerNombre");
    InputPrimerNombre.value=primerNombre;

    var InputPrimerApellido=document.getElementById("primerApellido");
    InputPrimerApellido.value=primerApellido;

    var InputTelefono=document.getElementById("telefono");
    InputTelefono.value=telefono;

    mostrarReservaciones();
    $('#modal-xl').modal('hide');

    idC=idCliente;

    var botonAgregar = document.getElementById("nuevaReservacion");
    botonAgregar.style="";
}

    function mostrarReservaciones(){
        var idCliente = document.getElementById("idCliente").value;

    $.ajax({
        url: '../controller/reservacionController.php',
        type: 'GET',
        data: {idCliente:idCliente,funcion:"buscarReservacionIdAjax"}
    }).done(function (data){
        // console.log(data);
        var datos=JSON.parse(data);
        var contenedor=document.getElementById("informacionCliente");
        contenedor.innerHTML="";
        for(i=0; i<datos.length; i++){
        agregarReservacion(datos[i]);
        }
    })
    }

    function agregarReservacion(datos){
    var contenedor=document.getElementById("informacionReservacion");
    var tabla=document.getElementById("tablaReservacion");
    tabla.style="";
    var trBody=document.createElement("tr");
    trBody.id=datos['idReservacion'];
    var tdcheckBox=document.createElement("td");
    var cinput=document.createElement("input");
    cinput.setAttribute("type","checkbox");
    cinput.setAttribute("value","datos['idReservacion']");
    cinput.setAttribute("id","reservaciones[]");
    cinput.setAttribute("name","reservaciones[]");
    var tdServicio=document.createElement("td");
    tdServicio.innerHTML=datos['nombreServicio'];
    var tdFecha=document.createElement("td");
    tdFecha.innerHTML=datos['fechaReservacion'];
    var tdHora=document.createElement("td");
    tdHora.innerHTML=datos['horaReservacion'];
    var tdDomicilio=document.createElement("td");
    if(datos['domicilio']==1){tdDomicilio.innerHTML="SI"}else{tdDomicilio.innerHTML="NO"};
    var tdDireccion=document.createElement("td");
    tdDireccion.innerHTML=datos['direccion'];
    var tdPrecio=document.createElement("td");
    tdPrecio.className="precio";
    tdPrecio.innerHTML=datos['precio'];
    var tdValidar=document.createElement("td");
    if(datos['validar']==1){tdValidar.innerHTML="SI"}else{tdValidar.innerHTML="NO"};

    tdcheckBox.appendChild(cinput);
    trBody.appendChild(tdcheckBox);
    trBody.appendChild(tdServicio);
    trBody.appendChild(tdFecha);
    trBody.appendChild(tdHora);
    trBody.appendChild(tdDomicilio);
    trBody.appendChild(tdDireccion);
    trBody.appendChild(tdPrecio);
    trBody.appendChild(tdValidar);

    contenedor.appendChild(trBody);
    }
    

    var pagina=1;
    var numPagina=0;
    
    //Tabla para los productos
    function buscarProducto(){
        var codigoProducto = document.getElementById("codigoProducto").value;
        var nombreProducto = document.getElementById("nombreProducto").value;
        $.ajax({
            url: '../controller/clienteController.php',
            type: 'GET',
            data: {
                codigoProducto:codigoProducto,
                nombreProducto:nombreProducto,
                funcion:"paginacionProducto"}
        }).done(function (data){
            var numRegistro=JSON.parse(data);
            var numeroRegistro = numRegistro[0]['numRegistro'];
            numPagina=parseInt(numeroRegistro/5);
            if(numeroRegistro%5>0) numPagina++;

            var contenedorUL = document.getElementById("contenedorUL");
            contenedorUL.innerHTML="";

            var li1 = document.createElement("li");
            li1.className="page-item";
            var a1 = document.createElement("button");
            a1.className="page-link";
            a1.style.fontFamily="Times New Roman', Times, serif";
            // a1.addEventListener('click', function(){
            //     pagina=1;
            //     buscarProducto();
            // });
            // // a1.href="cajero.php?pagina=1";
            // a1.innerHTML="&laquo;";
            // li1.innerHTML="<a onClick='pagina=1;
            //      buscarProducto();'"
            li1.appendChild(a1);
            contenedorUL.appendChild(li1);

            for (i=1; i<=numPagina; i++){
                var li2 = document.createElement("li");
                li2.className="page-item";
                var a2 = document.createElement("button");
                a2.className="page-link";
                a2.style.fontFamily="Times New Roman', Times, serif";
                a2.addEventListener('click', function(i){
                    pagina=i;
                    buscarProducto();
                });
                // a2.href="cajero.php?pagina="+i;
                a2.innerHTML=i;

                li2.appendChild(a2);
                contenedorUL.appendChild(li2);
            }

            var li3 = document.createElement("li");
            li3.className="page-item";
            var a3 = document.createElement("button");
            a3.className="page-link";
            a3.style.fontFamily="Times New Roman', Times, serif";
            a3.addEventListener('click', function(){
                pagina=numPagina;
                buscarProducto();
            });
            // a3.href="cajero.php?pagina="+numPagina;
            a3.innerHTML="&raquo;";

            li3.appendChild(a3);
            contenedorUL.appendChild(li3);
        })

    $.ajax({
        url: '../controller/clienteController.php',
        type: 'GET',
        data: {
            codigoProducto:codigoProducto,
            nombreProducto:nombreProducto,
            pagina:pagina,
            funcion:"buscarProductoAjax"}
    }).done(function (data){
        // console.log(data);
        var datosProducto=JSON.parse(data);
        var contenedor=document.getElementById("informacionProducto");
        contenedor.innerHTML="";
        for(i=0; i<datosProducto.length; i++){
        agregarProducto(datosProducto[i]);
        }
    })
}




function agregarProducto(datosProducto){
    var contenedor=document.getElementById("informacionProducto");
    var trProducto=document.createElement("tr");
    trProducto.id=datosProducto['IdProducto'];
    var boton=document.createElement("td");
    var botonSeleecionarProducto=document.createElement("button");
        botonSeleecionarProducto.className="btn btn-info";
        botonSeleecionarProducto.innerHTML="Seleccionar";
        botonSeleecionarProducto.type="button";
        botonSeleecionarProducto.addEventListener('click', function(){
            mostrarProductos(datosProducto['IdProducto'], datosProducto['codigoProducto'], datosProducto['nombreProducto'],
            datosProducto['valorUnitario']);
        });
    var tdCodigo=document.createElement("td");
    tdCodigo.innerHTML=datosProducto['codigoProducto'];
    var tdNombreProducto=document.createElement("td");
    tdNombreProducto.innerHTML=datosProducto['nombreProducto'];
    var tdValorUnitario=document.createElement("td");
    tdValorUnitario.innerHTML=datosProducto['valorUnitario'];

    boton.appendChild(botonSeleecionarProducto);
    trProducto.appendChild(boton);
    trProducto.appendChild(tdCodigo);
    trProducto.appendChild(tdNombreProducto);
    trProducto.appendChild(tdValorUnitario);

    contenedor.appendChild(trProducto);

}

function mostrarProductos(IdProducto, codigoProducto, nombreProducto, valorUnitario){
    var contenedor=document.getElementById("tablaFacturaProducto");
    var tablaProducto=document.getElementById("tablaProducto");
    tablaProducto.style="";
    var trProducto=document.createElement("tr");
    trProducto.id=IdProducto;
    var tdCProducto=document.createElement("td");
    tdCProducto.innerHTML=codigoProducto;
    var tdNProducto=document.createElement("td");
    tdNProducto.innerHTML=nombreProducto;
    var tdCantidadProducto=document.createElement("td");
    var inputCantidadProducto=document.createElement("input");
    inputCantidadProducto.type="number";
    inputCantidadProducto.value="1";
    inputCantidadProducto.min="1";
    inputCantidadProducto.className="cantidadProducto";
    inputCantidadProducto.addEventListener('change', function(){
        calcularTotalProducto();
    });
    var tdVUnitario=document.createElement("td");
    tdVUnitario.className="valorUnitario";
    tdVUnitario.innerHTML=valorUnitario;
    var tdEliminar=document.createElement("td");
    var eliminar=document.createElement("button");
    eliminar.className="btn btn-danger";
    eliminar.innerHTML="Eliminar";
    eliminar.type="button";
    eliminar.addEventListener('click', function(){
        eliminarTDProducto(IdProducto);
    });

    trProducto.appendChild(tdCProducto);
    trProducto.appendChild(tdNProducto);
    tdCantidadProducto.appendChild(inputCantidadProducto);
    trProducto.appendChild(tdCantidadProducto);
    trProducto.appendChild(tdVUnitario);
    tdEliminar.appendChild(eliminar);
    trProducto.appendChild(tdEliminar);
   
    contenedor.appendChild(trProducto);
    calcularTotalProducto();
}

function calcularTotalProducto(){
    var contenedor=document.getElementById("tablaFacturaProducto");
    var producto=contenedor.querySelectorAll('tr');
    var totalProducto=0;
    for (i=0; i<producto.length; i++){
    var precio = producto[i].getElementsByClassName('valorUnitario')[0].innerHTML;
    var cantidad = producto[i].getElementsByClassName('cantidadProducto')[0].value;
    var total=parseFloat(precio)*cantidad;
    totalProducto+=total;
    }
    var total = document.getElementById("totalProducto");
    total.innerHTML=totalProducto;
}


function eliminarTDProducto(IdProducto){
    var contenedor=document.getElementById("tablaFacturaProducto");
    var tr=document.getElementById(IdProducto);

    contenedor.removeChild(tr);
    calcularTotalProducto();
}



