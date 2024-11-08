<?php

require_once "../controladores/vacunacion.controlador.php";
require_once "../controladores/mascota.controlador.php";
require_once "../modelos/vacunacion.modelo.php";
require_once "../modelos/mascota.modelo.php";

class AjaxVacunaciones {

    /*=============================================
                        EDITAR VACUNACION
    =============================================*/	

    public $id;

    public function ajaxEditarVacunacion() {
        $respuesta = ControladorVacunacion::buscarPorId($this->id);
        $mascotas = ControladorMascota::ctrMostrarMascotasPorCliente($respuesta['id_cliente']);
        $respuesta['mascotas'] = $mascotas;
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
