<?php

require_once "../controladores/servicio.controlador.php";
require_once "../modelos/servicio.modelo.php";


class AjaxServicios
{
    /*=============================================
                        EDITAR SERVICIO
        =============================================*/
    public $idServicio;

    public function ajaxEditarServicio()
    {
        $id = $this->idServicio;
        $respuesta = ControladorServicio::buscarPorId($id);
        echo json_encode($respuesta);
    }
}

/*=============================================
                    EDITAR SERVICIOS
=============================================*/
if (isset($_POST["idServicio"])) {
    $editarServicio = new AjaxServicios();
    $editarServicio->idServicio = $_POST["idServicio"];
    $editarServicio->ajaxEditarServicio();
}
