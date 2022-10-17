<?php
    require_once 'modelos/articulosModelo.php';

    $Objcontar = new producto();
    $Contador = $Objcontar->contarfilasart();
    $Filas = $Contador;
    //Articulos x pagina
    $Articulos_x_pagina = 1;
    $Paginas = $Filas / $Articulos_x_pagina;
    //Redondeado arriba
    $Paginas = ceil($Paginas);

    //Definir articulos a mostrar por pagina
    $iniciar = ($_GET['pagina'] - 1) * $Articulos_x_pagina;

    $Objlistararticulos= new producto();
    $Datos = $Objlistararticulos->listararticulos($iniciar, $Articulos_x_pagina);
?>