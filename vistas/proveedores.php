<?php
  include_once('../controladores/controladorProveedores.php');
  include_once('../plantilla/encabezadoProveedores.php');
?>

  <div class="container">
    <div class="mx-auto main-section" id="myTab" role="tablist">
      <ul class="nav nav-tabs justify-content-center">
        <li class="nav-item">
          <a class="nav-link active" id="list-tab" data-toggle="tab" href="#list" role="tab" aria-controls="list"
            aria-selected="false"><strong>Listado Proveedores</strong></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="form-tab" data-toggle="tab" href="#form" role="tab" aria-controls="form"
            aria-selected="true"><strong>Ingreso Proveedores</strong></a>
        </li>
       
      </ul>

     
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="list" role="tabpanel" aria-labelledby="list-tab">
          <div class="card">
            <div class="card-header text-center">
              <h4>Listado de Proveedores</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="userList" class="table table-bordered table-hover table-striped">
                  <thead class="thead-light">
                    <tr class="text-center">
                      <th scope="col">Id</th>
                      <th scope="col">Nombre</th>
                      <th scope="col">Telefono</th>
                      <th scope="col">Correo</th>
                      <th scope="col">Direccion</th>
                      <th scope="col">Ciudad</th>
                      <th scope="col">Estado Proveedor</th>
                      <th scope="col">Accion</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   $datos= listarProveedor();
                    for($i=0;$i < sizeof($datos);$i++){?>
                      <tr class="text-center">
                        <td><?php echo $datos[$i]["id_prov"] ?></td>
                        <td><?php echo $datos[$i]["nom_prov"] ?></td>
                        <td><?php echo $datos[$i]["telefono_prov"] ?></td>
                        <td><?php echo $datos[$i]["correo_prov"] ?></td>
                        <td><?php echo $datos[$i]["direccion_prov"] ?></td>
                        <td><?php echo $datos[$i]["nombre_ciudad"] ?></td>
                        <td><?php echo $datos[$i]["Estado"] ?></td>
                        <td class="text-center">
                         <a href="./proveedoresActualizar.php?id=<?php echo $datos[$i]['id_prov']?>"><i class="fas fa-edit"></i></a>  | 
                         <a href="../controladores/controladorProveedores.php?id_prov=<?php echo $datos[$i]['id_prov']?>"><i class="fas fa-trash"></i></a>
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
              <h4>Ingreso del Proveedor</h4>
            </div>
            <div class="card-body">
              <form class="form needs-validation" id="form1" action="../controladores/controladorProveedores.php" method="POST" role="form" autocomplete="off" novalidate>
                <!-- Nombre Proveedor-->
                <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">Nombre Proveedor: </label>
                  <div class="col-lg-9">
                    <input class="form-control" name="nom_prov" type="text" required>
                    <div class="valid-feedback">Correcto</div>
                    <div class="invalid-feedback">Ingrese datos correctos</div>
                  </div>
                </div>
                <!-- Telefono Proveedor-->
                <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">Telefono: </label>
                  <div class="col-lg-9">
                    <input class="form-control" name="telefono_prov" type="text" maxlength="12" required>
                    <div class="valid-feedback">Correcto</div>
                    <div class="invalid-feedback">Ingrese datos correctos</div>
                  </div>
                </div>
                <!-- Correo Proveedor-->
                <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">Correo: </label>
                  <div class="col-lg-9">
                    <input class="form-control" name="correo_prov" type="email" required>
                    <div class="valid-feedback">Correcto</div>
                    <div class="invalid-feedback">Ingrese datos correctos</div>
                  </div>
                </div>
                <!-- Direccion Proveedor-->
                <div class="form-group row">
                    <label class="col-lg-3  col-form-label form-control-label">Direccion: </label>
                    <div class="col-lg-9">
                      <textarea required class="form-control" name="direccion_prov" maxlength="100"></textarea>
                      <div class="valid-feedback">Correcto</div>
                      <div class="invalid-feedback">Ingrese datos correctos</div>
                      </div>
                </div>
                 <!-- Ciudad-->
                 <div class="form-group row">
                      <label class="col-lg-3 col-form-label form-control-label">Ciudad: </label>
                      <div class="col-lg-9">
                        <select class="custom-select custom-select-lg mb-3" name="id_ciudad" required>
                          <option selected disabled value="">Seleccione</option>

                          <?php
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
                <!-- Estado-->
                <div class="form-group row">
                      <label class="col-lg-3 col-form-label form-control-label">Estado: </label>
                      <div class="col-lg-9 pt-2">
                        <select class="custom-select" name="estado" required>
                          <option selected disabled value="">Seleccione</option>
                          <option name="estado" value="1" >Activo</option>
                          <option name="estado" value="0" >Inactivo</option>
                        </select>
                      <div class="valid-feedback">Correcto</div>
                      <div class="invalid-feedback">Ingrese datos correctos</div>
                      </div>
                    </div>

                <div class="form-group row">
                  <div class="col-lg-12 text-center">
                    <button type="submit" class="btn btn-primary" name="guardar" value="Save Changes">Guardar</button>
                    <button type="reset" class="btn btn-secondary" value="Cancel">Cancelar</button>
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