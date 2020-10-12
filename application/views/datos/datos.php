<section class="content">
    <div class="container-fluid">

        <!-- Basic Examples btn-group-justified -->
        <div class="block-header">
            <h2>REPORTE GENERAL</h2>
        </div>
        <div class="btn-group  btn-group-lg  m-b-15" role="group">
            <a href="javascript:void(0);" class="btn bg-indigo waves-effect" role="button">GENERAL MES</a>
            <a href="<?php echo base_url(); ?>index.php/Datos/corte" class="btn bg-grey waves-effect" role="button">CORTE DEL DÍA</a>

            <div class="btn-group btn-group-lg" role="group">
                <a href="javascript:void(0);" class="btn bg-grey dropdown-toggle" data-toggle="dropdown" role="button">VENTAS<span class="caret"></span></a>
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
                        <div class="col-md-6"></div>
                            <div class="col-md-4">
                            <div class="form-group">
                    <div class="form-line">
                        <select id="mes" class="form-control  show-tick change" style="background-color: #e9e9e9;">
                            <option value="1" <?php if(date("n")==1) echo "selected";?>)>Enero</option>
                            <option value="2" <?php if(date("n")==2) echo "selected";?>>Febrero</option>
                            <option value="3" <?php if(date("n")==3) echo "selected";?>>Marzo</option>
                            <option value="4" <?php if(date("n")==4) echo "selected";?>>Abril</option>
                            <option value="5" <?php if(date("n")==5) echo "selected";?>>Mayo</option>
                            <option value="6" <?php if(date("n")==6) echo "selected";?>>Junio</option>
                            <option value="7" <?php if(date("n")==7) echo "selected";?>>Julio</option>
                            <option value="8" <?php if(date("n")==8) echo "selected";?>>Agosto</option>
                            <option value="9" <?php if(date("n")==9) echo "selected";?>>Septiembre</option>
                            <option value="10" <?php if(date("n")==10) echo "selected";?>>Octubre</option>
                            <option value="11" <?php if(date("n")==11) echo "selected";?>>Noviembre</option>
                            <option value="12" <?php if(date("n")==12) echo "selected";?>>Diciembre</option>
                        </select>
                    </div>
                </div>
                            </div>
                            <div class="col-md-2">
                            <div class="form-group form-float">
                    <div class="form-line ">
                        <input type="number" id="anio" class="form-control  change" value="<?php echo date("Y");?>" style="background-color: #e9e9e9;">
                        <label class="form-label">Año</label>
                    </div>
                </div>
                            </div>
                        </div>
        <div class="row clearfix">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <h4>TOTAL ENTRADAS Y SALIDAS DEL MES</h4> <hr>
                <div class="info-box bg-green">
                    <div class="icon">
                        <i class="material-icons">thumb_up</i>
                    </div>
                    <div class="content">
                        <div class="text">ENTRADAS</div>
                        <div class="number count-to" id="entradas">0</div>
                    </div>
                </div>
                <hr>
                <div class="info-box bg-blue">
                    <div class="icon">
                        <i class="material-icons">thumb_down</i>
                    </div>
                    <div class="content">
                        <div class="text">SALIDAS</div>
                        <div class="number count-to" id="salidas">0</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>Ventas del mes: 300</h2>

                    </div>
                    <div class="body">
                    <canvas id="line_chart" height="150"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>Ventas por Categoría</h2>

                    </div>
                    <div class="body">
                    <canvas id="pie_chart" height="150"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">

                        <h2>
                            Top Productos Vendidos
                        </h2>
                    </div>
                    <div class="body">
                        <div class="body table-responsive">
                            <table class="table table-condensed table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>PRODUCTO</th>

                                    </tr>
                                </thead>
                                <tbody id="top_table">
                                    
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

<script src="<?php echo base_url() ?>/plugins/chartjs/Chart.bundle.js"></script>

<script src="<?php echo base_url() ?>js/datos/general.js"></script>