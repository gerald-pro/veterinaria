<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<!-- Content Header -->
    <section class="content-header">

    	<div class="container-fluid">
    		<div class="row mb-2">
				<div class="col-sm-6">
					<h1>ADMINISTRAR PAGOS</h1>
				</div>

          		<div class="col-sm-6">
            		<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
						<li class="breadcrumb-item active">Administrar Pagos</li>
            		</ol>
          		</div>
        	</div><!-- /.row -->
      	</div><!-- /.container-fluid -->

    </section>

    <!-- Main content -->
    <section class="content">

		<!-- Default box -->
		<div class="card">
        
			<div class="card-header">

                <a href="crear-pago">
                    <button class="btn btn-primary pull-right">
                        <span class="fas fa-cash-register mr-1"></span>Nuevo pago de Servicio
                    </button>
                </a>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

			</div><!-- /.card-header -->

			<div class="card-body">
		
				<table class="table table-bordered table-hover dataTable dtr-inline tablas example2" aria-describedby="example2_info" id="example2">
			
					<thead style="text-align: center;">
			
						<tr>

                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Motor de renderizado: actívelo para ordenar las columnas de forma descendente">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">#</font>
                                </font>
                            </th>

                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Navegador: activar para ordenar las columnas de forma ascendente">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">N° de Pago</font>
                                </font>
                            </th>

                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Versión del motor: activar para ordenar columnas de forma ascendente">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Secretaria</font>
                                </font>
                            </th>

                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Versión del motor: activar para ordenar columnas de forma ascendente">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Veterinario(a)</font>
                                </font>
                            </th>

                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Versión del motor: activar para ordenar columnas de forma ascendente">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Cliente</font>
                                </font>
                            </th>

                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Versión del motor: activar para ordenar columnas de forma ascendente">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Fecha</font>
                                </font>
                            </th>

                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Versión del motor: activar para ordenar columnas de forma ascendente">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Pago Total</font>
                                </font>
                            </th>

                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Versión del motor: activar para ordenar columnas de forma ascendente">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Forma de pago</font>
                                </font>
                            </th>

                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Calificación CSS: activar para ordenar las columnas de forma ascendente">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Acciones</font>
                                </font>
                            </th>

						</tr> 

					</thead>

					<tbody style="text-align: center;">

						<?php

							$item = null;
							$valor = null;

							$respuesta = ControladorPagos::ctrMostrarPagos($item, $valor);

								foreach ($respuesta as $key => $value) {

									$fechaFormateada = date("d / m / Y H:i:s", strtotime($value["fecha"]));
					
						echo   '<tr>
									<td>' . ($key + 1) . '</td>
                                    
                                    <td>' . $value["numeroPago"] . '</td>';

                                    $itemUsuario = "id";
                                    $valorUsuario = $value["idcajera"];

                                    $respuestaUsuario = ControladorUsuarios::ctrMostrarUsuarios($itemUsuario, $valorUsuario);
                        
                        echo       '<td class="text-uppercase">' . $respuestaUsuario["nombre"] . '</td>';

									$itemUsuario = "id";
									$valorUsuario = $value["idmedico"];

									$respuestaUsuario = ControladorUsuarios::ctrMostrarUsuarios($itemUsuario, $valorUsuario);
						
						echo 		'<td class="text-uppercase">' . $respuestaUsuario["nombre"] . '</td>';

                                    $itemCliente = "id";
                                    $valorCliente = $value["idcliente"];

                                    $respuestaCliente = ControladorCliente::ctrMostrarCliente($itemCliente, $valorCliente);

                        echo       '<td class="text-uppercase">' . $respuestaCliente["nombre"] . " " . $respuestaCliente["apellido"] . '</td>

									<td>' . $fechaFormateada . '</td>

                                    <td style="text-align:center">Bs '.number_format($value["total"],2). '</td>

                                    <td>' . $value["metodo_pago"] . '</td>

									<td>

										<div class="btn-group">
											
											<a href="factura.php?id_pago='.$value["idpagoservicio"].'&numeroPago='.$value["numeroPago"] . '" target="_blank" class="btn btn-success btn-sm">
												<i class="fa fa-print"></i> Generar Boleta de Pago
											</a>
										
										</div>  

									</td>

								</tr>';

								}

							?> 

					</tbody> 

				</table>

			</div><!-- /.card-body -->

      	</div><!-- /.card -->

    </section><!-- /.content -->

</div><!-- /.content-wrapper -->


<?php

		/* $eliminarPago = new ControladorPagos();
		$eliminarPago -> ctrEliminarPago() */

?> 


