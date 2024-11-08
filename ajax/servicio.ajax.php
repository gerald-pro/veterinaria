<?php

    require_once "../controladores/servicio.controlador.php";
    require_once "../modelos/servicio.modelo.php";


    class AjaxServicios {
        /*=============================================
                        EDITAR SERVICIO
        =============================================*/
        public $idServicio;

        public function ajaxEditarServicio() {

            $item = "idservicio";
            $valor = $this -> idServicio;

            $respuesta = ControladorServicio::ctrMostrarServicio($item, $valor);

            echo json_encode($respuesta);
        }
           
    }

/*=============================================
                    EDITAR SERVICIOS
=============================================*/
if (isset($_POST["idServicio"])) {

    $editarServicio = new AjaxServicios();

    $editarServicio -> idServicio = $_POST["idServicio"];

    $editarServicio -> ajaxEditarServicio();
}


