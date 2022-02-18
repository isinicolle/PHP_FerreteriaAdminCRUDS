<?php
  include_once('./plantilla/encabezado.php');

?>
    <div class="container"> 
    <div class="main-content">
        <div class="px-4 py-5 my-5 text-center">
            <div class="card text-white bg-dark mb-3">
                <div class="card-body">
                    <h1 class="card-title display-5 fw-bold">Administracion</h1>
                    <div class="col-lg-6 mx-auto">
                        <p class="lead mb-4">Esta página es meramente para propositos de administración. Desde aquí podrá controlar los diversos modulos</p>
                      </div>
                  </div>

                </div>
            </div>
    </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Aviso</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Si cierra sesi&oacute;n podr&iacute;a perder los datos en los que estaba trabajando.¿Desea continuar?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary" > <a style="text-decoration: none;color: #fff;" href="./vistas/login.html">Cerrar sesión </a></button>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
     
    </body>
</html>