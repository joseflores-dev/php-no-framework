
    <footer>
        <div class="container">
            <div class="row"  style=" font-family: 'Times New Roman', Times, serif;font-size:18px;">
                <div class="col-md-4">
                    <div class="address">
                        <h4 style="font-weight:bold;">Casa Matriz</h4>
                        <h6>Camino Internacional 1501 - Viña del Mar</h6>
                        <h6>Email : info@venta.cl</h6>
                        <h6>Telefono : +569 ????????</h6>
                    </div>
                    <div class="timing">
                        <h4 style="font-weight:bold;">Horario</h4>
                        <h6>Lun - Vie: 9am - 9pm</h6>
                        <h6>​​Sábado: 10am - 9pm</h6>
                        <h6>​Domingo: 10am - 8pm</h6>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="navigation">
                        <h4 style="font-weight:bold;font-size:30px">Sucursales</h4>
                      
                        <ul>
                            
                            <li>La Serena : Juan Soldado 204 Compañia Baja</li>
                            <br>
                            <li>Chillán: Sector Oro Verde, Puente 3, Km 9, Camino Huape</li>
                            <br>
                            <li> Buin – Antofagasta- Chillán – Santiago</li> 
                        </ul>
                    </div>
                   
                </div>
                <div class="col-md-5">
                    <div class="form">
                        <h3>Contáctanos</h3>
                        <h6>¿Tienes algo que decirnos? ¡Hazlo Saber!</h6>
                        <form>
                            <div class="row">
                                <?php
                                if (isset($_SESSION["iniciarSesion"])) {
                                    echo '
                                    <div class="col-md-6">
                                        <p>Nombres<p/>
                                        <input placeholder="'.$_SESSION["nombres"].' '.$_SESSION["apellidos"].'" value="'.$_SESSION["nombres"].' '.$_SESSION["apellidos"].'" disabled>
                                    </div>';
                                    echo '
                                    <div class="col-md-6">
                                        <p>Correo<p/>
                                        <input type="email" placeholder="'.$_SESSION["email"].'" value="'.$_SESSION["email"].'" disabled>
                                    </div>
                                    <div class="col-md-12">
                                        <textarea name="mensaje" placeholder="Mensaje..."></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn black">Enviar</button>
                                    </div>';
                                }else{
                                    echo '
                                    <div class="col-md-6">
                                        <input placeholder="Nombre" required>
                                    </div>';
                                    echo '
                                    <div class="col-md-6">
                                        <input type="email" placeholder="Correo Electrónico" required>
                                    </div>
                                    <div class="col-md-12">
                                        <textarea placeholder="Mensaje..."></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn black">Enviar</button>
                                    </div>';
                                }
                                $mensaje = ControladorUsuarios::mensaje();
                                ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h5>(C) 2019. Derechos Reservados.</h5>
                    </div>
                    <div class="col-md-6">
                        <div class="share align-middle">
                            <span class="fb"><i class="fa fa-facebook-official"></i></span>
                            <span class="instagram"><i class="fa fa-instagram"></i></span>
                            <span class="twitter"><i class="fa fa-twitter"></i></span>
                            <span class="pinterest"><i class="fa fa-pinterest"></i></span>
                            <span class="google"><i class="fa fa-google-plus"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>