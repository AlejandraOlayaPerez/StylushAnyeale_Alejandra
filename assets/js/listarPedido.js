function listarPedido(){
    var fechaFiltro= document.getElementById("filtroFecha").value;
    $.ajax({
        method: "GET", //metodo de envio
        url: "/anyeale_proyecto/stylushAnyeale_Alejandra/controller/pedidoController.php", //url donde se realiza la operacion
        contentType:"application/json",
        data: {"fechaFiltro": fechaFiltro, "funcion":"listarPedido"}, //archivo json, data enviamos
    }).done(
        function (data){
            console.log(data);
            
        } //recibimos la informacion de ajaxon
    );
}

