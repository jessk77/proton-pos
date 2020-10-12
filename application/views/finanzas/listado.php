<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2>Finanzas</h2>
		</div>

		<div class="card">
					<div class="body">
						<form id="form-parametros">
							<div class="row">
								<div class="col-md-2">
									<p>Consultar:</p>
								<div class="form-group">
									<div class="form-line">
										<select name="periodo" placeholder="Por Periodo" class="form-control show-tick">
											<option value="0">Por Periodo</option>
											<option value="1">Historico</option>
										</select>                      
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<p>Del:</p>
								<div class="form-group form-float">
									<div class="form-line">
										<input type="date" name="del" class="form-control">
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<p>Al:</p>
								<div class="form-group form-float">
									<div class="form-line">
										<input type="date" name="al" class="form-control">
									</div>
								</div>
							</div>
							<div class="col-md-2">
								
								<button  class="btn bg-teal waves-effect m-t-20"><i class="material-icons">search</i><span>Consultar</span></button>
							
							</div>
							</div>
						</form>
						
					
				</div>
			</div>

		<!-- Ingresos  -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						 <div class="row">
                                <div class="col-md-6">
                                   <h2>
                                        Ingresos
                                    </h2> 
                                </div>
                                <div class="col-md-6 text-right">
                                    <button data-toggle="modal" data-target="#fondeo" type="button" class="btn bg-teal waves-effect">
                                        <i class="material-icons">add_circle</i>
                                        <span>AGREGAR FONDO</span>
                                    </button>
                                </div>
                            </div>
					</div>
					<div class="body">
							

							<table id="tabla-ingresos" class="table table-hover">
								<thead>
									<tr class="bg-green">
										<th>Fecha</th>
										<th>Cliente</th>
										<th>Cantidad</th>
										<th>Unidades</th>
										<th>Producto</th>
										<th>Precio Unitario</th>
										<th>Total</th>
										<th>Metodo de pago</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>10/01/2019</td>
										<td>jaun manuel gonzales</td>
										<td>20</td>
										<td>litros</td>
										<td>azufre</td>
										<td>$220.00</td>
										<td>$4,400.00</td>
										<td>efectivo</td>
									</tr>
									<tr>
										<td>10/01/2019</td>
										<td>jaun manuel gonzales</td>
										<td>20</td>
										<td>litros</td>
										<td>azufre</td>
										<td>$220.00</td>
										<td>$4,400.00</td>
										<td>efectivo</td>
									</tr>
									<tr>
										<td>10/01/2019</td>
										<td>jaun manuel gonzales</td>
										<td>20</td>
										<td>litros</td>
										<td>azufre</td>
										<td>$220.00</td>
										<td>$4,400.00</td>
										<td>efectivo</td>
									</tr>
									
								</tbody>
								
							</table>

							<table class="table">
								<tr>
										<td colspan="9" class="bg-green text-center"></td>
									</tr>
									<tr>
										<th>Efectivo:</th>
										<th>$ 0.00</th>
										<td colspan="4"></td>
										<th>Total Ventas:</th>
										<th>$ 0.00</th>
										<td></td>
									</tr>
									<tr>
										<th>Transferencias:</th>
										<th>$ 0.00</th>
										<td colspan="4"></td>
										<th>Fondo de Caja:</th>
										<th>$ 0.00</th>
										<td></td>
									</tr>
									<tr>
										<td colspan="6"></td>
										<th>Gran Total:</th>
										<th>$ 0.00</th>
										<td></td>
									</tr>
							</table>
						
						
						
					</div>
				</div>
				<!--Modal FONDO-->
				<div class="modal fade" id="fondeo" tabindex="-1" role="dialog">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h3 class="modal-title">Fondeo de caja</h3>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group form-float">
											<div class="form-line">
												<label for="fecha">Fecha</label>
												<input type="date" id="fecha" name="fecha" class="form-control datepicker">
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group form-float">
											<div class="form-line">
												<input type="text" name="monto" class="form-control datepicker">
												<label class="form-label">Monto</label>
											</div>
										</div>
									</div>

								</div>
							</div>
							<div class="modal-footer">
								<button type="" class="btn btn-primary">Agregar fondo</button>
							</div>

						</div>
					</div>
				</div>
				
				<!--TABLE EGRESOS-->
				<div class="card">
					<div class="header">
						<div class="row">
                                <div class="col-md-6">
                                   <h2>
                                        Egresos
                                    </h2> 
                                </div>
                                <div class="col-md-6 text-right">
                                    <button type="button" data-toggle="modal" data-target="#gasto" class="btn bg-teal waves-effect">
                                        <i class="material-icons">add_circle</i>
                                        <span>REGISTRAR GASTO</span>
                                    </button>
                                </div>
                            </div>
					</div>
					<div class="body">
						<table class="table">
							<tr class="bg-green">
								<th>Fecha</th>
								<th>Proveedor</th>
								<th>Cantidad</th>
								<th>Unidades</th>
								<th>Producto</th>
								<th>Precio Unitario</th>
								<th>Total</th>
							</tr>
							<tr>
								<td>10/01/2019</td>
								<td>Almacenadora de México</td>
								<td>20</td>
								<td>litros</td>
								<td>azufre</td>
								<td>$220.00</td>
								<td>$4,400.00</td>
							</tr>
							<tr>
								<td>10/01/2019</td>
								<td>Almacenadora de México</td>
								<td>20</td>
								<td>litros</td>
								<td>azufre</td>
								<td>$220.00</td>
								<td>$4,400.00</td>
							</tr>
							<tr>
										<td colspan="8" class="bg-green text-center"></td>
									</tr>
									
									<tr>
										<td colspan="5"></td>
										<th>Gran Total:</th>
										<th>$ 0.00</th>
										<td></td>
									</tr>
						</table>
						
						

					</div>

				</div>
				<!--Modal GASTO-->
				<div class="modal fade" id="gasto" tabindex="-1" role="dialog">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h3 class="modal-title">degistro de gasto</h3>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<div class="row">
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-6">
												<h6>Fecha: </h6>
												<br>
												<h6>Monto</h6>
												<br>
												<h6>Categoria</h6>
												<br>
												<br>
												<h6>Unidad</h6>
												<br>
												<h6>Recibio</h6>
												<br>
												<h6>Comentarios</h6>
											</div>
											<div class="col-md-6">
												<div class="form-group form-float">
													<div class="form-line">
														<input type="date" name="fecha_gasto" class="form-control datepicker">
													</div>
												</div>
												<div class="form-group form-float">
													<div class="form-line">
														<input type="text" name="monto_gasto" class="form-control datepicker">
														<label class="form-label">Monto</label>
													</div>
												</div>
												<div class="form-group">
													<div class="form-line">
														<select name="categoria" class="form-control show-tick">
															<option value="0">0</option>
															<option value="1">1</option>
														</select>                      
													</div>
												</div>
												<div class="form-group">
													<div class="form-line">
														<select name="unidad" class="form-control show-tick">
															<option value="0">0</option>
															<option value="1">1</option>
														</select>                      
													</div>
												</div>
												<div class="form-group">
													<div class="form-line">
														<select name="recibio" class="form-control show-tick">
															<option value="0">0</option>
															<option value="1">1</option>
														</select>                      
													</div>
												</div>
												<div class="form-group">
													<div class="form-line">
														<textarea class="form-control" rows="1"></textarea>                      
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="" class="btn btn-primary">Registrar gasto</button>
							</div>

						</div>
					</div>
				</div>

				<!-- BALANCE -->

				<div class="card">
					<div class="header">
						<h2>Balance</h2>
					</div>
					<div class="body">
						<div class="row ">
    
						 <div class="col-md-4" style="margin-bottom: 0">
					     	<div class="info-box bg-light-blue">
						        <div class="icon">
						            <i class="material-icons">trending_up</i>
						        </div>
						        <div class="content">
						            <div class="text">TOTAL INGRESOS</div>
						            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">200</div>
						        </div>
					    	</div>
						</div>
						<div class="col-md-4" style="margin-bottom: 0">
					     	<div class="info-box bg-red">
						        <div class="icon">
						            <i class="material-icons">trending_down</i>
						        </div>
						        <div class="content">
						            <div class="text">TOTAL EGRESOS</div>
						            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">200</div>
						        </div>
					    	</div>
						</div>
						<div class="col-md-4 text-center">
							 <div class="info-box bg-blue-grey">
						        <div class="icon">
						           <i class="material-icons">attach_money</i>
						        </div>
						        <div class="content">
						            <div class="text">SALDO</div>
						            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">200</div>
						        </div>
					    	</div>
						</div>
					</div>	
					
					</div>
				</div>

			</div>
		</section>

