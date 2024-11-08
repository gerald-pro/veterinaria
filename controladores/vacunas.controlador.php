<?php

class ControladorVacunas
{
    /*=============================================
                MOSTRAR VACUNA
    =============================================*/
    static public function ctrMostrarVacuna($item, $valor) {

        $tabla = "tipo_vacuna";

        $respuesta = ModeloVacunas::mdlMostrarVacuna($tabla, $item, $valor);

        return $respuesta;

    }

    /*=============================================
                CREAR VACUNA
    =============================================*/
    static public function ctrCrearVacuna() {

        if (isset($_POST["NombreVacuna"])) {

            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["NombreVacuna"]) 
            ) {

                $tabla = "tipo_vacuna";

                $datos = array(
                    "nombre" => $_POST["NombreVacuna"]
                );

                $respuesta = ModeloVacunas::mdlIngresarVacuna($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>
                        swal({
                            type: "success",
                            title: "Vacuna registrada con exito",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if (result.value) {
                                window.location = "tipo-vacuna";
                            }
                        })
                    </script>';

                }
            } else {

                echo '<script>

                    swal({
                        type: "error",
                        title: "¡La vacuna no puede ir vacía o llevar caracteres especiales!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result){
                        if (result.value) {
                            window.location = "tipo-vacuna";
                        }
                    })

                </script>';

            }

        }

    }

    /*=============================================
                EDITAR VACUNA
    =============================================*/
    static public function ctrEditarVacuna() {

        if  (isset($_POST["EditarNombreVacuna"])) {

            $tabla = "tipo_vacuna";

            $datos = array(
                "id" => $_POST["idVacuna"],
                "nombre" => $_POST["EditarNombreVacuna"]
            );

            $respuesta = ModeloVacunas::mdlEditarVacuna($tabla, $datos);

                if ($respuesta == "ok") {

                    echo'
                    <script>
                        swal({
                            type: "success",
                            title: "El registro de Vacuna se edito correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if (result.value) {
                                window.location = "tipo-vacuna";
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
                    BORRAR VACUNA
    =============================================*/
    static public function ctrBorrarVacuna(){

        if(isset($_GET["id"])){

            $tabla ="tipo_vacuna";
            $datos = $_GET["id"];

            $respuesta = ModeloVacunas::mdlBorrarVacuna($tabla, $datos);

            if($respuesta == "ok"){

                echo'<script>

                    swal({
                          type: "success",
                          title: "El registro ha sido borrado correctamente",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                                    if (result.value) {

                                    window.location = "tipo-vacuna";

                                    }
                                })

                    </script>';
            }
        }

    }
}
