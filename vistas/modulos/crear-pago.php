<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<!-- Content Header -->
    <section class="content-header">

    	<div class="container-fluid">
    		<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Pago Servicio</h1>
				</div>
        	</div><!-- /.row -->
      	</div><!-- /.container-fluid -->

    </section>

    <!-- Main content -->
    <section class="content">

        <div class="container-fluid">

            <div class="row">

                <div class="col-md-6">

                    <div class="card-primary">

                        <div class="card-header">
                            <h3 class="card-title">Datos del Pago</h3>
                        </div><!-- /.card-header -->

                        <!-- Formulario -->

                        <form role="form" method="post" class="formularioPago">

                            <div class="card-body">

                                <!-- Nombre usuario Logueado (Secretaria) -->
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-user"></i>
                                            </span>
                                        </div>

                                        <input type="text" class="form-control" id="nuevoCajera" value="<?php echo $_SESSION["nombre"]; ?>" readonly>
                                
                                        <input type="hidden" class="form-control" name="idCajera" value="<?php echo $_SESSION["id"]; ?>">
                                    </div>
                                </div>

                                <!-- Nro de Pago -->
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-key"></i>
                                            </span>
                                        </div>

                                        <?php 

                                            $item = null;
                                            $valor = null;

                                            $pagos = ControladorPagos::ctrMostrarPagos($item, $valor);

                                            if(!$pagos) {

                                                echo '<input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="1001" readonly>';

                                            } else {

                                                foreach ($pagos as $key => $value) {

                                                }

                                                $numeroPago = $value["numeroPago"] + 1;

                                                echo '<input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="' . $numeroPago . '" readonly>';

                                            }
                                        
                                        ?>

                                    </div>
                                </div>

                                <!-- Médico -->
                                <div class="form-group">
                                    <div class="input-group mb-3">

                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-user-md text-primary"></i>
                                            </span>
                                        </div>

                                        <select class="custom-select rounded-0" id="seleccionarMedico" name="seleccionarMedico" required>
                                            <option value="">Seleccione Veterinario(a)</option>
                                            <?php

                                                $item = null;
                                                $valor = null;

                                                $categorias = ControladorUsuarios::ctrMostrarMedicos($item, $valor);

                                                /* $medicos = ControladorMedicos::ctrMostrarMedicos($item, $valor); */

                                                foreach ($categorias as $key => $value) {

                                                    echo '<option value="' . $value["id"] . '">' . $value["nombre"] . '</option>';

                                                }

                                            ?>
                                            
                                        </select>

                                    </div>
                                </div>

                                <!-- Cliente -->
                                <div class="form-group">
                                    <div class="input-group mb-3">

                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-user text-primary"></i>
                                            </span>
                                        </div>

                                        <select class="custom-select rounded-0" id="seleccionarCliente" name="seleccionarCliente" required>
                                            <option value="">Seleccionar Cliente</option>
                                            <?php

                                                $item = null;
                                                $valor = null;

                                                $clientes = ControladorCliente::ctrMostrarCliente($item, $valor);

                                                foreach ($clientes as $key => $value) {

                                                    echo '<option value="' . $value["id"] . '">' . $value["nombre"] . ' ' . $value["apellido"] . '</option>';

                                                }

                                            ?>
                                            
                                        </select>

                                    </div>
                                </div>

                                <!-- Fecha -->
                                <div class="form-group">
                                    <div class="input-group mb-3">

                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                        </div>

                                        <?php
                                            date_default_timezone_set("America/La_Paz");
                                            $fechaHoraActual = date("Y-m-d H:i:s");
                                            $fechaFormateada = date("d-m-Y H:i:s", strtotime($fechaHoraActual));
                                        ?>

                                        <input type="text" class="form-control" id="fecha" value="<?php echo $fechaFormateada; ?>" readonly>
                                        
                                        <input type="hidden" name="fecha" value="<?php echo $fechaHoraActual; ?>">
                                    </div>
                                </div>

                                <!-- Sección para agregar Servicios -->
                                <div class="form-group row nuevoProducto">

                                </div>

                                <input type="hidden" id="listaProductos" name="listaProductos" required>

                                <div class="row">

                                    <div class="col-md-6 offset-md-6">

                                        <div class="card">
                                            
                                            <div class="card-body">

                                                <table class="table">

                                                    <thead>
                                                        <tr>
                                                            <th class="text-primary">TOTAL A PAGAR:</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="input-group">

                                                                    <span class="input-group-addon"><b class="mr-1">Bs.</b></span>
                                                                    <input type="text" class="form-control input-lg"
                                                                        id="nuevoTotalVenta" name="nuevoTotalVenta" total=""
                                                                        placeholder="00000" readonly required>
                                                                    <input type="hidden" name="totalVenta" id="totalVenta">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>

                                                </table>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <hr>

                                <div class="form-group row">

                                    <div class="col-xs-6" style="padding-right:0px">

                                        <div class="input-group">

                                            <select class="form-control" id="nuevoMetodoPago" name="nuevoMetodoPago"
                                                required>
                                                <option value="">Seleccione método de pago</option>
                                                <option value="Efectivo">Efectivo</option>
                                              
                                            </select>

                                        </div>

                                    </div>

                                    <div class="cajasMetodoPago"></div>

                                    <input type="hidden" id="listaMetodoPago" name="listaMetodoPago">

                                </div>

                                <br>

                            </div><!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-outline-primary pull-right">Guardar pago</button>
                            </div>

                        </form>

                        <?php

                            $guardarVenta = new ControladorPagos();
                            $guardarVenta -> ctrCrearPago();

                        ?>

                    </div><!-- /.card -->

                </div>
                
                <!-- Tabla de Servicios -->
                <div class="col-md-6">

                    <div class="card card-primary">

                        <div class="card-header">
                            <h3 class="card-title">Servicios</h3>
                        </div><!-- /.card-header -->

                        <div class="card-body">

                            <table id="datatable" class="table table-striped table-bordered dt-responsive tablaPagos">

                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Nombre</th>
                                        <th>Costo</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>

                            </table>

                        </div><!-- /.card-body -->

                    </div><!-- /.card -->

                </div><!-- /.col-md-6 -->

            </div><!-- /.row -->

        </div><!-- /.container-fluid -->

    </section><!-- /.content -->

</div><!-- /.content-wrapper -->




