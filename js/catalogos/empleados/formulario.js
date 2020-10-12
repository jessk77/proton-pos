$(function () {
    $('#optgroup').multiSelect({ selectableOptgroup: true });
    $('.datepicker').bootstrapMaterialDatePicker({
        format: 'DD-MM-YYYY',
        lang : 'es-do',
        clearButton: true,
        cancelText: "Cancelar",
        clearText: "Limpiar",
        weekStart: 1,
        time: false
    });
    $('#form_empleado').validate({
        rules: {
            nombre: "required",
            usuario: "required",
            password: {
                required: true,
                minlength: 6
            },
            password_again: {
              equalTo: "#password"
            }
        },
        messages: {
            usuario: "Ingrese su nombre de usuario",
            password: "Ingrese su contraseña",
            fecha_nacimiento: "Ingrese fecha nacimiento",
            correo: "Ingrese correo electrónico",
            tel_movil: "Ingrese celular",
            nombre: "Ingrese un nombre de empleado",
            usuario: "Ingrese un nombre de usuario",
            password: {
                required: "Ingrese la contraseña de usuario",
                minlength: "La contraseña debe tener al menos 6 caracteres"
            },
            password_again: {
              equalTo: "Las contraseñas deben de coincidir"
            }
            

        },
        submitHandler: function (form) {
            if ( $( "#usuario_id" ).length ) {
                edicion(form);
            }
            else{
                registro(form);
            }

            return false; // required to block normal submit for ajax

         },
        highlight: function (input) {
            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function (input) {
            $(input).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.form-group').append(error);
        }
    });

    //password visble
    $(".toggle-password").click(function() {

      var input = $("#password");
      var icon=$(".icon-password");
      if (input.attr("type") == "password") {
        input.attr("type", "text");
        icon.html("visibility_off");
      } else {
        input.attr("type", "password");
        icon.html("visibility");
      }
    });
    
   
});


function registro(form){
    poolData = {
        UserPoolId: _config.cognito.userPoolId, // Your user pool id here
        ClientId: _config.cognito.clientId // Your client id here
    };
    var userPool = new AmazonCognitoIdentity.CognitoUserPool(poolData);
    var attributeList = [];

    var dataEmail = {
        Name: 'email',
        Value: $("#email").val(), //get from form field
    };
    var dataGivenlName = {
        Name: 'given_name',
        Value: $("#nombre").val(), //get from form field
    };
    var dataPhoneNumber = {
        Name : 'phone_number',
        Value : "+52"+$("#phone_number").val() // your phone number here with +country code and no delimiters in front
    };
    var dataBirthDate = {
        Name : 'birthdate',
        Value : $("#fecha_nacimiento").val() // your phone number here with +country code and no delimiters in front
    };

    var attributeEmail = new AmazonCognitoIdentity.CognitoUserAttribute(dataEmail);
    var attributeGivenlName = new AmazonCognitoIdentity.CognitoUserAttribute(dataGivenlName);
    var attributePhoneNumber = new AmazonCognitoIdentity.CognitoUserAttribute(dataPhoneNumber);
    var attributeBirthDate = new AmazonCognitoIdentity.CognitoUserAttribute(dataBirthDate);


    attributeList.push(attributeEmail);
    attributeList.push(attributeGivenlName);
    attributeList.push(attributePhoneNumber);
    attributeList.push(attributeBirthDate);

    userPool.signUp($("#username").val(), $("#password").val(), attributeList, null, function (err, result) {
        if (err) {
            alert(err.message || JSON.stringify(err));
            return;
        }
        cognitoUser = result.user;
        console.log('user name is ' + cognitoUser.getUsername());
        //change elements of page
        $.ajax({
            type: "POST",
            url: base_url+"index.php/Usuarios/submit",
            data: $(form).serialize(),
            success: function (result) {
               console.log(result);
               $("#btn_submit").attr("disabled",false);
               swal("Exito!", "Se ha creado el Usuario, este debe acceder a su propia sesión para ser activado", "success");
               setTimeout(function () { window.location.href = base_url+"index.php/Usuarios/" }, 1500);
            }
        });

    });
}



function edicion(form){
    $.ajax({
        type: "POST",
        url: base_url+"index.php/Usuarios/submit",
        data: $(form).serialize(),
        success: function (result) {
           console.log(result);
           $("#btn_submit").attr("disabled",false);
           swal("Exito!", "Se ha modificado el usuario", "success");
           setTimeout(function () { window.location.href = base_url+"index.php/Usuarios/" }, 1500);
        }
    });

    //let AWS = require('aws-sdk');
    
    //let cognitoISP = new AWS.CognitoIdentityServiceProvider({ region: _config.cognito.region });
    //AWS.config.credentials = new AWS.CognitoIdentityCredentials({
    //     IdentityPoolId: "us-west-2:9ed5eecd-1d1d-439c-9e3e-17ccc03546b2"
    // });
    // var cognitoidentityserviceprovider = new AWS.CognitoIdentityServiceProvider({region: _config.cognito.region,apiVersion: '2016-04-18'});

     //return new Promise((resolve, reject) => {
        // var params = {
        //     UserAttributes: [
        //         {
        //             Name: "email",     
        //             Value: $("#email").val() 
        //         },
        //         {
        //             Name: "given_name",     
        //             Value: $("#email").val() 
        //         },
        //         {
        //             Name: "phone_number",     
        //             Value: "+52"+$("#phone_number").val() 
        //         },
        //         {
        //             Name: "birthdate",     
        //             Value: $("#fecha_nacimiento").val() 
        //         }
        //     ],
        //     UserPoolId: _config.cognito.userPoolId,
        //     Username: $("#username").val()
        // };

        //cognitoISP.adminUpdateUserAttributes(params, (err, data) => err ? reject(err) : resolve(data));
        // cognitoidentityserviceprovider.adminUpdateUserAttributes(params, function(err,data){
        //     if (err) {
        //         alert(err.message || JSON.stringify(err));
        //         return;
        //     }
        //     else{
        //         swal("Exito!", "Se ha actualizado la información del usuario", "success");
        //     }
        // });
    //});
}

