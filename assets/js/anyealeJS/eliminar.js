function eliminarEmpleado(idEmpleado, idCargo) {
    document.getElementById("eliminarEmpleado").value = idEmpleado;
    document.getElementById("eliminarCargo").value = idCargo;
}

function eliminarCargo(campo) {
    document.getElementById("eliminarCargo").value = campo.value;
}

function eliminarUsuario(campo) {
    document.getElementById("eliminarUser").value = campo.value;
}

function eliminarRol(campo) {
    document.getElementById("eliminarRol").value = campo.value;
}

function eliminarModulo(campo) {
    document.getElementById("eliminarModulo").value = campo.value;
}

function eliminarPagina(campo) {
    var p = document.getElementById("eliminarPagina").value = campo.value;
}

function eliminarDetalleCategoria(idProducto) {
    document.getElementById("idProducto").value = idProducto;

}

function eliminarUsuarioRol(campo) {
    document.getElementById("eliminarUsuarioRol").value = campo.value;
}

function validarReservacion(campo) {
    document.getElementById("validarReservacion").value = campo.value;
}

function cantidadInventario(campo) {
    document.getElementById("idProducto").value = campo.value;
}

function eliminarReservacion(idReservacion) {
    document.getElementById("eliminarReservacion").value = idReservacion;
}

function eliminarProductoCarrito(idProducto, idFactura) {
    document.getElementById("idProducto").value = idProducto;
    document.getElementById("idFactura").value = idFactura;
}

function pagoReservacion(campo) {
    document.getElementById("idReservacion").value = campo.value;
}

function validarFactura(campo) {
    document.getElementById("validar").value = campo.value;
}

function cancelarFactura(campo) {
    document.getElementById("cancelar").value = campo.value;
}

function comprobarPedido(campo) {
    document.getElementById("validarPedido").value = campo.value;
}

function cancelarPedido(campo) {
    document.getElementById("pedido").value = campo.value;
}

function cancelarReservacion(campo) {
    document.getElementById("reservacion").value = campo.value;
}

function eliminarEmpleadoCargo(idUser, idCargo) {
    document.getElementById("eliminarEmpleado").value = idUser;
    document.getElementById("eliminarCargo").value = idCargo;
}

function eliminarProducto(campo) {
    document.getElementById("eliminarProducto").value = campo.value;
}

function eliminarTags(campo) {
    document.getElementById("eliminarTags").value = campo.value;
}

function eliminarCategoria(campo) {
    document.getElementById("eliminarCategoria").value = campo.value;
}

function eliminarServicio(campo) {
    document.getElementById("eliminarServicio").value = campo.value;
}

function eliminarEmpresa(campo) {
    document.getElementById("eliminarEmpresa").value = campo.value;
}