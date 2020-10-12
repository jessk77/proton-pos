$(function () {

    $('#cliente').select2();

    var options = {

        url: function (phrase) {
            return base_url + "index.php/Inventario/getProducts/" + phrase;
        },
        ajaxSettings: {
            dataType: "json"
        },

        listLocation: "data",
        autoFocus: true,
        requestDelay: 300,
        getValue: function (element) {
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
            onChooseEvent: function () {
                add_element();
            }
        }
    };


    $("#basics").easyAutocomplete(options);
    $("#basics").keypress(function (e) {
        if (e.which == 13)
            add_element();
    });

    $("#tipo_pago").on("change", function () {
        if ($(this).val() == 1) {
            $("#efectivo").show();
            $("#pago_efectivo").val("");
            $("#cambio").text("$0.00");
        }
        else {
            $("#efectivo").hide();
        }
    });

    $("#pago_efectivo").on("change", function () {
        var total = +($("#total").text().replace(',', '').replace('$', ''));
        $("#cambio").text("$" + ($(this).val() - total).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
    });

    clear_list();

});


function add_element() {

    if ($.isNumeric($("#cantidad").val())) {
        $.ajax({
            type: "POST",
            url: base_url + "index.php/ventas/add_element",
            data: { producto: $("#basics").val(), cantidad: $("#cantidad").val() },
            success: function (data) {
                var json = JSON.parse(data);
                if (json.resultado == "OK") {
                    $("#table_productos").html(json.tabla);
                    actualiza_totales(json.total);


                    $("#basics").val("");
                    $("#cantidad").val("1");
                }
                else {
                    toastr.error(json.resultado);
                }
            },
            error: function(){
                swal("Error", "Contacte al administrador", "error");
            }
            
        });
    }
    else {
        toastr.error('', 'Agregue una cantidad valida', { "positionClass": "toast-bottom-full-width" });
    }
}


function delete_element(btn) {
    var row = btn.closest("tr").index();
    $.ajax({
        type: "POST",
        url: base_url + "index.php/ventas/delete_element",
        data: { row: row },
        success: function (data) {
            $("#table_productos").html(data);
        }
    });
}

function clear_list() {
    $.ajax({
        type: "POST",
        url: base_url + "index.php/ventas/clear_elements",
        success: function (data) {
            $("#table_productos").html("");
        }
    });

}

function realizar_venta(){
    
    var descuento = +($("#descuento").text().replace(',', '').replace('$', ''));
    var total = +($("#total").text().replace(',', '').replace('$', ''));
    $.ajax({
        type: "POST",
        url: base_url + "index.php/ventas/realizar_venta",
        data: { total: total,descuento: descuento,tipo_pago: $("#tipo_pago").val(), cliente_id: $("#cliente").val() },
        success: function (data) {
            if($.isNumeric(data) && data>0){
                swal({
                    type: "success",
                    title: "Venta Realizada",
                    showCancelButton: true,
                    confirmButtonColor: "#3F51B5",
                    confirmButtonText: "IMPRIMIR TICKET",
                    cancelButtonText: "Cerrar",
                    closeOnConfirm: false,
                    closeOnCancel: false
                }, function (isConfirm) {
                    if (isConfirm) {
                        ticket();
                        swal("Venta Finalizada", "", "success");
                    } else {
                        swal("Venta Finalizada", "", "success");
                    }
                });
            }
            else{
                swal("Error", "Contacte al administrador del sistema", "error");
            }
            
        },
        error: function(){
            swal("Error", "Contacte al administrador", "error");
        }
    });
}

function ticket(){
    alert("ok");
}

function modal_descuento() {
    swal({
        title: "Descuento",
        text: "Ingrese el valor del descuento sobre la venta:",
        type: "input",
        showCancelButton: true,
        closeOnConfirm: false,
        animation: "slide-from-top",
        inputPlaceholder: "Descuento"
    }, function (inputValue) {
        if (inputValue === false) return false;
        if (inputValue === "" || !$.isNumeric(inputValue)) {
            swal.showInputError("Valor no valido"); return false
        }
        $("#descuento").text("$" + (+inputValue).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
        actualiza_totales($("#subtotal").text().replace('$', ''));
        swal("Correcto", "Descuento actualizado", "success");
    });
}

function actualiza_totales(subtotal) {
    $("#subtotal").text("$" + subtotal);
    var descuento = +$("#descuento").text().replace('$', '').replace(',', '');
    var subtotal = +(subtotal.replace(',', ''));
    $("#total").text("$" + (subtotal - descuento).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
}

function limpiar_items() {
    clear_list();
    $("#subtotal").text("$0.00");
    $("#total").text("$0.00");
    $("#cambio").text("$0.00");
    $("#pago_efectivo").val("");

}