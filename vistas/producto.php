<header>
    <?php
    include "vistas/menuBar.php";
    $id = $_GET['id'];
    $datos = ControladorProductos::ctrSeleccionarProducto($id);
    ?>
</header>

<?php
if ($datos != null) : ?>
    <div class="breadcrumb">
        <div class="container">
            <p class="breadcrumb-item" style="font-size:50px;color:#cccccc;">Detalles del Producto</p>

        </div>
    </div>
    <section class="product-sec">
        <div class="container">
            <h1><?php echo $datos["nombre"]; ?></h1>
            <div class="row">
                <div class="col-md-6 slider-sec">
                    <!-- main slider carousel -->
                    <div id="myCarousel" class="carousel slide">
                        <!-- main slider carousel items -->
                        <div class="carousel-inner">
                            <div class="active item carousel-item" data-slide-number="0">

                                <img src="vistas/assets/images/<?php echo $datos["id"]; ?>.jpg" class="img-fluid">
                            </div>
                            <div class="item carousel-item" data-slide-number="1">
                                <img src="vistas/assets/images/libro.png" class="img-fluid">
                            </div>
                            <div class="item carousel-item" data-slide-number="2">
                                <img src="vistas/assets/images/libro.png" class="img-fluid">
                            </div>
                        </div>
                        <!-- main slider carousel nav controls -->
                        <ul class="carousel-indicators list-inline">
                            <li class="list-inline-item active">
                                <a id="carousel-selector-0" class="selected" data-slide-to="0" data-target="#myCarousel">
                                    <img src="vistas/assets/images/<?php echo $datos["id"]; ?>.jpg" class="img-fluid">
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a id="carousel-selector-1" data-slide-to="1" data-target="#myCarousel">
                                    <img src="vistas/assets/images/libro.png" class="img-fluid">
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a id="carousel-selector-2" data-slide-to="2" data-target="#myCarousel">
                                    <img src="vistas/assets/images/libro.png" class="img-fluid">
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!--/main slider carousel-->
                </div>
                <div class="col-md-6 slider-content">
                    <p><?php echo $datos["descripcion"]; ?></p>
                    <ul>
                        <li>
                            <span class="name">Precio</span><span class="clm">:</span>
                            <span class="price final">$<?php echo number_format($datos["precio"], 0, ",", "."); ?></span>
                        </li>
                        <li>
                            <span class="name">Stock</span><span class="clm">:</span>
                            <span class="price final"><?php echo $datos["stock"]; ?></span>
                            <br><br><br>
                        </li>
                        <br><?php if ($datos["stock"] > 0) : ?> <?php if (isset($_SESSION["iniciarSesion"])) : ?> <li>
                                    <div class="btn-sec">
                                        <a href="shipping?producto=<?php echo $datos["id"]; ?>" class="btn btn-primary">Añadir al carrito</a>
                                        
                                    </div>
                                </li>
                                 <?php else : ?> <li>
                                    <div class="btn-sec">
                                        <a href="login" class="btn btn-primary">Iniciar Sesion</a>
                                    <?php endif; ?>


                                    </div>
                                </li>
                            <?php else : ?>
                                <?php if (isset($_SESSION["iniciarSesion"])) : ?><li>
                                        <div class="btn-sec">
                                            <a href="shipping" class="btn btn-primary">Reservar Libro</a>
                                            <button class="btn btn-primary reservar" libro="<?php echo $datos["id"]; ?>"> Reservar Libro</button>

                                        </div>
                                    </li><?php else : ?>
                                    <li>
                                        <div class="btn-sec">
                                            <a href="login" class="btn btn-primary">Iniciar Sesion</a>
                                        </div>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>

                    </ul>

                </div>

            </div>
        </div>

    </section>
    <section class="related-books">
        <div class="container">
            <h2>Libros Recomendados del Género</h2>
            <div class="recomended-sec">
                <div class="row">'<div class="col-lg-3 col-md-6">
                        <div class="item">
                            <img src="vistas/assets/images/1.jpg" alt="img">
                            <h3></h3>
                            <h5 style="margin-top: 4%; margin-bottom: 4%;"><span class=" price">$</span></h5><button class="btnComprarLibro" libro="">Comprar</button>';

                        </div>
                    </div>


    </section>



<?php else : ?>
    <div class="breadcrumb">
        <div class="container">
            <a class="breadcrumb-item" href="inicio">Inicio</a>
            <span class="breadcrumb-item active">Libro No Encontrado</span>
        </div>
    </div>
    <center>
        <div class="alert alert-danger" role="alert" style="width: 50%;">
            <img src="vistas/assets/images/error.png" style="height: 100px;">
            <br>
            <br>
            <h4 class="alert-heading">¡Ups, lo sentimos!</h4>
            <br>
            <p>El libro que estás buscando no se encuentra en tienda. Si deseas reservarlo, escríbenos un mensaje en la sección <strong><a href="#" class="alert-link">"Contáctanos"</a></strong>.</p>
        </div>
    </center>
    <center><a href="shop" class="btn">Volver</a></center>
    <br>
    <br>
    
<?php endif; ?>



<?php
include "vistas/footer.php";
?>