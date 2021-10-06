function crearTr(columnas, idContenedor) {
    var tr = document.createElement("tr");
    tr.id = "trVacio";
    var td = document.createElement("td");
    td.colSpan = columnas;
    td.style = "font-family: 'Times New Roman', Times, serif; text-align: center; font-weight: 600;"
    td.innerHTML = "No hay informacion que mostrar, agrege informacion nueva";

    tr.appendChild(td);
    var contenedor = document.getElementById(idContenedor);
    contenedor.appendChild(tr);
}

function trEliminar(idContenedor) {
    var contenedor = document.getElementById(idContenedor);
    var trVacio = document.getElementById("trVacio");

    if (trVacio != null) {
        contenedor.removeChild(trVacio);
    }

}

function separadorMilesCuadroTexto(valorUnitario) {
    

    // valorUnitario.addEventListener('keyup', (e) => {
        var entrada = valorUnitario.value.split('.').join('');
        entrada = entrada.split('').reverse();

        var salida = [];
        var aux = '';

        var paginador = Math.ceil(entrada.length / 3);

        for (let i = 0; i < paginador; i++) {
            for (let j = 0; j < 3; j++) {

                if (entrada[j + (i * 3)] != undefined) {
                    aux += entrada[j + (i * 3)];
                }
            }
            salida.push(aux);
            aux = '';

            valorUnitario.value = salida.join('.').split("").reverse().join('');
        }
    // }, false);
}

function separadorMiles(entrada) {
    
    var entrada = entrada.split('.');
    var centavo=entrada[1];
    entrada=entrada[0];
    entrada = entrada.split('').reverse();
    var salida = [];
    var aux = '';
    var paginador = Math.ceil(entrada.length / 3);

    for (let i = 0; i < paginador; i++) {
        for (let j = 0; j < 3; j++) {

            if (entrada[j + (i * 3)] != undefined) {
                aux += entrada[j + (i * 3)];
            }
        }
        salida.push(aux);
        aux = '';
    }
    return salida.join('.').split("").reverse().join('')+","+centavo;
}

function separadorMilesPrecio(campo,entrada) {
    
    var entrada = entrada.split('.');
    var centavo=entrada[1];
    entrada=entrada[0];
    entrada = entrada.split('').reverse();
    var salida = [];
    var aux = '';
    var paginador = Math.ceil(entrada.length / 3);

    for (let i = 0; i < paginador; i++) {
        for (let j = 0; j < 3; j++) {

            if (entrada[j + (i * 3)] != undefined) {
                aux += entrada[j + (i * 3)];
            }
        }
        salida.push(aux);
        aux = '';
    }
    campo.innerHTML = salida.join('.').split("").reverse().join('')+","+centavo;
}