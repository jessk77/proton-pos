$(function () {
    table=$('.js-basic-example').DataTable({
        responsive: true,
        "bProcessing": true,
            "serverSide": true,
            "ajax": {
                url:  base_url+"index.php/Inventario/datatable_inventario",
                type: "post",
                error: function () {
                    $(".js-basic-example").css("display", "none");
                }
            },
            "columns": [
                {"data": "codigo"},
                {"data": "nombre"},
                {"data": "categoria"},
                {"data": "stock",
                "render": function ( data, type, row, meta ) {
                    var minimo=row.stock_minimo; 
                    if(data<=minimo){
                        return "<span class='text-danger'>"+data+"</span>";
                    }
                    else{
                        return "<span class='text-info'>"+data+"</span>";
                    }
                    
                  }
                },
                {"data": "stock_minimo"},
                {"data": "stock_maximo"},
            ],
        language: languageTables
    });



    
});


