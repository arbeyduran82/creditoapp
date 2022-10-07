<?php
require_once "./controladores/vistasControlador.php";
$ruta = explode("/", $_GET['views']);
$peticionAjax = false;
$instanciarVista = new vistasControlador();
$vistas = $instanciarVista->obtener_vistas_controlador();
if($ruta[0] == "pago-actualizar") 
{?>
    <div>
        <?php
            $_SESSION['IdClient'] = $ruta[1];
            include $vistas
        ?>
    </div>
<?php
}
else {
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title><?php echo COMPANY ?></title>
        <?php include './vistas/includes/link.php'; ?>
    </head>

    <body>
        <?php
    
        if ($vistas == "login" || $vistas == "404" ) {
            require_once "./vistas/contenidos/" . $vistas . "-vista.php";
        } else if($ruta[0] == "cliente-actualizar") 
            include $vistas;
        else {
        ?>
            <!-- Main container -->
            <main class="full-box main-container">
                <!-- Nav lateral -->
                <?php include './vistas/includes/nav-lateral.php'; ?>


                <!-- Page content -->
                <section class="full-box page-content">
                    <?php include './vistas/includes/navbar.php';
                    include $vistas;
                    
                    ?>

                </section>
            </main>

        <?php
        }
        include './vistas/includes/footer.php';
        ?>
    </body>
    </html>
<?php
}
?>