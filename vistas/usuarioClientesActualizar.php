<?php
  include_once('../plantilla/encabezadousuarioclientes.php');
  include_once('../controladores/controladorusuariocliente.php');
  
  
  if(isset($_GET['id'])){
    $idcli = $_GET['id'];

    foreach (Listar1($idcli) as $row){
        $id =  $row[0];
        $nombre =  $row[1];
        $clave =  $row[2];
        $cliente=  $row[3];
        $correo =$row[4];
        $estado = $row[5];
     
     
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
                <h4>Actualizar Cliente</h4>
              </div>
              <div class="card-body">

                <form class="form needs-validation" id="form1" action="../controladores/controladorusuariocliente.php?id=<?php echo $_GET['id']?>" method="POST" role="form" autocomplete="off" novalidate>               
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
                      <label class="col-lg-3 col-form-label form-control-label">Nombre</label>
                      <div class="col-lg-9">
                        <input class="form-control" type="text" value="<?php echo $nombre?>" id="InputNom" pattern="[a-zA-Z ]+" name="InputNom" required>
                        <div class="valid-feedback">Correcto</div>
                        <div class="invalid-feedback">Ingrese datos correctos</div>
                      </div>
                    </div>

                  <!-- id ciudad-->
                  <div class="form-group row">
                      <label class="col-lg-3 col-form-label form-control-label">Clave</label>
                      <div class="col-lg-9">
                        <input class="form-control" type="text" value="<?php echo  $clave ?>" id="InputApe" name="InputApe" required>
                        <div class="valid-feedback">Correcto</div>
                        <div class="invalid-feedback">Ingrese datos correctos</div>
                      </div>
                    </div>

                  <!-- id usuario-->
                    <!-- Ciudad-->
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label form-control-label">Cliente: </label>
                      <div class="col-lg-9">
                        <select class="custom-select custom-select-lg mb-3" name="InputRTN"  required>
                          <option selected disabled value=""><?php echo  $cliente ?></option>

                          <?php
                            include_once('../controladores/controladorusuariocliente.php');
                            $datosClientes = listarCli();

                          for($cliente = 0; $cliente< sizeof($datosClientes); $cliente++){
                          ?>
                              <option value="<?php echo $datosClientes[$cliente]['id_cliente'] ?>"><?php echo $datosClientes[$cliente]['nom_cliente'] ?></option>
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
                      <label class="col-lg-3 col-form-label form-control-label">Correo </label>
                      <div class="col-lg-9">
                        <input class="form-control" type="text" value="<?php echo $correo?>" id="InputDireccion"   name="InputDireccion" required>
                        <div class="valid-feedback">Correcto</div>
                        <div class="invalid-feedback">Ingrese datos correctos</div>
                      </div>
                    </div>
                  
                    
                     <!-- id ciudad-->
      


                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label form-control-label">Estado: </label>
                      <div class="col-lg-9 pt-2">
                        <select class="custom-select" name="estado" value="<?php echo $estado?>" required>
                          <option selected disabled value="">Seleccione</option>
                          <option name="estado" value="1">Activo</option>
                          <option name="estado" value="0">Inactivo</option>
                        </select>
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