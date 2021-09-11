<?php
require_once 'headPagina.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STYLUSH ANYEALE</title>
</head>

<body>
    <div class="container-fluid">
        <?php
        require_once '../model/contarBD.php';
        $oContar = new contar();
        ?>
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h1 class="tituloGrande">Productos</h1>
                        <?php $result = $oContar->contarProductos();
                        foreach ($result as $registro) {
                        ?>
                            <p id="contarTabla"><?php echo $registro['totalProducto']; ?> </p>
                        <?php } ?>
                    </div>
                    <div class="icon">
                        <i class="fas fa-wine-bottle"></i>
                    </div>
                    <a href="listarProducto.php" class="small-box-footer">
                        Ver Lista <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h1 class="tituloGrande">Personal</h1>
                        <?php $result = $oContar->contarPersonal();
                        foreach ($result as $registro) {
                        ?>
                            <p id="contarTabla"><?php echo $registro['totalPersonal']; ?> </p>
                        <?php } ?>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-friends"></i>
                    </div>
                    <a href="listarUsuario.php" class="small-box-footer">
                        Personal de trabajo <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h1 class="tituloGrande">Clientes</h1>
                        <?php $result = $oContar->contarCliente();
                        foreach ($result as $registro) {
                        ?>
                            <p id="contarTabla"><?php echo $registro['totalCliente']; ?> </p>
                        <?php } ?>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="listarClientes.phpp" class="small-box-footer">
                        Registro Clientes <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <hr>

    </div>

</body>

</html>

<?php
require_once 'footer.php';
?>