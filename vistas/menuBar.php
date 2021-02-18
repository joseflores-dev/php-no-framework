<div class="main-menu">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="inicio"><img src="vistas/assets/images/logo-ventabook.png" style="width:100px" alt="logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="navbar-item active">
                        <a href="inicio" class="nav-link">Inicio</a>
                    </li>
                    <li class="navbar-item">
                        <a href="shop" class="nav-link">Tienda</a>
                    </li>
                    <li class="navbar-item">
                        <a href="about" class="nav-link">Sobre Nosotros</a>
                    </li>

                    <?php
                    if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok") : ?>
                        <li class="navbar-item">
                            <a href="salir" class="nav-link">Cerrar Sesión</a>
                        </li>
                    <?php else : ?>
                        <li class="navbar-item">
                            <a href="login" class="nav-link">Iniciar Sesión</a>
                        </li>

                    <?php endif; ?>
                    <?php if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok" && $_SESSION["id_perfil"] == 3) : ?>
                        <li class="navbar-item">
                            <a href="admin" class="nav-link">Admin</a>
                        </li>
                    <?php endif; ?>
                </ul>
                <?php if (isset($_SESSION["iniciarSesion"])) : ?>
                    <a href="shipping" style="text-decoration:none;">
                        <div class="cart my-2 my-lg-0">

                            <span>
                                <i class="fa fa-shopping-cart" aria-hidden="true" style="font-size: 28px;"></i></span>
                            <span class="quntity compras"><?php echo (empty($_SESSION["cart"]) ? 0 : count($_SESSION["cart"])); ?></span>
                        </div>
                    </a>

                <?php endif; ?>

                <form class="form-inline my-2 my-lg-0" method="POST">
                    <input class="form-control mr-sm-2" type="search" name="getLibro" placeholder="Busca Aquí..." aria-label="Search">
                    <?php
                    if (isset($_POST["getLibro"])) {
                        echo '<script>
                               window.location = "index.php?ruta=product-single&libro=' . trim(strtolower($_POST["getLibro"])) . '"
                               </script>
                               ';
                    }
                    ?>
                    <span class="fa fa-search"></span>
                </form>
            </div>
        </nav>
    </div>
</div>