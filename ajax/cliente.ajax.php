<?php

require_once "../controladores/cliente.controlador.php";
require_once "../modelos/cliente.modelo.php";

class AjaxCliente{

    /*=============================================
    EDITAR CATEGORÍA
    =============================================*/

    public $id;

    public function ajaxEditarCliente(){

        $item = "id";
        $valor = $this->id;

        $respuesta = ControladorCliente::ctrMostrarCliente($item, $valor);

        echo json_encode($respuesta);

    }
}

/*=============================================
EDITAR CATEGORÍA
=============================================*/
if(isset($_POST["id"])){

    $cliente = new AjaxCliente();
    $cliente -> id = $_POST["id"];
    $cliente -> ajaxEditarCliente();
}
