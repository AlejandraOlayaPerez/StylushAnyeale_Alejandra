function horarioReservacion(){
var fechaReservacion = document.getElementById("fechaReservacion").value;
var estilista = document.getElementById("estilista").value;
var domicilio = document.getElementById("domicilio").value;
var idServicio = document.getElementById("servicio").value;

if(fechaReservacion!="" && estilista!=""&& domicilio!=""){
    $.ajax({
        url: '../controller/reservacionController.php',
        type: 'POST',
        data: {estilista:estilista, fechaReservacion:fechaReservacion,domicilio:domicilio,idServicio:idServicio, funcion: "mostrarHorariosDisponibles"}
        }).done(function (data){
            console.log(data);
            var horariosDisponibles=JSON.parse(data);
            var contenedor=document.getElementById("horaReservacion");
            contenedor.innerHTML="";
            $('#horaReservacion').removeAttr('disabled');
            for(i=0; i<horariosDisponibles.length; i++){
                agregarHorario(horariosDisponibles[i]);
            }
        })
    }
}

function agregarHorario(horariosDisponibles){
    var horaReservacion=document.getElementById("horaReservacion");

    var optionHorario=document.createElement("option");
    optionHorario.value=horariosDisponibles;
    optionHorario.innerHTML=horariosDisponibles;
    horaReservacion.appendChild(optionHorario);
}


