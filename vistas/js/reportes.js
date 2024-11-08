$(".formularioReporteVacunas").on("click", "button.btnReporteVacunas", function(){

	window.open("reporte_vacunas.php", "_blank");
    
})

$(".formularioReporteCitas").on("click", "button.btnReporteCitas", function(){

	window.open("reporte_citas.php", "_blank");
    
})

$(".formularioPagoEntreFecha").on("click", "button.btnReportePagoEntreFechas", function(){

	var fechainicio = $("#fechaInicioPago").val();
	var fechafin = $("#fechaFinPago").val();

	window.open("pago-rango-fecha.php?fechainicio="+fechainicio+"&fechafin="+fechafin, "_blank");
      
})

$(".formularioVacunaEntreFecha").on("click", "button.btnReporteVacunaEntreFechas", function(){

	var fechainicio = $("#fechaInicioVacuna").val();
	var fechafin = $("#fechaFinVacuna").val();

	window.open("vacuna-rango-fecha.php?fechainicio="+fechainicio+"&fechafin="+fechafin, "_blank");
      
})