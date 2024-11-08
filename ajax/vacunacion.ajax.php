<?php

require_once "../controladores/vacunacion.controlador.php";
require_once "../modelos/vacunacion.modelo.php";

class AjaxVacunaciones {

    /*=============================================
                        EDITAR VACUNACION
    =============================================*/	

    public $id;

    public function ajaxEditarVacunacion() {

        $item = "id";
        $valor = $this->id;

        $respuesta = ControladorVacunacion::ctrMostrarVacunacion($item, $valor); 

        echo json_encode($respuesta); 

    }

}

/*=============================================
                EDITAR VACUNACION
=============================================*/
if(isset($_POST["id"])) {
    $editar = new AjaxVacunaciones();
    $editar -> id = $_POST["id"];
    $editar -> ajaxEditarVacunacion();
}
