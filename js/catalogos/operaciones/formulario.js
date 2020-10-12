$(document).ready(function() {
	/*$('.datepicker').bootstrapMaterialDatePicker({
        format: 'DD-MM-YYYY',
        lang : 'es-do',
        clearButton: true,
        cancelText: "Cancelar",
        clearText: "Limpiar",
        weekStart: 1,
        time: false,
        disabledDays: [1,2,3,4,5,7]
    });

    $('.datepicker2').bootstrapMaterialDatePicker({
        format: 'DD-MM-YYYY',
        lang : 'es-do',
        clearButton: true,
        cancelText: "Cancelar",
        clearText: "Limpiar",
        weekStart: 1,
        time: false,
        disabledDays: [1,2,3,4,6,7]
    });*/
    cargar();
});

$("#categoria").change(function(){
    $("#hide").val(GetValor($("#categoria").val()));
});

function cargar(){
    $("#libras_sel").val(GetValor(1));
    $("#libras_plus").val(GetValor(2));
    $("#libras_pre").val(GetValor(3));
    $("#libras_seg").val(GetValor(4));
    $("#libras_pri").val(GetValor(5));
}

$("#saveButon").click(function(){
	sendData();
});

function GetValor(dato){
    var ret;
    $.ajax({
        url: base_url+'index.php/catalogos/PlanPagos/GetPago',
        type: 'POST',
        data: {"id":dato},
        async: false,
        success: function(data) {
            ret=data;
        },
        error: function(jqXHR) {
         console.log(jqXHR);
        }
    });
    console.log(ret);
    return ret;
}

function sendData(){
	var info=$("#formPago").serialize();
	$.ajax({
		url: base_url+'index.php/catalogos/PlanPagos/SetPago',
		type: 'POST',
		data: info,
		success: function(data) {
         swal("Exito!", "Se han realizado los cambios correctamente", "success");
         cargar();
        },
        error: function(jqXHR) {
          console.log(jqXHR);
        }
	});
	
}