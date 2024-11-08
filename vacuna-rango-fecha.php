<?php

require_once "controladores/vacunacion.controlador.php";
require_once "modelos/vacunacion.modelo.php";

require_once "controladores/cliente.controlador.php";
require_once "modelos/cliente.modelo.php";

require_once "controladores/usuarios.controlador.php";
require_once "modelos/usuarios.modelo.php";

$fechainicio = $_GET["fechainicio"];
$fechafin = $_GET["fechafin"];

$fechainicioFormat = date("d/m/Y", strtotime($_GET["fechainicio"]));
$fechafinFormat = date("d/m/Y", strtotime($_GET["fechafin"]));

// Include the main TCPDF library (search for installation path).
/* require_once('tcpdf_include.php'); */
require_once('extensiones/TCPDF-main/tcpdf.php');

include ('controladores/literal.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, array(215, 279), PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Sistema Veterinario');
$pdf->setTitle('Reporte de Vacunas entre Fechas');
$pdf->setSubject('Reporte de Vacunas entre Fechas');
$pdf->setKeywords('Reporte de Vacunas entre Fechas');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->setMargins(15, 15, 15);

// set auto page breaks
$pdf->setAutoPageBreak(TRUE, 5);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// -------------------------------------------------------

// Set font
$pdf->setFont('Helvetica', '',12);

// Add a page
$pdf->AddPage();

// create some HTML content
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

    <p style="text-align: center; font-size: 14px;"><b>REPORTE DE VACUNACIONES</b></p>

    <div style="border: 1px solid #000000; height: auto;">
		<table border="0" cellspacing="7">
			<tr>
				<td style="width: 210px"; align="center"><b>Desde: </b>' . $fechainicioFormat . '</td>
				<td></td>
				<td style="width: 210px"; align="center"><b>Hasta: </b>' . $fechafinFormat . '</td>
			</tr>
		</table>
	</div>

    <br><br>

    <table margin-left="" border="1" cellpadding="5" style="font-size: 10px;">
		<tr style="text-align: center; background-color: #D6D6D6;">
			<th style="width: 120px;"><b>CLIENTE</b></th>
			<th style="width: 80px;"><b>MASCOTA</b></th>
			<th style="width: 80px;"><b>ESPECIE</b></th>
			<th style="width: 150px;"><b>VETERINARIO(A)</b></th>
			<th style="width: 165px;"><b>TIPO DE VACUNA</b></th>
			<th style="width: 65px;"><b>FECHA</b></th>
		</tr>';

        $respuesta = ControladorVacunacion::ctrEntreFechasVacunaciones($fechainicio, $fechafin);

        for($i = 0; $i < count($respuesta); $i++){
			$cliente = $respuesta[$i]["cliente"];
	        $mascota = $respuesta[$i]["mascota"];
			$especie = $respuesta[$i]["especie"];
	        $veterinario = $respuesta[$i]["veterinario"];
	        $tipo_vacuna = $respuesta[$i]["tipo_vacuna"];
	        $fecha = date("d/m/Y", strtotime($respuesta[$i]["fecha_vacunacion"]));
            
            $html .= '
				<tr>
					<td style="text-align: center">' . $cliente . '</td>
					<td style="text-align: center">' . $mascota . '</td>
					<td style="text-align: center">' . $especie . '</td>
					<td style="text-align: center">' . $veterinario . '</td>
					<td style="text-align: center">' . $tipo_vacuna . '</td>
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
$pdf->Output('reporte-de-vacunacion.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

?>
