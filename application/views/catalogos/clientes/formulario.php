<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    ALTA DE CLIENTE
                    <small>Por favor llene los siguientes campos</a></small>
                </h2>
            </div>
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <form id="form_validation" method="POST">
                        <?php 
                            if(isset($cliente)){
                                echo "<input name='id' value='$cliente->id' hidden>";
                            }
                        ?>
                    <div class="card">
                        <div class="header">
                            <h2>Datos de Contacto</h2>
                        </div>
                        <div class="body">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control uppercase" name="contacto" required <?php if(isset($cliente)){echo "value='$cliente->contacto'";} ?>>
                                        <label class="form-label">Nombre de Contacto</label>
                                    </div>
                                </div>
                               <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="tel_movil" class="form-control" <?php if(isset($cliente)){echo "value='$cliente->tel_movil'";} ?>>
                                                <label class="form-label">Teléfono Movil</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="correo" class="form-control" <?php if(isset($cliente)){echo "value='$cliente->correo'";} ?>>
                                                <label class="form-label">Correo Electrónico</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p>Dirección: <br><br></p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="calle" class="form-control uppercase" <?php if(isset($cliente)){echo "value='$cliente->calle'";} ?>>
                                                <label class="form-label">Calle</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="no_ext" class="form-control" <?php if(isset($cliente)){echo "value='$cliente->no_ext'";} ?>>
                                                <label class="form-label">No.Ext</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="no_int" class="form-control" <?php if(isset($cliente)){echo "value='$cliente->no_int'";} ?>>
                                                <label class="form-label">No.Int</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="colonia" class="form-control uppercase" <?php if(isset($cliente)){echo "value='$cliente->colonia'";} ?>>
                                                <label class="form-label">Colonia</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="municipio" class="form-control uppercase" <?php if(isset($cliente)){echo "value='$cliente->municipio'";} ?>>
                                                <label class="form-label">Delegación o Municipio</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="estado" class="form-control uppercase" <?php if(isset($cliente)){echo "value='$cliente->estado'";} ?>>
                                                <label class="form-label">Estado</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="cp" class="form-control" <?php if(isset($cliente)){echo "value='$cliente->cp'";} ?>>
                                                <label class="form-label">Código Postal</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            
                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2>Datos fiscales</h2>
                        </div>
                        <div class="body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                 <input type="text" class="form-control uppercase" name="razon_social" required <?php if(isset($cliente)){echo "value='$cliente->razon_social'";} ?>>
                                                <label class="form-label">Razón social  </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="rfc" class="form-control uppercase" <?php if(isset($cliente)){echo "value='$cliente->rfc'";} ?>>
                                                <label class="form-label">RFC</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p>Dirección: <br><br></p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="calle_f" class="form-control uppercase" <?php if(isset($cliente)){echo "value='$cliente->calle_f'";} ?>>
                                                <label class="form-label">Calle</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="no_ext_f" class="form-control" <?php if(isset($cliente)){echo "value='$cliente->no_ext_f'";} ?>>
                                                <label class="form-label">No.Ext</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="no_int_f" class="form-control" <?php if(isset($cliente)){echo "value='$cliente->no_int_f'";} ?>>
                                                <label class="form-label">No.Int</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="colonia_f" class="form-control uppercase" <?php if(isset($cliente)){echo "value='$cliente->colonia_f'";} ?>>
                                                <label class="form-label">Colonia</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="municipio_f" class="form-control uppercase" <?php if(isset($cliente)){echo "value='$cliente->municipio_f'";} ?>>
                                                <label class="form-label">Delegación o Municipio</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="estado_f" class="form-control uppercase" <?php if(isset($cliente)){echo "value='$cliente->estado'";} ?>>
                                                <label class="form-label">Estado</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="cp_f" class="form-control" <?php if(isset($cliente)){echo "value='$cliente->cp_f'";} ?>>
                                                <label class="form-label">Código Postal</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <button style="width: 200px" id="btn_submit" class="btn bg-blue waves-effect" type="submit"><i class="material-icons">save</i>
                                        <span>GUARDAR</span></button>
                        </div>
                    </div>
                    
                    </form>
                    <br><br>
                </div>
            </div>
            <!-- #END# Basic Validation -->
        </div>
    </section>

    <script src="<?php echo base_url()?>/js/catalogos/clientes/formulario.js"></script>