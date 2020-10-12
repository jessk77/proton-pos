var totalPrimera=0;
var totalSegunda=0;
 $(document).ready(function() {
    Fechas();
 	$('.datepicker').bootstrapMaterialDatePicker({
        format: 'DD-MM-YYYY',
        lang : 'es-do',
        clearButton: true,
        cancelText: "Cancelar",
        clearText: "Limpiar",
        weekStart: 1,
        time: false,
    });

    $('.datepicker1').bootstrapMaterialDatePicker({
        format: 'DD-MM-YYYY',
        lang : 'es-do',
        clearButton: true,
        cancelText: "Cancelar",
        clearText: "Limpiar",
        weekStart: 1,
        time: false,
        disabledDays: [7]
    });

 	table=$(".js-basic-example").DataTable({
 		responsive: true,
        "serverSide": true,
 		"ajax": {
           "url": base_url+"index.php/operaciones/PagosDesconche/getData",
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
            {"data": "primera"},
            {"data": "segunda"},
            {"data": "total_semana"},
            {"data": "total_pago"},
            {"data": "fecha_in"},
            {"data": "fecha_fin"},
            {"data": "estado",
                render: function(data, type, row, meta){
                   return SetEstado(data);
                }
            }
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

 $('#empleado').change(function() {
     table.ajax.reload();     
 });
$('#fecha_in').change(function() {
     table.ajax.reload();
});
$('#fecha_fin').change(function() {
     table.ajax.reload();
});

$("#SaveButon").click(function(){
    console.log(no_empleados);
    var valid=1;
    for (var i = no_empleados; i >= 1; i--) {
      var info=$("#pagar"+i).serialize();
      console.log(info);
       $.ajax({
        url: base_url+'index.php/operaciones/PagosDesconche/SetPago',
        type: 'POST',
        async: false,
        data: info,
        success: function(data) {
            console.log("insertado: "+i);
            //ret=data;
            //swal("Exito!", "Se han realizado los cambios correctamente", "success");
            //location.reload();
        },
        error: function(jqXHR) {
         console.log(jqXHR);
         valid=0;
        }
     });
    }
    if (valid==1) {
      swal("Exito!", "Se han realizado los cambios correctamente", "success");
      location.reload();
    }
    /*
    var info=$("#pagar").serialize();
   
    */
});

$("#fecha_in2").change(function(){
    fecha_sep=$('#fecha_in2').val().split("-");
    fecha_ac=fecha_sep[2]+"-"+fecha_sep[1]+"-"+fecha_sep[0];
    var fecha = new Date(fecha_ac);
    var dias = 7; // Número de días a agregar
    fecha.setDate(fecha.getDate() + dias);
    var dd = fecha.getDate();
    var mm = fecha.getMonth()+1;
    var yyyy = fecha.getFullYear();
    if (dd<10) {
        dd="0"+dd;
    }
    if (mm<10) {
        mm="0"+mm;
    }
    var fech=dd+"-"+mm+"-"+yyyy;
    $("#fecha_fin2").val(fech);
});

function SumarPrimera(variable){
    console.log(variable);
    console.log('Sumando ahora');
    var primera=parseInt(variable);
    totalPrimera=totalPrimera+primera;
    $("#cantidaPri").text(totalPrimera);
}

function SumarSegunda(){

}

function Sumar(){
    var total1=0;
    var total2=0;
    $(".PrimeraClase").each(function(){
    if (isNaN(parseFloat($(this).val()))) {
      total1 += 0;
    }else{
      total1 = total1+parseFloat($(this).val());
    }
  });

    $(".SegundaClase").each(function(){
    if (isNaN(parseFloat($(this).val()))) {
      total2 += 0;
    }else{
      total2 = total2+parseFloat($(this).val());
    }
  });
    $("#cantidaSeg").text(total2);
    $("#cantidaPri").text(total1);
    $("#cantidaPagar").text(total1+total2);
}

function SumarS(){
    var total1=0;
    $(".SegundaClase").each(function(){
    if (isNaN(parseFloat($(this).val()))) {
      total1 += 0;
    }else{
      total1 = total1+parseFloat($(this).val());
    }
  });
    $("#cantidaPri").text(total1);
}

function AgregarPagoEmpleado(){
    var contador = $('#contador').val();
    var no_empleados = contador;
    no_empleados++;

    $('#contador').val(no_empleados);

    var $template = $('#fecha_in2'),
                        $clone = $template
                        .clone()
                        .show()
                        .removeAttr('id')
                        .attr('id',"empleado"+no_empleados)
                        .insertAfter($template)
                        .append('<div class="row">\
                            <div class="col-md-12">\
                                <button type="button" onclick="eliminar_unidad($(this))" class="btn btn-sm classBotonFratsa white pull-right"><i class="fa fa-minus"></i></button>\
                            </div>\
                        </div>')
                        $clone.find("input").val("");
    $('.chosen-select').chosen({width: "15%"});     
}

function SetEstado(info){
    if(info==0){
        return "no pagado";
    }else{
        return "pagado";
    }
}

function Fechas() {
    var hoy = new Date();
    var dd = hoy.getDate();
    var mm = hoy.getMonth()+1;
    var yyyy = hoy.getFullYear();
    if (dd<10) {
        dd="0"+dd;
    }
    if (mm<10) {
        mm="0"+mm;
    }
    var fecha=yyyy+"-"+mm+"-"+dd;
    $.ajax({
        url: base_url+'index.php/operaciones/PagosDesconche/inicio_fin_semana',
        type: 'POST',
        data: {"fecha":fecha},
        success: function(data) {
            dato=JSON.parse(data);
            $("#del").text(dato['1']);
            $("#al").text(dato['2']);
        },
        error: function(jqXHR) {
         console.log(jqXHR);
        }
    });

    
}