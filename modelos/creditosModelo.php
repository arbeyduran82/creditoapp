<?php
require_once $_SERVER['DOCUMENT_ROOT']."/creditoapp/config/Conexion.php";

    class creditos extends Conectar{
        protected $cre_id;
        protected $cre_codigo;
        protected $cre_fecha;
        protected $cre_monto;
        protected $cre_tasa;
        protected $cre_cuotas;
        protected $cre_total;
        protected $cre_pagado ;
        protected $cre_estado;
        protected $cre_observaciones;
        protected $usu_id;
        protected $cli_id;
        
        public function consultasbasicas(){
            $sql="SELECT * FROM creditos INNER JOIN usuarios GROUP BY 13";
            $resultado=$this->_bd->query($sql);
            if($resultado->num_rows>0){
                while($row=$resultado->fetch_assoc()){
                    $resultadoset[]=$row;
                }
            }
            return $resultadoset;
        }

        public function registrocredito($cre_codigo,$cre_fecha,$cre_monto,$cre_tasa,$cre_cuotas,$cre_total,$cre_pagado,$cre_estado,$cre_observacion,$usu_id,$cli_id){
            /*$sql="SELECT * FROM creditos";
            $resultado=$this->_bd->query($sql);*/
            
            $sql1="INSERT INTO creditos (cre_codigo,cre_fecha,cre_monto,cre_tasa,cre_cuotas,cre_total,cre_pagado,cre_estado,cre_observacion,usu_id,cli_id)
            VALUES ('".$cre_codigo."','".$cre_fecha."','".$cre_monto."','".$cre_tasa."','".$cre_cuotas."','".$cre_total."','".$cre_pagado."','".$cre_estado."','".$cre_observacion."','".$usu_id."','".$cli_id."')";
            $resultado=$this->_bd->query($sql1);
            var_dump($resultado);
            if($resultado){
                print "<script>alert(\"Credito registrado\");
                window.location='../solicitud-solicitud/';</script>";
                $resultado->close();
                $this->_bd->close();
            }
            else{
                print "<script>alert(\"Credito no registrado\");
                window.location='../solicitar-nuevo';</script>";
                /*$resultado->close();
                $this->_bd->close();*/
            }
        }
        public function listarcreditos(){
            $sql="select * from creditos";
            $resultado=$this->_bd->query($sql);
            if($resultado->num_rows>0){
                while($row=$resultado->fetch_assoc()){
                    $resultadoset[]=$row;
                }
            }
            return $resultadoset;
        }
        public function eliminarcreditos($cre_id){
            $query="DELETE FROM creditos WHERE cre_id='$cre_id'";
            $resultado=$this->_bd->query($query);
            if(!$resultado){
                print "<script>alert(\"Credito no eliminado\");
                window.location='../solicitar-lista'</script>";
            }
            else{
                print "<script>alert(\"Credito eliminado\");
                window.location='../solicitar-lista'</script>";
            }
        }
        public function actualizarusuario($id,$nombre,$apellido,$email,$pass,$rol){
            $consulta="UPDATE usuarios SET nombreUsu='$nombre', apellidoUsu='$apellido', emailUsu='$email', pass='$pass', rol='$rol' WHERE id='$id'";
            $resultado=$this->_bd->query($consulta);
            if($resultado){
                print "<script>alert(\"Usuario actualizado\");
                window.location='../view/principal.php';</script>";  
            }
            else
            {
                print "<script>alert(\"Usuario no actualizado\");
                window.location='../view/principal.php';</script>";
            }
        }
        
        public function buscarcliente($busquedaclientes){
            $consulta1="SELECT * FROM clientes WHERE cli_id LIKE '%$busquedaclientes%'";
            $busquedaclientes=$this->_bd->query($consulta1);
            
            if($busquedaclientes->num_rows>0){
                while ($row=$busquedaclientes->fetch_assoc()) {
                    $resultset[]=$row;
                }return $resultset;
                
            }
    
        }
    }
?>
