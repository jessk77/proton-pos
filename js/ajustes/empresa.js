$(function () {

    $('#form_empresa').validate({
        rules: {
            nombre: "required",
        },
        messages: {
            nombre: "Ingrese el Nombre",

        },
        submitHandler: function () {


            var form = $('#form_empresa'),
                formData = new FormData();
            formParams = form.serializeArray();

            $.each(form.find('input[type="file"]'), function (i, tag) {
                $.each($(tag)[0].files, function (i, file) {
                    formData.append(tag.name, file);
                });
            });

            $.each(formParams, function (i, val) {
                formData.append(val.name, val.value);
            });

            


            $.ajax({
                type: "POST",
                url: base_url + "index.php/ajustes/submit_empresa",
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function () {
                    $("#btn_submit").attr("disabled", true);
                },
                success: function (result) {
                    console.log(result);
                    $("#btn_submit").attr("disabled", false);
                    swal("Exito!", "Se ha realizado la operación correctamente", "success");
                    var iframe = document.getElementById('frame_ticket');
                    iframe.src = iframe.src;

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

    $('#form_ticket').validate({
        rules: {
            tk_encabezado: "required"
        },
        messages: {
            tk_encabezado: "campo requerido"
        },
        submitHandler: function (form) {


            $.ajax({
                type: "POST",
                url: base_url + "index.php/ajustes/submit_empresa",
                data: $(form).serialize(),
                beforeSend: function () {
                    $("#btn_submit").attr("disabled", true);
                },
                success: function (result) {
                    console.log(result);
                    $("#btn_submit").attr("disabled", false);
                    swal("Exito!", "Se ha realizado la operación correctamente", "success");


                    var iframe = document.getElementById('frame_ticket');
                    iframe.src = iframe.src;


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

    $('#form_moneda').validate({
        rules: {
            tasa_imp: "required",
            porcentaje_imp: "required",
            simbolo_moneda: "required"
        },
        messages: {
            tasa_imp: "campo requerido",
            porcentaje_imp: "campo requerido",
            simbolo_moneda: "campo requerido",
        },
        submitHandler: function (form) {


            $.ajax({
                type: "POST",
                url: base_url + "index.php/ajustes/submit_empresa",
                data: $(form).serialize(),
                beforeSend: function () {
                    $("#btn_submit").attr("disabled", true);
                },
                success: function (result) {
                    console.log(result);
                    $("#btn_submit").attr("disabled", false);
                    swal("Exito!", "Se ha realizado la operación correctamente", "success");


                    


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

var loadFile = function (event) {
    var output = document.getElementById('img_container');
    output.src = URL.createObjectURL(event.target.files[0]);
};


