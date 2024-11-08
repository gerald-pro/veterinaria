<?php 
    date_default_timezone_set('America/La_Paz');
?>

<div class="content-wrapper">

    <section class="content-header">

    	<div class="container-fluid">
    		<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="text-primary">Reporte de Vacunación entre Fechas</h1>
				</div>

          		<div class="col-sm-6">
            		<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="inicio" class="text-primary">Inicio</a></li>
						<li class="breadcrumb-item active">Reporte de Vacunación entre Fechas</li>
            		</ol>
          		</div>
        	</div><!-- /.row -->
      	</div><!-- /.container-fluid -->

    </section>

    <section class="content">

        <div class="container-fluid">

            <div class="card">

                <div class="card-body">

                    <form role="form" class="formularioVacunaEntreFecha" method="post">

                        <div class="x_title">

                            <button type="button" class="btn btn-primary pull-right btnReporteVacunaEntreFechas mb-3">
                                <i class="fa fa-print mr-2"></i>Generar Reporte
                            </button>
                        
                            <div class="clearfix"></div>
                        </div>

                        <div class="col-md-6 col-sm-6 form-group row">
                            <label>Desde</label>
                            <input type="date" class="form-control" name="fechaInicioVacuna" id="fechaInicioVacuna" value="<?php echo date("Y-m-d"); ?>" required>
                        </div>

                        <div class="col-md-6 col-sm-6 form-group row">
                            <label>Hasta</label>
                            <input type="date" class="form-control" name="fechaFinVacuna" id="fechaFinVacuna" value="<?php echo date("Y-m-d"); ?>" required>
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
    document.getElementById('fechaFinVacuna').setAttribute('max', fechaNueva);
    document.getElementById('fechaInicioVacuna').setAttribute('max', fechaNueva);
</script>



