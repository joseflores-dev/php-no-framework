<header>
    <?php
    include "vistas/menuBar.php";
    ?>
</header>
<div class="breadcrumb">
    <div class="container">
        <p class="breadcrumb-item"style="font-size:50px;color:#cccccc;">Productos</p>
        <!-- <span class="breadcrumb-item active">Tienda</span> -->
    </div>
</div>
<section class="static about-sec">
    <div class="container">
        <div class="recomended-sec">
            <div class="row">
                <?php
                $productos = ControladorProductos::ctrTraerProductos();?>
                <?php foreach ($productos as $producto): ?> 
                        <br>
                    <div class="col-lg-4">
                        <div class="item">
                            <img src="vistas/assets/images/<?php echo $producto["id"]; ?>.jpg" alt="img" style="width:150px;">
                            <h3><?php echo $producto["nombre"]; ?></h3>
                            <h4 style="margin-top: 4%; margin-bottom: 4%;"><span class="price">$<?php echo number_format($producto["precio"],0, ",", "."); ?></span></h4>
                            <a href="producto?id=<?php echo $producto["id"]; ?>" class="btn btn-primary">Comprar</a>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</section>

<?php
include "vistas/footer.php"
?>