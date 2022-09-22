<?php
require_once "../config/Conexion.php";
    
    class usuario extends Conectar{
        protected $usu_id;
        protected $usu_cedula;
        protected $usu_nombre;
        protected $usu_apellido;
        protected $usu_telefono;
        protected $usu_direccion;
        protected $usu_email;
        protected $usu_usuario;
        protected $usu_clave;
        protected $usu_privilegio;

        public function loginusuarios($usu_email,$usu_clave,$usu_privilegio){
            
            if($usu_privilegio=="admin"){
                $sql="SELECT * FROM usuarios WHERE usu_email='$usu_email' AND usu_clave='$usu_clave' AND usu_privilegio='admin'";
                $resultado=$this->_bd->query($sql);
                $filas=$resultado->num_rows;
                if($filas==1){
                    return true;
                }
                else{
                    return false;
                }
            }
            elseif($usu_privilegio=="analista"){
                $sql="SELECT * FROM usuarios WHERE usu_email='$usu_email' AND usu_clave='$usu_clave' AND usu_privilegio='analista'";
                $resultado=$this->_bd->query($sql);
                $filas=$resultado->num_rows;
                if($filas==1){
                    return true;
                }
                else{
                    return false;
                }
            }
            if($usu_privilegio=="cliente"){
                $sql="SELECT * FROM usuarios WHERE usu_email='$usu_email' AND usu_clave='$usu_clave' AND usu_privilegio='cliente'";
                $resultado=$this->_bd->query($sql);
                $filas=$resultado->num_rows;
                if($filas==1){
                    return true;
                }
                else{
                    return false;
                }
            }  
            else{
                print "<script>alert(\"Completar todos los campos\");
                window.location='../index.php';</script>";
            }
        }
		
        public function registrousuarios($usu_cedula,$usu_nombre,$usu_apellido,$usu_telefono,$usu_direccion,$usu_email,$usu_usuario,$usu_clave,$usu_privilegio){
            $sql="SELECT * FROM usuarios";
            $resultado=$this->_bd->query($sql);
            $sql1="INSERT INTO usuarios (usu_cedula,usu_nombre,usu_apellido,usu_telefono,usu_direccion,usu_email,usu_usuario,usu_clave,usu_privilegio)
            VALUES ('".$usu_cedula."','".$usu_nombre."','".$usu_apellido."','".$usu_telefono."','".$usu_direccion."','".$usu_email."','".$usu_email."','".$usu_usuario."','".$usu_clave."','".$usu_privilegio."')";
            $resultado=$this->_bd->query($sql1);
            if($resultado){
                print "<script>alert(\"Usuario registrado\");
                window.location='../vistas/contenidos/loginvista.php';</script>";
                $resultado->close();
                $this->_bd->close();
            }
            else{
                print "<script>alert(\"Usuario no registrado\");
                window.location='../controller/controladorregistrarusuarios.php';</script>";
                /*$resultado->close();
                $this->_bd->close();*/
            }
        }
        public function listarusuarios(){
            $sql="select * from usuarios";
            $resultado=$this->_bd->query($sql);
            if($resultado->num_rows>0){
                while($row=$resultado->fetch_assoc()){
                    $resultadoset[]=$row;
                }
            }
            return $resultadoset;
        }
        public function eliminarusuarios($id){
            $query="delete from usuarios where idUsuario='$id'";
            $resultado=$this->_bd->query($query);
            if(!$resultado){
                print "<script>alert(\"Uusario no eliminado\");
                window.location='../controller/controladorregistrarusuarios.php'</script>";
            }
            else{
                print "<script>alert(\"Usuario eliminado\");
                window.location='../controller/controladorregistrarusuarios.php'</script>";
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
        
        public function cambiarpass($usu,$cona,$conn){
            $sql="UPDATE usuarios SET Contraseña='$conn' Where Contraseña='$cona' AND Email='$usu'";
            $res=$this->_bd->query($sql);
            if($res){
                print "<script>alert(\"Contraseña actualizada\");
                window.location='../index.php';</script>";  
            }
            else
            {
                print "<script>alert(\"Contraseña no actualizado\");
                window.location='../index.php';</script>";
            }
        }
    }
?>
