//funcion para buscar Clientes
function buscarCliente(){
    var tipoDocumento = document.getElementById("tipoDocumento2").value;
    var documentoIdentidad = document.getElementById("documentoIdentidad2").value;

    $.ajax({
        url: '../controller/clienteController.php',
        type: 'GET',
        data: {tipoDocumento:tipoDocumento,documentoIdentidad:documentoIdentidad,funcion:"buscarReservacionPorCC"}
    }).done(function (data){
        // console.log(data);
        var datos=JSON.parse(data);
        var contenedor=document.getElementById("listarCliente");
        contenedor.innerHTML="";
        for(i=0; i<datos.length; i++){
        agregarBusqueda(datos[i]);
        }
    })
}

function agregarBusqueda(datos){
    var nuevoTR=document.createElement("tr"); //creamos un fila de una tabla
    nuevoTR.id=datos['idCliente'];

    var TD1=document.createElement("td");
    TD1.innerHTML=datos['tipoDocumento'];
    var TD2=document.createElement("td");
    TD2.innerHTML=datos['documentoIdentidad'];
    var TD3=document.createElement("td");
    TD3.innerHTML=datos['primerNombre']+datos['segundoNombre'];
    var TD4=document.createElement("td");
    TD4.innerHTML=datos['primerApellido']+datos['segundoApellido'];
    var TD6=document.createElement("td");
    TD6.innerHTML=datos['email']
    var TD5=document.createElement("td");
    TD5.innerHTML=datos['telefono'];

    nuevoTR.appendChild(TD1);
    nuevoTR.appendChild(TD2);
    nuevoTR.appendChild(TD3);
    nuevoTR.appendChild(TD4);
    nuevoTR.appendChild(TD6);
    nuevoTR.appendChild(TD5);

    var contenedor=document.getElementById("listarCliente");
    contenedor.appendChild(nuevoTR);
}

//Funcion para buscar productos

function buscarProducto(){
    var busquedaProducto = document.getElementById("busquedaProducto").value;

    $.ajax({
        url: '../controller/productoServicioController.php',
        type: 'GET',
        data: {busquedaProducto:busquedaProducto,funcion:"buscarProductoInventario"}
    }).done(function (data){
        // console.log(data);
        var datos=JSON.parse(data);
        var contenedor=document.getElementById("productosBusqueda");
        contenedor.innerHTML="";
        for(i=0; i<datos.length; i++){
            productoBusqueda(datos[i]);
        }
    })
}

function productoBusqueda(datos){
    var tr=document.createElement("tr");
    tr.id=datos['IdProducto'];
    var tdCodigo=document.createElement("td");
    tdCodigo.innerHTML=datos['codigoProducto'];
    var tdProducto=document.createElement("td");
    tdProducto.innerHTML=datos['nombreProducto'];
    var tdCantidad=document.createElement("td");
    tdCantidad.innerHTML=datos['cantidad'];
    var tdPrecio=document.createElement("td");
    tdPrecio.innerHTML=datos['valorUnitario'];

    var tdBotones=document.createElement("td");
    var div1 = document.createElement("div");
    div1.className="btn-group";

    var boton1=document.createElement("button");
    boton1.type="button";
    boton1.className="btn btn-success";
    boton1.innerHTML="Acciones";
    var boton2=document.createElement("button");
    boton2.type="button";
    boton2.className="btn btn-success dropdown-toggle";
    boton2.setAttribute("data-toggle", "dropdown");
    var span=document.createElement("span");
    span.className="sr-only";

    div1.appendChild(boton1);
    div1.appendChild(boton2);
    boton2.appendChild(span);

    var div2=document.createElement("div");
    div2.className="dropdown-menu";
    div2.role="menu";

    var botonEditar=document.createElement("a");
    botonEditar.href="formularioEditarProducto.php?idProducto="+datos['IdProducto'];
    botonEditar.className="dropdown-item";
    botonEditar.innerHTML='<i class="fas fa-edit"></i> Editar';

    var botonRestar=document.createElement("a");
    botonRestar.className="dropdown-item";
    botonRestar.setAttribute("data-toggle", "modal");
    botonRestar.setAttribute("data-target", "#modal-default");
    botonRestar.value=datos['IdProducto'];
    botonRestar.addEventListener('click', function(){
        idProducto(this);
    });
    botonRestar.innerHTML='<i class="fas fa-minus"></i> Cantidad';

    var botonEliminar=document.createElement("a");
    botonEliminar.className="dropdown-item";
    botonEliminar.setAttribute("data-bs-toggle", "modal");
    botonEliminar.setAttribute("data-bs-target", "#eliminarFormulario");
    botonEliminar.value=datos['IdProducto'];
    botonEliminar.addEventListener('click', function(){
        eliminarProducto(this);
    });
    botonEliminar.innerHTML='<i class="fas fa-trash-alt"></i> Eliminar';
    
    div1.appendChild(div2);

    div2.appendChild(botonEditar);
    div2.appendChild(botonRestar);
    div2.appendChild(botonEliminar);

    tdBotones.appendChild(div1);
    

    tr.appendChild(tdCodigo);
    tr.appendChild(tdProducto);
    tr.appendChild(tdCantidad);
    tr.appendChild(tdPrecio);
    tr.appendChild(tdBotones);
    

    var contenedor=document.getElementById("productosBusqueda");
    contenedor.appendChild(tr);
}

