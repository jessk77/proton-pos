$(document).ready(function() {
	table=$(".js-basic-example").DataTable({
        "serverSide": true,
 		"ajax": {
           "url": base_url+"index.php/operaciones/PagosLibrado/getData",
           type: "post",
           "data": function(d){
             d.empleado = $('#empleado').val()
             d.fecha_in = $('#fecha_in').val()
             d.fecha_fin = $('#fecha_fin').val()
            },
            error: function(){
               $("#tabla").css("display","none");
            }
        },
        "columns": [
            {"data": "nombre"},
            {"data": "sabado"},
            {"data": "luesPlus"},
            {"data": "lunesPre"},
            {"data": "martesSel"},
            {"data": "martesPlus"},
            {"data": "miercoles"},
            {"data": "jueves"},
            {"data": "viernes"},
            {"data": "totalLibras"}
        ],
 		language: {
            "lengthMenu": "Desplegando _MENU_ elementos por página",
            "zeroRecords": "Lo sentimos - No se han encontrado elementos",
            "sInfo":  "Mostrando registros del _START_ al _END_ de un total de _TOTAL_  registros",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(Filtrado de _MAX_ registros totales)",
            "search": "Buscar : _INPUT_",
            "paginate": {
                "previous": "Página previa",
                "next": "Siguiente página"
              }
        }
	});
});