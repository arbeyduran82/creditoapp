<?php

class vistasModelo{
    /* --- Permite obtener cada una de las vistas
     que se mostraran en el index.php --- */
     protected static function obtener_vistas_modelo($vistas){
        $listaBlanca=["inicio","cliente-lista","cliente-nuevo","cliente-buscar","cliente-actualizar",
    "empresa","articulo-lista","articulo-nuevo","usuario-lista","usuario-nuevo","usuario-buscar",
    "usuario-actualizar","articulo-buscar","articulo-buscar-resultado","articulo-actualizar","solicitar-lista","solicitar-nuevo",
"solicitar-pendiente","solicitud-solicitud","solicitar-buscar","solicitar-actualizar","pago-actualizar",
"pago-buscar","pago-buscar-resultado","pago-lista","pago-nuevo","reportes","empresa-actualizar","reporte-historial","reporte-estado","reporte-solicitudes",
"reporte-finalizados","reporte-clientes-financieros","reporte-creditos-aprobados","reporte-pazysalvo","cliente-inactivos"];
        if (in_array($vistas, $listaBlanca)) {
            
            //se valida que la session este seteada
            session_start();
            if(!$_SESSION['verificar']){
                header("location:".SERVERURL);
                } 

            if (is_file("./vistas/contenidos/".$vistas."-vista.php")) {
                $contenido = "./vistas/contenidos/".$vistas."-vista.php";
            }else {
                $contenido = "404";
            }
        }elseif ($vistas == "login" || $vistas == "index") {
            $contenido = "login";
        }else {
            $contenido = "404";
        }
        return $contenido;

     }
}