<?php
require_once 'headPagina.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NUEVA EMPRESA</title>
</head>

<body>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="card card-primary">
                    <div class="card-header" style="background-color: rgb(249, 201, 242);">
                        <label class="card-title" style="-webkit-text-fill-color: black;">NUEVA EMPRESA</label>
                    </div>
                    <form action="../controller/pedidoController.php" method="GET">
                        <div class="card-body" style="background-color: rgba(255, 255, 204, 255);">
                            <div class="row">
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="">Nit</label>
                                    <input type="text" class="form-control" name="Nit" id="" placeholder="NIT">
                                </div>
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="">Nombre Empresa</label>
                                    <input type="text" class="form-control" name="nombreEmpresa" id="" placeholder="Nombre Empresa">
                                </div>
                                <div class="col col-xl-4 col-md-6 col-12">
                                    <label for="">Direccion</label>
                                    <input type="text" class="form-control" name="direccion" id="" placeholder="Direccion">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer" style="background-color: rgba(255, 255, 204, 255);">
                            <a href="listarEmpresa.php" class="btn btn-dark"><i class="fas fa-arrow-circle-left"></i> Atras</a>
                            <button type="submit" class="btn btn-success" name="funcion" value="nuevaEmpresa"><i class="fas fa-save"></i> Registrar Empresa</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>

</html>