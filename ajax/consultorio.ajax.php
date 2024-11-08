<?php

require_once "../controladores/consultorios.controlador.php";
require_once "../modelos/consultorios.modelo.php";

class AjaxConsultorio {

    /*=============================================
                        EDITAR CONSULTORIO
    =============================================*/	

    public $id;

    public function ajaxEditarConsultorio() {

        $item = "id";
        $valor = $this->id;

        $respuesta = ControladorConsultorios::ctrMostrarConsultorio($item, $valor); 

        echo json_encode($respuesta); 

    }

}

/*=============================================
                EDITAR VACUNACION
=============================================*/
if(isset($_POST["id"])) {
    $editar = new AjaxConsultorio();
    $editar -> id = $_POST["id"];
    $editar -> ajaxEditarConsultorio();
}
