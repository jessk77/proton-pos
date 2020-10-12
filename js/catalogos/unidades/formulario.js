$(function () {
    $('#optgroup').multiSelect({ selectableOptgroup: true });
    $('.datepicker').bootstrapMaterialDatePicker({
        format: 'YYYY-MM-DD',
        lang : 'es-do',
        clearButton: true,
        cancelText: "Cancelar",
        clearText: "Limpiar",
        weekStart: 1,
        time: false
    });
    $('#form_validation').validate({
        rules: {
            alias: "required",
            
        },
        messages: {
            alias: "Ingrese un alias",
            
        },
        submitHandler: function (form) {
             $.ajax({
                 type: "POST",
                 url: base_url+"index.php/catalogos/unidades/submit",
                 data: $(form).serialize(),
                 beforeSend: function(){
                    $("#btn_submit").attr("disabled",true);
                 },
                 success: function (result) {
                    console.log(result);
                    $("#btn_submit").attr("disabled",false);
                    swal("Exito!", "Se ha realizado la operación correctamente", "success");
                    setTimeout(function () { window.location.href = base_url+"index.php/catalogos/unidades/" }, 1500);
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

    
    
   
});