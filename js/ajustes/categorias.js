$(function () {
    table=$('#table_categorias').DataTable({
        responsive: true,
        "ajax": {
                "url": base_url+"index.php/ajustes/datatable_records/categorias"
            },
            "columns": [
                {"data": "nombre"},
                {
                    "data": null,
                    "defaultContent": "<button type='button' class='btn btn-xs waves-effect bg-blue edit'><i class='material-icons'>create</i></button>\
                    <button type='button' class='btn btn-xs waves-effect btn-danger delete'><i class='material-icons'>delete</i></button>"
                }
            ],
        language: languageTables
    });

    $('#table_categorias').on('click', 'button.edit', function () {
        var tr = $(this).closest('tr');
        var data = table.row(tr).data();
        
        $("#categoria_nombre").val(data.nombre);
                    $("#categoria_id").val(data.id);
                    $("#modalCateg").modal("show");
    });  

    $('#table_categorias').on('click', 'button.delete', function () {
        var tr = $(this).closest('tr');
        var data = table.row(tr).data();
        
        delete_record(data.id);

    });  


    $('#form_categorias').validate({
        rules: {
            nombre: "required",    
        },
        messages: {
            nombre: "Ingrese el Nombre",
           
        },
        submitHandler: function (form) {
             $.ajax({
                 type: "POST",
                 url: base_url+"index.php/ajustes/submit_categorias",
                 data: $(form).serialize(),
                 beforeSend: function(){
                    $("#btn_submit").attr("disabled",true);
                 },
                 success: function (result) {
                    console.log(result);
                    $("#btn_submit").attr("disabled",false);
                    swal("Exito!", "Se ha realizado la operación correctamente", "success");
                    $("#categoria_nombre").val("");
                    $("#categoria_id").val(0);
                    $("#modalCateg").modal("hide");
                    table.ajax.reload();
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


function modal_addCategoria(){
    $("#categoria_nombre").val("");
                    $("#categoria_id").val(0);
                    $("#modalCateg").modal("show");
}


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
                 url: "./ajustes/delete_categoria/"+id,
                 success: function (result) {
                    console.log(result);
                    table.ajax.reload();
                    swal("Exito!", "Se ha eliminado correctamente", "success");
                 }
             });
    });
}