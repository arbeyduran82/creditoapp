<?php
require_once "../config/Conexion.php";
require('../vistas/css/fpdf/fpdf.php');
require_once '../modelos/reporteModelo.php';

if(!empty($_POST))
{ 
    $cedulaH = $_POST['busqueda-cedula-historial'];

        class PDF extends FPDF
    {
        function Header() 
        {

            $this->setY(12);
            $this->setX(10);
            
            $this->SetFont('times', 'B', 13);
            
            $this->Text(80,25, utf8_decode('COLCHONES SOÑADOR'));
            $this->Text(85,30, utf8_decode('Bogota, Kenndy central'));
            $this->Text(92,35, utf8_decode('Tel: 6013426789'));
            $this->Text(84,40, utf8_decode('ventas@colchones.com'));
            
            // Fecha
            $this->SetFont('times','B',12);    
            $this->Text(167,10, utf8_decode('Fecha:'));
            $this->SetFont('times','',12);    
            $this->Text(180,10, date('d/m/Y'));
         
            $this->SetFont('times','B','20');
            $this->Cell(60);
            $this->SetTextColor(65,105,225);
            $this->Cell(80,85,'HISTORIAL DE PAGOS',0,0,'C');
            $this->Ln(55);
            $this->SetFont('times','B','15');
            $this->Cell(1);
            $this->Cell(30,8,'ID',1,0,'C',0);
            $this->Cell(50,8,'CLIENTE',1,0,'C',0);
            $this->Cell(50,8,'TOTAL',1,0,'C',0);
            $this->Cell(60,8,'FECHA DE PAGO',1,1,'C',0);
            
        }
        function Footer() 
        {
            $this->SetY(-15);
            $this->SetFont('times','I',9);
            $this->Cell(0,5, utf8_decode('Pagina').$this->PageNo().'/{nb}',0,0,'C');
            $this->Cell(95,5,date('d/m/Y | g:i:a') ,00,1,'R');
            $this->Line(10,287,200,287);
            $this->Cell(0,5,utf8_decode("COLCHONES SOÑADOR © Todos los derechos reservados."),0,0,"C");
            
        }
    }

        $obj1 = new Reportes();
        $datos =$obj1->buscarcedulahistorial($cedulaH);

        $pdf = new PDF();
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('times','',13);

        foreach($datos as $row)
        {
            $pdf->Cell(1);
            $pdf->Cell(30,8,$row['pag_id'],1,0,'C',0);
            $pdf->Cell(50,8,$row['cre_codigo'],1,0,'C',0);
            $pdf->Cell(50,8,$row['pag_total'],1,0,'C',0);
            $pdf->Cell(60,8,$row['pag_fecha'],1,1,'C',0);

        }


        $pdf-> Output();
}
 
?>





