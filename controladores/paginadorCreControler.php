<?php
    require_once 'modelos/creditosModelo.php';

    $Objcontar = new creditos();
    $Contador = $Objcontar->contarfilas();
    $Filas = $Contador;
    //Articulos x pagina
    $Articulos_x_pagina = 3;
    $Paginas = $Filas / $Articulos_x_pagina;
    //Redondeado arriba
    $Paginas = ceil($Paginas);

    //Definir articulos a mostrar por pagina
    $iniciar = ($_GET['pagina'] - 1) * $Articulos_x_pagina;

    $Objlistarempresa = new creditos();
    $Datos = $Objlistarempresa->listarcreditos($iniciar, $Articulos_x_pagina);
?>
