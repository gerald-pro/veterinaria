<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>SERVICIOS</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                        <li class="breadcrumb-item active">Servicios</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarServicio">Registrar Servicio</button>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div><!-- /.card-header -->

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
                                aria-label="Versión del motor: activar para ordenar columnas de forma ascendente">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Costo</font>
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

                            $servicio = ControladorServicio::ctrMostrarServicio($item, $valor);

                            foreach ($servicio as $key => $value) {

                                echo 
                                    '<tr>

                                        <td>' . ($key + 1) . '</td>

                                        <td class="text-uppercase">' . $value["nombre"] . '</td> 

                                        <td class="text-uppercase">' . $value["precio"] . '</td>
          
                                        <td>

                                            <div class="btn-group">

                                                <button title="Editar Servicio" class="btn btn-warning btnEditarServicio" id="' . $value["idservicio"] . '" data-toggle="modal" data-target="#modalEditarServicio">
                                                    <i class="fa fa-solid fa-pen"style="color: white;"></i>
                                                </button>

                                                <button title="Eliminar Servicio" class="btn btn-danger btnEliminarServicio" id="' . $value["idservicio"] . '">
                                                    <i class="fa fa-trash"style="color: white;"></i>
                                                </button>

                                            </div>

                                        </td>

                                    </tr>';

                            }

                        ?>
                    </tbody>
                </table>

            </div><!-- /.card-body -->
        </div><!-- /.card -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<div class="modal fade" id="modalAgregarServicio">
    <div class="modal-dialog">
    <div class="modal-content bg-primary">
            <form role="form" method="post">
                <div class="modal-header">
                    <h4 class="modal-title">Registrar Servicio</h4>
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
                                <font style="vertical-align: inherit;">Costo</font>
                            </font>
                        </label>
                        <input type="decimal" class="form-control" id="NuevoCosto" name="NuevoCosto"
                            placeholder="Ingrese Costo">
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-outline-light">Guardar</button>
                </div>

                <?php

                $crearServicio = new ControladorServicio();
                $crearServicio->ctrCrearServicio();

                ?>

            </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>



<div class="modal fade" id="modalEditarServicio">
    <div class="modal-dialog">
    <div class="modal-content bg-primary">
            <form role="form" method="post">
                <div class="modal-header">
                    <h4 class="modal-title">Editar servicio</h4>
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
                        <input type="hidden" name="id" id="id" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Precio</font>
                            </font>
                        </label>
                        <input type="decimal" class="form-control" id="EditarCosto" name="EditarCosto"
                            placeholder="Ingrese Precio">
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-outline-light">guardar</button>
                </div>

                <?php

                $editarServicio = new ControladorServicio();
                $editarServicio->ctrEditarServicio();

                ?>

            </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php

$borrarServicio = new ControladorServicio();
$borrarServicio->ctrBorrarServicio();

?>