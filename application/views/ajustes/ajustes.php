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
                                    Ajustes
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
                                    <i class="material-icons">touch_app</i> INFO. EMPRESA
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#profile_with_icon_title" data-toggle="tab">
                                    <i class="material-icons">receipt</i> TICKET VENTA
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#messages_with_icon_title" data-toggle="tab">
                                    <i class="material-icons">attach_money</i> IMPUESTOS Y MONEDA
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#settings_with_icon_title" data-toggle="tab">
                                    <i class="material-icons">format_list_bulleted</i> CATEGORÍAS
                                </a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="home_with_icon_title">
                                <div class="card">

                                    <div class="body">
                                        <h3>Información de la empresa</h3><br>
                                        <form id="form_empresa" method="POST">
                                            <div class="row ">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 text-left form-control-label">
                                                    <label>Nombre</label>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">business</i>
                                                            </span>
                                                            <div class="form-line">
                                                                <input type="text" name="nombre" value="<?php if (isset($empresa)) {
                                                                                                            echo $empresa->nombre;
                                                                                                        } ?>" class="form-control box-input " placeholder="Ingrese el nombre de la empresa">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="row ">
                                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                            <label>Logotipo</label>
                                                        </div>
                                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <i class="material-icons">insert_photo</i>
                                                                    </span>
                                                                    <div class="form-line">
                                                                        <input type="file" multiple name="logotipo" value="<?php if (isset($empresa)) {
                                                                                                                                echo $empresa->logotipo;
                                                                                                                            } ?>" onchange="loadFile(event)" size="2MB" accept="image/*" class="form-control box-input">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row ">
                                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                            <label>Teléfono</label>
                                                        </div>
                                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <i class="material-icons">phone</i>
                                                                    </span>
                                                                    <div class="form-line">
                                                                        <input type="text" name="telefono" value="<?php if (isset($empresa)) {
                                                                                                                        echo $empresa->telefono;
                                                                                                                    } ?>" class="form-control box-input" placeholder="Ingrese teléfono">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row ">
                                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                            <label>Página Web</label>
                                                        </div>
                                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <i class="material-icons">language</i>
                                                                    </span>
                                                                    <div class="form-line">
                                                                        <input type="text" name="web" value="<?php if (isset($empresa)) {
                                                                                                                    echo $empresa->web;
                                                                                                                } ?>" class="form-control box-input" placeholder="Ingrese página web">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 text-center">

                                                    <img id="img_container" src="<?php if (isset($empresa) && $empresa->logotipo != "") {
                                                                                        echo base_url() . 'uploads/' . $empresa->logotipo;
                                                                                    } else {
                                                                                        echo base_url() . 'images/shop.png';
                                                                                    }
                                                                                    ?>?>" class="img-thumbnail " width="250px" alt="Responsive image">
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
                                        <h3>Configuración de Ticket de Venta</h3><br>
                                        <form id="form_ticket" method="POST">
                                            <div class="row">
                                                <div class="col-md-6">
                                                <div class="row ">
                                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                            <label><strong>Mostrar logo</strong></label>
                                                        </div>
                                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <select name="tk_logo" class="box-input form-control show-tick">
                                                                        <option value="1" <?php if ($empresa->tk_logo == "1") {
                                                                                                    echo "selected";
                                                                                                } ?>>SI</option>
                                                                        <option value="0" <?php if ($empresa->tk_logo == "0") {
                                                                                                    echo "selected";
                                                                                                } ?>>NO</option>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                                    <div class="row ">
                                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                            <label><strong>Tamaño logo</strong></label>
                                                        </div>
                                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <select name="tk_size_logo" class="box-input form-control show-tick">
                                                                        <option value="30px" <?php if ($empresa->tk_size_logo == "30px") {
                                                                                                    echo "selected";
                                                                                                } ?>>CHICO</option>
                                                                        <option value="60px" <?php if ($empresa->tk_size_logo == "60px") {
                                                                                                    echo "selected";
                                                                                                } ?>>MEDIANO</option>
                                                                        <option value="90px" <?php if ($empresa->tk_size_logo == "90px") {
                                                                                                    echo "selected";
                                                                                                } ?>>GRANDE</option>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row ">
                                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                            <label>Encabezado</label>
                                                        </div>
                                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <i class="material-icons">speaker_notes</i>
                                                                    </span>
                                                                    <div class="form-line">
                                                                        <textarea type="text" name="tk_encabezado" class="form-control box-input" placeholder="Ingrese encabezado de ticket"><?php if (isset($empresa)) {
                                                                                                                                                                                                    echo $empresa->tk_encabezado;
                                                                                                                                                                                                } ?></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row ">
                                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                            <label>Mensaje</label>
                                                        </div>
                                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <i class="material-icons">speaker_notes</i>
                                                                    </span>
                                                                    <div class="form-line">
                                                                        <textarea type="text" name="tk_mensaje" class="form-control box-input" placeholder="Ingrese mensaje de ticket"><?php if (isset($empresa)) {
                                                                                                                                                                                            echo $empresa->tk_mensaje;
                                                                                                                                                                                        } ?></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row ">
                                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                            <label>Pie de Ticket</label>
                                                        </div>
                                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <i class="material-icons">speaker_notes</i>
                                                                    </span>
                                                                    <div class="form-line">
                                                                        <textarea type="text" name="tk_pie" class="form-control box-input" placeholder="Ingrese pie de ticket"><?php if (isset($empresa)) {
                                                                                                                                                                                    echo $empresa->tk_pie;
                                                                                                                                                                                } ?></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 text-center">
                                                            <button style="width: 200px" id="btn_submit" class="btn bg-blue waves-effect" type="submit"><i class="material-icons">save</i><span>GUARDAR</span></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <iframe id="frame_ticket" src="<?php echo base_url(); ?>index.php/Formatos/ticketmateria/0" height="500" width="100%"></iframe>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="messages_with_icon_title">
                                <div class="card">

                                    <div class="body">
                                        <h3>Impuestos</h3><br>
                                        <form id="form_moneda" method="POST">
                                            <div class="row">
                                                <div class="col-md-12  text-left">
                                                    <input type="checkbox" id="check_imp" value="1" name="impuesto" class="filled-in chk-col-blue" <?php if (isset($empresa) && $empresa->impuesto) {
                                                                                                                                                        echo "checked";
                                                                                                                                                    } ?>>
                                                    <label for="check_imp">Desplegar Impuesto en la Venta</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="tasa_imp">Tasa de impuestos</label>
                                                    <div class="input-group form-group">
                                                        <div class="form-line form-float">
                                                            <input type="text" name="tasa_imp" <?php if (isset($empresa)) {
                                                                                                    echo "value='$empresa->tasa_imp'";
                                                                                                } ?> class="form-control box-input" placeholder="Tasa de impuestos">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="porcentaje_imp">Porcentaje</label>
                                                    <div class="input-group form-group">
                                                        <div class="form-line form-float">
                                                            <input type="text" name="porcentaje_imp" <?php if (isset($empresa)) {
                                                                                                            echo "value='$empresa->porcentaje_imp'";
                                                                                                        } ?> class="form-control box-input" placeholder="%">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <h3>Moneda</h3><br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="simbolo_moneda">Símbolo</label>
                                                    <div class="input-group form-group">
                                                        <div class="form-line form-float">
                                                            <input type="text" name="simbolo_moneda" readonly <?php if (isset($empresa)) {
                                                                                                                    echo "value='$empresa->simbolo_moneda'";
                                                                                                                } ?> class="form-control box-input" placeholder="Símbolo">
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
                            <div role="tabpanel" class="tab-pane fade" id="settings_with_icon_title">
                                <div class="card">

                                    <div class="body">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <b>Categorías de Productos</b><br><br>
                                            </div>
                                            <div class="col-md-6 text-right">
                                                <button onclick="modal_addCategoria()" class="btn bg-blue waves-effect" type="button"><i class="material-icons">add</i><span>AGREGAR NUEVA</span></button>
                                            </div>
                                        </div>
                                        <div class="table-responsive" style="max-height: 500px; overflow-y: scroll">
                                            <table class="table table-bordered table-striped table-hover dataTable " cellspacing="0" width="100%" id="table_categorias">
                                                <thead>
                                                    <tr>
                                                        <th>Nombre</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Nombre</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>

                                    </div>
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

<!-- Modal Categoria-->
<div class="modal fade" id="modalCateg" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form_categorias">
                <div class="modal-header bg-blue">
                    <h4 class="modal-title" id="modalCategLabel">AGREGAR CATEGORÍA</h4>
                </div>
                <div class="modal-body">
                    <p>Ingrese la información de categoría</p>
                    <br>
                    <input name="id" id="categoria_id" value="0" hidden>
                    <div class="form-group form-float">
                        <div class="form-line ">
                            <input type="text" id="categoria_nombre" name="nombre" class="form-control box-input uppercase">
                            <label class="form-label">Nombre</label>
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

<script src="<?php echo base_url() ?>/js/ajustes/categorias.js"></script>
<script src="<?php echo base_url() ?>/js/ajustes/empresa.js"></script>