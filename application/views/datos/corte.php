<section class="content">
    <div class="container-fluid">

        <!-- Basic Examples btn-group-justified -->
        <div class="block-header">
            <h2>CORTE DEL DÍA</h2>
        </div>
        <div class="btn-group  btn-group-lg  m-b-15" role="group">
            <a href="<?php echo base_url(); ?>index.php/Datos/" class="btn bg-grey waves-effect" role="button">GENERAL MES</a>
            <a href="javascript:void(0);" class="btn bg-indigo waves-effect" role="button">CORTE DEL DÍA</a>

            <div class="btn-group btn-group-lg" role="group">
                <a href="javascript:void(0);" class="btn bg-grey dropdown-toggle" data-toggle="dropdown" role="button">VENTAS<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url(); ?>index.php/Datos/ventas" class=" waves-effect waves-block">Reporte de Ventas</a></li>
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
                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-4">
                            <div class="form-group form-float">
                                    <div class="form-line ">
                                        <input type="date" id="fecha" class="form-control  change" value="<?php echo date("Y-m-d"); ?>">
                                        <label class="form-label">Fecha</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                            <button onclick="imprimir()" class="btn bg-blue waves-effect">
                                    <i class="material-icons">print</i>
                                    <span>IMPRIMIR</span>
                                </button>
                            </div>
                        </div>
                        <div class="table-responsive" id="print_zone">
                            <table class="table table-bordered table-condensed table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Concepto</th>
                                        <th>Cantidad</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="background-color: #eee"><td><h4>VENTAS</h4></td><td></td></tr>
                                    <tr><td><p>Ventas realizadas</p></td><td id="no_ventas">0</td></tr>
                                    <tr><td><p>Total de Ventas</p></td><td>$<span id="total_ventas"></span></td></tr>
                                    <tr><td><p>Ganancias</p></td><td>$<span id="ganancias"></span></td></tr>
                                    <tr><td><p>Total productos vendidos</p></td><td id="productos"></td></tr>
                                    <tr style="background-color: #eee"><td><h4>CANCELACIONES</h4></td><td></td></tr>
                                    <tr><td><p>Ventas canceladas</p></td><td id="canceladas">0</td></tr>
                                    <tr><td><p>Total de Ventas canceladas</p></td><td>$<span id="total_canceladas">0</span></td></tr>
                                    <tr style="background-color: #eee"><td><h4>GASTOS</h4></td><td></td></tr>
                                    <tr><td><p>Gastos realizados</p></td><td id="no_gastos">0</td></tr>
                                    <tr><td><p>Total de Gastos</p></td><td>$<span id="total_gastos"></span></td></tr>
                                    <tr style="background-color: #eee"><td><h4>INVENTARIO</h4></td><td></td></tr>
                                    <tr><td><p>Total de productos en inventario</p></td><td id="inventario">0</td></tr>
                                    <tr><td><p>Valor total del inventario</p></td><td>$<span id="total_inventario"></span></td></tr>
                                    <tr><td><p>Productos bajos en stock</p></td><td id="bajos_stock">0</td></tr>
                                <tbody>
                                <tfoot>
                                    <tr>
                                        <th>Concepto</th>
                                        <th>Cantidad</th>
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
 <script src="<?php echo base_url() ?>js/datos/corte.js"></script> 