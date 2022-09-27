<?php
require_once "../modelos/usuarioModelo.php";


$usu_id = $_GET['id'];
$Objeliminarusuario= new usuario();
$Reg = $Objeliminarusuario->eliminarusuarios($usu_id);
     
echo "<script> window.location='../usuario-lista'; </script>";