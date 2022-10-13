<?php
require_once "../modelos/usuarioModelo.php";


if(isset($_POST['btn_actualizar_usuario'])){
	$usu_id = $_POST['txtusu_id'];
	$usu_cedula = $_POST['txtusu_cedula'];
	$usu_nombre=$_POST['txtusu_nombre'];
	$usu_apellido=$_POST['txtusu_apellido'];
    $usu_telefono=$_POST['txtusu_telefono'];
    $usu_direccion=$_POST['txtusu_direccion'];

	
	$actualizarusuario=new usuario();
	$reg=$actualizarusuario->actualizarusuario($usu_id,$usu_cedula,$usu_nombre,$usu_apellido,$usu_telefono,$usu_direccion);
	if($reg){
		print "<script>alert(\"Usuario actualizado con exito.\");
		window.location='../empresa/';</script>";
	}else{
		print "<script>alert(\"Error al actualizar el usuario\");
		window.location='../empresa/';</script>";
	}

}

?>