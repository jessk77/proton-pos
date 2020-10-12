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
                                    Configuración de la Cuenta
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
                                    <i class="material-icons">home</i> GENERAL
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#profile_with_icon_title" data-toggle="tab">
                                    <i class="material-icons">edit</i> EDITAR PERFIL
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#messages_with_icon_title" data-toggle="tab">
                                    <i class="material-icons">lock</i> CONTRASEÑA
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#settings_with_icon_title" data-toggle="tab">
                                    <i class="material-icons">credit_card</i> SUBSCRIPCIÓN
                                </a>
                            </li>

                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="home_with_icon_title">
                                <div class="card">

                                    <div class="body">
                                        <h3>Información general de la Cuenta</h3><br>
                                        <table class="table table-hover font-15">
                                            <tr>
                                                <td>Nombre de Usuario</td>
                                                <th><?php echo $usuario->usuario;?></th>
                                            </tr>
                                            <tr>
                                                <td>Correo Electrónico</td>
                                                <th><?php echo $usuario->correo;?></th>
                                            </tr>
                                            <tr>
                                                <td>Fecha de Nacimiento</td>
                                                <th><?php echo $usuario->fecha_nacimiento;?></th>
                                            </tr>
                                            <tr>
                                                <td>País</td>
                                                <th><?php echo $usuario->pais;?></th>
                                            </tr>
                                        </table>
                                        <h3>Subscripción</h3><br>
                                        <table class="table table-hover font-15">
                                            <tr>
                                                <td>Tipo de Subscripción</td>
                                                <th><?php echo $usuario->plan;?></th>
                                            </tr>
                                            <tr>
                                                <td>Fecha de Finalización</td>
                                                <th><?php echo $usuario->fecha_plan;?></th>
                                            </tr>

                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="profile_with_icon_title">
                                <div class="card">

                                    <div class="body">
                                        <h3>Editar Perfil</h3><br>
                                        <form id="form_perfil" method="POST">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control uppercase" name="nombre" <?php if (isset($usuario)) {
                                                                                                                        echo "value='$usuario->nombre'";
                                                                                                                    } ?>>
                                                    <label class="form-label">Nombre</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="date" name="fecha_nacimiento" class="form-control datepicker" <?php if (isset($usuario)) {
                                                                                                                        echo "value='$usuario->fecha_nacimiento'";
                                                                                                                    } ?>>
                                                            <label class="form-label">Fecha de Nacimiento</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group form-float">
                                                        <input type="radio" name="genero" id="male" value="Hombre" checked class="with-gap">
                                                        <label for="male">Hombre</label>

                                                        <input type="radio" name="genero" id="female" value="Mujer" <?php if (isset($usuario) && $usuario->genero == "Mujer") {
                                                                                                                        echo "checked";
                                                                                                                    } ?> class="with-gap">
                                                        <label for="female" class="m-l-20">Mujer</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text" name="tel_movil" class="form-control" <?php if (isset($usuario)) {
                                                                                                                            echo "value='$usuario->tel_movil'";
                                                                                                                        } ?>>
                                                            <label class="form-label">Teléfono Movil</label>
                                                        </div>
                                                    </div>
                                                </div>

                                               
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text" name="correo" class="form-control" <?php if (isset($usuario)) {
                                                                                                                        echo "value='$usuario->correo'";
                                                                                                                    } ?>>
                                                            <label class="form-label">Correo Electrónico</label>
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
                                    <form id="form_pass" method="POST">
                                        <h3>Editar Contraseña</h3><br>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="password" name="password_old" class="form-control" >
                                                        <label class="form-label">Contraseña actual</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="password" id="password" name="password" class="form-control">
                                                        <label class="form-label">Nueva contraseña</label>
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
                                            <div class="col-md-5">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="password" name="password_again" class="form-control" >
                                                        <label class="form-label">Repetir nueva contraseña</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 text-center">
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
                                        <h3>Subscripción</h3><br>
                                        <div class="row">

                                            <div class="col-md-6 col-xs-12 col-sm-12">
                                                <div class="card">
                                                    <div class="header bg-indigo">
                                                        <h2>
                                                            FREE <small>Plan Gratuito</small>
                                                        </h2>

                                                    </div>
                                                    <div class="body text-center">
                                                        Ayudanos a mantener el plan gratuito, te invitamos a realizar una donación para mantener los costos de operación.
                                                        <br><br>
                                                        <img src="<?php echo base_url(); ?>images/PP_logo.png" alt="Paypal" />
                                                        <br><br>
                                                        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                                                            <input type="hidden" name="cmd" value="_s-xclick" />
                                                            <input type="hidden" name="hosted_button_id" value="ZK8NUBQ3UUKBY" />
                                                            <input type="image" src="https://www.paypalobjects.com/es_XC/MX/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donar con el botón PayPal" />
                                                            <img alt="" border="0" src="https://www.paypal.com/es_MX/i/scr/pixel.gif" width="1" height="1" />
                                                        </form>
                                                        <br><br>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xs-12 col-sm-12 text-center">
                                                <h4>Escala tu subscripción al</h4>
                                                <h2>Plan <span class="col-indigo">BASICO</span></h2>
                                                <br><br>
                                                <div class="row">
                                                    <div class="col-md-12 text-center">
                                                        <button style="width: 200px" id="btn_submit" class="btn bg-blue waves-effect" type="submit"><i class="material-icons">touch_app</i><span>CAMBIAR PLAN</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">

                                            <div class="col-md-6 col-xs-12 col-sm-12">
                                                <div class="card">
                                                    <div class="header bg-indigo">
                                                        <h2>
                                                            BASICO <small>Plan basico</small>
                                                        </h2>

                                                    </div>
                                                    <div class="body text-center">
                                                        Gracias por contratar el plan basico, la información de de tu plan es la siguiente.
                                                        <br><br>
                                                        Fecha de Vencimiento: 
                                                        <br><br>
                                                        
                                                        <br><br>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xs-12 col-sm-12 text-center">
                                                <h4>Proximamente</h4>
                                                <h2>Plan <span class="col-indigo">PRO</span></h2>
                                                <br>
                                                Facturación electrónica 3.3<br><small>Disponibilidad solo en México</small>
                                            </div>
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

<script src="<?php echo base_url() ?>/js/cuenta/perfil.js"></script>