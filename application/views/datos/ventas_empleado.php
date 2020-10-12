<section class="content">
    <div class="container-fluid">

        <!-- Basic Examples btn-group-justified -->
        <div class="block-header">
            <h2>REPORTE DE VENTAS POR EMPLEADO</h2>
        </div>
        <div class="btn-group  btn-group-lg  m-b-15" role="group">
            <a href="<?php echo base_url(); ?>index.php/Datos/" class="btn bg-grey waves-effect" role="button">GENERAL MES</a>
            <a href="<?php echo base_url(); ?>index.php/Datos/corte" class="btn bg-grey waves-effect" role="button">CORTE DEL DÍA</a>

            <div class="btn-group btn-group-lg" role="group">
                <a href="javascript:void(0);" class="btn bg-indigo dropdown-toggle" data-toggle="dropdown" role="button">VENTAS<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Reporte de Ventas</a></li>
                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Ventas por Categoría</a></li>
                    <li><a href="javascript:void(0);" class=" waves-effect waves-block">Ventas por Empleado</a></li>
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
                                        <input type="date" id="inicio" class="form-control  change" value="<?php echo date("Y-m-d"); ?>">
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
                        
            <canvas id="bar_chart" height="150"></canvas>

                        <hr>
                    </div>

                </div>
            </div> 
        </div>
        <!-- #END# Basic Examples -->

    </div>
</section>

<script src="<?php echo base_url() ?>/plugins/print-this/printThis.js"></script>
<script src="<?php echo base_url() ?>/plugins/chartjs/Chart.bundle.js"></script>
 <script src="<?php echo base_url() ?>js/datos/ventas_em.js"></script> 