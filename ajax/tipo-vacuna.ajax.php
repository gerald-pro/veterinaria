<?php

require_once "../controladores/vacunas.controlador.php";
require_once "../modelos/vacunas.modelo.php";

class AjaxVacuna {

    /*=============================================
                        EDITAR VACUNA
    =============================================*/	

    public $id;

    public function ajaxEditarVacuna() {

        $item = "id";
        $valor = $this->id;

        $respuesta = ControladorVacunas::ctrMostrarVacuna($item, $valor); 

        echo json_encode($respuesta); 

    }

}

/*=============================================
                EDITAR VACUNACION
=============================================*/
if(isset($_POST["id"])) {
    $editar = new AjaxVacuna();
    $editar -> id = $_POST["id"];
    $editar -> ajaxEditarVacuna();
}
