<section class="content">
    <div class="container-fluid">
        <div class="block-header">
        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-indigo">

                        <div class="row">
                            <div class="col-md-6">
                                <h2>
                                    Impresion de etiquetas
                                </h2>
                            </div>

                        </div>
                    </div>
                    <div class="body">
                        <div class="row">
                            <div class="col-md-6">

                                <dl class="row">
                                    <dt class="col-sm-3">Código</dt>
                                    <dd class="col-sm-9"><?php echo $producto->codigo; ?></dd>

                                    <dt class="col-sm-3">Producto</dt>
                                    <dd class="col-sm-9"><?php echo $producto->nombre; ?></dd>
                                </dl>

                                <input type="checkbox" id="has_nombre" class="filled-in chk-col-blue change-barcode" checked="">
                                <label for="has_nombre">INCLUIR NOMBRE</label>
                                <br>
                                <input type="checkbox" id="has_codigo" class="filled-in chk-col-blue change-barcode" checked="">
                                <label for="has_codigo">INCLUIR CÓDIGO</label>
                                <br><br>
                                <p>Tamaño de fuente: </p>
                                <div class="form-group" style="width: 70%">
                                    <div class="form-line">
                                        <select id="fuente" class="form-control show-tick change-barcode">
                                            <option value="6">6</option>
                                            <option value="8">8</option>
                                            <option value="10">10</option>
                                            <option value="12">12</option>
                                            <option value="16">16</option>
                                            <option value="18">18</option>
                                            <option value="20" selected>20</option>

                                        </select>
                                    </div>
                                </div>
                                <p>Tamaño de Código de barras: </p>
                                <div class="form-group" style="width: 70%">
                                        <div class="form-line">
                                            <select id="size" class="form-control show-tick change-barcode">
                                                <option value="s">Chico</option>
                                                <option value="g">Grande</option>
                                                
                                            </select>
                                        </div>
                                    </div>

                            </div>
                            <div class="col-md-6">
                                <div id="print_zone" class="text-center">
                                    <p class="m-b--5" id="label_nombre" style="font-family: monospace; color:black; font-size: 20px"><?php echo $producto->nombre; ?></p>
                                    <svg id="barcode"></svg>
                                </div>

                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button type="button" onclick="imprimir();" class="btn btn-lg bg-blue waves-effect">
                                    <i class="material-icons">print</i>
                                    <span>IMPRIMIR</span>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- #END# Basic Examples -->

    </div>
</section>

<script src="<?php echo base_url() ?>/plugins/barcode/JsBarcode.all.min.js"></script>
<script src="<?php echo base_url() ?>/plugins/print-this/printThis.js"></script>

<script>
    $(function() {
        $(".change-barcode").on("change",function(){
            create_barcode();
        });

        
        JsBarcode("#barcode", "123456789012", {
            format: "code128",
            width: 1,
            height: 50,
            displayValue: true
        });
    });

    function create_barcode(){
        var width=1; var height=50;
        if($("#size").val()=="g"){
            width=2; height=100;
        }
        var font=$("#fuente").val();

        $("#label_nombre").css("font-size", +font);

        if ($('#has_nombre').is(':checked')) {
            $("#label_nombre").show();
        }
        else{
            $("#label_nombre").hide();
        }

        var display=true;
        if (!$('#has_codigo').is(':checked')) {
            display=false;
        }

        JsBarcode("#barcode", "123456789012", {
            format: "code128",
            width: width,
            height: height,
            fontSize: font,
            displayValue: display
        });
    }

    function imprimir() {
        $('#print_zone').printThis();
    }
</script>