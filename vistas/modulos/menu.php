<style>
	[class*="sidebar-dark-"] {
		background: #001f3f;
		background: -webkit-linear-gradient(to right, #001f3f, #001f3f);
		background: linear-gradient(to right, #001f3f, #001f3f);
	}

	[class*="sidebar-dark"] .user-panel {
		border-bottom: 1px solid #045b69;
	}

	[class*="sidebar-dark"] .brand-link {
		border-bottom: 1px solid #045b69; 
	}

	.dropdown-toggle a {
		color: #001f3f !important;
	}
</style>

<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
  <!-- Sidebar user (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    
    <
<div class="image" style="display: flex; justify-content width: 500%;">
<a href="" style="color: #FFFFFF;"> <b> VETERINARIA BALDELOMAR </b></a>

</div>  
    
   
	</div>

      	<!-- Sidebar Menu -->
      	<nav class="mt-2">
        	<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

				<!-- Inicio -->
               	<li class="nav-item ">
            		<a href="inicio" class="nav-link <?php if($_GET["rutas"] == "inicio") echo 'active' ?>">
						<i class="nav-icon fa fa-home" style="color: #0083FF;"></i>
						<p>
							Inicio
							<i class="right fas fa-angle"></i>
						</p>
            		</a>       
				</li>

				<!-- Usuarios -->
				<li class="nav-item">
					<a href="usuarios" class="nav-link <?php if($_GET["rutas"] == "usuarios") echo 'active' ?>">
						<i class="nav-icon fa fa-user"style="color: #0083FF;"></i>
						<p>
							Usuarios
							<span class="right badge badge-danger"></span>
						</p>
					</a>
				</li>

				<!-- Clientes -->
          		<li class="nav-item">
            		<a	href="cliente" class="nav-link <?php if($_GET["rutas"] == "cliente") echo 'active' ?>">
            			<i class="nav-icon fa fa-male"style="color: #0083FF;"></i>
						<p>
							Clientes
							<span class="right badge badge-danger"></span>
						</p>
            		</a>
          		</li>

				<!-- Mascotas -->
				<li class="nav-item">
					<a href="mascota" class="nav-link <?php if($_GET["rutas"] == "mascota") echo 'active' ?>">
						<i class="nav-icon fa fa-paw"style="color: #0083FF;"></i>
						<p>
							Mascotas
							<span class="right badge badge-danger"></span>
						</p>
					</a>
				</li>

				<!-- Vacunación -->
				<li class="nav-item">
					<a href="vacunacion" class="nav-link <?php if($_GET["rutas"] == "vacunacion") echo 'active' ?>">
						<i class="nav-icon fa fa-heart"style="color: #0083FF;"></i>
						<p>
							Vacunación
							<span class="right badge badge-danger"></span>
						</p>
					</a>
				</li>
				
				<!-- Vacunas -->
				<li class="nav-item">
					<a href="tipo-vacuna" class="nav-link <?php if($_GET["rutas"] == "tipo-vacuna") echo 'active' ?>">
						<i class="nav-icon fa fa-syringe"style="color: #0083FF;"></i>
						<p>
							Vacunas
							<span class="right badge badge-danger"></span>
						</p>
					</a>
				</li>

				<!-- Especialidades 
				<li class="nav-item">
					<a href="consultorios" class="nav-link <?php if($_GET["rutas"] == "consultorios") echo 'active' ?>">
						<i class="nav-icon fas fa-briefcase-medical" style="color: #0083FF;"></i>
						<p>
							Especialidades
							<span class="right badge badge-danger"></span>
						</p>
					</a>
				</li> -->

				<!-- Citas -->
				<li class="nav-item">
					<a href="citas" class="nav-link <?php if($_GET["rutas"] == "citas") echo 'active' ?>">
						<i class="nav-icon far fa-calendar-check" style="color: #0083FF;"></i>
						<p>
							Citas
							<span class="right badge badge-danger"></span>
						</p>
					</a>
				</li>

				<!-- Servicios -->
				<li class="nav-item">
					<a href="servicio" class="nav-link <?php if($_GET["rutas"] == "servicio") echo 'active' ?>">
						<i class="nav-icon fa fa-cog" style="color: #0083FF;"></i>
						<p>
							Servicios
							<span class="right badge badge-danger"></span>
						</p>
					</a>
				</li>

				<!-- Pagos -->
				<li class="nav-item">
					<a href="pagos" class="nav-link <?php if($_GET["rutas"] == "pagos") echo 'active' ?>">
						<i class="nav-icon fa fa-credit-card" style="color: #0083FF;"></i>
						<p>
							Pagos
							<span class="right badge badge-danger"></span>
						</p>
					</a>
				</li>
				
				<!-- Reportes -->
				<li class="nav-item menu-is-opening">
            		<a href="" class="nav-link">
              			<i class="nav-icon fas fa-paste" style="color: #0083FF;"></i>
						<p>
							Reportes
							<i class="fas fa-angle-left right"></i>
						</p>
            		</a>

					<ul class="nav nav-treeview">
						<!-- Pagos entre fechas -->
						<li class="nav-item">
							<a href="reportes" class="nav-link <?php if($_GET["rutas"] == "reportes") echo 'active' ?>">
								<i class="nav-icon far fa-circle" ></i>
								<p>
									Pagos entre fechas
								</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="reporteVacunasEntreFechas" class="nav-link <?php if($_GET["rutas"] == "reporteVacunasEntreFechas") echo 'active' ?>">
								<i class="nav-icon far fa-circle" ></i>
								<p>
									Vacunacion entre fechas
								</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="reporteVacunas" class="nav-link <?php if($_GET["rutas"] == "reporteVacunas") echo 'active' ?>">
								<i class="nav-icon far fa-circle" ></i>
								<p>
									Reporte de Vacunas
								</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="reporteCitas" class="nav-link <?php if($_GET["rutas"] == "reporteCitas") echo 'active' ?>">
								<i class="nav-icon far fa-circle" ></i>
								<p>
									Reporte de Citas
								</p>
							</a>
						</li>
					</ul>
				</li>

				<!-- Reportes -->
				

        	</ul>
      	</nav><!-- /.sidebar-menu -->
    </div><!-- /.sidebar -->

</aside>