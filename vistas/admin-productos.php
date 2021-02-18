<div class="hold-transition sidebar-mini layout-fixed">


    <div class="wrapper">
        <?php
       if ($_SESSION["id_perfil"] < 3) {
        echo '<script>window.location="Inicio"</script>';
        }

    
        include "vistas/menuBar-Admin.php";


        ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Productos</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <!-- <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard v1</li>
                            </ol> -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->

            <section class="content">

                <div class="box">

                    <div class="box-header with-border">

                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProducto">

                            Agregar Producto

                        </button>
                        <br>
                        <br>

                    </div>

                    <div class="box-body">

                        <table class="table table-bordered table-striped dt-responsive table-responsive tabla" width="100%">
                            <thead>
                                <tr>
                                    <th style="width:10px">ID</th>
                                    <th>NOMBRE</th>
                                    <th>PRECIO</th>
                                    <th>STOCK</th>
                                    <th>ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $row = ControladorProductos::ctrTraerProductos();


                                foreach ($row as $key => $value) {
                                    echo "<tr>\n";
                                    echo "<td>";
                                    echo $value["id"];

                                    echo "</td>";

                                    echo "<td>";
                                    echo $value["nombre"];

                                    echo "</td>";
                                    echo "<td>";
                                    echo number_format($value["precio"], 0, ",", ".");

                                    echo "</td>";



                                    echo "<td>";
                                    echo $value["stock"];
                                    echo "</td>";


                                    echo '
                        <td>
                            <div class="btn-group">
                                
                                <button class="btn btn-warning btnEditarProducto" data-toggle="modal" data-target="#modalEditarProducto" idProducto="' . $value["id"] . '"><i class="fa fa-pencil-square-o"></i></button>
                
                                <button class="btn btn-danger btnEliminarProducto" idProducto="' . $value["id"] . '"><i class="fa fa-times"></i></button>
                
                            </div>  
                
                        </td>';

                                    echo "</tr>";
                                }





                                ?>

                            </tbody>

                        </table>


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

                                            <h4 class="modal-title">Editar Producto</h4>

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
                                                    <input type="text" id="EditarNombre" name="EditarNombre" class="form-control" aria-label="Username" aria-describedby="basic-addon1" required>
                                                </div>

                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-clipboard"></i></span>
                                                    </div>
                                                    <input type="text" id="EditarDescripcion" name="EditarDescripcion" class="form-control" aria-label="Username" aria-describedby="basic-addon1" required>
                                                </div>

                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-dollar-sign"></i></span>
                                                    </div>
                                                    <input type="text" id="EditarPrecio" name="EditarPrecio" class="form-control" aria-label="Username" aria-describedby="basic-addon1" required>
                                                </div>




                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-shopping-cart"></i></span>
                                                    </div>
                                                    <input type="text" id="EditarStock" name="EditarStock" class="form-control" aria-label="Username" aria-describedby="basic-addon1" required>
                                                </div>

                                                <div class="input-group mb-3">

                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-file-image-o"></i></span>
                                                    </div>
                                                    <input type="FILE" name="EditarFoto" class="form-control" required>
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

                            <h4 class="modal-title">Agregar Producto</h4>

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
                                    <input type="text" name="Nombre" class="form-control" placeholder="Nombre del producto" aria-label="Username" aria-describedby="basic-addon1" require>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-clipboard"></i></span>
                                    </div>
                                    <input type="text" name="Descripcion" class="form-control" placeholder="Descripcion del producto" aria-label="Username" aria-describedby="basic-addon1" required>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-dollar-sign"></i></span>
                                    </div>
                                    <input type="text" name="Precio" class="form-control" placeholder="Precio del producto" aria-label="Username" aria-describedby="basic-addon1" required>
                                </div>




                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-shopping-cart"></i></span>
                                    </div>
                                    <input type="text" name="Stock" class="form-control" placeholder="Stock's del producto" aria-label="Username" aria-describedby="basic-addon1" required>
                                </div>

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-file-image-o"></i></span>
                                    </div>
                                    <input type="FILE" name="Foto" class="form-control" required>
                                </div>

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