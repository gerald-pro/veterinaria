<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    
    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">
                    <h1>CLIENTE</h1>
                </div>
                
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                        <li class="breadcrumb-item active">Cliente</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">


                <button type="button" class="btn btn-primary" data-toggle="modal"
                    data-target="#modalAgregarCliente">Registrar Cliente</button>


                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">


                <table class="table table-bordered table-hover dataTable dtr-inline tablas example2"
                    aria-describedby="example2_info" id="example2">
                    <thead>
                        <tr>
                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                                colspan="1" aria-sort="ascending"
                                aria-label="Motor de renderizado: actívelo para ordenar las columnas de forma descendente">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">#</font>
                                </font>
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Navegador: activar para ordenar las columnas de forma ascendente">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Nombre</font>
                                </font>
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Plataforma(s): activar para ordenar la columna de forma ascendente">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Apellido</font>
                                </font>
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Versión del motor: activar para ordenar columnas de forma ascendente">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Celular</font>
                                </font>
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Calificación CSS: activar para ordenar las columnas de forma ascendente">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Direccion</font>
                                </font>
                            </th>

                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Calificación CSS: activar para ordenar las columnas de forma ascendente">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Acciones</font>
                                </font>
                            </th>


                        </tr>
                    </thead>
                    <tbody>





                        <?php

                        $item = null;
                        $valor = null;

                        $cliente = ControladorCliente::ctrMostrarCliente($item, $valor);

                        foreach ($cliente as $key => $value) {

                            echo ' <tr>

          <td>' . ($key + 1) . '</td>

          <td class="text-uppercase">' . $value["nombre"] . '</td>
          <td class="text-uppercase">' . $value["apellido"] . '</td>
          <td class="text-uppercase">' . $value["celular"] . '</td>
          <td>' . $value["direccion"] . '</td>


          <td>

          <div class="btn-group">

          <button class="btn btn-warning btnEditarCliente" id="' . $value["id"] . '" data-toggle="modal" data-target="#modalEditarCliente"><i class="fa fa-solid fa-pen" style="color: white;"></i></button>

          <button class="btn btn-danger btnEliminarCliente" id="' . $value["id"] . '"><i class="fa fa-trash" style="color: white;"></i></button>

          </div>

        </td>





          

        </tr>';
                        }

                        ?>



                    </tbody>
                   
                </table>


            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->






<div class="modal fade" id="modalAgregarCliente">
    <div class="modal-dialog">
    <div class="modal-content bg-primary">
            <form role="form" method="post">
                <div class="modal-header">
                    <h4 class="modal-title">Registrar Cliente</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="exampleInputEmail1">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Nombre</font>
                            </font>
                        </label>
                        <input type="text" class="form-control" id="NuevoNombre" name="NuevoNombre"
                            placeholder="Ingrese Nombre">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Apellido</font>
                            </font>
                        </label>
                        <input type="text" class="form-control" id="NuevoApellido" name="NuevoApellido"
                            placeholder="Ingrese Apellido">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Celular</font>
                            </font>
                        </label>
                        <input type="text" class="form-control" id="NuevoCelular" name="NuevoCelular"
                            placeholder="Ingrese Celular">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Dirección</font>
                            </font>
                        </label>
                        <input type="text" class="form-control" id="NuevoDireccion" name="NuevoDireccion"
                            placeholder="Ingrese Direccion">
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-outline-light">Guardar</button>
                </div>

                <?php

                $crearCliente = new ControladorCliente();
                $crearCliente->ctrCrearCliente();

                ?>

            </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>



<div class="modal fade" id="modalEditarCliente">
    <div class="modal-dialog">
    <div class="modal-content bg-primary">
            <form role="form" method="post">
                <div class="modal-header">
                    <h4 class="modal-title">Editar Cliente</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="exampleInputEmail1">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Nombre</font>
                            </font>
                        </label>
                        <input type="text" class="form-control" id="EditarNombre" name="EditarNombre"

                            placeholder="Ingrese Nombre">
                            <input type="hidden"  name="id" id="id" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Apellido</font>
                            </font>
                        </label>
                        <input type="text" class="form-control" id="EditarApellido" name="EditarApellido"
                            placeholder="Ingrese Apellido">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Celular</font>
                            </font>
                        </label>
                        <input type="text" class="form-control" id="EditarCelular" name="EditarCelular"
                            placeholder="Ingrese Celular">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Dirección</font>
                            </font>
                        </label>
                        <input type="text" class="form-control" id="EditarDireccion" name="EditarDireccion"
                            placeholder="Ingrese Direccion">
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-outline-light">Guardar</button>
                </div>

                <?php

                $editarCliente = new ControladorCliente();
                $editarCliente->ctrEditarCliente();

                ?>

            </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php

  $borrarCliente = new ControladorCliente();
  $borrarCliente -> ctrBorrarCliente();

?>