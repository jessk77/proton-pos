$(function () {
    var options = {

        url: function (phrase) {
            return base_url+"index.php/Inventario/getProducts/"+phrase;
        },
        ajaxSettings: {
            dataType: "json"
        },
    
        listLocation: "data",
        autoFocus: true,
        requestDelay: 300,
        getValue: function(element) {
            return element.codigo;
        },

        template: {
            type: "custom",
            method: function (value, item) {
                return '<div>\
                            <h5 class="col-indigo">'+ item.codigo + '</h5>\
                            <p class="m-t--10">'+ item.nombre + '</p>\
                        </div>';
            }
        },
        list: {
            onChooseEvent: function() {
                change_producto();
            }
        }
    };

    $("#autocomplete1").easyAutocomplete(options);

    var validator=$('#form_agregar').validate({
        rules: {
            cantidad: "required",
            costo: "required",
            
        },
        messages: {
            cantidad: "Ingrese una cantidad",
            costo: "Ingrese un costo",
            
        },
        submitHandler: function (form) {
            var data=$(form).serialize();
             $.ajax({
                 type: "POST",
                 url: base_url+"index.php/Inventario/agregar",
                 data: data,
                 beforeSend: function(){
                    $("#btn_submit").attr("disabled",true);
                 },
                 success: function (result) {
                    console.log(result);
                    $("#btn_submit").attr("disabled",false);
                    swal("Exito!", "Se ha realizado la operación correctamente", "success");
                    $('#form_agregar').find("input").val("");
                    $("#stocklb1").text("");
                    validator.resetForm();

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



function change_producto(){
    
    var id=$("#autocomplete1").getSelectedItemData().id;
    var stock=$("#autocomplete1").getSelectedItemData().stock;
    $("#stocklb1").text(stock);
    $("#stock1").val(stock);
    $("#id_producto").val(id);
}



