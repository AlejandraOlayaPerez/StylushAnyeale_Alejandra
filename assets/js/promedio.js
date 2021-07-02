function Promedio(){
    var nota1=parseFloat(document.getElementById("nota1").value); //parseFloat sirve para pasar de texto a decimal
    var nota2=parseFloat(document.getElementById("nota2").value);
    var nota3=parseFloat(document.getElementById("nota3").value);
    
    if (Number.isNaN(nota1)) nota1=0;
    if (Number.isNaN(nota2)) nota2=0;
    if (Number.isNaN(nota3)) nota3=0;
    
    var promedio=(nota1+nota2+nota3)/3;
    

    document.getElementById("respuestaPromedio").value=promedio.toFixed(1);
    

} //esta function simplemente toma los datos del HTML, de esta manera sacamos promedio y mostramos en HTL.

