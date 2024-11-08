<?php

require_once "controladores/vacunas.controlador.php";
require_once "modelos/vacunas.modelo.php";

// Include the main TCPDF library (search for installation path).
/* require_once('tcpdf_include.php'); */
require_once('extensiones/TCPDF-main/tcpdf.php');

/* include ('controladores/literal.php'); */

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, array(215, 279), PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Sistema Veterinario');
$pdf->setTitle('Reporte de Vacunas');
$pdf->setSubject('Reporte de Vacunas');
$pdf->setKeywords('Reporte de Vacunas');

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

    <p style="text-align: center; font-size: 14px;"><b>REPORTE DE VACUNAS</b></p>

    
    
   

    <table align="center" border="1" cellpadding="5" style="font-size: 14px; width: 400px;">
        <tr style="text-align: center; background-color: #D6D6D6;">
            <th style="width: 200px;"><b>N°</b></th>
            <th style="width: 450px;"><b>Nombre de Vacuna</b></th>
        </tr>';

        //TRAEMOS LA INFORMACIÓN DE LAS VACUNAS
        $itemVacuna = null;
        $valorVacuna = null;

        $respuestaVacunas = ControladorVacunas::ctrMostrarVacuna($itemVacuna, $valorVacuna);

        $contador = 0;

        for($i = 0; $i < count($respuestaVacunas); $i++){
            $contador = $contador + 1;
            $numero = $contador;
            $nombreVacuna = $respuestaVacunas[$i]["nombre"];
            
            $html .= '
                <tr>
                    <td style="text-align: center">' . $numero . '</td>
                    <td style="text-align: center">' . $nombreVacuna . '</td>
                </tr>
            ';
        }

        $html .='

                

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
$pdf->Output('reporte-de-vacunas.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

?>
