<?php 
require ('../Plugin/fpd/fpdf.php');

class PDF extends FPDF{

    public $fechaPedido="";
    public $documentoIdentidad="";
    public $responsablePedido="";
    public $NIT="";
    public $empresa="";
 

    function LoadData(){
        require_once '../controller/pedidoController.php';
        require_once '../model/pedido.php';
        
        $idPedido=$_GET['idPedido'];

        $oPedidoController = new pedidoController();
        $oPedido = $oPedidoController->consultarPedidoId($idPedido);
        return $oPedido;
    }

    //cabecera del PFD
    function header(){
        
        //logo
        $this->image('../image/PNG_logo.png',10,15,50);  //(LINK, POSICION HORIZONTAL, POSICION VERTICAL, TAMAÑO)

        $this->SetFont('times','B',30);
        $this->Cell(90); //UBICACION DEL TITULO
        $this->Cell(30,20,'STYLUSH ANYEALE',0,1,'C'); //(MARGEN HORIZONTAL, MARGEN VERTICAL, TITULO, CUADRADO 0:QUITA 1:PONE,'',ORIENTACION DE TEXTO  )

        $this->SetFont('times','',15);
        $this->Cell(65);
        $this->Cell(20,5,"Fecha: $this->fechaPedido",0,1,'C');
        
        $this->Cell(83);
        $this->Cell(20,5,"Documento Identidad: $this->documentoIdentidad",0,1,'C');

        $this->Cell(84);
        $this->Cell(20,5,"Nombre y apellido: $this->responsablePedido",0,1,'C');

        $this->Cell(62);
        $this->Cell(20,5,"NIT Empresa: $this->NIT",0,1,'C');

        $this->Cell(65);
        $this->Cell(20,5,"Empresa: $this->empresa",0,1,'C');

        $this->ln(15);
        
    }

    function footer(){
        // Posición:al final de la hoja
        $this->SetY(-15);

        $this->SetFont('times','B',15);
       
        $this->Cell(0,10,'"Estilo y confianza te brinda ANYEALE" ',0,0,'L');

 
        $this->Cell(0,10,''.$this->PageNo().'',0,0,'R');
    }

    function LoadDataProductos(){
        require_once '../controller/PedidoController.php';
        $idPedido=$_GET['idPedido'];
        $oPedidoController=new pedidoController;
        $consulta=$oPedidoController->consultarProductosIdPedido($idPedido);
        return $consulta;
    }

    function ImprovedTable($header, $dataProducto){

        $this->SetFillColor(249, 201, 242);
        $this->SetTextColor(3, 3, 3);
        $this->SetDrawColor(3, 3, 3);
        $this->SetLineWidth(.2);
        $this->SetFont('times','B');
    // Anchuras de las columnas
    $w = array(40, 35, 45, 40);

    // Cabeceras
    for($i=0;$i<count($header);$i++){
        $this->Cell($w[$i],7,$header[$i],1,0,'C', true);
    }
    $this->Ln();
    
    $sumaPrecio=0;
    // Datos
    foreach($dataProducto as $row)
    {   
        // print_r($row);
    $this->Cell($w[0],6,$row['codigoProducto'],'LRBT');
    $this->Cell($w[1],6,$row['producto'],'LRBT');
    $this->Cell($w[2],6,number_format($row['cantidad']),'LRBT',0,'R');
    $this->Cell($w[3],6,number_format($row['precio'],2),'LRBT',0,'R');

    $sumaPrecio+=$row['precio'];
    $this->Ln();
    }
    //SUMA
    $this->Cell($w[0]+$w[1]+$w[2], 6,'Total: ', 'LRBT');
    $this->Cell($w[3],6,number_format($sumaPrecio, 2), 'LRBT',0,'R');
    
    }

}



$pdf=new PDF('p','mm','letter');
$pdf->SetMargins(20, 10, 80);
$pdf->AliasNbPages();
$pdf->SetFont('times', '', '12');
$data=$pdf->LoadData();
$pdf->fechaPedido=$data->fechaPedido;
$pdf->documentoIdentidad=$data->documentoIdentidad;
$pdf->responsablePedido=$data->responsablePedido;
$pdf->NIT=$data->Nit;
$pdf->empresa=$data->empresa;
$pdf->AddPage();
$header=array('Codigo Producto', 'Producto', 'Cantidad', 'precio');
$dataProducto=$pdf->loadDataProductos();
$pdf->ImprovedTable($header,$dataProducto);
$pdf->SetTitle("FacturaPedido");  
$pdf->Output('I','AnyealeFacturaPedido.pdf');
?>