<?php
require_once '../modelos/articulosModelo.php';
//require_once '../vistas/contenidos/articulo-nuevo-vista.php';

if(isset($_POST["btn_nuevoarticulo"])){
    $codprod=$_POST['item_codigo_reg'];
    $nomprod=$_POST['item_nombre_reg'];
    $stoprod=$_POST['item_stock_reg'];
    $estprod=$_POST['item_estado_reg'];
    $detprod=$_POST['item_detalle_reg'];

    $articulo=new producto();
    $res=$articulo->registroarticulo($codprod,$nomprod,$stoprod,$estprod,$detprod);

    if($res){
        print "<script>alert(\"articulo registrado\");
				window.location='../vistas/contenidos/articulo-lista';</script>";
    }else{
        print "<script>alert(\"No se puede registrar articulo\");
				window.location='../vistas/contenidos/articulo-nuevo';</script>";
    }
}


?>