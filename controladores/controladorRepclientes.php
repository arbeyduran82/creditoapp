<?php
require_once "../config/Conexion.php";
require('../vistas/css/fpdf/fpdf.php');
require_once '../modelos/reporteModelo.php';

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
        $this->Cell(80,85,'CLIENTES FINANCIEROS',0,0,'C');
        $this->Ln(55);
        $this->SetFont('times','B','13');
        $this->Cell(1);
        $this->Cell(40,8,'CEDULA',1,0,'C',0);
        $this->Cell(30,8,'NOMBRE',1,0,'C',0);
        $this->Cell(30,8,'APELLIDO',1,0,'C',0);
        $this->Cell(35,8,'TELEFONO',1,0,'C',0);
        $this->Cell(50,8,'DIRECCION',1,1,'C',0);

        
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
$datos = $obj1->listarclientesfinancieros1();

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('times','',12);

if($datos==0)
{
    print "<script>alert(\"ERROR: No existen clientes financieros\");
    window.location='../../reporte-clientes-financieros';</script>";

}

else
{
    foreach($datos as $row)
    {
        $pdf->Cell(1);
        $pdf->Cell(40,8,$row['cli_id'],1,0,'C',0);
        $pdf->Cell(30,8,$row['cli_nombre'],1,0,'C',0);
        $pdf->Cell(30,8,$row['cli_apellido'],1,0,'C',0);
        $pdf->Cell(35,8,$row['cli_telefono'],1,0,'C',0);
        $pdf->Cell(50,8,$row['cli_direccion'],1,1,'C',0);

    }
}


 $pdf-> Output();
 
?>
