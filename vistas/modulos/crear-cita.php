<style>
	/* .btn-primary {
		color: #fff;
		background-color: #17a2b8;
		border-color: #17a2b8;
		box-shadow: none;
	} */

	/* .btn-primary:hover {
  		color: #fff;
  		background-color: #0a616c;
  		border-color: #09525b;
	} */

	/* .btn-primary:not(:disabled):not(.disabled).active:focus, .btn-primary:not(:disabled):not(.disabled):active:focus, .show > .btn-primary.dropdown-toggle:focus {
		box-shadow: 0 0 0 0 rgba(27, 115, 119, 0.5);
	} */

	/* .btn-primary:not(:disabled):not(.disabled).active, .btn-primary:not(:disabled):not(.disabled):active, .show > .btn-primary.dropdown-toggle {
  		color: #fff;
  		background-color: #226464;
  		border-color: #176976;
	} */

	/* .btn-primary.disabled, .btn-primary:disabled {
  		color: #fff;
  		background-color: #12515f;
  		border-color: #11606d;
	} */

	/* .btn-primary.focus, .btn-primary:focus {
		color: #fff;
		background-color: #235f6d;
		border-color: #186f78;
		box-shadow: 0 0 0 0 rgba(13, 63, 68, 0.5);
	} */

	/* .fc-v-event {
		display: block;
		border: 1px solid #3788d8;
		border: 1px solid var(--fc-event-border-color, #1f6067);
		background-color: #3788d8;
		background-color: var(--fc-event-bg-color, #2c726e);
	} */

	/* .fc-daygrid-event-dot {
		margin: 0 4px;
		box-sizing: content-box;
		width: 0;
		height: 0;
		border: 4px solid #3788d8;
		border: calc(var(--fc-daygrid-event-dot-width, 8px) / 2) solid var(--fc-event-border-color, #23878c);
		border-radius: 4px;
		border-radius: calc(var(--fc-daygrid-event-dot-width, 8px) / 2);
	} */
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">

					<?php
					$item_m = "id";
					$valor_m = $_GET["idMedico"];
					$medico = ControladorMedicos::ctrMostrarMedicos($item_m, $valor_m);

					/* Obtiene el registro de los usuarios de perfil medico que conrrespondan al id del medico */
					$item_n = "id";
					$valor_n = $valor_m;
					$usuario_medico = ControladorUsuarios::ctrMostrarMedicos($item_n, $valor_n);

					echo '<h1> Citas Veterinario: <p class="text-primary d-inline">' . $usuario_medico["nombre"] . '</p></h1>';

					/* Se obtiene los registros de los Horarios del medico mediante su id */
					$horariosmedico = ControladorHorarios::ctrMostrarHorariosMedico($valor_m);

					$citasmedico = ControladorCitas::ctrMostrarCitasMedico($valor_m);

					//include "conexao.php";
					/*$consulta = $conexao->query("SELECT c.id, c.inicio, c.fin, c.id_paciente,  p.nombre FROM citas c, pacientes p WHERE c.id_paciente= p.id and c.id_medico=$valor_m;"); */
					/*$consulta_h = $conexao->query("SELECT id, entrada, salida, dia, estado, id_medico FROM horarios h  WHERE h.id_medico=$valor_m;"); */
					?>

				</div><!-- /.col-sm-6 -->

				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
						<li class="breadcrumb-item active">Crear Cita</li>
					</ol>
				</div>
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">

		<!-- Default box -->
		<div class="card">

			<!-- <div class="card-header">
          		<div class="card-tools">
            		<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              			<i class="fas fa-minus"></i>
            		</button>
            		<button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              			<i class="fas fa-times"></i>
            		</button>
          		</div>
        	</div> -->

			<div class="card-body">

				<script>
					$(function() {

						/* initialize the external events */
						function ini_events(ele) {
							ele.each(function() {
								// create an Event Object (https://fullcalendar.io/docs/event-object)
								// it doesn't need to have a start or end
								var eventObject = {
									title: $.trim($(this).text()) // use the element's text as the event title
								}

								// store the Event Object in the DOM element so we can get to it later
								$(this).data('eventObject', eventObject)

								// make the event draggable using jQuery UI
								$(this).draggable({
									zIndex: 1070,
									revert: true, // will cause the event to go back to its
									revertDuration: 0 //  original position after the drag
								})

							})
						}

						ini_events($('#external-events div.external-event'))
						/* initialize the calendar */
						//Date for the calendar events (dummy data)
						var date = new Date()
						var d = date.getDate(),
							m = date.getMonth(),
							y = date.getFullYear()

						//const urlSearchParams = new URLSearchParams(window.location.search);
						// const id = urlSearchParams.get("idMedico");
						//console.log("El idMedico es..:", id);

						var Calendar = FullCalendar.Calendar;
						//var Draggable = FullCalendar.Draggable;

						var containerEl = document.getElementById('external-events');
						var checkbox = document.getElementById('drop-remove');
						var calendarEl = document.getElementById('calendar');
						var initialLocaleCode = 'es';

						// initialize the external events

						/*new Draggable(containerEl, {
						itemSelector: '.external-event',
						eventData: function(eventEl) {
							return {
							title: eventEl.innerText,
							backgroundColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
							borderColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
							textColor: window.getComputedStyle( eventEl ,null).getPropertyValue('color'),
							};
						}
						});*/

						var calendar = new Calendar(calendarEl, {
							locale: initialLocaleCode,
							headerToolbar: {
								left: 'prev, next, today',
								center: 'title',
								right: 'dayGridMonth,timeGridWeek,timeGridDay'
							},

							defaultView: 'agendaWeek',
							businessHours: true,
							themeSystem: 'bootstrap',
							//Random default events
							businessHours: [ // specify an array instead
								<?php
								foreach ($horariosmedico  as $key => $value) {
								?> {
										daysOfWeek: '<?php echo $value['dia']; ?>',
										startTime: '<?php echo $value['entrada']; ?>',
										endTime: '<?php echo $value['salida']; ?>',
									},
								<?php
								}
								?>
							],

							events: [
								<?php
								// while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) { 
								foreach ($citasmedico as $key => $value) {
								?> {
										id: '<?php echo $value['id']; ?>',
										title: '<?php echo $value['nombre']; ?>',
										start: '<?php echo $value['inicio']; ?>',
										end: '<?php echo $value['fin']; ?>',
									},
								<?php
								}
								?>
							],

							backgroundColor: '#f39c12',
							editable: true,
							droppable: true, // this allows things to be dropped onto the calendar !!!
							drop: function(info) {
								// is the "remove after drop" checkbox checked?
								if (checkbox.checked) {
									// if so, remove the element from the "Draggable Events" list
									info.draggedEl.parentNode.removeChild(info.draggedEl);
								}
							},
							selectable: true,
							selectHelper: true,
							select: function(info) {
								$('#fechaInicio').val(moment(info.start).format('YYYY-MM-DD HH:mm:ss'));
								$('#fechaFin').val(moment(info.end).format('YYYY-MM-DD HH:mm:ss'));
								$('#modalAgregarCita').modal();
							},

							/* dateClick: function(info) {
							$('#fechaInicio').val(moment(info.start).format('YYYY-MM-DD HH:mm:ss'));
							$('#fechaFin').val(moment(info.end).format('YYYY-MM-DD HH:mm:ss'));
							$('#modalAgregarCita').modal();
							}, */

							eventClick: function(info) {
								var id = info.event.id;
								eliminarCita(id);
								//info.event.remove();
							}
						});

						calendar.render();

					});

					$(document).ready(function() {
						$('#seleccionarCliente').change(function() {
							var idCliente = $(this).val();

							if (idCliente !== '') {
								$.ajax({
									url: 'ajax/mascota.ajax.php',
									method: 'POST',
									data: {
										idClienteMascotas: idCliente
									},
									dataType: 'json',
									success: function(response) {
										console.log(response);

										$('#seleccionarMascota').empty();
										$('#seleccionarMascota').append('<option value="">Seleccionar Mascota</option>');

										$.each(response, function(index, mascota) {
											console.log(mascota);
											
											$('#seleccionarMascota').append('<option value="' + mascota.id + '">' + mascota.nombre + '</option>');
										});
									},
									error: function(jqXHR, textStatus, errorThrown) {
										console.error("Error al obtener mascotas: ", textStatus, errorThrown);
										console.log("Detalles del error:", jqXHR.responseText);
										alert('Hubo un error al obtener las mascotas. Revisa la consola para más detalles.');
									}
								});
							} else {
								$('#seleccionarMascota').empty();
								$('#seleccionarMascota').append('<option value="">Seleccionar Mascota</option>');
							}
						});
					});

					function eliminarCita(id) {
						var idCita = id;

						swal({
							title: '¿Está seguro de borrar la cita?',
							text: "¡Si no lo está puede cancelar la accíón!",
							type: 'warning',
							showCancelButton: true,
							confirmButtonColor: '#3085d6',
							cancelButtonColor: '#d33',
							cancelButtonText: 'Cancelar',
							confirmButtonText: 'Si, borrar cita!'
						}).then(function(result) {
							if (result.value) {
								//alert(usuario);
								window.location = "index.php?rutas=citas&idCita=" + idCita;
							}
						})
					}
				</script>

				<div id="calendar" width="100%"></div>
				<!-- <script src="vistas/js/calendario.js"></script> -->

			</div><!-- /.card-body -->

		</div><!-- /.card -->

	</section><!-- /.content -->

