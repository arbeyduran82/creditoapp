<?php
require_once $_SERVER['DOCUMENT_ROOT']."/creditoapp/config/Conexion.php";

    class empresa extends Conectar{
        protected $emp_id;
        protected $emp_nombre;
        protected $emp_email;
        protected $emp_telefono;
        protected $emp_direccion;

        public function registroempresa($emp_nombre,$emp_email,$emp_telefono,$emp_direccion){
            $sql="SELECT * FROM empresa";
            var_dump($sql);
            $resultado=$this->_bd->query($sql);
            $sql1="INSERT INTO empresa (emp_nombre,emp_email,emp_telefono,emp_direccion)
            VALUES ('".$emp_nombre."','".$emp_email."','".$emp_telefono."','".$emp_direccion."')";
            $resultado=$this->_bd->query($sql1);
            if($resultado){
                print "<script>alert(\"Empresa registrada\");
                window.location='../empresa';</script>";
                $resultado->close();
                $this->_bd->close();
            }
            else{
                print "<script>alert(\"Empresa no registrada\");
                window.location='../empresa';</script>";
                /*$resultado->close();
                $this->_bd->close();*/
            }
        }
        public function listarempresa(){
            $sql="SELECT * FROM empresa";
            $resultado=$this->_bd->query($sql);
            if($resultado->num_rows>0){
                while($row=$resultado->fetch_assoc()){
                    $resultadoset[]=$row;
                }
            }
            return $resultadoset;
        }
        
        public function actualizarempresa($emp_id,$emp_nombre,$emp_email,$emp_telefono,$emp_direccion){
            $consulta="UPDATE empresa SET emp_nombre='$emp_nombre', emp_email='$emp_email', emp_telefono='$emp_telefono', emp_direccion='$emp_direccion' WHERE emp_id='$emp_id'";
            $resultado=$this->_bd->query($consulta);
            if($resultado){
                print "<script>alert(\"Empresa actualizadactualizada\");
                window.location='../empresa';</script>";  
            }
            else
            {
                print "<script>alert(\"Empresa no actualizada\");
                window.location='../empresa';</script>";
            }
        }

        public function eliminarempresa($emp_id){
            $query1="DELETE FROM empresa WHERE emp_id='$emp_id'";
            $resul=$this->_bd->query($query1);
            if($resul){
                print "<script>alert(\"Empresa Eliminado.\");
                window.location='../empresa/';</script>";
            }else{
                print "<script>alert(\"Error al eliminar empresa\");
                window.location='../empresa/';</script>";
            }
        }
        
    }
?>
