<?php
require_once "../config/Conexion.php";
require('../vistas/css/fpdf/fpdf.php');
require_once '../modelos/reporteModelo.php';
error_reporting(0);

$pdf=new FPDF();

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

        //Tabla
        $this->SetFont('times','B','20');
        $this->Cell(60);
        $this->SetTextColor(65,105,225);
        $this->Cell(80,85,'CREDITOS EN SOLICITUD',0,0,'C');
        $this->Ln(55);
        $this->SetFont('times','B','13');
        $this->Cell(1);
        $this->Cell(20,8,'#',1,0,'C',0);
        $this->Cell(40,8,'CLIENTE',1,0,'C',0);
        $this->Cell(40,8,'FECHA',1,0,'C',0);
        $this->Cell(50,8,'MONTO',1,0,'C',0);
        $this->Cell(40,8,'ESTADO',1,1,'C',0);
       
        
    }
    function Footer() 
    {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,5, utf8_decode('Pagina').$this->PageNo().'/{nb}',0,0,'C');
        $this->Cell(95,5,date('d/m/Y | g:i:a') ,00,1,'R');
        $this->Line(10,287,200,287);
        $this->Cell(0,5,utf8_decode("COLCHONES SOÑADOR © Todos los derechos reservados."),0,0,"C");
        
    }
}

$obj1 = new Reportes();
$datos = $obj1->reportesolicitudes1();

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('times','',12);


if($datos==false)
{
    print "<script>alert(\"ERROR: No existen creditos en estudio\");
    window.location='../../reporte-solicitudes?pagina=1';</script>";
    

}

else
{
    foreach($datos as $row)
    {
        $pdf->Cell(1);
        $pdf->Cell(20,8,$row['cre_id'],1,0,'C',0);
        $pdf->Cell(40,8,$row['cre_codigo'],1,0,'C',0);
        $pdf->Cell(40,8,$row['cre_fecha'],1,0,'C',0);
        $pdf->Cell(50,8,$row['cre_monto'],1,0,'C',0);
        $pdf->Cell(40,8,$row['cre_estado'],1,1,'C',0);

    }
}


 $pdf-> Output();
 
?>