function buscarProducto(){
    var busquedaProducto = document.getElementById("busquedaProducto").value;

    $.ajax({
        url: '../controller/productoServicioController.php',
        type: 'GET',
        data: {busquedaProducto:busquedaProducto,funcion:"buscarProductoInventario"}
    }).done(function (data){
        // console.log(data);
        var datos=JSON.parse(data);
        var contenedor=document.getElementById("productosBusqueda");
        contenedor.innerHTML="";
        for(i=0; i<datos.length; i++){
            agregarBusqueda(datos[i]);
        }
    })
}

function agregarBusqueda(datos){
    var tr=document.createElement("tr");
    tr.id=datos['IdProducto'];
    var idProducto=document.createElement("input");
    idProducto.value=datos['IdProducto'];
    idProducto.style="display:none";
    var td1 = document.createElement("td");
    td1.innerHTML=datos['codigoProducto'];
    var td2=document.createElement("td");
    td2.innerHTML=datos['nombreProducto'];
    var td3 = document.createElement("td");
    td3.innerHTML=datos['cantidad'];
    var td4 = document.createElement("td");
    td4.innerHTML = datos['valorUnitario'];
    
    tr.appendChild(idProducto);
    tr.appendChild(td1);
    tr.appendChild(td2);
    tr.appendChild(td3);
    tr.appendChild(td4);
    
    var contenedor = document.getElementById("productosBusqueda");
    contenedor.appendChild(tr);
}

function buscarFactura(){
    var fechaInicio = document.getElementById("fechaInicio").value;
    var fechaFinal = document.getElementById("fechaFinal").value;

    $.ajax({
        url: '../controller/productoServicioController.php',
        type: 'GET',
        data: {fechaInicio:fechaInicio,fechaFinal:fechaFinal,funcion:"rangoFechas"}
    }).done(function (data){
        // console.log(data);
        var datosFactura=JSON.parse(data);
        var contenedor=document.getElementById("facturas");
        contenedor.innerHTML="";
        for(i=0; i<datosFactura.length; i++){
            agregarFactura(datosFactura[i]);
        }
    })
}

function agregarFactura(datosFactura){
    var tr=document.createElement("tr");
    tr.id=datosFactura['idFactura'];
    var idProducto=document.createElement("input");
    idProducto.value=datosFactura['idFactura'];
    idProducto.style="display:none";
    var td1 = document.createElement("td");
    td1.innerHTML=datosFactura['fechaFactura'];
    var td3 = document.createElement("td");
    td3.innerHTML=datosFactura['producto'];
    var td4 = document.createElement("td");
    td4.innerHTML = datosFactura['cantidad'];
    var td5 = document.createElement("td");
    td5.innerHTML = datosFactura['precio'];

    tr.appendChild(idProducto);
    tr.appendChild(td1);
    tr.appendChild(td3);
    tr.appendChild(td4);
    tr.appendChild(td5);
    
    var contenedor = document.getElementById("facturas");
    contenedor.appendChild(tr);
}