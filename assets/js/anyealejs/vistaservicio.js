//definir antes de cargar la funcion
var pagina = 1;
var numPagina = 0;
//Carga la funcion
cargarJS();
//Cargar archivos al momemto de carga la pagina.
function cargarJS() {
    vistaServicio();
}

function vistaServicio() {
    var tags = document.getElementById("idTags").value;
    var vista = document.getElementById("vista").value;
    var rangoMenor = document.getElementById("rangoMenor").value;
    var rangoMayor = document.getElementById("rangoMayor").value;
    var buscar = document.getElementById("servicio").value;


    $.ajax({
        url: '../controller/productoserviciocontroller.php',
        type: 'GET',
        data: {
            tags: tags,
            vista: vista,
            rangoMenor: rangoMenor,
            rangoMayor: rangoMayor,
            buscar: buscar,
            pagina: pagina,
            funcion: "buscarServicioVista"
        }
    }).done(function (data) {
        // console.log(data);
        var datos = data.split("®");
        //paginacion
        var numRegistro = parseInt(datos[0]);
        numPagina = parseInt(numRegistro / 10);
        if (numRegistro % 10 > 0) numPagina++;

        var contenedorUL = document.getElementById("contenedorUL");
        contenedorUL.innerHTML = "";

        var li1 = document.createElement("li");
        li1.className = "page-item";
        var a1 = document.createElement("button");
        a1.className = "page-link";
        a1.value = "-";
        a1.style.fontFamily = "Times New Roman', Times, serif";
        a1.addEventListener('click', function () {
            modificarPagina(this.value);
        });
        a1.innerHTML = "&laquo;";
        li1.appendChild(a1);
        contenedorUL.appendChild(li1);

        var span = document.createElement("span");
        span.style.fontFamily = "Times New Roman', Times, serif";
        span.style.letterSpacing = "3px";
        span.style.background = "white";
        span.innerHTML = " " + pagina + "/" + numPagina + " ";

        contenedorUL.appendChild(span);

        var li3 = document.createElement("li");
        li3.className = "page-item";
        var a3 = document.createElement("button");
        a3.className = "page-link";
        a3.style.fontFamily = "Times New Roman', Times, serif";
        a3.value = "+";
        a3.addEventListener('click', function () {
            modificarPagina(this.value);
        });
        a3.innerHTML = "&raquo;";

        li3.appendChild(a3);
        contenedorUL.appendChild(li3);

        var servicio = JSON.parse(datos[1]);
        var contenedor = document.getElementById("listaServicio");
        contenedor.innerHTML = "";
        for (i = 0; i < servicio.length; i++) {
            agregarServicio(servicio[i]);
        }
    })
}

function modificarPagina(campo) {
    if (campo == "-" && pagina > 1) {
        pagina -= 1;
    } else if (campo == "+" && pagina < numPagina) {
        pagina += 1;
    }
    vistaServicio();
}

function agregarServicio(servicio) {

    var col2 = document.createElement("div");
    col2.className = "col-md-4";

    var team = document.createElement("div");
    team.className = "team-item";
    team.style.margin="20px";

    var mb = document.createElement("div");
    mb.className = "mb-30 position-relative d-flex align-items-center";

    var socials = document.createElement("span");
    socials.class = "socials d-inline-block";

    var icono = document.createElement("a");
    icono.href = "listarreservacion.php";
    icono.innerHTML = "<i class='fas fa-calendar-plus'></i> Reservar"

    var img = document.createElement("span");
    img.className = "img-holder d-inline-block";

    var img2 = document.createElement("img");
    img2.src = "../" + servicio['fotoProducto'];

    var team2 = document.createElement("div");
    team2.className = "team-content";

    var mb2 = document.createElement("h5");
    mb2.className = "mb-2";
    mb2.innerHTML = servicio['detalleServicio'];

    var p = document.createElement("p");
    p.className = "text-uppercase mb-0";
    p.innerHTML = servicio['nombreServicio']+" "+"(Costo:"+servicio['costo']+")";

    team2.appendChild(p);
    team2.appendChild(mb2);
    

    img.appendChild(img2);
    socials.appendChild(icono);

    mb.appendChild(socials);
    mb.appendChild(img);

    team.appendChild(mb);
    team.appendChild(team2);

    col2.appendChild(team);

    var contenedor = document.getElementById("listaServicio");
    contenedor.appendChild(col2);
}