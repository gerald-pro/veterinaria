<?php

class ControladorConsultorios
{
    /*=============================================
                MOSTRAR CONSULTORIO
    =============================================*/
    static public function ctrMostrarConsultorio($item, $valor) {

        $tabla = "especialidades";

        $respuesta = ModeloConsultorios::mdlMostrarConsultorio($tabla, $item, $valor);

        return $respuesta;

    }

    /*=============================================
                CREAR CONSULTORIO
    =============================================*/
    static public function ctrCrearConsultorio() {

        if (isset($_POST["NombreEspecialidad"])) {

            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["NombreEspecialidad"]) 
            ) {

                $tabla = "especialidades";

                $datos = array(
                    "nombre" => $_POST["NombreEspecialidad"]
                );

                $respuesta = ModeloConsultorios::mdlIngresarConsultorio($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>
                        swal({
                            type: "success",
                            title: "Especialidad registrada con exito",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if (result.value) {
                                window.location = "consultorios";
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
                EDITAR CONSULTORIO
    =============================================*/
    static public function ctrEditarConsultorio() {

        if  (isset($_POST["EditarNombreEspecialidad"])) {

            $tabla = "especialidades";

            $datos = array(
                "id" => $_POST["idEspecialidad"],
                "nombre" => $_POST["EditarNombreEspecialidad"]
            );

            $respuesta = ModeloConsultorios::mdlEditarConsultorio($tabla, $datos);

            if ($respuesta == "ok") {

                echo'
                <script>
                    swal({
                        type: "success",
                        title: "Especialidad editada correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result){
                        if (result.value) {
                            window.location = "consultorios";
                        }
                    })
                </script>';

            }
        }

    }

    /*=============================================
                    BORRAR CONSULTORIO
    =============================================*/
    static public function ctrBorrarConsultorio(){

        if(isset($_GET["id"])){

            $tabla ="especialidades";
            $datos = $_GET["id"];

            $respuesta = ModeloConsultorios::mdlBorrarConsultorio($tabla, $datos);

            if($respuesta == "ok"){

                echo'<script>

                    swal({
                          type: "success",
                          title: "El registro ha sido borrado correctamente",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                                    if (result.value) {

                                    window.location = "consultorios";

                                    }
                                })

                    </script>';
            }
        }

    }
}
