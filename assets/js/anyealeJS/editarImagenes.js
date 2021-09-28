function eliminarFoto(idFoto){
    var tipoDocumento = document.getElementById("tipoDocumento2").value;

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