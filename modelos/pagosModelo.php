<?php

require_once $_SERVER['DOCUMENT_ROOT']."/creditoapp/config/Conexion.php";

class pago extends Conectar{
	protected $idpag;
    protected $pagot;
    protected $fechapag;
    protected $codcredito;

    public function registropago($pagot,$fechapag,$codcredito){
        $sql="SELECT cre_pagado as pagado FROM creditos WHERE cre_codigo='$codcredito'";
		$resul=$this->_bd->query($sql);
	    $suma=$resul->fetch_assoc();
		$total=$suma['pagado']+(double)$pagot;
		
		$actu="UPDATE creditos set cre_codigo='$codcredito', cre_pagado='$total' WHERE cre_codigo='$codcredito'";
		$result2=$this->_bd->query($actu);
		if($result2){
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
		}else{
			print "<script>alert(\"datos de pago no registrados\");
				window.location='../pago-nuevo/';</script>";
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
    public function eliminarpago($id,$codcredito){
		$sql="SELECT cre_pagado as pagado1 FROM creditos WHERE cre_codigo='$codcredito'";
		$resul=$this->_bd->query($sql);
	    $credito=$resul->fetch_assoc();
		$sql2="SELECT pag_total as pagofinal FROM pagos WHERE cre_codigo='$codcredito'";
		$resul3=$this->_bd->query($sql2);
	    $pago=$resul3->fetch_assoc();
		$total=$credito['pagado1']-$pago['pagofinal'];
		
		$actu="UPDATE creditos set cre_codigo='$codcredito', cre_pagado='$total' WHERE cre_codigo='$codcredito'";
		$result3=$this->_bd->query($actu);
		if($result3){
		$query1="DELETE FROM pagos WHERE pag_id='$id'";
		$resul=$this->_bd->query($query1);
		if($resul){
			print "<script>alert(\"Pago Eliminado.\");
			window.location='../pago-lista?pagina=1';</script>";
		}else{
			print "<script>alert(\"No se puede eliminar el pago\");
			window.location='../pago-lista?pagina=1';</script>";
		}
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
			window.location='../pago-lista?pagina=1';</script>";
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