<?php
  include_once('../plantilla/encabezadodirecciones.php');
  include_once('../controladores/controladorDirecciones.php');
  
  
  if(isset($_GET['id'])){
    $iddireccion = $_GET['id'];

    foreach (Listar1($iddireccion) as $row){

      $id = $row[0];
      $direccion = $row[1];
      $ciudad = $row[2];
      $usuario = $row[3];
      $direccop= $row[4];
 
  }    
}
  
  
  

?>
  <div class="container">
        <div class="mx-auto main-section" id="myTab" role="tablist">
          <ul class="nav nav-tabs justify-content-center">
            <li class="nav-item">
              <a class="nav-link" id="form-tab" data-toggle="tab" href="#form" role="tab" aria-controls="form"
                aria-selected="true"><strong>Formulario</strong></a>
            </li>
          </ul>
        </div>
    </div>  
            <!-- Formulario -->
          <div class="tab-pane fade show active" id="form" role="tabpanel" aria-labelledby="form-tab">
            <div class="card container-md">
              <div class="card-header text-center">
                <h4>Actualizar Direccion</h4>
              </div>
              <div class="card-body">

                <form class="form needs-validation" id="form1" action="../controladores/controladorDirecciones.php?id=<?php echo $_GET['id']?>" method="POST" role="form" autocomplete="off" novalidate>               
                  <!-- Id-->
                  <div class="form-group row">
                      <label class="col-lg-3 col-form-label form-control-label">Id</label>
                      <div class="col-lg-9">
                        <input class="form-control" type="text" value="<?php echo $id?>" name="id" disabled required>
                        <div class="valid-feedback">Correcto</div>
                        <div class="invalid-feedback">Ingrese datos correctos</div>
                      </div>
                    </div>
                  <!-- Direccion-->
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label form-control-label">Direccion</label>
                      <div class="col-lg-9">
                        <input class="form-control" type="text" value="<?php echo $direccion?>" id="InputDireccion" pattern="[a-zA-Z ]+" name="InputDireccion" required>
                        <div class="valid-feedback">Correcto</div>
                        <div class="invalid-feedback">Ingrese datos correctos</div>
                      </div>
                    </div>

                        <!-- Ciudad-->
                        <div class="form-group row">
                      <label class="col-lg-3 col-form-label form-control-label">Ciudad: </label>
                      <div class="col-lg-9">
                        <select class="custom-select custom-select-lg mb-3" name="InputCiudad" required>
                          <option selected disabled value=""><?php echo $ciudad?></option>

                          <?php
                            include_once('../controladores/controladorDirecciones.php');
                           $datosCiudades = listarCiudad();

                          for($ciudad = 0; $ciudad < sizeof($datosCiudades); $ciudad++){
                          ?>
                              <option value="<?php echo $datosCiudades[$ciudad]['id_ciudad'] ?>"><?php echo $datosCiudades[$ciudad]['nombre_ciudad'] ?></option>
                          <?php
                              }
                          ?>
                          
                        </select>
                        <div class="valid-feedback">Correcto</div>
                        <div class="invalid-feedback">Ingrese datos correctos</div>
                      </div>
                  </div>


                  <div class="form-group row">
                      <label class="col-lg-3 col-form-label form-control-label">Usuario: </label>
                      <div class="col-lg-9">
                        <select class="custom-select custom-select-lg mb-3" name="InputUsuario" required>
                          <option selected disabled value=""><?php echo $usuario?></option>

                          <?php
                            include_once('../controladores/controladorDirecciones.php');
                           $datosUsuarios = listarUsuarios();

                          for($usuarios = 0; $usuarios < sizeof($datosUsuarios); $usuarios++){
                          ?>
                              <option value="<?php echo $datosUsuarios[$usuarios]['id_usuarioCliente'] ?>"><?php echo $datosUsuarios[$usuarios]['nombre_usuario'] ?></option>
                          <?php
                              }
                          ?>
                        </select>
                        <div class="valid-feedback">Correcto</div>
                        <div class="invalid-feedback">Ingrese datos correctos</div>
                      </div>
                  </div>


                     <!-- direccion opcional-->
                  <div class="form-group row">
                      <label class="col-lg-3 col-form-label form-control-label">Direccion Opcional</label>
                      <div class="col-lg-9">
                        <input class="form-control" type="text" value="<?php echo $direccop?>" id="InputDireccop"  pattern="[a-zA-Z ]+" name="InputDireccop" required>
                        <div class="valid-feedback">Correcto</div>
                        <div class="invalid-feedback">Ingrese datos correctos</div>
                      </div>
                    </div>
                  
                  
                   

                    <div class="form-group row">
                      <div class="col-lg-12 text-center">
                        <input type='submit' class="btn btn-primary" name="update" value="Guardar Cambios">
                        <button type="reset" class="btn btn-secondary" value="Cancel">Cancelar</button>
                      </div>

                  </form>
                  <script src="../bootstrap/js/validacion.js"></script>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </body>
</html>