<?php
require_once "../modelos/pagosModelo.php";


if(isset($_POST['btn_actualizar_pago'])){
    $pagoida=$_POST['txtidpago_act'];
	$pagot=$_POST['txtpagototal_act'];
	$fechapt=$_POST['txtfechapago_act'];
    $codcrep=$_POST['txtcodcredito_act'];

	$actualizarpago=new pago();
	$reg=$actualizarpago->actualizarpago($pagoida,$pagot,$fechapt,$codcrep);
	if($reg){
		print "<script>alert(\"Pago actualizado.\");
		window.location='../pago-lista/';</script>";
	}else{
		print "<script>alert(\"Pago no actualizado\");
		window.location='../pago-actualizar/';</script>";
	}

}

?>