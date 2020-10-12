$(function () {
    $("#fecha").inputmask("y-m-d"); 
    
    
    table=$('.js-basic-example').DataTable({
        responsive: true,
        "ajax": {
                "url": base_url+"index.php/gastos/datatable_records",
                type: "post",
                data: function ( d ) {
                    d.anio = document.getElementById("anio").value ,
                    d.mes = document.getElementById("mes").value ;
                }
            },
            "columns": [
                {"data": "concepto"},
                {"data": "monto"},
                {"data": "categoria"},
                {"data": "fecha"},
                {
                    "data": null,
                    "defaultContent": "<button type='button' class='btn btn-xs waves-effect btn-danger delete'><i class='material-icons'>delete</i></button>"
                }
            ],
        language: languageTables
    });

    $(".change").on("change",function(){
        table.ajax.reload();
    });

    // $('.js-basic-example').on('click', 'button.edit', function () {
    //     var tr = $(this).closest('tr');
    //     var data = table.row(tr).data();
        
    //     window.location.href = base_url+"index.php/catalogos/productos/edicion/"+data.id;

    // });  

    $('.js-basic-example').on('click', 'button.delete', function () {
        var tr = $(this).closest('tr');
        var data = table.row(tr).data();
        
        delete_record(data.id);

    });  


    $('#form_gastos').validate({
        rules: {
            concepto: "required",
            monto: "required",
            fecha: "required",
            
        },
        messages: {
            concepto: "Ingrese un concepto",
            monto: "Ingrese un monto",
            fecha: "Ingrese un fecha",
            
        },
        submitHandler: function (form) {
             $.ajax({
                 type: "POST",
                 url: base_url+"index.php/gastos/submit",
                 data: $(form).serialize(),
                 beforeSend: function(){
                    $("#btn_submit").attr("disabled",true);
                 },
                 success: function (result) {
                    console.log(result);
                    $("#btn_submit").attr("disabled",false);
                    swal("Exito!", "Se ha realizado la operación correctamente", "success");
                    $('#form_gastos').find("input").val("");
                    $("#defaultModal").modal("hide");
                    ajax.table.reload();
                    //setTimeout(function () { window.location.href = base_url+"/index.php/gastos/" }, 1500);
                 }
             });
             return false; // required to block normal submit for ajax
         },
        highlight: function (input) {
            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function (input) {
            $(input).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.form-group').append(error);
        }
    });

    
});




function delete_record(id) {
    swal({
        title: "¿Desea eliminar este elemento?",
        text: "Se eliminara del listado",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Eliminar",
        closeOnConfirm: false
    }, function () {
        $.ajax({
                 type: "POST",
                 url: base_url+"index.php/gastos/delete/"+id,
                 success: function (result) {
                    console.log(result);
                    table.ajax.reload();
                    swal("Exito!", "Se ha eliminado correctamente", "success");
                 }
             });
    });
}