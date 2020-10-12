$(function () {
    table=$('.js-basic-example').DataTable({
        responsive: true,
        "ajax": {
                "url": base_url+"index.php/Usuarios/datatable_records"
            },
            "columns": [
                {"data": "nombre"},
                {"data": "usuario"},
                {"data": "correo"},
                {"data": "tel_movil"},
                {
                    "data": null,
                    "defaultContent": "<button type='button' class='btn btn-xs waves-effect bg-blue edit'><i class='material-icons'>create</i></button>\
                    <button type='button' class='btn btn-xs waves-effect btn-danger delete'><i class='material-icons'>delete</i></button>"
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

    $('.js-basic-example').on('click', 'button.edit', function () {
        var tr = $(this).closest('tr');
        var data = table.row(tr).data();
        
        window.location.href = base_url+"index.php/usuarios/edicion/"+data.id;

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
                 url: base_url+"index.php/Usuarios/delete/"+id,
                 success: function (result) {
                    console.log(result);
                    table.ajax.reload();
                    swal("Exito!", "Se ha eliminado correctamente", "success");
                 }
             });
    });
}