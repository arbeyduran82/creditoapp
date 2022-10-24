<?php
require_once "../modelos/pagosModelo.php";


$id = $_GET['id'];
$codcredito = $_GET['codigo'];
$Objeliminarpago= new pago();
$Reg = $Objeliminarpago->eliminarpago($id,$codcredito);
     
if($Reg){
	print "<script>alert(\"Pago eliminado.\");
				window.location='../articulo-lista/';</script>";
	}else{
	print "<script>alert(\"Pago no eliminado\");
	window.location='../articulo-lista/';</script>";

	}

?>