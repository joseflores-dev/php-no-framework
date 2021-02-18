<header>
    <?php
    include "vistas/menuBar.php";
    ?>
</header>

<div class="breadcrumb">
    <div class="container">
        <a class="breadcrumb-item" href="inicio">Inicio</a>
        <span class="breadcrumb-item active">Tipo de Entrega</span>
    </div>
</div>

<div class="text-center">
    <h1>Seleccione un Método de Entrega</h1>
    <br>
    <form method="post">
        <select class="formaEntrega" name="valorEntrega" id="valorEntrega">
            <option value="">Seleccione Tipo</option>
            <option value="re">Retiro en Tienda</option>
            <option value="des">Despacho a Domicilio</option>
        </select>
        <div class="contenido"></div>
        <br>
        <br>
        <button class="btn" type="submit">Confirmar Compra</button>
        <?php
        $guardarEnvio = ControladorCarro::envios();
        ?>
    </form>
</div>