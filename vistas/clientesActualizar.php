<?php
  include_once('../plantilla/encabezadoclientes.php');
  include_once('../controladores/controladorclientes.php');
  
  
  if(isset($_GET['id'])){
    $idcli = $_GET['id'];

    foreach (Listar1($idcli) as $row){
        $id =  $row[0];
        $nombre =  $row[1];
        $apellido =  $row[2];
        $rtn =  $row[3];
        $direccion =$row[4];
        $ciudad = $row[5];
        $telefono =$row[6];
        $estado = $row[7];
        $dni = $row[8];
     
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

                <form class="form needs-validation" id="form1" action="../controladores/controladorclientes.php?id=<?php echo $_GET['id']?>" method="POST" role="form" autocomplete="off" novalidate>               
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
                      <label class="col-lg-3 col-form-label form-control-label">Apellido</label>
                      <div class="col-lg-9">
                        <input class="form-control" type="text" value="<?php echo  $apellido ?>" id="InputApe" pattern="[a-zA-Z ]+" name="InputApe" required>
                        <div class="valid-feedback">Correcto</div>
                        <div class="invalid-feedback">Ingrese datos correctos</div>
                      </div>
                    </div>

                  <!-- id usuario-->
                  <div class="form-group row">
                      <label class="col-lg-3 col-form-label form-control-label">RTN</label>
                      <div class="col-lg-9">
                        <input class="form-control" type="text"value="<?php echo   $rtn ?>" id="InputRTN"  name="InputRTN" required>
                        <div class="valid-feedback">Correcto</div>
                        <div class="invalid-feedback">Ingrese datos correctos</div>
                      </div>
                    </div>

                     <!-- direccion opcional-->
                  <div class="form-group row">
                      <label class="col-lg-3 col-form-label form-control-label">Direccion </label>
                      <div class="col-lg-9">
                        <input class="form-control" type="text" value="<?php echo $direccion?>" id="InputDireccion"  pattern="[a-zA-Z ]+" name="InputDireccion" required>
                        <div class="valid-feedback">Correcto</div>
                        <div class="invalid-feedback">Ingrese datos correctos</div>
                      </div>
                    </div>
                  
                    <!-- id ciudad-->
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label form-control-label">Ciudad</label>
                      <div class="col-lg-9">
                        <input class="form-control" type="number" value="<?php echo  $ciudad ?>" id="InputCiudad"  name="InputCiudad" required>
                        <div class="valid-feedback">Correcto</div>
                        <div class="invalid-feedback">Ingrese datos correctos</div>
                      </div>
                    </div>

                     <!-- id ciudad-->
                  <div class="form-group row">
                      <label class="col-lg-3 col-form-label form-control-label">Telefono</label>
                      <div class="col-lg-9">
                        <input class="form-control" type="number" value="<?php echo  $telefono ?>" id="InputUsuario"  name="InputUsuario" required>
                        <div class="valid-feedback">Correcto</div>
                        <div class="invalid-feedback">Ingrese datos correctos</div>
                      </div>
                    </div>


                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label form-control-label">Estado</label>
                      <div class="col-lg-9">
                        <input class="form-control" type="number" value="<?php echo  $estado ?>" id="InputEstado"  name="InputEstado" required>
                        <div class="valid-feedback">Correcto</div>
                        <div class="invalid-feedback">Ingrese datos correctos</div>
                      </div>
                    </div>


                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label form-control-label">RTN</label>
                      <div class="col-lg-9">
                        <input class="form-control" type="text"value="<?php echo  $dni ?>" id="InputDireccop"  name="InputDireccop" required>
                        <div class="valid-feedback">Correcto</div>
                        <div class="invalid-feedback">Ingrese datos correctos</div>
                      </div>
                    </div>
                    
                    <?php
                     include("../controladores/controladorclientes.php");
                     $cliente= new ControladorClientes;

                    if (isset($_REQUEST['update'])) {
                      $id = $_REQUEST['id'];
                      $direccion = $_REQUEST['InputDireccion'];
                      $ciudad = $_REQUEST['InputCiudad'];
                      $telefono = $_REQUEST['InputUsuario'];
                      $dni = $_REQUEST['InputDireccop'];
                      $rtn = $_REQUEST['InputRTN'];
                      $estado = $_REQUEST['InputEstado'];
                      $apellido = $_REQUEST['InputApe'];
                      $nombre = $_REQUEST['InputNom'];
                      

              
                      $datos=$cliente->Actualizar($id,$nombre,$apellido,$rtn,$direccion,$ciudad,$telefono,$estado,$dni);
                   // $direccioness= new ControladorDirecciones;
                   
                  }
                  
                      ?>



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