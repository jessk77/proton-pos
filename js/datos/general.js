$(function () {
    new Chart(document.getElementById("line_chart").getContext("2d"), getChartJs('line'));
    new Chart(document.getElementById("pie_chart").getContext("2d"), getChartJs('pie'));

    $(".change").on("change",function(){
        getTopProductos($("#mes").val(),$("#anio").val());
        getEntradasSalidas($("#mes").val(),$("#anio").val())
        new Chart(document.getElementById("line_chart").getContext("2d"), getChartJs('line'));
        new Chart(document.getElementById("pie_chart").getContext("2d"), getChartJs('pie'));
    });

    getTopProductos($("#mes").val(),$("#anio").val());

    getEntradasSalidas($("#mes").val(),$("#anio").val())
});

function getChartJs(type) {
    var config = null;

    if (type === 'line') {
        config = {
            type: 'line',
            data: {
                labels: getDaysInMonth($("#mes").val(),$("#anio").val()),
                datasets: [{
                    label: "Ventas del día",
                    data: getVentasMensual($("#mes").val(),$("#anio").val()),
                    borderColor: 'rgba(0, 188, 212, 0.75)',
                    backgroundColor: 'rgba(0, 188, 212, 0.3)',
                    pointBorderColor: 'rgba(0, 188, 212, 0)',
                    pointBackgroundColor: 'rgba(0, 188, 212, 0.9)',
                    pointBorderWidth: 1
                }]
            },
            options: {
                responsive: true,
                legend: false
            }
        }
    }
    
    
    else if (type === 'pie') {
        config = {
            type: 'pie',
            data: {
                datasets: [{
                    data: [225, 50, 100, 40],
                    backgroundColor: [
                        "rgb(233, 30, 99)",
                        "rgb(255, 193, 7)",
                        "rgb(0, 188, 212)",
                        "rgb(139, 195, 74)"
                    ],
                }],
                labels: [
                    "Pink",
                    "Amber",
                    "Cyan",
                    "Light Green"
                ]
            },
            options: {
                responsive: true,
                legend: false
            }
        }
    }
    return config;
}

function getDaysInMonth(month, year) {
    var total =new Date(month, year, 0).getDate();
    var days = [];
    for(i=1; i<total+1; i++){
       days.push(i);
    }
    return days;
}

function getVentasMensual(month, year){
    var result="[]";
    $.ajax({
        type: "POST",
        async: false,
        dataType: 'json',
        url: base_url + "index.php/Datos/ventas_general/"+month+"/"+year,
        success: function (data) {
            result= data;
        }
    });
    return result;
}

function getTopProductos(month,year){
    $.ajax({
        type: "POST",
        url: base_url + "index.php/Datos/top_productos/"+month+"/"+year,
        success: function (data) {
            $("#top_table").html(data);
        }
    });
}

function getEntradasSalidas(month,year){
    $.ajax({
        type: "POST",
        dataType: 'json',
        url: base_url + "index.php/Datos/get_entradas_salidas/"+month+"/"+year,
        success: function (data) {
            $("#entradas").html("$"+(+data.entradas).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
            $("#salidas").html("$"+(+data.salidas).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
        }
    });
}