<?php
 include_once('../controladores/controladorProveedores.php');
 include_once('../plantilla/encabezadoProveedores.php');

 if(isset($_GET['id'])){
  $idProv = $_GET['id'];
  foreach (listarUno($idProv) as $row){
      $id = $row[0];
      $nom_prov = $row[1];
      $telefono_prov = $row[2];
      $correo_prov = $row[3];
      $direccion_prov = $row[4];
      $id_ciudad = $row[5];
      $estado = $row[6];
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
                <h4>Actualizar Proveedor</h4>
              </div>
              <div class="card-body">

                <form class="form needs-validation" id="form1" action="../controladores/controladorProveedores.php?id=<?php echo $_GET['id']?>" method="POST" role="form" autocomplete="off" novalidate>               
                  <!-- Id-->
                  <div class="form-group row">
                      <label class="col-lg-3 col-form-label form-control-label">Id</label>
                      <div class="col-lg-9">
                        <input class="form-control" type="text" value="<?php echo $id?>" name="id" disabled required>
                        <div class="valid-feedback">Correcto</div>
                        <div class="invalid-feedback">Ingrese datos correctos</div>
                      </div>
                    </div>
                  <!-- Nombre Proveedor-->
                <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">Nombre Proveedor: </label>
                  <div class="col-lg-9">
                    <input class="form-control" name="nom_prov" value="<?php echo $nom_prov?>" type="text" required>
                    <div class="valid-feedback">Correcto</div>
                    <div class="invalid-feedback">Ingrese datos correctos</div>
                  </div>
                </div>
                  <!-- Telefono Proveedor-->
                <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">Telefono: </label>
                  <div class="col-lg-9">
                    <input class="form-control" name="telefono_prov" value="<?php echo $telefono_prov?>" type="text" maxlength="12" required>
                    <div class="valid-feedback">Correcto</div>
                    <div class="invalid-feedback">Ingrese datos correctos</div>
                  </div>
                </div>
                <!-- Correo Proveedor-->
                <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">Correo: </label>
                  <div class="col-lg-9">
                    <input class="form-control" name="correo_prov" value="<?php echo $correo_prov?>" type="email" required>
                    <div class="valid-feedback">Correcto</div>
                    <div class="invalid-feedback">Ingrese datos correctos</div>
                  </div>
                </div>
                <!-- Direccion Proveedor-->
                <div class="form-group row">
                    <label class="col-lg-3  col-form-label form-control-label">Direccion: </label>
                    <div class="col-lg-9">
                      <input required type="text" class="form-control" value="<?php echo $direccion_prov?>" name="direccion_prov" maxlength="100"></textarea>
                      <div class="valid-feedback">Correcto</div>
                      <div class="invalid-feedback">Ingrese datos correctos</div>
                      </div>
                </div>
                 <!-- Ciudad-->
                 <div class="form-group row">
                      <label class="col-lg-3 col-form-label form-control-label">Ciudad: </label>
                      <div class="col-lg-9">
                        <select class="custom-select custom-select-lg mb-3" name="id_ciudad" required>
                        <?php
                        $listarCiudad = listarCiudad();

                        for($ciudad = 0; $ciudad < sizeof($listarCiudad); $ciudad++){
                            if($listarCiudad[$ciudad]['id_ciudad'] == null){
                        ?>
                                <option value="<?php echo $listarCiudad[$ciudad]['id_ciudad']; ?>" selected><?php echo $listarCiudad[$ciudad]['nombre_ciudad']; ?></option>
                            <?php } else { ?>
                                <option value="<?php echo $listarCiudad[$ciudad]['id_ciudad']; ?>"><?php echo $listarCiudad[$ciudad]['nombre_ciudad']; ?></option>
                        <?php
                                }
                            }
                        ?>
                          
                        </select>
                        <div class="valid-feedback">Correcto</div>
                        <div class="invalid-feedback">Ingrese datos correctos</div>
                      </div>
                  </div>

                    <!-- Estado-->
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label form-control-label">Estado: </label>
                      <div class="col-lg-9 pt-2">
                        <select class="custom-select" name="estado" selected value="<?php echo $estado?>" required>
                          <option disabled value="">Seleccione</option>
                          <option name="estado" value="1">Activo</option>
                          <option name="estado" value="0">Inactivo</option>
                        </select>
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