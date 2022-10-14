<?php
require_once "../config/Conexion.php";
require('../vistas/css/fpdf/fpdf.php');
require_once '../modelos/reporteModelo.php';

if(!empty($_POST))
{ 
    $cedulaE = $_POST['busqueda-cedula-estado'];
    
    class PDF extends FPDF
    {

        function Header()
        {
    

            $this->setY(12);
            $this->setX(10);
            
            $this->SetFont('times', 'B', 17);
            
            $this->Text(110,25, utf8_decode('COLCHONES SOÑADOR'));
            $this->Text(115,30, utf8_decode('Bogota, Kenndy central'));
            $this->Text(125,35, utf8_decode('Tel: 6013426789'));
            $this->Text(115,40, utf8_decode('ventas@colchones.com'));
            
            // Fecha
            $this->SetFont('times','B',16);    
            $this->Text(230,10, utf8_decode('Fecha:'));
            $this->SetFont('times','',16);    
            $this->Text(250,10, date('d/m/Y'));

            //Tabla
            $this->SetFont('times','B','20');
            $this->Cell(60);
            $this->SetTextColor(65,105,225);
            $this->Cell(152,85,'INFORMACION DEL CREDITO',0,0,'C');
            $this->Ln(55);
            $this->SetFont('times','B','15');
            $this->Cell(1);
            $this->Cell(20,8,'ID',1,0,'C',0);
            $this->Cell(40,8,'CLIENTE',1,0,'C',0);
            $this->Cell(40,8,'FECHA',1,0,'C',0);
            $this->Cell(35,8,'ESTADO',1,0,'C',0);
            $this->Cell(40,8,'MONTO',1,0,'C',0);
            $this->Cell(30,8,'TASA',1,0,'C',0);
            $this->Cell(30,8,'CUOTAS',1,0,'C',0);
            $this->Cell(35,8,'TOTAL',1,1,'C',0);

    
    
        }

        function Footer() 
        {
            $this->SetY(-15);
            $this->SetFont('Arial','I',10);
            $this->Cell(0,5, utf8_decode('Pagina').$this->PageNo().'/{nb}',0,0,'C');
            $this->Cell(95,5,date('d/m/Y | g:i:a') ,00,1,'R');
            $this->Cell(0,5,utf8_decode("COLCHONES SOÑADOR © Todos los derechos reservados."),0,1,"C");
            $this->Line(17,370,260,370);
        }
    }
    $pdf = new PDF('P','mm',array(380,290));
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('times','',15);

    $obj1 = new Reportes();
    $datos =$obj1->reporteestadocredito($cedulaE);


    foreach($datos as $row)
    {
        $pdf->Cell(1);
        $pdf->Cell(20,8,$row['cre_id'],1,0,'C',0);
        $pdf->Cell(40,8,$row['cre_codigo'],1,0,'C',0);
        $pdf->Cell(40,8,$row['cre_fecha'],1,0,'C',0);
        $pdf->Cell(35,8,$row['cre_estado'],1,0,'C',0);
        $pdf->Cell(40,8,$row['cre_monto'],1,0,'C',0);
        $pdf->Cell(30,8,$row['cre_tasa'],1,0,'C',0);
        $pdf->Cell(30,8,$row['cre_cuotas'],1,0,'C',0);
        $pdf->Cell(35,8,$row['cre_total'],1,1,'C',0);

    }


        $pdf-> Output();
}
 
?>

    