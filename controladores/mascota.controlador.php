<?php

class ControladorMascota
{
    /*=============================================
                    MOSTRAR MASCOTA
    =============================================*/

    static public function ctrMostrarMascota($item, $valor)
    {

        $tabla = "mascota";

        $respuesta = ModeloMascota::mdlMostrarMascota($tabla, $item, $valor);

        return $respuesta;
    }

    /*=============================================
                    CREAR MASCOTA
    =============================================*/
    static public function ctrCrearMascota()
    {

        if (isset($_POST["NuevoNombre"])) {

            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["NuevoNombre"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["NuevoSexo"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["NuevoRaza"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["NuevoEspecie"]) &&
                preg_match('/^\d{4}-\d{2}-\d{2}$/', $_POST["NuevoFechanacimiento"])
            ) {

                $tabla = "mascota";

                $datos = array(
                    "id_cliente" => $_POST["nuevoCliente"],
                    "nombre" => $_POST["NuevoNombre"],
                    "sexo" => $_POST["NuevoSexo"],
                    "raza" => $_POST["NuevoRaza"],
                    "especie" => $_POST["NuevoEspecie"],
                    "fechanacimiento" => $_POST["NuevoFechanacimiento"],
                );

                $respuesta = ModeloMascota::mdlIngresarMascota($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

                        swal({
                            type: "success",
                            title: "Registro de Mascota exitoso",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result) {
                            if (result.value) {
                                window.location = "mascota";
                            }
                        })

                    </script>';
                }
            } else {

                echo '<script>

                    swal({
                          type: "error",
                          title: "¡La mascota no puede ir vacía o llevar caracteres especiales!",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                            if (result.value) {
                                window.location = "Mascota";
                            }
                        })

                  </script>';
            }
        }
    }


    /*=============================================
                    EDITAR MASCOTA
    =============================================*/

    static public function ctrEditarMascota()
    {

        if (isset($_POST["EditarNombre"])) {

            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["EditarNombre"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["EditarSexo"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["EditarRaza"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["EditarEspecie"]) &&
                preg_match('/^\d{4}-\d{2}-\d{2}$/', $_POST["EditarFechanacimiento"])
            ) {

                $tabla = "mascota";

                $datos = array(
                    "nombre" => $_POST["EditarNombre"],
                    "sexo" => $_POST["EditarSexo"],
                    "raza" => $_POST["EditarRaza"],
                    "especie" => $_POST["EditarEspecie"],
                    "fechanacimiento" => $_POST["EditarFechanacimiento"],
                    /* "id_cliente" => $_POST["id_cliente"], */
                    "id" => $_POST["id"]
                );

                $respuesta = ModeloMascota::mdlEditarMascota($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

                    swal({
                          type: "success",
                          title: "Datos de mascota modificado con exito",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                                    if (result.value) {

                                    window.location = "mascota";

                                    }
                                })

                    </script>';
                }
            } else {

                echo '<script>

                    swal({
                          type: "error",
                          title: "¡Mascota no puede ir vacía o llevar caracteres especiales!",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                            if (result.value) {

                            window.location = "mascota";

                            }
                        })

                  </script>';
            }
        }
    }




    /*=============================================
    BORRAR Mascota
    =============================================*/

    static public function ctrBorrarMascota()
    {

        if (isset($_GET["id"])) {

            $tabla = "mascota";
            $datos = $_GET["id"];

            $respuesta = ModeloMascota::mdlBorrarMascota($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

                    swal({
                          type: "success",
                          title: "La mascota ha sido borrada correctamente",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                                    if (result.value) {

                                    window.location = "mascota";

                                    }
                                })

                    </script>';
            }
        }
    }

    static public function ctrMostrarMascotasPorCliente($idCliente)
    {
        $mascotas = ModeloMascota::listarMascotasPorCliente($idCliente);
        return $mascotas;
    }
}
