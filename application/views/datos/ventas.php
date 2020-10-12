<section class="content">
    <div class="container-fluid">

        <!-- Basic Examples btn-group-justified -->
        <div class="block-header">
            <h2>REPORTE DE VENTAS</h2>
        </div>
        <div class="btn-group  btn-group-lg  m-b-15" role="group">
            <a href="<?php echo base_url(); ?>index.php/Datos/" class="btn bg-grey waves-effect" role="button">GENERAL MES</a>
            <a href="<?php echo base_url(); ?>index.php/Datos/corte" class="btn bg-grey waves-effect" role="button">CORTE DEL DÍA</a>

            <div class="btn-group btn-group-lg" role="group">
                <a href="javascript:void(0);" class="btn bg-indigo dropdown-toggle" data-toggle="dropdown" role="button">VENTAS<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url(); ?>index.php/Datos/ventas" class=" waves-effect waves-block">Reporte de Ventas</a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/Datos/ventas_categoria" class=" waves-effect waves-block">Ventas por Categoría</a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/Datos/ventas_empleado" class=" waves-effect waves-block">Ventas por Empleado</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Ventas Canceladas</a></li>
                </ul>
            </div>
            <div class="btn-group btn-group-lg" role="group">
                <a href="javascript:void(0);" class="btn bg-grey dropdown-toggle" data-toggle="dropdown" role="button">INVENTARIO<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Reporte de Inventario</a></li>
                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Movimientos</a></li>
                </ul>
            </div>
        </div>
        
        <br>
        
        <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    
                    <div class="body">
                        <p>Ingrese un rango de fechas:</p><br>
                        <div class="row">
                            
                            <div class="col-md-4">
                            <div class="form-group form-float">
                                    <div class="form-line ">
                                        <input type="date" id="inicio" class="form-control  change" value="<?php echo date("Y-m-01"); ?>">
                                        <label class="form-label">Fecha de Inicio</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group form-float">
                                    <div class="form-line ">
                                        <input type="date" id="fin" class="form-control  change" value="<?php echo date("Y-m-d"); ?>">
                                        <label class="form-label">Fecha de fin</label>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box hover-zoom-effect bg-indigo">
                        <div class="icon">
                            <i class="material-icons">shopping_cart</i>
                        </div>
                        <div class="content">
                            <div class="text">NO. VENTAS</div>
                            <div id="no_ventas"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box hover-zoom-effect bg-indigo">
                        <div class="icon">
                            <i class="material-icons">attach_money</i>
                        </div>
                        <div class="content">
                            <div class="text">TOTAL VENTAS</div>
                            <div id="total_ventas"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box hover-zoom-effect bg-teal">
                        <div class="icon">
                            <i class="material-icons">trending_up</i>
                        </div>
                        <div class="content">
                            <div class="text">GANANCIAS</div>
                            <div id="ganancias"></div>
                        </div>
                    </div>
                </div>
                
            </div>
                        <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No.Venta</th>
                                            <th>Cliente</th>
                                            <th>Monto</th>
                                            <th>Tipo de Pago</th>
                                            <th>Fecha Venta</th>
                                            <th>Vendedor</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No.Venta</th>
                                            <th>Cliente</th>
                                            <th>Monto</th>
                                            <th>Tipo de Pago</th>
                                            <th>Fecha Venta</th>
                                            <th>Vendedor</th>
                                            
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>

                        <hr>
                    </div>

                </div>
            </div> 
        </div>
        <!-- #END# Basic Examples -->

    </div>
</section>

<script src="<?php echo base_url() ?>/plugins/print-this/printThis.js"></script>
 <script src="<?php echo base_url() ?>js/datos/ventas.js"></script> 