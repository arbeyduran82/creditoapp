<?php
require_once '../modelos/pagosModelo.php';
//require_once '../vistas/contenidos/articulo-nuevo-vista.php';

if(isset($_POST["btn_nuevopago"])){
    $pagototal=$_POST['txtpagototal'];
    $pagofecha=$_POST['txtfechapago'];
    $codcredito=$_POST['txtcodcredito'];

    $pago=new pago();
    $res=$pago->registropago($pagototal,$pagofecha,$codcredito);

    if($res){
        print "<script>alert(\"Pago registrado\");
				window.location='../vistas/contenidos/pago-lista';</script>";
    }else{
        print "<script>alert(\"No se puede registrar pago\");
				window.location='../vistas/contenidos/pago-nuevo';</script>";
    }
}


?>