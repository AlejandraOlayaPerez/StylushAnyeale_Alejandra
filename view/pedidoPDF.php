<?php 
require ('../Plugin/fpd/fpdf.php');

class PDF extends FPDF{

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

        $this->SetFont('times','B',15);
        $this->Cell(52);
        $this->Cell(20,5,'Fecha: ',0,1,'C');
        // $fechaPedido=date('l js\of f y h:i:s A');

        $this->Cell(70);
        $this->Cell(20,5,'Documento Identidad: ',0,1,'C');

        $this->Cell(66);
        $this->Cell(20,5,'Nombre y apellido: ',0,1,'C');

        $this->Cell(60.5);
        $this->Cell(20,5,'NIT Empresa: ',0,1,'C');

        $this->Cell(55);
        $this->Cell(20,5,'Empresa: ',0,1,'C');
        
    }

    function footer(){
        // Posición:al final de la hoja
        $this->SetY(-15);

        $this->SetFont('times','B',15);
       
        $this->Cell(0,10,'"Estilo y confianza te brinda ANYEALE" ',0,0,'L');

 
        $this->Cell(0,10,''.$this->PageNo().'',0,0,'R');
    }

}


$pdf=new PDF('p','mm','letter');
$pdf->SetMargins(10, 10, 10);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('times', '', '12');
$data=$pdf->LoadData();
$pdf->Output();
?>