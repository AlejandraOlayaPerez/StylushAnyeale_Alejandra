
function eliminarEmpleado(idEmpleado, idCargo){
    document.getElementById("eliminarEmpleado").value=idEmpleado;
    document.getElementById("eliminarCargo").value=idCargo;
}

function eliminarCargo(idCargo){
    document.getElementById("eliminarCargo").value=idCargo;
}

function eliminarUsuario(idUser){
    document.getElementById("eliminarUser").value=idUser;
}

function eliminarRol(idRol){
    document.getElementById("eliminarRol").value=idRol;
}

function eliminarModulo(idModulo){
    document.getElementById("eliminarModulo").value=idModulo;
}

function eliminarPagina(idPagina, idModulo){
    document.getElementById("eliminarPagina").value=idPagina;
    document.getElementById("eliminarModulo").value=idModulo;
}