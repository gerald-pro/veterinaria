<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<!-- Content Header (Page header) -->
  	<section class="content-header">
    	<div class="container-fluid">
      		<div class="row mb-2">
        		<div class="col-sm-6">
          			<h1>MASCOTA</h1>
        		</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
						<li class="breadcrumb-item active">Mascota</li>
					</ol>
				</div>
      		</div>
    	</div><!-- /.container-fluid -->
  	</section>

  	<!-- Main content -->
  	<section class="content">

    	<!-- Default box -->
    	<div class="card">

      		<div class="card-header">
        		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarMascota">
					Registrar Mascota
				</button>

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
          			<thead>
						<tr>
							<!-- # -->
							<th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
								aria-sort="ascending"
								aria-label="Motor de renderizado: actívelo para ordenar las columnas de forma descendente">
								<font style="vertical-align: inherit;">
									<font style="vertical-align: inherit;">#</font>
								</font>
							</th>

							<!-- Nombre -->
							<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
								aria-label="Navegador: activar para ordenar las columnas de forma ascendente">
								<font style="vertical-align: inherit;">
									<font style="vertical-align: inherit;">Nombre</font>
								</font>
							</th>

							<!-- Sexo -->
							<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
								aria-label="Plataforma(s): activar para ordenar la columna de forma ascendente">
								<font style="vertical-align: inherit;">
									<font style="vertical-align: inherit;">Sexo</font>
								</font>
							</th>

							<!-- Raza -->
							<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
								aria-label="Versión del motor: activar para ordenar columnas de forma ascendente">
								<font style="vertical-align: inherit;">
									<font style="vertical-align: inherit;">Raza</font>
								</font>
							</th>

							<!-- Especie -->
							<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
								aria-label="Calificación CSS: activar para ordenar las columnas de forma ascendente">
								<font style="vertical-align: inherit;">
									<font style="vertical-align: inherit;">Especie</font>
								</font>
							</th>

							<!-- Fecha de Nacimiento -->
							<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
								aria-label="Calificación CSS: activar para ordenar las columnas de forma ascendente">
								<font style="vertical-align: inherit;">
									<font style="vertical-align: inherit;">Fecha de Nacimiento</font>
								</font>
							</th>

							<!-- Cliente -->
							<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
								aria-label="Calificación CSS: activar para ordenar las columnas de forma ascendente">
								<font style="vertical-align: inherit;">
									<font style="vertical-align: inherit;">Cliente</font>
								</font>
							</th>

							<!-- Acciones -->
							<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
								aria-label="Calificación CSS: activar para ordenar las columnas de forma ascendente">
								<font style="vertical-align: inherit;">
									<font style="vertical-align: inherit;">Acciones</font>
								</font>
							</th>
						</tr>
          			</thead>
          			
					<tbody>
            			<?php

            				$item = null;
            				$valor = null;

            				$mascota = ControladorMascota::ctrMostrarMascota($item, $valor);

            				foreach ($mascota as $key => $value) {

								$fecha = date("d/m/Y", strtotime($value["fechanacimiento"]));

              					echo 
								'<tr>
									<td>' . ($key + 1) . '</td>
									<td class="text-uppercase">' . $value["nombre"] . '</td>
									<td class="text-uppercase">' . $value["sexo"] . '</td>
									<td class="text-uppercase">' . $value["raza"] . '</td>
									<td class="text-uppercase">' . $value["especie"] . '</td>
									<td class="date-uppercase">' . $fecha . '</td>';

									$item = "id";
									$valor = $value["id_cliente"];

									$cliente = ControladorCliente::ctrMostrarCliente($item, $valor);

									echo
									'<td>' . $cliente["nombre"] . " " . $cliente["apellido"] . '</td>

									<td>
										<div class="btn-group">
											<button class="btn btn-warning btnEditarMascota" id="' . $value["id"] . '" data-toggle="modal" data-target="#modalEditarMascota"><i class="fa fa-solid fa-pen"style="color: white;"></i></button>
											<button class="btn btn-danger btnEliminarMascota" id="' . $value["id"] . '"><i class="fa fa-trash"style="color: white;"></i></button>
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

<!-- MODAL PARA AGREGAR NUEVA MASCOTA -->
<div class="modal fade" id="modalAgregarMascota">
	<div class="modal-dialog">
    	<div class="modal-content bg-primary">
      		<form role="form" method="post">
        		<div class="modal-header">
          			<h4 class="modal-title">Registrar Mascota</h4>
          			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
            			<span aria-hidden="true">×</span>
          			</button>
        		</div>

        		<div class="modal-body">
					<!-- Nombre -->
          			<div class="form-group">
            			<label for="exampleInputEmail1">
							<font style="vertical-align: inherit;">
								<font style="vertical-align: inherit;">Nombre</font>
							</font>
            			</label>
            			<input type="text" class="form-control" id="NuevoNombre" name="NuevoNombre" placeholder="Ingrese Nombre">
          			</div>
					
					<!-- Sexo -->
					<div class="form-group">
                        <label for="exampleInputEmail1">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Sexo</font>
                            </font>
                        </label>
                        <select class="form-control input-lg" name="NuevoSexo" required>

                            <option value="">Selecionar sexo</option>

                            <option value="Macho">Macho</option>

                            <option value="Hembra">Hembra</option>

                        </select>
                    </div>
					
					<!-- Raza -->
					<div class="form-group">
						<label for="exampleInputEmail1">
							<font style="vertical-align: inherit;">
								<font style="vertical-align: inherit;">Raza</font>
							</font>
						</label>
						<input type="text" class="form-control" id="NuevoRaza" name="NuevoRaza" placeholder="Ingrese Raza">
					</div>
					
					<!-- Especie -->
					<div class="form-group">
                        <label for="exampleInputEmail1">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Especie</font>
                            </font>
                        </label>
                        <select class="form-control input-lg" name="NuevoEspecie" required>

                            <option value="">Selecionar especie</option>

                            <option value="Canino">Canino</option>

                            <option value="Gatuno">Felino</option>

                        </select>
                    </div>
					
					<!-- Fecha de Nacimiento -->
					<div class="form-group">
						<label for="exampleInputEmail1">
							<font style="vertical-align: inherit;">
								<font style="vertical-align: inherit;">Fecha de Nacimiento</font>
							</font>
						</label>
						<input type="date" class="form-control" id="NuevoFechanacimiento" name="NuevoFechanacimiento"
						placeholder="Ingrese Fecha Nacimiento" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask>
					</div>

					<!-- ENTRADA PARA SELECCIONAR CLIENTE -->
					
					<div class="form-group">
						<label for="exampleInputEmail1">
							<font style="vertical-align: inherit;">
								<font style="vertical-align: inherit;">Cliente</font>
							</font>
						</label>
						<div class="input-group">
							<div class="input-group-prepend">
                				<span class="input-group-text"><i class="fa fa-user text-primary"></i></span> 
                			</div>
							
							<select class="form-control input-lg" id="nuevoCliente" name="nuevoCliente" required>
								
								<option value="">Seleccionar Cliente</option>
								<?php

								$item = null;
								$valor = null;

								$cliente = ControladorCliente::ctrMostrarCliente($item, $valor);

								foreach ($cliente as $key => $value) {

									 echo '<option value="' . $value["id"] . '">' . $value["nombre"] . ' ' . $value["apellido"] . '</option>';
									
								}

								?>
							</select>

						</div>

					</div>

        		</div>

				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-outline-light">Guardar</button>
				</div>

				<?php
					$crearMascota = new ControladorMascota();
					$crearMascota->ctrCrearMascota();
				?>
      		</form>
    	</div><!-- /.modal-content -->
  	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- MODAL PARA EDITAR UNA MASCOTA -->
<div class="modal fade" id="modalEditarMascota">
	<div class="modal-dialog">
  		<div class="modal-content bg-primary">
      		<form role="form" method="post">
        		<div class="modal-header">
          			<h4 class="modal-title">Editar Mascota</h4>
          			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
            			<span aria-hidden="true">×</span>
          			</button>
        		</div>

        		<div class="modal-body">
								
				    <!-- Nombre -->
          			<div class="form-group">
						<label for="exampleInputEmail1">
							<font style="vertical-align: inherit;">
								<font style="vertical-align: inherit;">Nombre</font>
							</font>
						</label>
            			<input type="text" class="form-control" id="EditarNombre" name="EditarNombre" placeholder="Ingrese Nombre">
            			<input type="hidden" name="id" id="id" required>
          			</div>
					
					<!-- Sexo -->
					<div class="form-group">
						<label for="exampleInputEmail1">
							<font style="vertical-align: inherit;">
								<font style="vertical-align: inherit;">Sexo</font>
							</font>
						</label>
						<input type="text" class="form-control" id="EditarSexo" name="EditarSexo" placeholder="Ingrese Sexo">
					</div>
					
					<!-- Raza -->
					<div class="form-group">
						<label for="exampleInputEmail1">
							<font style="vertical-align: inherit;">
								<font style="vertical-align: inherit;">Raza</font>
							</font>
						</label>
						<input type="text" class="form-control" id="EditarRaza" name="EditarRaza" placeholder="Ingrese Raza">
					</div>
					
					<!-- Especie -->
					<div class="form-group">
						<label for="exampleInputEmail1">
							<font style="vertical-align: inherit;">
								<font style="vertical-align: inherit;">Especie</font>
							</font>
						</label>
						<input type="text" class="form-control" id="EditarEspecie" name="EditarEspecie" placeholder="Ingrese Especie">
					</div>

					<div class="form-group">
						<label for="exampleInputEmail1">
							<font style="vertical-align: inherit;">
								<font style="vertical-align: inherit;">Fecha de Nacimiento</font>
							</font>
						</label>
						<input type="date" class="form-control" id="EditarFechanacimiento" name="EditarFechanacimiento"
							placeholder="Ingrese Fecha de Nacimiento" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask>
					</div>

        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-outline-light">Editar</button>
        </div>

        <?php

        $editarMascota = new ControladorMascota();
        $editarMascota->ctrEditarMascota();

        ?>

      </form>

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<?php

$borrarMascota = new ControladorMascota();
$borrarMascota->ctrBorrarMascota();

?>