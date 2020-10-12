<section class="content">
    <div class="container-fluid">
        <!-- <div class="block-header">
                <h2>
                    ALTA DE PRODUCTO
                    <small>Por favor llene los siguientes campos</a></small>
                </h2>
            </div> -->
        <!-- Basic Validation -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <form id="form_validation" method="POST">
                    <?php
                    if (isset($producto)) {
                        echo "<input name='id' value='$producto->id' hidden>";
                    }
                    ?>
                    <div class="card">
                        <div class="header bg-indigo">
                            <h2> <?php if (isset($producto)) {
                                        echo "Edición";
                                    } else {
                                        echo "Alta";
                                    }
                                    ?> de producto</h2>
                            <small>Por favor llene los siguientes campos</a></small>
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="input-group form-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">graphic_eq</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" name="codigo" class="form-control box-input" <?php if (isset($producto)) {
                                                                                                        echo "value='$producto->codigo'";
                                                                                                    } ?> placeholder="Código">
                                        </div>
                                    </div>
                                </div>

                               
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line ">
                                            <input type="text" name="nombre" <?php if (isset($producto)) {
                                                                                    echo "value='$producto->nombre'";
                                                                                } ?> class="form-control box-input uppercase">
                                            <label class="form-label">Nombre</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line ">
                                        <select name="categoria" class="box-input form-control show-tick">
                                                <option value="">Seleccione Categoria</option>
                                                <?php
                                                    foreach($categorias as $c){
                                                        echo "<option value='$c->id'>$c->nombre</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select name="unidad" class="box-input form-control show-tick">
                                                <option value="">Seleccione unidad</option>
                                                <option <?php if (isset($producto) && $producto->unidad == "Piezas") {
                                                            echo "selected";
                                                        } ?>>Piezas</option>
                                                <option <?php if (isset($producto) && $producto->unidad == "Bultos") {
                                                            echo "selected";
                                                        } ?>>Bultos</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-indigo " ><p class="text-light text-center">STOCK</p></div><br>
                            <div class="row">
                            <div class="col-md-6">
                                    <label for="stock">Stock</label>
                                    <div class="input-group form-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">storage</i>
                                        </span>
                                        <div class="form-line form-float">
                                            <input type="text" name="stock" <?php if (isset($producto)) {
                                                                                        echo "value='$producto->stock'";
                                                                                    } ?> class="form-control box-input" placeholder="Precio de compra">
                                        </div>
                                    </div>
                                </div>
                                
                            </div>

                            <div class="row">
                            <div class="col-md-6">
                                    <label for="stock_minimo">Stock mínimo</label>
                                    <div class="input-group form-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">storage</i>
                                        </span>
                                        <div class="form-line form-float">
                                            <input type="text" name="stock_minimo" <?php if (isset($producto)) {
                                                                                        echo "value='$producto->stock_minimo'";
                                                                                    } ?> class="form-control box-input" placeholder="Precio de compra">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="stock_maximo">Stock máximo</label>
                                    <div class="input-group form-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">storage</i>
                                        </span>
                                        <div class="form-line form-float">
                                            <input type="text" name="stock_maximo" <?php if (isset($producto)) {
                                                                                        echo "value='$producto->stock_maximo'";
                                                                                    } ?> class="form-control box-input" placeholder="Precio de compra">
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="bg-indigo " ><p class="text-light text-center">PRECIOS</p></div><br>                                                           
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="precio_compra">Precio de compra</label>
                                    <div class="input-group form-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">attach_money</i>
                                        </span>
                                        <div class="form-line form-float">
                                            <input type="text" name="precio_compra" <?php if (isset($producto)) {
                                                                                        echo "value='$producto->precio_compra'";
                                                                                    } ?> class="form-control change-margen box-input" placeholder="Precio de compra">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 m-t-20 text-left">
                                    <input type="checkbox" id="check_imp" value="1" name="impuestos" class="filled-in chk-col-blue" <?php if (isset($producto) && $producto->impuestos) {
                                                                                        echo "checked";
                                                                                    } ?>>
                                    <label for="check_imp">Los precios incluyen impuestos</label>
                                   
                                </div>
                               
                            </div>

                            
                            <div class="row">
                            <div class="col-md-6">
                                    <label for="precio">Precio de venta</label>
                                    <div class="input-group form-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">attach_money</i>
                                        </span>
                                        <div class="form-line form-float">
                                            <input type="text" class="form-control change-margen box-input" <?php if (isset($producto)) {
                                                                                        echo "value='$producto->precio'";
                                                                                    } ?> name="precio" placeholder="Precio de venta">
                                        </div>
                                    </div>
                                </div>
                            <div class="col-md-6">
                                    <label for="margen">Margen</label>
                                    <div class="input-group form-group">
                                        <span class="input-group-addon">
                                            %
                                        </span>
                                        <div class="form-line form-float">
                                            <input type="text" class="form-control box-input" id="margen" placeholder="Margen">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="precio_mayoreo">Precio de mayoreo</label>
                                    <div class="input-group form-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">attach_money</i>
                                        </span>
                                        <div class="form-line form-float">
                                            <input type="text" name="precio_mayoreo" <?php if (isset($producto)) {
                                                                                        echo "value='$producto->precio_mayoreo'";
                                                                                    } ?> class="form-control box-input" placeholder="Precio de mayoreo">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="piezas_mayoreo">A partir de </label>
                                    <div class="input-group form-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">call_made</i>
                                        </span>
                                        <div class="form-line form-float">
                                            <input type="text" class="form-control box-input" <?php if (isset($producto)) {
                                                                                        echo "value='$producto->piezas_mayoreo'";
                                                                                    } ?> name="piezas_mayoreo" placeholder="No. de piezas">
                                        </div>
                                    </div>
                                </div>
                            </div>                                                       
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <textarea rows="2" name="observaciones" class="form-control no-resize" placeholder="Observaciones"><?php if (isset($producto)) {
                                                                                                                                                    echo "$producto->observaciones";
                                                                                                                                                } ?></textarea>
                                        </div>
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

                </form>
                <br><br>
            </div>
        </div>
        <!-- #END# Basic Validation -->
    </div>
</section>

<script src="<?php echo base_url() ?>/js/catalogos/productos/formulario.js"></script>