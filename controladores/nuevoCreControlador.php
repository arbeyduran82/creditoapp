<?php

require_once '../modelos/creditosModelo.php';


if (isset($_POST["btn_newcredito"])) {

   $cre_codigo = $_POST['txtcrecodigo'];
   $cre_fecha = $_POST['txtcrefecha'];
   $cre_monto = $_POST['txtcremonto'];
   $cre_tasa = $_POST['seltasa'];
   $cre_cuotas = $_POST['txtcrecuotas'];

   $cre_pagado = 0;
   $cre_estado = $_POST['selestado'];
   $cre_observacion = $_POST['txtobserva'];
   $usu_id = $_POST['selanalista'];
   $cli_id = $_POST['txtdocumentoc'];

   //Calculo de cuota mas intereses
   $cre_intereses = ($cre_monto * $cre_tasa)/100;
   $cre_total = ($cre_monto + $cre_intereses);


   
   $Objregistrocredito = new creditos();
   $reg = $Objregistrocredito->registrocredito($cre_codigo,$cre_fecha,$cre_monto,$cre_tasa,
   $cre_cuotas,$cre_total,$cre_pagado,$cre_estado,$cre_observacion,$usu_id,$cli_id);

   if ($reg) {
      echo "<script>alert(\"Credito registrado con exito\");
    windows.location='../vistas/contenidos/solicitar-lista'; </script>";
   } else {
      echo "<script>alert(\"Error al registrar el credito\");
    windows.location='../vistas/contenidos/solicitar-nuevo'; </script>";
   }
}
