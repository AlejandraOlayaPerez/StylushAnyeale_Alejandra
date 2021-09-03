function confirmarDireccion(){
    var domicilio = document.getElementById("domicilio").value;
    var direccion = document.getElementById("direccion");

    if(domicilio=="SI"){
        direccion.style="";
    }else{
        direccion.style="display: none;";
    }

    horarioReservacion();
}