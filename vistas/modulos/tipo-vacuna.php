<div class="content-wrapper">
	
	<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
		<div class="col-sm-6">
			<h1>VACUNAS</h1>
		</div>
		<div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
				<li class="breadcrumb-item active">Vacunas</li>
			</ol>
		</div>
		</div>
	</div><!-- /.container-fluid -->
	</section>

	<section class="content">

		<div class="card">

			<div class="card-header">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarVacuna">
					Registrar Vacuna
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
							<th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">
								<font style="vertical-align: inherit;">
									<font style="vertical-align: inherit;">#</font>
								</font>
							</th>

							<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">
								<font style="vertical-align: inherit;">
									<font style="vertical-align: inherit;">Nombre de Vacuna</font>
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

							$vacunas = ControladorVacunas::ctrMostrarVacuna($item, $valor);

							foreach ($vacunas as $key => $value) {

								echo 
								'<tr>
									<td>' . ($key + 1) . '</td>

									<td>' . $value["nombre"] . '</td>

									<td>
										<div class="btn-group">
											<button title="Editar Vacuna" class="btn btn-warning btnEditarVacuna" id="' . $value["id"] . '" data-toggle="modal" data-target="#modalEditarVacuna">
												<i class="fa fa-solid fa-pen"style="color: white;"></i>
											</button>

											<button title="Eliminar Vacuna" class="btn btn-danger btnEliminarVacuna" id="' . $value["id"] . '">
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

<!-- MODAL PARA AGREGAR NUEVA VACUNA -->
<div class="modal fade" id="modalAgregarVacuna">
	<div class="modal-dialog">
    	<div class="modal-content bg-primary">
      		<form role="form" method="post">
        		<div class="modal-header">
          			<h4 class="modal-title">Registrar Vacuna</h4>
          			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
            			<span aria-hidden="true">×</span>
          			</button>
        		</div><!-- /.modal-header -->

        		<div class="modal-body">
				
					<!-- Nombre de la Vacuna -->
					<div class="form-group">
            			<label for="exampleInputEmail1">
							<font style="vertical-align: inherit;">
								<font style="vertical-align: inherit;">Nombre de la Vacuna</font>
							</font>
            			</label>
            			<input type="text" class="form-control" id="NombreVacuna" name="NombreVacuna" placeholder="Ingrese nombre de la vacuna">
          			</div>
        		</div><!-- /.modal-body -->

				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-outline-light">Guardar</button>
				</div><!-- /.modal-footer -->

				<?php
					$crearVacuna = new ControladorVacunas();
					$crearVacuna->ctrCrearVacuna();
				?>
      		</form>
    	</div><!-- /.modal-content -->
  	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- MODAL PARA EDITAR UNA VACUNACIÓN -->
<div class="modal fade" id="modalEditarVacuna">
  	<div class="modal-dialog">
  		<div class="modal-content bg-primary">
      		<form role="form" method="post">
        		<div class="modal-header">
          			<h4 class="modal-title">Editar Vacuna</h4>
          			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
            			<span aria-hidden="true">×</span>
          			</button>
        		</div><!-- /.modal-header -->

        		<div class="modal-body">
				
					<!-- Nombre de la Vacuna -->
					<div class="form-group">
            			<label for="exampleInputEmail1">
							<font style="vertical-align: inherit;">
								<font style="vertical-align: inherit;">Nombre de la vacuna</font>
							</font>
            			</label>
            			<input type="text" class="form-control" id="EditarNombreVacuna" name="EditarNombreVacuna">

						<input type="hidden" id="idVacuna" name="idVacuna">
          			</div>
        		</div><!-- /.modal-body -->

				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-outline-light">Editar</button>
				</div>

				<?php
					$editarVacuna = new ControladorVacunas();
					$editarVacuna->ctrEditarVacuna(); 
				?>
      		</form>
    	</div><!-- /.modal-content -->
  	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php
	$borrarVacuna = new ControladorVacunas();
	$borrarVacuna->ctrBorrarVacuna(); 
?> 