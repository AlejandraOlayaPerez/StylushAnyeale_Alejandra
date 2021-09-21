<?php
require_once 'headPagina.php';
require_once '../model/tags.php';
require_once '../controller/productoServicioController.php';

require_once '../controller/productoServicioController.php';
$oProductoServicioController = new productoServicioController();
$oTags = $oProductoServicioController->consultarTags($_GET['idPalabrasClaves']);
?>

<body>
    <div class="container-fluid">
        <div class="card card-primary">
            <div class="card-header" style="background-color: rgb(249, 201, 242);">
                <label class="card-title" style="-webkit-text-fill-color: black;">Editar Tag</label>
            </div>
            <form action="../controller/productoServicioController.php" method="GET" id="formUsuario">
                <div class="card-body" style="background-color: rgba(255, 255, 204, 255);">
                    <input type="text" name="idPalabraClave" value="<?php echo $_GET['idPalabrasClaves']; ?>" style="display: none;">

                    <div class="row" style="margin: 5px;">

                        <div class="col col-xl-4 col-md-6 col-12">
                            <label for="">Tags</label>
                            <input type="text" class="form-control" id="palabraClave" name="palabraClave" placeholder="Tags" value="<?php echo $oTags->palabraClave; ?>">
                        </div>
                    </div>
                </div>
                <div class="card-footer" style="background-color: rgba(255, 255, 204, 255);">
                    <a href="tags.php" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
                    <button type="submit" class="btn btn-success" name="funcion" value="actualizarTags"><i class="fas fa-edit"></i> Actualizar Tag</button>
                </div>
            </form>
        </div>

    </div>
</body>

</html>

<?php
require_once 'footer.php';
?>

<script>
    $(function() {
        $.validator.setDefaults({
            submitHandler: function() {
                this.submit();
            }
        });
        $('#formUsuario').validate({

            rules: {
                palabraClave: {
                    required: true,
                    minlength: 2,
                },
            },
            messages: {
                cargo: {
                    required: "Por favor, complete el campo vacio",
                    minlength: "Longitud mínima 2",
                },
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.col').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>