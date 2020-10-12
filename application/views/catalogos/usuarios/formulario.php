<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                ALTA DE USUARIO
                <small>Por favor llene los siguientes campos</a></small>
            </h2>
        </div>
        <!-- Basic Validation -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <form id="form_empleado" method="POST">
                    <?php
                    if (isset($empleado)) {
                        echo "<input name='id' id='usuario_id' value='$empleado->id' hidden>";
                    }
                    ?>
                    <div class="card">
                        <div class="header">
                            <h2>Datos de Generales</h2>
                        </div>
                        <div class="body">

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" id="nombre" class="form-control uppercase" name="nombre" <?php if (isset($empleado)) {
                                                                                                                echo "value='$empleado->nombre'";
                                                                                                            } ?>>
                                            <label class="form-label">Nombre</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control " <?php if (isset($empleado)) {
                                                                                                                echo "value='$empleado->fecha_nacimiento'";
                                                                                                            } ?>>
                                            <label class="form-label">Fecha de Nacimiento</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" id="phone_number" name="tel_movil" class="form-control" <?php if (isset($empleado)) {
                                                                                                            echo "value='$empleado->tel_movil'";
                                                                                                        } ?>>
                                            <label class="form-label">Teléfono Celular</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" id="email" name="correo" class="form-control" <?php if (isset($empleado)) {
                                                                                                        echo "value='$empleado->correo'";
                                                                                                    } ?>>
                                            <label class="form-label">Correo Electrónico</label>
                                        </div>
                                    </div>
                                </div>                                                                      

                            </div>
                            
                        </div>
                    </div>





                    <!-- <div class="card">
                <div class="header">
                    <h2>Datos laborales</h2>
                </div>
                <div class="body">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <select name="area" class="form-control show-tick">
                                        <option value="">Seleccione un área</option>
                                        <option <?php //if (isset($empleado) && $empleado->area == "ADMINISTRACION") {
                                                    //echo "selected";
                                               // } ?>>ADMINISTRACION</option>
                                    </select>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="fecha_ingreso" class="form-control datepicker">
                                    <label class="form-label">Fecha de ingreso</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="sueldo" class="form-control" <?php if (isset($empleado)) {
                                                                                                echo "value='$empleado->sueldo'";
                                                                                            } ?>>
                                    <label class="form-label">Sueldo</label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div> -->
                    <div class="card">
                        <div class="header">
                            <h2>Acceso</h2>
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" id="username" name="usuario" class="form-control" <?php if (isset($empleado)) {
                                                                                                        echo "value='$empleado->usuario'";
                                                                                                    } ?>>
                                            <label class="form-label">Usuario</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="password" id="password" name="password" class="form-control" <?php if (isset($empleado)) {
                                                                                                                            echo "value='$empleado->password'";
                                                                                                                        } ?>>
                                            <label class="form-label">Password</label>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn waves-teal btn-circle waves-effect waves-circle waves-float toggle-password">
                                        <i class="material-icons icon-password">visibility</i>
                                    </button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="password" name="password_again" class="form-control" <?php if (isset($empleado)) {
                                                                                                                    echo "value='$empleado->password'";
                                                                                                                } ?>>
                                            <label class="form-label">Verificar Password</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p>Permisos: <br><br></p>
                            <?php
                            $temp = array();
                            if (isset($permisos)) {
                                foreach ($permisos as $p) {
                                    array_push($temp, $p->submenu_id);
                                }
                            }

                            ?>
                            <select id="optgroup" class="ms" name="permisos[]" multiple="multiple">
                                    <option value="1" <?php if (in_array(1, $temp)) {
                                                            echo "selected";
                                                        } ?>>Catálogos</option>
                                    <option value="2" <?php if (in_array(2, $temp)) {
                                                            echo "selected";
                                                        } ?>>Inventario</option>
                                    <option value="3" <?php if (in_array(3, $temp)) {
                                                            echo "selected";
                                                        } ?>>Gastos</option>
                                    <option value="4" <?php if (in_array(4, $temp)) {
                                                            echo "selected";
                                                        } ?>>Ventas</option>
                                    <option value="5" <?php if (in_array(5, $temp)) {
                                                            echo "selected";
                                                        } ?>>Análisis de Datos</option>
                                    <option value="6" <?php if (in_array(6, $temp)) {
                                                            echo "selected";
                                                        } ?>>Ajustes</option>

                            </select>
                            <br>
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

<script src="<?php echo base_url() ?>/js/catalogos/empleados/formulario.js"></script>