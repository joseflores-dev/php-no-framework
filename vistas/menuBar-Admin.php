 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
     <!-- Left navbar links -->
     <ul class="navbar-nav">
         <li class="nav-item">
             <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
         </li>
         <li class="nav-item d-none d-sm-inline-block">
             <a href="admin" class="nav-link">Inicio</a>
         </li>

         <li class="nav-item d-none d-sm-inline-block">
             <a href="inicio" class="nav-link">Salir</a>
         </li>

     </ul>

     <!-- SEARCH FORM -->
     <!--         
        <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form> -->

     <!-- Right navbar links -->
     <ul class="navbar-nav ml-auto">
         <!-- Messages Dropdown Menu -->
         <li class="nav-item dropdown">
             <a class="nav-link" data-toggle="dropdown" href="#">
                 <i class="far fa-comments"></i>
                 <span class="badge badge-danger navbar-badge">3</span>
             </a>
             <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                 <a href="#" class="dropdown-item">
                     <!-- Message Start -->
                     <div class="media">
                         <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                         <div class="media-body">
                             <h3 class="dropdown-item-title">
                                 Brad Diesel
                                 <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                             </h3>
                             <p class="text-sm">Call me whenever you can...</p>
                             <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                         </div>
                     </div>
                     <!-- Message End -->
                 </a>
                 <div class="dropdown-divider"></div>
                 <a href="#" class="dropdown-item">
                     <!-- Message Start -->
                     <div class="media">
                         <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                         <div class="media-body">
                             <h3 class="dropdown-item-title">
                                 John Pierce
                                 <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                             </h3>
                             <p class="text-sm">I got your message bro</p>
                             <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                         </div>
                     </div>
                     <!-- Message End -->
                 </a>
                 <div class="dropdown-divider"></div>
                 <a href="#" class="dropdown-item">
                     <!-- Message Start -->
                     <div class="media">
                         <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                         <div class="media-body">
                             <h3 class="dropdown-item-title">
                                 Nora Silvester
                                 <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                             </h3>
                             <p class="text-sm">The subject goes here</p>
                             <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                         </div>
                     </div>
                     <!-- Message End -->
                 </a>
                 <div class="dropdown-divider"></div>
                 <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
             </div>
         </li>
         <!-- Notifications Dropdown Menu -->
         <li class="nav-item dropdown">
             <a class="nav-link" data-toggle="dropdown" href="#">
                 <i class="far fa-bell"></i>
                 <span class="badge badge-warning navbar-badge">15</span>
             </a>
             <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                 <span class="dropdown-item dropdown-header">15 Notifications</span>
                 <div class="dropdown-divider"></div>
                 <a href="#" class="dropdown-item">
                     <i class="fas fa-envelope mr-2"></i> 4 new messages
                     <span class="float-right text-muted text-sm">3 mins</span>
                 </a>
                 <div class="dropdown-divider"></div>
                 <a href="#" class="dropdown-item">
                     <i class="fas fa-users mr-2"></i> 8 friend requests
                     <span class="float-right text-muted text-sm">12 hours</span>
                 </a>
                 <div class="dropdown-divider"></div>
                 <a href="#" class="dropdown-item">
                     <i class="fas fa-file mr-2"></i> 3 new reports
                     <span class="float-right text-muted text-sm">2 days</span>
                 </a>
                 <div class="dropdown-divider"></div>
                 <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
             </div>
         </li>
         <li class="nav-item">
             <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                 <i class="fas fa-th-large"></i>
             </a>
         </li>
     </ul>
 </nav>
 <!-- /.navbar -->


 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="admin" class="brand-link">
         <!-- <img src="vistas/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                style="opacity: .8"> -->
         <span class="brand-text font-weight-light">Panel de control</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="vistas/assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
             </div>
             <div class="info">
                 <a href="#" class="d-block"><?php echo $_SESSION["usuario"]; ?></a>
             </div>
         </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
                 <li class="nav-header"><i class="fa fa-cubes" aria-hidden="true"></i> Menu</li>
                 <li class="nav-item has-treeview menu-close">
                     <a href="#" class="nav-link active">
                         <i class="fa fa-user"></i>
                         <p>
                             Usuarios
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="admin-clientes" class="nav-link">
                                 <i class="fa fa-users nav-icon"></i>
                                 <p>Clientes</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="admin-trabajadores" class="nav-link">
                                 <i class="fa fa-user-circle-o nav-icon"></i>
                                 <p>Trabajadores</p>
                             </a>
                         </li>

                     </ul>
                 </li>
                 <li class="nav-item has-treeview menu-close">
                     <a href="#" class="nav-link active">
                         <i class="fa fa-stack-exchange"></i>
                         <p>
                             Inventario
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item has-treeview">
                             <a href="#" class="nav-link">
                                 <i class="nav-icon fa fa-sticky-note"></i>
                                 <p>
                                     Boletas
                                     <i class="fas fa-angle-left right"></i>
                                 </p>
                             </a>
                             <ul class="nav nav-treeview">
                                 <li class="nav-item">
                                     <a href="admin-boletas-pendientes" class="nav-link">
                                         <i class="fa fa-hourglass-half nav-icon"></i>
                                         <p>Pendientes</p>
                                     </a>
                                 </li>
                                 <li class="nav-item">
                                     <a href="admin-boletas-aprobadas" class="nav-link">
                                         <i class="fa fa-check nav-icon"></i>
                                         <p>Aprobadas</p>
                                     </a>
                                 </li>

                             </ul>
                         </li>
                         <li class="nav-item">
                             <a href="admin-productos" class="nav-link">
                                 <i class="fa fa-product-hunt nav-icon"></i>
                                 <p>Productos</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="admin-categorias" class="nav-link">
                                 <i class="fa fa-list  nav-icon"></i>
                                 <p>Categorias</p>
                             </a>
                         </li>




                     </ul>
                 </li>

                 <li class="nav-header"><i class="fa fa-wrench" aria-hidden="true"></i>
                     Ajustes</li>
                 <li class="nav-item">
                     <a href="https://adminlte.io/docs/3.0" class="nav-link">
                         <i class="nav-icon fa fa-caret-square-o-right"></i>
                         <p>Carousel</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="https://adminlte.io/docs/3.0" class="nav-link">
                         <i class="nav-icon fa fa-address-card-o"></i>
                         <p>Quienes Somos</p>
                     </a>
                 </li>

             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>