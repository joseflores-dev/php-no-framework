<header>
    <style>
        .hidden {
            visibility: hidden;
        }
    </style>

    <?php if (!isset($_SESSION["iniciarSesion"])) : ?>
        <script>
            window.location = "inicio"
        </script>';
        }
    <?php endif; ?>


    <?php
    $found = false;
    if (isset($_SESSION["cart"])) {
        if (isset($_GET["producto"])) {
            foreach ($_SESSION["cart"] as $key => $value) {

                if ($value["ID"] == $_GET["producto"]) {

                    $found = true;
                    $numero = $key;

                    break;
                }
            }
            if ($found) {
                $_SESSION["cart"][$key]["CANTIDAD"] = $_SESSION["cart"][$key]["CANTIDAD"] + 1;

                echo '<script>window.location = "shipping" </script>';
            } else {
                $datos = ControladorProductos::ctrSeleccionarProducto($_GET["producto"]);
                $nombre = $datos["nombre"];
                $precio = $datos["precio"];
                $id = $datos["id"];
                $arreglo = array("ID" => $id, "NOMBRE" => $nombre, "PRECIO" => $precio, "CANTIDAD" => 1);
                $numero = count($_SESSION["cart"]);
                $_SESSION["cart"][$numero] = $arreglo;
            }
        }
    } else {
        if (isset($_GET["producto"])) {
            $datos = ControladorProductos::ctrSeleccionarProducto($_GET["producto"]);
            if ($datos != null) {
                $nombre = $datos["nombre"];
                $precio = $datos["precio"];
                $id = $datos["id"];

                $arreglo = array("ID" => $id, "NOMBRE" => $nombre, "PRECIO" => $precio, "CANTIDAD" => 1);
                $_SESSION["cart"][0] = $arreglo;
                echo '<script>window.location = "shipping" </script>';
            }
        }
    }


    ?>
    <?php
    include "vistas/menuBar.php";
    ?>

</header>
<div class="breadcrumb">
    <div class="container" style="height:30px;">

    </div>
</div>

<?php
if (isset($_SESSION["cart"])) : ?>
    <?php if (count($_SESSION["cart"]) > 0) : ?>
        <?php

        $total = 0;
        $cantidad = 0;
        foreach ($_SESSION["cart"] as $key => $value) {

            $total += $value["PRECIO"] * $value["CANTIDAD"];
            $cantidad += $value["CANTIDAD"];
        }
        $dat = $_SESSION["cart"];
        $ventasRealizadas = ModeloCarro::leer();
        $nroBoleta = 0;

        if (count($ventasRealizadas) == 0) {
            $nroBoleta = 1;
        } else {

            $nroBoleta = $ventasRealizadas[0]["max"] + 1;
        }
        ?>

        <form method="POST">
            <br>
            <input type="hidden" name="nroVenta" value="<?php echo $nroBoleta; ?>"></input>';
            <div class="recomended-sec">
                <div class="container">
                    <div class="row">

                        <div class="col-md order-md-2 mb-4">
                            <h4 class="d-flex justify-content-between align-items-center mb-3">
                                <span class="text-muted">Carro de Compra</span>
                                <br>

                                <span class="badge badge-secondary badge-pill nuevaCantidadTotal">
                                    <?php echo $cantidad; ?></span></h4>
                                <?php foreach ($dat as $key => $value) : ?>

                                <ul class="list-group mb-3">
                                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                                        <div class="col-lg-3 col-md-6 '<?php echo $value["NOMBRE"]; ?>">
                                            <img src="vistas/assets/images/<?php echo $value["ID"]; ?>.jpg" style="width:150px" alt="img">
                                        </div>

                                        <h6 class="my-0"><?php echo $value["NOMBRE"]; ?></h6>

                                        <span class="text-muted">Cantidad <p class="cantidadNueva<?php echo $value["ID"]; ?>"><?php echo $value["CANTIDAD"]; ?> </p><button type="button" aumentoID="<?php echo $value["ID"]; ?>" style="background:green; border:none;border-radius:50px" class="btnInteractivo" seleccionable="<?php echo $value["NOMBRE"]; ?>" producto="<?php echo $value["ID"]; ?>">
                                                <i class="fa fa-plus" aria-hidden="true"> </i>
                                            </button> <button type="button" style="background:red; border:none;border-radius:50px" class="btnInteractivo2 restarCantidadCompra" id="<?php echo $value["ID"]; ?>">
                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                            </button></span>
                                        <span class="text-muted">Precio <p>$<?php echo number_format($value["PRECIO"], 0, ",", "."); ?></p></span>
                                        <span class="text-muted">SubTotal <p class="nuevoSubTotal<?php echo $value["ID"]; ?>">$<?php echo number_format($value["PRECIO"] * $value["CANTIDAD"], 0, ",", "."); ?></p></span>
                                        <button type="button" class="close" aria-label="Close" numero="<?php echo $value["ID"]; ?>">
                                            <span aria-hidden="true"></span>X</button>
                                    </li>
                                 <?php endforeach; ?>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span>Total a Pagar (CLP)</span>
                                        <strong class="nuevoTotalFinal">$<?php echo number_format($total, 0, ",", "."); ?></strong>
                                    </li>
                                </ul>

                        </div>
                    </div>
                </div>

                <br>

                <input name="ventaOK" value="ventaOK" type="hidden">
                <center><button class="btn btn-primary" type="submit">Pagar</button></center>

                <?php $agregar = ControladorCarro::agregarVenta(); ?>
        </form>

        <br>
        <br>
        <br>
        <br>
    <?php else : ?>
        <center>
            <div class="alert alert-danger" role="alert" style="width: 50%;">
                <img src="vistas/assets/images/error.png" style="height: 100px;">
                <br>
                <br>
                <h4 class="alert-heading">¡Ups, lo sentimos!</h4>
                <br>
                <p>El carrito de compras está vacío.</p>
            </div>
        </center>
        <center><a href="shop" class="btn btn-danger">Volver</a></center>
        <br>
        <br>
        <br>
        <br>
        <br>
    <?php endif; ?>
<?php else : ?>
    <center>
        <div class="alert alert-danger" role="alert" style="width: 50%;">
            <img src="vistas/assets/images/error.png" style="height: 100px;">
            <br>
            <br>
            <h4 class="alert-heading">¡Ups, lo sentimos!</h4>
            <br>
            <p>El carrito de compras está vacío.</p>
        </div>
    </center>
    <center><a href="shop" class="btn btn-danger">Volver</a></center>
    <br>
    <br>
    <br>
    <br>
    <br>
<?php endif; ?>
<?php require "vistas/footer.php"; ?>