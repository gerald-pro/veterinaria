<div class="content-wrapper">
	
	<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
		<div class="col-sm-6">
			<h1>ESPECIALIDADES</h1>
		</div>
		<div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
				<li class="breadcrumb-item active">Especialidades</li>
			</ol>
		</div>
		</div>
	</div><!-- /.container-fluid -->
	</section>

	<section class="content">

		<div class="card">

			<div class="card-header">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarEspecialidad">
					Registrar Especialidad
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
									<font style="vertical-align: inherit;">Nombre de Especialidad</font>
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

							$consultorios = ControladorConsultorios::ctrMostrarConsultorio($item, $valor);

							foreach ($consultorios as $key => $value) {

								echo 
								'<tr>
									<td>' . ($key + 1) . '</td>

									<td>' . $value["nombre"] . '</td>

									<td>
										<div class="btn-group">
											<button title="Editar Especialidad" class="btn btn-warning btnEditarConsultorio" id="' . $value["id"] . '" data-toggle="modal" data-target="#modalEditarEspecialidad">
												<i class="fa fa-solid fa-pen"style="color: white;"></i>
											</button>

											<button title="Eliminar Especialidad" class="btn btn-danger btnEliminarConsultorio" id="' . $value["id"] . '">
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

<!-- MODAL PARA AGREGAR NUEVA ESPECIALIDAD -->
<div class="modal fade" id="modalAgregarEspecialidad">
	<div class="modal-dialog">
    	<div class="modal-content bg-primary">
      		<form role="form" method="post">
        		<div class="modal-header">
          			<h4 class="modal-title">Registrar Especialidad</h4>
          			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
            			<span aria-hidden="true">×</span>
          			</button>
        		</div><!-- /.modal-header -->

        		<div class="modal-body">
				
					<!-- Nombre de la Especialidad -->
					<div class="form-group">
            			<label for="exampleInputEmail1">
							<font style="vertical-align: inherit;">
								<font style="vertical-align: inherit;">Nombre de la Especialidad</font>
							</font>
            			</label>
            			<input type="text" class="form-control" id="NombreEspecialidad" name="NombreEspecialidad" placeholder="Ingrese nombre de la especialidad">
          			</div>
        		</div><!-- /.modal-body -->

				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-outline-light">Guardar</button>
				</div><!-- /.modal-footer -->

				<?php
					$crearConsultorio = new ControladorConsultorios();
					$crearConsultorio->ctrCrearConsultorio(); 
				?>
      		</form>
    	</div><!-- /.modal-content -->
  	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- MODAL PARA EDITAR UNA ESPECIALIDAD -->
<div class="modal fade" id="modalEditarEspecialidad">
  	<div class="modal-dialog">
  		<div class="modal-content bg-primary">
      		<form role="form" method="post">
        		<div class="modal-header">
          			<h4 class="modal-title">Editar Especialidad</h4>
          			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
            			<span aria-hidden="true">×</span>
          			</button>
        		</div><!-- /.modal-header -->

        		<div class="modal-body">
				
					<!-- Nombre de la Especialidad -->
					<div class="form-group">
            			<label for="exampleInputEmail1">
							<font style="vertical-align: inherit;">
								<font style="vertical-align: inherit;">Nombre de la especialidad</font>
							</font>
            			</label>
            			<input type="text" class="form-control" id="EditarNombreEspecialidad" name="EditarNombreEspecialidad">

						<input type="hidden" id="idEspecialidad" name="idEspecialidad">
          			</div>
        		</div><!-- /.modal-body -->

				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-outline-light">Editar</button>
				</div>

				<?php
					$editarConsultorio = new ControladorConsultorios();
					$editarConsultorio->ctrEditarConsultorio();  
				?>
      		</form>
    	</div><!-- /.modal-content -->
  	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php
	$borrarConsultorio = new ControladorConsultorios();
	$borrarConsultorio->ctrBorrarConsultorio(); 
?> 