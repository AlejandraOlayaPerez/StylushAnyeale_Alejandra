<?php 
require ('../Plugin/fpd/fpdf.php');

//instanciamos una pagina
// $pdf=new FPDF();

//p: orientacion de la hoja. P Portrait(vertical). l landscape(horizontal)
//mm: unidad de medidad para separar los elementos.
//letter: tamaño del papel
// $pdf= new FPDF('l','mm','letter');

// //funcion para agregar una pagina
// $pdf->AddPage();

// //funcion para modificar la fuente del documento
// $pdf->SetFont('arial', 'B', 16);

//escribir dentro del PDF
//CELL: es una selda
// $pdf->cell(0,0,'hola mundo');
//ln:salto de linea
// $pdf->ln(10);
// $pdf->cell(0,0,'hola mundo 2');
//Orientacion del texto. L: Left, C: center, R; Rigth
// $pdf->cell(0,10, 'hola mundo 3',0,1,'R');
// $pdf->ln(5);
// $pdf->cell(0,10, 'hola mundo 4',0,1,'C');
// $pdf->ln(5);
// $pdf->cell(0,10, 'hola mundo 5',0,1,'L');
// $pdf->output();

// class PDF extends FPDF{

//     //cabecera del PFD
//     function header(){
//         //logo
//         //(LINK, POSICION HORIZONTAL, POSICION VERTICAL, TAMAÑO)
//         $this->image('../image/PNG_logo.png',1,8,45);

//         $this->SetFont('arial','B',15);

//         //UBICACION DEL TITULO
//         $this->Cell(60);
//         //(MARGEN HORIZONTAL, MARGEN VERTICAL, TITULO, CUADRADO 0:QUITA 1:PONE,'',ORIENTACION DE TEXTO  )
//         $this->Cell(30,10,'STYLUSH ANYEALE',0,1,'C');

//         $this->Cell(50);
//         $this->Cell(20,10,'Reporte de: ',0,1,'C');

//         $this->Cell(48);
//         $this->Cell(20,10,'Responsable: ',0,1,'C');

//         $this->Cell(46);
//         $this->Cell(20,10,'Fecha: ',0,1,'C');
//     }

//     function footer(){
//         // Posición:al final de la hoja
//         $this->SetY(-15);

//         $this->SetFont('arial','B',15);

//         // Número de página
//         $this->Cell(0,10,''.$this->PageNo().'',0,0,'R');
//     }

//     function LoadData($file){
//         //lee las lineas del fichero
//         $lines=file($file);  
//         $data=array();
//         foreach($lines as $lines)
//         $data[]=explode(';',trim($lines)); //explode: separa la linea txt con ; trim:elimina espacios
//         return $data; 
//     }

//     function BasicTable($header, $data){
//         //cabecera
//         foreach($header as $col)
//         $this->Cell(40,7,$col,1);
//         $this->Ln();
//         foreach($data as $row){
//             foreach($row as $col)
//                 $this->Cell(40,6,$col,1);
//             $this->Ln();
//         }
//     }
// }

// $pdf=new PDF();
// $pdf->AliasNbPages();
// $pdf->AddPage();
// $pdf->SetFont('times', '', '12');
// // for($i=1; $i<=40;$i++)
// //     $pdf->Cell(0,10, ''.$i,0,1);
// $header=array('País', 'Capital', 'Superficie (km2)', 'Pobl. (en miles)');
// $data=$pdf->LoadData('../plugin/fpd/paises.txt');
// $pdf->BasicTable($header,$data);
// $pdf->Output();

class PDF extends FPDF{

    //cabecera del PFD
    function header(){
        
        //logo
        //(LINK, POSICION HORIZONTAL, POSICION VERTICAL, TAMAÑO)
        $this->image('../image/PNG_logo.png',1,8,45);

        $this->SetFont('arial','B',15);

        //UBICACION DEL TITULO
        $this->Cell(60);
        //(MARGEN HORIZONTAL, MARGEN VERTICAL, TITULO, CUADRADO 0:QUITA 1:PONE,'',ORIENTACION DE TEXTO  )
        $this->Cell(30,10,'STYLUSH ANYEALE',0,1,'C');

        $this->Cell(50);
        $this->Cell(20,10,'Reporte de: ',0,1,'C');

        $this->Cell(48);
        $this->Cell(20,10,'Responsable: ',0,1,'C');

        $this->Cell(46);
        $this->Cell(20,10,'Fecha: ',0,1,'C');
    }

    function footer(){
        // Posición:al final de la hoja
        $this->SetY(-15);

        $this->SetFont('arial','B',15);

        // Número de página
        $this->Cell(0,10,''.$this->PageNo().'',0,0,'R');
    }

    function LoadData(){
        //lee las lineas del fichero
        require_once '../model/usuario.php';
        $oUsuario = new usuario();
        $consulta=$oUsuario->reporteUsuario();
         return $consulta;
        
    }

    function BasicTable($header, $data){
        //cabecera
        foreach($header as $col)
        //(ancho celda, largo celda, borde 0.quita borde 1.poneborde )
        $this->Cell(50,7,$col,1);
        $this->Ln();
        foreach($data as $row){
            foreach($row as $col)
                $this->Cell(50,6,$col,1);
            $this->Ln();
        }
    }
}

$pdf=new PDF('p','mm','letter');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('times', '', '12');
// for($i=1; $i<=40;$i++)
//     $pdf->Cell(0,10, ''.$i,0,1);
$header=array('documento', 'nombres', 'correoElectronico','rol');
$data=$pdf->LoadData();
$pdf->BasicTable($header,$data);
$pdf->Output();


?>