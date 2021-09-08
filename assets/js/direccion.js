function confirmarDireccion(){
    var domicilio = document.getElementById("domicilio").value;
    var direccion = document.getElementById("direccion");

    if(domicilio=="1"){
        direccion.style="";
    }else{
        direccion.style="display: none;";
    }

    validarCampo();
    horarioReservacion();
}