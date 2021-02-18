<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Book Store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#03a6f3">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <header>
       
        </div>
            <?php
                include "vistas/menuBar.php";
            ?>
    </header>
    <div class="breadcrumb">
        <div class="container">
            <p class="breadcrumb-item"style="font-size:40px;color:#cccccc;">Login</p>
        </div>
    </div>
    <section class="static about-sec">
        <div class="container">
            
            <p>Si tienes una cuenta, ingresa con tu dirección de email.</p>
            <div class="form">
                <form method="POST">
                    <div class="row">
                        <div class="col-md-5">
                            <input placeholder="Nombre de Usuario" name="usuario" required>
                            <span class="required-star">*</span>
                        </div>
                        <div class="col-md-5">
                            <input type="password" placeholder="Contraseña" name ="password" required>
                            <span class="required-star">*</span>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary"> <strong>Ingresar</strong></button>
                            
                        </div>
                        <div class="col-md-5">
                        <h5>¿No tienes cuenta? <a href="register">Regístrate aquí!</a></h5>
                        <h5>¿Olvidaste tu contraseña? <a href="#">Recuperala aquí!</a></h5>
                        </div>
                    </div>

                    <?php
                        $iniciarSesion = ControladorUsuarios::ctrIngresoUsuario();
                    ?>
                </form>
            </div>
        </div>
    </section>
  
    <?php
        include "vistas/footer.php"
    ?>
    
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/owl.carousel.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>