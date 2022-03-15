<?php
  include_once('../plantilla/encabezadoclientes.php');

?>
  <div class="container">
    <div class="mx-auto main-section" id="myTab" role="tablist">
      <ul class="nav nav-tabs justify-content-center">
        <li class="nav-item">
          <a class="nav-link active" id="list-tab" data-toggle="tab" href="#list" role="tab" aria-controls="list"
            aria-selected="false"><strong>Listado Clientes</strong></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="form-tab" data-toggle="tab" href="#form" role="tab" aria-controls="form"
            aria-selected="true"><strong>Ingreso Clientes</strong></a>
        </li>
       
      </ul>

     
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="list" role="tabpanel" aria-labelledby="list-tab">
          <div class="card">
            <div class="card-header">
              <h4>Listado de Clientes</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="userList" class="table table-bordered table-hover table-striped">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">Id</th>
                      <th scope="col">Nombre</th>
                      <th scope="col">Apellido</th>
                      <th scope="col">RTN</th>
                      <th scope="col">Direccion</th>
                      <th scope="col">ID Ciudad</th>
                      <th scope="col">Telefono</th>
                      <th scope="col">Estado Cliente</th>
                      <th scope="col">DNI</th>
                      <th scope="col">Accion</th>
   
                     
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    include("../controladores/controladorclientes.php");
                    $cliente= new ControladorClientes;
                    $datos=$cliente->Listar();
                    for ($i = 0; $i < count($datos); $i++) {
                ?>
                 <tr>
                <th scope="row"><?php echo $datos[$i]["id_cliente"];?></th>
                <td><?php echo $datos[$i]["nom_cliente"];?></td>
                <td><?php echo $datos[$i]["apellido_cliente"];?></td>
                <td><?php echo $datos[$i]["RTN"];?></td>
                <td><?php echo $datos[$i]["direccion_cliente"];?></td>
                <td><?php echo $datos[$i]["id_ciudad"];?></td>
                <td><?php echo $datos[$i]["tel_cliente"];?></td>
                <td><?php echo $datos[$i]["estado"];?></td>
                <td><?php echo $datos[$i]["DNI_Cliente"];?></td>
                
                <td class="text-center">
                         <a href="./clientesActualizar.php?id=<?php echo $datos[$i]["id_cliente"]?>"><i class="fas fa-edit"></i></a>  | 
                         <a href="../controladores/controladorclientes.php?id_cliente=<?php echo $datos[$i]["id_cliente"]?>"><i class="fas fa-trash"></i></a>
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
            <div class="card-header">
              <h4>Ingreso del Cliente</h4>
            </div>
            <div class="card-body">
              <form class="form needs-validation" id="form1" method="post" role="form" autocomplete="off" novalidate>
                <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">Nombre: </label>
                  <div class="col-lg-9">
                    <input class="form-control" type="text" required  id="InputNom" name="InputNom" placeholder="Escriba el Nombre">
                    <div class="valid-feedback">Correcto</div>
                    <div class="invalid-feedback">Ingrese datos correctos</div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">Apellido: </label>
                  <div class="col-lg-9">
                    <input class="form-control" type="text" required id="InputApe" name="InputApe" placeholder="Escriba el Apellido">
                    <div class="valid-feedback">Correcto</div>
                    <div class="invalid-feedback">Ingrese datos correctos</div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">RTN: </label>
                  <div class="col-lg-9">
                    <input class="form-control" type="text" required  id="InputRTN" name="InputRTN" placeholder="Escriba el RTN">
                    <div class="valid-feedback">Correcto</div>
                    <div class="invalid-feedback">Ingrese datos correctos</div>
                  </div>
                </div>
                
                <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">Direccion: </label>
                  <div class="col-lg-9">
                    <input class="form-control" type="text" required id="InputDireccion" name="InputDireccion"  placeholder="Escriba la direccion">
                    <div class="valid-feedback">Correcto</div>
                    <div class="invalid-feedback">Ingrese datos correctos</div>
                  </div>
                </div>

                       <!-- Ciudad-->
                       <div class="form-group row">
                      <label class="col-lg-3 col-form-label form-control-label">Ciudad: </label>
                      <div class="col-lg-9">
                        <select class="custom-select custom-select-lg mb-3" name="InputCiudad" required>
                          <option selected disabled value="">Seleccione</option>

                          <?php
                            include_once('../controladores/controladorclientes.php');
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
                  <label class="col-lg-3 col-form-label form-control-label" >Telefono: </label>
                  <div class="col-lg-9">
                    <input class="form-control" type="text" required id="InputUsuario" name="InputUsuario" placeholder="Escriba el telefono">
                    <div class="valid-feedback">Correcto</div>
                    <div class="invalid-feedback">Ingrese datos correctos</div>
                  </div>
                </div>

    
                <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">DNI: </label>
                  <div class="col-lg-9">
                    <input class="form-control" type="text" required id="InputDireccop" name="InputDireccop" placeholder="Escriba el DNI">
                    <div class="valid-feedback">Correcto</div>
                    <div class="invalid-feedback">Ingrese datos correctos</div>
                  </div>
                </div>
               
                <?php
                    if (isset($_REQUEST['enviar'])) {
                      $direccion = $_REQUEST['InputDireccion'];
                      $ciudad = $_REQUEST['InputCiudad'];
                      $telefono = $_REQUEST['InputUsuario'];
                      $dni = $_REQUEST['InputDireccop'];
                      $rtn = $_REQUEST['InputRTN'];
                      $apellido = $_REQUEST['InputApe'];
                      $nombre = $_REQUEST['InputNom'];
                      

              
                      $datos=$cliente->Guardar($nombre, $apellido, $rtn,$direccion , $ciudad, $telefono,$dni);

                   // $direccioness= new ControladorDirecciones;
                   
                  }
                  
                      ?>
               
               
                
           
                <div class="form-group row">
                  <div class="col-lg-12 text-center">
                  <a href="./clientes.php" target="nombre" onclick="location.refresh()"> <button type="sumit" class="btn btn-primary"   name="enviar"  >Enviar</button></a>
                    <button type="reset" class="btn btn-secondary" value="Cancel">Cancelar</button>
                  </div>
                </div>
              </form>
              <script src="../bootstrap/js/cliente.js"></script>
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