<div class="content-wrapper">

	<section class="content-header">

		<div class="container-fluid">

			<div class="row mb-2">

				<div class="col-sm-6">

					<h1>VACUNACIÓN</h1>

				</div><!-- /.col-sm-6 -->

				<div class="col-sm-6">

					<ol class="breadcrumb float-sm-right">

						<li class="breadcrumb-item"><a href="inicio">Inicio</a></li>

						<li class="breadcrumb-item active">Vacunación</li>

					</ol>

				</div><!-- /.col-sm-6 -->

			</div><!-- /.row -->

		</div><!-- /.container-fluid -->

	</section>

	<section class="content">

		<div class="card">

			<div class="card-header">

				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarVacunacion">
					Registrar Vacunación
				</button>

				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
						<i class="fas fa-minus"></i>
					</button>

					<button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
						<i class="fas fa-times"></i>
					</button>
				</div><!-- /.card-tools -->

			</div><!-- /.card-header -->

			<div class="card-body">

				<table class="table table-bordered table-hover dataTable dtr-inline tablas example2" aria-describedby="example2_info" id="example2">

					<thead>
						<tr>
							<th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">
								<font style="vertical-align: inherit;">
									<font style="vertical-align: inherit;">#</font>
								</font>
							</th>

							<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">
								<font style="vertical-align: inherit;">
									<font style="vertical-align: inherit;">Mascota</font>
								</font>
							</th>

							<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">
								<font style="vertical-align: inherit;">
									<font style="vertical-align: inherit;">Veterinario(a)</font>
								</font>
							</th>

							<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">
								<font style="vertical-align: inherit;">
									<font style="vertical-align: inherit;">Tipo de Vacuna</font>
								</font>
							</th>

							<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">
								<font style="vertical-align: inherit;">
									<font style="vertical-align: inherit;">Fecha y Hora de Vacunación</font>
								</font>
							</th>

							<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">
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

						$vacunacion = ControladorVacunacion::ctrMostrarVacunacion($item, $valor);

						foreach ($vacunacion as $key => $value) {

							echo
							'<tr>
									<td>' . ($key + 1) . '</td>';

							$item = "id";
							$valor = $value["id_mascota"];
							$mascota = ControladorMascota::ctrMostrarMascota($item, $valor);
							echo '<td>' . $mascota["nombre"] . '</td>';

							$item = "id";
							$valor = $value["id_veterinario"];
							$veterinario = ControladorUsuarios::ctrMostrarMedicos($item, $valor);
							echo '<td>' . $veterinario["nombre"] . '</td>';

							$item = "id";
							$valor = $value["id_vacuna"];
							$vacuna = ControladorVacunas::ctrMostrarVacuna($item, $valor);
							echo '<td>' . $vacuna["nombre"] . '</td>

									<td class="datetime-uppercase">' . $value["fecha_vacunacion"] . '</td>
								
									<td>
										<div class="btn-group">
											<button title="Editar Vacunación" class="btn btn-warning btnEditarVacunacion" id="' . $value["id"] . '" data-toggle="modal" data-target="#modalEditarVacunacion">
												<i class="fa fa-solid fa-pen"style="color: white;"></i>
											</button>

											<button title="Eliminar Vacunación" class="btn btn-danger btnEliminarVacunacion" id="' . $value["id"] . '">
												<i class="fa fa-trash"style="color: white;"></i>
											</button>
										</div>
									</td>
						
								</tr>';
						}

						?>

					</tbody>

				</table>

			</div><!-- /.card-body -->

		</div><!-- /.card -->

	</section>
	<!-- /.content -->

</div><!-- /.content-wrapper -->

