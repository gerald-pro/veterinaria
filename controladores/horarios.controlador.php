<?php

	class ControladorHorarios {

		/*=============================================
						CREAR HORARIOS
		=============================================*/
		static public function ctrCrearHorarios() {
			if (isset($_POST["carnetP"])) {

				if (
					preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombreP"]) &&
					preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["apellidoP"])
				) {

					$tabla = "Horario";

					$datos = array(
						"documento" => $_POST["carnetP"],
						"nombres" => $_POST["nombreP"],
						"apellidos" => $_POST["apellidoP"],
						"telefono" => $_POST["telefonoP"],
						"direccion" => $_POST["domicilioP"],
						"sexo" => $_POST["sexoP"],
						"fechaNacimiento" => $_POST["fechaNacimientoP"]
					);

					$respuesta = ModeloHorarios::mdlIngresarHorario($tabla, $datos);

					if ($respuesta == "ok") {

						echo '<script>

						swal({
							type: "success",
							title: "Los datos del Horario ha sido guardado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
							}).then(function(result){
										if (result.value) {

										window.location = "Horarios";

										}
									})

						</script>';
					}
				} else {

					echo '<script>

						swal({
							type: "error",
							title: "¡Los datos del Horario no puede ir vacío o llevar caracteres especiales!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
							}).then(function(result){
								if (result.value) {

								window.location = "Horarios";

								}
							})

					</script>';
				}
			}
		}

		/*=============================================
					   MOSTRAR HORARIOS
		=============================================*/

		static public function ctrMostrarHorario($item, $valor) {

			$tabla = "horarios";

			$respuesta = ModeloHorarios::mdlMostraHorario($tabla, $item, $valor);

			return $respuesta;
		}

		/*=============================================
					MOSTRAR HORARIOS MEDICO
		=============================================*/

		static public function ctrMostrarHorariosMedico($valor) {

			$tabla = "horarios";

			$respuesta = ModeloHorarios::mdlMostraHorariosMedico($valor);

			return $respuesta;
		}
		/*=============================================
		MOSTRAR EDAD Horario
		=============================================*/

		static public function ctrMostrarEdadHorario($item, $valor){

			$tabla = "Horario";

			$respuesta = ModeloHorarios::MdlMostrarEdadHorario($tabla, $item, $valor);

			return $respuesta;
		}

		/*=============================================
		MOSTRAR TOTAL Horarios
		=============================================*/

		static public function ctrMostrarTotalHorario($item, $valor){

			$tabla = "Horario";

			$respuesta = ModeloHorarios::MdlMostrarTotalHorario($tabla, $item, $valor);

			return $respuesta;
		}
		/*=============================================
		EDITAR Horarios
		=============================================*/

		static public function ctrEditarHorario()
		{

			if (isset($_POST["editarcarnetP"])) {

				if (
					preg_match('/^[()\-0-9 ]+$/', $_POST["editarcarnetP"]) &&
					preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarnombreP"]) &&
					preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarapellidoP"]) &&
					preg_match('/^[0-9]+$/', $_POST["editartelefonoP"])
				) {

					$tabla = "Horario";

					$datos = array(
						"idHorario" => $_POST["idHorario"],
						"documento" => $_POST["editarcarnetP"],
						"nombres" => $_POST["editarnombreP"],
						"apellidos" => $_POST["editarapellidoP"],
						"telefono" => $_POST["editartelefonoP"],
						"direccion" => $_POST["editardomicilioP"],
						"sexo" => $_POST["editarsexoP"],
						"fechaNacimiento" => $_POST["editarfechaNacimientoP"]
					);

					$respuesta = ModeloHorarios::mdlEditarHorario($tabla, $datos);

					if ($respuesta == "ok") {

						echo '<script>

						swal({
							type: "success",
							title: "Datos del Horario ha sido cambiado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
							}).then(function(result){
										if (result.value) {

										window.location = "Horarios";

										}
									})

						</script>';
					}
				} else {

					echo '<script>

						swal({
							type: "error",
							title: "¡Los datos del Horario no puede ir vacío o llevar caracteres especiales!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
							}).then(function(result){
								if (result.value) {

								window.location = "Horarios";

								}
							})

					</script>';
				}
			}
		}

		/*=============================================
		ELIMINAR Horarios
		=============================================*/

		static public function ctrEliminarHorario()
		{

			if (isset($_GET["idHorario"])) {

				$tabla = "Horario";
				$datos = $_GET["idHorario"];

				$respuesta = ModeloHorarios::mdlEliminarHorario($tabla, $datos);

				if ($respuesta == "ok") {

					echo '<script>

					swal({
						type: "success",
						title: "Los datos del Horario han sido borrado correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then(function(result){
									if (result.value) {

									window.location = "Horarios";

									}
								})

					</script>';
				}
			}
		}
	}
