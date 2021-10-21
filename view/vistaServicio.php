<?php require_once 'headservicio.php'; ?>
<div class="row">
    <div class="col col-md-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb estilo">
                <li class="breadcrumb-item"><a href="paginaprincipalcliente.php">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Servicios</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header cabeceraCard">
                <h5><i class="fa fa-search"></i> Buscar Servicio: </h5>
            </div>
            <div class="card-body bodyCard">
                <div class="body search">
                    <div class="input-group m-b-0">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-search"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Buscar Servicio.." name="servicio" id="servicio" onkeyup="vistaServicio()">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-header cabeceraCard">
                <h5><i class="fas fa-funnel-dollar"></i> Filtros</h5>
            </div>
            <div class="card-body bodyCard">
                <table class="table table-hover">
                    <tbody>
                        <tr data-widget="expandable-table" aria-expanded="false">
                            <td>
                                <i class="fas fa-list-alt"></i> Categoria
                            </td>
                        </tr>

                        <tr class="expandable-body">
                            <td>
                                <div class="p-0">
                                    <table class="table table-hover">
                                        <tbody>
                                            <tr>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-hover">
                    <tbody>
                        <tr data-widget="expandable-table" aria-expanded="false">
                            <td>
                                <i class="fas fa-dollar-sign"></i> Rango por precio:
                            </td>
                        </tr>

                        <tr class="expandable-body">
                            <td>
                                <div class="p-0">
                                    <table class="table table-hover">
                                        <tbody>
                                            <tr>
                                                <td><input type="number" class="form-control input" name="rangoMenor" id="rangoMenor" placeholder="Valor Minimo" onkeyup="vistaProducto()"></td>
                                                <td><input type="number" class="form-control input" name="rangoMenor" id="rangoMayor" placeholder="Valor Maximo" onkeyup="vistaProducto()"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-hover">
                    <tbody>
                        <tr data-widget="expandable-table" aria-expanded="false">
                            <td><i class="fas fa-tags"></i> Tags</td>
                        </tr>

                        <tr class="expandable-body">
                            <td>
                                <div class="p-0">
                                    <table class="table table-hover">
                                        <tbody>
                                            <tr>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-9">

        <div class="container">

            <div class="row">

                <div class="col col-xl-4 col-md-6 col-12">
                    <div class="team-item">
                        <div class="mb-30 position-relative d-flex align-items-center">
                            <span class="socials d-inline-block">
                                <a href="listarreservacion.php"><i class="fas fa-calendar-plus"></i> Reservar</a>
                            </span>
                            <span class="img-holder d-inline-block">
                                <img src="">
                            </span>
                        </div>
                        <div class="team-content">
                            <h5 class="mb-2"></h5>
                            <p class="text-uppercase mb-0"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<?php require_once 'linkfooter.php'; ?>
<?php require_once 'linkjs.php'; ?>
</html>