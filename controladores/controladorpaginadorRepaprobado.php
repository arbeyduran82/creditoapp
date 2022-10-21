<?php
    require_once 'modelos/reporteModelo.php';

    $Objcontar = new Reportes();
    $Contador = $Objcontar->contarfilasaprobados();
    $Filas = $Contador;
    //Articulos x pagina
    $Articulos_x_pagina = 3;
    $Paginas = $Filas / $Articulos_x_pagina;
    //Redondeado arriba
    $Paginas = ceil($Paginas);

    //Definir articulos a mostrar por pagina
    $iniciar = ($_GET['pagina'] - 1) * $Articulos_x_pagina;

    $Obj= new Reportes();
    $Datos = $Obj->reporteaprobados($iniciar, $Articulos_x_pagina);
?>