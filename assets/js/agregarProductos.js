
function agregarProducto(idProducto, codigo, producto){
    var nuevoProducto=document.createElement("tr"); //creamos un fila de una tabla
    nuevoProducto.id=idProducto;
    var inputOculto=document.createElement("input");
    inputOculto.name="productos[]";
    inputOculto.value=idProducto;
    inputOculto.style="display: none;";
    var codigoFila=document.createElement("td");
    codigoFila.innerHTML=codigo;
    var productoFila=document.createElement("td");
    productoFila.innerHTML=producto;
    var cantidad=document.createElement("td");
    var inputCantidad=document.createElement("input");
    inputCantidad.name="cantidadProducto[]";
    inputCantidad.className="form-control";
    inputCantidad.min=1;
    inputCantidad.type="number";
    inputCantidad.value=1;
    cantidad.appendChild(inputCantidad);
    var eliminar=document.createElement("td");
    var botonEliminar=document.createElement("button");
    botonEliminar.className="btn btn-danger";
    botonEliminar.innerHTML="Eliminar";
    botonEliminar.type="button";
    botonEliminar.addEventListener('click', function(){
        eliminarTR(idProducto);
    });

    eliminar.appendChild(botonEliminar);
    
    nuevoProducto.appendChild(inputOculto);
    nuevoProducto.appendChild(codigoFila);
    nuevoProducto.appendChild(productoFila);
    nuevoProducto.appendChild(cantidad);
    nuevoProducto.appendChild(eliminar);
    

    var contenedor=document.getElementById("listarProducto");
    contenedor.appendChild(nuevoProducto);


}

function eliminarTR(idProducto){
    var contenedor=document.getElementById("listarProducto");
    var tr=document.getElementById(idProducto);

    contenedor.removeChild(tr);
}