function confirmarDireccion(campo){
    var domicilio = document.getElementById("domicilio").value;
    var direccion = document.getElementById("direccion");

    if(domicilio=="1"){
        direccion.required=true;
        direccion.style="";
    }else{
        direccion.required=false;
        direccion.style="display: none;";
    }

    validarCampo(campo);
    horarioReservacion();
}