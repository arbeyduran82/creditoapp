<?php
require_once "../modelos/creditosModelo.php";


if(isset($_POST['btn_actualizar_credito'])){
	$cre_id = $_POST['txtcre_id'];

	$cre_tasa=$_POST['seltasa'];
	$cre_cuotas=$_POST['txtcre_cuotas'];
	
	$cre_estado=$_POST['selestado'];
	$cre_observacion=$_POST['txtobserva'];
	

	
	$actualizarcredito=new creditos();
	$reg=$actualizarcredito->actualizarcredito($cre_id,$cre_tasa,$cre_cuotas,$cre_estado, $cre_observacion);
	if($reg){
		print "<script>alert(\"Credito actualizado con exito.\");
		window.location='../empresa/';</script>";
	}else{
		print "<script>alert(\"Error al actualizar el credito\");
		window.location='../empresa/';</script>";
	}

}

?>