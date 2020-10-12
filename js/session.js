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
                        return;
                    }
                    //console.log(result[6].Value);
                    $.ajax({
                        type: "POST",
                        url: base_url+"index.php/inicio/refresh",
                        data: {
                            email : result[6].Value
                        }, 
                        success: function (result) {
                            
                        }
                    });
                    
                });		
                
            }
            else{
                document.location.href="/atomikpos";
            }
			
				
			
        });
    }
});