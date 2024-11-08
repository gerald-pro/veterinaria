<?php 
    date_default_timezone_set('America/La_Paz');
?>

<div class="content-wrapper">

    <section class="content-header">

    	<div class="container-fluid">
    		<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="text-primary">Reporte de Pagos entre fechas</h1>
				</div>

          		<div class="col-sm-6">
            		<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="inicio" class="text-primary">Inicio</a></li>
						<li class="breadcrumb-item active">Reporte de Pagos entre fechas</li>
            		</ol>
          		</div>
        	</div><!-- /.row -->
      	</div><!-- /.container-fluid -->

    </section>

    <section class="content">

        <div class="container-fluid">

            <div class="card">

                <div class="card-body">

                    <form role="form" method="post" class="formularioPagoEntreFecha">

                        <div class="x_title">

                            <button type="button" class="btn btn-primary pull-right btnReportePagoEntreFechas mb-3">
                                <i class="fa fa-print mr-2"></i>Generar Reporte
                            </button>
                        
                            <div class="clearfix"></div>
                        </div>

                        <div class="col-md-6 col-sm-6 form-group row">
                            <label>Desde</label>
                            <input type="date" class="form-control" name="fechaInicioPago" id="fechaInicioPago" value="<?php echo date("Y-m-d"); ?>" required>
                        </div>

                        <div class="col-md-6 col-sm-6 form-group row">
                            <label>Hasta</label>
                            <input type="date" class="form-control" name="fechaFinPago" id="fechaFinPago" value="<?php echo date("Y-m-d"); ?>" required>
                        </div>

                        <p style="color: #8b0000"><b>Nota: </b>Seleccione un rango de fechas valido.</p>

                    </form>
                    
                </div><!-- /.card-body -->

            </div><!-- /.card -->

        </div>
		
    </section><!-- /.content -->

</div><!-- /.content-wrapper -->

<script>
    const fechaHoraActualEnLaPaz = new Date().toLocaleString('es-BO', { timeZone: 'America/La_Paz' });
    const partes = fechaHoraActualEnLaPaz.split(','); // Dividir la cadena en partes usando la coma
    const fecha = partes[0];
    const fechaOriginal = fecha;
    const partes1 = fechaOriginal.split('/');
    const dia = partes1[0].padStart(2, '0');
    const fechaNueva = partes1[2] + '-' + partes1[1] + '-' + dia;
    document.getElementById('fechaFinPago').setAttribute('max', fechaNueva);
    document.getElementById('fechaInicioPago').setAttribute('max', fechaNueva);
</script>