<!-- MODAL PARA AGREGAR NUEVA VACUNACIÓN -->
<div class="modal fade" id="modalAgregarVacunacion">
	<div class="modal-dialog">
		<div class="modal-content bg-primary">
			<form role="form" method="post">
				<div class="modal-header">
					<h4 class="modal-title">Registrar Vacunación</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div><!-- /.modal-header -->

				<div class="modal-body">
					<div class="form-group">
						<label for="exampleInputEmail1">
							<font style="vertical-align: inherit;">
								<font style="vertical-align: inherit;">Cliente</font>
							</font>
						</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fa fa-user text-primary" aria-hidden="true"></i></span>
							</div>

							<select class="form-control input-lg" id="NuevoCliente" name="NuevoCliente" required>

								<option value="">Seleccionar cliente</option>

								<?php
	
									$clientes = ControladorCliente::ctrMostrarCliente(null, null);

									foreach ($clientes as $key => $value) {
										echo '<option value="' . $value["id"] . '">' . $value["nombre"] . '</option>';
									}
								?>
							</select>

						</div>
					</div>


					<!-- Mascota -->
					<div class="form-group">
						<label for="exampleInputEmail1">
							<font style="vertical-align: inherit;">
								<font style="vertical-align: inherit;">Mascota</font>
							</font>
						</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fa fa-dog text-primary"></i></span>
							</div>

							<select class="form-control input-lg" id="NuevoMascota" name="NuevoMascota" required>

								<option value="">Seleccionar Mascota</option>

								<?php
								$item = null;
								$valor = null;
								$mascota = ControladorMascota::ctrMostrarMascota($item, $valor);

								foreach ($mascota as $key => $value) {
									echo '<option value="' . $value["id"] . '">' . $value["nombre"] . '</option>';
								}
								?>
							</select>

						</div>
					</div>

					<!-- Veterinario -->
					<div class="form-group">
						<label for="exampleInputEmail1">
							<font style="vertical-align: inherit;">
								<font style="vertical-align: inherit;">Veterinario</font>
							</font>
						</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fa fa-user-md text-primary"></i></span>
							</div>

							<select class="form-control input-lg" id="NuevoVeterinario" name="NuevoVeterinario" required>

								<option value="">Seleccionar Veterinario</option>

								<?php
								$item = null;
								$valor = null;
								$veterinario = ControladorUsuarios::ctrMostrarMedicos($item, $valor);

								foreach ($veterinario as $key => $value) {
									echo '<option value="' . $value["id"] . '">' . $value["nombre"] . '</option>';
								}
								?>
							</select>
						</div>
					</div>

					<!-- Tipo Vacuna -->
					<div class="form-group">
						<label for="exampleInputEmail1">
							<font style="vertical-align: inherit;">
								<font style="vertical-align: inherit;">Tipo de Vacuna</font>
							</font>
						</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fa fa-user-md text-primary"></i></span>
							</div>

							<select class="form-control input-lg" id="NuevoTipoVacuna" name="NuevoTipoVacuna" required>

								<option value="">Seleccionar tipo de Vacuna</option>

								<?php
								$item = null;
								$valor = null;
								$vacuna = ControladorVacunas::ctrMostrarVacuna($item, $valor);

								foreach ($vacuna as $key => $value) {
									echo '<option value="' . $value["id"] . '">' . $value["nombre"] . '</option>';
								}
								?>
							</select>
						</div>
					</div>
				</div><!-- /.modal-body -->

				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-outline-light">Guardar</button>
				</div><!-- /.modal-footer -->

				<?php
				$crearVacunacion = new ControladorVacunacion();
				$crearVacunacion->ctrCrearVacunacion();
				?>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- MODAL PARA EDITAR UNA VACUNACIÓN -->
<div class="modal fade" id="modalEditarVacunacion">
	<div class="modal-dialog">
		<div class="modal-content bg-primary">
			<form role="form" method="post">
				<div class="modal-header">
					<h4 class="modal-title">Editar Vacunación</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div><!-- /.modal-header -->

				<div class="modal-body">

					<!-- Mascota -->
					<div class="form-group">
						<label for="exampleInputEmail1">
							<font style="vertical-align: inherit;">
								<font style="vertical-align: inherit;">Mascota</font>
							</font>
						</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fa fa-dog text-primary"></i></span>
							</div>

							<select class="form-control input-lg" id="EditarMascota" name="EditarMascota">

								<option value="">Seleccione Mascota...</option>

								<?php
								$item = null;
								$valor = null;
								$mascota = ControladorMascota::ctrMostrarMascota($item, $valor);

								foreach ($mascota as $key => $value) {
									echo '<option value="' . $value["id"] . '">' . $value["nombre"] . '</option>';
								}
								?>
							</select>

							<input type="hidden" id="idVacunacion" name="idVacunacion">
						</div>
					</div>

					<!-- Veterinario -->
					<div class="form-group">
						<label for="exampleInputEmail1">
							<font style="vertical-align: inherit;">
								<font style="vertical-align: inherit;">Veterinario</font>
							</font>
						</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fa fa-user-md text-primary"></i></span>
							</div>

							<select class="form-control input-lg" id="EditarVeterinario" name="EditarVeterinario">

								<option value="">Seleccione Veterinario...</option>

								<?php
								$item = null;
								$valor = null;
								$veterinario = ControladorUsuarios::ctrMostrarMedicos($item, $valor);

								foreach ($veterinario as $key => $value) {
									echo '<option value="' . $value["id"] . '">' . $value["nombre"] . '</option>';
								}
								?>
							</select>
						</div>
					</div>

					<!-- Tipo de Vacuna -->
					<div class="form-group">
						<label for="exampleInputEmail1">
							<font style="vertical-align: inherit;">
								<font style="vertical-align: inherit;">Tipo de Vacuna</font>
							</font>
						</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fa fa-user-md text-primary"></i></span>
							</div>

							<select class="form-control input-lg" id="EditarTipoVacuna" name="EditarTipoVacuna">

								<option value="">Seleccione tipo de Vacuna...</option>

								<?php
								$item = null;
								$valor = null;
								$vacuna = ControladorVacunas::ctrMostrarVacuna($item, $valor);

								foreach ($vacuna as $key => $value) {
									echo '<option value="' . $value["id"] . '">' . $value["nombre"] . '</option>';
								}
								?>
							</select>
						</div>
					</div>

				</div><!-- /.modal-body -->

				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-outline-light">Editar</button>
				</div>

				<?php
				$editarVacunacion = new ControladorVacunacion();
				$editarVacunacion->ctrEditarVacunacion();
				?>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php
$borrarVacunacion = new ControladorVacunacion();
$borrarVacunacion->ctrBorrarVacunacion();
?>