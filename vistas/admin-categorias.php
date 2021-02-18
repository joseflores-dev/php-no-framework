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
                            <center><h1 class="m-0 text-dark">Categorias</h1> </center>
                            <?php
                               
                            ?>
                            
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                           <center>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProducto">

                            Agregar Categoria

                        </button></center>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->

            <section class="content">

                <div class="box">

                    <div class="box-header with-border">

                        <br>
                        <br>

                    </div>

                    <div class="box-body">

                        <table class="table table-bordered table-striped dt-responsive table-responsive tabla" width="100%">
                            <thead>
                                <tr>
                                    <th style="width:10px">ID</th>
                                    <th>Categoria</th>
                                    <th>Acciones</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                
                                $row = ControladorCategorias::ctrTraerCategorias(null);


                                foreach ($row as $key => $value) {
                                    echo "<tr>\n";
                                    echo "<td>";
                                    echo $value["id"];

                                    echo "</td>";

                                    echo "<td>";
                                    echo $value["descripcion"];


                                    echo '
                        <td>
                            <div class="btn-group">
                                
                                <button class="btn btn-warning btnEditarCategoria" data-toggle="modal" data-target="#modalEditarProducto" idCategoria="' . $value["id"] . '"><i class="fa fa-pencil-square-o"></i></button>
                
                                <button class="btn btn-danger btbEliminarCategoria" idCategoria="' . $value["id"] . '"><i class="fa fa-times"></i></button>
                
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
                                                    <input type="text" id="EditarCategoria" name="EditarCategoria" class="form-control" aria-label="Username" aria-describedby="basic-addon1" required>
                                                </div>

                                             

                                                <div class="modal-footer">

                                                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>

                                                    <button type="submit" class="btn btn-success">Modificar
                                                        Categoria</button>

                                                </div>

                                                <?php
                                                    $editarCategoria = ControladorCategorias::ctrEditarCategoria();
                                                ?>

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



                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-clipboard"></i></span>
                                    </div>
                                    <input type="text" name="descripcion" class="form-control" placeholder="Ingrese la nueva categoria" aria-label="Username" aria-describedby="basic-addon1" required>
                                </div>

                                


                                <!--=====================================
                                PIE DEL MODAL
                                ======================================-->

                                <div class="modal-footer">

                                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>

                                    <button type="submit" class="btn btn-success">Guardar Categoria</button>

                                </div>

                                <?php
                                $agregarProducto = ControladorCategorias::ctrAgregarCategoria();
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