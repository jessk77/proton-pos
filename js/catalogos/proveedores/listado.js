$(function () {
    table=$('.js-basic-example').DataTable({
        responsive: true,
        "ajax": {
                "url": base_url+"index.php/catalogos/proveedores/datatable_records"
            },
            "columns": [
                {"data": "razon_social"},
                {"data": "contacto"},
                {"data": "tel_movil"},
                {
                    "data": null,
                    "defaultContent": "<button type='button' class='btn btn-xs waves-effect bg-blue edit'><i class='material-icons'>create</i></button>\
                    <button type='button' class='btn btn-xs waves-effect btn-danger delete'><i class='material-icons'>delete</i></button>"
                }
            ],
        language: languageTables
    });

    $('.js-basic-example').on('click', 'button.edit', function () {
        var tr = $(this).closest('tr');
        var data = table.row(tr).data();
        
        window.location.href = base_url+"index.php/catalogos/proveedores/edicion/"+data.id;

    });  

    $('.js-basic-example').on('click', 'button.delete', function () {
        var tr = $(this).closest('tr');
        var data = table.row(tr).data();
        
        delete_record(data.id);

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
                 url: base_url+"index.php/catalogos/proveedores/delete/"+id,
                 success: function (result) {
                    console.log(result);
                    table.ajax.reload();
                    swal("Exito!", "Se ha eliminado correctamente", "success");
                 }
             });
    });
}