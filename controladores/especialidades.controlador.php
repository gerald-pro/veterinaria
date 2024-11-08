<?php

class ControladorEspecialidades {

	/*=============================================
				CREAR ESPECIALIDADES
	=============================================*/

	static public function ctrCrearEspecialidad(){

		if(isset($_POST["nuevaEspecialidad"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaEspecialidad"])){

				$tabla = "Especialidades";

				$datos = $_POST["nuevaEspecialidad"];

				$respuesta = ModeloEspecialidades::mdlIngresarEspecialidad($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La especialidad ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "Especialidades";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La especialidad no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "Especialidades";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
			 	MOSTRAR ESPECIALIDADES
	=============================================*/

	static public function ctrMostrarEspecialidades($item, $valor){

		$tabla = "especialidades";

		$respuesta = ModeloEspecialidades::mdlMostrarEspecialidades($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
				EDITAR ESPECIALIDAD
	=============================================*/

	static public function ctrEditarEspecialidad(){

		if(isset($_POST["editarEspecialidad"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarEspecialidad"])){

				$tabla = "Especialidades";

				$datos = array("Especialidad"=>$_POST["editarEspecialidad"],
							   "id"=>$_POST["idEspecialidad"]);

				$respuesta = ModeloEspecialidades::mdlEditarEspecialidad($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La especialidad ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "Especialidades";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La especialidad no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "Especialidades";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
				BORRAR ESPECIALIDAD
	=============================================*/

	static public function ctrBorrarEspecialidad(){

		if(isset($_GET["idEspecialidad"])){

			$tabla ="Especialidades";
			$datos = $_GET["idEspecialidad"];

			$respuesta = ModeloEspecialidades::mdlBorrarEspecialidad($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "La especialidad ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "Especialidades";

									}
								})

					</script>';
			}
		}
		
	}
}
