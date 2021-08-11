function agregarEmpresa(idEmpresa, Nit, nombreEmpresa, direccion){
    var InputIdEmpresa=document.getElementById("idEmpresa");
    InputIdEmpresa.value=idEmpresa;

    var InputNit=document.getElementById("Nit");
    InputNit.value=Nit;

    var InputNombreEmpresa=document.getElementById("nombreEmpresa");
    InputNombreEmpresa.value=nombreEmpresa;

    var InputDireccion=document.getElementById("direccion");
    InputDireccion.value=direccion;
}