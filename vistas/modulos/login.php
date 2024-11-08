<style>
  body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
   /*  background: #045b69;
    background: -webkit-linear-gradient(to right, #091a23, #045b69);
    background: linear-gradient(to right, #091a23, #045b69) */
    background-image: url("vistas/dist/img/perritos.jpg");
    background-size: cover;
}

  .login-card-body .input-group .form-control:focus ~ .input-group-append .input-group-text, .login-card-body .input-group .form-control:focus ~ .input-group-prepend .input-group-text, .register-card-body .input-group .form-control:focus ~ .input-group-append .input-group-text, .register-card-body .input-group .form-control:focus ~ .input-group-prepend .input-group-text {
    border-color: #2BCBF0;
  }
</style>
<body style="background-color: #000000;">

<div class="login-box">
    <div class="d-flex justify-content-center d-flex align-items-center py-2">
      <img src="./vistas/dist/img/VETERINARIA.jpg" class="pr-2" alt="" width="80px">

      <a href="" style="color: #045b69; font-size: 1.6rem;" class="fs-4"> <b> VETERINARIA</b></a>
      </div>
    <!-- /.login-logo -->

    <div class="card">
      <div class="card-body login-card-body">
      <span class="fas fa-paw" style="color: #045b69;"></span>
      
        <p class="login-box-msg">INICIAR SESION</p>
        <form method="post">
          <div class="input-group mb-3">

            <input type="text" class="form-control" name="ingUsuario" placeholder="Usuario">
            <div class="input-group-append">
              <div class="input-group-text">
              <span class="fas fa-key" style="color: #045b69;"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="ingPassword" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
              <span class="fas fa-lock" style="color: #045b69;"></span>
              </div>
            </div>
          </div>

          <div class="col-4">
            <button type="submit" style="background: #045b69; color: white;" class="btn btn-block">Ingresar</button>
          </div>
          <?php

          

          $login = new ControladorUsuarios();
          $login->ctrIngresoUsuario();

          ?>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
    <!-- /.login-box -->
  </div>

</body>