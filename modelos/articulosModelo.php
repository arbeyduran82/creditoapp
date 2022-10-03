<?php

require_once $_SERVER['DOCUMENT_ROOT']."/creditoapp/config/Conexion.php";

class producto extends Conectar{
    protected $codart;
    protected $nomart;
    protected $stockart;
    protected $estadoart;
    protected $detart;

    public function registroarticulo($codart,$nomart,$stockart,$estadoart,$detart){
        $sql="SELECT art_codigo, art_nombre, art_stock,	art_estado,	art_detalle FROM articulos WHERE art_codigo=$codart";
        //var_dump($sql);
        $result=$this->_bd->query($sql);
        $lista=mysqli_fetch_assoc($result);
        if($lista>0){
            echo "<script>alert('Producto ya esta registrado');
			window.location='../articulo-nuevo/';
			</script>";
        }else{
            $insertar="INSERT INTO articulos (art_codigo, art_nombre, art_stock, art_estado, art_detalle)VALUES('".$codart."','".$nomart."','".$stockart."','".$estadoart."','".$detart."')";
            $result=$this->_bd->query($insertar);
            if(!$result){
                print "<script>alert(\"problema al insertar los datos.\");
				window.location='../articulo-nuevo/';</script>";
            }else{
                print "<script>alert(\"Producto registrado.\");
				window.location='../articulo-lista/';</script>";
				$result->close();
				$this->_bd->close();
            }

        }
    }
    public function listararticulos(){
		$sql1="SELECT * FROM articulos ORDER BY art_codigo";
		$resul=$this->_bd->query($sql1);
		if($resul->num_rows>0){
			while ($row = $resul->fetch_assoc()) {
				$resultset[]=$row;
			}
		}
		return $resultset;
	}
    public function eliminararticulo($id){
		$query1="DELETE FROM articulos WHERE art_codigo='$id'";
		$resul=$this->_bd->query($query1);
		if($resul){
			print "<script>alert(\"Articulo Eliminado.\");
			window.location='../articulo-lista/';</script>";
		}else{
			print "<script>alert(\"No se puede eliminar el producto\");
			window.location='../articulo-lista/';</script>";
		}
	}
	public function buscararticulos($busquedaarticulos){
		$consulta1="SELECT * FROM articulos WHERE art_codigo LIKE '%$busquedaarticulos%'";
		$busquedaarticulos=$this->_bd->query($consulta1);

		if($busquedaarticulos->num_rows>0){
			while ($row=$busquedaarticulos->fetch_assoc()) {
				$resultset[]=$row;
			}return $resultset;
		}

	}
}
?>