</div><!-- /.content-wrapper -->

<!--======= MODAL AGREGAR USUARIO =======-->
<div id="modalAgregarCita" class="modal fade" role="dialog">

	<div class="modal-dialog">

		<div class="modal-content">

			<form role="form" method="post" enctype="multipart/form-data">

				<!--=====================================
							CABEZA DEL MODAL
				======================================-->
				<div class="modal-header">
					<h5 class="modal-title">Agregar Cita</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<!--=====================================
							CUERPO DEL MODAL
				======================================-->
				<div class="modal-body">
					<!-- ENTRADA PARA EL MEDICO-->
					<div class="form-group">
						<input type="hidden" id="id_Medico" name="id_Medico" value="<?php echo $_GET["idMedico"] ?>">
					</div>

					<div class="form-group">
						<label for="exampleInputEmail1">
							<font style="vertical-align: inherit;">
								<font style="vertical-align: inherit;">Cliente</font>
							</font>
						</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
							</div>

							<select class="form-control input-lg" id="seleccionarCliente" name="seleccionarCliente" required>
								<option value="">Seleccionar cliente</option>
								<?php
								$clientes = ControladorCliente::ctrMostrarCliente(null, null);
								foreach ($clientes as $key => $value) {
									echo '<option value="' . $value["id"] . '">' . $value["nombre"] . ' ' . $value["apellido"]  . '</option>';
								}
								?>
							</select>
						</div>
					</div>


					<!-- ENTRADA PARA SELECCIONAR MASCOTA -->
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fa fa-users"></i></span>
							</div>
							<select class="form-control" id="seleccionarMascota" name="seleccionarMascota" required>
								<option value="">Seleccionar mascota</option>
							</select>
						</div>
					</div>

					<!-- FECHA INICIO -->
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fa fa-calendar"></i></span>
							</div>
							<input type="text" class="form-control input-lg" name="fechaInicio" id="fechaInicio" readonly>
						</div>
					</div>

					<!-- FECHA FIN -->
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fa fa-calendar"></i></span>
							</div>
							<input type="text" class="form-control input-lg" name="fechaFin" id="fechaFin" readonly>
						</div>
					</div>

				</div><!-- /.modal-body -->

				<!--=====================================
							PIE DEL MODAL
				======================================-->

				<div class="modal-footer justify-content-end">

					<button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Salir</button>

					<button type="submit" class="btn btn-primary">Pedir Cita</button>
				</div>

				<?php
				$crearCita = new ControladorCitas();
				$crearCita->ctrCrearCita();
				?>

			</form>

		</div><!-- /.modal-content -->

	</div><!-- /.modal-dialog -->

</div><!-- /.modal -->