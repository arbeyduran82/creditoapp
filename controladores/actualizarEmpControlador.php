<?php
require_once "../modelos/empresaModelo.php";


if(isset($_POST['btn_actualizar_empresa'])){
	$emp_id = $_POST['txtemp_id'];
	$emp_nombre=$_POST['txtemp_nombre'];
    $emp_email=$_POST['txtemp_email'];
    $emp_telefono=$_POST['txtemp_telefono'];
    $emp_direccion=$_POST['txtemp_direccion'];

	$actualizarempresa=new empresa();
	$reg=$actualizarempresa->actualizarempresa($emp_id,$emp_nombre,$emp_email,$emp_telefono,$emp_direccion);
	if($reg){
		print "<script>alert(\"Empresa actualizada.\");
		window.location='../empresa/';</script>";
	}else{
		print "<script>alert(\"Empresa no actualizada\");
		window.location='../empresa/';</script>";
	}

}

?>