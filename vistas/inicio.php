
    <header>
        <?php
            include "vistas/menuBar.php";
        ?>
    </header>
 

    <section class="slider" style="width: 100%;">
        <div class="container">
            <div id="owl-demo" class="owl-carousel owl-theme">
                <div class="item">
                    <div class="slide">
                        <img src="vistas/assets/images/slide1.jpg" alt="slide1">
                        <div class="content">
                            <div class="title">
                                <h3>Bienvenido</h3>
                                <h5>Descubre todos los licores disponibles para ti.</h5>
                                <a href="#" class="btn btn-primary">Tienda</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="slide">
                        <img src="vistas/assets/images/slide2.jpg" alt="slide1">
                        <div class="content">
                            <div class="title">
                               <h3>Bienvenido</h3>
                                <h5>Descubre todos los licores disponibles para ti.</h5>
                                <a href="#" class="btn btn-primary">Tienda</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="slide">
                        <img src="vistas/assets/images/slide3.jpg" alt="slide1">
                        <div class="content">
                            <div class="title">
                            <h3>Bienvenido</h3>
                                <h5>Descubre todos los licores disponibles para ti.</h5>
                                <a href="#" class="btn btn-primary">Tienda</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="slide">
                        <img src="vistas/assets/images/slide4.jpg" alt="slide1">
                        <div class="content">
                            <div class="title">
                            <h3>Bienvenido</h3>
                                <h5>Descubre todos los licores disponibles para ti.</h5>
                                <a href="#" class="btn btn-primary">Tienda</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="recomended-sec">
        <div class="container">
            <div class="title">
                <h2>Productos Mas vendidos</h2>
                <hr>
            </div>
            <div class="row">
                <?php
             
                            echo ' <div class="col-lg-3 col-md-6">
                            <div class="item">
                                <img src="vistas/assets/images/1.jpg" alt="img">
                                <h2>Vino Tinto</h2>
                                <h5 style="margin-top: 4%; margin-bottom: 4%;"><span class="sell">$'.number_format(11111,0, ",", ".").'</span></h5> <button class="btn btn-primary btnComprarLibro" libro="">Comprar</button>
                            </div>
                        </div>';
               
                ?>
               
             
    </section>
    <!-- <section class="about-sec" >
        <div class="about-img">
            <figure style="background:url(./vistas/assets/images/about-img.jpg)no-repeat;"></figure>
        </div>
        <div class="about-content"> 
            <h2>Nuestro Sello</h2>
            <h4>VentaBook, la cadena de librerías líder en el mercado nacional en ventas online.</h4>
            <img src="vistas/assets/images/sello.png" alt="Certificación eCommerce Specialist">
            <br>
            <i>Queremos formar una red de libreros independientes: Si quieres emprender con una librería, comunícate con nosotros para formar parte de la comunidad de libreros independientes más grande de Chile.</i>
            <div class="btn-sec">
                <a href="shop" class="btn yellow">¡Descubre Más!</a>
            </div>
        </div>
    </section>
    -->
   


    <?php
        include "vistas/footer.php"
    ?>
    
