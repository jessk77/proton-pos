$(function () {


    $("#fecha").on("change",function(){
        getCorteDia($("#fecha").val());
    });

    getCorteDia($("#fecha").val());

});


function getCorteDia(date){
    $.ajax({
        type: "POST",
        data: {fecha:date},
        dataType: 'json',
        url: base_url + "index.php/Datos/get_corte/",
        success: function (data) {
            $("#no_ventas").html(data.no_ventas);
            $("#total_ventas").html((+data.total_ventas).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
            $("#ganancias").html((+data.ganancias).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
            $("#productos").html(data.productos);
            $("#canceladas").html(data.canceladas);
            $("#total_canceladas").html((+data.total_canceladas).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
            $("#no_gastos").html(data.no_gastos);
            $("#total_gastos").html((+data.total_gastos).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
            $("#inventario").html((+data.inventario).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
            $("#total_inventario").html((+data.total_inventario).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
            $("#bajos_stock").html(data.bajos_stock);
        }
    });
}

function imprimir() {
    $('#print_zone').printThis();
}