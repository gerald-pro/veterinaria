<?php

	class ControladorPagos {

		/*=============================================
						MOSTRAR PAGOS
		=============================================*/

		static public function ctrMostrarPagos($item, $valor) {

			$tabla = "pago_servicio";

			$respuesta = ModeloPagos::mdlMostrarPagos($tabla, $item, $valor);

			return $respuesta;

		}

		/*============================================
						CREAR PAGO
		=============================================*/

		static public function ctrCrearPago(){

			if(isset($_POST["nuevaVenta"])){

				/* $tablaMedicos = "vmedicos";

				$item = "id";
				$valor = $_POST["seleccionarMedico"];

				$traerCliente = ModeloMedicos::mdlMostrarMedicos($tablaMedicos, $item, $valor); */

				/* $tablaClientes = "paciente";

				$item = "idpaciente";
				$valor = $_POST["seleccionarPaciente"];

				$traerCliente = ModeloPacientes::mdlMostraPaciente($tablaClientes, $item, $valor); */

				/*=============================================
				GUARDAR LA COMPRA
				=============================================*/

				$tabla = "pago_servicio";

				$datos = array("idcajera"=>$_POST["idCajera"],
							"numeroPago"=>$_POST["nuevaVenta"],
							"idmedico"=>$_POST["seleccionarMedico"],
							/* "idpaciente"=>$_POST["seleccionarPaciente"], */
							"idcliente"=>$_POST["seleccionarCliente"],
							"servicio"=>$_POST["listaProductos"],
							"total"=>$_POST["totalVenta"],
							"fecha"=>$_POST["fecha"],
							"metodo_pago"=>($_POST["nuevoMetodoPago"] == "Efectivo")? $_POST["nuevoMetodoPago"]: $_POST["listaMetodoPago"]);

				$respuesta = ModeloPagos::mdlIngresarPagos($tabla, $datos);

				//Obtener el id de la venta

				$tabla = "pago_servicio";
				$item = "numeroPago";
				$valor =  $_POST["nuevaVenta"];
				$respuesta_venta = ModeloPagos::mdlMostrarPagos($tabla, $item, $valor);
				$idventa = $respuesta_venta["idpagoservicio"];

				//Agregar el detalle de la venta

				$tabla_detalle = "detalle_pago_o_servicio";
				$listaProductos = json_decode($_POST["listaProductos"], true);

				foreach ($listaProductos as $key => $value) {

					$datos_producto = array("id_pago_servicio"=>$idventa,
							"id_servicio"=>$value["idservicio"],
							"cantidad"=>$value["cantidad"],
							"precio"=>$value["precio"]);

					$respuesta_detalle = ModeloPagos::mdlIngresarDetallePago($tabla_detalle, $datos_producto);

				}
				if($respuesta == "ok" ){

					echo'<script>

					localStorage.removeItem("rango");

					swal({
						type: "success",
						title: "El pago ha sido guardado correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then((result) => {
									if (result.value) {

									window.location = "pagos";

									}
								})

					</script>';
				}
			}
		}
		
		/*=============================================
						RANGO FECHAS
		=============================================*/	
		static public function ctrEntreFechasPagos($fechaInicial, $fechaFinal){

			$tabla = "pago_servicio";

			$respuesta = ModeloPagos::mdlEntreFechasPagos($tabla, $fechaInicial, $fechaFinal);

			return $respuesta;
		
		}

	}