//Carga la funcion
cargarJS();
//Cargar archivos al momemto de carga la pagina.
function cargarJS() {
    productoServicio();
}

function productoServicio(){
    var idServicio=document.getElementById("idServicio").value;
    $.ajax({
        url: '../controller/productoServicioController.php',
        type: 'POST',
        data: {idServicio:idServicio, funcion:"traerServicio"}
    }).done(function (data){
        console.log(data);
        var servicio=JSON.parse(data);
        var contenedor=document.getElementById("listarProducto");
        contenedor.innerHTML="";
        for(i=0; i<servicio.length; i++){
            productoDelServicio(servicio[i]);

        }
        if(servicio.length==0){
            crearTr(4, "listarProducto");
        }
    })
}

function productoDelServicio(servicio) {
    var tr = document.createElement("tr");
tr.id=servicio['idProducto'];
var inputOculto=document.createElement("input");
inputOculto.name="productos[]";
inputOculto.value=servicio['idProducto'];
inputOculto.id=servicio['idProducto'];
inputOculto.style="display: none;";
tr.appendChild(inputOculto);
var tdCodigo=document.createElement("td");
tdCodigo.innerHTML=servicio['codigoProducto'];
var tdProducto=document.createElement("td");
tdProducto.innerHTML=servicio['producto'];
var tdCantidad = document.createElement("td");
var inputCantidad = document.createElement("input");
inputCantidad.type="number";
inputCantidad.className="form-control";
inputCantidad.name="cantidadProducto[]";
inputCantidad.value=servicio['cantidad'];

tdCantidad.appendChild(inputCantidad);

var tdEliminar=document.createElement("td");
var botonEliminar=document.createElement("button");
botonEliminar.className="btn btn-danger";
botonEliminar.innerHTML="Eliminar";
botonEliminar.type="button";
botonEliminar.addEventListener('click', function(){
    eliminarTR(servicio['idProducto']);
});

tdEliminar.appendChild(botonEliminar);

tr.appendChild(tdCodigo);
tr.appendChild(tdProducto);
tr.appendChild(tdCantidad);
tr.appendChild(tdEliminar);

var contenedor=document.getElementById("listarProducto");
contenedor.appendChild(tr);
}


function eliminarTR(idProducto){
    var contenedor=document.getElementById("listarProducto");
    var tr=document.getElementById(idProducto);
    var trVacio=document.getElementById("trVacio");

    contenedor.removeChild(tr);

    if(contenedor.querySelectorAll('input').length==0){
        crearTr(4, "listarProducto");
    }
    
}
