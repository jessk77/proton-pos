<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>


            </h2>
        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-indigo">

                        <div class="row">
                            <div class="col-md-6">
                                <h4>
                                    Inventario
                                </h4>
                            </div>
                            <div class="col-md-6 text-right">

                            </div>
                        </div>
                    </div>
                    <div class="body">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#home_with_icon_title" data-toggle="tab">
                                    <i class="material-icons">add</i> AGREGAR
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#profile_with_icon_title" data-toggle="tab">
                                    <i class="material-icons">edit</i> AJUSTAR
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#messages_with_icon_title" data-toggle="tab">
                                    <i class="material-icons">bar_chart</i> INVENTARIO
                                </a>
                            </li>
                            <!-- <li role="presentation">
                                <a href="#settings_with_icon_title" data-toggle="tab">
                                    <i class="material-icons">swap_horiz</i> MOVIMIENTOS
                                </a>
                            </li> -->
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="home_with_icon_title">
                                <div class="card">

                                    <div class="body">
                                        <h3>Agregar productos a inventario</h3><br>
                                        <form id="form_agregar" method="POST">
                                            <div class="row ">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label >Producto</label>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line ">
                                                            <input class="box-input" id="autocomplete1" placeholder="Busque producto por nombre o código" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br><br>
                                            <div class="row ">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                                                    <b>Cantidad en Stock: <span id="stocklb1"></span></b>
                                                    <input name="id" id="id_producto" hidden />
                                                    <input name="stock" id="stock1" hidden />
                                                </div>

                                            </div>
                                            <div class="row ">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label >Agregar Cantidad</label>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line ">
                                                            <input name="cantidad" class="form-control box-input" placeholder="Ingrese Cantidad a Agregar" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row ">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label >Costo</label>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line ">
                                                            <input name="costo" class="form-control box-input" placeholder="Ingrese Costo de producto" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <button style="width: 200px" id="btn_submit" class="btn bg-blue waves-effect" type="submit"><i class="material-icons">save</i><span>GUARDAR</span></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="profile_with_icon_title">
                                <div class="card">

                                    <div class="body">
                                        <h3>Ajustar productos de inventario</h3><br>
                                        <form id="form_ajustar" method="POST">
                                        <div class="row ">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label >Producto</label>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line ">
                                                            <input class="box-input" id="autocomplete2"  placeholder="Busque producto por nombre o código" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row ">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                                                <b>Cantidad en Stock: <span id="stocklb2"></span></b>
                                                    <input name="id" id="id_producto2" hidden />
                                                    <input name="stock" id="stock2" hidden />
                                                </div>

                                            </div>
                                            <div class="row ">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label >Cantidad</label>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                        <div class="form-line ">
                                                            <input name="cantidad" class="form-control box-input" placeholder="Ingrese Cantidad a Agregar" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <button style="width: 200px" id="btn_submit" class="btn bg-blue waves-effect" type="submit"><i class="material-icons">save</i><span>GUARDAR</span></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="messages_with_icon_title">
                                <div class="card">

                                    <div class="body">
                                        <b>Reporte de productos de inventario</b><br><br>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable " cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>Código</th>
                                                        <th>Producto</th>
                                                        <th>Categoría</th>
                                                        <th>En stock</th>
                                                        <th>Minimo</th>
                                                        <th>Máximo</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Código</th>
                                                        <th>Producto</th>
                                                        <th>Categoría</th>
                                                        <th>En stock</th>
                                                        <th>Minimo</th>
                                                        <th>Máximo</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                   
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div role="tabpanel" class="tab-pane fade" id="settings_with_icon_title">
                                <div class="card">

                                    <div class="body">
                                        <b>Reporte de movimientos del inventario</b><br><br>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable " cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>Producto</th>
                                                        <th>Categoría</th>
                                                        <th>En stock</th>
                                                        <th>Máximo</th>
                                                        <th>Minimo</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Producto</th>
                                                        <th>Categoría</th>
                                                        <th>En stock</th>
                                                        <th>Máximo</th>
                                                        <th>Minimo</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                    <tr>
                                                        <td>Tiger Nixon</td>
                                                        <td>System Architect</td>
                                                        <td class="bg-red">100</td>
                                                        <td>61</td>
                                                        <td>61</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garrett Winters</td>
                                                        <td>Accountant</td>
                                                        <td class="bg-green">200</td>
                                                        <td>63</td>
                                                        <td>63</td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Examples -->

    </div>
</section>



<script src="<?php echo base_url() ?>/plugins/easy-autocomplete/jquery.easy-autocomplete.js"></script>
<link href="<?php echo base_url() ?>/plugins/easy-autocomplete/easy-autocomplete.css" rel="stylesheet">

<script src="<?php echo base_url() ?>/js/inventario/agregar.js"></script>
<script src="<?php echo base_url() ?>/js/inventario/ajustar.js"></script>
<script src="<?php echo base_url() ?>/js/inventario/inventario.js"></script>