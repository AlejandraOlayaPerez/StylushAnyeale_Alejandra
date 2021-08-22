function agregarReservacion(idCliente, tipoDocumento, documentoIdentidad, primerNombre, primerApellido,
idReservacion, servicio, fechaReservacion, horaReservacion, precio){
    var InputIdCliente=document.getElementById("idCliente");
    InputIdCliente.value=idCliente;

    var InputTipoDocumento=document.getElementById("tipoDocumento");
    InputTipoDocumento.value=tipoDocumento;

    var InputDocumentoIdentidad=document.getElementById("documentoIdentidad");
    InputDocumentoIdentidad.value=documentoIdentidad;

    var InputPrimerNombre=document.getElementById("primerNombre");
    InputPrimerNombre.value=primerNombre;

    var InputPrimerApellido=document.getElementById("primerApellido");
    InputPrimerApellido.value=primerApellido;

    var InputIdReservacion=document.getElementById("idReservacion");
    InputIdReservacion.value=idReservacion;

    var InputServicio=document.getElementById("servicio");
    InputServicio.value=servicio;

    var InputFechaReservacion=document.getElementById("fechaReservacion");
    InputFechaReservacion.value=fechaReservacion;
    
    var InputHoraReservacion=document.getElementById("horaReservacion");
    InputHoraReservacion.value=horaReservacion;

    var InputPrecio=document.getElementById("precio");
    InputPrecio.value=precio;
}
