<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    LISTADO DE COMPRAS
                    
                </h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                       
                        <div class="body">
                            
                            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                <li role="presentation" class="active"><a href="#home" data-toggle="tab" aria-expanded="true">MATERIA PRIMA</a></li>
                                <li role="presentation" class=""><a href="#profile" data-toggle="tab" aria-expanded="false">INSUMOS</a></li>
                               
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade active in" id="home">
                                    <div class="row">
                                        <div class="col-md-6">
                                           <h4>
                                                MATERIA PRIMA
                                            </h4> 
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <a href="<?php echo base_url(); ?>index.php/Compras/alta_mp" class="btn bg-teal waves-effect">
                                                <i class="material-icons">add_circle</i>
                                                <span>COMPRA MATERIA</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="table_mp" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Fecha</th>
                                            <th>Proveedor</th>
                                            <th>Peso Kg</th>
                                            <th>Producto</th>
                                            <th>Precio Kg</th>
                                            <th>Total</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Fecha</th>
                                            <th>Proveedor</th>
                                            <th>Peso Kg</th>
                                            <th>Producto</th>
                                            <th>Precio Kg</th>
                                            <th>Total</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                                    
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="profile">
                                    <div class="row">
                                        <div class="col-md-6">
                                           <h4>
                                                INSUMOS
                                            </h4> 
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <a href="<?php echo base_url(); ?>index.php/Compras/alta_ins" class="btn bg-teal waves-effect">
                                                <i class="material-icons">add_circle</i>
                                                <span>COMPRA INSUMOS</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="table_ins" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Fecha</th>
                                                    <th>Proveedor</th>
                                                    <th>Cantidad</th>
                                                    <th>Unidades</th>
                                                    <th>Producto</th>
                                                    <th>Precio Unitario</th>
                                                    <th>Total</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Fecha</th>
                                                    <th>Proveedor</th>
                                                    <th>Cantidad</th>
                                                    <th>Unidades</th>
                                                    <th>Producto</th>
                                                    <th>Precio Unitario</th>
                                                    <th>Total</th>
                                                    <th></th>
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
                </div>
            </div>
            <!-- #END# Basic Examples -->
            
        </div>
    </section>

    <script src="<?php echo base_url()?>/js/compras/listado.js"></script> 
