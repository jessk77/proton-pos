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
        <div class="col-md-12 ">
            <div class="text-center">

               
                    <!-- <img src="<?php echo base_url(); ?>images/launch.png" width="90%"  /> -->
                    <h1 class="m-t-100 col-indigo">Protón POS</h1>
                    <h3 class=" m-t-20 m-b-40">Se ha cerrado la sesión</h3>
                    <hr>
                    <img class="m-l-50" src="<?php echo base_url(); ?>images/4V0f.gif"   />
                
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
    <script>
    var data = { 
		UserPoolId : _config.cognito.userPoolId,
        ClientId : _config.cognito.clientId
    };
    var userPool = new AmazonCognitoIdentity.CognitoUserPool(data);
    var cognitoUser = userPool.getCurrentUser();

    $(function () {
        setTimeout(function () { 
            if (cognitoUser != null) {
                cognitoUser.signOut();	  
            }
            document.location.href="/atomikpos";
        }, 2000);
    });

    
    </script>
</body>

</html>