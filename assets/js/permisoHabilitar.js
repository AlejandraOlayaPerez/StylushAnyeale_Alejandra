
function habilitar(checkbox){
    var pagina = document.getElementsByName("arregloPagina[]");

    if (checkbox.checked){
        for (var i=0; pagina.length-1; i++){
            pagina[i].checked=true;
        }
    }else{
        for (var i=0; pagina.length-1; i++){
            pagina[i].checked=false;
        }
    }
}