<?php
require_once "../modelos/empresaModelo.php";


$emp_id = $_GET['id'];
$Objeliminarempresa= new empresa();
$Reg = $Objeliminarempresa->eliminarempresa($emp_id);
     
echo "<script> window.location='../empresa'; </script>";