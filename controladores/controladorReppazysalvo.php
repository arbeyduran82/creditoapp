<?php
require_once "../config/Conexion.php";
require('../vistas/css/fpdf/fpdf.php');
require_once '../modelos/reporteModelo.php';

if(!empty($_POST))
{ 
    $cedulaP = $_POST['busqueda-cedula-pazysalvo'];
    $obj1 = new Reportes();
    $datos =$obj1->reportepazysalvo($cedulaP);

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

            //Titulo
            $this->SetFont('times','B','20');
            $this->Cell(60);
            $this->SetTextColor(65,105,225);
            $this->Cell(80,85,'REPORTE PAZ Y SALVO',0,1,'C');



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

    $Conexion = new mysqli('localhost','root','','micredito'); 
    
    $sql = "SELECT * FROM clientes WHERE cli_id='$cedulaP'";
    $Resultado = mysqli_query($Conexion,$sql) or die("Error en la tabla". mysqli_error($Conexion));

        $pdf = new PDF();
        $pdf->AliasNbPages();
        $pdf->AddPage();

              // Agregamos los TEXTO DEL REPORTE
              $pdf->SetFont('times','',12);  
              $filas = mysqli_fetch_assoc($Resultado);
                
              $pdf->Text(10,70,'A quien pueda interesar:');
              $pdf->Text(10,80, utf8_decode('Nos permitimos informar que '.utf8_decode(strtoupper($filas['cli_nombre'])).' '. strtoupper($filas['cli_apellido']).' identificado con Cedula de Ciudadania No. '.number_format($filas['cli_id'])));
              $pdf->Text(10,85, utf8_decode('al dia de hoy se encuentra paz y salvo con su credito en la empresa COLCHONES SOÑADOR.'));
        
              $pdf->SetTextColor(65,105,225);
              $pdf->SetFont('times','B','13');
              $pdf->Cell(1);
              $pdf->Cell(10,8,'#',1,0,'C',0);
              $pdf->Cell(30,8,'CEDULA',1,0,'C',0);
              $pdf->Cell(30,8,'INICIO',1,0,'C',0);
              $pdf->Cell(35,8,'MONTO',1,0,'C',0);
              $pdf->Cell(25,8,'CUOTAS',1,0,'C',0);
              $pdf->Cell(35,8,'TOTAL',1,0,'C',0);
              $pdf->Cell(28,8,'ESTADO',1,1,'C',0);


              $pdf->SetTextColor(0,0,0);
              $pdf->SetFont('times','','12');


              foreach($datos as $row)
              {

                $pdf->Cell(1); 
                $pdf->Cell(10,8,$row['cre_id'],1,0,'C',0);
                $pdf->Cell(30,8,$row['cre_codigo'],1,0,'C',0);
                $pdf->Cell(30,8,$row['cre_fecha'],1,0,'C',0);
                $pdf->Cell(35,8,$row['cre_monto'],1,0,'C',0);
                $pdf->Cell(25,8,$row['cre_cuotas'],1,0,'C',0);
                $pdf->Cell(35,8,$row['cre_total'],1,0,'C',0);
                $pdf->Cell(28,8,$row['cre_estado'],1,1,'C',0);
      
              }


        
        $pdf-> Output();
}
 
?>