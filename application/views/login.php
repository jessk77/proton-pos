<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Protón | Punto de Venta</title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo base_url(); ?>images/launch.png" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url(); ?>plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url(); ?>plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url(); ?>plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
    <script>
        var base_url = "<?php echo base_url(); ?>";
    </script>
</head>

<body class="bg-white col-black">
    <div class="row">
        <div class="col-md-6 ">
            <div style="margin-right: 25%; margin-left: 25%">
                <h2 class="m-t-100 col-indigo">Protón POS</h2>
                <h4 class=" m-t-20 m-b-40">Inicio de Sesión</h4>
                <form id="sign_in" method="POST">
                    <!-- <img src="<?php echo base_url(); ?>images/launch.png" width="90%"  /> -->

                    <div id="div_signin">
                        <div class="form-group input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">person</i>
                            </span>
                            <div class="form-line">
                                <input type="text" class="form-control" name="usuario" id="inputUsername" placeholder="Nombre de Usuario" required autofocus>
                            </div>
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">lock</i>
                            </span>
                            <div class="form-line">
                                <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Contraseña" required>
                            </div>
                        </div>
                        <p class="text-right"><a onclick="forgotPassword()">¿Olvidaste tu contraseña?</a></p>
                        <div class="row">

                            <div class="col-xs-12">
                                <button class="btn btn-lg btn-block bg-blue waves-effect" type="submit">INICIAR SESIÓN</button>
                            </div>
                        </div>
                        <br>
                        <p class="text-center">¿No tienes una cuenta? <a href="<?php echo base_url(); ?>index.php/Registro">Registrate</a></p>
                </form>
            </div>
            <div id="div_confirm" class="hidden">
                <p class="text-center">Su usuario no está verificado, se ha enviado un email de confirmación, por favor ingrese el código de verificación</p>
                <div class="form-group input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">lock</i>
                            </span>
                            <div class="form-line">
                                <input type="text" class="form-control" name="codigo" id="codigo" placeholder="Código de Verificación" required>
                            </div>
                        </div>
                        <button class="btn btn-lg btn-block bg-blue waves-effect" type="button" onclick="verificar()">VERIFICAR</button>
                </div>
            <div class="text-center" id="loader">
                <div class="lds-ripple">
                    <div></div>
                    <div></div>
                </div>
            </div>
            <br>
            <div class="alert bg-light-green" id="success">
                <strong>Acceso Correcto!</strong> Será redirigido al sistema
            </div>

            <div class="alert bg-pink hidden" id="error1">
                <strong>Error!</strong> El Usuario no existe
            </div>
            <div class="alert bg-pink hidden" id="error2">
                <strong>Error!</strong> La contraseña es incorrecta
            </div>
        </div>
    </div>
    <div class="col-md-6" style="background-image: url('./images/login_ling.png'); height:770px;">
        <div>

        </div>
    </div>
    </div>



    <!-- Jquery Core Js -->
    <script src="<?php echo base_url(); ?>plugins/jquery/jquery.min.js"></script>

    <script src="https://sdk.amazonaws.com/js/aws-sdk-2.562.0.min.js"></script>
    <script src="<?php echo base_url(); ?>plugins/cognito/amazon-cognito-identity.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url(); ?>plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url(); ?>plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="<?php echo base_url(); ?>plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url(); ?>js/cognito_config.js"></script>
    <script src="<?php echo base_url(); ?>js/login.js"></script>
</body>

</html>