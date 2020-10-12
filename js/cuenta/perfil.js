$(function () {

    $('#form_perfil').validate({
        rules: {
            nombre: "required",
            correo: "required"
            
        },
        messages: {
            nombre: "Ingrese un nombre de empleado",
            correo: "Ingrese un nombre de usuario"

        },
        submitHandler: function (form) {
             $.ajax({
                 type: "POST",
                 url: base_url+"index.php/Cuenta/submit",
                 data: $(form).serialize(),
                 beforeSend: function(){
                    $("#btn_submit").attr("disabled",true);
                 },
                 success: function (result) {
                    console.log(result);
                    $("#btn_submit").attr("disabled",false);
                    swal("Exito!", "Se han realizado los cambios correctamente", "success");
                    //setTimeout(function () { window.location.href = base_url+"index.php/Cuenta/submit/" }, 1500);
                 }
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

    $('#form_pass').validate({
        rules: {
            password_old: "required",
            password: {
                required: true,
                minlength: 6
            },
            password_again: {
              equalTo: "#password"
            }
        },
        messages: {
            password_old: "Ingrese su contraseña actual",
            password: {
                required: "Ingrese la contraseña de usuario",
                minlength: "La contraseña debe tener al menos 6 caracteres"
            },
            password_again: {
              equalTo: "Las contraseñas deben de coincidir"
            }
            

        },
        submitHandler: function (form) {
             $.ajax({
                 type: "POST",
                 url: base_url+"index.php/Cuenta/change_pass",
                 data: $(form).serialize(),
                 beforeSend: function(){
                    $("#btn_submit").attr("disabled",true);
                 },
                 success: function (result) {
                    console.log(result);
                    $("#btn_submit").attr("disabled",false);
                    if(result==1){
                        swal("Exito!", "Se han realizado los cambios correctamente", "success");
                        $("#form_pass").find("input").val('');
                    }
                    else{
                        swal("Error!", "Contraseña incorrecta", "error");
                    }
                    
                    
                    //setTimeout(function () { window.location.href = base_url+"index.php/catalogos/empleados/" }, 1500);
                 }
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