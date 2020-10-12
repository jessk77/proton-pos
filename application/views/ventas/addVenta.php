<style>
  .total-r {
    float: right;
  }
</style>
<section class="content">
  <div class="container-fluid">
    <!-- <div class="block-header">
      <h2>VENTAS</h2>
    </div> -->
    <div class="row clearfix">
      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <div class="card">
          <div class="header bg-indigo">

            <h2>
              Ventas
            </h2>
            <ul class="header-dropdown m-r--5">
              <li class="dropdown">
                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                  <i class="material-icons">more_vert</i>
                </a>
                <ul class="dropdown-menu pull-right">
                  <li><a href="<?php echo base_url();?>index.php/Ventas/listado" class=" waves-effect waves-block"> Listado de Ventas</a></li>
                  <li><a href="javascript:void(0);" class=" waves-effect waves-block">Ver ultima Venta</a></li>
                  <li><a href="javascript:void(0);" class=" waves-effect waves-block">Abrir Caja</a></li>
                  <li><a href="javascript:void(0);" class=" waves-effect waves-block">Ver Inventario</a></li>
                </ul>
              </li>
            </ul>
          </div>
          <div class="body">
            <form id="form_venta" method="POST">

              <p>Cliente</p>
              <div class="row ">
                <div class="col-md-12 ">
                  <div class="form-group">
                    <div class="form-line">

                      <select id="cliente" class="form-control show-tick box-input">
                        <option value="0">PUBLICO GENERAL</option>
                        <?php foreach ($clientes as $c) {
                          echo "<option value='$c->id'>$c->razon_social</option>";
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
              <div class="col-md-2">
                  <div class="form-group">
                    <div class="form-line">
                      <input type="number" value="1" class="form-control box-input uppercase" id="cantidad" placeholder="Cantidad">
                    </div>
                  </div>
                </div>
                <div class="col-md-10">
                  <div class="form-group">
                  <input class="box-input" id="basics" placeholder="Busque producto por nombre o código" />
                  </div>
                </div>
                

              </div>

              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th colspan="7" style="background-color: #eee;">
                      <div class="row">
                        <div class="col-md-6" style="margin-bottom: 0px;">
                          ITEMS
                        </div>
                        <div class="col-md-6 text-right" style="margin-bottom: 0px;">
                        <i title="limpiar items" onclick="limpiar_items()" class="material-icons" style="margin-bottom: 0px;">delete_sweep</i>
                        </div>
                      </div>
                      
                    </th>
                    </tr>
                    <tr>
                      <th>Código</th>
                      <th>Producto</th>
                      <th>Precio</th>
                      <th>Cantidad</th>
                      <th>Total</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody id="table_productos">

                  </tbody>

                </table>
              </div>

          </div>
          </form>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class="card">
          <div class="header bg-indigo">

            <div class="row">
              <div class="col-md-12">
                <h2>Totales</h2>
              </div>
            </div>
          </div>
          <div class="body">
            <div class="list-group">
              <a href="javascript:void(0);" class="list-group-item">Sub Total: <b id="subtotal" class="total-r">$0.00</b></a>
              <a href="javascript:void(0);" onclick="modal_descuento()" class="list-group-item">Descuento: <span id="descuento" class="total-r">$0.00</span></a>
              <?php if($empresa->impuesto){ ?>
              <a href="javascript:void(0);" class="list-group-item"><?php echo $empresa->tasa_imp;?>: <span id="impuesto" class="total-r">$0.00</span></a>
              <?php } ?>
              <a href="javascript:void(0);" class="list-group-item bg-blue">
                <h5>TOTAL: <b id="total" class="total-r">$0.00</b></h5>
              </a>
            </div>
            <p>Metodo de Pago:</p>
            <div class="form-group">
              <div class="form-line">
                <select id="tipo_pago" class="form-control box-input show-tick">
                  <option value="1">Efectivo</option>
                  <option value="2">Tarjeta Debito/Crédito</option>
                  <option value="3">Vale de Despensa</option>
                </select>
              </div>
            </div>
            <div id="efectivo">
            <p>Pago Efectivo:</p>
            <div class="form-group ">
              <div class="form-line ">
                <input type="text" id="pago_efectivo" class="form-control box-input uppercase">
              </div>
            </div>
            <div class="list-group">
              <a href="javascript:void(0);" class="list-group-item">Cambio: <span id="cambio" class="total-r">$0.00</span></a>
            </div>
          </div>
            <div class="row">
              <div class="col-md-12 text-center">
                <button type="button" onclick="realizar_venta()" class="btn bg-red waves-effect btn_submit">
                  <i class="material-icons">check</i>
                  <span>REALIZAR VENTA</span>
                </button>
              </div>
            </div>

          </div>

        </div>
      </div>
    </div>

</section>
<script src="<?php echo base_url() ?>/plugins/easy-autocomplete/jquery.easy-autocomplete.js"></script>
<link href="<?php echo base_url() ?>/plugins/easy-autocomplete/easy-autocomplete.css" rel="stylesheet">

<script src="<?php echo base_url() ?>js/ventas/productos_add.js"></script>