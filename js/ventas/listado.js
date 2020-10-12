$(function () {


    table=$('.js-basic-example').DataTable({
        "order": [[ 0, "desc" ]],
        responsive: true,
        "bProcessing": true,
            "serverSide": true,
            "ajax": {
                url:  base_url+"index.php/ventas/datatable_ventas",
                type: "post",
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
                {"data": "estatus",
                "render": function ( data, type, row, meta ) {
                    if(data==0){
                        return '<span class="label bg-red">CANCELADA</span>';
                    }
                    else{
                        return '<span class="label bg-green">REALIZADA</span>';
                    }
                    
                  }
                },
                {"data": "id",
                "render": function ( data, type, row, meta ) {
                    var cancel=" ";
                    if(row.estatus!=0){
                        cancel= "<button type='button' title='cancelar venta' class='btn btn-xs waves-effect btn-danger cancelar'><i class='material-icons'>clear</i></button>";
                    }
                    
                    return "<button title='imprimir ticket' type='button' class='btn btn-xs waves-effect bg-blue ticket'><i class='material-icons'>receipt</i></button> "+cancel;
                    
                    
                  }
                }
            ],
        language: languageTables
    }); 


    $('.js-basic-example').on('click', 'button.cancelar', function () {
        var tr = $(this).closest('tr');
        var data = table.row(tr).data();
        
        cancelar_venta(data.id);

    });  

    $('.js-basic-example').on('click', 'button.ticket', function () {
        var tr = $(this).closest('tr');
        var data = table.row(tr).data();
        
        window.open(base_url+'index.php/Formatos/ticketmateria/' +data.id,
        'imprimir',
        'width=700,height=800');

    });  
    
   
});

function cancelar_venta(id){
    swal({
        title: "Cancelación de Venta No. "+id,
        text: "Ingrese el motivo de la cancelación",
        type: "input",
        showCancelButton: true,
        closeOnConfirm: false,
        animation: "slide-from-top",
        inputPlaceholder: "Motivo"
    }, function (inputValue) {
        if (inputValue === false) return false;
        if (inputValue === "") {
            swal.showInputError("Valor no valido"); return false
        }
        $.ajax({
            type: "POST",
            url: base_url + "index.php/ventas/cancelar_venta/"+id,
            data: { motivo_cancelacion: inputValue, estatus: 0 },
            success: function (data) {
                swal("Correcto", "Venta cancelada", "success");
                table.ajax.reload();
            },
            error: function(){
                swal("Error", "Contacte al administrador", "error");
            }
        });
        
    });
}