$(function () {
    $('#form_validation').validate({
        rules: {
            codigo: "required",
            nombre: "required",
            precio: "required",
            precio_compra: "required",
            
        },
        messages: {
            codigo: "Ingrese un código",
            nombre: "Ingrese un nombre",
            precio: "Ingrese un precio",
            precio_compra: "Ingrese un precio",
            
        },
        submitHandler: function (form) {
             $.ajax({
                 type: "POST",
                 url: base_url+"index.php/catalogos/productos/submit",
                 data: $(form).serialize(),
                 beforeSend: function(){
                    $("#btn_submit").attr("disabled",true);
                 },
                 success: function (result) {
                    console.log(result);
                    $("#btn_submit").attr("disabled",false);
                    swal("Exito!", "Se ha realizado la operación correctamente", "success");
                    setTimeout(function () { window.location.href = base_url+"index.php/catalogos/productos/" }, 1500);
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

    $(".change-margen").on("change",function(){
        calcula_margen();
        
    });

    $("#margen").on("change",function(){
        var precio_c=+($("input[name='precio_compra']").val());
        var margen=+($("#margen").val());
        $("input[name='precio']").val((precio_c+(precio_c*(margen/100))).toFixed(2));
        
    });

    calcula_margen();
    
   
});


function calcula_margen(){
        var precio_c=$("input[name='precio_compra']").val();
        var precio_v=$("input[name='precio']").val();
        $("#margen").val((((precio_v-precio_c)/precio_c)*100).toFixed(2));
}