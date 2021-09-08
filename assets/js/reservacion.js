function traerEstilistas(){
var idServicio = document.getElementById("servicio").value;

$.ajax({ 
    url: '../controller/usuarioController.php', //URL donde se va a realizar la peticion
    type: 'POST', //metodo que se usara
    data: {idServicio:idServicio,funcion:"usuarioCargo"} //parametros para hacer la petecion
}).done(function (data){
    var estilista=document.getElementById("estilista");
    estilista.innerHTML="";
    var optionEstilista = document.createElement("option");
    optionEstilista .value="";
    // optionEstilista.disabled=true;
    optionEstilista.innerHTML="Seleecione una opción";
    estilista.appendChild(optionEstilista);
        //Ejecuta funcion
        console.log(data);
        
        var datos=JSON.parse(data)
        for(i=0; i<datos.length; i++){
        agregarEstilista(datos[i]);     
        }
        
    });
}

function agregarEstilista(datos){
    var estilista=document.getElementById("estilista");
    $('#estilista').removeAttr('disabled');

    var optionEstilista = document.createElement("option");
    optionEstilista .value=datos['idUser'];
    optionEstilista.innerHTML=datos['nombre'];
    estilista.appendChild(optionEstilista);
}

function Actualizar(){
    var idUser=document.getElementById("idUser").value;
    document.getElementById("estilista").value=idUser;

    var horaReservacion=document.getElementById("reservacioHora").value;
    document.getElementById("horaReservacion").value=horaReservacion;

}