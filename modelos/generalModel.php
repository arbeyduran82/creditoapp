<?php
require_once "./config/SERVER.php";

class generalModel{
   
    /*-----   Funcion para realizar consultas simples  ----*/
    protected static function ejecutar_Consulta_Simple($Consulta){
        $Sql= self::Conectar()->prepare($Consulta);
        $Sql->execute();
        return $Sql;
    }

    /*-----   Funcion para generar codigos aleatorios para los creditos  ----*/
    protected static function generar_Codigo_credito($Letra, $Longitud, $Numero){
        for ($i=1; $i<=$Longitud ; $i++) { 
           $Aleatorio= rand(0,9);
           $Letra.=$Aleatorio;
        }
        return $Letra."-".$Numero;
    }

    /*-----   Funcion paginador de tablas  ----*/
    protected static function paginador_Tablas($Paginas, $numPaginas, $Url, $Botones){
        $Botonera ='<nav aria-label="Page navigation example"><ul class="pagination justify-content-center">';
        
        //Paginador anterior.
        if ($Paginas==1) {
            $Botonera.='<li class="page-item disabled"><a class="page-link">
            <i class="fa-solid fa-circle-left"></i></a></li>';
        }else {
            $Botonera.='
            <li class="page-item"><a class="page-link" href="'.$Url.'1/">
            <i class="fa-solid fa-circle-left"></i></a></li>
            <li class="page-item"><a class="page-link" href="'.$Url.($Paginas-1).'/">
            Anterior</a></li>
            '; 
        }
        //Contador de iteraciones.
        $Contadori=0;
        for ($i=$Paginas; $i<=$numPaginas; $i++) { 
            if ($Contadori>=$Botones) {
                break;
            }
            //numero de pagina actual.
            if ($Paginas==$i) {
                $Botonera.='<li class="page-item"><a class="page-link active"
                href="'.$Url.$i.'/">'.$i.'</a></li>';
            }else {
                $Botonera.='<li class="page-item"><a class="page-link"
                href="'.$Url.$i.'/">'.$i.'</a></li>';
            }
            $Contadori++;
        }

        //Paginador siguiente.
        if ($Paginas==$numPaginas) {
            $Botonera.='<li class="page-item disabled"><a class="page-link">
            <i class="fa-solid fa-circle-right"></i></i></a></li>';
        }else {
            $Botonera.='
            <li class="page-item"><a class="page-link" href="'.$Url.($Paginas+1).'/">
            Siguiente</a></li>
            <li class="page-item"><a class="page-link" href="'.$Url.$numPaginas.'/">
            <i class="fa-solid fa-circle-right"></i></a></li>
            
            '; 
        }

        $Botonera.='</ul></nav>';
        return $Botonera;
    }
}