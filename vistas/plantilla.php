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
    $peticionAjax = false;
    require_once "./controladores/vistasControlador.php";
    $instanciarVista = new vistasControlador();

    $vistas = $instanciarVista->obtener_vistas_controlador();
    if ($vistas == "login" || $vistas == "404") {
        require_once "./vistas/contenidos/" . $vistas . "-vista.php";
    } else {
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