
<section class="content">
  <div class="container-fluid">
    <div class="block-header">
      <h2>COMPRA DE INSUMOS</h2>
    </div>
    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
          <div class="body">
            <p>Proveedor</p>
           <div class="row">
            <div class="col-md-9">
             <div class="form-group">
              <div class="form-line">

               <select id="proveedor" class="form-control show-tick">
                <option value="0">N/A</option>
                <?php foreach ($proveedores as $p) {
                    echo "<option value='$p->id'>$p->alias</option>";
                }
                ?>
              </select>                                      
            </div>
          </div>
        </div>
      </div>

      <div class="row">
 <div class="col-md-9">
  <div class="form-group form-float">
    <div class="form-line">
     <input type="text" class="form-control uppercase" id="factura" required >
     <label class="form-label">Número de factura / Nota</label>
   </div>
 </div>
</div>

</div>

      <div class="row">
        <div class="col-md-2">
         <div class="form-group form-float">
          <div class="form-line">
           <input type="number" class="form-control uppercase" name="cantidad" id="cantidad" required >
           <label class="form-label">Cantidad</label>
         </div>
       </div>
     </div>
     <div class="col-md-5">
       <div class="form-group ">
        <div class="form-line">
         <select class="form-control" name="producto" id="producto" ></select>
       </div>
     </div>
   </div>
   <div class="col-md-2">
    <div class="form-group form-float">
      <div class="form-line">
       <input type="text" class="form-control" name="precio_c" id="precio" required >
       <label class="form-label">Precio compra</label>
     </div>
   </div>
 </div>
 <div class="col-md-3 text-left">
  <button onclick="add_element()" class="btn bg-teal waves-effect">
    <i class="material-icons">add_circle</i>
    <span>AGREGAR PRODUCTO</span>
  </button>
</div>
</div>



<div class="">
  <table class="table table-hover">
    <thead>
      <tr>
      <th colspan="7" class="bg-green text-center">DETALLE DE COMPRA</th>
    </tr>
    <tr>
      <th>Código</th>
      <th>Producto</th>
      <th>Cantidad</th>
      <th>Unidad</th>    
      <th>Precio</th>
      <th>Total</th>
      <th>Acciones</th>
   </tr>
    </thead>
    <tbody id="table_productos">
      
    </tbody>
    
 </table>
</div>

<div class="row">
  <div class="col-md-8"></div>
  <div class="col-md-2"><label>Total</label></div>
  <div class="col-md-2"><label id="total"></label></div>
</div>
<div class="row">
  <div class="col-md-12 text-center">
    <button type="button" onclick="save_compra($(this))" class="btn bg-teal waves-effect">
    <i class="material-icons">save</i>
    <span>GUARDAR COMPRA</span>
  </button>
  </div>
</div>   
</div>
</div>
</div>
</div>

</section>
<script src="<?php echo base_url()?>js/compras/insumos_add.js"></script>
<script>
  
  $(document).ready(function(){
  $("#precio").inputmask("currency", {radixPoint: '.'}); 
  
});
</script>
