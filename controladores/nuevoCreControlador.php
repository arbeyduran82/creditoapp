<?php

require_once '../modelos/creditosModelo.php';


if (isset($_POST["btn_newcredito"])) {

   $cli_id = $_POST['txtdocumentoc'];
   $cre_codigo = $_POST['txtcrecodigo'];
   $cre_fecha = $_POST['txtcrefecha'];
   $cre_cantidad = $_POST['txtcrevalor'];
   $cre_tasa = $_POST['seltasa'];
   $cre_cuotas = $_POST['txtcrecuotas'];
   $cre_estado = $_POST['selestado'];
   $cre_observacion = $_POST['txtobserva'];
   $usu_id = $_POST['selanalista'];

   
   $Objregistrocredito = new creditos();
   $reg = $Objregistrocredito->registrocredito($cli_id,$cre_codigo,$cre_fecha,$cre_cantidad,$cre_tasa,
   $cre_cuotas,$cre_estado,$cre_observacion,$usu_id);
   //echo $reg;
   if ($reg) {
      echo "<script>alert(\"Credito registrado con exito\");
    windows.location='../vistas/contenidos/solicitar-lista'; </script>";
   } else {
      echo "<script>alert(\"Error al registrar el credito\");
    windows.location='../vistas/contenidos/solicitar-nuevo'; </script>";
   }
}
