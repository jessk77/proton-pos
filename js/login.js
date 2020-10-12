
var poolData = {
    UserPoolId : _config.cognito.userPoolId, // Your user pool id here
    ClientId : _config.cognito.clientId, // Your client id here
};

var userPool = new AmazonCognitoIdentity.CognitoUserPool(poolData);

$(function () {

    var cognitoUser = userPool.getCurrentUser();
    if (cognitoUser != null) {
        cognitoUser.getSession(function(err, session) {
            if (err) {
                alert(err);
                return;
            }
            console.log('session validity: ' + session.isValid());
            if(session.isValid()){
                cognitoUser.getUserAttributes(function(err, result) {
                    if (err) {
                        console.log(err);
                        
                        if(err.code=="InvalidParameterException"){
                            alert("Contraseña debe tener una Máyuscula, Número y longitud mayor o igual a 8");
                        }
                        if(err.code=="CodeMismatchException"){
                            alert("El código es incorrecto");
                        }
                        return;
                    }
                    //console.log(result[6].Value);
                    $.ajax({
                        type: "POST",
                        url: base_url+"index.php/Inicio/refresh",
                        data: {
                            email : result[6].Value
                        }, 
                        success: function (result) {
                            location.reload();
                        }
                    });
                    
                });		
                
            }
			
				
			
        });
    }

    $("input").on("change",function(){
        $('#error1').addClass("hidden");
        $('#error2').addClass("hidden");
    });

	$("#loader").hide();
	$("#success").hide();
   

	$('#sign_in').validate({
        rules: {
            usuario: "required",
            
        },
        messages: {
            usuario: "Ingrese su nombre de usuario",
            password: "Ingrese su contraseña"
            
        },
        submitHandler: function (form) {

            
            var authenticationData = {
                Username : document.getElementById("inputUsername").value,
                Password : document.getElementById("inputPassword").value,
            };
            
            var authenticationDetails = new AmazonCognitoIdentity.AuthenticationDetails(authenticationData);
            
            var userData = {
                Username : document.getElementById("inputUsername").value,
                Pool : userPool,
            };
            
            var cognitoUser = new AmazonCognitoIdentity.CognitoUser(userData);
            
            cognitoUser.authenticateUser(authenticationDetails, {
                onSuccess: function (result) {
                    var accessToken = result.getAccessToken().getJwtToken();
                    //console.log(accessToken);	
                    $.ajax({
                        type: "POST",
                        url: base_url+"index.php/inicio/login",
                        data: {
                            usuario : document.getElementById("inputUsername").value,
                            token: accessToken
                        }, 
                        beforeSend: function(){
                           $("#loader").show();
                           $('#success').hide();
                           $('#error').hide();
                        },
                        success: function (result) {
                           console.log(result);
                           setTimeout(function () { $('#loader').fadeOut(); }, 50);
                           setTimeout(function () { $('#success').fadeIn(); }, 300);
                           setTimeout(function () { location.reload(); }, 2000);
                           
                           
                        }
                    });
                },
                onFailure: function(err) {   
                    //UserNotConfirmedException
                    if(err.code==="UserNotFoundException"){
                        $('#error1').removeClass("hidden");
                    }

                    if(err.code==="NotAuthorizedException"){
                        $('#error2').removeClass("hidden");
                    }
                    if(err.code==="UserNotConfirmedException"){
                        cognitoUser.resendConfirmationCode(function(err, result) {
                            if (err) {
                                alert(err);
                                return;
                               }
                               
                               console.log(result);
                               
                        });
                        $("#div_signin").addClass("hidden");
                                $("#div_confirm").removeClass("hidden");
                        
                    }
                    if(err.code=="PasswordResetRequiredException"){
                        forgotPassword();
                    }
                    console.log(err.message || JSON.stringify(err));
                },
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
    var userData = {
        Username : document.getElementById("inputUsername").value,
        Pool : userPool,
    };
    
    var cognitoUser = new AmazonCognitoIdentity.CognitoUser(userData);

    console.log("wtf");
    if($("#codigo").val()!=""){
        cognitoUser.confirmRegistration($("#codigo").val(), true, function (err, result) {
            if (err) {
                alert(err);
                return;
            }
            if(result=="SUCCESS"){

                setTimeout(function () { $('#success').fadeIn(); }, 300);
                setTimeout(function () { location.reload(); }, 2000);
            }
        });
    }
    
}


function forgotPassword(){

	
    var userData = {
        Username : document.getElementById("inputUsername").value,
        Pool : userPool,
    };
	
    var cognitoUser = new AmazonCognitoIdentity.CognitoUser(userData);
		
    cognitoUser.forgotPassword({
        onSuccess: function (result) {
            console.log('call result: ' + result);
        },
        onFailure: function(err) {
            alert(err);
			console.log(err);
        },
        inputVerificationCode() {
            var verificationCode = prompt('Se ha enviado un código de verificación para restablecer su contraseña, Ingreselo por favor' ,'');
            var newPassword = prompt('Ingrese nueva contraseña ' ,'');
            cognitoUser.confirmPassword(verificationCode, newPassword, this);
            //setTimeout(function () { $('#success').fadeIn(); }, 300);
                //setTimeout(function () { location.reload(); }, 2000);
        }
    });
}