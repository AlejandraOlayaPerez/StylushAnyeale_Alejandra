<?php
require_once 'headGerente.php';
require_once '../model/cargo.php';
require_once '../model/conexionDB.php';

$oCargo = new cargo();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="stylesheet" href="/anyeale_proyecto/StylushAnyeale_Alejandra/assets/css/estilosGerente.css" type="text/css">
    <title>Nuevo Cargo</title>
</head>

<body>
    <div class="container">

        <h1>NUEVO CARGO</h1>
        <br>

        <form action="../controller/usuarioController.php" method="GET">
            <div class="row">
                <div class="col-md-6">
                    <label for="" class="form-label">Cargo</label>
                    <select class="form-select" id="" name="cargo" required>
                        <option value="" disabled selected>Selecciones una opción</option>
                        <option value="Pecepcionista" <?php if ($oCargo->cargo == "Recepcionista") {echo "selected";} ?>>Recepcionista</option>
                        <option value="Vendedor" <?php if ($oCargo->cargo == "vendedor") {echo "selected";} ?>>Vendedor</option>
                        <option value="Cajero" <?php if ($oCargo->cargo == "cajero") {echo "selected";} ?>>Cajero</option>
                        <option value="Estetica" <?php if ($oCargo->cargo == "estetica") {echo "selected";} ?>>Asesor de imagen</option>
                        <option value="Estilista" <?php if ($oCargo->cargo == "estilista") {echo "selected";} ?>>Estilista</option>
                        <option value="Manicurista" <?php if ($oCargo->cargo == "manicurista") {echo "selected";} ?>>Manicurista</option>
                        <option value="Masajista" <?php if ($oCargo->cargo == "masajista") {echo "selected";} ?>>Terapeutica de Spa</option>
                        <option value="AyudanteSpa" <?php if ($oCargo->cargo == "ayudanteSpa") {echo "selected";} ?>>Ayudante de Spa</option>
                        <option value="Maquillista" <?php if ($oCargo->cargo == "maquillista") {echo "selected";} ?>>Maquillista</option>
                        <option value="Peluquero" <?php if ($oCargo->cargo == "peluquero") {echo "selected";} ?>>Peluquero</option>
                        <option value="Barbero" <?php if ($oCargo->cargo == "barbero") {echo "selected";} ?>>Barbero</option>
                        <option value="AyudanteSala" <?php if ($oCargo->cargo == "ayudanteSala") {echo "selected";} ?>>Apoyo en sala</option>
                        <option value="Domicilios" <?php if ($oCargo->cargo == "Domicilios") {echo "selected";} ?>>Domicilios</option>
                        <option value="TecnicoMaquinas" <?php if ($oCargo->cargo == "tecnicoMaquinas") {echo "selected";} ?>>Tecnico de mantenimientos</option>
                    </select>
                </div>
                <div class="col-md-6">
                <label for="" class="form-label">Descripcion_Cargo</label>
                    <select class="form-select" id="" name="descripcionCargo" required>
                        <option value="" disabled selected>Selecciones una opción</option>
                        <option value="Se encarga de organizar reservaciones, detallar productos y servicios." <?php if ($oCargo->descripcionCargo == "Se encarga de organizar reservaciones, detallar productos y servicios.") {echo "selected";} ?>>Resepcionista: Se encarga de organizar reservaciones, detallar productos y servicios.</option>
                        <option value="Esta encargado de vender, provee productos para los servicios." <?php if ($oCargo->descripcionCargo == "Esta encargado de vender, provee productos para los servicios.") {echo "selected";} ?>>Vendedor: Esta encargado de vender, provee productos para los servicios.</option>
                        <option value="Se hace cargo de la caja, entregando informe al final del dia." <?php if ($oCargo->descripcionCargo == "Se hace cargo de la caja, entregando informe al final del dia.") {echo "selected";} ?>>Cajero: Se hace cargo de la caja, entregando informe al final del dia.</option>
                        <option value="Ayudan a sus clientes a sacar el máximo provecho de su aspecto." <?php if ($oCargo->descripcionCargo == "Ayudan a sus clientes a sacar el máximo provecho de su aspecto.") {echo "selected";} ?>>Asesor de imagen: Ayudan a sus clientes a sacar el máximo provecho de su aspecto.</option>
                        <option value="Ofecen tratamientos de belleza en las personas para mejorar su aspecto." <?php if ($oCargo->descripcionCargo == "Ofecen tratamientos de belleza en las personas para mejorar su aspecto.") {echo "selected";} ?>>Estilista: Ofecen tratamientos de belleza en las personas para mejorar su aspecto.</option>
                        <option value="Ofecen tratamientos de belleza en las personas para mejorar su aspecto." <?php if ($oCargo->descripcionCargo == "Ofecen tratamientos de belleza en las personas para mejorar su aspecto.") {echo "selected";} ?>>Manicurista:Ofecen tratamientos de belleza en las personas para mejorar su aspecto.</option>
                        <option value="Ofrecen una amplia gama de tratamientos de belleza y terapias de salud." <?php if ($oCargo->descripcionCargo == "Ofrecen una amplia gama de tratamientos de belleza y terapias de salud.") {echo "selected";} ?>>Terapeutica de Spa: Ofrecen una amplia gama de tratamientos de belleza y terapias de salud.</option>
                        <option value="Ofrece apoyo al encargado de los tratamientos de Spa." <?php if ($oCargo->descripcionCargo == "Ofrece apoyo al encargado de los tratamientos de Spa.") {echo "selected";} ?>>Ayudante de Spa: Ofrece apoyo al encargado de los tratamientos de Spa.</option>
                        <option value="Se aseguran de que las personas obtegan su estilo ideal." <?php if ($oCargo->descripcionCargo == "Se aseguran de que las personas obtegan su estilo ideal.") {echo "selected";} ?>>Maquillista: Se aseguran de que las personas obtegan su estilo ideal.</option>
                        <option value="Ofrecen servicios amplios a los clientes." <?php if ($oCargo->descripcionCargo == "Ofrecen servicios amplios a los clientes.") {echo "selected";} ?>>Peluqueros: Ofrecen servicios amplios a los clientes.</option>
                        <option value="Ofrecen una amplia gama de tratamientos para la barba del hombre." <?php if ($oCargo->cargo == "Ofrecen una amplia gama de tratamientos para la barba del hombre.") {echo "selected";} ?>>Barbero: Ofrecen una amplia gama de tratamientos para la barba del hombre.</option>
                        <option value="Serán los encargados de apoyar y organizar en el salon." <?php if ($oCargo->descripcionCargo == "Serán los encargados de apoyar y organizar en el salon.") {echo "selected";} ?>>Apoyo en sala: Serán los encargados de apoyar y organizar en el salon.</option>
                        <option value="Encargados de los servicios por fuera del establecimiento." <?php if ($oCargo->descripcionCargo == "Encargados de los servicios por fuera del establecimiento.") {echo "selected";} ?>>Domicilios: Encargados de los servicios por fuera del establecimiento.</option>
                        <option value="Especialista en el mantenimiento de maquinas y implementos." <?php if ($oCargo->descripcionCargo == "Especialista en el mantenimiento de maquinas y implementos.") {echo "selected";} ?>>Tecnico de mantenimientos: Especialista en el mantenimiento de maquinas y implementos.</option>
                    </select>
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-success" name="funcion" value="nuevoCargo"><i class="far fa-save"></i> Guardar</button>
            <a href="listarCargo.php" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
        </form>
    </div>
</body>

</html>

<?php
require_once 'footerGerente.php';
?>