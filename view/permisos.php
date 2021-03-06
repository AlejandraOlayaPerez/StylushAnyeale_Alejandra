<form action="../controller/gestioncontroller.php" method="GET">
    <input type="hidden" name="idRol" value="<?php echo $_GET['idRol']; ?>">

    <table class="table">
        <thead>
            <input type="checkbox" onclick="habilitar(this)">
            <label class="labelText"> Seleccionar todo</label>
        </thead>
        <tbody>
            <?php
            $oModulo = new modulo();
            $consulta = $oModulo->listarModulo(1);
            foreach ($consulta as $registro) {
            ?>

                <tr data-widget="expandable-table" aria-expanded="true">
                    <td class="tabsTr">
                        <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                        <?php echo $registro['nombreModulo']; ?>
                    </td>
                </tr>
                <tr class="expandable-body">
                    <td>
                        <div class="p-0">
                            <div class="card-body table-responsive">
                                <table class="table table-striped table-valign-middle">

                                    <?php
                                    $oPagina = new pagina();
                                    $oPagina->idModulo = $registro['idModulo'];
                                    ?>
                                    <!-- <input type="hidden" name="idModulo" value="<?php //echo $oPagina->idModulo; 
                                                                                        ?>"> -->
                                    <?php
                                    $oPagina->idRol = $idRol;
                                    $consulta = $oPagina->mostrarPagina();
                                    foreach ($consulta as $registroPagina) {
                                    ?>

                                        <tr>
                                            <td class="tabsTd">
                                                <input type="checkbox" name="arregloPagina[]" value="<?php echo $registroPagina['idPagina']; ?>" <?php if ($oGestionController->verificarPermiso($registroPagina['idPagina'], $idRol)) echo "checked"; ?>>
                                                <!--el checked es complemento a checkbox, que me dice que regitros ya estab seleccionados-->
                                                <label class="labelText" for="check<?php echo $registroPagina['idPagina']; ?>">
                                                    <?php echo $registroPagina['nombrePagina']; ?>
                                                </label>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <button type="submit" class="btn btn-success" name="funcion" value="ActualizarPermisoDePagina">Actualizar cambios</button>
    <a href="listarrol.php?idRol=<?php echo $idRol; ?>" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
</form>