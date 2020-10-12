$(function () {
    $("input").on("change", function () {
        $('#error1').addClass("hidden");
        $('#error2').addClass("hidden");
    });

    $("#loader").hide();
    $("#success").hide();


    $('#sign_in').validate({
        messages: {
            usuario: "Ingrese su nombre de usuario",
            password: "Ingrese su contraseña",
            nombre: "Ingrese nombre completo",
            fecha_nacimiento: "Ingrese fecha nacimiento",
            correo: "Ingrese correo electrónico",
            celular: "Ingrese celular",

        },
        submitHandler: function (form) {


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
                Value : "+52"+$("#celular").val() // your phone number here with +country code and no delimiters in front
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
                    url: base_url + "index.php/Registro/register_user",
                    data: $(form).serialize(),
                    success: function (result) {
                        $("#div_signin").addClass("hidden");
                        $("#div_confirm").removeClass("hidden");
                        
                    }
                });

            });




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
});


function verificar(){
    if($("#codigo").val()!=""){
        cognitoUser.confirmRegistration($("#codigo").val(), true, function (err, result) {
            if (err) {
                alert(err);
                return;
            }
            if(result=="SUCCESS"){

                setTimeout(function () { $('#success').fadeIn(); }, 300);
                setTimeout(function () { document.location.href="/atomikpos"; }, 2000);
            }
        });
    }
    
}