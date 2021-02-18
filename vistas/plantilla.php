<!DOCTYPE html>
<html lang="en">
<?php
session_start();

?>

<head>
    <meta charset="utf-8">
    <title>Santa Gemita</title>
    <link rel="shortcut icon" href="vistas/assets/images/icono.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#03a6f3">
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
        <!-- DATA TABLES -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" />
	
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="vistas/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="vistas/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="vistas/assets/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="vistas/assets/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="vistas/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="vistas/assets/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="vistas/assets/plugins/summernote/summernote-bs4.css">
    
    <!-- Hacia arriba es admin lte -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800,900" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="vistas/assets/css/owl.carousel.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="vistas/assets/js/bootstrap.min.js">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="vistas/assets/js/sweetalert2.all.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />
    <link rel="stylesheet" href="vistas/assets/css/styles.css">
</head>

<body class="">

    <?php
    if (isset($_GET["ruta"])) {
        if (
            $_GET["ruta"] == "inicio" || $_GET["ruta"] == "login" || $_GET["ruta"] == "register" ||
            $_GET["ruta"] == "salir" || $_GET["ruta"] == "shop" || $_GET["ruta"] == "faq" || $_GET["ruta"] == "about"
            || $_GET["ruta"] == "producto" || $_GET["ruta"] == "shipping" || $_GET["ruta"] == "demo" || $_GET["ruta"] == "formaDespacho"
            || $_GET["ruta"] == "admin" || $_GET["ruta"] == "admin-productos" || $_GET["ruta"] == "admin-clientes"
            || $_GET["ruta"] == "admin-trabajadores" || $_GET["ruta"] =="admin-categorias"
            || $_GET["ruta"] == "admin-boletas-pendientes" || $_GET["ruta"] == "boleta-pendiente" || $_GET["ruta"] == "admin-boletas-aprobadas"
            || $_GET["ruta"] == "boleta-aprobada"
        ) {
            if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok" && $_GET["ruta"] == "login") {
                include "vistas/inicio.php";
            } else if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok" && $_GET["ruta"] == "register") {
                include "vistas/inicio.php";
            } else {
                include "vistas/" . $_GET["ruta"] . ".php";
            }
        } else {
            include "vistas/404.php";
        }
    } else {
        include "vistas/inicio.php";
    }
    ?>

    <script type="text/javascript">
        $(function() {
            $('#datetimepicker1').datetimepicker({
                format: 'yyyy-mm-dd hh:ii'
            });
        });
    </script>
 
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="vistas/assets/js/book.js"></script>
    <?php
        if ($_GET["ruta"] == "register") {
            echo '<script src="vistas/assets/js/form.js"></script>';
        }
      
    ?>
    
  
    <script type="text/javascript" src="vistas/assets/js/owl.carousel.min.js"></script>
    <script src="vistas/assets/js/custom.js"></script>

    <!-- Hacia abajo es Admin lte --> 

    <!-- jQuery UI 1.11.4 -->
    <script src="vistas/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="vistas/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="vistas/assets/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="vistas/assets/plugins/sparklines/sparkline.js"></script>
    <script src="vistas/assets/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="vistas/assets/plugins/moment/moment.min.js"></script>
    <script src="vistas/assets/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="vistas/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="vistas/assets/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="vistas/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="vistas/assets/dist/js/adminlte.js"></script>
  
</body>

</html>