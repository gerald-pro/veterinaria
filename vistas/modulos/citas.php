<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <section class="content-header">

    	<div class="container-fluid">

        	<div class="row mb-2">

          		<div class="col-sm-6">
            		<h1>GESTIONAR CITAS</h1>
          		</div>

          		<div class="col-sm-6">
            		<ol class="breadcrumb float-sm-right">
              			<li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
              			<li class="breadcrumb-item active">Gestionar Citas</li>
            		</ol>
          		</div>
        	</div>
			<hr class="bg-info">
      	</div><!-- /.container-fluid -->
    </section>

    <section class="content">

    	<div class="row">

      		<?php

        		$item = null;
        		$valor = null;

        		$medicos = ControladorMedicos::ctrMostrarMedicos($item, $valor);

				if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Secretaria") {

					foreach ($medicos as $key => $value) {

						echo 

						'<div class="col-lg-3 col-6">
            			
            				<div class="small-box" style="background: #'. $value["color"] .'">

              					<div class="inner">';

              						$item_e = "id";
              						$valor_e = $value["id_especialidad"];
             
              						$especialidades = ControladorEspecialidades::ctrMostrarEspecialidades($item_e, $valor_e);

              						echo '<h4 class="text-white">' . $especialidades["nombre"] . '</h4>'; 
								
									$item_n = "id";
									$valor_n = $value["id"];

									$usuarios = ControladorUsuarios::ctrMostrarMedicos($item_n, $valor_n);

              						echo '<p class="text-white"><b>Veterinario:</b> ' . $usuarios["nombre"] . '</p>

              					</div>

								<div class="icon">
									<i class="fas fa-notes-medical"></i>
								</div>
               
              					<a href="index.php?rutas=crear-cita&idMedico=' . $value["id"] . '" class="small-box-footer">
									Ver Citas 
									<i class="fas fa-arrow-circle-right"></i>
								</a>

            				</div>

        				</div> ';

					}

				} else if ($_SESSION["perfil"] == "Veterinario") {

					foreach ($medicos as $key => $value) {
						$item_n = "id";
						$valor_n = $value["id"];
						$usuarios = ControladorUsuarios::ctrMostrarMedicos($item_n, $valor_n);
						if ($usuarios["id"] == $_SESSION["id"]) {
							echo 
							'<div class="col-lg-3 col-6">
							
								<div class="small-box" style="background: #'. $value["color"] .'">
									<div class="inner">';
										$item_e = "id";
										$valor_e = $value["id_especialidad"];
				
										$especialidades = ControladorEspecialidades::ctrMostrarEspecialidades($item_e, $valor_e);

									echo '<h3 class="text-white">' . $especialidades["nombre"] . '</h3>'; 
									
									echo '<p class="text-white">' . $usuarios["nombre"] . '</p>
									</div>

									<div class="icon">
										<i class="fas fa-notes-medical"></i>
									</div>
				
									<a href="index.php?rutas=crear-cita&idMedico=' . $value["id"] . '" class="small-box-footer">Ver Citas <i class="fas fa-arrow-circle-right"></i></a>
								</a>
								</div>
							</div> ';
						}
					}

				} 

       		?>

        </div><!-- /.row -->

    </section><!-- /.content -->
    
</div>

<?php

	/* $borrarCita = new ControladorCitas();
	$borrarCita -> ctrEliminarCita(); */

?> 


 