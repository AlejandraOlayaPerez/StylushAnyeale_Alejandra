<?php require_once 'headProducto.php'; ?>

<div class="row">
    <div class="col col-md-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb estilo">
                <li class="breadcrumb-item"><a href="paginaprincipalcliente.php">Inicio</a></li>
                <li class="breadcrumb-item"><a href="vistaproducto.php">Productos</a></li>
                <li class="breadcrumb-item"><a href="detalleProducto.php">Detalle Producto</a></li>
                <li class="breadcrumb-item active" aria-current="page">Mis Pedidos</li>

            </ol>
        </nav>
    </div>
</div>
<br>



<div class="card">
    <div class="card-body table-responsive p-0">
        <table class="table colorestabla">
            <thead>
                <tr class="estiloTr">
                    <th>Imagen</th>
                    <th>Producto</th>
                    <th>Descripcion</th>
                    <th>Caracteristicas</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once '../controller/productoserviciocontroller.php';
                $oProductosServicioController = new productoServicioController();
                $consulta = $oProductosServicioController->productosCarroCompras($_SESSION['idCliente']);
                $total = 0;
                if (count($consulta) > 0) {
                    foreach ($consulta as $registro) {
                ?>
                        <tr>
                            <td><img src="../<?php echo $registro['fotoProducto']; ?>" style="width: 90%; height: 100%;"></td>
                            <td><?php echo $registro['producto']; ?></td>
                            <td><?php echo $registro['descripcionProducto']; ?></td>
                            <td><?php echo $registro['caracteristicas']; ?></td>
                            <td>
                                <form action="../controller/productoserviciocontroller.php" method="POST">
                                    <input type="text" name="idProducto" value="<?php echo $registro['idProducto']; ?>" style="display: none;">
                                    <input type="text" name="idFactura" value="<?php echo $registro['idFactura']; ?>" style="display: none;">
                                    <input type="text" name="precio" value="<?php echo $registro['precio']; ?>" style="display: none;">
                                    <div class="input-group m-b-0">
                                        <div class="input-group-prepend">
                                            <button type="submit" class="input-group-text text-warning" name="funcion" value="actualizarCantidadDetalle"> <i class="fas fa-edit"></i></button>
                                        </div>
                                        <input type="text" class="form-control" name="cantidad" placeholder="Actualiza Cantidad.." value="<?php echo $registro['cantidad']; ?>">
                                    </div>
                                </form>
                            </td>
                            <td>$ <?php echo $registro['precio'];
                                    $total += $registro['precio']; ?></td>
                            <td>
                                <a class="table-link danger" data-bs-toggle="modal" data-bs-target="#eliminarFormulario" onclick="eliminarProductoCarrito(<?php echo $registro['idProducto']; ?>, <?php echo $registro['idFactura']; ?>)"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                <?php } else { ?>
                    <tr class="trMensaje">
                        <td colspan="6">"Tu carro esta vacio, mira nuestras opciones de compra :)"</td>
                    </tr>
                <?php
                }
                ?>
                <tr class="totalEstilo">
                    <td colspan="5">Total: </td>
                    <td style="text-align: left;">$ <?php echo $total; ?></td>
                    <td><button type="button" class="btn btn-info">Pagar</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>



<?php require_once 'linkfooter.php'; ?>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/eliminar.min.js"></script>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/general.min.js"></script>

<div class="modal fade" id="eliminarFormulario" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header estiloModalHeader">
                <h5 class="modal-title" id="Label">Eliminar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body estiloModalBody">
                <p>¿Esta seguro que desea eliminar el producto del carrito compras?</p>
            </div>
            <div class="modal-footer estiloModalBody">
                <form action="../controller/productoserviciocontroller.php" method="GET">
                    <input type="text" name="idProducto" id="idProducto" style="display: none;">
                    <input type="text" name="idFactura" id="idFactura" style="display: none;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger" name="funcion" value="eliminarProductoCarrito"><i class="fas fa-trash-alt"></i> Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>