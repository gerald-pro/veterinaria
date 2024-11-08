<?php

class ControladorServicio
{

    static public function ctrMostrarServicio($item, $valor)
    {
        $tabla = "servicio";
        $respuesta = ModeloServicio::mdlMostrarServicio($tabla, $item, $valor);
        return $respuesta;
    }

    static public function buscarPorId($idServicio)
    {
        $respuesta = ModeloServicio::buscarPorId($idServicio);
        return $respuesta;
    }

    static public function ctrCrearServicio()
    {

        if (isset($_POST["NuevoNombre"])) {

            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["NuevoNombre"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["NuevoCosto"])
            ) {

                $tabla = "servicio";

                $datos = array(
                    "nombre" => $_POST["NuevoNombre"],
                    "precio" => $_POST["NuevoCosto"]
                );

                $respuesta = ModeloServicio::mdlIngresarServicio($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

                    swal({
                          type: "success",
                          title: "El servicio a sido guardado correctamente",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                                    if (result.value) {

                                    window.location = "servicio";

                                    }
                                })

                    </script>';
                }
            } else {

                echo '<script>

                    swal({
                          type: "error",
                          title: "¡El servicio no puede ir vacía o llevar caracteres especiales!",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                            if (result.value) {

                            window.location = "Servicio";

                            }
                        })

                  </script>';
            }
        }
    }


    /*=============================================
    EDITAR CATEGORIA
    =============================================*/

    static public function ctrEditarServicio()
    {

        if (isset($_POST["EditarNombre"])) {

            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["EditarNombre"])
            ) {

                $tabla = "servicio";

                $datos = array(
                    "nombre" => $_POST["EditarNombre"],
                    "precio" => $_POST["EditarCosto"],
                    "idservicio" => $_POST["idServicio"]
                );

                $respuesta = ModeloServicio::mdlEditarServicio($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

                    swal({
                          type: "success",
                          title: "El servicio ha sido cambiada correctamente",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                                    if (result.value) {

                                    window.location = "servicio";

                                    }
                                })

                    </script>';
                } else {
                    echo '<script>

                    swal({
                          type: "error",
                          title: "' . $respuesta . '",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                                    if (result.value) {

                                    window.location = "servicio";

                                    }
                                })

                    </script>';
                }
            } else {

                echo '<script>

                    swal({
                          type: "error",
                          title: "¡servicio no puede ir vacía o llevar caracteres especiales!",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                            if (result.value) {

                            window.location = "servicio";

                            }
                        })

                  </script>';
            }
        }
    }




    /*=============================================
    BORRAR CATEGORIA
    =============================================*/

    static public function ctrBorrarServicio()
    {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];

            $respuesta = ModeloServicio::mdlBorrarServicio($id);

            if ($respuesta == "ok") {

                echo '<script>

                    swal({
                          type: "success",
                          title: "El servicio ha sido borrada correctamente",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                                    if (result.value) {

                                    window.location = "servicio";

                                    }
                                })

                    </script>';
            } else {
                echo '<script>

                    swal({
                          type: "error",
                          title: "' . $respuesta . '",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                                    if (result.value) {

                                    window.location = "servicio";

                                    }
                                })

                    </script>';
            }
        }
    }

    static public function ctrMostrarDetalleServicios($item, $valor, $orden)
    {

        $respuesta = ModeloServicio::mdlMostrarDetalleServicios($item, $valor, $orden);

        return $respuesta;
    }
}
