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
                                    Carga de Excel
                                </h2>
                            </div>

                        </div>
                    </div>
                    <div class="body">
                        
                        <div class="row">
                            <div class="col-md-8">
                                <p>Carga un Excel con la información de tus productos, la plantilla la puedes descargar en el botón de la izquierda. Los requisitos y puntos para la carga son los siguientes:</p>
                                <ul>
                                    <li>Todos los productos deben tener un código.</li>
                                    <li>Si no lo contienen el código se generará de manera automática con la nomenclatura 'PAXXXX' donde 'XXXX' es un número consecutivo.</li>
                                    <li>Si dos o más productos en el excel tienen un mismo código se reemplazará la información por el ultimo registro encontrado.</li>
                                </ul>
                            
                        </div>
                        <div class="col-md-2">
                        <button type="button" onclick="imprimir();" class="btn btn-lg bg-green waves-effect">
                                    <i class="material-icons">archive</i>
                                    <span>DESCARGAR PLANTILLA</span>
                                </button>
                        </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button type="button" onclick="imprimir();" class="btn btn-lg bg-blue waves-effect">
                                    <i class="material-icons">cloud_upload</i>
                                    <span>SUBIR EXCEL</span>
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


<script>
    $(function() {

    )}
</script>