<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    CATÁLOGO DE USUARIOS
                    
                </h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-indigo">
                            
                            <div class="row">
                                <div class="col-md-6">
                                   <h2>
                                        Usuarios
                                    </h2> 
                                </div>
                                <div class="col-md-6 text-right">
                                    <a href="<?php echo base_url(); ?>index.php/Usuarios/alta" class="btn bg-blue waves-effect">
                                        <i class="material-icons">add_circle</i>
                                        <span>AGREGAR NUEVO</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="body">
                            
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Usuario</th>
                                            <th>Correo</th>
                                            <th>Teléfono</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Usuario</th>
                                            <th>Correo</th>
                                            <th>Teléfono</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
            
        </div>
    </section>

    <script src="<?php echo base_url()?>/js/catalogos/empleados/listado.js"></script>