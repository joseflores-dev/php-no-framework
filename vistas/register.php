<!-- <!DOCTYPE html>
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

<body> -->
    <header>

        <?php
        include "vistas/menuBar.php";
        ?>
    </header>
    <div class="breadcrumb">
        <div class="container">
            <p class="breadcrumb-item"style="font-size:40px;color:#cccccc;">Registro</p>
        </div>
    </div>
    <section class="static about-sec">
        <div class="container">
           
            <div class="form">
                <form id="regForm" method="POST">
                    <h2 style="text-align: center;">Ingresa tus datos</h2>
                    <!-- One "tab" for each step in the form: -->
                    <div class="tab">Nombre
                        <p><input name="nombres" placeholder="Nombre" oninput="this.className = ''"></p>
                        Apellido
                        <p><input name="apellidos" placeholder="Apellido" oninput="this.className = ''"></p>
                    </div>

                    <div class="tab">Correo Electrónico
                        <p><input name="email" placeholder="Correo Electrónico" oninput="this.className = ''"></p>
                        Teléfono
                        <p><input name="telefono" placeholder="Teléfono" oninput="this.className = ''"></p>
                    </div>

                    <div class="tab">Fecha de Nacimiento
                        <div class="form-group">
                            <div class="input-group date" data-provide="datepicker" aria-placeholder="Fecha de Nacimiento" data-date-format="dd-mm-yyyy">
                                <input type="text" class="form-control fechaEnvio" name="fechaNac" id="fechaNac">
                                <div class="input-group-addon">
                                    <span class="input-group-text"><i class="material-icons">date_range</i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="tab">Nombre de Usuario
                        <p><input name="usuario" placeholder="Nombre de Usuario" oninput="this.className = ''"></p>
                        Contraseña
                        <p><input type="password" name="password" placeholder="Contraseña" oninput="this.className = ''"></p>
                        Repita Contraseña
                        <p><input type="password" name="repeatPassword" placeholder="Contraseña" oninput="this.className = ''"></p>
                    </div>

                    <div style="overflow:auto;">
                        <div>
                            <button style="float:left;" type="button" class="btn" id="prevBtn" onclick="nextPrev(-1)">Anterior</button>
                            <button style="float:right;" type="button" class="btn btn-primary" id="nextBtn" onclick="nextPrev(1)"> Siguiente</button>
                        </div>
                    </div>

                    <!-- Circles which indicates the steps of the form: -->
                    <div style="text-align:center;margin-top:40px;">
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                    </div>
                    <?php
                    $registro = ControladorUsuarios::ctrCrearUsuario(1);
                    ?>
                </form>
            </div>
    </section>

    <?php
    include "vistas/footer.php"
    ?>

