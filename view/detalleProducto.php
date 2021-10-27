<?php require_once 'headproducto.php';

require_once '../controller/productoserviciocontroller.php';
$oProductoServicioController = new productoServicioController();
?>

<div class="row">
    <div class="col col-md-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb estilo">
                <li class="breadcrumb-item"><a href="paginaprincipalcliente.php">Inicio</a></li>
                <li class="breadcrumb-item"><a href="vistaproducto.php">Productos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detalle Producto</li>
            </ol>
        </nav>
    </div>
</div>
<br>
<div class="row clearfix">
    <div class="col-md-2">
        <div class="card">
            <div class="card-header cabeceraCard">
                <h5><i class="fas fa-list-alt"></i> Categoria</h5>
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
                                            <!-- <?php
                                                    // require_once '../model/categoria.php';
                                                    // $oCategoria=new categoria();
                                                    // $consulta=$oCategoria->categoriaPorIdProducto();
                                                    ?> -->
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

    <div class="col-md-8">
        <div class="card">
            <div class="card-header cabeceraCard">
                <div class="row">
                    <div class="col-md-12">
                        <h4> <a href="vistaproducto.php"><i class="fas fa-reply-all"></i></a></h4>
                    </div>
                </div>
                <h5> Detalle Producto</h5>
            </div>
            <div class="card-body bodyCard">
                <div class="row">
                    <div class="col col-sm-6">
                        <h3 class="d-inline-block d-sm-none"></h3>
                        <div class="col-12">
                            <div class="container-image">
                                <img src="" class="product-image imgEstilo" id="imgGrande">
                            </div>

                        </div>

                        <div class="col-12 product-image-thumbs">
                            <?php
                            $oFoto = $oProductoServicioController->detalleFotoProducto($_GET['idProducto']);
                            $fotos = 1;
                            foreach ($oFoto as $registro) {
                            ?>
                                <div class="product-image-thumb"><img src="../<?php echo $registro['fotoProducto']; ?>" id="<?php echo $fotos; ?>" onclick="fotoCambio(this);"></div>
                            <?php
                                $fotos += 1;
                            } ?>
                        </div>
                    </div>
                    <?php
                    $oProducto = $oProductoServicioController->detalleProducto($_GET['idProducto']);
                    ?>
                    <div class="col col-sm-6">
                        <h1 class="tituloh"><?php echo $oProducto->nombreProducto; ?></h1>

                        <hr>

                        <h1 class="tituloh">Descripcion</h1>
                        <p class="textp"><?php echo $oProducto->descripcionProducto; ?></p>

                        <hr>

                        <h1 class="tituloh">Precio:</h1>
                        <p class="textp" id="precio"></p>

                        <hr>

                        <div>
                            <h1 class="tituloh"> Opciones del producto</h1>
                            <ul>
                                <form action="../controller/productoserviciocontroller.php" method="GET">
                                    <input type="text" name="idProducto" value="<?php echo $_GET['idProducto']; ?>" style="display: none;">
                                    <li class="textp">
                                        <div class="row">
                                            <div class="col col-md-2">
                                                <h9>Cantidad: </h9>
                                            </div>
                                            <div class="col col-md-1">
                                                <select class="form-control" id="cantidad" name="cantidad" style="width: 50px; margin-bottom: 8px;">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                </select>
                                            </div>
                                            <div class="col col-md-3">
                                                <span>(Disponibles)</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="textp"><button type="submit" class="btn btn-outline-success" style="margin-bottom: 8px" name="funcion" value="anadirAlCarrito"><i class="fas fa-cart-plus fa-lg mr-2"></i> Añadir al carrito</li></button>
                                </form>
                                <li class="textp"><button type="button" class="btn btn-outline-info" style="margin-bottom: 8px" data-toggle="modal" data-target="#domicilio-sm"><i class="fas fa-map-marked-alt"></i> Domicilio</li></button>
                                <li class="textp"><button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#pago-sm"><i class="fab fa-cc-visa"></i> Opciones pago</li></button>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="card">
            <div class="card-header cabeceraCard">
                <h5><i class="fas fa-info-circle"></i> Informacion General</h5>
            </div>
            <div class="card-body bodyCard">
                <div class="row">
                    <div class="col col-md-8">
                        <nav class="w-100">
                            <div class="nav nav-tabs" id="product-tab" role="tablist">
                                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true"><i class="fas fa-align-justify"></i> Descripción</a>
                                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false"><i class="fas fa-book-open"></i> Caracteristicas</a>
                                <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false"><i class="fas fa-comment-dots"></i> Comentarios</a>
                            </div>

                            <div class="tab-content p-3" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
                                    <div class="card">
                                        <div class="card-body bodyCard">
                                            <p><?php echo $oProducto->descripcionProducto; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">
                                    <div class="card">
                                        <div class="card-body bodyCard">
                                            <p><?php echo $oProducto->caracteristicas; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="chat-discussion">
                                                <div class="chat-message left">
                                                    <img class="message-avatar" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                                                    <div class="message">
                                                        <a class="message-author"> Michael Smith </a>
                                                        <span class="message-date"> Mon Jan 26 2015 - 18:39:23 </span>
                                                        <span class="message-content">
                                                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="chat-message-form">
                                                <div class="form-group">
                                                    <textarea class="form-control message-input" name="message" placeholder="Enter message text and press enter"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <div class="col col-md-4">
                        <div class="card">
                            <div class="card-header cabeceraCard">
                                <h5><i class="fas fa-tags"></i> Tags</h5>
                            </div>
                            <div class="card-body bodyCard">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <h1>footer</h1>
</div>

<?php require_once 'linkfooter.php'; ?>
<script>
    var campo = document.getElementById("precio");
    separadorMilesPrecio(campo, "<?php echo $oProducto->valorUnitario; ?>");
</script>



</body>

</html>

<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/general.min.js"></script>
<script src="/anyeale_proyecto/stylushanyeale_alejandra/assets/js/anyealejs/detalleProducto.min.js"></script>


<div class="modal fade" id="domicilio-sm">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Domicilio</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="true-md">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">¡Productos agregados al carrito!</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Desea conocer los productos en el carrito?
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-info" data-dismiss="modal"><i class="fas fa-angle-double-left"></i> No, deseo seguir comprando</button>
                <a href="pedidocliente.php" class="btn btn-success"><i class="fas fa-cart-arrow-down"></i> Ver carrito de compras</a>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_GET['modal'])) {
    $modal = $_GET['modal'];
?>
    <script>
        var myModal = new bootstrap.Modal(document.getElementById('true-md'), {
            keyboard: false
        }); 
        myModal.show();
    </script>
<?php
}
?>

<div class="modal fade" id="pago-sm">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Small Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>