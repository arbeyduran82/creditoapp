<?php
require_once $_SERVER['DOCUMENT_ROOT']."/creditoapp/config/Conexion.php";

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

        public function consultabasica($usu_id){
            $sql="SELECT * FROM usuarios WHERE usu_id='$usu_id' ";
            $resultado=$this->_bd->query($sql);
            if($resultado->num_rows>0){
                while($row=$resultado->fetch_assoc()){
                    $resultadoset[]=$row;
                }
            }
            return $resultadoset;
        }

        public function loginusuarios($usu_email,$usu_clave,$usu_privilegio){
            
            if($usu_privilegio=="admin"){
                $sha1md5Clave = md5(sha1($usu_clave));
                $sql="SELECT * FROM usuarios WHERE usu_email='$usu_email' AND usu_clave='$sha1md5Clave' AND usu_privilegio='admin'";
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
                $sha1md5Clave = md5(sha1($usu_clave));
                $sql="SELECT * FROM usuarios WHERE usu_email='$usu_email' AND usu_clave='$sha1md5Clave' AND usu_privilegio='analista'";
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
                print "<script>alert(\"¡Ups! Algo salió mal\");
                window.location='../index.php';</script>";
            }
        }
		
        public function registrousuarios($usu_cedula,$usu_nombre,$usu_apellido,$usu_telefono,$usu_direccion,$usu_email,$usu_usuario,$usu_clave,$usu_privilegio){
            $sha1md5Clave = md5(sha1($usu_clave));
            $sql="SELECT * FROM usuarios";
            $resultado=$this->_bd->query($sql);
            $sql1="INSERT INTO usuarios (usu_cedula,usu_nombre,usu_apellido,usu_telefono,usu_direccion,usu_email,usu_usuario,usu_clave,usu_privilegio)
            VALUES ('".$usu_cedula."','".$usu_nombre."','".$usu_apellido."','".$usu_telefono."','".$usu_direccion."','".$usu_email."','".$usu_usuario."','".$sha1md5Clave."','".$usu_privilegio."')";
            $resultado=$this->_bd->query($sql1);
            if($resultado){
                print "<script>alert(\"Usuario registrado\");
                window.location='../usuario-lista?pagina=1';</script>";
                $resultado->close();
                $this->_bd->close();
            }
            else{
                print "<script>alert(\"Usuario no registrado\");
                window.location='../usuario-lista?pagina=1';</script>";
                /*$resultado->close();
                $this->_bd->close();*/
            }
        }
        /*Esta funcion recibe parametros por medio del controladores del paginador
        de usuarios*/
        public function listarusuarios($iniciar,$Articulos_x_pagina){
            $sql="select * from usuarios LIMIT $iniciar,$Articulos_x_pagina";
            $resultado=$this->_bd->query($sql);
            if($resultado->num_rows>0){
                while($row=$resultado->fetch_assoc()){
                    $resultadoset[]=$row;
                }
            }
            return $resultadoset;
        }
        public function eliminarusuarios($usu_id){
            $query="DELETE FROM usuarios WHERE usu_id='$usu_id'";
            $resultado=$this->_bd->query($query);
            if(!$resultado){
                print "<script>alert(\"Uusario no eliminado\");
                window.location='../usuario-lista?pagina=1'</script>";
            }
            else{
                print "<script>alert(\"Usuario eliminado\");
                window.location='../usuario-lista?pagina=1'</script>";
            }
        }
        public function actualizarusuario($usu_id,$usu_cedula,$usu_nombre,$usu_apellido,$usu_telefono,$usu_direccion){
            $consulta="UPDATE usuarios SET usu_cedula='$usu_cedula', usu_nombre='$usu_nombre', usu_apellido='$usu_apellido', usu_telefono='$usu_telefono', usu_direccion='$usu_direccion' WHERE usu_id='$usu_id'";
            $resultado=$this->_bd->query($consulta);
            if($resultado){
                print "<script>alert(\"Usuario actualizado\");
                window.location='../usuario-lista?pagina=1';</script>";  
            }
            else
            {
                print "<script>alert(\"Usuario no actualizado\");
                window.location='../usuario-lista?pagina=1';</script>";
            }
        }
        
        public function cambiarpass($usu,$cona,$conn){
            $consulta="UPDATE usuarios SET Contraseña='$conn' Where Contraseña='$cona' AND Email='$usu'";
            $resultado=$this->_bd->query($consulta);
            if($resultado){
                print "<script>alert(\"Contraseña actualizada\");
                window.location='../index.php';</script>";  
            }
            else
            {
                print "<script>alert(\"Contraseña no actualizado\");
                window.location='../index.php';</script>";
            }
        }

        public function contarfilas(){
            $sql="SELECT count(*) FROM usuarios";
            $resultado=$this->_bd->query($sql);

            while($row = mysqli_fetch_array($resultado)) {
                $Total = $row['count(*)'];
            }
            return $Total;

        }
    }
?>
