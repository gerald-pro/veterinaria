<?php

require_once "controladores/citas.controlador.php";
require_once "modelos/citas.modelo.php";

require_once "controladores/mascota.controlador.php";
require_once "modelos/mascota.modelo.php";

require_once "controladores/cliente.controlador.php";
require_once "modelos/cliente.modelo.php";

require_once "controladores/usuarios.controlador.php";
require_once "modelos/usuarios.modelo.php"; 

require_once('extensiones/TCPDF-main/tcpdf.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, array(215, 279), PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Sistema Veterinario');
$pdf->setTitle('Reporte de Citas');
$pdf->setSubject('Reporte de Citas');
$pdf->setKeywords('Reporte de Citas');

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

$pdf->setMargins(15, 15, 15);

$pdf->setAutoPageBreak(TRUE, 5);

$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

$pdf->setFont('Helvetica', '',12);

$pdf->AddPage();

$html = '

   <table border="0" style="font-size: 10px;">
        <tr>
            <td style="text-align: center; width: 250px;">
                <p>
                    <img src="vistas/dist/img/VETERINARIA.jpg" width="150px">
                </p>
                <b>VETERINARIA BALDELOMAR</b><br>
                Av. 3 pasos al frente<br>
                2234565 - 69934323<br>
                SANTA CRUZ - BOLIVIA
            </td>

            <td style="font-size: 14px; width: 200px;"></td>

            <td style="font-size: 14px; width: 240px;"><br><br><br>
                <b>NIT: </b>1057236931<br>
                <p style="text-align: center;"><b>ORIGINAL</b></p>
            </td>
        </tr>
    </table>

    <p style="text-align: center; font-size: 14px;"><b>REPORTE DE CITAS</b></p>

    <br><br>

    <table margin-left="" border="1" cellpadding="5" style="font-size: 10px;">
		<tr style="text-align: center; background-color: #D6D6D6;">
            <th style="width: 150px;"><b>VETERINARIO(A)</b></th>
			<th style="width: 100px;"><b>MASCOTA</b></th>
			<th style="width: 100px;"><b>ESPECIE</b></th>
			<th style="width: 120px;"><b>CLIENTE</b></th>
			<th style="width: 160px;"><b>FECHA Y HORA DE CITA</b></th>
		</tr>';

        $itemCita = null;
        $valorCita = null;

        $respuestaCitas = ControladorCitas::ctrMostrarCita($itemCita, $valorCita); 

        for($i = 0; $i < count($respuestaCitas); $i++){

            $itemVeterinario = "id";
			$valorVeterinario = $respuestaCitas[$i]["id_usuario_v"];
			$veterinario = ControladorUsuarios::ctrMostrarUsuarios($itemVeterinario, $valorVeterinario);


            $itemMascota = "id";
            $valorMascota = $respuestaCitas[$i]["id_mascota"];;
			$mascota = ControladorMascota::ctrMostrarMascota($itemMascota, $valorMascota);

            $itemCliente = "id";
            $valorCliente = $mascota['id_cliente'];
            $cliente = ControladorCliente::ctrMostrarCliente($itemCliente, $valorCliente);

	        $fecha = $respuestaCitas[$i]["inicio"];
	        
            $html .= '
				<tr>
					<td style="text-align: center">' . $veterinario['nombre'] . '</td>
					<td style="text-align: center">' . $mascota['nombre'] . '</td>
					<td style="text-align: center">' . $mascota['especie'] . '</td>
					<td style="text-align: center">' . $cliente['nombre'] . ' ' . $cliente['apellido'] . '</td>
					<td style="text-align: center">' . $fecha . '</td>
				</tr>
			';
        }
		$html .= '
	</table>

';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

$style = array(
	'border' => 0,
	'vpadding' => '3',
	'hpadding' => '3',
	'fgcolor' => array(0, 0, 0),
	'bgcolor' => false, //array(255, 255, 255)
	'module_width' => 1, //width of a single module in points
	'module_height' => 1 //height of a single module in points
);

//Close and output PDF document
$pdf->Output('reporte-de-citas.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

?>
