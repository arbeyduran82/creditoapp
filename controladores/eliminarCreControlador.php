<?php
require_once "../modelos/creditosModelo.php";


$cre_id = $_GET['id'];
$Objeliminarcredito= new creditos();
$Reg = $Objeliminarcredito->eliminarcreditos($cre_id);
     
echo "<script> window.location='../solicitud-solicitud'; </script>";