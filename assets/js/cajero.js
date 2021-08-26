function buscarCliente(){
    var tipoDocumento = document.getElementById("tipoDocumento2").value;
    var documentoIdentidad = document.getElementById("documentoIdentidad2").value;

    $.ajax({
        url: '../controller/clienteController.php',
        type: 'GET',
        data: {tipoDocumento:tipoDocumento,documentoIdentidad:documentoIdentidad,funcion:"buscarReservacionPorCC"}
    }).done(function (data){
        // var informacionCliente=document.getElementById("informacionCliente");
        console.log(data);
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
    var TD1=document.createElement("td");
    TD1.innerHTML=datos['tipoDocumento'];
    var TD2=document.createElement("td");
    TD2.innerHTML=datos['documentoIdentidad'];
    var TD3=document.createElement("td");
    TD3.innerHTML=datos['nombres'];
    var TD4=document.createElement("td");
    TD4.innerHTML=datos['servicio'];
    var TD5=document.createElement("td");
    TD5.innerHTML=datos['fechaReservacion'];
    var TD6=document.createElement("td");
    TD6.innerHTML=datos['horaReservacion'];
    var TD7=document.createElement("td");
    TD7.innerHTML=datos['precio'];

    nuevoTR.appendChild(TD1);
    nuevoTR.appendChild(TD2);
    nuevoTR.appendChild(TD3);
    nuevoTR.appendChild(TD4);
    nuevoTR.appendChild(TD5);
    nuevoTR.appendChild(TD6);
    nuevoTR.appendChild(TD7);

    var contenedor=document.getElementById("informacionCliente");
    contenedor.appendChild(nuevoTR);

}