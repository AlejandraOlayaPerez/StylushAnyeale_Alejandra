cargarJS();

function cargarJS() {
    foto();
}

function foto() {
    var foto1 = document.getElementById("1");
    var fotoGrande = document.getElementById("imgGrande");

    fotoGrande.src = foto1.src;
}

function fotoCambio(imagen) {
    var fotoGrande = document.getElementById("imgGrande");

    fotoGrande.src = imagen.src;


}