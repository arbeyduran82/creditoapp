<?php

require_once '../modelos/empresaModelo.php';

if (isset($_POST["btn_newempresa"])) {

   $emp_nombre = $_POST['txtnombree'];
   $emp_email = $_POST['txtemaile'];
   $emp_telefono = $_POST['txttelefonoe'];
   $emp_direccion = $_POST['txtdireccione'];
   var_dump($_POST);

  $Objregistroempresa = new empresa();
   $reg = $Objregistroempresa->registroempresa($emp_nombre,$emp_email,$emp_telefono,$emp_direccion);
   //echo $reg;
   
   if ($reg) {
      echo "<script>alert(\"Empresa registrada con exito\");
    windows.location='../empresa'; </script>";
   } else {
      echo "<script>alert(\"Error al registrar la empresa\");
    windows.location='../empresa'; </script>";
   }
}
