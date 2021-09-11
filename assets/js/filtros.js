function buscarProducto(){
    var codigoProducto = document.getElementById("codigoProducto").value;
        var nombreProducto = document.getElementById("nombreProducto").value;
        $.ajax({
            url: '../controller/productoServicioController.php',
            type: 'GET',
            data: {
                codigoProducto:codigoProducto,
                nombreProducto:nombreProducto,
                funcion:"busquedaProducto"}
        }).done(function (data){
        // console.log(data);
        var datosProducto=JSON.parse(data);
        var contenedor=document.getElementById("listaProducto");
        contenedor.innerHTML="";
        for(i=0; i<datosProducto.length; i++){
            agregarProducto(datosProducto[i]);
        }
    })
}

function agregarProducto(datosProducto){
    var tr=document.createElement("tr");
    var idProducto=document.createElement("input");
    idProducto.value=datosFactura['IdProducto'];
    idProducto.style="display:none";
    var td1 = document.createElement("td");
    td1.innerHTML=datosFactura['codigoProducto'];
    var td3 = document.createElement("td");
    td3.innerHTML=datosFactura['nombreProducto'];
    var td4 = document.createElement("td");
    td4.innerHTML = datosFactura['cantidad'];
    var td5 = document.createElement("td");
    td5.innerHTML = datosFactura['precio'];
    var td6 = document.createElement("td");
    var botonEditar = document.createElement("a")
    botonEditar.href=window.location.href="formularioEditarProducto.php?idProducto="+datosProducto['IdProducto'];
    botonEditar.className="btn btn-warning";
    var i = document.createElement("i");
    i.className="fas fa-edit";
    botonEditar.appendChild(i);
    botonEditar.innerHTML="Editar";

    td6.appendChild(botonEditar);




    // var botonSeleccionar=document.createElement("button");
    // botonSeleccionar.className="btn btn-info";
    // botonSeleccionar.innerHTML="Seleccionar";
    // botonSeleccionar.type="button";
    // // botonSeleccionar.data-bs-dismiss;"modal";
    // botonSeleccionar.addEventListener('click', function(){
    //     agregarCliente(datos['idCliente'], datos['tipoDocumento'], datos['documentoIdentidad'], datos['primerNombre'], datos['segundoNombre'],
    //     datos['primerApellido'], datos['segundoApellido']);
    // });

    tr.appendChild(idProducto);
    tr.appendChild(td1);
    tr.appendChild(td3);
    tr.appendChild(td4);
    tr.appendChild(td5);
    tr.appendChild(td6);
    
    var contenedor = document.getElementById("listaProducto");
    contenedor.appendChild(tr);
}