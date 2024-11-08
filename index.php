<?php

require_once "controladores/plantilla.controlador.php";


require_once "controladores/cliente.controlador.php";
require_once "controladores/mascota.controlador.php";
require_once "controladores/servicio.controlador.php";
require_once "controladores/vacunacion.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/pagos.controlador.php";
require_once "controladores/vacunas.controlador.php";
require_once "controladores/consultorios.controlador.php";
require_once "controladores/medicos.controlador.php";
require_once "controladores/especialidades.controlador.php";
require_once "controladores/horarios.controlador.php";
require_once "controladores/citas.controlador.php";


require_once "modelos/cliente.modelo.php";
require_once "modelos/mascota.modelo.php";
require_once "modelos/servicio.modelo.php";
require_once "modelos/vacunacion.modelo.php";
require_once "modelos/usuarios.modelo.php";
require_once "modelos/pagos.modelo.php";
require_once "modelos/vacunas.modelo.php";
require_once "modelos/consultorios.modelo.php";
require_once "modelos/medicos.modelo.php";
require_once "modelos/especialidades.modelo.php";
require_once "modelos/horarios.modelo.php";
require_once "modelos/citas.modelo.php";

$plantilla= new ControladorPlantilla();

$plantilla->ctrPlantilla();

