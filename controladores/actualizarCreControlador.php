<?php
require_once "../modelos/creditosModelo.php";


if(isset($_POST['btn_actualizar_credito'])){
	$cre_id = $_POST['txtcre_id'];
	$cre_codigo = $_POST['txtcre_codigo'];
	$cre_fecha=$_POST['txtcre_fecha'];
	$cre_monto=$_POST['txtcre_monto'];
	$cre_tasa=$_POST['seltasa'];
	$cre_cuotas=$_POST['txtcre_cuotas'];
	$cre_total=$_POST['txtcre_total'];
	$cre_pagado=$_POST['txtcre_pagado'];
	$cre_estado=$_POST['selestado'];
	$cre_observacion=$_POST['txtobserva'];
	$usu_id=$_POST['txtusu_id'];
	$cli_id = $_POST['txtcli_id'];

	
	$actualizarcredito=new creditos();
	$reg=$actualizarcredito->actualizarcredito($cre_id,$cre_codigo,$cre_fecha,$cre_monto,$cre_tasa,$cre_cuotas,$cre_total,$cre_pagado,$cre_estado, $cre_observacion);
	if($reg){
		print "<script>alert(\"Credito actualizado con exito.\");
		window.location='../empresa/';</script>";
	}else{
		print "<script>alert(\"Error al actualizar el credito\");
		window.location='../empresa/';</script>";
	}

}

?>