$(function () {
    var options = {

        url: function (phrase) {
            return base_url+"index.php/Inventario/getProducts/"+phrase;
        },
        adjustWidth: false,
        ajaxSettings: {
            dataType: "json"
        },
    
        listLocation: "data",
    
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
                change_producto2();
            }	
        }
    };

    $("#autocomplete2").easyAutocomplete(options);

    var validator=$('#form_ajustar').validate({
        rules: {
            cantidad: "required",
            
        },
        messages: {
            cantidad: "Ingrese una cantidad",
            
        },
        submitHandler: function (form) {
            var data=$(form).serialize();
             $.ajax({
                 type: "POST",
                 url: base_url+"index.php/Inventario/ajustar",
                 data: data,
                 beforeSend: function(){
                    $("#btn_submit").attr("disabled",true);
                 },
                 success: function (result) {
                    console.log(result);
                    $("#btn_submit").attr("disabled",false);
                    swal("Exito!", "Se ha realizado la operación correctamente", "success");
                    $('#form_ajustar').find("input").val("");
                    $("#stocklb2").text("");
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



function change_producto2(){
    var id=$("#autocomplete2").getSelectedItemData().id;
    var stock=$("#autocomplete2").getSelectedItemData().stock;
    $("#stocklb2").text(stock);
    $("#stock2").val(stock);
    $("#id_producto2").val(id);
}



