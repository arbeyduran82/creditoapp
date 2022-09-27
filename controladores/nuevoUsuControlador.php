<?php

require_once '../modelos/usuarioModelo.php';


if (isset($_POST["btn_newusuario"])) {

   $usu_cedula = $_POST['txtcedulau'];
   $usu_nombre = $_POST['txtnombreu'];
   $usu_apellido = $_POST['txtapellidou'];
   $usu_telefono = $_POST['txttelefonou'];
   $usu_direccion = $_POST['txtdireccionu'];
   $usu_email = $_POST['txtemailu'];
   $usu_usuario = $_POST['txtnicku'];
   $usu_clave = $_POST['txtclaveu'];
   $usu_privilegio = $_POST['selrol'];

   $Objregistrousuario = new usuario();
   $reg = $Objregistrousuario->registrousuarios($usu_cedula,$usu_nombre,$usu_apellido,$usu_telefono,$usu_direccion,
   $usu_email,$usu_usuario,$usu_clave,$usu_privilegio);
   //echo $reg;
   if ($reg) {
      echo "<script>alert(\"Usuario registrado con exito\");
    windows.location='../vistas/contenidos/usuario-lista'; </script>";
   } else {
      echo "<script>alert(\"Error al registrar el Usuario\");
    windows.location='controladorregistrarusuarios.php'; </script>";
   }
}
