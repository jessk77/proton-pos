<section class="content">
    <div class="container-fluid">
        <div class="block-header">
        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-indigo">

                        <div class="row">
                            <div class="col-md-6">
                                <h2>
                                    Registro de Gastos
                                </h2>
                            </div>
                            <div class="col-md-6 text-right">
                                <button data-toggle="modal" data-target="#defaultModal" class="btn bg-blue waves-effect">
                                    <i class="material-icons">add_circle</i>
                                    <span>AGREGAR NUEVO</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="body">
                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-line">
                                        <select id="mes" class="form-control box-input show-tick change">
                                            <option value="1" <?php if (date("n") == 1) echo "selected"; ?>)>Enero</option>
                                            <option value="2" <?php if (date("n") == 2) echo "selected"; ?>>Febrero</option>
                                            <option value="3" <?php if (date("n") == 3) echo "selected"; ?>>Marzo</option>
                                            <option value="4" <?php if (date("n") == 4) echo "selected"; ?>>Abril</option>
                                            <option value="5" <?php if (date("n") == 5) echo "selected"; ?>>Mayo</option>
                                            <option value="6" <?php if (date("n") == 6) echo "selected"; ?>>Junio</option>
                                            <option value="7" <?php if (date("n") == 7) echo "selected"; ?>>Julio</option>
                                            <option value="8" <?php if (date("n") == 8) echo "selected"; ?>>Agosto</option>
                                            <option value="9" <?php if (date("n") == 9) echo "selected"; ?>>Septiembre</option>
                                            <option value="10" <?php if (date("n") == 10) echo "selected"; ?>>Octubre</option>
                                            <option value="11" <?php if (date("n") == 11) echo "selected"; ?>>Noviembre</option>
                                            <option value="12" <?php if (date("n") == 12) echo "selected"; ?>>Diciembre</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group form-float">
                                    <div class="form-line ">
                                        <input type="number" id="anio" class="form-control box-input change" value="<?php echo date("Y"); ?>">
                                        <label class="form-label">Año</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Concepto</th>
                                        <th>Monto</th>
                                        <th>Categoría</th>
                                        <th>Fecha</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Concepto</th>
                                        <th>Monto</th>
                                        <th>Categoría</th>
                                        <th>Fecha</th>
                                        <th>Acciones</th>
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

<!-- Modal-->
<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form_gastos">
                <div class="modal-header bg-blue">
                    <h4 class="modal-title" id="defaultModalLabel">AGREGAR GASTO</h4>
                </div>
                <div class="modal-body">
                    <p>Ingrese la información del nuevo gasto</p>

                    <div class="form-group form-float">
                        <div class="form-line ">
                            <input type="text" name="concepto" class="form-control box-input uppercase">
                            <label class="form-label">Concepto</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line ">
                            <input type="text" name="monto" class="form-control box-input uppercase">
                            <label class="form-label">Monto</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            <select name="categoria" class="form-control box-input show-tick">
                                <option value="">Seleccione catégoria</option>
                                <option>Piezas</option>
                                <option>Bultos</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line ">
                            <input id="fecha" name="fecha" class="form-control box-input uppercase">
                            <label class="form-label">Fecha</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info waves-effect"><i class="material-icons">save</i> GUARDAR</button>
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="<?php echo base_url() ?>/js/gastos/listado.js"></script>