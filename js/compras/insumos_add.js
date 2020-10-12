$(function () {
    
    $('#producto').select2({
        width: 'resolve',
        minimumInputLength: 3,
        minimumResultsForSearch: 10,
        placeholder: 'Buscar un producto',
        theme: "material",
        ajax: {
            url: base_url+"index.php/compras/get_productos",
            dataType: "json",
            data: function (params) {
            var query = {
                search: params.term,
                type: 'public'
            }
            return query;
        },
        processResults: function(data){
            var clientes=data;
            var itemscli = [];
            data.forEach(function(element) {
                itemscli.push({
                    id: element.codigo,
                    text: element.codigo+' / '+element.nombre,
                    precio: element.precio
                });
            });
            return {
                results: itemscli
            };          
        },  
      }
    }).on('select2:select', function (e) {
        var data = e.params.data;
        console.log(data.precio);
        $('#cprecio').val(data.precio);
    });

    clear_list();
       
});

function save_compra(btn){
        btn.attr("disabled",true);
        $.ajax({
                type: "POST",
                url: base_url+"index.php/compras/save_compra",
                data: {proveedor: $("#proveedor").val(),nota: $("#factura").val()},
                success: function (data) {
                    swal({
                            title: 'Exito!',
                            text: "Se guardo la compra con el No."+data,
                            type: 'success',
                            showCancelButton: false,
                            allowOutsideClick: false
                        }).then(function (isConfirm) {
                            if (isConfirm) {
                                window.location = base_url+"index.php/compras";
                            }
                        });
                }
            });
    }


function add_element(){
        var precio=$("#precio").val().replace("$", "").replace(",", "");
        if($("#producto").val()!="" && $.isNumeric($("#cantidad").val()) && precio!=0){
            $.ajax({
                type: "POST",
                url: base_url+"index.php/compras/add_element",
                data: {producto: $("#producto").val(),cantidad: $("#cantidad").val(),precio: precio},
                success: function (data) {
                    var json = JSON.parse(data);
                    if(json.resultado=="OK"){
                        $("#table_productos").html(json.tabla);
                        
                        $("#total").text("$"+json.total);
                        
                        $("input").val("");
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


function delete_element(btn){
        var row=btn.closest("tr").index();
        $.ajax({
                type: "POST",
                url: base_url+"index.php/compras/delete_element",
                data: {row: row},
                success: function (data) {
                    $("#table_productos").html(data);
                }
            });
    }
    
    function clear_list(){
        $.ajax({
                type: "POST",
                url: base_url+"index.php/compras/clear_elements",
                success: function (data) {
                    $("#table_productos").html("");
                }
            });
        
    }
    
    function enterEvent(e) {
        if (e.keyCode == 13) {
            add_element();
            return false;
        }
    }