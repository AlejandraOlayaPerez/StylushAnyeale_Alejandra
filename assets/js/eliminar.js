
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
    var p =document.getElementById("eliminarPagina").value=idPagina;
    var m=document.getElementById("eliminarModulo").value=idModulo;

}

function eliminarUsuarioRol(idUser){
    document.getElementById("eliminarUsuarioRol").value=idUser;
}

function validarReservacion(campo){
    document.getElementById("validarReservacion").value=campo.value;
}

function idProducto(campo){
    document.getElementById("idProducto").value=campo.value;
}

function eliminarReservacion(idReservacion){
    document.getElementById("eliminarReservacion").value=idReservacion;
}

function comprobarPedido(campo){
    document.getElementById("validarPedido").value=campo.value;
}

function cancelarPedido(campo){
    document.getElementById("pedido").value=campo.value;
}

function cancelarReservacion(campo){
    document.getElementById("reservacion").value=campo.value;
}

function eliminarEmpleadoCargo(idUser, idCargo){
    document.getElementById("eliminarEmpleado").value=idUser;
    document.getElementById("eliminarCargo").value=idCargo;
}

function eliminarProducto(campo){
    document.getElementById("eliminarProducto").value=campo.value;
}

function eliminarTags(campo){
    document.getElementById("eliminarTags").value=campo.value;
}

function eliminarCategoria(campo){
    document.getElementById("eliminarCategoria").value=campo.value;
}

function eliminarServicio(IdServicio){ 
    document.getElementById("eliminarServicio").value=IdServicio;
}

function eliminarEmpresa(IdEmpresa){ 
    document.getElementById("eliminarEmpresa").value=IdEmpresa;
}