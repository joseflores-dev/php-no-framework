<?php 
    $boleta = new ControladorCarro();
    $boleta->aprobarBoleta();
?>
<div class="hold-transition sidebar-mini layout-fixed">


    <div class="wrapper">
        <?php if ($_SESSION["id_perfil"] < 3) : ?>
            <script>
                window.location = "Inicio"
            </script>
        <?php
        endif;
        include "vistas/menuBar-Admin.php";
        ?>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                                

                        </div><!-- /.col -->
                        <div class="col-sm-6">

                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->

            <section class="content">

                <div class="box">

                    <div class="box-header with-border">
                        <h1 class="m-0 text-dark" >Boleta <?php echo $_GET["boleta"];?></h1>
                    </div>

                    <div class="box-body" >
                        <form method="post">
                        <table class="table table-bordered table-striped dt-responsive table-responsive tabla">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Cantidad Total</th>
                                    <th>Precio Total</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $array = array("id"=>$_GET["boleta"]);
                                $row = ModeloCarro::traerDetalleBoleta($array);
                                ?>
                                <?php 
                                if(count($row) == 0){

                                }else{
                                    $_SESSION["detalle_boleta"] = $row;
                                }
                                
                                ?>
                                <?php foreach ($row as $key => $value) : ?>
                                    <tr>
                                        <td><?php echo $value["nombre"]; ?></td>
                                        <td class="cambio-cantidad<?php echo $value["id"]; ?>"><?php echo $value["cantidad"]; ?></td>
                                        <td class="cambio-precio<?php echo $value["id"]; ?>"><?php echo $value["total"]; ?></td>
                                       
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                            <input class="validador-cambio" name="aprobarBoleta" type="text" hidden>

                            <button type="submit" class="btn btn-primary">Imprimir Boleta</button>
                        </form>

                        
                        <!--=====================================
                    INICIO MODAL EDITAR USUARIO
                    =====================================-->
                        <div id="modalEditarProducto" class="modal fade" role="dialog">

                            <div class="modal-dialog">

                                <div class="modal-content">

                                    <form role="form" method="post" enctype="multipart/form-data">

                                        <!--=====================================
                                    CABEZA DEL MODAL
                                    ======================================-->

                                        <div class="modal-header" style="background:#3c8dbc; color:white">

                                            <h4 class="modal-title">Editar Cliente</h4>

                                        </div>

                                        <!--=====================================
                                    CUERPO DEL MODAL
                                    ======================================-->

                                        <div class="modal-body">

                                            <div class="box-body">




                                                <!-- ENTRADA PARA EL USUARIO -->
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-key"></i></span>
                                                    </div>
                                                    <input type="text" name="Editarusuario" id="Editarusuario" class="form-control" placeholder="Usuario" aria-label="Username" aria-describedby="basic-addon1" require>
                                                </div>

                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-clipboard"></i></span>
                                                    </div>
                                                    <input type="text" name="Editarpassword" id="Editarpassword" class="form-control" placeholder="contraseña" aria-label="Username" aria-describedby="basic-addon1" required>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-clipboard"></i></span>
                                                    </div>
                                                    <input type="text" id="EditarrepeatPassword" name="EditarrepeatPassword" class="form-control" placeholder="Repita la contraseña" aria-label="Username" aria-describedby="basic-addon1" required>
                                                </div>

                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-dollar-sign"></i></span>
                                                    </div>
                                                    <input type="text" id="Editartelefono" name="Editartelefono" class="form-control" placeholder="Ingrese numero de contacto" aria-label="Username" aria-describedby="basic-addon1" required>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-dollar-sign"></i></span>
                                                    </div>
                                                    <input type="text" id="EditarNombre" name="Editarnombre" class="form-control" placeholder="Pueden ser 1 o 2 nombres" aria-label="Username" aria-describedby="basic-addon1" required>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-dollar-sign"></i></span>
                                                    </div>
                                                    <input type="text" id="Editarapellidos" name="Editarapellidos" class="form-control" placeholder="Pueden ser 1 o 2 apellidos" aria-label="Username" aria-describedby="basic-addon1" required>
                                                </div>


                                                <div class="form-group">

                                                    <div class="input-group md-3 date" data-provide="datepicker" data-date-format="dd-mm-yyyy">

                                                        <input type="text" class="form-control" id="EditarfechaNac" name="EditarfechaNac" placeholder="Ingrese Fecha Nacimiento" required>

                                                        <div class="input-group-addon" style="background-color:deepskyblue; color: white; cursor: pointer">

                                                            <i class="far fa-calendar-alt"></i>

                                                        </div>

                                                    </div>

                                                </div>



                                                <div class="input-group mb-3">

                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-file-image-o"></i></span>
                                                    </div>
                                                    <input type="text" id="Editaremail" placeholder="Ingrese un correo" name="Editaremail" class="form-control" required>
                                                </div>

                                                <div class="modal-footer">

                                                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>

                                                    <button type="submit" class="btn btn-success">Modificar
                                                        Producto</button>

                                                </div>

                                    </form>

                                </div>

                            </div>

                        </div>


                        <!--=====================================
                    TERMINO MODAL
                    ======================================-->

                    </div>

                </div>

            </section>

        </div>


        <!--=====================================
            MODAL AGREGAR PRODUCTO
            ======================================-->

        <div id="modalAgregarProducto" class="modal fade" role="dialog">

            <div class="modal-dialog">

                <div class="modal-content">

                    <form role="form" method="post" enctype="multipart/form-data">

                        <!--=====================================
                        CABEZA DEL MODAL
                        ======================================-->

                        <div class="modal-header" style="background:#3c8dbc; color:white">

                            <h4 class="modal-title">Agregar Cliente</h4>

                        </div>

                        <!--=====================================
                        CUERPO DEL MODAL
                        ======================================-->

                        <div class="modal-body">

                            <div class="box-body">


                                <!-- ENTRADA PARA EL USUARIO -->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-key"></i></span>
                                    </div>
                                    <input type="text" name="usuario" class="form-control" placeholder="Usuario" aria-label="Username" aria-describedby="basic-addon1" require>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-clipboard"></i></span>
                                    </div>
                                    <input type="text" name="password" class="form-control" placeholder="contraseña" aria-label="Username" aria-describedby="basic-addon1" required>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-clipboard"></i></span>
                                    </div>
                                    <input type="text" name="repeatPassword" class="form-control" placeholder="Repita la contraseña" aria-label="Username" aria-describedby="basic-addon1" required>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-dollar-sign"></i></span>
                                    </div>
                                    <input type="text" name="telefono" class="form-control" placeholder="Ingrese numero de contacto" aria-label="Username" aria-describedby="basic-addon1" required>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-dollar-sign"></i></span>
                                    </div>
                                    <input type="text" name="nombre" class="form-control" placeholder="Pueden ser 1 o 2 nombres" aria-label="Username" aria-describedby="basic-addon1" required>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-dollar-sign"></i></span>
                                    </div>
                                    <input type="text" name="apellidos" class="form-control" placeholder="Pueden ser 1 o 2 apellidos" aria-label="Username" aria-describedby="basic-addon1" required>
                                </div>


                                <div class="form-group">

                                    <div class="input-group md-3 date" data-provide="datepicker" data-date-format="dd-mm-yyyy">

                                        <input type="text" class="form-control" id="fechaNac" name="fechaNac" placeholder="Ingrese Fecha Nacimiento" required>

                                        <div class="input-group-addon" style="background-color:deepskyblue; color: white; cursor: pointer">

                                            <i class="far fa-calendar-alt"></i>

                                        </div>

                                    </div>

                                </div>



                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-file-image-o"></i></span>
                                    </div>
                                    <input type="text" placeholder="Ingrese un correo" name="email" class="form-control" required>
                                </div>


                                <!--  <div class="form-group">

                                <div class="input-group date" data-provide="datepicker" data-date-format="dd/mm/yyyy">

                                    <input type="text" class="form-control" id="FECHA_VENCIMIENTO"
                                        name="FECHA_VENCIMIENTO" placeholder="Ingrese FECHA VENCIMIENTO" required>

                                    <div class="input-group-addon"
                                        style="background-color:deepskyblue; color: white; cursor: pointer">

                                        <i class="far fa-calendar-alt"></i>

                                    </div>

                                </div>

                                </div> -->





                                <!-- <div class="form-group">

                                <label>Seleccione Tipo de Producto</label>

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-cart-plus"></i></span>



                                    </div>
                                -->




                                <!--=====================================
                                PIE DEL MODAL
                                ======================================-->

                                <div class="modal-footer">

                                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>

                                    <button type="submit" class="btn btn-success">Guardar Producto</button>

                                </div>

                                <?php
                                $agregarProducto = ControladorProductos::ctrAgregarProducto();
                                ?>
                            </div>
                    </form>

                </div>

            </div>

        </div>



        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php

    include "vistas/footer-admin.php";
    ?>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

</div>