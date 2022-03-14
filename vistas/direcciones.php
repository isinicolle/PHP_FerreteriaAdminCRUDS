<?php
  include_once('../plantilla/encabezadodirecciones.php');

?>
  <div class="container">
 
    <div class="mx-auto main-section" id="myTab" role="tablist">
      <ul class="nav nav-tabs justify-content-center">
        <li class="nav-item">
          <a class="nav-link active" id="list-tab" data-toggle="tab" href="#list" role="tab" aria-controls="list"
            aria-selected="false"><strong>Listado Direcciones</strong></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="form-tab" data-toggle="tab" href="#form" role="tab" aria-controls="form"
            aria-selected="true"><strong>Ingreso Direcciones</strong></a>
        </li>
       
      </ul>

     
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="list" role="tabpanel" aria-labelledby="list-tab">
          <div class="card">
            <div class="card-header text-center">
              <h4>Listado Direcciones</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="userList" class="table table-bordered table-hover table-striped">
                  <thead class="thead-light">
                    <tr>
                    <th scope="col">Id</th>
                      <th scope="col">Direccion</th>
                      <th scope="col">Id Ciudad</th>
                      <th scope="col">Id Usuario Cliente</th>
                      <th scope="col">Direccion Opcional</th>
                      <th scope="col">Accion</th>
                    
     
                     
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    include("../controladores/controladorDirecciones.php");
                    $direcciones= new ControladorDirecciones;
                    $datos=$direcciones->Listar();
                    for ($i = 0; $i < count($datos); $i++) {
                ?>
                 <tr>
                <th scope="row"><?php echo $datos[$i]["id_direccionEnvio"];?></th>
                <td><?php echo $datos[$i]["direccion"];?></td>
                <td><?php echo $datos[$i]["id_ciudad"];?></td>
                <td><?php echo $datos[$i]["id_usuarioCliente"];?></td>
                <td><?php echo $datos[$i]["direccion_opcional"];?></td>
                <td class="text-center">
                         <a href="./direccionesActualizar.php?id=<?php echo $datos[$i]["id_direccionEnvio"]?>"><i class="fas fa-edit"></i></a>  | 
                         <a href="../controladores/controladorDirecciones.php?id_direccionEnvio=<?php echo $datos[$i]["id_direccionEnvio"]?>"><i class="fas fa-trash"></i></a>
                        </td>
  
             
                </tr>
                <?php } ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="form" role="tabpanel" aria-labelledby="form-tab">
          <div class="card">
            <div class="card-header text-center">
              <h4>Ingreso de direcciones</h4>
            </div>
            <div class="card-body">
              
              <form class="form needs-validation" id="form1" method="post" role="form" autocomplete="off" novalidate >
                
              <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label" for="InputDireccion">Direccion: </label>
                    <div class="col-lg-9">
                      <input class="form-control" type="text" required id="InputDireccion" name="InputDireccion" placeholder="Escriba la direccion">
                      <div class="valid-feedback">Correcto</div>
                      <div class="invalid-feedback">Ingrese datos correctos</div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label" for="InputCiudad">ID ciudad: </label>
                    <div class="col-lg-9">
                      <input class="form-control" type="text" required id="InputCiudad" name="InputCiudad" placeholder="Escriba el id de la ciudad">
                      <div class="valid-feedback">Correcto</div>
                      <div class="invalid-feedback">Ingrese datos correctos</div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label" for="InputUsuario">ID Usuario cliente: </label>
                    <div class="col-lg-9">
                      <input class="form-control" type="text" required id="InputUsuario" name="InputUsuario" placeholder="Escriba el id del usuario">
                      <div class="valid-feedback">Correcto</div>
                      <div class="invalid-feedback">Ingrese datos correctos</div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label" for="InputDireccop">Direccion Opcional: </label>
                    <div class="col-lg-9">
                      <input class="form-control" type="text" required id="InputDireccop" name="InputDireccop" placeholder="Escriba la direccion opcional">
                      <div class="valid-feedback">Correcto</div>
                      <div class="invalid-feedback">Ingrese datos correctos</div>
                    </div>
                  </div>

             

                      <?php
                    if (isset($_REQUEST['enviar'])) {
                      $direccion = $_REQUEST['InputDireccion'];
                      $ciudad = $_REQUEST['InputCiudad'];
                      $usuario = $_REQUEST['InputUsuario'];
                      $direccop = $_REQUEST['InputDireccop'];

              
                      $datos=$direcciones->Guardar($direccion,$ciudad,$usuario,$direccop);

                   // $direccioness= new ControladorDirecciones;
                   
                  }
                  
                      ?>
               

                <div class="form-group row">
                  <div class="col-lg-12 text-center">
                  <a href="./direcciones.php" target="nombre" onclick="location.refresh()"> <button type="sumit" class="btn btn-primary"   name="enviar"  >Enviar</button></a>
                   
                    <button type="reset" class="btn btn-secondary"   value="Cancel">Cancelar</button>
                  </div>
                </div>
              </form>
              <script src="../bootstrap/js/validacion.js"></script>
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
          <button type="button" class="btn btn-primary" > <a style="text-decoration: none;color: #fff;" href="./login.html">Cerrar sesión </a></button>
        </div>
      </div>
    </div>
  </div>
</body>

</html>