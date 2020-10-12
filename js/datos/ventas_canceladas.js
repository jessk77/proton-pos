$(function () {

    $(".change").on("change",function(){
        table.ajax.reload();
    });

    table=$('.js-basic-example').DataTable({
        "order": [[ 0, "desc" ]],
        responsive: true,
        "bProcessing": true,
            "serverSide": true,
            "ajax": {
                url:  base_url+"index.php/Datos/datatable_ventas/",
                data: function ( d ) {
                    d.estatus=0,
                    d.inicio = document.getElementById("inicio").value ,
                    d.fin = document.getElementById("fin").value ;
                },
                type: "post",
                "dataSrc": function ( json ) {
                    $("#no_ventas").text(json.no_ventas);
                    $("#total_ventas").text(json.total_ventas);
                    $("#ganancias").text(json.ganancias);
                    return json.data;
                    
                },       
                error: function () {
                    $(".js-basic-example").css("display", "none");
                }
            },
            "columns": [
                {"data": "id"},
                {"data": "razon_social"},
                {"data": "monto"},
                {"data": "tipo_pago",
                "render": function ( data, type, row, meta ) {
                    if(data==1){
                        return 'EFECTIVO';
                    }
                    if(data==2){
                        return 'TARJETA';
                    }
                    if(data==3){
                        return 'VALE';
                    }
                    
                  }
                },
                {"data": "fecha_creacion"},
                {"data": "vendedor"},
                {"data": "motivo"},
            ],
        language: languageTables
    }); 



    
   
});

