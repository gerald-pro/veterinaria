<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>USUARIOS</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                        <li class="breadcrumb-item active">Usuarios</li>
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


                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">Registrar Usuario</button>


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

                <table class="table table-bordered table-hover dataTable dtr-inline tablas example2" aria-describedby="example2_info" id="example2">
                    
                    <thead>
                        
                        <tr>
                            
                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Motor de renderizado: actívelo para ordenar las columnas de forma descendente">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">#</font>
                                </font>
                            </th>

                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Navegador: activar para ordenar las columnas de forma ascendente">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Nombre</font>
                                </font>
                            </th>

                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Versión del motor: activar para ordenar columnas de forma ascendente">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Usuario</font>
                                </font>
                            </th>

                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Versión del motor: activar para ordenar columnas de forma ascendente">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Perfil</font>
                                </font>
                            </th>

                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Versión del motor: activar para ordenar columnas de forma ascendente">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Estado</font>
                                </font>
                            </th>

                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Versión del motor: activar para ordenar columnas de forma ascendente">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Ultimo Vez Conectado</font>
                                </font>
                            </th>

                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Calificación CSS: activar para ordenar las columnas de forma ascendente">
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

                        $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

                        foreach ($usuarios as $key => $value) {

                            echo ' <tr>
                            <td>' . ($key + 1) . '</td>
                             <td class="text-uppercase">' . $value["nombre"] . '</td>
                            <td>' . $value["usuario"] . '</td>
                            <td>' . $value["perfil"] . '</td>';

                            if ($value["estado"] != 0) {

                                echo '<td><button class="btn btn-success btnActivar" id="' . $value["id"] . '" estadoUsuario="0">Activado</button></td>';
                            } else {

                                echo '<td><button class="btn btn-danger btnActivar" id="' . $value["id"] . '" estadoUsuario="1">Desactivado</button></td>';
                            }

                            echo '<td>' . $value["ultimo_login"] . '</td>
                            <td>

                                <div class="btn-group">
                                    
                                <button class="btn btn-warning btnEditarUsuario" id="' . $value["id"] . '" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-solid fa-pen" style="color: white;"></i></button>

                                <button class="btn btn-danger btnEliminarUsuario" id="' . $value["id"] . '" usuario="' . $value["usuario"] . '"><i class="fa fa-trash" style="color: white;"></i></i></button>

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






<div class="modal fade" id="modalAgregarUsuario">
    <div class="modal-dialog">
        <div class="modal-content bg-primary">
            <form role="form" method="post">
                <div class="modal-header">
                    <h4 class="modal-title">Registrar Usuario</h4>
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
                        <input type="text" class="form-control" id="NuevoNombre" name="NuevoNombre" placeholder="Ingrese Nombre" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Usuario</font>
                            </font>
                        </label>
                        <input type="text" class="form-control" id="NuevoUsuario" name="NuevoUsuario" placeholder="Ingrese Usuario" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Password</font>
                            </font>
                        </label>
                        <input type="password" class="form-control" id="NuevoPassword" name="NuevoPassword" placeholder="Ingrese Password" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Perfil</font>
                            </font>
                        </label>
                        <select class="form-control input-lg" name="NuevoPerfil" required>

                            <option value="">Selecionar perfil</option>

                            <option value="Veterinario">Veterinario(a)</option>

                            <option value="Secretaria">Secretaria</option>

                            <option value="Administrador">Administrador</option>

                        </select>
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-outline-light">Guardar</button>
                </div>

                <?php

                $crearUsuarios = new ControladorUsuarios();
                $crearUsuarios->ctrCrearUsuario();

                ?>

            </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>



<div class="modal fade" id="modalEditarUsuario">
    <div class="modal-dialog">
        <div class="modal-content bg-primary">
            <form role="form" method="post">
                <div class="modal-header">
                    <h4 class="modal-title">Editar Usuario</h4>
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
                        <input type="text" class="form-control" id="EditarNombre" name="EditarNombre" placeholder="Ingrese Nombre" value="" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Usuario</font>
                            </font>
                        </label>
                        <input type="text" class="form-control" id="EditarUsuario" name="EditarUsuario" placeholder="Ingrese Usuario" value="" readonly style="background-color: #f0f0f0; opacity: 0.6; cursor: not-allowed;">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Password</font>
                            </font>
                        </label>
                        <input type="password" class="form-control" id="EditarPassword" name="EditarPassword" placeholder="Ingrese Password">
                        <input type="hidden" id="PasswordActual" name="PasswordActual">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Perfil</font>
                            </font>
                        </label>
                        <select class="form-control input-lg" name="EditarPerfil" required>

                            <option value="Veterinario">Veterinario(a)</option>

                            <option value="Secretaria">Secretaria</option>

                            <option value="Administrador">Administrador</option>

                        </select>
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-outline-light">Guardar</button>
                </div>

                <?php

                $editarUsuarios = new ControladorUsuarios();
                $editarUsuarios->ctrEditarUsuario();

                ?>

            </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<?php

$borrarUsuarios = new ControladorUsuarios();
$borrarUsuarios->ctrBorrarUsuario();

?>