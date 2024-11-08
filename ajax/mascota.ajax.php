<?php

require_once "../controladores/mascota.controlador.php";
require_once "../modelos/mascota.modelo.php";

class AjaxMascota{

    /*=============================================
    EDITAR MASCOTA
    =============================================*/

    public $id;

    public function ajaxEditarMascota(){

        $item = "id";
        $valor = $this->id;

        $respuesta = ControladorMascota::ctrMostrarMascota($item, $valor);

        echo json_encode($respuesta);

    }
}

/*=============================================
EDITAR MASCOTA
=============================================*/
if(isset($_POST["id"])){
    /* echo "Hola mascota"; */
    $mascota = new AjaxMascota();
    $mascota -> id = $_POST["id"];
    $mascota -> ajaxEditarMascota();
}
