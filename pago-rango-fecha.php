<?php

require_once "controladores/pagos.controlador.php";
require_once "modelos/pagos.modelo.php";

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
$pdf->setTitle('Reporte de Pagos entre Fechas');
$pdf->setSubject('Reporte de Pagos entre Fechas');
$pdf->setKeywords('Reporte de Pagos entre Fechas');

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

    <p style="text-align: center; font-size: 14px;"><b>REPORTE DE PAGOS</b></p>

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
			<th style="width: 35px;"><b>N°</b></th>
			<th style="width: 170px;"><b>CLIENTE</b></th>
			<th style="width: 150px;"><b>SECRETARIA</b></th>
			<th style="width: 150px;"><b>VETERINARIO(A)</b></th>
			<th style="width: 70px;"><b>FECHA</b></th>
			<th style="width: 80px;"><b>TOTAL</b></th>
		</tr>';

        $respuesta = ControladorPagos::ctrEntreFechasPagos($fechainicio, $fechafin);

        $sumaTotal = 0;

        for($i = 0; $i < count($respuesta); $i++){

	        $numeroPago = $respuesta[$i]["numeroPago"];
	        $cliente = $respuesta[$i]["cliente"];
	        $secretaria = $respuesta[$i]["secretaria"];
	        $veterinario = $respuesta[$i]["veterinario"];
	        $total = $respuesta[$i]["total"];
	        $fecha = date("d/m/Y", strtotime($respuesta[$i]["fecha"]));
            $sumaTotal = $sumaTotal + $total;

			$monto_literal = numtoletras($sumaTotal);

            $html .= '
				<tr>
					<td style="text-align: center">' . $numeroPago . '</td>
					<td style="text-align: center">' . $cliente . '</td>
					<td style="text-align: center">' . $secretaria . '</td>
					<td style="text-align: center">' . $veterinario . '</td>
					<td style="text-align: center">' . $fecha . '</td>
					<td style="text-align: center">Bs. ' . $total . '</td>
				</tr>
			';
        }

        $html .='

                <tr style="background-color: #D6D6D6;">
                    <td colspan="5" style="text-align: right;"><b>TOTAL: </b></td>
                    <td style="text-align: center;"><b>Bs. ' . $sumaTotal . '</b></td>
                </tr>

	</table>

    <p style="text-align: right">
		<b>Monto Total: </b> Bs. ' . $sumaTotal . '
	</p>
	<p>';
    
        if (isset($monto_literal)) {
            $html .= '
                <b>Son: </b>' . $monto_literal . '
			';
        } else {
            $html .= '
                <p style="color: #8b0000; "><b>Advertencia : "Ingrese un rango de fecha valido donde se realizaron pagos"</b></p>
			';
        }

    $html .='  
	</p>
	<br>
	------------------------------------------------------------------------------------------------------------------------ <br>

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
$pdf->Output('reporte-de-pago.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

?>
