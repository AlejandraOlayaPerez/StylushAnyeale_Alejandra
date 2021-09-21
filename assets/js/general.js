function crearTr(columnas, idContenedor){
    var tr = document.createElement("tr");
    tr.id="trVacio";
    var td = document.createElement("td");
    td.colSpan=columnas;
    td.style="font-family: 'Times New Roman', Times, serif; text-align: center; font-weight: 600;"
    td.innerHTML= "No hay informacion que mostrar, agrege informacion nueva";

    tr.appendChild(td);
    var contenedor = document.getElementById(idContenedor);
    contenedor.appendChild(tr);
}

function trEliminar(idContenedor){
    var contenedor = document.getElementById(idContenedor);
    var trVacio = document.getElementById("trVacio");

    if(trVacio!=null){
        contenedor.removeChild(trVacio);
    }
    
}