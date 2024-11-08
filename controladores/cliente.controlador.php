<?php

class ControladorCliente
{



    static public function ctrMostrarCliente($item, $valor)
    {

        $tabla = "cliente";

        $respuesta = ModeloCliente::mdlMostrarCliente($tabla, $item, $valor);

        return $respuesta;

    }
    static public function ctrCrearCliente()
    {

        if (isset($_POST["NuevoNombre"])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["NuevoNombre"])&&
            preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["NuevoApellido"]) &&
            preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["NuevoCelular"])&&
            preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["NuevoDireccion"])) {

                $tabla = "cliente";

                $datos = array("nombre" => $_POST["NuevoNombre"],
                               "apellido" => $_POST["NuevoApellido"],
                               "celular" => $_POST["NuevoCelular"],
                               "direccion" => $_POST["NuevoDireccion"]
                              
                               );

                $respuesta = ModeloCliente::mdlIngresarCliente($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

                    swal({
                          type: "success",
                          title: "El cliente a sido guardado correctamente",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                                    if (result.value) {

                                    window.location = "cliente";

                                    }
                                })

                    </script>';

                }


            } else {

                echo '<script>

                    swal({
                          type: "error",
                          title: "¡El usuario no puede ir vacía o llevar caracteres especiales!",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                            if (result.value) {

                            window.location = "Cliente";

                            }
                        })

                  </script>';

            }

        }

    }


    /*=============================================
    EDITAR CATEGORIA
    =============================================*/

    static public function ctrEditarCliente(){

        if(isset($_POST["EditarNombre"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["EditarNombre"])&&
            preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["EditarApellido"]) &&
            preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["EditarCelular"]) &&
            preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["EditarDireccion"]) ){

                $tabla = "cliente";

                $datos = array("nombre"=>$_POST["EditarNombre"],
                "apellido"=>$_POST["EditarApellido"],
                "celular"=>$_POST["EditarCelular"],
                "direccion"=>$_POST["EditarDireccion"],
                               "id"=>$_POST["id"]);

                $respuesta = ModeloCliente::mdlEditarCliente($tabla, $datos);

                if($respuesta == "ok"){

                    echo'<script>

                    swal({
                          type: "success",
                          title: "Cliente editado correctamente",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                                    if (result.value) {

                                    window.location = "cliente";

                                    }
                                })

                    </script>';

                }


            }else{

                echo'<script>

                    swal({
                          type: "error",
                          title: "¡cliente no puede ir vacía o llevar caracteres especiales!",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                            if (result.value) {

                            window.location = "cliente";

                            }
                        })

                  </script>';

            }

        }

    }




    /*=============================================
    BORRAR CATEGORIA
    =============================================*/

    static public function ctrBorrarCliente(){

        if(isset($_GET["id"])){

            $tabla ="cliente";
            $datos = $_GET["id"];

            $respuesta = ModeloCliente::mdlBorrarCliente($tabla, $datos);

            if($respuesta == "ok"){

                echo'<script>

                    swal({
                          type: "success",
                          title: "El cliente ha sido borrada correctamente",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                                    if (result.value) {

                                    window.location = "cliente";

                                    }
                                })

                    </script>';
            }
        }

    }






}
?>