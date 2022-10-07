<?php
require_once "../modelos/articulosModelo.php";


if(isset($_POST['btn_actualizar_articulo'])){
	$id=$_POST['item_codigo_up'];
	$nombre=$_POST['item_nombre_up'];
    $stock=$_POST['item_stock_up'];
    $estado=$_POST['item_estado_up'];
    $detalle=$_POST['item_detalle_up'];

	$actualizararticulo=new producto();
	$reg=$actualizararticulo->actualizararticulos($id,$nombre,$stock,$estado,$detalle);
	if($reg){
		print "<script>alert(\"Articulo actualizado.\");
		window.location='../articulo-lista/';</script>";
	}else{
		print "<script>alert(\"Articulo no actualizado\");
		window.location='../articulo-actualizar/';</script>";
	}

}

?>