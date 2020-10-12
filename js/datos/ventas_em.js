$(function () {
    $(".change").on("change",function(){
        new Chart(document.getElementById("bar_chart").getContext("2d"), getChartJs('bar'));
    });
    new Chart(document.getElementById("bar_chart").getContext("2d"), getChartJs('bar'));
});

function getChartJs(type) {
    var config = null;
    var datachart=getDataChart();
    if (type === 'bar') {
        config = {
            type: 'bar',
            data: {
                labels: datachart.labels,
                datasets: [{
                    label: "Total de Ventas",
                    data: datachart.values,
                    backgroundColor: 'rgba(0, 188, 212, 0.8)'
                }]
            },
            options: {
                responsive: true,
                legend: false
            }
        }
    }
    
    return config;
}

function getDataChart(){
    var result="[]";
    $.ajax({
        type: "POST",
        async: false,
        dataType: 'json',
        data: {inicio: $("#inicio").val(), fin: $("#fin").val()},
        url: base_url + "index.php/Datos/ventas_empleados/",
        success: function (data) {
            result= data;
        }
    });
    return result;
}