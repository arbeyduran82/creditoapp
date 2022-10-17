<?php
    require_once 'modelos/pagosModelo.php';

    $Objcontar = new pago();
    $Contador = $Objcontar->contarfilaspag();
    $Filas = $Contador;
    //Articulos x pagina
    $Pagos_x_pagina = 1;
    $Paginas = $Filas / $Pagos_x_pagina;
    //Redondeado arriba
    $Paginas = ceil($Paginas);

    //Definir articulos a mostrar por pagina
    $iniciar = ($_GET['pagina'] - 1) * $Pagos_x_pagina;

    $Objlistarpagos= new pago();
    $Datos = $Objlistarpagos->listarpagos($iniciar, $Pagos_x_pagina);
?>