<?php

require_once $_SERVER['DOCUMENT_ROOT']."/creditoapp/config/Conexion.php";

class pago extends Conectar{
	protected $idpag;
    protected $pagot;
    protected $fechapag;
    protected $codcredito;

    public function registropago($pagot,$fechapag,$codcredito){
        $sql="SELECT * FROM pagos";
        $result=$this->_bd->query($sql);
        $insertar="INSERT INTO pagos (pag_total, pag_fecha, cre_codigo)VALUES('".$pagot."','".$fechapag."','".$codcredito."')";
            $result=$this->_bd->query($insertar);
            if(!$result){
                print "<script>alert(\"problema al insertar los datos.\");
				window.location='../pago-nuevo/';</script>";
            }else{
                print "<script>alert(\"Pago registrado.\");
				window.location='../pago-lista?pagina=1';</script>";
				$result->close();
				$this->_bd->close();
            }

        }
    public function listarpagos($iniciar,$Pagos_x_pagina){
		$sql1="SELECT * FROM pagos LIMIT $iniciar,$Pagos_x_pagina";
		$resul=$this->_bd->query($sql1);
		if($resul->num_rows>0){
			while ($row = $resul->fetch_assoc()) {
				$resultset[]=$row;
			}
		}
		return $resultset;
	}
    public function eliminarpago($id){
		$query1="DELETE FROM pagos WHERE pag_id='$id'";
		$resul=$this->_bd->query($query1);
		if($resul){
			print "<script>alert(\"Pago Eliminado.\");
			window.location='../pago-lista/';</script>";
		}else{
			print "<script>alert(\"No se puede eliminar el pago\");
			window.location='../pago-lista/';</script>";
		}
	}
	public function buscarpagos($busquedapago){
		$consulta1="SELECT * FROM pagos WHERE pag_id LIKE '%$busquedapago%'";
		$busquedapago=$this->_bd->query($consulta1);

		if($busquedapago->num_rows>0){
			while ($row=$busquedapago->fetch_assoc()) {
				$resultset[]=$row;
			}return $resultset;
		}

    }
	public function Obtenerpago($id)
    {
        $query1 = "SELECT * FROM pagos WHERE pag_id='$id'";
        $resul = $this->_bd->query($query1);
        
        if($resul->num_rows > 0)
        {
            while($row = $resul->fetch_assoc())
            {
                $resultadoset[] = $row;
            }
        }

        return $resultadoset;
    }
	public function actualizarpago($idpag,$pagot,$fechapag,$codcredito){
		$consulta="UPDATE pagos set pag_id='$idpag', pag_total='$pagot', pag_fecha='$fechapag', cre_codigo='$codcredito' WHERE pag_id='$idpag'";
		$resul=$this->_bd->query($consulta);
		if(!$resul){
			print "<script>alert(\"No se puede actualizar el pago\");
			window.location='../pago-actualizar/';</script>";
		}else{
			print "<script>alert(\"Pago actualizado\");
			window.location='../pago-lista/';</script>";
		}
	}
	public function contarfilaspag(){
		$sql="SELECT count(*) FROM pagos";
		$resultado=$this->_bd->query($sql);

		while($row = mysqli_fetch_array($resultado)) {
			$Total = $row['count(*)'];
		}
		return $Total;

	}
}
?>