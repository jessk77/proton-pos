<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Protón | Punto de Venta</title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo base_url(); ?>/images/launch.png" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url(); ?>plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url(); ?>/plugins/node-waves/waves.css" rel="stylesheet" />
    <!-- Toastr Css -->
    <link href="<?php echo base_url(); ?>/plugins/toastr/toastr.min.css" rel="stylesheet" />
    <!-- Animation Css -->
    <link href="<?php echo base_url(); ?>/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url(); ?>/css/style.css" rel="stylesheet">

    <!-- Multi Select Css -->
    <link href="<?php echo base_url(); ?>/plugins/multi-select/css/multi-select.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url(); ?>/css/themes/all-themes.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="<?php echo base_url(); ?>/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
     <!-- Select 2 css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

    <!-- Jquery Core Js -->
    <script src="<?php echo base_url(); ?>/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url(); ?>/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo base_url(); ?>/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url(); ?>/plugins/node-waves/waves.js"></script>
    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="<?php echo base_url(); ?>/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />
    <!-- Sweetalert Css -->
    <link href="<?php echo base_url(); ?>/plugins/sweetalert/sweetalert.css" rel="stylesheet" />

    <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
    <!-- Moment Plugin Js -->
    <script src="<?php echo base_url(); ?>/plugins/momentjs/moment.js"></script>
    

    <script>
        var base_url="<?php echo base_url(); ?>";
    </script>
</head>

<body class="theme-indigo">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Espere por favor...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                 <a class="navbar-brand" href="<?php echo base_url(); ?>/index.html">Protón | Punto de venta</a> 
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    
                    <!-- #END# Call Search -->
                    <!-- Notifications -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>
                            <span class="label-count">7</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">NOTIFICACIONES</li>
                            <li class="body">
                                <ul class="menu">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>12 new members joined</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 14 mins ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-cyan">
                                                <i class="material-icons">add_shopping_cart</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>4 sales made</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 22 mins ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-red">
                                                <i class="material-icons">delete_forever</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>Nancy Doe</b> deleted account</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 3 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                   
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);">View All Notifications</a>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Notifications -->
                    
                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                <img src="<?php echo base_url(); ?>images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                	<div class="email" style="font-size: 16px;">Bienvenido</div>
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><strong><?php echo strtoupper($this->session->userdata('usuario')); ?></strong></div>
                    
                    <div class="btn-group bg-indigo user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="<?php echo base_url(); ?>index.php/Cuenta"><i class="material-icons">person</i>Mi Cuenta</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo base_url(); ?>index.php/Inicio/logout"><i class="material-icons">input</i>Cerrar Sesión</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MENU PRINCIPAL</li>
                    <li>
                        <a href="<?php echo base_url(); ?>">
                            <i class="material-icons">home</i>
                            <span>INICIO</span>
                        </a>
                    </li>
                    
                    <?php $menu=$this->session->userdata('proton_session')["menu"]; 
                        foreach ($menu as $m) { ?>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <i class="material-icons"><?php echo $m->icono;?></i>
                                    <span><?php echo $m->nombre;?></span>
                                </a>
                                 <ul class="ml-menu">
                                    <?php foreach ($m->submenu as $s) { ?>
                                        <li>
                                            <a href="<?php echo base_url()."index.php/".$s->url;?>"><?php echo $s->nombre;?></a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </li>
                            
                    <?php } ?> 
                    <li>
                        <a href="<?php echo base_url(); ?>index.php/Usuarios">
                            <i class="material-icons">group</i>
                            <span>Usuarios</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>index.php/Inventario">
                            <i class="material-icons">storage</i>
                            <span>Inventario</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>index.php/Gastos">
                            <i class="material-icons">attach_money</i>
                            <span>Gastos</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>index.php/Ventas">
                            <i class="material-icons">store</i>
                            <span>Ventas</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>index.php/Datos">
                            <i class="material-icons">insert_chart</i>
                            <span>Análisis de Datos</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>index.php/Ajustes">
                            <i class="material-icons">settings</i>
                            <span>Ajustes</span>
                        </a>
                    </li>
                    
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; <?php echo date('Y');?> <a href="http://atomikod.com">Atomikod</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" ><a href="#skins" data-toggle="tab">ATOMIKOD</a></li>
                
            </ul>
            <div class="tab-content">
                <p><img src="<?php echo base_url(); ?>/images/logo_atom.png"  width="80%"  /></p>
                <ul class="list-group">
                                <li class="list-group-item text-center"><i class="material-icons">book</i> <a href="#">Manual de Usuario</a></li>
                                <li class="list-group-item text-center"><i class="material-icons">phone</i> 2223331108</li>
                                <li class="list-group-item text-center"><i class="material-icons">email</i> contacto@atomikod.com</li>
                            </ul>
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>