<?php

require_once "controladores/pagos.controlador.php";
require_once "modelos/pagos.modelo.php";

require_once "controladores/cliente.controlador.php";
require_once "modelos/cliente.modelo.php";

require_once "controladores/usuarios.controlador.php";
require_once "modelos/usuarios.modelo.php";

require_once "controladores/servicio.controlador.php";
require_once "modelos/servicio.modelo.php";

$numeroPago = $_GET["numeroPago"];

//TRAEMOS LA INFORMACIÓN DE PAGO DE SERVICIOS
$itemBoleta = "numeroPago";
$valorBoleta = $numeroPago;

$respuestaBoleta = ControladorPagos::ctrMostrarPagos($itemBoleta, $valorBoleta);

$fecha = substr($respuestaBoleta["fecha"],0);
$total = number_format($respuestaBoleta["total"],2);

//TRAEMOS LA INFORMACIÓN DEL CLIENTE
$itemCliente = "id";
$valorCliente = $respuestaBoleta["idcliente"];

$respuestaCliente = ControladorCliente::ctrMostrarCliente($itemCliente, $valorCliente);

//TRAEMOS LA INFORMACIÓN DEL VETERINARIO(A)
$itemVeterinario = "id";
$valorVeterinario = $respuestaBoleta["idmedico"];

$respuestaVeterinario = ControladorUsuarios::ctrMostrarUsuarios($itemVeterinario, $valorVeterinario);

//TRAEMOS LA INFORMACION DE LA SECRETARIA(O)

$itemSecretaria = "id";
$valorSecretaria = $respuestaBoleta["idcajera"];

$respuestaSecretaria = ControladorUsuarios::ctrMostrarUsuarios($itemSecretaria, $valorSecretaria);

// Include the main TCPDF library (search for installation path).
/* require_once('tcpdf_include.php'); */
require_once('extensiones/TCPDF-main/tcpdf.php');


include ('controladores/literal.php');

$idpagoservicio = $_GET["id_pago"];


// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, array(215, 279), PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Sistema Veterinario');
$pdf->setTitle('Boleta de Pago');
$pdf->setSubject('Boleta de Pago');
$pdf->setKeywords('Boleta de Pago');

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
				<b>N° BOLETA: </b>' . $valorBoleta . '<br>
				<b>NIT: </b>1057236931<br>
				<p style="text-align: center;"><b>ORIGINAL</b></p>
			</td>
		</tr>
	</table>

	<p style="text-align: center; font-size: 14px;"><b>BOLETA DE PAGO</b></p>

	<div style="border: 1px solid #000000; height: auto;">
		<table border="0" cellspacing="7">
			<tr>
				<td style="width: 300px;"><b>Fecha y Hora: </b>' . $fecha . '</td>
				<td style="width: 115px;"></td>
				
			</tr>

			<tr>
				<td colspan="3"><b>Cliente: </b>'. $respuestaCliente["nombre"] . ' ' . $respuestaCliente["apellido"] . '</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td style="width: 300px;"><b>Veterinario(a): </b>' . $respuestaVeterinario["nombre"] . '</td>
				<td style="width: 115px;"></td>
				<td><b>Secretaria: </b>' . $respuestaSecretaria["nombre"] . '</td>
			</tr>
		</table>
	</div>
	
	<br><br>

	<table margin-left="" border="1" cellpadding="5" style="font-size: 10px;">
		<tr style="text-align: center; background-color: #D6D6D6;">
			<th style="width: 150px;"><b>SERVICIO</b></th>
			<th style="width: 100px;"><b>CANTIDAD</b></th>
			<th style="width: 100px;"><b>PRECIO SERVICIO</b></th>
			<th style="width: 100px;"><b>SUB TOTAL</b></th>
		</tr>';


		$itemPago = "idpagoservicio";
		$valorPago = $respuestaBoleta["idpagoservicio"];
		$orden = null;

		$respuestaServicio = ControladorServicio::ctrMostrarDetalleServicios($itemPago, $valorPago, $orden);

		$sumaTotal = 0;

		for($i = 0; $i < count($respuestaServicio); $i++){

			$nombre = $respuestaServicio[$i]['nombre'];

			$cantidad = $respuestaServicio[$i]['cantidad'];

			$valorUnitario = number_format($respuestaServicio[$i]["precio"],2);

			$precioTotal = number_format($respuestaServicio[$i]["total"],2);

			$sumaTotal = $sumaTotal + $precioTotal;

			$monto_literal = numtoletras($sumaTotal);

			$html .= '
				<tr>
					<td style="text-align: center">' . $nombre . '</td>
					<td style="text-align: center">' . $cantidad . '</td>
					<td style="text-align: center">Bs. ' . $valorUnitario . '</td>
					<td style="text-align: center">Bs. ' . $precioTotal . '</td>
				</tr>
			';
		}
	$html .='
		<tr style="background-color: #D6D6D6;">
			<td colspan="3" style="text-align: right;"><b>TOTAL: </b></td>
			<td style="text-align: center;"><b>Bs. ' . $sumaTotal . '</b></td>
		</tr>
	</table>

	<p style="text-align: right">
		<b>Pago Total: </b> Bs. ' . $sumaTotal . '
	</p>
	<p>
		<b>Son: </b>' . $monto_literal . '
	</p>
	<br>
	-------------------------------------------------------------------------------- <br>

	<p style="text-align: center"><b>GRACIAS POR SU PREFERENCIA</b></p>
	
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

$QR = 'Boleta de pago emitida por ' . $respuestaSecretaria["nombre"] . ' - (Secretaria) | "VETERINARIA BALDELOMAR"';



//Close and output PDF document
$pdf->Output('boleta-de-pago.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

?>
