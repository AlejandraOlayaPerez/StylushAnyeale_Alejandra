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