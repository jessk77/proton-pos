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
                url:  base_url+"index.php/Datos/datatable_inventario/",
                type: "post",
                "dataSrc": function ( json ) {
                    $("#no_productos").text(json.no_productos);
                    $("#stock").text(json.stock);
                    $("#valor").text(json.valor);
                    return json.data;
                    
                },       
                error: function () {
                    $(".js-basic-example").css("display", "none");
                }
            },
            "columns": [
                {"data": "codigo"},
                {"data": "producto"},
                {"data": "categoria"},
                {"data": "precio"},
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
                {"data": "stock",
                "render": function ( data, type, row, meta ) {
                    var minimo=row.stock_minimo; 
                    if(data<=minimo){
                        return '<span class="badge bg-red">BAJO EN STOCK</span>';
                    }
                    else{
                        return "";
                    }
                    
                  }
                },
            ],
        language: languageTables
    }); 



    
   
});

