<?php

class ControladorVacunacion
{
    /*=============================================
                MOSTRAR VACUNACIÓN
    =============================================*/
    static public function ctrMostrarVacunacion($item, $valor) {

        $tabla = "vacunacion";

        $respuesta = ModeloVacunacion::mdlMostrarVacunacion($tabla, $item, $valor);

        return $respuesta;

    }

    /*=============================================
                CREAR VACUNACIÓN
    =============================================*/
    static public function ctrCrearVacunacion() {

        if (isset($_POST["NuevoTipoVacuna"])) {

            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["NuevoMascota"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["NuevoVeterinario"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["NuevoTipoVacuna"])
            ) {

                $tabla = "vacunacion";

                date_default_timezone_set('America/La_Paz');

				$fecha = date('Y-m-d');
				$hora = date('H:i:s');

				$fechaVacunacion = $fecha.' '.$hora;

                $datos = array(
                    "id_vacuna" => $_POST["NuevoTipoVacuna"],
                    "id_mascota" => $_POST["NuevoMascota"],
                    "id_veterinario" => $_POST["NuevoVeterinario"],
                    "fecha_vacunacion" => $fechaVacunacion
                );

                $respuesta = ModeloVacunacion::mdlIngresarVacunacion($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>
                        swal({
                            type: "success",
                            title: "Vacunación registrada con exito",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if (result.value) {
                                window.location = "vacunacion";
                            }
                        })
                    </script>';

                }
            } else {

                echo '<script>

                    swal({
                        type: "error",
                        title: "¡La vacunacion no puede ir vacía o llevar caracteres especiales!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result){
                        if (result.value) {
                            window.location = "Vacunacion";
                        }
                    })

                </script>';

            }

        }

    }

    /*=============================================
                EDITAR VACUNACIÓN
    =============================================*/
    static public function ctrEditarVacunacion() {

        if  (isset($_POST["EditarTipoVacuna"])) {

            $tabla = "vacunacion";

            date_default_timezone_set('America/La_Paz');

            $fecha = date('Y-m-d');
            $hora = date('H:i:s');

            $fechaVacunacion = $fecha . ' ' .$hora;

            $datos = array(
                "id" => $_POST["idVacunacion"],
                "id_vacuna" => $_POST["EditarTipoVacuna"],
                "id_mascota" => $_POST["EditarMascota"],
                "id_veterinario" => $_POST["EditarVeterinario"],
                "fecha_vacunacion" => $fechaVacunacion
            );

            $respuesta = ModeloVacunacion::mdlEditarVacunacion($tabla, $datos);

                if ($respuesta == "ok") {

                    echo'
                    <script>
                        swal({
                            type: "success",
                            title: "El registro de Vacunación se edito correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if (result.value) {
                                window.location = "vacunacion";
                            }
                        })
                    </script>';

                }
            /* } else {
                echo'
                <script>
                    swal({
                        type: "error",
                        title: "¡vacuna no puede ir vacía o llevar caracteres especiales!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result){
                        if (result.value) {
                            window.location = "vacunacion";
                        }
                    })
                </script>';
            } */

        }

    }

    /*=============================================
                    BORRAR VACUNACIÓN
    =============================================*/
    static public function ctrBorrarVacunacion(){

        if(isset($_GET["id"])){

            $tabla ="vacunacion";
            $datos = $_GET["id"];

            $respuesta = ModeloVacunacion::mdlBorrarVacunacion($tabla, $datos);

            if($respuesta == "ok"){

                echo'<script>

                    swal({
                          type: "success",
                          title: "El registro ha sido borrado correctamente",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                                    if (result.value) {

                                    window.location = "vacunacion";

                                    }
                                })

                    </script>';
            }
        }

    }

    /*=============================================
					RANGO FECHAS
	=============================================*/	
    static public function ctrEntreFechasVacunaciones($fechaInicial, $fechaFinal){

        $tabla = "vacunacion";

        $respuesta = ModeloVacunacion::mdlEntreFechasVacunaciones($tabla, $fechaInicial, $fechaFinal);

        return $respuesta;
    
    }
}
