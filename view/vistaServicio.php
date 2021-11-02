<?php
require_once 'headservicio.php';

if (isset($_GET['idTags'])) {
    $idTags = $_GET['idTags'];
} else {
    $idTags = "";
}
?>
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

<head>
    <link rel="stylesheet" href="/anyeale_proyecto/stylushanyeale_alejandra/assets/css/anyealecss/servicios.min.css" type="text/css">
</head>

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
                        <tr data-widget="expandable-table" aria-expanded="true">
                            <td><i class="fas fa-tags"></i> Tags</td>
                        </tr>

                        <input type="text" id="idTags" value="<?php echo $idTags; ?>" style="display: none;">

                        <tr class="expandable-body">
                            <td>
                                <div class="p-0">
                                    <table class="table table-hover">
                                        <tbody>
                                            <?php require_once '../controller/productoserviciocontroller.php';
                                            $oProductoServicioController = new productoServicioController();
                                            $tags = $oProductoServicioController->mostrarTagsProducto();
                                            foreach ($tags as $registro) {
                                            ?>
                                                <a href="vistaservicio.php?idTags=<?php echo $registro['idTags']; ?>" type="button" style="margin: 5px" class="btn btn-outline-info"><?php echo $registro['tags']; ?></a>
                                            <?php
                                            }
                                            ?>
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
        <div class="card">
            <div class="card-header cabeceraCard">
                <div class="row">
                    <div class="col-md-5">
                        <h5><i class="fas fa-boxes"></i> Lista de servicios:<h5>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select desingSelect" name="vista" id="vista" onchange="vistaProducto()">
                            <option value="" disabled>Selecciones una opción</option> -->
                            <option value="preterminado" selected>Orden preterminado</option>
                            <option value="asc">Nombre A-Z</option>
                            <option value="des">Nombre Z-A</option>
                            <option value="menor">Menor precio</option>
                            <option value="mayor">Mayor precio</option>
                        </select>
                    </div>

                    <div class="col col-md-4">
                        <div class="card-tools">
                            <ul class="pagination pagination-sm contenedorUL" id="contenedorUL">

                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body bodyCard">
                <div class="container">
                    <div class="row" id="listaServicio">

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php require_once 'linkfooter.php'; ?>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/vistaservicio.min.js"></script>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/general.min.js"></script>

<?php require_once 'footercliente.php'; ?>