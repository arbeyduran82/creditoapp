<?php
require_once "../modelos/articulosModelo.php";


$id = $_GET['id'];
$Objeliminararticulo= new producto();
$Reg = $Objeliminararticulo->eliminararticulo($id);
     
if($Reg){
	print "<script>alert(\"Articulo eliminado.\");
				window.location='../articulo-lista/';</script>";
	}else{
	print "<script>alert(\"Articulo no eliminado\");
	window.location='../articulo-lista/';</script>";

	}

?>