function agregarEmpresa(idEmpresa, Nit, nombreEmpresa, direccion){
    var InputIdEmpresa=document.getElementById("idEmpresa");
    InputIdEmpresa.disabled=true;
    InputIdEmpresa.value=idEmpresa;

    var InputNit=document.getElementById("Nit");
    InputNit.disabled=true;
    InputNit.value=Nit;

    var InputNombreEmpresa=document.getElementById("nombreEmpresa");
    InputNombreEmpresa.disabled=true;
    InputNombreEmpresa.value=nombreEmpresa;

    var InputDireccion=document.getElementById("direccion");
    InputDireccion.disabled=true;
    InputDireccion.value=direccion;
}