$(function () {
    

    $("a[data-toggle=\"tab\"]").on("shown.bs.tab", function (e) {
              console.log( 'show tab' );
                $($.fn.dataTable.tables(true)).DataTable()
                  .columns.adjust()
                  .responsive.recalc();
            });

    table=$('#table_ins').DataTable({
        responsive: true,
        "bProcessing": true,
            "serverSide": true,
            "ajax": {
                url:  base_url+"index.php/compras/datatable_records_ins",
                type: "post",
                error: function () {
                    $("#table_ins").css("display", "none");
                }
            },
            "columns": [
                {"data": "fecha_creacion"},
                {"data": "alias"},
                {"data": "cantidad"},
                {"data": "unidad"},
                {"data": "nombre"},
                {"data": "precio_compra"},
                {"data": "total"},
                {
                    "data": null,
                    "defaultContent": "<button type='button' class='btn btn-xs waves-effect btn-danger delete'><i class='material-icons'>delete</i></button>"
                }
            ],
        language: languageTables
    }); 


    table2=$('#table_mp').DataTable({
        responsive: true,
        "bProcessing": true,
            "serverSide": true,
            "ajax": {
                url:  base_url+"index.php/compras/datatable_records_mp",
                type: "post",
                error: function () {
                    $("#table_mp").css("display", "none");
                }
            },
            "columns": [
                {"data": "fecha"},
                {"data": "alias"},
                {"data": "peso"},
                {"data": "nombre"},
                {"data": "precio_compra"},
                {"data": "total"},
                {
                    "data": null,
                    "defaultContent": "<button type='button' class='btn btn-xs waves-effect btn-danger delete'><i class='material-icons'>delete</i></button>"
                }
            ],
        language: languageTables
    });

   

    
});