//tags

function buscarTags(){
    var tags = document.getElementById("tagsBusqueda").value;

    $.ajax({
        url: '../controller/productoServicioController.php',
        type: 'GET',
        data: {tags:tags,funcion:"buscarTags"}
    }).done(function (data){
        // console.log(data);
        var tags=JSON.parse(data);
        var contenedor=document.getElementById("tags");
        contenedor.innerHTML="";
        for(i=0; i<tags.length; i++){
        agregarTags(tags[i]);
        }
    })
}

function agregarTags(tags){
var tagstr = document.createElement("tr");
tagstr.id=tags['idPalabraClave'];

var tdTags = document.createElement("td");
tdTags.innerHTML=tags['palabraClave'];

var tdBotones=document.createElement("td");
var botonEditar=document.createElement("a");
botonEditar.href="formularioEditarTags.php?idPalabrasClaves="+tags['idPalabraClave'];
botonEditar.className="btn btn-warning";
botonEditar.style="margin: 4px";
botonEditar.innerHTML='<i class="fas fa-edit"></i> Editar';

var botonEliminar=document.createElement("a");
botonEliminar.className="btn btn-danger";
botonEliminar.setAttribute("data-bs-toggle", "modal");
botonEliminar.setAttribute("data-bs-target", "#eliminarFormulario");
botonEliminar.value=tags['idPalabraClave'];
botonEliminar.addEventListener('click', function(){
    eliminarTags(this);
});
botonEliminar.innerHTML='<i class="fas fa-trash-alt"></i> Eliminar';

tdBotones.appendChild(botonEditar);
tdBotones.appendChild(botonEliminar);

tagstr.appendChild(tdTags);
tagstr.appendChild(tdBotones);

var contenedor=document.getElementById("tags");
contenedor.appendChild(tagstr);
}

//categoria

function buscarCategoria(){
    var categoria = document.getElementById("categoriaBusqueda").value;

    $.ajax({
        url: '../controller/productoServicioController.php',
        type: 'GET',
        data: {categoria:categoria,funcion:"buscarCategoria"}
    }).done(function (data){
        console.log(data);
        var categoria=JSON.parse(data);
        var contenedor=document.getElementById("categoria");
        contenedor.innerHTML="";
        for(i=0; i<categoria.length; i++){
        agregarCategoria(categoria[i]);
        }
    })
}

function agregarCategoria(categoria){
    var categoriatr = document.createElement("tr");
    categoriatr.id=categoria['idCategoria'];
    
    var tdCategoria = document.createElement("td");
    tdCategoria.innerHTML=categoria['nombreCategoria'];
    
    var tdBotones=document.createElement("td");
    var botonEditar=document.createElement("a");
    botonEditar.href="formularioEditarCategoria.php?idCategoria="+categoria['idCategoria'];
    botonEditar.className="btn btn-warning";
    botonEditar.style="margin: 4px";
    botonEditar.innerHTML='<i class="fas fa-edit"></i> Editar';
    
    var botonEliminar=document.createElement("a");
    botonEliminar.className="btn btn-danger";
    botonEliminar.setAttribute("data-bs-toggle", "modal");
    botonEliminar.setAttribute("data-bs-target", "#eliminarFormulario");
    botonEliminar.value=categoria['idCategoria'];
    botonEliminar.addEventListener('click', function(){
        eliminarCategoria(this);
    });
    botonEliminar.innerHTML='<i class="fas fa-trash-alt"></i> Eliminar';
    
    tdBotones.appendChild(botonEditar);
    tdBotones.appendChild(botonEliminar);
    
    categoriatr.appendChild(tdCategoria);
    categoriatr.appendChild(tdBotones);
    
    var contenedor=document.getElementById("categoria");
    contenedor.appendChild(categoriatr);
    }