
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

function validarReservacion(idReservacion){
    document.getElementById("validarReservacion").value=idReservacion;
}

function idProducto(idProducto){
    document.getElementById("idProducto").value=idProducto;
}

function eliminarReservacion(idReservacion){
    document.getElementById("eliminarReservacion").value=idReservacion;
}

function comprobarPedido(idPedido, idUser){
    document.getElementById("validarPedido").value=idPedido;
    document.getElementById("validarUsuario").value=idUser;
}

function cancelarPedido(idPedido, idUser){
    document.getElementById("pedido").value=idPedido;
    document.getElementById("cancelarUsuario").value=idUser;
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