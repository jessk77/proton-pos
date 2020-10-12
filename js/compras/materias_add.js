$(function () {
    tipo="bascula";
$('.datepicker').bootstrapMaterialDatePicker({
        format: 'YYYY-MM-DD',
        lang : 'es-do',
        clearButton: true,
        cancelText: "Cancelar",
        clearText: "Limpiar",
        weekStart: 1,
        time: false
    });
$("input[name='tipo']").on("change",function(){
    if($(this).val()=="bascula"){
        tipo="bascula";
        $(".input-vehiculo").addClass("hidden");
    }else{
        tipo="vehiculo";
        $(".input-vehiculo").removeClass("hidden");
    }
});

clear_list();

    });
    

function save_materias(btn){
        btn.attr("disabled",true);
        var datos=({
            fecha: $("#fecha").val(),
            tipo: tipo,
            placas: $("#placas").val(),
            peso_vehiculo: $("#peso_vehiculo").val()
        });
        $.ajax({
                type: "POST",
                url: base_url+"index.php/compras/save_materias",
                data: datos,
                success: function (data) {
                    swal({
                            title: 'Exito!',
                            text: "Se guardaron las siguientes compras: <table>"+data+"</table>",
                            type: 'success',
                            showCancelButton: false,
                            allowOutsideClick: false,
                            html: true
                        },function (isConfirm) {
                            if (isConfirm) {
                                window.location = base_url+"index.php/compras";
                            }
                        });
                }
            });
    }


function add_materia(){
        var precio=$("#precio").val().replace("$", "").replace(",", "");
        if($("#kilos").val()>0 && precio!=0){
            $.ajax({
                type: "POST",
                url: base_url+"index.php/compras/add_materia",
                data: {proveedor: $("#proveedor").val(),materia: $("#materia").val(),kilos: $("#kilos").val(),precio: precio},
                success: function (data) {
                    var json = JSON.parse(data);
                    if(json.resultado=="OK"){
                        $("#table_productos").html(json.tabla);
                        
                        $("#total").text(json.total);
                        $("#kilos_total").text(json.kilos);
                        
                        $("#precio").val("");
                        $("#kilos").val("");
                    }
                    else{
                        toastr.error(json.resultado);
                    }
                }
            });
        }
        else{
            toastr.error('', 'Complete los datos', {"positionClass": "toast-bottom-full-width"});
        }
    }


function delete_materia(btn){
        var row=btn.closest("tr").index();
        $.ajax({
                type: "POST",
                url: base_url+"index.php/compras/delete_materia",
                data: {row: row},
                success: function (data) {
                     var json = JSON.parse(data);
                    $("#table_productos").html(json.tabla);
                        
                        $("#total").text(json.total);
                        $("#kilos_total").text(json.kilos);
                }
            });
    }
    
    function clear_list(){
        $.ajax({
                type: "POST",
                url: base_url+"index.php/compras/clear_materias",
                success: function (data) {
                    $("#table_productos").html("");
                }
            });
        
    }

    function imprimir(id) {
        window.open('<?php echo base_url(); ?>index.php/formatos/ticketmateria/' + id,
                'imprimir',
                'width=600,height=500');
    }
    
    function enterEvent(e) {
        if (e.keyCode == 13) {
            add_element();
            return false;
        }
    }
