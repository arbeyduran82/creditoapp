<?php
require_once '../config/APP.php';
require_once '../modelos/usuarioModelo.php';

    if(isset($_POST['ingresar'])){
        $usu_usuario=$_POST['txtusuario'];
        $usu_clave=$_POST['txtpassword'];
        $usu_privilegio=$_POST['txtrol'];
        $usu=new usuario();
        if(empty($usu_usuario)||empty($usu_clave)){
            print "<script>alert(\"Usuario o contraseña vacía\");
            window.location='../index.php';</script>";
        }
        elseif($usu->loginusuarios($usu_usuario,$usu_clave,$usu_privilegio)){
            if($usu_privilegio=="analista"){
                session_start();
                $_SESSION['analista']=$usu_usuario;
                $_SESSION['verificar']=true;
                header("location:".SERVERURL."inicio/");
            }
            elseif($usu_privilegio=="cliente"){
                session_start();
                $_SESSION['cliente']=$usu_usuario;
                $_SESSION['verificar']=true;
                header("location:".SERVERURL."inicio/");
            }
            elseif($usu_privilegio=="admin"){
                session_start();
                $_SESSION['usuario']=$usu_usuario;
                $_SESSION['verificar']=true;
                header("location:".SERVERURL."inicio/");
            }
        }
        else{
            print "<script>alert(\"El usuario no existe\");
            window.location='';</script>";
            header("location:".SERVERURL);
        }
    }else {
       
    }
?>