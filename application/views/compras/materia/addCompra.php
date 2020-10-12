<section class="content">
  <div class="container-fluid">
    <div class="block-header">
      <h2>COMPRA DE MATERIA PRIMA</h2>
    </div>
    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
          <div class="body">
            <div class="row">
              <div class="col-md-2">
         <!-- <div class="form-group form-float">
          <div class="form-line">
           <input type="number" class="form-control uppercase" name="folio" id="folio" required >
           <label class="form-label">Folio</label>
         </div>
       </div> -->
     </div>
     <div class="col-md-8">

     </div>

     <div class="col-md-2">
       <div class="form-group form-float">
        <div class="form-line">
          <input type="text" name="fecha_nacimiento" id="fecha" class="form-control datepicker">
          <label class="form-label">Fecha</label>
        </div>
      </div>
    </div>
  </div>
  <p>Proveedor</p>
  <div class="row">
    <div class="col-md-4">
     <div class="form-group">
      <div class="form-line">

       <select id="proveedor" class="form-control show-tick">
        <?php foreach ($proveedores as $p) {
          echo "<option value='$p->id'>$p->alias</option>";
        }
        ?>
      </select>                                      
    </div>
  </div>
</div>
<div class="col-md-3">
 <div class="form-group">
  <div class="form-line">

   <select id="materia" class="form-control show-tick">
    <?php foreach ($materias as $m) {
          echo "<option value='$m->id'>$m->nombre</option>";
        }
    ?>

  </select>                                      
</div>
</div>
</div>
<div class="col-md-2">
  <div class="form-group form-float">
    <div class="form-line">
     <input type="number" class="form-control uppercase" id="kilos" required >
     <label class="form-label">Cantidad</label>
   </div>
 </div>
</div>
<div class="col-md-2">
  <div class="form-group form-float">
    <div class="form-line">
     <input type="text" class="form-control uppercase" id="precio" required >
     <label class="form-label">Precio por KG</label>
   </div>
 </div>
</div>

<div class="col-md-1">
  <button type="button" onclick="add_materia()" class="btn bg-teal btn-circle-lg waves-effect waves-circle waves-float">
    <i class="material-icons">add_circle</i>
  </button>
</div>
</div>

<div class="row">
 <div class="col-md-4">
  <p>Tipo de Pesado: <br><br></p>
  <div class="form-group">
    <input type="radio" name="tipo" id="bascula" value="bascula" checked class="with-gap">
    <label for="bascula">Báscula</label>

    <input type="radio" name="tipo" id="vehiculo" value="vehiculo"  class="with-gap">
    <label for="vehiculo" class="m-l-20">Plataforma de Vehículo</label>
  </div>
</div>

<div class="col-md-3">
  <div class="form-group form-float m-t-30 input-vehiculo hidden">
    <div class="form-line">
     <input type="text" class="form-control uppercase" id="placas" required >
     <label class="form-label">Placas de unidad</label>
   </div>
 </div>
</div>

<div class="col-md-2">
  <div class="form-group form-float m-t-30 input-vehiculo hidden">
    <div class="form-line">
     <input type="text" class="form-control uppercase" id="peso_total" required >
     <label class="form-label">Peso de Vehículo + MP</label>
   </div>
 </div>
</div>

<div class="col-md-2">
  <div class="form-group form-float m-t-30 input-vehiculo hidden">
    <div class="form-line">
     <input type="text" class="form-control uppercase" id="peso_vehiculo" required >
     <label class="form-label">Peso de Vehículo</label>
   </div>
 </div>
</div>

</div>



<div class="">
  <table class="table table-hover">
    <thead>
      <tr>
        <th colspan="7" class="bg-green text-center">DETALLE DE COMPRA</th>
      </tr>
      <tr>
        <th>Proveedor</th>
        <th>Producto</th>
        <th>Precio</th>
        <th>Peso</th> 
        <th>Total</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody id="table_productos">

    </tbody>
    
  </table>
</div>
<table class="table table-hover" style="width: 40%">
  <tr>
    <td class="bg-green text-center" colspan="2">TOTALES</td>
  </tr>
  <tr>
    <th>Total a Pagar</th>
    <td id="total">$0.00</td>
  </tr>
  <tr>
    <th>Total Peso</th>
    <td id="kilos_total">0 Kg</td>
  </tr>
</table>

<div class="row">
  <div class="col-md-12 text-center">
    <button type="button" onclick="save_materias($(this))" class="btn bg-teal waves-effect">
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
<script src="<?php echo base_url()?>js/compras/materias_add.js"></script>
<script>

  $(document).ready(function(){
    $("#precio").inputmask("currency", {radixPoint: '.'}); 

  });
</script>
