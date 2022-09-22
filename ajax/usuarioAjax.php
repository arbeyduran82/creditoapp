<?php
$peticionAjax = false;
require_once "../config/APP.php";

if (false) {
/* --- Instancia al controlador de usuarios -----*/
require_once "../controladores/usuarioControlador.php";
$objUsuario = new usuarioControlador();
    
}else {
    session_start(['name'=>'SCREDITOS']);
    session_unset();
    session_destroy();
    header("Location:".SERVERURL."login/");
    exit();
}