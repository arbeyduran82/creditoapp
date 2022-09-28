<section class="full-box nav-lateral">
    <div class="full-box nav-lateral-bg show-nav-lateral"></div>
    <div class="full-box nav-lateral-content">
        <figure class="full-box nav-lateral-avatar">
            <i class="far fa-times-circle show-nav-lateral"></i>
            <img src="<?php echo SERVERURL; ?>vistas/assets/avatar/Avatar.png" class="img-fluid" alt="Avatar">
            <figcaption class="roboto-medium text-center">
                Julian Giraldo <br><small class="roboto-condensed-light">Programador de software</small>
            </figcaption>
        </figure>
        <div class="full-box nav-lateral-bar"></div>

        <?php
        if (!$_SESSION['verificar']) {
            header("location:../index.php");
        } elseif (isset($_SESSION['usuario'])) {
        ?>
            <nav class="full-box nav-lateral-menu">
                <ul>
                    <li><a href="<?php echo SERVERURL; ?>inicio/"><i class="fab fa-dashcube fa-fw"></i> &nbsp; Inicio</a></li>
                    <li><a href="#" class="nav-btn-submenu"><i class="fas fa-users fa-fw"></i> &nbsp; Clientes <i class="fas fa-chevron-down"></i></a>
                        <ul>
                            <li><a href="<?php echo SERVERURL; ?>cliente-nuevo/"><i class="fas fa-plus fa-fw"></i> &nbsp; Agregar Cliente</a></li>
                            <li><a href="<?php echo SERVERURL; ?>cliente-lista/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de clientes</a></li>
                            <li><a href="<?php echo SERVERURL; ?>cliente-buscar/"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar cliente</a></li>
                        </ul>
                    </li>

                    <li><a href="#" class="nav-btn-submenu"><i class="fas fa-pallet fa-fw"></i> &nbsp; Articulos <i class="fas fa-chevron-down"></i></a>
                        <ul>
                            <li><a href="<?php echo SERVERURL; ?>articulo-nuevo/"><i class="fas fa-plus fa-fw"></i> &nbsp; Agregar articulos</a></li>
                            <li><a href="<?php echo SERVERURL; ?>articulo-lista/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de articulos</a></li>
                            <li><a href="<?php echo SERVERURL; ?>articulo-buscar/"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar articulo</a></li>
                        </ul>
                    </li>

                    <li><a href="#" class="nav-btn-submenu"><i class="fas fa-file-invoice-dollar fa-fw"></i> &nbsp; Creditos <i class="fas fa-chevron-down"></i></a>
                        <ul>
                            <li><a href="<?php echo SERVERURL; ?>solicitar-nuevo/"><i class="fas fa-plus fa-fw"></i> &nbsp; Nuevo Credito</a></li>
                            <li><a href="<?php echo SERVERURL; ?>solicitud-solicitud/"><i class="far fa-calendar-alt fa-fw"></i> &nbsp; Solicitudes</a></li>
                            <li><a href="<?php echo SERVERURL; ?>solicitar-lista/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Finalizados</a></li>
                        </ul>
                    </li>

                    <li><a href="#" class="nav-btn-submenu"><i class="fas  fa-user-secret fa-fw"></i> &nbsp; Usuarios <i class="fas fa-chevron-down"></i></a>
                        <ul>
                            <li><a href="<?php echo SERVERURL; ?>usuario-nuevo/"><i class="fas fa-plus fa-fw"></i> &nbsp; Nuevo usuario</a></li>
                            <li><a href="<?php echo SERVERURL; ?>usuario-lista/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de usuarios</a></li>
                            <li><a href="<?php echo SERVERURL; ?>usuario-buscar/"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar usuario</a></li>
                        </ul>
                    </li>

                    <li><a href="<?php echo SERVERURL; ?>empresa/"><i class="fas fa-store-alt fa-fw"></i> &nbsp; Empresa</a></li>
                </ul>
            </nav>

        <?php
        }elseif (isset($_SESSION['analista'])) {
        ?>
            <nav class="full-box nav-lateral-menu">
                <ul>
                    <li><a href="<?php echo SERVERURL; ?>inicio/"><i class="fab fa-dashcube fa-fw"></i> &nbsp; Inicio</a></li>
                    <li><a href="#" class="nav-btn-submenu"><i class="fas fa-users fa-fw"></i> &nbsp; Clientes <i class="fas fa-chevron-down"></i></a>
                        <ul>
                            <li><a href="<?php echo SERVERURL; ?>cliente-nuevo/"><i class="fas fa-plus fa-fw"></i> &nbsp; Agregar Cliente</a></li>
                            <li><a href="<?php echo SERVERURL; ?>cliente-lista/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de clientes</a></li>
                            <li><a href="<?php echo SERVERURL; ?>cliente-buscar/"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar cliente</a></li>
                        </ul>
                    </li>

                    <li><a href="#" class="nav-btn-submenu"><i class="fas fa-pallet fa-fw"></i> &nbsp; Articulos <i class="fas fa-chevron-down"></i></a>
                        <ul>
                            <li><a href="<?php echo SERVERURL; ?>articulo-nuevo/"><i class="fas fa-plus fa-fw"></i> &nbsp; Agregar articulos</a></li>
                            <li><a href="<?php echo SERVERURL; ?>articulo-lista/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de articulos</a></li>
                            <li><a href="<?php echo SERVERURL; ?>articulo-buscar/"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar articulo</a></li>
                        </ul>
                    </li>

                    <li><a href="#" class="nav-btn-submenu"><i class="fas fa-file-invoice-dollar fa-fw"></i> &nbsp; Creditos <i class="fas fa-chevron-down"></i></a>
                        <ul>
                            <li><a href="<?php echo SERVERURL; ?>solicitar-nuevo/"><i class="fas fa-plus fa-fw"></i> &nbsp; Nuevo Credito</a></li>
                            <li><a href="<?php echo SERVERURL; ?>solicitud-solicitud/"><i class="far fa-calendar-alt fa-fw"></i> &nbsp; Solicitudes</a></li>
                            <li><a href="<?php echo SERVERURL; ?>solicitar-lista/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Finalizados</a></li>
                        </ul>
                    </li>

                </ul>
            </nav>
        <?php
        }
        ?>

    </div>
</section>