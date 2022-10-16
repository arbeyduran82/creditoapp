<?php
    require_once 'modelos/usuarioModelo.php';

    $Objcontar = new usuario();
    $Contador = $Objcontar->contarfilas();
    $Filas = $Contador;
    //Articulos x pagina
    $Articulos_x_pagina = 3;
    $Paginas = $Filas / $Articulos_x_pagina;
    //Redondeado arriba
    $Paginas = ceil($Paginas);

    //Definir articulos a mostrar por pagina
    $iniciar = ($_GET['pagina'] - 1) * $Articulos_x_pagina;

    $Objlistarusuarios = new usuario();
	$Datos = $Objlistarusuarios->listarusuarios($iniciar, $Articulos_x_pagina);
?>
