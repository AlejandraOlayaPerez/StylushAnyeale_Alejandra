
<?php
class icono
{
    public $home = "fas fa-home";
    public $desHome = "&#xf015;";
    public $cajero = "fas fa-dollar-sign";
    public $desCajero = "&#xf155;";
    public $cargo = "fas fa-id-card-alt";
    public $desCargo = "&#xf47f;";
    public $cliente = "fas fa-users";
    public $desCliente = "&#xf0c0;";
    public $configuracion = "fas fa-users-cog";
    public $desConfiguracion = "&#xf509;";
    public $inventario = "fas fa-clipboard-check";
    public $desInventario = "&#xf46c;";
    public $producto = "fas fa-dolly-flatbed";
    public $desProducto = "&#xf474;";
    public $reservacion = "fas fa-calendar-plus";
    public $desReservacion = "&#xf271;";
    public $servicio = "fas fa-cut";
    public $desServicio = "&#xf0c4;";


    public function descripcionIcono($icono)
    {
        switch ($icono) {
            case $this->home:
                return $this->desHome;
                break;
            case $this->cajero:
                return $this->desCajero;
                break;
            case $this->cargo:
                return $this->desCargo;
                break;
            case $this->cliente:
                return $this->desCliente;
                break;
            case $this->configuracion:
                return $this->desConfiguracion;
                break;
            case $this->inventario:
                return $this->desInventario;
                break;
            case $this->producto:
                return $this->desProducto;
                break;
            case $this->reservacion:
                return $this->desReservacion;
                break;
            case $this->servicio:
                return $this->desServicio;
                break;
        }
    }

    public function mostrarIcono()
    {
        $iconos = ["icono" => $this->home, $this->cajero, $this->cargo, $this->cliente, $this->configuracion, $this->inventario,
    $this->producto, $this->reservacion, $this->servicio];

        return $iconos;
    }
}
?>

